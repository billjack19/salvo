<?php

class Quem_somos{

	private $id_quem_somos;
	private $titulo_quem_somos;
	private $descricao_quem_somos;
	private $data_atualizacao_quem_somos;
	private $bool_ativo_quem_somos;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>