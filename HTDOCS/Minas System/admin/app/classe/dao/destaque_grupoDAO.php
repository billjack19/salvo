
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class destaque_grupoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraDestaque_grupo(Destaque_grupo $entidadeDestaque_grupo, $area){

		// Configuração de notificação
		/* $area = 'destaque_grupo'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeDestaque_grupo->get('titulo_destaque_grupo').'<br>';
		$descricaoNotificacao .= 'Grupo => /%/SELECT * FROM grupo WHERE id_grupo = '.$entidadeDestaque_grupo->get('grupo_id').'/%/<br>';
		$descricaoNotificacao .= 'Imagem => '.$entidadeDestaque_grupo->get('imagem_destaque_grupo').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeDestaque_grupo->get('descricao_destaque_grupo').'<br>';
		$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeDestaque_grupo->get('configurar_site_id').'/%/<br>';
		$descricaoBool = $entidadeDestaque_grupo->get('bool_ativo_destaque_grupo') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_destaque_grupo'=>$entidadeDestaque_grupo->get('titulo_destaque_grupo'), 
				':grupo_id'=>$entidadeDestaque_grupo->get('grupo_id'), 
				':imagem_destaque_grupo'=>$entidadeDestaque_grupo->get('imagem_destaque_grupo'), 
				':descricao_destaque_grupo'=>$entidadeDestaque_grupo->get('descricao_destaque_grupo'), 
				':configurar_site_id'=>$entidadeDestaque_grupo->get('configurar_site_id'), 
				':bool_ativo_destaque_grupo'=>$entidadeDestaque_grupo->get('bool_ativo_destaque_grupo')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO destaque_grupo (titulo_destaque_grupo, grupo_id, imagem_destaque_grupo, descricao_destaque_grupo, configurar_site_id, bool_ativo_destaque_grupo) VALUES (:titulo_destaque_grupo, :grupo_id, :imagem_destaque_grupo, :descricao_destaque_grupo, :configurar_site_id, :bool_ativo_destaque_grupo);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Destaque_grupo ".$ex->getMessage();
		}
	}


	function atualizaDestaque_grupo(Destaque_grupo $entidadeDestaque_grupo, $id, $area){

		// Configuração de notificação
		/* $area = 'destaque_grupo'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM destaque_grupo WHERE id_destaque_grupo = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_destaque_grupo'] != $entidadeDestaque_grupo->get('titulo_destaque_grupo')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_destaque_grupo'].' => '.$entidadeDestaque_grupo->get('titulo_destaque_grupo').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeDestaque_grupo->get('titulo_destaque_grupo').'<br>';
			}
			if ($dados['grupo_id'] != $entidadeDestaque_grupo->get('grupo_id')) {
				$descricaoNotificacao .= '<b style="color: red">Grupo: /%/SELECT * FROM grupo WHERE id_grupo = '.$dados['grupo_id'].'/%/ => /%/SELECT * FROM grupo WHERE id_grupo = '.$entidadeDestaque_grupo->get('grupo_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Grupo => /%/SELECT * FROM grupo WHERE id_grupo = '.$entidadeDestaque_grupo->get('grupo_id').'/%/<br>';
			}
			if ($dados['imagem_destaque_grupo'] != $entidadeDestaque_grupo->get('imagem_destaque_grupo')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem: '.$dados['imagem_destaque_grupo'].' => '.$entidadeDestaque_grupo->get('imagem_destaque_grupo').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem => '.$entidadeDestaque_grupo->get('imagem_destaque_grupo').'<br>';
			}
			if ($dados['descricao_destaque_grupo'] != $entidadeDestaque_grupo->get('descricao_destaque_grupo')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_destaque_grupo'].' => '.$entidadeDestaque_grupo->get('descricao_destaque_grupo').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeDestaque_grupo->get('descricao_destaque_grupo').'<br>';
			}
			if ($dados['configurar_site_id'] != $entidadeDestaque_grupo->get('configurar_site_id')) {
				$descricaoNotificacao .= '<b style="color: red">Configurar Site: /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$dados['configurar_site_id'].'/%/ => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeDestaque_grupo->get('configurar_site_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Configurar Site => /%/SELECT * FROM configurar_site WHERE id_configurar_site = '.$entidadeDestaque_grupo->get('configurar_site_id').'/%/<br>';
			}
			if ($dados['bool_ativo_destaque_grupo'] != $entidadeDestaque_grupo->get('bool_ativo_destaque_grupo')) {
				$descricaoBool = $entidadeDestaque_grupo->get('bool_ativo_destaque_grupo') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_destaque_grupo'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeDestaque_grupo->get('bool_ativo_destaque_grupo') == 1 ? "Sim" : "Não";
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
				':titulo_destaque_grupo'=>$entidadeDestaque_grupo->get('titulo_destaque_grupo'), 
				':grupo_id'=>$entidadeDestaque_grupo->get('grupo_id'), 
				':imagem_destaque_grupo'=>$entidadeDestaque_grupo->get('imagem_destaque_grupo'), 
				':descricao_destaque_grupo'=>$entidadeDestaque_grupo->get('descricao_destaque_grupo'), 
				':configurar_site_id'=>$entidadeDestaque_grupo->get('configurar_site_id'), 
				':bool_ativo_destaque_grupo'=>$entidadeDestaque_grupo->get('bool_ativo_destaque_grupo')
			);

			$stmt = $this->pdo->prepare("UPDATE destaque_grupo SET titulo_destaque_grupo = :titulo_destaque_grupo, grupo_id = :grupo_id, imagem_destaque_grupo = :imagem_destaque_grupo, descricao_destaque_grupo = :descricao_destaque_grupo, configurar_site_id = :configurar_site_id, bool_ativo_destaque_grupo = :bool_ativo_destaque_grupo WHERE id_destaque_grupo = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Destaque_grupo ".$ex->getMessage();
		}
	}
}
?>