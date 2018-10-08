<?php


ini_set('max_execution_time', 300);

// include "Classe/conexaoLocal.php";

// $conn = new ConexaoLocal();
// 	$conn->conectar();
// 	$pdo = $conn->Connect();


$nomeProjeto = $_POST['nomeProjeto'];
$hostConexao = $_POST['hostConexao'];
$userConexao = $_POST['userConexao'];
$pwsConexao = $_POST['pwsConexao'];
$nameDbConexao = $_POST['nameDbConexao'];

// $nameDbConexao = $_POST['database'];




// $sql = "INSERT INTO projetos (descricao_projetos) VALUES ('$nameDbConexao');";

// $stmt = $pdo->prepare($sql);
// $stmt->execute();

if (!empty($_POST['nomeProjeto'])) {
	criarProjeto($_POST['nomeProjeto']);
}

function criarProjeto($projetoNome){
	criarDiretorio("../GeradorProjetos");

	criarDiretorio("../GeradorProjetos/$projetoNome");
	copiarPasta("Modelo_Principal", "../GeradorProjetos/$projetoNome");
	

	// criarDiretorio("../GeradorProjetos/$projetoNome");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app");

	// criarDiretorio("../GeradorProjetos/$projetoNome/app/classe");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/classe/dao");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/classe/entidade");

	// criarDiretorio("../GeradorProjetos/$projetoNome/app/js");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/js/ajax");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/js/config");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/js/script");

	// criarDiretorio("../GeradorProjetos/$projetoNome/app/controllers");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/css");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/views");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/img");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/componetes");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/bd");
	// criarDiretorio("../GeradorProjetos/$projetoNome/app/lb");

	// include "Componetes/cssCopyArquivo.php";
	// include "Componetes/jsCopyArquivo.php";


	// criarDiretorio("../GeradorProjetos/$projetoNome/app/lb/dompdf_gerar");
	// copiarPasta("Modelo2/app/dompdf_gerar", "../GeradorProjetos/$projetoNome/app/lb/dompdf_gerar");


	// copiarArquivo("Modelo2/", "../GeradorProjetos/$projetoNome/", "app/componetes/biblioteca.php");



	if ( !empty($_POST['nomeProjeto']) && !empty($_POST['hostConexao']) ) {
		$hostConexao = $_POST['hostConexao'];
		$userConexao = $_POST['userConexao'];
		$pwsConexao = $_POST['pwsConexao'];
		$nameDbConexao = $_POST['nameDbConexao'];

		include "Classe/conexaoLocal.php";

		$conn = new ConexaoLocal();
		$conn->conectar();
		$pdo = $conn->Connect();

		$sql = "INSERT INTO projetos (nome, host, user, pws, bancoDados) VALUES ('$projetoNome', '$hostConexao', '$userConexao', '$pwsConexao', '$nameDbConexao')";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}


	$sql = "DROP DATABASE IF EXISTS $nameDbConexao;";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql = "CREATE DATABASE $nameDbConexao";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	include "Componetes/conexao.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/classe/conexao.php", $conteudoConexao);



	include "Classe/conexao.php";

	$conn = new Conexao();
	$conn->set($hostConexao, 'db_host');
	$conn->set($userConexao, 'db_usuario');
	$conn->set($pwsConexao, 'db_senha');
	$conn->set($nameDbConexao, 'db_nome');
	$conn->conectar();

	$pdo = $conn->Connect(); 

	// $sql = "show tables";



	$sql = "CREATE TABLE `relatorio_tabela` (
		`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`descricao_relatorio_tabela` varchar(200) NOT NULL,
		`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();




	$sql = "
	CREATE TABLE `relatorios` (
		`id_relatorios` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`descricao_relatorios` varchar(200) NOT NULL,
		`tabela_relatorios` varchar(200) NOT NULL,
		`colunas_relatorios` text NOT NULL,
		`colunas_estrangeiras_relatorios` text NOT NULL,
		`colunas_filtro_relatorios` text DEFAULT NULL,
		`bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT '1',
		`data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`usuario_id` int(11) NOT NULL,
		`bool_emitir_relatorios` int(1) NOT NULL DEFAULT '0',
		`bool_ativo_relatorios` int(1) NOT NULL DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();




	$sql = "CREATE TABLE `upload_arq` (
		`id_upload_arq` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`descricao_upload_arq` varchar(100) NOT NULL,
		`tipo_upload_arq` varchar(100) NOT NULL,
		`data_atualizacaoupload_arq` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		`bool_ativo_upload_arq` int(1) NOT NULL DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();




	$sql = "CREATE TABLE `usuario` (
		`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`nome_usuario` varchar(200) DEFAULT NULL,
		`login_usuario` char(3) DEFAULT NULL,
		`senha_usuario` varchar(100) DEFAULT NULL,
		`bool_ativo_usuario` int(1) DEFAULT '1'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();




	$sql = "
	INSERT INTO `usuario` 
		(`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) 
	VALUES
		(1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1), 
		(2, 'SITE', 'SIT', PASSWORD('sittis'), 1);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$sql = "SHOW TABLES";
	$verifica = $pdo->query($sql);
	$tabelaDeTabelas = "";
	echo "

	<!DOCTYPE html>
	<html>
	<head>
		<title>CRUD</title>
	</head>
	<body>
		<center>
		<h1>$projetoNome</h1>
		<table border=\"1\" width=\"100%\">
			<tr>
				<td align='center'>Tabelas</td>
				<td align='center'>Gerar CRUD</td>
			</tr>";
	foreach ($verifica as $dados) {
		echo "
			<tr>
				<td align='center'>&nbsp;".$dados[0]."&nbsp;</td>
				<td align='center'><button>Gerar</button></td>
			</tr>
		";
	}
}

// include "crud.php";


function criarDiretorio($diretorio){
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0755);
	}
}

function copiarPasta($pastaSrc, $pastaDis){
	$files1 = scandir($pastaSrc);
	for ($i=0; $i < count($files1); $i++) { 
		if ($files1[$i] != "." && $files1[$i] != "..") {
			if (is_dir($pastaSrc."/".$files1[$i])) {
				criarDiretorio($pastaDis."/".$files1[$i]);
				copiarPasta($pastaSrc."/".$files1[$i], $pastaDis."/".$files1[$i]);
			} else {
				copiarArquivo($pastaSrc, $pastaDis, $files1[$i]);
			}
		}
	}
}

function copiarArquivo($pastaSrc, $pastaDis, $nomeArquivo){
	$myfile = fopen($pastaSrc."/".$nomeArquivo, "r") or die("Unable to open file!");
	$arquivoCopia = fread($myfile,filesize($pastaSrc."/".$nomeArquivo));
	fclose($myfile);

	$myfile = fopen($pastaDis."/".$nomeArquivo, "w") or die("Unable to open file!");
	$txt = $arquivoCopia;
	fwrite($myfile, $txt);
	fclose($myfile);
}

function criarArquivo($nome, $conteudo){
	$myfile = fopen($nome, "w") or die("Unable to open file!");
	fwrite($myfile, $conteudo);
	fclose($myfile);
}
?>
	</table>
	<br><br>
	<a href="index.php">Voltar a pagina Principal</a>
	</center>
</body>
</html>