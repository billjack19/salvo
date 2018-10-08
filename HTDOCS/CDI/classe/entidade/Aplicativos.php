<?php



Class Aplicativos{
	var $id_web_aplicativos_cliente;
	var $cliefornec_id;
	var $id_web_aplicativo;
	var $descricao_web_aplicativo;
	var $local_web_aplicativo;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}











?>