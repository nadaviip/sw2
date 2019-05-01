<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Update
 *
 * @author mohamed mokhtar
 */
class Update{
    private $table;
    private $connection;
     private $dataBase;
    public function Update($table,$dataBaseVars)
    {
        $this->dataBase = DataBase::createConccection($dataBaseVars);
        $this->dataBase->connect();
        $this->table=$table;
        $this->connection= $this->dataBase->getConeection();
        
        
    }
    public function updateDataById($idKey,$id,$data)
    {
        if(!is_array($data))
        {
            throw new Exception("the data must be an array");
        }
    
       foreach($data as $key=>$value)
       {
          $elements [] = $key." = '$value'";
       }
       $string= implode($elements, ",");
       $query= "update $this->table set $string where $idKey = '$id'";
       if(!$this->connection->query($query))
       {
           $this->close();
          throw new Exception("can't update the item   $this->table");
       }
       return true;
        
        
        
    }
    public function closeDataBase()
    {
        $this->dataBase->close();
    }
}
