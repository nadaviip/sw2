<?php
    
session_start();
if(!isset($_SESSION['userName_sm']))
{
    header("location:index.php");
        
    die();
}
?>
<div class="bar">
    <label style="color:White;text-align: center">Add New To-Do List</label>
</div> 
<div class="container">
    <div id="content">
        <div class="clearfix"></div>
        <div class="add-list-container">
            <p id="addnewTask">
            <h3> 
                <label for="new-task">Add Task</label>
            </h3>
            <input id="new-task" type="text">
            <button id = "add-taks-btn" >Add</button>
            </p>
            
            <h3 id="todo-name">Todo</h3>
            <ul id="incomplete-tasks"> 
            </ul>
            
            <h3>Completed</h3>
            <ul id="completed-tasks">
            </ul>
        </div>
        <section class="formSection" >
            <form id = "addToDoForm" name="addToDoForm" method="post" action="?page=controllers/addList_c" autocomplete="on" >
                <input class = "input-lg <?php  $st = ";document.getElementsByClassName('errorSpans')[0].innerHTML = ' '";$st1="this.classList.remove('errorFields');this.classList.add('recoveryFields')" ;if(!empty($errorsMessages["list_name"]))echo "errorFields\"oninput = \"$st1$st\"";?>" id="note_title" name="list_name" type="text" placeholder="Enter to-do name here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter to-do name  here !'"  value="<?php if($errorsMessages['list_name']==null)echo $informationToAdd['list_name']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['list_name'] ?></span></span> 
                <input class = "btn-lg button-A" id="addToDoBtn"   type="submit" value="Add" onmousedown="this.classList.remove('button-A');this.classList.add('button-B');" onmouseup="this.classList.remove('button-B');this.classList.add('button-A');" onmouseout="this.classList.remove('button-B');this.classList.add('button-A');">
            </form>
        </section>
        
        
        
    </div>
    
</div>


