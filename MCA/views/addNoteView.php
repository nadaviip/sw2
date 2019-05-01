<?php

session_start();
if(!isset($_SESSION['userName_sm']))
{
    header("location:index.php");

    die();
}
?>
<div class="bar">
    <label style="color:White;text-align: center">Add New Note</label>
</div> 
<section id="login">
    <form id="registerForm" name="registerForm" method="post" action="?page=controllers/addNote_c" autocomplete="on" enctype="multipart/form-data">
        <input class = "input-lg <?php  $st = ";document.getElementsByClassName('errorSpans')[0].innerHTML = ' '";$st1="this.classList.remove('errorFields');this.classList.add('recoveryFields')" ;if(!empty($errorsMessages["note_title"]))echo "errorFields\"oninput = \"$st1$st\"";?>" id="note_title" name="note_title" type="text" placeholder="Enter note title here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter note title here !'"  value="<?php if($errorsMessages['note_title']==null)echo $informationToAdd['note_title']; ?>"><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['note_title'] ?></span></span>
        <textarea id="note_desc" name="note_desc"  placeholder="Enter note description here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter note description here !'"class ="input-lg <?php  $st = ";document.getElementsByClassName('errorSpans')[1].innerHTML = ' '";$st1="this.classList.remove('errorFields');this.classList.add('recoveryFields')" ;if(!empty($errorsMessages["note_desc"]))echo "errorFields\"oninput = \"$st1$st\"";?>" ><?php
            if($errorsMessages['note_title']==null)
                if($informationToAdd['note_title'] != null)
                    echo $informationToAdd['note_title']; 
            ?></textarea><span class="parentSpan"><span class="errorSpans"><?php echo $errorsMessages['note_title'] ?></span></span>
        <input class = "btn-lg button-A" id="AddNoteBtn"  type="submit" value="Add" onmousedown="this.classList.remove('button-A');this.classList.add('button-B');" onmouseup="this.classList.remove('button-B');this.classList.add('button-A');" onmouseout="this.classList.remove('button-B');this.classList.add('button-A');">
    </form>
        
        
        
</section>