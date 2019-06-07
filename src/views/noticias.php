<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>CRUD de Notícias</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<main>
	
	<h1>Notícias</h1>

	<?php
	# Esta linha permite que esta view renderizada tanto
	# usando a função 'include' como a função 'header'
	# Quando for usando 'include' a sessão já terá sido
	# iniciada pelo controller.
	# Quando for usado 'header' a sessão terá de ser
	# iniciada novamente.	
	if (!isset($_SESSION)) session_start();
	?>

	<?php if ( ! isset($_SESSION['noticias']) ) { ?> 
	
		<p>Erro ao carregar os dados. </p>
	
	<?php } else { 

		$lista = $_SESSION['noticias'];		
	
	?>

	<table class="table">
		<thead>
			<tr>
				<th>Título</th>				
				<th>Data</th>
				<th style="width: 50%">Conteúdo</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista as $noticia) { ?>
			<tr>
				<td><?php echo $noticia->titulo ?></td>
				<td><?php echo $noticia->data   ?></td>			
				<td><?php echo $noticia->conteudo  ?></td>
				<td><a href="/noticia?id=<?php echo $noticia->noticia_id ?>">View</a></td>
				<td><a href="/noticia/edit?id=<?php echo $noticia->noticia_id ?>">Edit</a></td>
				<td><a href="/noticia/delete?id=<?php echo $noticia->noticia_id ?>">Delete</a></td>		
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<?php } ?>

</main>

</body>
</html>