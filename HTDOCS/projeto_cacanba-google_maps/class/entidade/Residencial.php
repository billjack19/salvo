<?php

class Residencial{
	private $id_residencial;
	private $endereco_residencial;
	private $numero_residencial;
	private $bairro_residencial;
	private $cidade_residencial;
	private $uf_residencial;
	private $cep_residencial;
	private $titulo_residencial;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}
?>