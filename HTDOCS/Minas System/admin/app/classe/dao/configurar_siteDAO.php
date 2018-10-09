
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class configurar_siteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraConfigurar_site(Configurar_site $entidadeConfigurar_site, $area){

		// Configuração de notificação
		/* $area = 'configurar_site'; */
		 
		$descricaoNotificacao = 'Titulo => '.$entidadeConfigurar_site->get('titulo_configurar_site').'<br>';
		$descricaoNotificacao .= 'Titulo Menu => '.$entidadeConfigurar_site->get('titulo_menu_configurar_site').'<br>';
		$descricaoNotificacao .= 'Cor Pagina => '.$entidadeConfigurar_site->get('cor_pagina_configurar_site').'<br>';
		$descricaoNotificacao .= 'Contra Cor Pagina => '.$entidadeConfigurar_site->get('contra_cor_pagina_configurar_site').'<br>';
		$descricaoNotificacao .= 'Imagem Icone => '.$entidadeConfigurar_site->get('imagem_icone_configurar_site').'<br>';
		$descricaoNotificacao .= 'Imagem Logo => '.$entidadeConfigurar_site->get('imagem_logo_configurar_site').'<br>';
		$descricaoBool = $entidadeConfigurar_site->get('bool_ativo_configurar_site') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_configurar_site'=>$entidadeConfigurar_site->get('titulo_configurar_site'), 
				':titulo_menu_configurar_site'=>$entidadeConfigurar_site->get('titulo_menu_configurar_site'), 
				':cor_pagina_configurar_site'=>$entidadeConfigurar_site->get('cor_pagina_configurar_site'), 
				':contra_cor_pagina_configurar_site'=>$entidadeConfigurar_site->get('contra_cor_pagina_configurar_site'), 
				':imagem_icone_configurar_site'=>$entidadeConfigurar_site->get('imagem_icone_configurar_site'), 
				':imagem_logo_configurar_site'=>$entidadeConfigurar_site->get('imagem_logo_configurar_site'), 
				':bool_ativo_configurar_site'=>$entidadeConfigurar_site->get('bool_ativo_configurar_site')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO configurar_site (titulo_configurar_site, titulo_menu_configurar_site, cor_pagina_configurar_site, contra_cor_pagina_configurar_site, imagem_icone_configurar_site, imagem_logo_configurar_site, bool_ativo_configurar_site) VALUES (:titulo_configurar_site, :titulo_menu_configurar_site, :cor_pagina_configurar_site, :contra_cor_pagina_configurar_site, :imagem_icone_configurar_site, :imagem_logo_configurar_site, :bool_ativo_configurar_site);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Configurar_site ".$ex->getMessage();
		}
	}


	function atualizaConfigurar_site(Configurar_site $entidadeConfigurar_site, $id, $area){

		// Configuração de notificação
		/* $area = 'configurar_site'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM configurar_site WHERE id_configurar_site = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_configurar_site'] != $entidadeConfigurar_site->get('titulo_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_configurar_site'].' => '.$entidadeConfigurar_site->get('titulo_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeConfigurar_site->get('titulo_configurar_site').'<br>';
			}
			if ($dados['titulo_menu_configurar_site'] != $entidadeConfigurar_site->get('titulo_menu_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo Menu: '.$dados['titulo_menu_configurar_site'].' => '.$entidadeConfigurar_site->get('titulo_menu_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo Menu => '.$entidadeConfigurar_site->get('titulo_menu_configurar_site').'<br>';
			}
			if ($dados['cor_pagina_configurar_site'] != $entidadeConfigurar_site->get('cor_pagina_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Cor Pagina: '.$dados['cor_pagina_configurar_site'].' => '.$entidadeConfigurar_site->get('cor_pagina_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Cor Pagina => '.$entidadeConfigurar_site->get('cor_pagina_configurar_site').'<br>';
			}
			if ($dados['contra_cor_pagina_configurar_site'] != $entidadeConfigurar_site->get('contra_cor_pagina_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Contra Cor Pagina: '.$dados['contra_cor_pagina_configurar_site'].' => '.$entidadeConfigurar_site->get('contra_cor_pagina_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Contra Cor Pagina => '.$entidadeConfigurar_site->get('contra_cor_pagina_configurar_site').'<br>';
			}
			if ($dados['imagem_icone_configurar_site'] != $entidadeConfigurar_site->get('imagem_icone_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem Icone: '.$dados['imagem_icone_configurar_site'].' => '.$entidadeConfigurar_site->get('imagem_icone_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem Icone => '.$entidadeConfigurar_site->get('imagem_icone_configurar_site').'<br>';
			}
			if ($dados['imagem_logo_configurar_site'] != $entidadeConfigurar_site->get('imagem_logo_configurar_site')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem Logo: '.$dados['imagem_logo_configurar_site'].' => '.$entidadeConfigurar_site->get('imagem_logo_configurar_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem Logo => '.$entidadeConfigurar_site->get('imagem_logo_configurar_site').'<br>';
			}
			if ($dados['bool_ativo_configurar_site'] != $entidadeConfigurar_site->get('bool_ativo_configurar_site')) {
				$descricaoBool = $entidadeConfigurar_site->get('bool_ativo_configurar_site') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_configurar_site'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeConfigurar_site->get('bool_ativo_configurar_site') == 1 ? "Sim" : "Não";
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
				':titulo_configurar_site'=>$entidadeConfigurar_site->get('titulo_configurar_site'), 
				':titulo_menu_configurar_site'=>$entidadeConfigurar_site->get('titulo_menu_configurar_site'), 
				':cor_pagina_configurar_site'=>$entidadeConfigurar_site->get('cor_pagina_configurar_site'), 
				':contra_cor_pagina_configurar_site'=>$entidadeConfigurar_site->get('contra_cor_pagina_configurar_site'), 
				':imagem_icone_configurar_site'=>$entidadeConfigurar_site->get('imagem_icone_configurar_site'), 
				':imagem_logo_configurar_site'=>$entidadeConfigurar_site->get('imagem_logo_configurar_site'), 
				':bool_ativo_configurar_site'=>$entidadeConfigurar_site->get('bool_ativo_configurar_site')
			);

			$stmt = $this->pdo->prepare("UPDATE configurar_site SET titulo_configurar_site = :titulo_configurar_site, titulo_menu_configurar_site = :titulo_menu_configurar_site, cor_pagina_configurar_site = :cor_pagina_configurar_site, contra_cor_pagina_configurar_site = :contra_cor_pagina_configurar_site, imagem_icone_configurar_site = :imagem_icone_configurar_site, imagem_logo_configurar_site = :imagem_logo_configurar_site, bool_ativo_configurar_site = :bool_ativo_configurar_site WHERE id_configurar_site = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Configurar_site ".$ex->getMessage();
		}
	}
}
?>