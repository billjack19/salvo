
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class adicional_siteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraAdicional_site(Adicional_site $entidadeAdicional_site, $area){

		// Configuração de notificação
		/* $area = 'adicional_site'; */
		$usuarioAtuador = $entidadeAdicional_site->get('usuario_id'); 
		$descricaoNotificacao = 'Titulo => '.$entidadeAdicional_site->get('titulo_adicional_site').'<br>';
		$descricaoNotificacao .= 'Descrição => '.$entidadeAdicional_site->get('descricao_adicional_site').'<br>';
		$descricaoNotificacao .= 'Imagem => '.$entidadeAdicional_site->get('imagem_adicional_site').'<br>';
		$descricaoNotificacao .= 'Saiba Mais => /%/SELECT * FROM saiba_mais WHERE id_saiba_mais = '.$entidadeAdicional_site->get('saiba_mais_id').'/%/<br>';
		$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeAdicional_site->get('usuario_id').'/%/<br>';
		$descricaoBool = $entidadeAdicional_site->get('bool_ativo_adicional_site') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':titulo_adicional_site'=>$entidadeAdicional_site->get('titulo_adicional_site'), 
				':descricao_adicional_site'=>$entidadeAdicional_site->get('descricao_adicional_site'), 
				':imagem_adicional_site'=>$entidadeAdicional_site->get('imagem_adicional_site'), 
				':saiba_mais_id'=>$entidadeAdicional_site->get('saiba_mais_id'), 
				':usuario_id'=>$entidadeAdicional_site->get('usuario_id'), 
				':bool_ativo_adicional_site'=>$entidadeAdicional_site->get('bool_ativo_adicional_site')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO adicional_site (titulo_adicional_site, descricao_adicional_site, imagem_adicional_site, saiba_mais_id, usuario_id, bool_ativo_adicional_site) VALUES (:titulo_adicional_site, :descricao_adicional_site, :imagem_adicional_site, :saiba_mais_id, :usuario_id, :bool_ativo_adicional_site);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Adicional_site ".$ex->getMessage();
		}
	}


	function atualizaAdicional_site(Adicional_site $entidadeAdicional_site, $id, $area){

		// Configuração de notificação
		/* $area = 'adicional_site'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		$usuarioAtuador = $entidadeAdicional_site->get('usuario_id'); 
		$sql = "SELECT * FROM adicional_site WHERE id_adicional_site = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['titulo_adicional_site'] != $entidadeAdicional_site->get('titulo_adicional_site')) {
				$descricaoNotificacao .= '<b style="color: red">Titulo: '.$dados['titulo_adicional_site'].' => '.$entidadeAdicional_site->get('titulo_adicional_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Titulo => '.$entidadeAdicional_site->get('titulo_adicional_site').'<br>';
			}
			if ($dados['descricao_adicional_site'] != $entidadeAdicional_site->get('descricao_adicional_site')) {
				$descricaoNotificacao .= '<b style="color: red">Descrição: '.$dados['descricao_adicional_site'].' => '.$entidadeAdicional_site->get('descricao_adicional_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Descrição => '.$entidadeAdicional_site->get('descricao_adicional_site').'<br>';
			}
			if ($dados['imagem_adicional_site'] != $entidadeAdicional_site->get('imagem_adicional_site')) {
				$descricaoNotificacao .= '<b style="color: red">Imagem: '.$dados['imagem_adicional_site'].' => '.$entidadeAdicional_site->get('imagem_adicional_site').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Imagem => '.$entidadeAdicional_site->get('imagem_adicional_site').'<br>';
			}
			if ($dados['saiba_mais_id'] != $entidadeAdicional_site->get('saiba_mais_id')) {
				$descricaoNotificacao .= '<b style="color: red">Saiba Mais: /%/SELECT * FROM saiba_mais WHERE id_saiba_mais = '.$dados['saiba_mais_id'].'/%/ => /%/SELECT * FROM saiba_mais WHERE id_saiba_mais = '.$entidadeAdicional_site->get('saiba_mais_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Saiba Mais => /%/SELECT * FROM saiba_mais WHERE id_saiba_mais = '.$entidadeAdicional_site->get('saiba_mais_id').'/%/<br>';
			}
			if ($dados['usuario_id'] != $entidadeAdicional_site->get('usuario_id')) {
				$descricaoNotificacao .= '<b style="color: red">Usuário: /%/SELECT * FROM usuario WHERE id_usuario = '.$dados['usuario_id'].'/%/ => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeAdicional_site->get('usuario_id').'/%/</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Usuário => /%/SELECT * FROM usuario WHERE id_usuario = '.$entidadeAdicional_site->get('usuario_id').'/%/<br>';
			}
			if ($dados['bool_ativo_adicional_site'] != $entidadeAdicional_site->get('bool_ativo_adicional_site')) {
				$descricaoBool = $entidadeAdicional_site->get('bool_ativo_adicional_site') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_adicional_site'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeAdicional_site->get('bool_ativo_adicional_site') == 1 ? "Sim" : "Não";
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
				':titulo_adicional_site'=>$entidadeAdicional_site->get('titulo_adicional_site'), 
				':descricao_adicional_site'=>$entidadeAdicional_site->get('descricao_adicional_site'), 
				':imagem_adicional_site'=>$entidadeAdicional_site->get('imagem_adicional_site'), 
				':saiba_mais_id'=>$entidadeAdicional_site->get('saiba_mais_id'), 
				':usuario_id'=>$entidadeAdicional_site->get('usuario_id'), 
				':bool_ativo_adicional_site'=>$entidadeAdicional_site->get('bool_ativo_adicional_site')
			);

			$stmt = $this->pdo->prepare("UPDATE adicional_site SET titulo_adicional_site = :titulo_adicional_site, descricao_adicional_site = :descricao_adicional_site, imagem_adicional_site = :imagem_adicional_site, saiba_mais_id = :saiba_mais_id, usuario_id = :usuario_id, bool_ativo_adicional_site = :bool_ativo_adicional_site WHERE id_adicional_site = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Adicional_site ".$ex->getMessage();
		}
	}
}
?>