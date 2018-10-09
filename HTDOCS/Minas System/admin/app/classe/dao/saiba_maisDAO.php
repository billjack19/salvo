
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class saiba_maisDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraSaiba_mais(Saiba_mais $entidadeSaiba_mais, $area){

		// Configuração de notificação
		/* $area = 'saiba_mais'; */
		$usuarioAtuador = $entidadeSaiba_mais->get('usuario_id'); 
		$descricaoNotificacao = 'Descrição => '.$entidadeSaiba_mais->get('descricao_saiba_mais').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSaiba_mais->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeSaiba_mais->get('bool_ativo_saiba_mais') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_saiba_mais'=>$entidadeSaiba_mais->get('descricao_saiba_mais'), 
				':usuario_id'=>$entidadeSaiba_mais->get('usuario_id'), 
				':bool_ativo_saiba_mais'=>$entidadeSaiba_mais->get('bool_ativo_saiba_mais')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO saiba_mais (descricao_saiba_mais, usuario_id, bool_ativo_saiba_mais) VALUES (:descricao_saiba_mais, :usuario_id, :bool_ativo_saiba_mais);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Saiba_mais ".$ex->getMessage();
		}
	}


	function atualizaSaiba_mais(Saiba_mais $entidadeSaiba_mais, $id, $area){

		// Configuração de notificação
		/* $area = 'saiba_mais'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeSaiba_mais->get('usuario_id'); 
		$sql = "SELECT * FROM saiba_mais WHERE id_saiba_mais = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_saiba_mais'] != $entidadeSaiba_mais->get('descricao_saiba_mais')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_saiba_mais'].' => '.$entidadeSaiba_mais->get('descricao_saiba_mais').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeSaiba_mais->get('descricao_saiba_mais').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeSaiba_mais->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSaiba_mais->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSaiba_mais->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_saiba_mais'] != $entidadeSaiba_mais->get('bool_ativo_saiba_mais')) {
				$descricaoBool = $entidadeSaiba_mais->get('bool_ativo_saiba_mais') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_saiba_mais'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeSaiba_mais->get('bool_ativo_saiba_mais') == 1 ? "Sim" : "Não";
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
				':descricao_saiba_mais'=>$entidadeSaiba_mais->get('descricao_saiba_mais'), 
				':usuario_id'=>$entidadeSaiba_mais->get('usuario_id'), 
				':bool_ativo_saiba_mais'=>$entidadeSaiba_mais->get('bool_ativo_saiba_mais')
			);

			$stmt = $this->pdo->prepare("UPDATE saiba_mais SET descricao_saiba_mais = :descricao_saiba_mais, usuario_id = :usuario_id, bool_ativo_saiba_mais = :bool_ativo_saiba_mais WHERE id_saiba_mais = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Saiba_mais ".$ex->getMessage();
		}
	}
}
?>