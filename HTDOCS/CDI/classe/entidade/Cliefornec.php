<?php

class Cliefornec{

	var $CODIGO;
	var $CPF_CGC;
	var $RAZAOSOCIAL;
	var $WEB_SENHA_CNPJ;
	var $WEB_BANCO_DADOS;
	var $WEB_USUARIO_BD;
	var $WEB_SENHA_BD;
	var $WEB_NOME_REDUZIDO;
	var $WEB_NOME_BD;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>