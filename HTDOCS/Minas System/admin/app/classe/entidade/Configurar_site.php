<?php

class Configurar_site{

	private $id_configurar_site;
	private $titulo_configurar_site;
	private $titulo_menu_configurar_site;
	private $cor_pagina_configurar_site;
	private $contra_cor_pagina_configurar_site;
	private $imagem_icone_configurar_site;
	private $imagem_logo_configurar_site;
	private $data_atualizacao_configurar_site;
	private $bool_ativo_configurar_site;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>