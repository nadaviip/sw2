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

class Register{         
    private  $add;
    private static $instance;
    private $information;
    private function Register($information)
    {
        $this->information = $information;
        $this->add = new Add("student", "../includes/dataBaseVars.php");
    }
     public static function createRegister($information)
    {
        if (!isset(Register::$instance)) {
            Register::$instance = new Register($information);
        }
        return Register::$instance;
    }
    
    public  function registerStudent()
    {
          $this->add->addData($this->information);
       
    }
    public function isRegistered()
    {
        
        if($this->add->dataExists("email", $this->information['email']) == TRUE)
           return true;
       else
           return false;
    }
    public function closeDataBase()
    {
        $this->$add->closeDataBase();
    }

}
