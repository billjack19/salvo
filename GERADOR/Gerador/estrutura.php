<?php
ini_set('max_execution_time', 300);
$hostConexao = "";
$userConexao = "";
$pwsConexao = "";
$nameDbConexao = "";
$id_projeto = $_POST['id_projeto'];

echo "Estrutura: ";
echo "\nid_projeto: ".$id_projeto."\n";
echo "\nCriado com sucesso!\n\n";

$tabelaDeTabelas = "";

criarProjeto($_POST['nomeProjeto']);
 
function criarProjeto($projetoNome){
	/*******************************************************************************************************************/
	/** Criar Esqueleto */
	/*******************************************************************************************************************/
	criarDiretorio("../GeradorProjetos");

	criarDiretorio("../GeradorProjetos/$projetoNome");
	copiarPasta("Modelo_Principal", "../GeradorProjetos/$projetoNome");



	/*******************************************************************************************************************/
	/** Atualizar dados do Projeto */
	/*******************************************************************************************************************/
	if ( !empty($_POST['nomeProjeto']) && !empty($_POST['hostConexao']) ) {
		$hostConexao = $_POST['hostConexao'];
		$userConexao = $_POST['userConexao'];
		$pwsConexao = $_POST['pwsConexao'];
		$nameDbConexao = $_POST['nameDbConexao'];
		$id_projeto = $_POST['id_projeto'];

		include "Classe/conexaoLocal.php";

		$conn = new ConexaoLocal();
		$conn->conectar();
		$pdo = $conn->Connect();

		$sql = "UPDATE projetos 
				SET 
					host = '$hostConexao', 
					user = '$userConexao',
					pws = '$pwsConexao',
					bancoDados = '$nameDbConexao'
				WHERE id_projeto = $id_projeto";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}



	/*******************************************************************************************************************/
	/** Criar Classe de conexão */
	/*******************************************************************************************************************/
	include "Componetes/conexao.php";
	criarArquivo("../GeradorProjetos/$projetoNome/app/classe/conexao.php", $conteudoConexao);


	// include "Classe/conexao.php";

	// $conn = new Conexao();
	// $conn->set($hostConexao, 'db_host');
	// $conn->set($userConexao, 'db_usuario');
	// $conn->set($pwsConexao, 'db_senha');
	// $conn->set($nameDbConexao, 'db_nome');
	// $conn->conectar();

	// $pdo = $conn->Connect(); 

	// $sql = "SHOW TABLES";
	// $verifica = $pdo->query($sql);

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