<?php 
	require_once "../classe/entidade/Contato.php";
	require_once "../classe/dao/contatoDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeContato = new Contato();
		$contatoDAO = new contatoDAO();
		
		$entidadeContato->set($_POST['nome_contato'], 'nome_contato');
		$entidadeContato->set($_POST['email_contato'], 'email_contato');
		$entidadeContato->set($_POST['telefone_contato'], 'telefone_contato');
		$entidadeContato->set($_POST['assunto_contato'], 'assunto_contato');
		$entidadeContato->set($_POST['mensagem_contato'], 'mensagem_contato');

		$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
		$entidadeContato->set($usuario_id, 'usuario_id');

		$entidadeContato->set($_POST['data_atualizacao_contato'], 'data_atualizacao_contato');

		$bool_ativo_contato = $_POST['bool_ativo_contato'] == '' ? 0 : $_POST['bool_ativo_contato'];
		$entidadeContato->set($bool_ativo_contato, 'bool_ativo_contato');


		$retorno = $contatoDAO->atualizaContato($entidadeContato, $_POST['id_contato'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>