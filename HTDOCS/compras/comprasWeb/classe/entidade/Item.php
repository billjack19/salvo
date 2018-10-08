<?php

class Item{
	var $id_item;
	var $descricao_item;
	var $codigo_item;
	var $marca_id;
	var $quantidade_item;
	var $unidade_medida_id;
	var $grupo_id;
	var $data_atualizacao_item;
	var $usuario_id;
	var $bool_ativo_item;

	/* Campos estrangeiros */
	var $sigla_unidade_medida;
	var $descricao_unidade_medida;
	var $descricao_marca;

	var $debug = "OK";

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>