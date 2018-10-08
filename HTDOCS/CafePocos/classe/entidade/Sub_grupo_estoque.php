<?php

class Sub_grupo_estoque{

	private $GRUPO;
	private $SUB_GRUPO;
	private $DESCRICAO;
	private $DataAtualizacao;
	private $HoraAtualizacao;
	private $UsuarioAtualizacao;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>