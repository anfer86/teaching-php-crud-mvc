<?php

/**
 * 
 */
class NoticiaDaoModel{

	private static $instance = null;

	function __construct(){	
	
	}

	public static function getInstance(){

    	if (is_null(self::$instance))

    		self::$instance = new NoticiaDaoModel();    	

    	return self::$instance;

    } 

	
	function create($noticia){

		$sql = 'INSERT INTO noticia (titulo, data, conteudo) 
				VALUES (?, ?, ?)';

		$conn = MySqlConnection::getInstance();		
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param('sss',
			$noticia->titulo, 
			$noticia->data, 
			$noticia->conteudo
		);
		
		$result = $stmt->execute();
		$conn->close();

		return $result;
	}

	function find($noticia_id){

		$sql = "SELECT noticia_id, titulo, data, conteudo 
				FROM noticia WHERE noticia_id = ?";

		$conn = MySqlConnection::getInstance();
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param('i', $noticia_id);
		
		$stmt->execute();
		
		$result = $stmt->get_result();		

		$noticia = null;

		if ($result->num_rows > 0){

			$linha = $result->fetch_assoc();

			$noticia = new NoticiaModel();	
							
			foreach ($linha as $key => $value) {
					$noticia->$key = $value;
			}			
			
		}			

		$conn->close();

		return $noticia;

	}

	function findAll(){	 
		
		$sql = "SELECT noticia_id, titulo, data, conteudo FROM noticia";
		
		$conn = MySqlConnection::getInstance();
		$stmt = $conn->prepare($sql);

		$stmt->execute();
		
		$result = $stmt->get_result();		

		$noticias = array();

		if ($result->num_rows > 0){

			while( $linha = $result->fetch_assoc() ){

				$noticia = new NoticiaModel();
							
				foreach ($linha as $key => $value) {
					$noticia->$key = $value;
				}

				$noticias[] = $noticia;				

			}

		}	

		$conn->close();

		return $noticias;

	}

	function update($noticia){

		$sql = 'UPDATE noticia SET titulo = ?, data = ?, conteudo = ? 
				WHERE noticia_id = ?';
		
		$conn = MySqlConnection::getInstance();
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param('sssi',
			$noticia->titulo, 
			$noticia->data, 
			$noticia->conteudo,
			$noticia->noticia_id
		);
		
		$result = $stmt->execute();
		$conn->close();

		return $result;

	}

	function delete($noticia_id){

		$sql = 'DELETE FROM noticia WHERE noticia_id = ?';
		
		$conn = MySqlConnection::getInstance();
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param('i', $noticia_id);

		$result = $stmt->execute();
		$conn->close();

		return $result;

	}

}

?>


