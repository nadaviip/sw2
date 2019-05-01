<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Mohamed Mokhtar
 */
interface Changable {
   public function add();
   public static function view($noteId);
   public static function viewAll($Id);
   public static function edit($id, $information);
   public static function exists($id);
   public static function deleteById($id);
}
