<?php

/*

create database jornal;

use jornal

CREATE TABLE noticia(
  noticia_id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  data DATE NOT NULL,
  conteudo BLOB NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE now(),
  PRIMARY KEY(noticia_id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into noticia (titulo, data, conteudo) values ('Greve dia 14', '2019-05-06', 'Vai ter uma greve pela educação neste dia' )
*/

$server = '';
$user = '';
$pass = '';
$db = '';

?>