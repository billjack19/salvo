<?php

class Upload_arq{

	private $id_upload_arq;
	private $descricao_upload_arq;
	private $tipo_upload_arq;
	private $data_atualizacaoupload_arq;
	private $bool_ativo_upload_arq;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>