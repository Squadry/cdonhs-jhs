<?php 
    require_once "assets/class/config.php";

    global $conn;
    $sql = $conn->prepare("SELECT user_id, firstname, lastname FROM user");
    $sql->execute();
  
    $memberlist = $sql->fetchAll();
    foreach ($userlist as $row):
        echo("<option value=".$row["id"].">".$row["firstname"]." ".$row["lastname"]."</option>");
        
    endforeach;
    
?>