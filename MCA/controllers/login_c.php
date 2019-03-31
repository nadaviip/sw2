<?php
include '../includes/autoLoader.php';

if($_POST)
{
    $_POST = Validator::santasizeArray($_POST);
    $email=$_POST['email'];
    $password=$_POST['userPassword'];
    $validator = new Validator();
    $email = Validator::santasizeString($email);
    $email = Validator::cleantIt($email,false);
    $password = Validator::santasizeString($password);
    $password = Validator::cleantIt($password,false);
    try{
    $login=  Login::createLogin($email,$password);
     if($user =$login->user_exists())
     {
         session_start();
         $_SESSION['userName_sm']=$user['email'];
          $_SESSION['userId']=$user['st_id'];
          $_SESSION['name'] = $user['st_Name'];
         header("location:../index.php");
      
     }
     else
     {
         $message="E-mail or password is inccorrect";
         include "../views/loginView.php";
     }
    
}
 catch (Exception $ex)
 {
     echo $ex->getMessage();
 }
}

else
{
    
    header("location:../views/loginView.php");
}











?>