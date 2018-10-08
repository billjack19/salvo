<?php

class Contato{

	private $ID_CONTATO;
	private $DT_CONTATO;
	private $NOME_CONTATO;
	private $EMAIL_CONTATO;
	private $TELEFONE_CONTATO;
	private $ASSUNTO_CONTATO;
	private $MENSAGEM_CONTATO;
	private $ARQUIVO_CONTATO;
	private $bool_ativo_contato;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>