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
$_POST = Validator::santasizeArray($_POST);
if($_POST)
{
       
      try{
          $studentId = $_SESSION['user_id'];
          $keys = "`note_name`, `note_desc`";
          $itemsToAdd = assignArrWKeys($_POST, $keys);
      if($itemsToAdd==false)
         throw new Exception ("<h2 class='sectionTitle error'>stop trying to hack this solid structure</h2>");
            $rules = array(
            "note_name"=>"santasizeString",
            "note_desc"=>"santasizeString"
             );
            
            $itemsToAdd = Validator::santasizeArray($itemsToAdd, $rules);
           /* $rules = array(
            "note_name"=>"isValidRequired&isValidString",
            "note_desc"=>"isValidRequired&isValidString",
             );
            
            $errors = Validator::validateArray($itemsToAdd, $rules);     */
            $isThereError = false;
            if($errorsMessages != false)
            {
                 $isThereError = true;
                 echo"hell";
            }

            if($isThereError)
            {
                 include getFileToInclude('views/addNoteView.php');
                 
            }
            else 
                {
                 $day = date("d");
                 $month = date("m");
                 $year = date("Y");
                 $dataBaseVars = getFileToInclude("../includes/dataBaseVars.php");
                 $noteObj = new Note($dataBaseVars,$itemsToAdd['note_name'], $itemsToAdd['note_desc'],$day, $month, $year, $studentId);
                 $noteObj->add();         
                 if(!$isThereError )
                 {
                     include getFileToInclude('../controllers/viewNotes_c.php');
                 }
                 else
                 {  
                     include getFileToInclude('../views/viewNotesView.php'); 
                 }

               }

          }
        catch (Exception $ex)
        {
            echo "<h2 class='sectionTitle actionMessage' >{$ex->getMessage()}<h2>";;
        }
       

    
    }
else
{
    include getFileToInclude('../views/addNoteView.php');
}
