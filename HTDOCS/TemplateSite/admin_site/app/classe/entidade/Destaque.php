<?php

class Destaque{

	private $id_destaque;
	private $descricao_destaque;
	private $grupo_id;
	private $imagem_destaque;
	private $data_atualizacao_destaque;
	private $bool_ativo_destaque;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>