<?php 
	require_once "../../_class/entidades/Emprestimo_livro.php";
	require_once "../../_class/dao/emprestimo_livroDAO.php";

	if ($_GET['emprestimo']=='ok') {	

	$entidadeEmprestimo_livro = new Emprestimo_livro();
	$emprestimoLivroDAO = new emprestimoLivroDAO();

	$entidadeEmprestimo_livro->setId_livro($_SESSION['idLivro']);
	$entidadeEmprestimo_livro->setId_aluno($_SESSION['idAluno']);
	$entidadeEmprestimo_livro->setId_cadastro($_SESSION['idCadastro']);
	$entidadeEmprestimo_livro->setData_inicial_emprestimo_livro(date('Y-m-d'));
	$entidadeEmprestimo_livro->setData_final_empretimo_livro(date('Y-m-d', strtotime($data . "+".$_SESSION['prazoLivro']." days")));
	

	$retorno = $emprestimoLivroDAO->fazerEmprestimo_livro($entidadeEmprestimo_livro);

	// echo $retorno;
	if ($retorno != 0) {
		echo "<script>alert('bem Sucedito')</script>";
		$_GET['emprestimo']='sim';
		// header("Location: ../emprestimo/fazer_emprestimoLAlunoELivro.php?emprestimo=sim");
	}
	else {
		echo "<script>alert('Erro ao fazer emprestimo')</script>";
		header("Location: ../emprestimo/fazer_emprestimoLAlunoELivro.php?emprestimo=nao");
		
	}
	}
 ?>