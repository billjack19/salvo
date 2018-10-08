<?php

ini_set('max_execution_time', 300);

$hostConexao = "";
$userConexao = "";
$pwsConexao = "";
$nameDbConexao = "";

$tabelaDeTabelas = "";

if (!empty($_POST['nomeProjeto'])) {
	criarProjeto($_POST['nomeProjeto']);
}

function criarProjeto($projetoNome){
	/*******************************************************************************************************************/
	/** Criar Esqueleto */
	/*******************************************************************************************************************/
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

	
	/*******************************************************************************************************************/
	/** Define dados do Projeto */
	/*******************************************************************************************************************/
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
			</tr>
";
	foreach ($verifica as $dados) {
		// echo "<br>".$dados[0];
		// $tabelaDeTabelas .
		echo "
			<tr>
				<td align='center'>&nbsp;".$dados[0]."&nbsp;</td>
				<td align='center'><button>Gerar</button></td>
			</tr>
		";
	}
}


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