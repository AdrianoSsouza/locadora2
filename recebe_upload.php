<?php 


$arq 		= $_FILES['arquivo'];
$arqName = $_FILES['arquivo']['name'];
$local		=	"img/";
$arqType = $_FILES['arquivo']['type'];
if ($arq['size'] > 124000 ) {
	echo "Imposivel subir aquivo pois arquivo excedi o tamano maximo (1 MB)";
}else{
	move_uploaded_file($arq['tmp_name'], $local .$arqName);
	echo "Upload efetuado";
}
 ?>