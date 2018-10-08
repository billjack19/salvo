<?php

class Adicional_site{

	private $id_adicional_site;
	private $titulo_adicional_site;
	private $descricao_adicional_site;
	private $imagem_adicional_site;
	private $saiba_mais_id;
	private $usuario_id;
	private $data_atualizacao_adicional_site;
	private $bool_ativo_adicional_site;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>