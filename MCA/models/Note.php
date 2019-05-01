<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Note
 *
 * @author Mohamed Mokhtar
 */
class  Note implements Changable{
    private $title;
    private $desc;
    private $day;
    private $month;
    private $year;
    private $studentId;
    private $addObj;
    private static $dataBaseVars;
    
    public function Note($dataBaseVars, $title = null, $desc = null, $day = null, $month = null, $year = null, $studentId = null)
    {
        $this->addObj = new Add("note", $dataBaseVars);
        $this->setTitle($title);
        $this->setDesc($desc);
        $this->setDay($day);
        $this->setMonth($month);
        $this->setYear($year);
        $this->setStudentId($studentId);
    }
    
   public function getTitle()
    {
        return $this->title;
    }
    function getDesc()
    {
        return $this->desc;
    }
   public function getDay()
    {
        return $this->day;
    }
   public function getMonth()
    {
        return $this->month;
    }
   public function getYear()
    {
        return $this->year;
    }
    public function getStudentId()
    {
        return $this->studentId;
    }
   public function setTitle($title)
    {
      $this->title = $title;
    }
   public function setDesc($desc)
    {
      $this->desc = $desc;
    }
   public function setDay($day)
    {
      $this->day = $day;
    }
   public function setMonth($month)
    {
      $this->month = $month;
    }
   public function setYear($year)
    {
      $this->year = $year;
    }
   public function setStudentId($studentId)
    {
      $this->studentId = $studentId;
    }
    public static function getDataBaseVars()
    {
        return Note::$dataBaseVars;
    }
    public static function setDataBaseVars($dataBaseVars)
    {
        Note::$dataBaseVars = $dataBaseVars;
    }
    public function closeDataBase()
    {
        $this->addObj->closeDataBase();
    }
    public function add() {
       $information['note_name'] = $this->getTitle();
       $information['note_desc'] =  $this->getDesc();
       $information['note_day'] =  $this->getDay();
       $information['note_month'] =  $this->getMonth();
       $information['note_year'] =  $this->getYear();
        $information['student_id'] =  $this->getStudentId();
       $this->addObj->addData($information);    
     
    }


    public static function view($noteId) {
        $displayObj = new Display("note", Note::$dataBaseVars);
        return $displayObj.getDataById("note_id", $noteId);
    }

    public static function viewAll($studentId) {
         $displayObj = new Display("note", Note::$dataBaseVars);
         return $displayObj->getDataById("student_id",$studentId,true);
    }

    public static function edit($noteId, $information) {
         $updateObj = new Update("product", Note::$dataBaseVars);
         $updateObj->updateDataById('note_id', $noteId, $information);
    }

    public static function exists($noteId) {
        $displayObj = new Display("note", Note::$dataBaseVars);
        return $displayObj->dataExists("note_id", $noteId);
    }
    public static  function deleteById($noteId)
    {
        $deleteObj = new Delete("note", Note::$dataBaseVars);
        $deleteObj->deleteDataById("note_id", $noteId);
        
    }

}
