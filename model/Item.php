<?php

// base class with member properties and methods
class Item {

   private $id;  // id of item
   private $name; // name of item
   private $des; // description of item
   private $date; // date of item
   private $time; // Found time
   private $location; // Found location
   private $imgPath; // imgPath


    public function __construct() {

    }
    
   public function setId($var) {
       $this->id = $var;
   }
   
   public function setName($var) {
       $this->name = $var;
   }
   
   public function setImgPath($var) {
       $this->imgPath = $var;
   }
   
   public function setLocation($var) {
       $this->location = $var;
   }
   
   public function setDate($var) {
       $this->date = $var;
   }
   
   public function setTime($var) {
       $this->time = $var;
   }
   
   public function setDes($var) {
       $this->des = $var;
   }
   
   public function getId() {
       return $this->id;
   }
   
   public function getName() {
       return $this->name;
   }
   
   public function getDes() {
       return $this->des;
   }
   
   public function getDate() {
       return $this->date;
   }
   
   public function getTime() {
       return $this->time;
   }
   
   public function getLocation() {
       return $this->location;
   }
   
   public function getImgPath() {
       return $this->imgPath;
   } 
} 

?>