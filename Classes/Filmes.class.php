<?php 

	class Filmes{
		
		public function cadastraFilme($arq,$arqName,$local,$tabela,$tabelareferencia,$campo,$valores,$generos){


			if ($arq['size'] > 124000 ) {
				echo "Imposivel subir aquivo pois arquivo excedi o tamano maximo (1 MB)";
			}else
				move_uploaded_file($arq['tmp_name'], $local .$arqName);
				
			$query = mysql_query("INSERT INTO $tabela ($campo) VALUES($valores)") or die(mysql_error());	
			$ultimo_id = mysql_insert_id();
			foreach ($_POST['genero'] as $generoc ) {
				$queryGeneros = mysql_query("INSERT INTO $tabelareferencia (id_genero, id_filme) VALUES ('$generoc','$ultimo_id')") or die(mysql_error());	
			}
			if ($query) {
				echo"cadastro realizado";	
			}else
				echo "cadastro não realizado";
		
		}
	}



 ?>