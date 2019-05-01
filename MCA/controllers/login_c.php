<?php
include '../includes/autoLoader.php';
 $_GET = Validator::santasizeArray($_GET);
 $_POST = Validator::santasizeArray($_POST);
 print ($_GET);
 if ($_GET)
 {
     if (isset($_GET['page']) && $_GET['page'])
     {
         header("location:../views/loginView.php");
     }
                   
 }                           
else if($_POST)
{
    $email=$_POST['email'];
    $password=$_POST['userPassword'];
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
          $_SESSION['user_id']=$user['st_id'];
          $_SESSION['name'] = $user['st_Name'];
          $login->closeDataBase();
         header("location:../index.php");
             
     }
     else
     {
         $message="E-mail or Password is inccorrect";
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
    
    header("location:../views/registerView.php");
}
    
    
    
    
    
    
    
    
    
    
    
?>