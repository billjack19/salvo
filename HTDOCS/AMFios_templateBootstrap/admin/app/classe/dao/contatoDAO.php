
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class contatoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraContato(Contato $entidadeContato, $area){

		// Configuração de notificação
		/* $area = 'contato'; */
		 
		$descricaoNotificacao = 'NOME CONTATO => '.$entidadeContato->get('NOME_CONTATO').'<br>';
		$descricaoNotificacao .= 'EMAIL CONTATO => '.$entidadeContato->get('EMAIL_CONTATO').'<br>';
		$descricaoNotificacao .= 'TELEFONE CONTATO => '.$entidadeContato->get('TELEFONE_CONTATO').'<br>';
		$descricaoNotificacao .= 'ASSUNTO CONTATO => '.$entidadeContato->get('ASSUNTO_CONTATO').'<br>';
		$descricaoNotificacao .= 'MENSAGEM CONTATO => '.$entidadeContato->get('MENSAGEM_CONTATO').'<br>';
		$descricaoNotificacao .= 'ARQUIVO CONTATO => '.$entidadeContato->get('ARQUIVO_CONTATO').'<br>';
		$descricaoBool = $entidadeContato->get('bool_ativo_contato') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'), 
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'), 
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'), 
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'), 
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'), 
				':ARQUIVO_CONTATO'=>$entidadeContato->get('ARQUIVO_CONTATO'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO contato (NOME_CONTATO, EMAIL_CONTATO, TELEFONE_CONTATO, ASSUNTO_CONTATO, MENSAGEM_CONTATO, ARQUIVO_CONTATO, bool_ativo_contato) VALUES (:NOME_CONTATO, :EMAIL_CONTATO, :TELEFONE_CONTATO, :ASSUNTO_CONTATO, :MENSAGEM_CONTATO, :ARQUIVO_CONTATO, :bool_ativo_contato);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Contato ".$ex->getMessage();
		}
	}


	function atualizaContato(Contato $entidadeContato, $id, $area){

		// Configuração de notificação
		/* $area = 'contato'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM contato WHERE id_contato = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['NOME_CONTATO'] != $entidadeContato->get('NOME_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">NOME CONTATO: '.$dados['NOME_CONTATO'].' => '.$entidadeContato->get('NOME_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'NOME CONTATO => '.$entidadeContato->get('NOME_CONTATO').'<br>';
			}
			if ($dados['EMAIL_CONTATO'] != $entidadeContato->get('EMAIL_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">EMAIL CONTATO: '.$dados['EMAIL_CONTATO'].' => '.$entidadeContato->get('EMAIL_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'EMAIL CONTATO => '.$entidadeContato->get('EMAIL_CONTATO').'<br>';
			}
			if ($dados['TELEFONE_CONTATO'] != $entidadeContato->get('TELEFONE_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">TELEFONE CONTATO: '.$dados['TELEFONE_CONTATO'].' => '.$entidadeContato->get('TELEFONE_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'TELEFONE CONTATO => '.$entidadeContato->get('TELEFONE_CONTATO').'<br>';
			}
			if ($dados['ASSUNTO_CONTATO'] != $entidadeContato->get('ASSUNTO_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">ASSUNTO CONTATO: '.$dados['ASSUNTO_CONTATO'].' => '.$entidadeContato->get('ASSUNTO_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'ASSUNTO CONTATO => '.$entidadeContato->get('ASSUNTO_CONTATO').'<br>';
			}
			if ($dados['MENSAGEM_CONTATO'] != $entidadeContato->get('MENSAGEM_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">MENSAGEM CONTATO: '.$dados['MENSAGEM_CONTATO'].' => '.$entidadeContato->get('MENSAGEM_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'MENSAGEM CONTATO => '.$entidadeContato->get('MENSAGEM_CONTATO').'<br>';
			}
			if ($dados['ARQUIVO_CONTATO'] != $entidadeContato->get('ARQUIVO_CONTATO')) {
				$descricaoNotificacao .= '<b style="color: red">ARQUIVO CONTATO: '.$dados['ARQUIVO_CONTATO'].' => '.$entidadeContato->get('ARQUIVO_CONTATO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'ARQUIVO CONTATO => '.$entidadeContato->get('ARQUIVO_CONTATO').'<br>';
			}
			if ($dados['bool_ativo_contato'] != $entidadeContato->get('bool_ativo_contato')) {
				$descricaoBool = $entidadeContato->get('bool_ativo_contato') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_contato'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeContato->get('bool_ativo_contato') == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
			}
		}
		$tipo_alteracao_notificacoes = 'u';
		if($descricaoNotificacao != "" && $controleAteracao != 0){
			registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);
		}

		// Tenta atualizar um registro exitente
		try{
			$param = array(
				':NOME_CONTATO'=>$entidadeContato->get('NOME_CONTATO'), 
				':EMAIL_CONTATO'=>$entidadeContato->get('EMAIL_CONTATO'), 
				':TELEFONE_CONTATO'=>$entidadeContato->get('TELEFONE_CONTATO'), 
				':ASSUNTO_CONTATO'=>$entidadeContato->get('ASSUNTO_CONTATO'), 
				':MENSAGEM_CONTATO'=>$entidadeContato->get('MENSAGEM_CONTATO'), 
				':ARQUIVO_CONTATO'=>$entidadeContato->get('ARQUIVO_CONTATO'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);

			$stmt = $this->pdo->prepare("UPDATE contato SET NOME_CONTATO = :NOME_CONTATO, EMAIL_CONTATO = :EMAIL_CONTATO, TELEFONE_CONTATO = :TELEFONE_CONTATO, ASSUNTO_CONTATO = :ASSUNTO_CONTATO, MENSAGEM_CONTATO = :MENSAGEM_CONTATO, ARQUIVO_CONTATO = :ARQUIVO_CONTATO, bool_ativo_contato = :bool_ativo_contato WHERE id_contato = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}
}
?>