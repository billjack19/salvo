<?php

class Contato{

	private $id_contato;
	private $NOME_EMPRESA_contato;
	private $NOME_CIDADE_contato;
	private $ESTADO_contato;
	private $FONE_contato;
	private $FONE_APP_contato;
	private $EMAIL_contato;
	private $sendusername_contato;
	private $sendpassword_contato;
	private $smtpserver_contato;
	private $smtpserverport_contato;
	private $MailFrom_contato;
	private $MailTo_contato;
	private $MailCc_contato;
	private $data_atualizacao_contato;
	private $bool_ativo_contato;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>