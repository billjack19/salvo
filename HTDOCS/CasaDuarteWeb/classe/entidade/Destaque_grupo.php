<?php

class Destaque_grupo{

	private $id_destaque_grupo;
	private $titulo_destaque_grupo;
	private $grupo_id;
	private $imagem_destaque_grupo;
	private $descricao_destaque_grupo;
	private $configurar_site_id;
	private $data_atualizacao_destaque_grupo;
	private $bool_ativo_destaque_grupo;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>