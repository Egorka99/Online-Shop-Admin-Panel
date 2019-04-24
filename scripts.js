//Модальное окно
var delModal = document.getElementById('deleteModal');
var addModal = document.getElementById('addModal');
var delBtn = document.getElementsByClassName("deleleModalBtn"); 
var addBtn = document.getElementsByClassName("additionModalBtn");
var span = document.getElementsByClassName("close");

for (var i = 0; i < delBtn.length; i++) {      
    delBtn[i].onclick = function() {   
    delModal.style.display = "block";   
    }      
}       
 
for (var i = 0; i < addBtn.length; i++) {   
    addBtn[i].onclick = function() {   
    addModal.style.display = "block";   
    }    
}    
 
for (var i = 0; i < span.length; i++) { 
        span[i].onclick = function() {  
        delModal.style.display = "none";
        addModal.style.display = "none";
    }  
} 
     
window.onclick = function(event) {
    if (event.target == delModal || event.target == addModal) {
        delModal.style.display = "none";
        addModal.style.display = "none";
    } 
} 


//Вкладки
const tabLinks = document.querySelectorAll(".tabs a");
const tabPanels = document.querySelectorAll(".tabs-panel");

for (let el of tabLinks) {
  el.addEventListener("click", e => {
    e.preventDefault();

    document.querySelector(".tabs li.active").classList.remove("active");
    document.querySelector(".tabs-panel.active").classList.remove("active");

    const parentListItem = el.parentElement;
    parentListItem.classList.add("active");
    const index = [...parentListItem.parentElement.children].indexOf(parentListItem);

    const panel = [...tabPanels].filter(el => el.getAttribute("data-index") == index);
    panel[0].classList.add("active");
    });
  }
 

//Кнопка "Удалить" 

$('#del_button').on('click', function(event) {
                                           
    var table = $("#table option:selected").text();
    var id = $('#del_id').val(); 
  
     $.ajax({  
        type: "POST",
        url: "delete.php", //куда отправлять форму 
        data: "table=" + table + "&id=" + id,
        success: function(text){ 
            if (text == true){   
                alert("Успешно!"); 
            } else {         
                alert("Ошибка");
            }   
        }     
    });  

    $("#table").val('');   
    $("#del_id").val('');   

});   
   
//кнопка "Добавить"
$('#add_button').on('click', function(event) {
   var table = $("#add_table option:selected").text();   
   var titles = "";  
   var values = "";   

    $.ajax({   
        type: "POST",
        url: "showAdditionPanel.php", //куда отправлять форму 
        data: "table=" + table,  
        success: function(text){  
            if (text != false){    
 
                titles = text;    
    
                var columns = text.split(',');   
 
                for (var i = 0; i < columns.length; i++) {
                    values += "'" + prompt(columns[i]) + "',"; 
                } 
 
                values = values.substring(0, values.length - 1); 
          
                $.ajax({         
                    url: 'addition.php', 
                    type: 'POST',     
                    data: "table=" + table + "&titles=" + titles + "&values=" + values,
                    success: function(text) { 
                        if (text == true) {  
                            alert("Успешно");   
                        }         
                        else {      
                            alert("Ошибка"); 
                        }  
                    }      
                })    
     
            } else {             
                alert("Ошибка");    
            }     
        }           
    });   
     
 
    $("#add_table").val('');   

});  