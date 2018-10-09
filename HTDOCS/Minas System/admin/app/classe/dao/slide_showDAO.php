
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class slide_showDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraSlide_show(Slide_show $entidadeSlide_show, $area){

		// Configuração de notificação
		/* $area = 'slide_show'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeSlide_show->get('titulo_slide_show').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeSlide_show->get('descricao_slide_show').'<br>';
		$descricaoNotificacao .= 'Imagem => '.$entidadeSlide_show->get('imagem_slide_show').'<br>';
		$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeSlide_show->get('configurar_site_id').'/%/<br>';
		$descricaoBool = $entidadeSlide_show->get('bool_ativo_slide_show') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_slide_show'=>$entidadeSlide_show->get('titulo_slide_show'), 
				':descricao_slide_show'=>$entidadeSlide_show->get('descricao_slide_show'), 
				':imagem_slide_show'=>$entidadeSlide_show->get('imagem_slide_show'), 
				':configurar_site_id'=>$entidadeSlide_show->get('configurar_site_id'), 
				':bool_ativo_slide_show'=>$entidadeSlide_show->get('bool_ativo_slide_show')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO slide_show (titulo_slide_show, descricao_slide_show, imagem_slide_show, configurar_site_id, bool_ativo_slide_show) VALUES (:titulo_slide_show, :descricao_slide_show, :imagem_slide_show, :configurar_site_id, :bool_ativo_slide_show);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Slide_show ".$ex->getMessage();
		}
	}


	function atualizaSlide_show(Slide_show $entidadeSlide_show, $id, $area){

		// Configuração de notificação
		/* $area = 'slide_show'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM slide_show WHERE id_slide_show = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_slide_show'] != $entidadeSlide_show->get('titulo_slide_show')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_slide_show'].' => '.$entidadeSlide_show->get('titulo_slide_show').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeSlide_show->get('titulo_slide_show').'<br>';
			}
			if ($dados['descricao_slide_show'] != $entidadeSlide_show->get('descricao_slide_show')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_slide_show'].' => '.$entidadeSlide_show->get('descricao_slide_show').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeSlide_show->get('descricao_slide_show').'<br>';
			}
			if ($dados['imagem_slide_show'] != $entidadeSlide_show->get('imagem_slide_show')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem: '.$dados['imagem_slide_show'].' => '.$entidadeSlide_show->get('imagem_slide_show').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem => '.$entidadeSlide_show->get('imagem_slide_show').'<br>';
			}
			if ($dados['configurar_site_id'] != $entidadeSlide_show->get('configurar_site_id')) {
				$descricaoNotificacao .= '<b style="color: red">Configurar Site: /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$dados['configurar_site_id'].'/%/ => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeSlide_show->get('configurar_site_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeSlide_show->get('configurar_site_id').'/%/<br>';
			}
			if ($dados['bool_ativo_slide_show'] != $entidadeSlide_show->get('bool_ativo_slide_show')) {
				$descricaoBool = $entidadeSlide_show->get('bool_ativo_slide_show') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_slide_show'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeSlide_show->get('bool_ativo_slide_show') == 1 ? "Sim" : "Não";
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
				':titulo_slide_show'=>$entidadeSlide_show->get('titulo_slide_show'), 
				':descricao_slide_show'=>$entidadeSlide_show->get('descricao_slide_show'), 
				':imagem_slide_show'=>$entidadeSlide_show->get('imagem_slide_show'), 
				':configurar_site_id'=>$entidadeSlide_show->get('configurar_site_id'), 
				':bool_ativo_slide_show'=>$entidadeSlide_show->get('bool_ativo_slide_show')
			);

			$stmt = $this->pdo->prepare("UPDATE slide_show SET titulo_slide_show = :titulo_slide_show, descricao_slide_show = :descricao_slide_show, imagem_slide_show = :imagem_slide_show, configurar_site_id = :configurar_site_id, bool_ativo_slide_show = :bool_ativo_slide_show WHERE id_slide_show = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Slide_show ".$ex->getMessage();
		}
	}
}
?>