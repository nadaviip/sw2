<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ToDoList
 *
 * @author Mohamed Mokhtar
 */
class ToDoList implements Changable {
    
    private $name;
    private $tasks;
    private $studentId;
    private $addObj;
    private static $dataBaseVars;
    public function ToDoList($dataBaseVars, $name = null, $tasks = null, $studentId = null)
    {
         $this->addObj = new Add("todo_list", $dataBaseVars);
        $this->setName($name);
        $this->setTasks($tasks);
        $this->setStudentId($studentId);
    }
   public function getName()
    {
        return $this->name;
    }
   public function getTasks()
    {
        return $this->tasks;
    }
    public function getStudentId()
    {
        return $this->studentId;
    }
   public function setName($name)
    {
      $this->name = $name;
    }
   public function setTasks($tasks)
    {
      $this->tasks = $tasks;
    }
   public function setStudentId($studentId)
    {
      $this->studentId = $studentId;
    }
    public static function getDataBaseVars()
    {
        return ToDoList::$dataBaseVars;
    }
    public static function setDataBaseVars($dataBaseVars)
    {
        ToDoList::$dataBaseVars = $dataBaseVars;
    }
       public function add() {
       $information['list_name'] = $this->getName();
       $information['student_id'] =  $this->getStudentId();
       $this->addObj->addData($information);    
       $tasks;
       if(!is_array($this->tasks))
            throw new Exception ("tasks variable must be an array ");
       $i = 0;
       $displayObj = new Display("todo_list", $this->getDataBaseVars());
       $listId = $displayObj->getTheLastId("list_id");
       foreach ($tasks as $subject=>$status)
       {
           $tasks[$i] = new Task($this->getDataBaseVars(), $subject, $status, $listId);
           $tasks[$i].add();
           $i++;
       }
        
    }

    public static function deleteById($id) {
        $deleteObj = new Delete("todo_list", ToDoList::$dataBaseVars);
        $deleteObj->deleteDataById("list_id", $id);
        
    }

    public static function edit($id, $information) {
         $updateObj = new Update("todo_list", ToDoList::$dataBaseVars);
         $updateObj->updateDataById('list_id', $id, $information);
    }

    public static function exists($id) {
        $displayObj = new Display("todo_list", ToDoList::$dataBaseVars);
        return $displayObj->dataExists("list_id", $id);
    }

    public static function view($id) {
        
        $displayObj = new Display("todo_list", ToDoList::$dataBaseVars);
        return $displayObj.getDataById("list_id", $id);
    }

    public static function viewAll($studentId) {
        $displayObj = new Display("todo_list", ToDoList::$dataBaseVars);
         return $displayObj->getDataById("student_id",$studentId,true);
        
    }

}
