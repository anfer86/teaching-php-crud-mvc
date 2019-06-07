<?php

class MySqlConnection{

	private static $connection;
 
    private function __construct(){

    }
 
    public static function getInstance(){

    	if (is_null(self::$connection)){
    		include_once 'config.php';
    		self::$connection = new mysqli($server, $user, $pass, $db);
    	}

    	return self::$connection;
    }


}




?>