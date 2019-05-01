<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Delete
 *
 * @author mohamed mokhtar
 */
class Delete{
    private $table;
    private $connection;
    private $dataBase;
    public function Delete($table,$dataBase1Vars=null)
    {
        $this->dataBase = DataBase::createConccection($dataBase1Vars);
        $this->dataBase->connect();
        $this->table=$table;
        $this->connection= $this->dataBase->getConeection();

    }
    public function deleteDataById($idKey,$id)
    {
        $query = "delete from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("can't delete your data from the database");
       
        return TRUE;
            
        
        
        
        
    }
    public function doesDataExist($idKey,$id)
    {


        
        $query="select $idKey from $this->table where $idKey='$id'";
        $result=  $this->connection->query($query);
        if($result==false)
        {
            $this->close();
            throw new Exception("cannot get the data");
        }
      else {
        if($result->num_rows>0){
         
           return true;
        }
      else{
             return false;
           }
      }
    }

    

}
