<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Add
 *
 * @author mohamed mokhtar
 */

class Add {
    private $table;
    private $connection;
    private $dataBase;
    public function Add($table,$dataBaseVars)
    {
        $this->dataBase = DataBase::createConccection($dataBaseVars);
         $this->dataBase->connect();
        $this->table=$table;
        $this->connection= $this->dataBase->getConeection();
        

    }
    public function addData($data)
    {
        if(!is_array($data))
        {
            throw new Exception("the data must be an array");
        }
    
       foreach($data as $key=>$value)
       {
           $keys[]=$key;
           $values[]=$value;
       }
       $keysString= implode($keys, ",");
       $valuesString=  implode($values, '","').'"';
       $query= "insert into $this->table($keysString) values(\"$valuesString)";
       if(!$this->connection->query($query))
       {
           throw new Exception("can't insert int table $this->table");
       }
        
        
        
    }
    public  function dataExists($idKey,$id)
    {
        
       $query="select $idKey from $this->table where $idKey='$id'";
       $result = $this->connection->query($query);
       if(!$result)
           throw new Exception ("cannot  pick the id ");
       else
           {
           if($result->num_rows>0)
               return true;
           else 
               return false;
               
           
           }
        
        
    }

 public  function dataExistsByColumns($Columns,$idKey)
    {
        
            
     foreach($Columns as $key=>$value)
       {
           $keys[]="$key = '$value'";
       }
       $keysString= implode($keys, " and ");
       $query="select $idKey from $this->table where $keysString";
       $result = $this->connection->query($query);
       if(!$result)
           throw new Exception ("cannot  pick the id ");
       else
           {
           if($result->num_rows>0)
               return $result->fetch_assoc()['id'];
           else 
               return false;
               
           
           }
        
        
    }
    public function closeDataBase()
    {
        $this->dataBase->close();
    }

}
