<?php

class NoticiaModel{
  
  private $noticia_id;
  private $titulo;
  private $data;
  private $conteudo;
  
  function __construct(){
  }

  function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  function __get($atributo){
    return $this->$atributo;
  }

  function __toString(){
    $str = '| ';    
    foreach ( $this as $key => $value ) {
          $str = $str . $key . ': '. $value . ' | ';
      }     
    return $str;    
  }

}

?>