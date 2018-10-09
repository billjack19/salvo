<?php

class Endereco_site{

	private $id_endereco_site;
	private $descricao_endereco_site;
	private $endereco_endereco_site;
	private $numero_endereco_site;
	private $complemento_endereco_site;
	private $bairro_endereco_site;
	private $cidade_endereco_site;
	private $estado_id;
	private $cep_endereco_site;
	private $telefone_endereco_site;
	private $celular_endereco_site;
	private $email_endereco_site;
	private $horario_funcionamento_endereco_site;
	private $latitude_endereco_site;
	private $longitude_endereco_site;
	private $configurar_site_id;
	private $data_atualizacao_endereco_site;
	private $bool_ativo_endereco_site;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}

?>