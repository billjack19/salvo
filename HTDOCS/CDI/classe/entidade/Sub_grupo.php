<?php

class Sub_grupo{

	private $id_sub_grupo;
	private $descricao_sub_grupo;
	private $grupo_id;
	private $data_atualizacao_sub_grupo;
	private $usuario_id;
	private $imagem_sub_grupo;
	private $bool_ativo_sub_grupo;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>