<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>CRUD de Notícias</title>
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

	<?php if ( ! isset($_SESSION['noticia']) ) { ?> 
	
		<p>Erro ao carregar os dados. </p>
	
	<?php } else { 

		$noticia = $_SESSION['noticia'];		
	
	?>

		<table>
			<thead>
				<tr>
					<th>Título</th>				
					<th>Data</th>
					<th>Conteúdo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>				
				<tr>
					<td><?php echo $noticia->titulo ?></td>
					<td><?php echo $noticia->data   ?></td>			
					<td><?php echo $noticia->conteudo  ?></td>
				</tr>
			</tbody>
		</table>
	
	<?php } ?>

</main>

</body>
</html>