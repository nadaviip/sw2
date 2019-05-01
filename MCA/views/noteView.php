<?php
session_start();
if(!isset($_SESSION['userName_sm']))
{
    header("location:index.php");

    die();
}
?>
<div class="note">
    <a href="?page=controllers/viewNotes_c&action=delete&id=<?php echo $noteId?>"><span class="close">×</span></a>
    <div class="note-title"><?php echo $noteTitle?></div>
    <div class ="note-body"><?php echo $noteBody?></div>   
</div>