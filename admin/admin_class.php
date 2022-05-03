<?php
session_start();
ini_set('display_errors', 1);
    Class Action {
        private $db;

        public function __construct() {
            ob_start();
        include 'dbcon.php';
        
        $this->db = $conn;
        }
        function __destruct() {
            $this->db->close();
            ob_end_flush();
        }

        function save_schedule(){
            extract($_POST);
            $data = "";
            foreach($_POST as $k=> $v){
                if($k != 'id'){
                    if(!empty($data)) $data.=", ";
                    $data.=" {$k} = '{$v}'";
                }
            }
            if(strtotime($datetime_end) < strtotime($datetime_start)){
                $resp['status'] = 'failed';
                $resp['err_msg'] = "Date and Time Schedule is Invalid.";
            }else{
                $d_start = strtotime($datetime_start);
                $d_end = strtotime($datetime_end);
                $chk = $this->conn->query("SELECT * FROM `schedule_list` where (('{$d_start}' Between unix_timestamp(datetime_start) and unix_timestamp(datetime_end)) or ('{$d_end}' Between unix_timestamp(datetime_start) and unix_timestamp(datetime_end))) ".(($id > 0) ? " and id !='{$id}' " : ""))->num_rows;
                if($chk > 0){
                    $resp['status'] = 'failed';
                    $resp['err_msg'] = "The schedule is conflict with other schedules.";
                }else{
                    if(empty($id)){
                        $sql = "INSERT INTO `schedule_list` set {$data}";
                    }else{
                        $sql = "UPDATE `schedule_list` set {$data} where id = '{$id}'";
                    }
                    $save = $this->conn->query($sql);
                    if($save){
                        $resp['status'] = 'success';
                        $this->settings->set_flashdata('success', " Schedule successfully saved.");
                    }else{
                        $resp['status'] = 'failed';
                        $resp['sql'] = $sql;
                        $resp['qry_error'] = $this->conn->error;
                        $resp['err_msg'] = "There's an error while submitting the data.";
                    }
                }
            }
            return json_encode($resp);
        }
        function delete_schedule(){
            extract($_POST);
            $delete = $this->conn->query("DELETE FROM `schedule_list` where id = '{$id}'");
            if($delete){
                $resp['status'] = 'success';
                $this->settings->set_flashdata('success', "Schedule successfully deleted.");
            }else{
                $resp['status'] = 'failed';
                $resp['error'] = $this->conn->error;
            }
            return json_encode($resp);
        }

        function get_schedule(){
            extract($_POST);
            $data = array();
            $qry = $this->db->query("SELECT * FROM schedule_list where user_id = 0 or user_id = $user_id");
            while($row=$qry->fetch_assoc()){
                if($row['is_repeating'] == 1){
                    $rdata = json_decode($row['repeating_data']);
                    foreach($rdata as $k =>$v){
                        $row[$k] = $v;
                    }
                }
                $data[] = $row;
            }
                return json_encode($data);
        }


    }