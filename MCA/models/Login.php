<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author mohamed mokhtar
 */

class Login{
    private $email;
    private $password;          
    private $connection;
    public static $instance;
    private  $dataBase;
    public static function createLogin($email,$password)
    {
        if (!isset(Login::$instance)) {
            Login::$instance = new Login($email,$password);
        }
        return Login::$instance;
    }
    private function Login($email,$password)
    {
        $this->dataBase =  DataBase::createConccection("../includes/dataBaseVars.php");
        $this->setData($email, $password);
        
    }
      private function setData($email,$password)
  {
      
      $this->email=$email;
      $this->password=$password;
     
      try{
          $this->dataBase->connect();
          
        } catch (Exception $ex) {
              echo $ex->getMessage();
        }
      
  }
    public function user_exists()
    {
        
        $query="select * from student where email='$this->email' and password='$this->password'";
        $result= $this->dataBase->getConeection()->query($query);
        if($result==false)
        {
            $this->close();
            throw new Exception("cannot select the specefied user");
        }
      else {
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
           return $row;
        }
      else{
             return false;
           }
      }
    }
    public function closeDataBase()
    {
        $this->dataBase->close();
    }
}
