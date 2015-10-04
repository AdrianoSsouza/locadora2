<?php 
	include("classes/DB.class.php");
	$conectar = new DB;
	$conectar = $conectar->conectar();
	$startaction = "";
	$acao = '';
	$msg = '';
if (isset($_GET['acao'])) {
	$startaction = 1;
	$acao = $_GET['acao'];
}

if ($startaction == 1) {

	if ($acao =="cadastrargenero") {
		$nome = mysql_real_escape_string($_POST['nome']);
		$query = mysql_query("INSERT INTO generos (nome) VALUES('$nome')") ;		
		header("location: CadastroGenero.php");
	}	

	if($acao == "excluirgenero"){
		$id= $_GET["id"];
		$query =mysql_query("DELETE FROM generos WHERE id= $id ");

	}
}

 ?>