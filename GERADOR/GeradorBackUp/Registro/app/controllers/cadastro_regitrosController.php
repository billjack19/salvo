
<?php 
	require_once "../classe/entidade/Regitros.php";
	require_once "../classe/dao/regitrosDAO.php";

	$entidadeRegitros = new Regitros();
	$regitrosDAO = new regitrosDAO();
	
	$entidadeRegitros->set($_POST['ServerName'], 'ServerName');
	$entidadeRegitros->set($_POST['ServiceName'], 'ServiceName');
	$entidadeRegitros->set($_POST['Key_SQL_servive'], 'Key_SQL_servive');
	$entidadeRegitros->set($_POST['Port_Number'], 'Port_Number');
	$entidadeRegitros->set($_POST['user_regitros'], 'user_regitros');
	$entidadeRegitros->set($_POST['senha_regitros'], 'senha_regitros');

	$retorno = $regitrosDAO->cadastraRegitros($entidadeRegitros);
	echo $retorno;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro base dados</title>
</head>
<body>
	
	<center>
		<a href="../../server.php">Voltar</a>
	</center>
</body>
</html>