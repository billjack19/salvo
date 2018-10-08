<?php

class Posicao_cafe{

	private $id_posicao_cafe;
	private $cliente;
	private $fazenda;
	private $cidade;
	private $insc_est;
	private $safra;
	private $lote;
	private $lote_cliente;
	private $entrada;
	private $nfe_fiscal;
	private $padrao;
	private $preparo;
	private $kilos;
	private $sacas;
	private $per_umi;
	private $per_imp;
	private $per_cat;
	private $per_def;
	private $cert;
	private $data_atualizacao;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>