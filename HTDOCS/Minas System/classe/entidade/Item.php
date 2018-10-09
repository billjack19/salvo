<?php

class Item{

	private $id_item;
	private $descricao_item;
	private $unidade_medida_item;
	private $peso_unitario_item;
	private $estoque_item;
	private $sub_grupo_id;
	private $usuario_id;
	private $bool_ativo_item;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>