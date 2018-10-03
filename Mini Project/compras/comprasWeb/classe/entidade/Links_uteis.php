<?php

class Links_uteis{

	private $id_links_uteis;
	private $descricao_links_uteis;
	private $link_links_uteis;
	private $data_atualizacao_links_uteis;
	private $usuario_id;
	private $bool_ativo_links_uteis;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>