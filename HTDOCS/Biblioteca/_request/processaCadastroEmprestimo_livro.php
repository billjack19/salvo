<?php 
	require_once "../../_class/entidades/Emprestimo_livro.php";
	require_once "../../_class/dao/emprestimo_livroDAO.php";

	$entidadeEmprestimo_livro = new Emprestimo_livro();
	$emprestimoLivroDAO = new emprestimoLivroDAO();

	$entidadeEmprestimo_livro->setId_livro($_SESSION['idLivro']);
	$entidadeEmprestimo_livro->setId_aluno($_SESSION['idAluno']);
	$entidadeEmprestimo_livro->setId_cadastro($_SESSION['idCadastro']);
	$entidadeEmprestimo_livro->setData_inicial_emprestimo_livro($_GET['data_inicial_emprestimo_livro']);
	$entidadeEmprestimo_livro->setData_final_empretimo_livro($_GET['data_final_empretimo_livro']);

	$retorno = $emprestimoLivroDAO->fazerEmprestimo_livro($entidadeEmprestimo_livro);

	echo "<h1>".$retorno."</h1>";
 ?>
 <!-- processaCadastroEmprestimo_livro -->