<?php

class Videos{

	private $id_videos;
	private $descricao_videos;
	private $link_videos;
	private $data_atualizacao_videos;
	private $bool_ativo_videos;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>