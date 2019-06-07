<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>CRUD de Notícias</title>
	<style type="text/css">
		form label, input, textarea {
			display: block;
			margin: 10px;
		}

		form button {
			display: inline-block;
			margin-left: 10px;	
		}
	</style>
</head>
<body>

<main>
	
	<h1>Editar Notícia</h1>

	<?php if ( ! isset($_SESSION['noticia']) ) { ?> 
	
		<p>Erro ao carregar os dados. </p>
	
	<?php } else { 

		$noticia = $_SESSION['noticia'];		
	
	?>

	<form action="/noticia/edit" method="post">
		
		<label for="noticia_id">Id: <?php echo $noticia->noticia_id ?></label>

		<input type="hidden" name="noticia_id" id="noticia_id"
			value="<?php echo $noticia->noticia_id ?>" >
				
		<label for="titulo">Título</label>		
		<input type="text" name="titulo" id="titulo" size="45" 
				value="<?php echo $noticia->titulo ?>" >
		
		<label for="data">Data</label>		
		<input type="date" name="data" id="data"
				value="<?php echo $noticia->data ?>" >

		<label for="conteudo">Conteúdo</label>		
		<textarea name="conteudo" id="conteudo" cols="40" rows="10"
		><?php echo $noticia->conteudo ?></textarea>

		<button type="submit">Salvar</button>		

	</form>

	<?php } ?>

</main>

</body>
</html>