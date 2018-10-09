
<?php 
require_once "../classe/conexao.php";

class contatoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraContato(Contato $entidadeContato){
		try{
			$param = array(
				':NOME_EMPRESA_contato'=>$entidadeContato->get('NOME_EMPRESA_contato'), 
				':NOME_CIDADE_contato'=>$entidadeContato->get('NOME_CIDADE_contato'), 
				':ESTADO_contato'=>$entidadeContato->get('ESTADO_contato'), 
				':FONE_contato'=>$entidadeContato->get('FONE_contato'), 
				':FONE_APP_contato'=>$entidadeContato->get('FONE_APP_contato'), 
				':EMAIL_contato'=>$entidadeContato->get('EMAIL_contato'), 
				':sendusername_contato'=>$entidadeContato->get('sendusername_contato'), 
				':sendpassword_contato'=>$entidadeContato->get('sendpassword_contato'), 
				':smtpserver_contato'=>$entidadeContato->get('smtpserver_contato'), 
				':smtpserverport_contato'=>$entidadeContato->get('smtpserverport_contato'), 
				':MailFrom_contato'=>$entidadeContato->get('MailFrom_contato'), 
				':MailTo_contato'=>$entidadeContato->get('MailTo_contato'), 
				':MailCc_contato'=>$entidadeContato->get('MailCc_contato'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO contato (NOME_EMPRESA_contato, NOME_CIDADE_contato, ESTADO_contato, FONE_contato, FONE_APP_contato, EMAIL_contato, sendusername_contato, sendpassword_contato, smtpserver_contato, smtpserverport_contato, MailFrom_contato, MailTo_contato, MailCc_contato, bool_ativo_contato) VALUES (:NOME_EMPRESA_contato, :NOME_CIDADE_contato, :ESTADO_contato, :FONE_contato, :FONE_APP_contato, :EMAIL_contato, :sendusername_contato, :sendpassword_contato, :smtpserver_contato, :smtpserverport_contato, :MailFrom_contato, :MailTo_contato, :MailCc_contato, :bool_ativo_contato);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Contato ".$ex->getMessage();
		}
	}
	function atualizaContato(Contato $entidadeContato, $id){
		try{
			$param = array(
				':NOME_EMPRESA_contato'=>$entidadeContato->get('NOME_EMPRESA_contato'), 
				':NOME_CIDADE_contato'=>$entidadeContato->get('NOME_CIDADE_contato'), 
				':ESTADO_contato'=>$entidadeContato->get('ESTADO_contato'), 
				':FONE_contato'=>$entidadeContato->get('FONE_contato'), 
				':FONE_APP_contato'=>$entidadeContato->get('FONE_APP_contato'), 
				':EMAIL_contato'=>$entidadeContato->get('EMAIL_contato'), 
				':sendusername_contato'=>$entidadeContato->get('sendusername_contato'), 
				':sendpassword_contato'=>$entidadeContato->get('sendpassword_contato'), 
				':smtpserver_contato'=>$entidadeContato->get('smtpserver_contato'), 
				':smtpserverport_contato'=>$entidadeContato->get('smtpserverport_contato'), 
				':MailFrom_contato'=>$entidadeContato->get('MailFrom_contato'), 
				':MailTo_contato'=>$entidadeContato->get('MailTo_contato'), 
				':MailCc_contato'=>$entidadeContato->get('MailCc_contato'), 
				':bool_ativo_contato'=>$entidadeContato->get('bool_ativo_contato')
			);

			$stmt = $this->pdo->prepare("UPDATE contato SET NOME_EMPRESA_contato = :NOME_EMPRESA_contato, NOME_CIDADE_contato = :NOME_CIDADE_contato, ESTADO_contato = :ESTADO_contato, FONE_contato = :FONE_contato, FONE_APP_contato = :FONE_APP_contato, EMAIL_contato = :EMAIL_contato, sendusername_contato = :sendusername_contato, sendpassword_contato = :sendpassword_contato, smtpserver_contato = :smtpserver_contato, smtpserverport_contato = :smtpserverport_contato, MailFrom_contato = :MailFrom_contato, MailTo_contato = :MailTo_contato, MailCc_contato = :MailCc_contato, bool_ativo_contato = :bool_ativo_contato WHERE id_contato = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Contato ".$ex->getMessage();
		}
	}
}
?>