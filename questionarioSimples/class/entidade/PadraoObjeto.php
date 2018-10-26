<?php

class PadraoObjeto {
	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}

	public function push($valor, $nome_campo){
		if(gettype($this->$nome_campo) == "array") array_push($this->$nome_campo, $valor);
	}
}

?>