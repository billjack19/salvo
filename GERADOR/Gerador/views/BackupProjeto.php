<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

// $descricao_grade = "Sem Registro";
// $projeto_id = $id_projeto;



$sql = "SELECT 
			nome, host, user, pws, bancoDados,
			CASE 
				WHEN COALESCE(backup_geral, 0) = 0
					THEN ' sem registro!'
				ELSE 
					DATE_FORMAT(STR_TO_DATE(backup_geral, '%Y-%m-%d %H:%i:%s'), '%d/%m/%Y %H:%i:%s')
			END AS backup_geral
		FROM projetos 
		WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
	$backup_geral = "<span id='atualizacaoBackupGeral'>".$dados['backup_geral']."</span>";
}



include "../Classe/funcoes.php";
include "../Classe/conexao.php";

$connProjeto = new Conexao();
$connProjeto->set($hostConexao, 'db_host');
$connProjeto->set($userConexao, 'db_usuario');
$connProjeto->set($pwsConexao, 'db_senha');
$connProjeto->set($nameDbConexao, 'db_nome');
$connProjeto->conectar();

$pdoProjeto = $connProjeto->Connect(); 

$sql = "SHOW TABLES";
$verifica = $pdoProjeto->query($sql);

$tabelaDeTabelas = "<table class='table'>"; $cont = 0;
foreach ($verifica as $dados) {
	$cont++;
	$tabelaDeTabelas .= "
		<tr>
			<td width='5%'>$cont</td>
			<td width='35%'>".$dados[0]."</td>
			<td width='35%' align='center' id='atualizacaoTabela_".$dados[0]."'>
				Último atualização: sem registro!
			</td>
			<td width='12.5%'>
				<button name='tabelaProjeto' class='btn btn-danger btn-block' style='padding: 0;' onclick='
					this.className=\"btn btn-primary btn-block\";
					salvarTabela(\"".$dados[0]."\");
			'>
					selecionar
				</button>
			</td>
			<td width='12.5%'>
				<button class='btn btn-danger btn-block' style='padding: 0;' onclick='
					this.className=\"btn btn-primary btn-block\";
					importaTabela(\"".$dados[0]."\");
			'>
					importar
				</button>
			</td>
		</tr>";
}
$tabelaDeTabelas .= "</table>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Backup</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>Backup</h1>
		<h2>Projeto: <?php echo $projetoNome; ?></h2>
		<h4>Último backup geral: <?php echo $backup_geral; ?> </h4>
		<!-- <br><br> -->

		<?php if ($hostConexao == "localhost") { ?>
			Conexão: <input type="text" id="tipoConexao" style="text-align: center;" value="local" disabled>
		<?php } else { ?>
			Conexão: <input type="text" id="tipoConexao" style="text-align: center;" value="remota" disabled>
		<?php } ?>
		<br>

		<button onclick="criarDiretoriosProjeto()">
			Criar Diretórios do Projeto
		</button>
		&nbsp;
		<button onclick="backupGeral()">
			Backup geral
		</button>
		&nbsp;
		<button onclick="backupTabelaSequencial()">
			Salvar Tabelas (uma por uma)
		</button>
		&nbsp;
		<button onclick="importarBanco()">
			Importar Banco de Dados
		</button>
		<br>
		<input type="checkbox" id="pastaUpload"> Copiar pasta de upload?
		<?php echo $tabelaDeTabelas; ?>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
	</center>


</body>


<script type="text/javascript">



function setarUltimaAtulizacao(){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"ultimaAtulizacao": true,
			"projeto_id": $("#id_projeto").val(),
		}
	}).done( function(data){
		console.log(data);
		try{
			data = JSON.parse(data);
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				console.log(data[i].nome);
				try{
					$("#atualizacaoTabela_" + data[i].nome).html(data[i].data);
				} catch(error){
					console.log("Erro ao tentar buscar tabela: "+data[i].nome);
				}
			}
		} catch(error){
			console.error("Falha ao entar conver ter resultao em JSON: " + error);
		}
	});
}
setarUltimaAtulizacao();



function importarBanco(){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"importarBanco": true,
			"pasta": ( $("#tipoConexao").val() == "local" ? "GeradorBackUp" : "GeradorBackUpRemoto" ),
			"projeto_id": $("#id_projeto").val()
		}
	}).done( function(data){
		console.log(data);
	});
}



function criarDiretoriosProjeto(){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"criarDiretoriosLocais": true,
			"projeto_id": $("#id_projeto").val(),
			"pasta": ( $("#tipoConexao").val() == "local" ? "GeradorBackUp" : "GeradorBackUpRemoto" ),
			"pastaUpload": ($("#pastaUpload")[0].checked ? true : "")
		}
	}).done( function(data){
		// alert(data);
		console.log(data);
	});
}








function salvarTabela(tabela){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"backupTabela": true,
			"tabela": tabela,
			"pasta": ( $("#tipoConexao").val() == "local" ? "GeradorBackUp" : "GeradorBackUpRemoto" )
		} 
	}).done( function(data){
		console.log(data);
		$("#atualizacaoTabela_" + tabela).html(data);
		if (habilitar_backupTabelaSequencial) {
			backupTabelaSequencial();
		}
	});
}



function importaTabela(tabela){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"importarTabela": true,
			"tabela": tabela,
			"pasta": ( $("#tipoConexao").val() == "local" ? "GeradorBackUp" : "GeradorBackUpRemoto" )
		}
	}).done( function(data){
		console.log(data);
	});
}





function backupGeral(){
	$.ajax({
		url: "BackupProjetoAcao.php",
		type: "POST",
		dataType: "text",
		data: {
			"backupGeral": true,
			"pasta": ( $("#tipoConexao").val() == "local" ? "GeradorBackUp" : "GeradorBackUpRemoto" )
		} 
	}).done( function(data){
		console.log(data);
		$("#atualizacaoBackupGeral").html(data);
	});
}






var indiceGeral = 0, habilitar_backupTabelaSequencial = false;
function backupTabelaSequencial(){
	habilitar_backupTabelaSequencial = true;
	var botoes = document.getElementsByName("tabelaProjeto");

	for (var i = 0; i < botoes.length; i++) {
		botoes[i].disabled = true;
	}

	while(indiceGeral < botoes.lenght && botoes[indiceGeral].className != "btn btn-primary btn-block"){
		if(botoes[indiceGeral].className == "btn btn-primary btn-block") indiceGeral++;
	}

	if (indiceGeral < botoes.length) {
		botoes[indiceGeral].disabled = false;
		botoes[indiceGeral].click();
		botoes[indiceGeral].disabled = true;
		indiceGeral++;
	} else {
		for (var i = 0; i < botoes.length; i++) {
			botoes[i].disabled = false;
		}
		indiceGeral = 0;
		habilitar_backupTabelaSequencial = false;
	}
}
</script>
</html>