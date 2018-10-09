
<?php 
require_once "../classe/conexao.php";
require_once "../controllers/funcoes_notificacoesControllerAcao.php";

class siteDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}


	function cadastraSite(Site $entidadeSite, $area){

		// Configuração de notificação
		/* $area = 'site'; */
		 
		$descricaoNotificacao = 'NOME EMPRESA => '.$entidadeSite->get('NOME_EMPRESA').'<br>';
		$descricaoNotificacao .= 'NOME CIDADE => '.$entidadeSite->get('NOME_CIDADE').'<br>';
		$descricaoNotificacao .= 'ESTADO => '.$entidadeSite->get('ESTADO').'<br>';
		$descricaoNotificacao .= 'FONE => '.$entidadeSite->get('FONE').'<br>';
		$descricaoNotificacao .= 'FONE APP => '.$entidadeSite->get('FONE_APP').'<br>';
		$descricaoNotificacao .= 'EMAIL => '.$entidadeSite->get('EMAIL').'<br>';
		$descricaoNotificacao .= 'Sendusername => '.$entidadeSite->get('sendusername').'<br>';
		$descricaoNotificacao .= 'Sendpassword => '.$entidadeSite->get('sendpassword').'<br>';
		$descricaoNotificacao .= 'Smtpserver => '.$entidadeSite->get('smtpserver').'<br>';
		$descricaoNotificacao .= 'Smtpserverport => '.$entidadeSite->get('smtpserverport').'<br>';
		$descricaoNotificacao .= 'MailFrom => '.$entidadeSite->get('MailFrom').'<br>';
		$descricaoNotificacao .= 'MailTo => '.$entidadeSite->get('MailTo').'<br>';
		$descricaoNotificacao .= 'MailCc => '.$entidadeSite->get('MailCc').'<br>';
		$descricaoBool = $entidadeSite->get('bool_ativo_site') == 1 ? "Sim" : "Não";
		$descricaoNotificacao .= 'Ativo => '.$descricaoBool.'<br>';
		$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao($area, $descricaoNotificacao, $usuarioAtuador, $tipo_alteracao_notificacoes, $this->pdo);

		// Tentar gravar um novo registro
		try{
			$param = array(
				':NOME_EMPRESA'=>$entidadeSite->get('NOME_EMPRESA'), 
				':NOME_CIDADE'=>$entidadeSite->get('NOME_CIDADE'), 
				':ESTADO'=>$entidadeSite->get('ESTADO'), 
				':FONE'=>$entidadeSite->get('FONE'), 
				':FONE_APP'=>$entidadeSite->get('FONE_APP'), 
				':EMAIL'=>$entidadeSite->get('EMAIL'), 
				':sendusername'=>$entidadeSite->get('sendusername'), 
				':sendpassword'=>$entidadeSite->get('sendpassword'), 
				':smtpserver'=>$entidadeSite->get('smtpserver'), 
				':smtpserverport'=>$entidadeSite->get('smtpserverport'), 
				':MailFrom'=>$entidadeSite->get('MailFrom'), 
				':MailTo'=>$entidadeSite->get('MailTo'), 
				':MailCc'=>$entidadeSite->get('MailCc'), 
				':bool_ativo_site'=>$entidadeSite->get('bool_ativo_site')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO site (NOME_EMPRESA, NOME_CIDADE, ESTADO, FONE, FONE_APP, EMAIL, sendusername, sendpassword, smtpserver, smtpserverport, MailFrom, MailTo, MailCc, bool_ativo_site) VALUES (:NOME_EMPRESA, :NOME_CIDADE, :ESTADO, :FONE, :FONE_APP, :EMAIL, :sendusername, :sendpassword, :smtpserver, :smtpserverport, :MailFrom, :MailTo, :MailCc, :bool_ativo_site);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Site ".$ex->getMessage();
		}
	}


	function atualizaSite(Site $entidadeSite, $id, $area){

		// Configuração de notificação
		/* $area = 'site'; */
		$descricaoNotificacao = "";
		$controleAteracao = 0;
		 
		$sql = "SELECT * FROM site WHERE id_site = ".$id;
		$verifica = $this->pdo->query($sql);
		foreach ($verifica as $dados){ 
			if ($dados['NOME_EMPRESA'] != $entidadeSite->get('NOME_EMPRESA')) {
				$descricaoNotificacao .= '<b style="color: red">NOME EMPRESA: '.$dados['NOME_EMPRESA'].' => '.$entidadeSite->get('NOME_EMPRESA').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'NOME EMPRESA => '.$entidadeSite->get('NOME_EMPRESA').'<br>';
			}
			if ($dados['NOME_CIDADE'] != $entidadeSite->get('NOME_CIDADE')) {
				$descricaoNotificacao .= '<b style="color: red">NOME CIDADE: '.$dados['NOME_CIDADE'].' => '.$entidadeSite->get('NOME_CIDADE').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'NOME CIDADE => '.$entidadeSite->get('NOME_CIDADE').'<br>';
			}
			if ($dados['ESTADO'] != $entidadeSite->get('ESTADO')) {
				$descricaoNotificacao .= '<b style="color: red">ESTADO: '.$dados['ESTADO'].' => '.$entidadeSite->get('ESTADO').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'ESTADO => '.$entidadeSite->get('ESTADO').'<br>';
			}
			if ($dados['FONE'] != $entidadeSite->get('FONE')) {
				$descricaoNotificacao .= '<b style="color: red">FONE: '.$dados['FONE'].' => '.$entidadeSite->get('FONE').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'FONE => '.$entidadeSite->get('FONE').'<br>';
			}
			if ($dados['FONE_APP'] != $entidadeSite->get('FONE_APP')) {
				$descricaoNotificacao .= '<b style="color: red">FONE APP: '.$dados['FONE_APP'].' => '.$entidadeSite->get('FONE_APP').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'FONE APP => '.$entidadeSite->get('FONE_APP').'<br>';
			}
			if ($dados['EMAIL'] != $entidadeSite->get('EMAIL')) {
				$descricaoNotificacao .= '<b style="color: red">EMAIL: '.$dados['EMAIL'].' => '.$entidadeSite->get('EMAIL').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'EMAIL => '.$entidadeSite->get('EMAIL').'<br>';
			}
			if ($dados['sendusername'] != $entidadeSite->get('sendusername')) {
				$descricaoNotificacao .= '<b style="color: red">Sendusername: '.$dados['sendusername'].' => '.$entidadeSite->get('sendusername').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Sendusername => '.$entidadeSite->get('sendusername').'<br>';
			}
			if ($dados['sendpassword'] != $entidadeSite->get('sendpassword')) {
				$descricaoNotificacao .= '<b style="color: red">Sendpassword: '.$dados['sendpassword'].' => '.$entidadeSite->get('sendpassword').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Sendpassword => '.$entidadeSite->get('sendpassword').'<br>';
			}
			if ($dados['smtpserver'] != $entidadeSite->get('smtpserver')) {
				$descricaoNotificacao .= '<b style="color: red">Smtpserver: '.$dados['smtpserver'].' => '.$entidadeSite->get('smtpserver').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Smtpserver => '.$entidadeSite->get('smtpserver').'<br>';
			}
			if ($dados['smtpserverport'] != $entidadeSite->get('smtpserverport')) {
				$descricaoNotificacao .= '<b style="color: red">Smtpserverport: '.$dados['smtpserverport'].' => '.$entidadeSite->get('smtpserverport').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'Smtpserverport => '.$entidadeSite->get('smtpserverport').'<br>';
			}
			if ($dados['MailFrom'] != $entidadeSite->get('MailFrom')) {
				$descricaoNotificacao .= '<b style="color: red">MailFrom: '.$dados['MailFrom'].' => '.$entidadeSite->get('MailFrom').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'MailFrom => '.$entidadeSite->get('MailFrom').'<br>';
			}
			if ($dados['MailTo'] != $entidadeSite->get('MailTo')) {
				$descricaoNotificacao .= '<b style="color: red">MailTo: '.$dados['MailTo'].' => '.$entidadeSite->get('MailTo').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'MailTo => '.$entidadeSite->get('MailTo').'<br>';
			}
			if ($dados['MailCc'] != $entidadeSite->get('MailCc')) {
				$descricaoNotificacao .= '<b style="color: red">MailCc: '.$dados['MailCc'].' => '.$entidadeSite->get('MailCc').'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoNotificacao .= 'MailCc => '.$entidadeSite->get('MailCc').'<br>';
			}
			if ($dados['bool_ativo_site'] != $entidadeSite->get('bool_ativo_site')) {
				$descricaoBool = $entidadeSite->get('bool_ativo_site') == 1 ? "Sim" : "Não";
				$descricaoBool2 = $dados['bool_ativo_site'] == 1 ? "Sim" : "Não";
				$descricaoNotificacao .= '<b style="color: red">Ativo: '.$descricaoBool2.' => '.$descricaoBool.'</b><br>';
				$controleAteracao++;
			}
			else {
				$descricaoBool = $entidadeSite->get('bool_ativo_site') == 1 ? "Sim" : "Não";
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
				':NOME_EMPRESA'=>$entidadeSite->get('NOME_EMPRESA'), 
				':NOME_CIDADE'=>$entidadeSite->get('NOME_CIDADE'), 
				':ESTADO'=>$entidadeSite->get('ESTADO'), 
				':FONE'=>$entidadeSite->get('FONE'), 
				':FONE_APP'=>$entidadeSite->get('FONE_APP'), 
				':EMAIL'=>$entidadeSite->get('EMAIL'), 
				':sendusername'=>$entidadeSite->get('sendusername'), 
				':sendpassword'=>$entidadeSite->get('sendpassword'), 
				':smtpserver'=>$entidadeSite->get('smtpserver'), 
				':smtpserverport'=>$entidadeSite->get('smtpserverport'), 
				':MailFrom'=>$entidadeSite->get('MailFrom'), 
				':MailTo'=>$entidadeSite->get('MailTo'), 
				':MailCc'=>$entidadeSite->get('MailCc'), 
				':bool_ativo_site'=>$entidadeSite->get('bool_ativo_site')
			);

			$stmt = $this->pdo->prepare("UPDATE site SET NOME_EMPRESA = :NOME_EMPRESA, NOME_CIDADE = :NOME_CIDADE, ESTADO = :ESTADO, FONE = :FONE, FONE_APP = :FONE_APP, EMAIL = :EMAIL, sendusername = :sendusername, sendpassword = :sendpassword, smtpserver = :smtpserver, smtpserverport = :smtpserverport, MailFrom = :MailFrom, MailTo = :MailTo, MailCc = :MailCc, bool_ativo_site = :bool_ativo_site WHERE ID_SITE = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Site ".$ex->getMessage();
		}
	}
}
?>