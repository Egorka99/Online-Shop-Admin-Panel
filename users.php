<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<title>Online-магазин - Покупатели</title>
	<link rel="stylesheet" href="style.css"> 
</head>
<body>  
 
<?php include 'header.php'; ?>	   
   
<section class="tabs"> 
  	<div class="tabs-container"> 
	  <div class="tabs-content"> 
	    <div class="tabs-panel active" data-index="0">
	     	<div class="tabs-info">
	     		<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Покупатель')); ?> Покупателя-(ей)</h2>    
	     					<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить покупателя</button>
	     		<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить покупателя</button>
	     	</div>
   
<?php      
   
$ath = mysql_query("select * from Покупатель;");  
if($ath) 
{ 
  // Определяем таблицу и заголовок      
  echo "<table border=1>";  
  echo "<tr><td>id</td><td>Логин</td><td>Пароль</td><td>E-mail</td><td>Фамилия</td><td>Имя</td><td>Отчество</td></tr>"; 
  // Так как запрос возвращает несколько строк, применяем цикл 
  while($product = mysql_fetch_array($ath))
  { 
    echo "<tr>  
    <td>".$product['id']."&nbsp;</td>  
    <td>".$product['Логин']."&nbsp </td> 
    <td>".$product['Пароль']."&nbsp </td>  
    <td>".$product['EMail']."&nbsp </td>   
    <td>".$product['Фамилия']."&nbsp </td>  
    <td>".$product['Имя']."&nbsp </td> 
    <td>".$product['Отчество']."&nbsp </td> 
    </tr>";  
  }          
  echo "</table>";  
}  
else
{
  echo "<p><b>Error: ".mysql_error()."</b><p>";
  exit();
} 
?>    

	   <div class="tabs-info">
	   	<h2 style="display: inline;">Банковские карты</h2>    
		<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить карту</button>
     	<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить карту</button>
	   </div>
 
<?php      
   
$ath = mysql_query("select * from Банковские_карты;"); 
if($ath)  
{   
  // Определяем таблицу и заголовок      
  echo "<table border=1>";  
  echo "<tr><td>id</td><td>Номер_карты</td><td>Имя_владельца</td><td>Срок_истечения</td><td>Id_покупателя</td></tr>"; 
  // Так как запрос возвращает несколько строк, применяем цикл 
  while($product = mysql_fetch_array($ath))
  { 
    echo "<tr> 
    <td>".$product['id']."&nbsp;</td>  
    <td>".$product['Номер_карты']."&nbsp </td> 
    <td>".$product['Имя_владельца']."&nbsp </td>  
    <td>".$product['Срок_истечения']."&nbsp </td>    
    <td>".$product['Id_покупателя']."&nbsp </td> 
    </tr>"; 
  }       
  echo "</table>"; 
} 
else
{
  echo "<p><b>Error: ".mysql_error()."</b><p>";
  exit();
} 
?>    

	    </div>
	  </div>  
	</div>  

  	</section>  
  
  	  <!-- Модальное окно добавления записи -->
	  <div id="addModal" class="modal"> 
	   
	  <div class="modal-content">    
	    <div style="background-color: #1da513;" class="modal-header">   
	      <span class="close">&times;</span> 
	      <h2>Добавление записи</h2> 
	    </div>        
	    <div class="modal-body">      
	    	<label for="table">Выбрать таблицу:</label>
	    	<select id="add_table">    
      <option value="Товар">Товар</option> 
      <option value="Категория">Категория</option>    
      <option value="Бренды">Бренды</option>   
      <option value="Заказ">Заказ</option>  
      <option value="Заказ_Товар">Заказ_Товар</option>  
      <option value="Покупатель">Покупатель</option>  
      <option value="Производитель">Производитель</option>   
      <option value="Поставщик">Поставщик</option>  
      <option value="Банковские_карты">Банковские_карты</option>  
      <option value="Поставщик_категория">Поставщик_категория</option>  
			</select>    
			<button id="add_button">Показать таблицу</button>
	    </div>  
	  </div>
	   
	</div>     
  <!-- Модальное окно удаления записи -->
  <div id="deleteModal" class="modal">
  
  <div class="modal-content"> 
    <div class="modal-header"> 
      <span class="close">&times;</span>  
      <h2>Удаление записи</h2>   
    </div>    
    <div class="modal-body">     
    	<label for="table">Выбрать таблицу:</label> 
    	<select id="table">     
      <option value="Товар">Товар</option> 
      <option value="Категория">Категория</option>    
      <option value="Бренды">Бренды</option>   
      <option value="Заказ">Заказ</option>  
      <option value="Заказ_Товар">Заказ_Товар</option>  
      <option value="Покупатель">Покупатель</option>  
      <option value="Производитель">Производитель</option>   
      <option value="Поставщик">Поставщик</option>  
      <option value="Банковские_карты">Банковские_карты</option>  
      <option value="Поставщик_категория">Поставщик_категория</option>  
		</select>    

     	<label for="del_id">ID удаляемой записи</label>
     	<input id="del_id" type="text">
     	<button id="del_button">Удалить</button>
    </div>
  </div>
  
</div>   
	
	<?php include 'close.php'; ?>
   
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts.js"></script>

</body> 
</html>      