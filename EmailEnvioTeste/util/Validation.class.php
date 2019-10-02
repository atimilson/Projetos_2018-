<?php 

#Toolkit class
#Handy Framework
#Developed by Michael Lopes [michael.s.lopes@hotmail.com]

class Validation {

   private $fieldsValidation;
   private $post;
   private $messages = "";
   private $isValid = true;


   public function __construct($fieldsValidation, $post){
       $this->fieldsValidation = $fieldsValidation;
       $this->post = $post;
   }

   public function isValid() {
       $this->validadeRequired();
       return $this->isValid;
   }

   public function getMsg() {
       return $this->messages;
   }

   public function validadeRequired() {
       if(isset($this->fieldsValidation)) {
          $arr = array_filter($this->fieldsValidation, array($this, 'doFilterRequired'));
          if(isset($arr) && count($arr) > 0) {
            foreach($arr as $item) {
                if(isset($this->post[$item['key']])) {
                    if(trim( $this->post[$item['key']]) == '') {
                       $this->isValid = false;
                       $this->addMessage($item['description'], $item['rule']);
                    }
                } else {
                    $this->isValid = false;
                    $this->addMessage($item['description'], $item['rule']);
                }
            }
          }
       }
   }

   private function doFilterRequired($var) {
       return $var['rule'] == "required";
   }

   private function addMessage($campo, $type) {
       if($type == "required") {
           $this->messages .= '<li><span>O campo <strong>'.$campo.'</strong> é obrigatório!</span></li>';
       }
   }
   

} 