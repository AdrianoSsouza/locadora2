<?php 
	include("classes/DB.class.php");
	include("classes/Filmes.class.php");
	include("classes/Pessoas.class.php");
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
	/*cadastro de genero*/
		if ($acao =="cadastrargenero") {
			$nome = mysql_real_escape_string($_POST['nome']);
			$valida = mysql_query("SELECT * FROM generos");
			$dadosvalida = mysql_fetch_assoc($valida);
			if ($dadosvalida['nome'] == $nome) {
				echo "genero ja existe";

			}else{
				$query = mysql_query("INSERT INTO generos (nome) VALUES('$nome')") ;		
				header("location: CadastroGenero.php");
			}
		}	
	/*exclusao de genero*/
		if($acao == "excluirgenero"){
			$id=  mysql_real_escape_string($_GET["id"]);
			$query =mysql_query("DELETE FROM generos WHERE id ='$id' ");
			header("location: CadastroGenero.php");
		}

	
		if ($acao=="cadastrarfilme") {
			
			$tabela 			=   "filmes";
			$tabelareferencia	=   "multigeneros";
			$c['nome']			=	$_POST['nome'];
			$c['quantidade']	=	$_POST['quant'];
			$c['status_id']		=	$_POST['status_id'];
			$arq 				= 	$_FILES['arquivo'];
			$arqName 			= 	$_FILES['arquivo']['name'];
			$local				=	"img/";

			$c['capa']			=	$local.$arqName;
			if ((in_array('',$c)) || (in_array('',$_POST['genero']))) {
				echo "valores vazios";
			}else{

				$generos 			= 	$_POST['genero'];
				$campos			=	implode(',', array_keys($c));
				$values			= 	"'".implode("' , '", array_values($c))."'";
				$insert			= new Filmes ; 
				$insert			= $insert -> cadastraFilme($arq,$arqName,$local,$tabela,$tabelareferencia,$campos,$values,$generos);
			}
		}
	/*cadastro de pessoa*/	
		if ($acao=="cadastrarPessoa"){
			
			$tabela 			=   "pessoas";
			$c['nome']			=	$_POST['nome'];
			$c['cpf']			=	$_POST['cpf'];
			$c['rg']			=	$_POST['rg'];
			$c['bairro']		=	$_POST['bairro'];
			$c['logradouro']	=	$_POST['logradouro'];
			$c['ncasa']			=	$_POST['ncasa'];
			$c['cidade']		=	$_POST['cidade'];
			$c['id_tipo']		=	$_POST['id_tipo'];
			
			$valida = mysql_query("SELECT * FROM pessoas");
			$dadosvalida = mysql_fetch_assoc($valida);
			if ($dadosvalida['cpf'] == $c['cpf']	) {
				echo "CPF ja existe";
			}else{
				if (in_array('',$c)) {
					echo "valores vazios";
				}else{

					$campos			=	implode(',', array_keys($c));
					$values			= 	"'".implode("' , '", array_values($c))."'";
					$insert			= new Pessoas; 
					$insert			= $insert -> cadastraPessoas($tabela,$campos,$values);
					header("location: CadastroPessoas.php");
				}	
			}	
		}
}	

 ?>


