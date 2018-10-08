<?php 

include "conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

date_default_timezone_set("America/Sao_Paulo");
$data_atual = date('Y-m-d');

if (!empty($_POST['retornaIp'])) {
	$result = "";
	$sql = "SELECT * FROM parametro ORDER BY id_parametro DESC LIMIT 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$result = $dados['ip_parametro']."+".$dados['porta_parametro'];
	}
	echo str_replace("\n", "", $result);
}

?>