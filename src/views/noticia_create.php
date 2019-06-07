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
	
	<h1>Criar Notícia</h1>

	<form action="/noticia/create" method="post">
		
		<label for="titulo">Título</label>		
		<input type="text" name="titulo" id="titulo" size="45" placeholder="Insira o título">
		
		<label for="data">Data</label>		
		<input type="date" name="data" id="data">

		<label for="conteudo">Conteúdo</label>		
		<textarea name="conteudo" id="conteudo" cols="40" rows="10"></textarea>

		<button type="submit">Salvar</button>
		<button type="reset">Limpar</button>

	</form>

</main>

</body>
</html>