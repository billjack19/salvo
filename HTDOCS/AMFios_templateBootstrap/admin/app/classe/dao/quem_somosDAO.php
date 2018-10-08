
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class quem_somosDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraQuem_somos(Quem_somos $entidadeQuem_somos, $area){

		// Configuração de notificação
		/* $area = 'quem_somos'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeQuem_somos->get('titulo_quem_somos').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeQuem_somos->get('descricao_quem_somos').'<br>';
		$descricaoBool = $entidadeQuem_somos->get('bool_ativo_quem_somos') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_quem_somos'=>$entidadeQuem_somos->get('titulo_quem_somos'), 
				':descricao_quem_somos'=>$entidadeQuem_somos->get('descricao_quem_somos'), 
				':bool_ativo_quem_somos'=>$entidadeQuem_somos->get('bool_ativo_quem_somos')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO quem_somos (titulo_quem_somos, descricao_quem_somos, bool_ativo_quem_somos) VALUES (:titulo_quem_somos, :descricao_quem_somos, :bool_ativo_quem_somos);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Quem_somos ".$ex->getMessage();
		}
	}


	function atualizaQuem_somos(Quem_somos $entidadeQuem_somos, $id, $area){

		// Configuração de notificação
		/* $area = 'quem_somos'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM quem_somos WHERE id_quem_somos = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_quem_somos'] != $entidadeQuem_somos->get('titulo_quem_somos')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_quem_somos'].' => '.$entidadeQuem_somos->get('titulo_quem_somos').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeQuem_somos->get('titulo_quem_somos').'<br>';
			}
			if ($dados['descricao_quem_somos'] != $entidadeQuem_somos->get('descricao_quem_somos')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_quem_somos'].' => '.$entidadeQuem_somos->get('descricao_quem_somos').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeQuem_somos->get('descricao_quem_somos').'<br>';
			}
			if ($dados['bool_ativo_quem_somos'] != $entidadeQuem_somos->get('bool_ativo_quem_somos')) {
				$descricaoBool = $entidadeQuem_somos->get('bool_ativo_quem_somos') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_quem_somos'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeQuem_somos->get('bool_ativo_quem_somos') == 1 ? "Sim" : "Não";
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
				':titulo_quem_somos'=>$entidadeQuem_somos->get('titulo_quem_somos'), 
				':descricao_quem_somos'=>$entidadeQuem_somos->get('descricao_quem_somos'), 
				':bool_ativo_quem_somos'=>$entidadeQuem_somos->get('bool_ativo_quem_somos')
			);

			$stmt = $this->pdo->prepare("UPDATE quem_somos SET titulo_quem_somos = :titulo_quem_somos, descricao_quem_somos = :descricao_quem_somos, bool_ativo_quem_somos = :bool_ativo_quem_somos WHERE id_quem_somos = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Quem_somos ".$ex->getMessage();
		}
	}
}
?>