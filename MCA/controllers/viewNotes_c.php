<?php

session_start();
if(!isset($_SESSION['userName_sm']))
{
    header("location:index.php");

    die();
}
$file = "../models/functions.php";
if (is_file($file) && file_exists($file))
    include $file;
else if(strpos($file, "../") !== false)
        include  str_replace("../", "", $file);
else
    include "../".$file;

include getFileToInclude('../includes/autoLoader.php');
date_default_timezone_set("Africa/Cairo");
$_GET = Validator::santasizeArray($_GET);
 $dataBaseVars = getFileToInclude("../includes/dataBaseVars.php");
 Note::setDataBaseVars($dataBaseVars);

if($_GET['action'] && ($_GET['action'] == "delete" || $_GET['action'] == "edit") && $_GET['id'])
{
    $noteId =  $_GET['id'];
    Note::deleteById($noteId);
    $studentId = $_SESSION['user_id'];
    $allNotes = Note::viewAll($studentId);
    include getFileToInclude('views/viewNotesView.php');
}

else
{
    
   
    $studentId = $_SESSION['user_id'];
    $allNotes = Note::viewAll($studentId);
    include getFileToInclude('views/viewNotesView.php');
}
