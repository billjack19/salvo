<?php 
/* Empresa .php */

class Empresa{
	private $CNPJ;
	private $razao_social;
	private $nome_fantasia;
	private $endereco;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $uf;
	private $cep;
	private $telefone;
	private $email;
	private $imagem;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}


?>