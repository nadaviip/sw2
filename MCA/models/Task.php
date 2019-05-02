<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author Mohamed Mokhtar
 */
class Task implements Changable {
    private $subject;
    private $status;
    private $listId;
    private $addObj;
    private static $dataBaseVars;
    
    public function Task($dataBaseVars, $subject = null, $status = null, $listId = null)
    {
        $this->addObj = new Add("task", $dataBaseVars);
        $this->setSubject($subject);
        $this->setStatus($status);
        $this->setListId($listId);
    }
    
    public function getSubject()
    {
        return $this->subject;
    }
   public function getStatus()
    {
        return $this->status;
    }
    public function getListId()
    {
        return $this->listId;
    }
   public function setSubject($subject)
    {
      $this->subject = $subject;
    }
   public function setStatus($status)
    {
      $this->status = $status;
    }
   public function setListId($listId)
    {
      $this->listId = $listId;
    }
    public static function getDataBaseVars()
    {
        return Task::$dataBaseVars;
    }
    public static function setDataBaseVars($dataBaseVars)
    {
        Task::$dataBaseVars = $dataBaseVars;
    }
    public function add() {
       $information['subject'] = $this->getSubject();
       $information['status'] =  $this->getStatus();
       $information['list_id'] =  $this->getListId();
       $this->addObj->addData($information);    
        
    }

    public static function deleteById($id) {
        $deleteObj = new Delete("task", Task::$dataBaseVars);
        $deleteObj->deleteDataById("task_id", $id);
        
    }

    public static function edit($id, $information) {
         $updateObj = new Update("task", Task::$dataBaseVars);
         $updateObj->updateDataById('task_id', $id, $information);
    }

    public static function exists($id) {
        $displayObj = new Display("task", Task::$dataBaseVars);
        return $displayObj->dataExists("task_id", $id);
    }

    public static function view($id) {
        
        $displayObj = new Display("task", Task::$dataBaseVars);
        return $displayObj.getDataById("task_id", $id);
    }

    public static function viewAll($listId) {
        $displayObj = new Display("task", Task::$dataBaseVars);
         return $displayObj->getDataById("list_id",$listId,true);
        
    }

}
