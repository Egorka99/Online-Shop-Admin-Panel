<?php

include 'connect.php'; 

$table= $_POST["table"];
$id = $_POST["id"];   
       

$ath = mysql_query("delete from ".$table." where id = ".$id.";");
  
echo $ath;
     
?>    