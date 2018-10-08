<?php 
	require_once "../_class/entidades/Funcionario.php";
	require_once "../_class/dao/funcionarioDAO.php";

	$entidadeFuncionario = new Funcionario();
	$funcionarioDAO = new funcionarioDAO();

	$entidadeFuncionario->setNome_funcionario($_POST['nome']);
	$entidadeFuncionario->setCpf_funcionario($_POST['cpf']);
	$entidadeFuncionario->setRg_funcionario($_POST['rg']);
	$entidadeFuncionario->setSexo_funcionario($_POST['sexo']);
	$entidadeFuncionario->setData_nascimento_funcionario($_POST['data_nascimento']);
	$entidadeFuncionario->setTelefone_funcionario($_POST['telefone']);
	$entidadeFuncionario->setCep_funcionario($_POST['cep']);
	$entidadeFuncionario->setEndereco_funcionario($_POST['endereco']);
	$entidadeFuncionario->setNumero_end_funcionario($_POST['numero_end']);
	$entidadeFuncionario->setComplemento_end_funcionario($_POST['complemento_end']);
	$entidadeFuncionario->setBairro_end_funcionario($_POST['bairro']);
	$entidadeFuncionario->setEstado_end_funcionario($_POST['estado']);
	$entidadeFuncionario->setCidade_end_funcionario($_POST['cidade']);
	$entidadeFuncionario->setTurno_funcionario($_POST['turno']);
	$entidadeFuncionario->setCargo_funcionario($_POST['cargo']);

	if ($_POST['cargo'] === 'Bibliotecário') {
		$entidadeFuncionario->setId_nivel_de_acesso(2);
	}
	else if ($_POST['cargo'] === 'Professor') {
		$entidadeFuncionario->setId_nivel_de_acesso(3);
	}
	
	$entidadeFuncionario->setEmail_funcionario($_POST['email']);
	$entidadeFuncionario->setMasp_funcionario($_POST['masp']);


	$retorno = $funcionarioDAO->cadastraFuncionario($entidadeFuncionario);

	echo $retorno;
 ?>