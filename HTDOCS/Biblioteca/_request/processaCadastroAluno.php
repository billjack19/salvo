<?php 
	require_once "../_class/entidades/Aluno.php";
	require_once "../_class/dao/alunoDAO.php";

	$entidadeAluno = new Aluno();
	$alunoDAO = new alunoDAO();

	// echo $_POST['nome'];

	$entidadeAluno->setMatricula_aluno($_POST['matricula']);
	$entidadeAluno->setNome_aluno($_POST['nome']);
	$entidadeAluno->setEmail_aluno($_POST['email']);
	$entidadeAluno->setCpf_aluno($_POST['cpf']);
	$entidadeAluno->setRg_aluno($_POST['rg']);
	$entidadeAluno->setSexo_aluno($_POST['sexo']);
	$entidadeAluno->setData_nascimento_aluno($_POST['data_nascimento']);
	$entidadeAluno->setTurno_aluno($_POST['turno']);
	$entidadeAluno->setTelefone_aluno($_POST['telefone']);
	$entidadeAluno->setRecord_aluno(0);
	$entidadeAluno->setId_nivel_acesso_aluno(4);
	$entidadeAluno->setAno_aluno($_POST['ano']);
	$entidadeAluno->setTurma_aluno($_POST['turma']);
	$entidadeAluno->setSala_aluno($_POST['sala']);

	$retorno = $alunoDAO->cadastraAluno($entidadeAluno);

	echo $retorno;
 ?>