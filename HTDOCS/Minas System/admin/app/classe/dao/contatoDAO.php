
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
		$usuarioAtuador = $entidadeContato->get('usuario_id'); 
		$descricaoNotificacao = 'Nome => '.$entidadeContato->get('nome_contato').'<br>';
		$descricaoNotificacao .= 'Email => '.$entidadeContato->get('email_contato').'<br>';
		$descricaoNotificacao .= 'Telefone => '.$entidadeContato->get('telefone_contato').'<br>';
		$descricaoNotificacao .= 'Assunto => '.$entidadeContato->get('assunto_contato').'<br>';
		$descricaoNotificacao .= 'Mensagem => '.$entidadeContato->get('mensagem_contato').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeContato->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeContato->get('bool_ativo_contato') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':nome_contato'=>$entidadeContato->get('nome_contato'), 
				':email_contato'=>$entidadeContato->get('email_contato'), 
				':telefone_contato'=>$entidadeContato->get('telefone_contato'), 
				':assunto_contato'=>$entidadeContato->get('assunto_contato'), 
				':mensagem_contato'=>$entidadeContato->get('mensagem_contato'), 
				':usuario_id'=>$entidadeContato->get('usuario_id'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO contato (nome_contato, email_contato, telefone_contato, assunto_contato, mensagem_contato, usuario_id, bool_ativo_contato) VALUES (:nome_contato, :email_contato, :telefone_contato, :assunto_contato, :mensagem_contato, :usuario_id, :bool_ativo_contato);"
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
		$usuarioAtuador = $entidadeContato->get('usuario_id'); 
		$sql = "SELECT * FROM contato WHERE id_contato = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['nome_contato'] != $entidadeContato->get('nome_contato')) {
				$descricaoNotificacao .= '<b style="color: red">Nome: '.$dados['nome_contato'].' => '.$entidadeContato->get('nome_contato').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Nome => '.$entidadeContato->get('nome_contato').'<br>';
			}
			if ($dados['email_contato'] != $entidadeContato->get('email_contato')) {
				$descricaoNotificacao .= '<b style="color: red">Email: '.$dados['email_contato'].' => '.$entidadeContato->get('email_contato').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Email => '.$entidadeContato->get('email_contato').'<br>';
			}
			if ($dados['telefone_contato'] != $entidadeContato->get('telefone_contato')) {
				$descricaoNotificacao .= '<b style="color: red">Telefone: '.$dados['telefone_contato'].' => '.$entidadeContato->get('telefone_contato').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Telefone => '.$entidadeContato->get('telefone_contato').'<br>';
			}
			if ($dados['assunto_contato'] != $entidadeContato->get('assunto_contato')) {
				$descricaoNotificacao .= '<b style="color: red">Assunto: '.$dados['assunto_contato'].' => '.$entidadeContato->get('assunto_contato').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Assunto => '.$entidadeContato->get('assunto_contato').'<br>';
			}
			if ($dados['mensagem_contato'] != $entidadeContato->get('mensagem_contato')) {
				$descricaoNotificacao .= '<b style="color: red">Mensagem: '.$dados['mensagem_contato'].' => '.$entidadeContato->get('mensagem_contato').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Mensagem => '.$entidadeContato->get('mensagem_contato').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeContato->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeContato->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeContato->get('usuario_id').'/%/<br>';
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
				':nome_contato'=>$entidadeContato->get('nome_contato'), 
				':email_contato'=>$entidadeContato->get('email_contato'), 
				':telefone_contato'=>$entidadeContato->get('telefone_contato'), 
				':assunto_contato'=>$entidadeContato->get('assunto_contato'), 
				':mensagem_contato'=>$entidadeContato->get('mensagem_contato'), 
				':usuario_id'=>$entidadeContato->get('usuario_id'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);

			$stmt = $this->pdo->prepare("UPDATE contato SET nome_contato = :nome_contato, email_contato = :email_contato, telefone_contato = :telefone_contato, assunto_contato = :assunto_contato, mensagem_contato = :mensagem_contato, usuario_id = :usuario_id, bool_ativo_contato = :bool_ativo_contato WHERE id_contato = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}
}
?>