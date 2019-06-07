<?php
class View {
    
    public function __construct() {
    }
    
    public static function render($str, $response = null){
        if(!isset($_SESSION)) session_start();
        # Passamos os dados enviados por parâmetro para SESSION
        foreach ($response as $key => $value) {
        	$_SESSION[$key] = $value;	
        }        
        # Popula a view
        include ($_SERVER['DOCUMENT_ROOT'] . "/src/views/" . $str . ".php");
    }

    public static function redirect($str){
        if(!isset($_SESSION)) session_start();
        # Passamos os dados enviados por parâmetro para SESSION
        $_SESSION['response'] = $response;
        # Popula a view
        header('location: ' . $str);        
    }

}

?>