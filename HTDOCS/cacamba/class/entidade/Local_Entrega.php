<?php

/* Local_Entrega .php */

class Local_Entrega{
	private $id_local_entrega;
	private $endereco;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $uf;
	private $cep;
	private $cliente_id;
	private $latitude;
	private $longitude;
	private $bool_ativo;
	

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}
?>