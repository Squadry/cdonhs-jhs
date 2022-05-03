<?php 
    require_once "assets/class/config.php";

    global $conn;
    $sql = $conn->prepare("SELECT item_id, item_name, quantity FROM item");
    $sql->execute();
  
    $memberlist = $sql->fetchAll();
    foreach ($itemlist as $row):
        echo("<option value=".$row["item_id"].">".$row["item_name"]." ".$row["quantity"]."</option>");
        
    endforeach;
    
?>