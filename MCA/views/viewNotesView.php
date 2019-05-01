<?php
session_start();
if(!isset($_SESSION['userName_sm']))
{
    header("location:index.php");

    die();
}
if($allNotes)
    $notesCount = count($allNotes);
else
    $notesCount = 0;
echo'<div class="bar">
            <label style="color:White;text-align: center">Your Notes</label>
        </div> ';
echo' <section id="container" >';
echo  '<section id="content">';
for($i = 0 ; $i < $notesCount; $i++)
{
    $noteId = $allNotes[$i]['note_id'];
    $noteTitle = $allNotes[$i]['note_name'];
    $noteBody = $allNotes[$i]['note_desc'];
   
    include getFileToInclude("../views/noteView.php");
}
echo"</section>";
echo"</section>";

?>
