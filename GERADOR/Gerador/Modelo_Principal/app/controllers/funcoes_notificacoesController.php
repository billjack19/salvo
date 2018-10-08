<?php
ob_start();
session_start();

require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


// $tabelaPadrao = "mapa+mov+pdf+notif";
// $tabelaPadrao = explode("+", $tabelaPadrao);

if (!empty($_POST['usuario'])) {
	$usuario = $_POST['usuario'];
} else if (!empty($_SESSION['login'])) {
	$usuario = $_SESSION['login'];
} else {
	return false;
}


if (!empty($_POST['listarAreas'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	// $minha_area_nivel_acesso = array();
	$resultado = "";
	/*$sql = "SELECT area_nivel_acesso FROM nivel_acesso
			WHERE id_nivel_acesso = (
				SELECT nivel_acesso_id FROM usuario WHERE id_usuario = $usuario
			);";*/

	$sql = "SELECT 
				  area_area_nivel_acesso
				, demostrativo_area_nivel_acesso
			FROM area_nivel_acesso
			WHERE nivel_acesso_id = (SELECT nivel_acesso_id FROM usuario WHERE id_usuario = $usuario)
			AND bool_list_area_nivel_acesso = 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) { $resultado .= "[]".$dados[0]; } // array_push($minha_area_nivel_acesso, $dados[0]);
	// for ($i=0; $i < sizeof($minha_area_nivel_acesso); $i++) $resultado .= "[]".$minha_area_nivel_acesso[$i];
	echo $resultado;
}





/**********************************************************************************************************/
/** Operações Basicas de Listagem Notificações e Notificações Config */
/**********************************************************************************************************/
include "operacoes_notificacoes.php";
include "operacoes_notificacoes_salvas.php";
include "operacoes_notificacoes_config.php";

?>