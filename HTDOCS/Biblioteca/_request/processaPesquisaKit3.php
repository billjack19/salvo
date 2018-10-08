<?php 

require_once "../../_class/dao/kitDAO2.php";

$kitDAO = new kitDAO();

if ($_SESSION['idKit'] != '' ) {
	$id  = (int) $_SESSION['idKit'];
	$retorno = $kitDAO->pegaIdKit($id);

	foreach ($retorno as $dados) {
		echo "<span id='equipamentoSelect'>".$dados[1]."</span>";
	}
}
?>