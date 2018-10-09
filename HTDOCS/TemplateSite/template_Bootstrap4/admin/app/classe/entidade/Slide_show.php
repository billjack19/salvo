<?php

class Slide_show{

	private $id_slide_show;
	private $titulo_slide_show;
	private $descricao_slide_show;
	private $imagem_slide_show;
	private $data_atualizacao_slide_show;
	private $bool_ativo_slide_show;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>