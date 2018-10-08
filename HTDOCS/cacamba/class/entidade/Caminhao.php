<?php

class Caminhao{
	private $id_caminhao;
	private $descricao;
	private $longitude;
	private $latidude;
	private $motorista_id;
	private $status_caminhao;
	private $ultima_atualizacao;
	private $ativo_caminhao;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>