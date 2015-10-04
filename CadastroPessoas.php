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
		$dados = mysql_query("SELECT cod, nome , tipo FROM pessoas  INNER JOIN tipo_pessoa ON  pessoas.id_tipo = tipo_pessoa.id ");
		$tipo_pessoas = mysql_query("SELECT * FROM tipo_pessoa");
	
	?>
	<div id="registros" >
	
		<h1>PESSOAS CADASTRADAS</h1>
			<table cellpadding="5" border="1" width="400"> 
				<tr>
					<td >COD</td>
					<td>NOME</td>
					<td>TIPO</td>
					<td>Registro de Locação</td>
				</tr>
				
				<?php 
				while ($retornadados = mysql_fetch_assoc($dados)) {
			
				echo'<tr>';
					echo'<td>'.$retornadados["cod"].'</td>';
					echo'<td>'.$retornadados["nome"].'</td>';
					echo'<td>'.$retornadados["tipo"].'</td>';
					echo'<td><a href="LocarFilmes.php?acao=Locarfilme"><center>Visualizar</center></a></td>';


				echo'</tr>';
				}
				?>
			</table>
		
	</div>
	<div id="acomodar">
		<form action="CadastroPessoas.php?acao=cadastrarPessoa" method="post">
			<label for="nome">Nome Completo</label><input type="text" name="nome" class="txt">
			<label for="cpf">cpf</label><input type="text" class="txt" name="cpf">
			<label for="rg">rg</label><input type="text" name="rg" class="txt">
			<center><h1 >ENDEREÇO</h1></center>
			<label for="logradouro">logradouro</label><input type="text" class="txt" name="logradouro">
			<label for="bairro">bairro</label><input type="text" name="bairro" class="txt">
			<label for="ncasa">Numero</label><input type="text" class="txt" name="ncasa">
			<label for="cidade">cidade</label><input type="text" name="cidade" class="txt">
			<select name="id_tipo">
				<option value="" >Selecione uma opção</option>
				<?php while ($retornadados = mysql_fetch_assoc($tipo_pessoas)) {
					 echo'<option value="'.$retornadados["id"].'" >'.$retornadados["tipo"].'</option>'; 
				}?>
			</select>
		<input type="submit" class="sb">
		</form>
		

	</div>
	<div id="voltar"><a href="index.php">Inicio</a></div>
</body>
</html>