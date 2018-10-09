
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class lojaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraLoja(Loja $entidadeLoja, $area){

		// Configuração de notificação
		/* $area = 'loja'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeLoja->get('titulo_loja').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeLoja->get('descricao_loja').'<br>';
		$descricaoNotificacao .= 'Imagem => '.$entidadeLoja->get('imagem_loja').'<br>';
		$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeLoja->get('configurar_site_id').'/%/<br>';
		$descricaoBool = $entidadeLoja->get('bool_ativo_loja') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_loja'=>$entidadeLoja->get('titulo_loja'), 
				':descricao_loja'=>$entidadeLoja->get('descricao_loja'), 
				':imagem_loja'=>$entidadeLoja->get('imagem_loja'), 
				':configurar_site_id'=>$entidadeLoja->get('configurar_site_id'), 
				':bool_ativo_loja'=>$entidadeLoja->get('bool_ativo_loja')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO loja (titulo_loja, descricao_loja, imagem_loja, configurar_site_id, bool_ativo_loja) VALUES (:titulo_loja, :descricao_loja, :imagem_loja, :configurar_site_id, :bool_ativo_loja);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Loja ".$ex->getMessage();
		}
	}


	function atualizaLoja(Loja $entidadeLoja, $id, $area){

		// Configuração de notificação
		/* $area = 'loja'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM loja WHERE id_loja = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_loja'] != $entidadeLoja->get('titulo_loja')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_loja'].' => '.$entidadeLoja->get('titulo_loja').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeLoja->get('titulo_loja').'<br>';
			}
			if ($dados['descricao_loja'] != $entidadeLoja->get('descricao_loja')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_loja'].' => '.$entidadeLoja->get('descricao_loja').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeLoja->get('descricao_loja').'<br>';
			}
			if ($dados['imagem_loja'] != $entidadeLoja->get('imagem_loja')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem: '.$dados['imagem_loja'].' => '.$entidadeLoja->get('imagem_loja').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem => '.$entidadeLoja->get('imagem_loja').'<br>';
			}
			if ($dados['configurar_site_id'] != $entidadeLoja->get('configurar_site_id')) {
				$descricaoNotificacao .= '<b style="color: red">Configurar Site: /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$dados['configurar_site_id'].'/%/ => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeLoja->get('configurar_site_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeLoja->get('configurar_site_id').'/%/<br>';
			}
			if ($dados['bool_ativo_loja'] != $entidadeLoja->get('bool_ativo_loja')) {
				$descricaoBool = $entidadeLoja->get('bool_ativo_loja') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_loja'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeLoja->get('bool_ativo_loja') == 1 ? "Sim" : "Não";
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
				':titulo_loja'=>$entidadeLoja->get('titulo_loja'), 
				':descricao_loja'=>$entidadeLoja->get('descricao_loja'), 
				':imagem_loja'=>$entidadeLoja->get('imagem_loja'), 
				':configurar_site_id'=>$entidadeLoja->get('configurar_site_id'), 
				':bool_ativo_loja'=>$entidadeLoja->get('bool_ativo_loja')
			);

			$stmt = $this->pdo->prepare("UPDATE loja SET titulo_loja = :titulo_loja, descricao_loja = :descricao_loja, imagem_loja = :imagem_loja, configurar_site_id = :configurar_site_id, bool_ativo_loja = :bool_ativo_loja WHERE id_loja = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Loja ".$ex->getMessage();
		}
	}
}
?>