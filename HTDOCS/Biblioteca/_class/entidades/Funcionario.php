<?php
class Funcionario{
	private $id_funcionario;
	private $nome_funcionario;
	private $cpf_funcionario;
	private $rg_funcionario;
	private $sexo_funcionario;
	private $data_nascimento_funcionario;
	private $telefone_funcionario;
	private $email_funcionario;
	private $cep_funcionario;
	private $endereco_funcionario;
	private $numero_end_funcionario;
	private $complemento_end_funcionario;
	private $bairro_end_funcionario;
	private $estado_end_funcionario;
	private $cidade_end_funcionario;	
	private $turno_funcionario;
	private $cargo_funcionario;
	private $id_nivel_de_acesso;
	private $masp_funcionario;

	public function getId_funcionario(){
		return $this->id_funcionario;
	}
	public function getNome_funcionario(){
		return $this->nome_funcionario;
	}
	public function getCpf_funcionario(){
		return $this->cpf_funcionario;
	}
	public function getRg_funcionario(){
		return $this->rg_funcionario;
	}
	public function getSexo_funcionario(){
		return $this->sexo_funcionario;
	}
	public function getData_nascimento_funcionario(){
		return $this->data_nascimento_funcionario;
	}
	public function getTelefone_funcionario(){
		return $this->telefone_funcionario;
	}
	public function getEmail_funcionario(){
		return $this->email_funcionario;
	}
	
	public function getCep_funcionario(){
		return $this->cep_funcionario;
	}
	public function getEndereco_funcionario(){
		return $this->endereco_funcionario;
	}
	public function getNumero_end_funcionario(){
		return $this->numero_end_funcionario;
	}
	public function getComplemento_end_funcionario(){
		return $this->complemento_end_funcionario;
	}
	public function getBairro_end_funcionario(){
		return $this->bairro_end_funcionario;
	}
	public function getCidade_end_funcionario(){
		return $this->cidade_end_funcionario;
	}
	public function getEstado_end_funcionario(){
		return $this->estado_end_funcionario;
	}
	public function getTurno_funcionario(){
		return $this->turno_funcionario;
	}
	public function getCargo_funcionario(){
		return $this->cargo_funcionario;
	}
	public function getId_nivel_de_acesso(){
		return $this->id_nivel_de_acesso;
	}
	public function getMasp_funcionario(){
		return $this->masp_funcionario;
	}
	


	public function setId_funcionario($id_funcionario){
		$this->id_funcionario = $id_funcionario;
	}	
	public function setNome_funcionario($nome_funcionario){
		$this->nome_funcionario = $nome_funcionario;
	}
	public function setCpf_funcionario($cpf_funcionario){
		$this->cpf_funcionario = $cpf_funcionario;
	}
	public function setRg_funcionario($rg_funcionario){
		$this->rg_funcionario = $rg_funcionario;
	}
	public function setSexo_funcionario($sexo_funcionario){
		$this->sexo_funcionario = $sexo_funcionario;
	}
	public function setData_nascimento_funcionario($data_nascimento_funcionario){
		$this->data_nascimento_funcionario = $data_nascimento_funcionario;
	}	
	public function setTelefone_funcionario($telefone_funcionario){
		$this->telefone_funcionario = $telefone_funcionario;
	}
	public function setEmail_funcionario($email_funcionario){
		$this->email_funcionario = $email_funcionario;
	}
	
	public function setCep_funcionario($cep_funcionario){
		$this->cep_funcionario = $cep_funcionario;
	}
	public function setEndereco_funcionario($endereco_funcionario){
		$this->endereco_funcionario = $endereco_funcionario;
	}
	public function setNumero_end_funcionario($numero_end_funcionario){
		$this->numero_end_funcionario = $numero_end_funcionario;
	}
	public function setComplemento_end_funcionario($complemento_end_funcionario){
		$this->complemento_end_funcionario = $complemento_end_funcionario;
	}
	public function setBairro_end_funcionario($bairro_end_funcionario){
		$this->bairro_end_funcionario = $bairro_end_funcionario;
	}
	public function setCidade_end_funcionario($cidade_end_funcionario){
		$this->cidade_end_funcionario = $cidade_end_funcionario;
	}
	public function setEstado_end_funcionario($estado_end_funcionario){
		$this->estado_end_funcionario = $estado_end_funcionario;
	}
	public function setTurno_funcionario($turno_funcionario){
		$this->turno_funcionario = $turno_funcionario;
	}
	public function setCargo_funcionario($cargo_funcionario){
		$this->cargo_funcionario = $cargo_funcionario;
	}
	public function setId_nivel_de_acesso($id_nivel_de_acesso){
		$this->id_nivel_de_acesso = $id_nivel_de_acesso;
	}
	public function setMasp_funcionario($masp_funcionario){
		$this->masp_funcionario = $masp_funcionario;
	}
}
?>