<?php 
	require_once "../../_class/entidades/Emprestimo_livro.php";
	require_once "../../_class/dao/emprestimo_livroDAO.php";

	if ($_GET['emprestimo']=='ok') {	

	$entidadeEmprestimo_livro = new Emprestimo_livro();
	$emprestimoLivroDAO = new emprestimoLivroDAO();

	$entidadeEmprestimo_livro->setId_livro($_GET['idLivro']);
	$entidadeEmprestimo_livro->setId_aluno($_GET['idAluno']);
	$entidadeEmprestimo_livro->setId_cadastro($_GET['idUser']);
	$entidadeEmprestimo_livro->setData_inicial_emprestimo_livro($_GET['dataI']);
	$entidadeEmprestimo_livro->setData_final_empretimo_livro($_GET['dataF']);
	

	$retorno = $emprestimoLivroDAO->fazerEmprestimo_livro2($entidadeEmprestimo_livro);

	// echo $retorno;
	if ($retorno != 0) {
		$link = "fazer_emprestimoLProfessorELivro.php";
		$login = "?login=".$_GET['login'];
		$nome = "&nome=".$_GET['nome'];
		$frase = "&frase=".$_GET['frase'];
		$livro = "&livro=" ;
		$idLivro = "&idLivro=".$_GET['idLivro'];
		$idAluno = "&idAluno=".$_GET['idAluno'];
		$emprestimo = "&emprestimo=sim";
		$url = $link.$login.$nome.$frase.$livro.$idLivro.$idAluno.$emprestimo;
		$arquivo = str_replace("#", "", $url);
		header("Location: ../emprestimo/".$url);
	}
	else {
		$link = "fazer_emprestimoLProfessorELivro.php";
		$login = "?login=".$_GET['login'];
		$nome = "&nome=".$_GET['nome'];
		$frase = "&frase=".$_GET['frase'];
		$livro = "&livro=" ;
		$idLivro = "&idLivro=".$_GET['idLivro'];
		$idAluno = "&idAluno=".$_GET['idAluno'];
		$emprestimo = "&emprestimo=nao";
		$url = $link.$login.$nome.$frase.$livro.$idLivro.$idAluno.$emprestimo;
		$arquivo = str_replace("#", "", $url);
		header("Location: ../emprestimo/".$url);
	}
	}
 ?>