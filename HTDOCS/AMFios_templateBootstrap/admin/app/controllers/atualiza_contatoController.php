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
		
		$entidadeContato->set($_POST['DT_CONTATO'], 'DT_CONTATO');
		$entidadeContato->set($_POST['NOME_CONTATO'], 'NOME_CONTATO');
		$entidadeContato->set($_POST['EMAIL_CONTATO'], 'EMAIL_CONTATO');
		$entidadeContato->set($_POST['TELEFONE_CONTATO'], 'TELEFONE_CONTATO');
		$entidadeContato->set($_POST['ASSUNTO_CONTATO'], 'ASSUNTO_CONTATO');
		$entidadeContato->set($_POST['MENSAGEM_CONTATO'], 'MENSAGEM_CONTATO');
		$entidadeContato->set($_POST['ARQUIVO_CONTATO'], 'ARQUIVO_CONTATO');

		$bool_ativo_contato = $_POST['bool_ativo_contato'] == '' ? 0 : $_POST['bool_ativo_contato'];
		$entidadeContato->set($bool_ativo_contato, 'bool_ativo_contato');


		$retorno = $contatoDAO->atualizaContato($entidadeContato, $_POST['id_contato'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>