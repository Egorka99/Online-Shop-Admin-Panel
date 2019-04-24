<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online-магазин - Заказы</title>
	<link rel="stylesheet" href="style.css"> 
</head>
<body>  
  
	<?php include 'header.php'; ?>	   
 
    
<section class="tabs">
  	<div class="tabs-container">  
	  <div class="tabs-content">  
	    <div class="tabs-panel active" data-index="0">
	     	<h2 style="display: inline;"><?php echo mysql_num_rows(mysql_query('select * from Заказ')); ?> Заказа-(ов)</h2>     
        <button class="button additionModalBtn" href="#"><img class="add-img" src="img/plus.png" alt="">Добавить товар</button>
        <button class="button deleleModalBtn" href="#"><img class="add-img" src="img/delete.png" alt="">Удалить товар</button>    
 
<?php    
 
$ath = mysql_query("select * from Заказ;");
if($ath)
{ 
  // Определяем таблицу и заголовок   
  echo "<table border=1>";
  echo "<tr><td>id</td><td>Дата заказа</td><td>Стоимость заказа</td><td>ID покупателя</td><td>Количество товаров</td></tr>"; 
  // Так как запрос возвращает несколько строк, применяем цикл 
  while($product = mysql_fetch_array($ath)) 
  {  
    $prod_count = mysql_num_rows(mysql_query("select * from Заказ_Товар Where id= ".$product['id'])); 
    echo "<tr>  
    <td>".$product['id']."&nbsp;</td>   
    <td>".$product['Дата_заказа']."&nbsp </td> 
    <td>".$product['Стоимость_заказа']."&nbsp;</td>
    <td>".$product['ID_покупателя']."&nbsp;</td>
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
<h3>Товары в заказе</h3> 
<?php   
  
$ath = mysql_query("select * from Заказ_Товар;");
if($ath)
{ 
  // Определяем таблицу и заголовок     
  echo "<table border=1>"; 
  echo "<tr><td>id</td><td>ID товара</td></tr>"; 
  // Так как запрос возвращает несколько строк, применяем цикл 
  while($product = mysql_fetch_array($ath))
  { 
    echo "<tr> 
    <td>".$product['id']."&nbsp;</td>  
    <td>".$product['ID_товара']."&nbsp </td> 
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
    </select>   

      <label for="del_id">ID удаляемой записи</label>
      <input id="del_id" type="text">
      <button id="del_button" class="button">Удалить</button>
    </div>
  </div>
  
</div>   
	
<?php if(mysql_close($dbcnx)) // разрываем соединение
	{
	  echo("Соединение с базой данных прекращено");
	}
	else
	{
	  echo("Не удалось завершить соединение");
	}  
?>
   
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts.js"></script>

</body> 
</html>     