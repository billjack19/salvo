<?php

require_once "app/classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$descricao_status = "";
$id_baseDados = 0;
$Id_SQL = 0;


$sql = "	SELECT s.descricao_status, bd.descricao_baseDados, se.Id_SQL 
			FROM status s 
			INNER JOIN basedados bd ON s.basedados_id = bd.id_baseDados 
			INNER JOIN regitros se ON bd.regitros_id = se.Id_SQL";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricao_status = $dados['descricao_status'];
	$descricao_baseDados = $dados['descricao_baseDados'];
	$Id_SQL = $dados['Id_SQL'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Executar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<?php include "app/componentes/header.php" ?>

	<center>
		<h1>Executar</h1>
		<input type="text" id="nomeBD" value="<?php echo $descricao_baseDados; ?>" disabled><br><br>
		<div id="carregando"></div>
		<div id="colunaAtual"></div>
		<div id="descTabelas"></div>
		<div id="listaTabelas"></div>
		<button onclick="exe('exeCriarDataBase')">Criar DataBase</button>
		<!-- <br><br> -->
		<!-- <button onclick="exe('exeExtruturaCompleta')">Executar Estrutura Completa</button> -->
		<button onclick="exe('exeExtrutura')">Executar Estrutura</button>
		<button onclick="list('listEstruturaPer')">Listar Estrutura Personalizados</button>
		<!-- <button onclick="exe('exeRegistro')">Executar Registros</button> -->
		<!-- <button onclick="exe('exeRegistroPer')">Executar Registros Personalizados</button> -->
		<!-- <br><br> -->
		<button onclick="list('listRegistroPer')">Listar Registros Personalizados</button>
		<!-- <br><br> -->
		<br><br><br>
		<div id="colunasTable"></div>
	</center>

	<script type="text/javascript">
		function exe(arquivo){
			$("#carregando").html("Carregando...");
			var arrayDB = $("#nomeBD").val();
			$.ajax({
				url:'app/controllers/'+arquivo+'.php',
				type: 'POST',
				dataType: 'html',
				data: { 'arquivo': arrayDB }
			}).done( function(data){
				console.log("data: "+data);
				$("#carregando").html("Pronto");
			});	
		}

		function list(arquivo){
			$("#carregando").html("Carregando...");
			var arrayDB = $("#nomeBD").val();
			$.ajax({
				url:'app/controllers/'+arquivo+'.php',
				type: 'POST',
				dataType: 'html',
				data: { 'arquivo': arrayDB }
			}).done( function(data){
				// console.log("data: "+data);
				$("#colunasTable").html(data);
				$("#carregando").html("Pronto");
			});	
		}

		function exePer(arquivo, executado){
			$("#carregando").html("Carregando...");
			var arrayDB = $("#nomeBD").val();
			$.ajax({
				url:'app/controllers/'+arquivo+'.php',
				type: 'POST',
				dataType: 'html',
				data: { 
					'pasta': arrayDB,
					'arquivo': executado
				}
			}).done( function(data){
				console.log("data: "+data);
				$("#carregando").html("Pronto");
				document.getElementById("div"+executado).innerHTML = "Sim";
			});	
		}
	</script>
</body>
</html>