<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChangableFactory
 *
 * @author Mohamed Mokhtar
 */
class ChangableStrategy {
    private $object;
    public function ChangableStrategy($obj)
    {
        $this->object = $obj;
    }
    public function add()
    {
        $this->object->add();
    }
   public  function view($id)
   {
       return $this->object->view($id);
   }
   public  function viewAll($id)
   {
       return $this->object->viewAll($id);
   }
   public  function edit($id, $information)
   {
        $this->object->edit($id, $information);
   }
   public  function exists($id)
   {
       return $this->object->exists($id);
   }
   public  function deleteById($id)
   {
       $this->object->deleteById($id);
   }
}
