<?php 
	session_start();
	require "../_class/dao/emprestimo_kitDAO.php";
	require "../_class/entidades/Emprestimo_kit.php";
	
	$emprestimo_kitDAO = new emprestimo_kitDAO();	
	$entidadeEmprestimo_kit = new Emprestimo_kit();

	$entidadeEmprestimo_kit->setId_kit($_SESSION['idKit']);
	$entidadeEmprestimo_kit->setId_funcionario($_SESSION['idProfessor']);
	$entidadeEmprestimo_kit->setData_emprestimo_kit($_POST['dataEmprestimoKit']);
	$entidadeEmprestimo_kit->setCodigo_aula_emprestimo_kit($_POST['codigo']);

	$retorno = $emprestimo_kitDAO->cadastraEmprestimo_kit($entidadeEmprestimo_kit);
 ?>