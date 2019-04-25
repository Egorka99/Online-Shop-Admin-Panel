<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online-магазин</title>
	<link rel="stylesheet" href="style.css"> 
</head>
<body>  

	<?php include 'header.php'; ?>	   
   
  	<section class="tabs">
  		<div class="tabs-container">

		  <ul class="tabs">
		    <li class="active">
		      <a href="">Товары</a>
		    </li>					 
		    <li>
		      <a href="">Категории</a> 
		    </li>
		    <li>
		      <a href="">Бренды</a>
		    </li>   
		    <li>
		      <a href="">Производители</a>
		    </li>  
		  </ul>
    
	  <div class="tabs-content">
	    <div class="tabs-panel active" data-index="0"> 
	     	<div class="tabs-info">
	     		<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Товар')); ?> Товара-(ов)</h2>     
	     		<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить товар</button>
	     					<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить товар</button>
	     	</div> 
   
<?php       
     
$ath = mysql_query("select * from Товар;"); 
if($ath) 
{ 
  // Определяем таблицу и заголовок 
  echo "<table border=1>";
  echo "<tr><td>ID товара</td><td>Название товара</td><td>Описание товара</td><td>Цена товара</td><td>ID Категории</td><td>ID Бренда</td></tr>"; 
  // Так как запрос возвращает несколько строк, применяем цикл
  while($product = mysql_fetch_array($ath))
  { 
    echo "<tr>   
    <td>".$product['id']."&nbsp;</td>   
    <td>".$product['Название_товара']."&nbsp </td> 
    <td>".$product['Описание_товара']."&nbsp;</td>
    <td>".$product['Цена_товара']."&nbsp;</td>
    <td>".$product['ID_Категории']."&nbsp;</td> 
    <td>".$product['ID_Бренда']."&nbsp;</td>
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
	    <div class="tabs-panel" data-index="1">
	      	<div class="tabs-info">
	      		<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Категория')); ?> Категории-(й)</h2>    
	      			     	<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить товар</button> 
	      					<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить товар</button> 
	      	</div>
	     	<?php
				$ath = mysql_query("select * from Категория;");
				if($ath) 
				{  
				  // Определяем таблицу и заголовок 
				  echo "<table border=1>"; 
				  echo "<tr><td>ID категории</td><td>Название категории</td><td>Количество товаров</td></tr>"; 
				  // Так как запрос возвращает несколько строк, применяем цикл
				  while($product = mysql_fetch_array($ath))
				  {
				  	$prod_count = mysql_num_rows(mysql_query("select * from Товар Where ID_Категории= ".$product['id']));  
				    echo "<tr>    
				    <td>".$product['id']."&nbsp;</td> 
				    <td>".$product['Название_категории']."&nbsp </td> 
				    <td>".$prod_count."&nbsp;</td> 
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
	    <div class="tabs-panel" data-index="2">      	
	     	<div class="tabs-info">
	     		<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Бренды')); ?> бренда-(ов)</h2>     
	     		<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить товар</button>
	     		<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить товар</button>    
	     	</div> 
	     	<?php       
				$ath = mysql_query("select * from Бренды;");
				if($ath)  
				{   
				  // Определяем таблицу и заголовок   
				  echo "<table border=1>"; 
				  echo "<tr><td>ID бренда</td><td>Название бренда</td><td>Количество товаров</td></tr>"; 
				  // Так как запрос возвращает несколько строк, применяем цикл     
				  while($product = mysql_fetch_array($ath))
				  {    
				  	$prod_count = mysql_num_rows(mysql_query("select * from Товар Where ID_Бренда= ".$product['id']));  
				    echo "<tr>       
				    <td>".$product['id']."&nbsp;</td>  
				    <td>".$product['Название_бренда']."&nbsp </td> 
				    <td>".$prod_count."&nbsp;</td>   
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
	    	    <div class="tabs-panel" data-index="3">      	
	     	<div class="tabs-info">
	     		<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Производитель')); ?> производителя-(ей)</h2>
	     		<button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить производителя</button>
	     		<button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить производителя</button>    
	     	</div>  
	     	<?php          
				$ath = mysql_query("select * from Производитель;");
				if($ath)  
				{    
				  // Определяем таблицу и заголовок      
				  echo "<table border=1>";    
				  echo "<tr><td>id</td><td>Название_производителя</td><td>Количество товаров</td></tr>"; 
				  // Так как запрос возвращает несколько строк, применяем цикл     
				  while($product = mysql_fetch_array($ath)) 
				  {    
				  	$prod_count = mysql_num_rows(mysql_query("select * from Производитель Where id= ".$product['id']));  
				    echo "<tr>       
				    <td>".$product['id']."&nbsp;</td>  
				    <td>".$product['Название_производителя']."&nbsp </td> 
				    <td>".$prod_count."&nbsp;</td>   
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
			<button id="add_button" class="button">Показать таблицу</button>
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
     	<button id="del_button" class="button">Удалить</button>
    </div>
  </div>
  
</div>  
	 
	<?php include 'close.php'; ?> 
   
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts.js"></script>

</body> 
</html>    