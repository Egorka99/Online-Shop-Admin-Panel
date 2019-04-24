<?php 
	include 'connect.php';  

	$values = $_POST["values"];    
	$table = $_POST["table"];      
	$titles = $_POST["titles"];    

	$sql = mysql_query("Insert into ".$table." (".$titles.") values (".$values.");");  
   
	if($sql) {                  
		echo true;             
	}          
	else { 
		echo false;     
	}   
 
?>         