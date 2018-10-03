
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class marcaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraMarca(Marca $entidadeMarca, $area){

		// Configuração de notificação
		/* $area = 'marca'; */
		$usuarioAtuador = $entidadeMarca->get('usuario_id'); 
		$descricaoNotificacao = 'Descrição => '.$entidadeMarca->get('descricao_marca').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeMarca->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeMarca->get('bool_ativo_marca') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_marca'=>$entidadeMarca->get('descricao_marca'), 
				':usuario_id'=>$entidadeMarca->get('usuario_id'), 
				':bool_ativo_marca'=>$entidadeMarca->get('bool_ativo_marca')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO marca (descricao_marca, usuario_id, bool_ativo_marca) VALUES (:descricao_marca, :usuario_id, :bool_ativo_marca);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Marca ".$ex->getMessage();
		}
	}


	function atualizaMarca(Marca $entidadeMarca, $id, $area){

		// Configuração de notificação
		/* $area = 'marca'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeMarca->get('usuario_id'); 
		$sql = "SELECT * FROM marca WHERE id_marca = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_marca'] != $entidadeMarca->get('descricao_marca')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_marca'].' => '.$entidadeMarca->get('descricao_marca').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeMarca->get('descricao_marca').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeMarca->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeMarca->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeMarca->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_marca'] != $entidadeMarca->get('bool_ativo_marca')) {
				$descricaoBool = $entidadeMarca->get('bool_ativo_marca') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_marca'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeMarca->get('bool_ativo_marca') == 1 ? "Sim" : "Não";
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
				':descricao_marca'=>$entidadeMarca->get('descricao_marca'), 
				':usuario_id'=>$entidadeMarca->get('usuario_id'), 
				':bool_ativo_marca'=>$entidadeMarca->get('bool_ativo_marca')
			);

			$stmt = $this->pdo->prepare("UPDATE marca SET descricao_marca = :descricao_marca, usuario_id = :usuario_id, bool_ativo_marca = :bool_ativo_marca WHERE id_marca = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Marca ".$ex->getMessage();
		}
	}
}
?>