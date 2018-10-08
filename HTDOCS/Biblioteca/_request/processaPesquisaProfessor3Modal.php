<?php 

require "../../_class/dao/professorDAO2.php";

$alunoDAO = new alunoDAO();

	$retorno = $alunoDAO->pegaIdAluno($dados[2]);

	foreach ($retorno as $dados) {
		echo "<span id='professorSelecionado'>".$dados[1]."</span>";
	}
?>