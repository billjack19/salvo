<?php

class Relatorio_tabela{

	private $id_relatorio_tabela;
	private $descricao_relatorio_tabela;
	private $data_atualizacao_relatorio_tabela;
	private $bool_ativo_relatorio_tabela;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>