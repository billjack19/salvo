<?php

class Topicos_loja{

	private $id_topicos_loja;
	private $titulo_topicos_loja;
	private $descricao_topicos_loja;
	private $loja_id;
	private $data_atualizacao_topicos_loja;
	private $bool_ativo_topicos_loja;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>