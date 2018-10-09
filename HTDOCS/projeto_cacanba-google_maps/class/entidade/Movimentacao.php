<?php

/* Movimentacao .php */

class Movimentacao{
	private $id_movimentacao_cacamba;
	private $cacamba_id;
	private $local_entrega_id;
	private $situacao;
	private $titulo;
	private $valor_total;
	private $emissao;
	private $entrega;
	private $retirada;
	private $periodo;
	private $confirma_carreto;
	private $observacao;
	private $flag_entrega;
	private $flag_recolhe;
	private $flag_pagto;
	private $cnpj_user;
	

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}
?>