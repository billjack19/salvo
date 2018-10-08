<?php 
	require "../_class/dao/emprestimo_livroDAO3.php";

	// if ($_POST['devolver'] != '') {
	$emprestimoLivroDAO = new emprestimoLivroDAO();	

	$retorno = $emprestimoLivroDAO->fazerDevolucao_livro($_POST['idEmprestimo']);

	if ($retorno != 0) {
		$link = "consulta_emprestimoLAlunoELivro.php";
		$aluno = "?aluno=" ;
		$tipoFiltro = '&tipoFiltro=0';
		$devolvers = "&devolver=sim";
		$url = $link.$aluno.$tipoFiltro.$devolvers;
		$arquivo = str_replace("#", "", $url);
		header("Location: ../emprestimo/".$url);
	}
	else {
		$link = "consulta_emprestimoLAlunoELivro.php";
		$aluno = "?aluno=" ;
		$tipoFiltro = '&tipoFiltro=0';
		$devolvers = "&devolver=nao";
		$url = $link.$aluno.$tipoFiltro.$devolvers;
		$arquivo = str_replace("#", "", $url);
		header("Location: ../emprestimo/".$url);
	}
	// }
 ?>