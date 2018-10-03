
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class supermercadoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraSupermercado(Supermercado $entidadeSupermercado, $area){

		// Configuração de notificação
		/* $area = 'supermercado'; */
		$usuarioAtuador = $entidadeSupermercado->get('usuario_id'); 
		$descricaoNotificacao = 'Descrição => '.$entidadeSupermercado->get('descricao_supermercado').'<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSupermercado->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeSupermercado->get('bool_ativo_supermercado') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_supermercado'=>$entidadeSupermercado->get('descricao_supermercado'), 
				':usuario_id'=>$entidadeSupermercado->get('usuario_id'), 
				':bool_ativo_supermercado'=>$entidadeSupermercado->get('bool_ativo_supermercado')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO supermercado (descricao_supermercado, usuario_id, bool_ativo_supermercado) VALUES (:descricao_supermercado, :usuario_id, :bool_ativo_supermercado);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Supermercado ".$ex->getMessage();
		}
	}


	function atualizaSupermercado(Supermercado $entidadeSupermercado, $id, $area){

		// Configuração de notificação
		/* $area = 'supermercado'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeSupermercado->get('usuario_id'); 
		$sql = "SELECT * FROM supermercado WHERE id_supermercado = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_supermercado'] != $entidadeSupermercado->get('descricao_supermercado')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_supermercado'].' => '.$entidadeSupermercado->get('descricao_supermercado').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeSupermercado->get('descricao_supermercado').'<br>';
			}
			if ($dados['usuario_id'] != $entidadeSupermercado->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSupermercado->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeSupermercado->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_supermercado'] != $entidadeSupermercado->get('bool_ativo_supermercado')) {
				$descricaoBool = $entidadeSupermercado->get('bool_ativo_supermercado') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_supermercado'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeSupermercado->get('bool_ativo_supermercado') == 1 ? "Sim" : "Não";
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
				':descricao_supermercado'=>$entidadeSupermercado->get('descricao_supermercado'), 
				':usuario_id'=>$entidadeSupermercado->get('usuario_id'), 
				':bool_ativo_supermercado'=>$entidadeSupermercado->get('bool_ativo_supermercado')
			);

			$stmt = $this->pdo->prepare("UPDATE supermercado SET descricao_supermercado = :descricao_supermercado, usuario_id = :usuario_id, bool_ativo_supermercado = :bool_ativo_supermercado WHERE id_supermercado = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Supermercado ".$ex->getMessage();
		}
	}
}
?>