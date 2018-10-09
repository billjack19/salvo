<?php


class Cacamba{
	private $id_cacamba;
	private $descricao_cacamba;
	private $cnpj_user;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

/*class Cacamba{
	private $id_cacamba;
	private $latidude;
	private $logitude;
	private $situacao;
	private $titulo;
	private $tipo;
	private $id_consumidor;
	private $confirma_carreto;
	private $flag_entrega;
	private $flag_recolhe;
	private $flag_pagto;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}*/

?>