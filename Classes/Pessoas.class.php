<?php 

	class Pessoas{
	

		public function cadastraPessoas($tabela,$campo,$valores){

			$query = mysql_query("INSERT INTO $tabela ($campo) VALUES($valores)") or die(mysql_error());	
			
			if ($query) {
				echo"cadastro realizado";	
			}else
				echo "cadastro não realizado";
		
		}
	}



 ?>