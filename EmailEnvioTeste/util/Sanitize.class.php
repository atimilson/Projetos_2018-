<?php

#Sanitize class
#Handy Framework
#Developed by Leandro Curioso [leandro.curioso@gmail.com]

class Sanitize { 
		
		//Atributes	
		private $value;
		private $sanitizer;
		private $filter;
	
		//Methods
		
		//Construct
		public function __construct($value , $filter){
			//Set atributes
			$this->value = $value;
			$this->filter = $filter;
			
			//If array
			if(is_array($this->value)) 
			{
				$returnResult = self::sanitizeArray();
			}//If regular value
			else{
				$returnResult = self::sanitizeVar();
			}
			$this->value = $returnResult;
			return $this->value;
		}
		
		//Switch filter
		private function switchSanitizer(){
			strtolower( $this->filter );
			if($this->filter == "specialchars") {
				$this->sanitizer = FILTER_SANITIZE_SPECIAL_CHARS;
			}elseif($this->filter == "string"){
				$this->sanitizer = FILTER_SANITIZE_STRING;
			}elseif($this->filter == "email"){
				$this->sanitizer = FILTER_VALIDATE_EMAIL;
			}elseif($this->filter == "url"){
				$this->sanitizer = FILTER_VALIDATE_URL;
			}elseif($this->filter == "ip"){
				$this->sanitizer = FILTER_VALIDATE_IP;
			}elseif($this->filter == "int"){
				$this->sanitizer = FILTER_VALIDATE_INT;
			}elseif($this->filter == "float"){
				$this->sanitizer = FILTER_VALIDATE_FLOAT;
			}elseif($this->filter == "boolean"){
				$this->sanitizer = FILTER_VALIDATE_BOOLEAN;
			}
			return $this->sanitizer;
		}
		
		//Filter array
		private function sanitizeArray() {
				$result = array();
				$finalResult = array();
				$result = filter_var_array( $this->value , self::switchSanitizer()  );		
					foreach( $result as $r => $name )
					{
						if($name or $name == "0"){
							$finalResult[$r] = $name;		
						}
					}
				return $finalResult; 
		}
		
		//Filter var
		private function sanitizeVar() {
			return filter_var( $this->value, self::switchSanitizer() );
		}
		
		//Get value
		public function get($key = NULL) {
			if($this->value[$key] != NULL){
				$r = $this->value[$key];
			}else{
				$r = $this->value;
			}
			return $r; 
		}
}

?>