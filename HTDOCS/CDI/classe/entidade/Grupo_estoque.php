<?php

class Grupo_estoque{

	private $GRUPO;
	private $DESCRICAO;
	private $DataAtualizacao;
	private $HoraAtualizacao;
	private $UsuarioAtualizacao;
	private $Conta_Contabil;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>