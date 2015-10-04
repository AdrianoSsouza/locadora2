<?php 
class DB{
public function conectar(){
 $host="localhost";
 $user="root";
 $pass="";
 $db="locadora";

 $conexao = mysql_connect($host,$user,$pass);
 $dbconect = mysql_select_db($db);

	return $conexao;

}


}



 


?>



