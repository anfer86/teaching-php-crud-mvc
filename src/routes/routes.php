<?php

include_once 'Request.php';
include_once 'Router.php';

$router = new Router(new Request);

$router->get('/', function() { 

	NoticiaController::getInstance()->findAll();

});

$router->get('/noticia/all', function() { 

	NoticiaController::getInstance()->findAll();

});

$router->get('/noticia', function($request) {
	
	NoticiaController::getInstance()->find($request);
	
});

$router->get('/noticia/create', function($request) { 
	
	View::render('noticia_create');

});

$router->post('/noticia/create', function($request) {

	NoticiaController::getInstance()->create($request);

});

$router->get('/noticia/edit', function($request) { 

	NoticiaController::getInstance()->load($request);	
	
});

$router->post('/noticia/edit', function($request) {

	NoticiaController::getInstance()->edit($request);

});

$router->get('/noticia/delete', function($request) { 

	NoticiaController::getInstance()->delete($request);	
	
});

?>