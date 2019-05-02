<?php

class Display {
    
    private $table;
    private $connection;
    private $dataBase;
    public function Display($table,$dataBase1Vars=null)
    {
        $this->dataBase = DataBase::createConccection($dataBase1Vars);
        $this->dataBase->connect();
        $this->table=$table;
        $this->connection= $this->dataBase->getConeection();
    }
    public function getTheLastId($idKey)
    {
        $query = "SELECT MAX($idKey) AS last_id FROM $this->table";
        $result = $this->connection->query($query);
         if(!$result)
            throw new exception("cann't get your data from the database");
        $num = $result->num_rows;
        if($num>0)
        {
            $data = $result->fetch_assoc();     
            return $data;
        }
       else
            return FALSE;
    }
    public function getALLData($orderBy=null)
    {
        if($orderBy!=null)
        {
            $orderBy="order by ".$orderBy;
        }
        $query = "select *from $this->table $orderBy";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("cann't get your data from the database");
        $num = $result->num_rows;
        if($num>0)
        {
            for($i = 0;$i<$num;$i++)
            {
                $data[$i] = $result->fetch_assoc();
            }
            return $data;
        }
       else
            return FALSE;
    }
        public function getDataById($idKey,$id,$arr=null)
    {
        $query = "select *from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("cann't get your data from the database");
        $num = $result->num_rows;
        if($num>0)
        {
               if($arr!=null)
               {
                   for($i=0;$i<$num;$i++)
                   {
                       $data[]= $result->fetch_assoc();
                   }
               }
               else
                $data = $result->fetch_assoc();     
            return $data;
        }
       else
            return FALSE;
    }
    public function  getDataByIdJoin($idKey,$id,$table2,$idKey2,$col,$idKey3)
    {
        
        $query1 = "select $idKey2 from $this->table where $idKey = '$id'";
        $query = "select $table2.$col from $table2 inner join ($query1) as tb on $table2.$idKey3 = $idKey2";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("cann't get your data from the database in getDataByJoin");
        $num = $result->num_rows;
        if($num>0)
        {
            for($i = 0;$i<$num;$i++)
            {
                $data[$i]= $result->fetch_assoc();
            }
            return $data;
        }
       else
            return FALSE;    
    }
     public function  getDataByIdSimpleJoin($idKey,$id,$table2,$idKey2,$col,$orderBy=null)
    {
         if($orderBy!=null)
        {
            $orderBy="order by $this->table.".$orderBy;
        }
        $query = "select $table2.$col from $table2 inner join $this->table  on $table2.$idKey2 = $this->table.$idKey  where $idKey2 = '$id' $orderBy";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("cann't get your data from the database in getDataByJoin");
        $num = $result->num_rows;
        if($num>0)
        {
                       $data= $result->fetch_assoc();
            
            return $data;
        }
       else
            return FALSE;
        
    }
    public function getAllColumnData($column)
{
        $query = "select $column from $this->table ";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("can't get your data from the database in getAllColumnData");
        $num = $result->num_rows;
        if($num>0)
        {
            for($i = 0;$i<$num;$i++)
            {
                $data[$i]= $result->fetch_assoc();
            }
            return $data;
        }
       else
            return FALSE;
        
}
    public function getAllColumnsData($columns)
{
        if(!is_array($columns))
        {
            throw new Exception("the data must be an array");
        }
       foreach($columns as $key)
       {
          $str[] = $key;
       }
       $string= implode($str, ",");
        $query = "select $string from $this->table ";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("can't get your data from the database in getAllColumnsData");
        $num = $result->num_rows;
        if($num>0)
        {
            for($i = 0;$i<$num;$i++)
            {
                $data[$i]= $result->fetch_assoc();
            }
            return $data;
        }
       else
            return FALSE; 
    
}
    public function getColumnDataById($idKey , $id , $column,$arr=null)
{
        $query = "select $column from $this->table where $idKey = '$id'";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("can't get your data from the database in getColumnDataById");
        $num = $result->num_rows;
        if($num>0)
        {
                if($arr != null)
                {          
                    for($i = 0;$i<$num;$i++)
                    {
                        $data[$i]= $result->fetch_assoc();
                    } 
                }
                else
                $data= $result->fetch_assoc();
            return $data;
        }
       else
            return FALSE;
}
    public function getColumnsDataBycolumns($columnsArr,$orderBy=null,$columns=null,$criteria="=")
{
        if($orderBy!=null)
        {
            $orderBy="order by $this->table.".$orderBy;
        }
        if($columns==null)
            $string="*";
        else if($columns == "*")
        {
            $string="*";
        }
        else{
        foreach($columns as $value)
        {
            $keys[] = $value;
        }
        $string = implode($keys, ",");
        }
        foreach ($columnsArr as $key=>$value)
        {
            $all[] = " $key $criteria '$value' ";
        }
        $cols = implode($all, "and");
        $query = "select $string from $this->table where $cols $orderBy";
        $result = $this->connection->query($query);
        if(!$result)
            throw new exception("can't get your data from the database in getColumnsDataBycolumns$query");
        $num = $result->num_rows;
        if($num>0)
        {
           for($i = 0;$i<$num;$i++)
            {
                $data[$i]= $result->fetch_assoc();
            }
            return $data;
        }
       else
            return FALSE;
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
    public function closeDataBase()
    {
        $this->dataBase->close();
    }
}
