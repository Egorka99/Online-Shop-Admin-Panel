<?php  
include 'connect.php';  
  
$table = $_POST["table"];    
   
$ath = mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'online_shop' AND TABLE_NAME = '".$table."' ;");               
      
while ($row = mysql_fetch_array($ath, MYSQL_ASSOC)) { 
    $output .= $row['COLUMN_NAME'].",";        
}    
	$output = substr($output,0,-1); 
             
if($ath) {                 
	echo $output;          
}      
else {   
	echo false;     
}      
    
?>          