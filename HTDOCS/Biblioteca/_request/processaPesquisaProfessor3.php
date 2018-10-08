<?php
require_once "../../_class/dao/professorDAO2.php";

$alunoDAO = new alunoDAO();
if ($_SESSION['idProfessor'] != '' ) {
	$id  = (int) $_SESSION['idProfessor'];
	$retorno = $alunoDAO->pegaIdAluno($id);

	foreach ($retorno as $dados) {
		echo "<span id='professorSelecionado'>".$dados[1]."</span>";
	}
}
?>