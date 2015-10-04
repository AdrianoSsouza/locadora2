<?php 
include('includes/header.php')
 ?>
 <!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css" type="txt/css">
	<title>Cadastro de filmes</title>
</head>
<body>
	<?php 
		$dados = mysql_query("SELECT nome, quantidade  , tipo FROM filmes  inner join status on filmes.status_id = status.id");
		$dadosgeneros = mysql_query("SELECT * FROM generos")  ;
		$dadosStatus = mysql_query("SELECT * FROM status")  ;
		
	?>
	<div id="registros" >
	
			<h1>FILMES CADASTRADOS</h1>
			<table cellpadding="5" border="1" width="400"> 
				<tr>
					<td >nome</td>
					<td>quantidade</td>
					<td>Status</td>
					<td>Locar</td>
				</tr>
				
				<?php 
				while ($retornadados = mysql_fetch_assoc($dados)) {
			
				echo'<tr>';
					echo'<td>'.$retornadados["nome"].'</td>';
					echo'<td>'.$retornadados["quantidade"].'</td>';
					echo'<td>'.$retornadados["tipo"].'</td>';
					echo'<td><a href="LocarFilmes.php?acao=Locarfilme">Locar</a>	</td>';


				echo'</tr>';
				}
				?>
			</table>
		
		
	</div>
	<div id="acomodar">
		<form action="CadastroFilmes.php?acao=cadastrarfilme" method="post" enctype="multipart/form-data">

			<label for="nome">Nome</label><input type="text" name="nome" class="txt">
			<label for="Quantidade">Quantidade</label><input type="text" class="txt" name="quant">
			<label for="Status">Status</label>
			<select name="status_id">
				<option value="" >Selecione uma opção</option>
			<?php while ($retornadados = mysql_fetch_assoc($dadosStatus)) {
				 echo'<option value="'.$retornadados["id"].'" >'.$retornadados["tipo"].'</option>'; 
			}?>
		
			</select>
			<h3>Generos do filme</h3>
			<?php while ($retornageneros = mysql_fetch_assoc($dadosgeneros)) {
			echo '<br><input type=checkbox name="genero[]" value="'.$retornageneros["id"].'">'.$retornageneros["nome"];		
			}?>
			<input type="file" name="arquivo" />
		<input type="submit" class="sb">
		</form>
		

	</div>
	<div id="voltar"><a href="index.php">Inicio</a></div>
</body>
</html>