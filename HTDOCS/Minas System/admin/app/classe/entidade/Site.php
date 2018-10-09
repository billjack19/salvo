<?php

class Site{

	private $ID_SITE;
	private $NOME_EMPRESA;
	private $NOME_CIDADE;
	private $ESTADO;
	private $FONE;
	private $FONE_APP;
	private $EMAIL;
	private $sendusername;
	private $sendpassword;
	private $smtpserver;
	private $smtpserverport;
	private $MailFrom;
	private $MailTo;
	private $MailCc;
	private $bool_ativo_site;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>