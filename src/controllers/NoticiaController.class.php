<?php

class NoticiaController{

	private static $instance = null;
	
	function __construct(){    		
		$this->noticiaDao = new NoticiaDaoModel();
	}

	public static function getInstance(){

    	if (is_null(self::$instance))

    		self::$instance = new NoticiaController();    	

    	return self::$instance;
    } 

	public function create($request){
			
		$form = $request->getBody();

		$noticia = new NoticiaModel();
		$noticia->titulo   = $form['titulo'];
		$noticia->data     = $form['data'];
		$noticia->conteudo = $form['conteudo'];

		$created = NoticiaDaoModel::getInstance()->create($noticia);

		if ($created)
			View::redirect('/noticia/all');
		else{
			$response = array( 'noticia' => $form );
			View::render('/create', $response);
		}

	}

	public function find($request){
			
		$data = $request->getBody();
		$noticia_id = $data['id'];
		
		$noticia = NoticiaDaoModel::getInstance()->find($noticia_id);

		if ($noticia){
			$response = array( "noticia" => $noticia );
			View::render('/noticia', $response);			
		}
		else
			View::redirect('/noticia/all');

	}

	public function findAll(){

		$noticias = NoticiaDaoModel::getInstance()->findAll();
		
		$response = array( 'noticias' => $noticias );
		View::render('noticias', $response);

	}

	public function load($request){
			
		$data = $request->getBody();
		$noticia_id = $data['id'];
		
		$noticia = NoticiaDaoModel::getInstance()->find($noticia_id);

		if ($noticia){
			$response = array( "noticia" => $noticia );
			View::render('/noticia_edit', $response );			
		}
		else
			View::redirect('/noticia/all');

	}

	public function edit($request){
			
		$form = $request->getBody();

		session_start();
		$noticia_id = $_SESSION['noticia']->noticia_id;

		$noticia = new NoticiaModel();
		$noticia->noticia_id = $noticia_id;
		$noticia->titulo     = $form['titulo'];
		$noticia->data       = $form['data'];
		$noticia->conteudo   = $form['conteudo'];

		$edited = NoticiaDaoModel::getInstance()->update($noticia);

		if ($edited)
			View::redirect('/noticia/all');
		else
			View::render('/create', $form);

	}

	public function delete($request){
			
		$data = $request->getBody();
		$noticia_id = $data['id'];
		
		$deleted = NoticiaDaoModel::getInstance()->delete($noticia_id);

		if ($deleted)
			View::redirect('/noticia/all');

	}
  
}

?>