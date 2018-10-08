
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class videosDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraVideos(Videos $entidadeVideos, $area){

		// Configuração de notificação
		/* $area = 'videos'; */
		 
		$descricaoNotificacao = 'Descrição => '.$entidadeVideos->get('descricao_videos').'<br>';
		$descricaoNotificacao .= 'Link => '.$entidadeVideos->get('link_videos').'<br>';
		$descricaoBool = $entidadeVideos->get('bool_ativo_videos') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':descricao_videos'=>$entidadeVideos->get('descricao_videos'), 
				':link_videos'=>$entidadeVideos->get('link_videos'), 
				':bool_ativo_videos'=>$entidadeVideos->get('bool_ativo_videos')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO videos (descricao_videos, link_videos, bool_ativo_videos) VALUES (:descricao_videos, :link_videos, :bool_ativo_videos);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Videos ".$ex->getMessage();
		}
	}


	function atualizaVideos(Videos $entidadeVideos, $id, $area){

		// Configuração de notificação
		/* $area = 'videos'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM videos WHERE id_videos = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['descricao_videos'] != $entidadeVideos->get('descricao_videos')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_videos'].' => '.$entidadeVideos->get('descricao_videos').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeVideos->get('descricao_videos').'<br>';
			}
			if ($dados['link_videos'] != $entidadeVideos->get('link_videos')) {
				$descricaoNotificacao .= '<b style="color: red">Link: '.$dados['link_videos'].' => '.$entidadeVideos->get('link_videos').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Link => '.$entidadeVideos->get('link_videos').'<br>';
			}
			if ($dados['bool_ativo_videos'] != $entidadeVideos->get('bool_ativo_videos')) {
				$descricaoBool = $entidadeVideos->get('bool_ativo_videos') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_videos'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeVideos->get('bool_ativo_videos') == 1 ? "Sim" : "Não";
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
				':descricao_videos'=>$entidadeVideos->get('descricao_videos'), 
				':link_videos'=>$entidadeVideos->get('link_videos'), 
				':bool_ativo_videos'=>$entidadeVideos->get('bool_ativo_videos')
			);

			$stmt = $this->pdo->prepare("UPDATE videos SET descricao_videos = :descricao_videos, link_videos = :link_videos, bool_ativo_videos = :bool_ativo_videos WHERE id_videos = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Videos ".$ex->getMessage();
		}
	}
}
?>