<?php 
include "../../_class/dao/emprestimo_livroDAO2.php";
$num = 0;
$emprestimoLivroDAO = new emprestimoLivroDAO2();

	$retorno = $emprestimoLivroDAO->pegaEmprestimo('','1');
	foreach ($retorno as $dados) {
		$num = $num + 1;
	}
	if ($num < 10) {
		echo "0".$num;
	}
	else if ($num < 100) {
		echo $num;
	}
	else {
		echo "+99";
	}
?>