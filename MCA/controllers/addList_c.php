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

    print_r($_POST);
    }
else
{
    include getFileToInclude('../views/addListView.php');
}
