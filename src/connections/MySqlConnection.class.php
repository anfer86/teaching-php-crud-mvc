<?php

class MySqlConnection{

	private static $instance = null;
 
    private function __construct(){

    }
 
    public static function getInstance(){

    	if (is_null(self::$instance)){
    		include_once 'config.php';
    		self::$instance = new mysqli($server, $user, $pass, $db);
            self::$instance->set_charset("utf8");
    	}

    	return self::$instance;
    }


}




?>