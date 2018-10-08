<?php

class Saiba_mais{

	private $id_saiba_mais;
	private $descricao_saiba_mais;
	private $usuario_id;
	private $data_atualizacao_saiba_mais;
	private $bool_ativo_saiba_mais;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>