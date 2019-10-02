<?php

#Bootstrap class
#Handy Framework
#Developed by Leandro Curioso [leandro.curioso@gmail.com]

class Bootstrap{

	//Methods
	
	//Construct
	public function __construct(ApplicationVO $app){
		self::routeWrapper($app);
		
	}
	
	//Router
	private function routeWrapper(ApplicationVO $app){
		
		/*$parseController = ucfirst(str_replace( "+" , "" , str_replace( "-" , "" ,  $app->getUrl()->getUrlPosition(Config::INDEX_URL) )))."Controller";*/
        
        $parseController = Toolkit::getControllerName($app->getUrl()->getUrlPosition(Config::INDEX_URL)) . "Controller";
		if( $parseController == "Controller") {
			$controller = Config::MAIN_CONTROLLER;
			new $controller($app);
		
		}else{
			if( is_file( ROOT_PATH . Config::CONTROLLER_FOLDER . $parseController . ".class.php" ) ){
				new $parseController($app);
			}else{
				$controller = Config::ERROR404_CONTROLLER;
				new $controller($app);
			}
		}
  }	
}
?>