<?php

// base class with member properties and methods
class Operation {

   private $message;
   private $result;

   public function __construct() {

   }
    
   public function setMessage($msg) {
       $this->message = $msg;
   }
   
   public function getMessage() {
       return $this->message;
   }
    
   public function setResult($re) {
       $this->result = $re;
   }
   
   public function getResult() {
       return $this->result;
   }
   

} 

?>