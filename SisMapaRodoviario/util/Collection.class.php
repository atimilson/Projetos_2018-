<?php

#Collection class
#Handy Framework
#Developed by Leandro Curioso [leandro.curioso@gmail.com]

class Collection {
	
	//Atributes
	private $items = array();
	 
	//Methods
	 
	//Add item
	public function addItem($obj, $key = NULL) {
		if ($key == NULL) {
			$this->items[] = $obj;
			} else {
				if (isset($this->items[$key])) {
					throw new Exception("Key $key already in use.");
				} else {
					$this->items[$key] = $obj;
				}
			}
	}
	 
	 //Delete item
	public function deleteItem($key) {
		if (isset($this->items[$key])) {
	 		unset($this->items[$key]);
	 	} else {
	 		throw new Exception("Invalid key $key.");
		}	
	}
	
	//Get item
	public function getItem($key) {
		if (isset($this->items[$key])) {
	 		return $this->items[$key];
	 	} else {
	 		throw new Exception("Invalid key $key.");
	 	}
	}
	
	//Get items
	public function getItems() {
		return $this->items;
	}
	
	//Get key from items
	public function getKeys() {
		return array_keys($this->items);
	}
	
	//Get collection length
	public function getLength() {
		return count($this->items);
	}
	
	//Check if key exists
	public function isKey($key) {
		return isset($this->items[$key]);
	}
	
	//Clear collection
	public function clear() {
		unset($this->items);
		$this->items = array();
	}

	//Print items
	public function show($position = NULL) {
		if($position){
			echo "<pre style='font-size:18px;'>";
			var_dump(self::getItem($position));
			echo "</pre>";
		}else{
			echo "<pre style='font-size:18px;'>";
			var_dump($this->items);
			echo "</pre>";
		}
	}
}

?>