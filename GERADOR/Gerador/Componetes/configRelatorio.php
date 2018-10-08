<?php


include "../Classe/funcoes.php";



/*************************************************************************************************************/
/* Variaveis de Configuração */
/*************************************************************************************************************/
$tabelas = $_POST['tabelas'];
$id_projeto = $_POST['id_projeto'];


$imagem_icone = "";
$id_config_relatorio = 0;





/*************************************************************************************************************/
/* Iniciando Conexão Base de Dados Gerador */
/*************************************************************************************************************/
include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();




/*************************************************************************************************************/
/* Salvando Configurações  */
/*************************************************************************************************************/
$sql = "SELECT id_config_relatorio FROM config_relatorio WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$id_config_relatorio = $dados['id_config_relatorio'];
}

if ($id_config_relatorio == 0) {
	$sql = "INSERT INTO config_relatorio
			(projetos_id, tabelas_config_relatorio)
			VALUES ($id_projeto, '$tabelas');";
} else {
	$sql = "UPDATE config_relatorio 
			SET
				tabelas_config_relatorio 	= '$tabelas'
			WHERE 
				id_config_relatorio = $id_config_relatorio;";
}
$stmt = $pdo->prepare($sql);
$stmt->execute();


?>