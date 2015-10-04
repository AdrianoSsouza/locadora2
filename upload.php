<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>upload</title>
</head>
<body>
	<form method="post" action="recebe_upload.php" enctype="multipart/form-data">
	  <label>Arquivo</label>
	  <input type="file" name="arquivo" />
	  
	  <input type="submit" value="Enviar" />

	</form>
	<?php
	 	include('includes/header.php');

		$dados = mysql_query("SELECT * FROM filmes");

		while ($retornadados = mysql_fetch_assoc($dados) ) {
			echo '<img src="'.$retornadados["capa"].'">'.$retornadados["capa"];
		}
	 ?>
</body>
</html>