<?php 
include('includes/header.php')
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cadastro</title>
	<link rel="stylesheet" href="style/style.css" type="txt/css">
</head>
<body>
		<?php 
			$dados = mysql_query("SELECT * FROM generos");

		 ?>
	<div id="registros" >
	
		<h1>GENEROS CADASTRADOS</h1>
			<table cellpadding="5" border="1" width="400"> 
				<tr>
				<td>id</td>
				<td >genero</td>
				<td>editar</td>
				<td>excluir</td>
				</tr>
				
				<?php 
				while ($retornadados = mysql_fetch_assoc($dados)) {
			
				echo'<tr>';
					echo'<td>'.$retornadados["id"].'</td>';
					echo'<td>'.$retornadados["nome"].'</td>';
					echo'<td><a href="EditarGenero.php?id='.$retornadados["id"].'" >editar</a></td>';
					echo'<td><a href="CadastroGenero.php?acao=excluirgenero&id='.$retornadados["id"].'">excluir</a></td>';
				echo'</tr>';
				}
				?>
			</table>
		
		
	</div>
	
	<div id="acomodar">
	<?php echo $msg ?>
	<h1>CADASTRO DE GENERO DE FILMES</h1>
		<form action="CadastroGenero.php?acao=cadastrargenero" method="post">
			<label for="nome">GENERO</label><input type="text" autofocus name="nome" class="txt"><br>
			<input type="submit" value="cadastrar" class="sb" name="cadastrar">
		</form>
	</div>
	<div id="voltar"><a href="index.php">Inicio</a></div>
</body>
</html>