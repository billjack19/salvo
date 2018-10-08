<?php

class Relatorios{

	private $id_relatorios;
	private $tabela_relatorios;
	private $colunas_relatorios;
	private $data_atualizacao_relatorios;
	private $usuario_id;
	private $bool_ativo_relatorios;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>