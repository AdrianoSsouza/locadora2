<?php 
include('includes/header.php')
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css" type="txt/css">
	<title>Document</title>
</head>
<body>	
<div id="acomodar">
		<?php 
        		$id 			= $_GET['id'];
				$dados 			= mysql_query("SELECT * FROM generos WHERE id ='$id'");
				$retornadados 	= mysql_fetch_assoc($dados);
		      if (isset($_POST['Atualizar'])) {
                 $nome = $_POST['nome'];
                 $query = mysql_query("UPDATE generos SET nome ='$nome' WHERE id='$id'")or die(mysql_error());
                
              }
              ?>
        <form name='editar' action='' method='post'>
            <label>
        	
			<?php 
            echo "<span class='campo'>Genero</span>";
            echo "<input type='text' name='nome' value='".$retornadados['nome']."'/>";
        
       		echo"</label>";
        	echo"<input type='hidden' name='id' value='".$id."' />";
        ?>
        <input type="submit" value="Atualizar" name="Atualizar" class="sb" />	
        <input type="reset" value="Fechar" class="sb" />
    </form>
</div>
</body>
</html>