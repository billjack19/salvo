<?php
class Aluno{
	private $id_aluno;
	private $matricula_aluno;
	private $nome_aluno;
	private $email_aluno;
	private $cpf_aluno;
	private $rg_aluno;
	private $sexo_aluno;
	private $data_nascimento_aluno;
	private $telefone_aluno;
	private $turno_aluno;
	private $record_aluno;
	private $id_nivel_acesso_aluno;
	private $ano_aluno;
	private $turma_aluno;
	private $sala_aluno;


	//gets
	public function getId_aluno(){
		return $this->id_aluno;
	}
	public function getMatricula_aluno(){
		return $this->matricula_aluno;
	}
	public function getNome_aluno(){
		return $this->nome_aluno;
	}
	public function getEmail_aluno(){
		return $this->email_aluno;
	}
	public function getCpf_aluno(){
		return $this->cpf_aluno;
	}
	public function getRg_aluno(){
		return $this->rg_aluno;
	}
	public function getSexo_aluno(){
		return $this->sexo_aluno;
	}
	public function getData_nascimento_aluno(){
		return $this->data_nascimento_aluno;
	}
	public function getTurno_aluno(){
		return $this->turno_aluno;
	}
	public function getTelefone_aluno(){
		return $this->telefone_aluno;
	}
	public function getRecord_aluno(){
		return $this->record_aluno;
	}
	public function getId_nivel_acesso_aluno(){
		return $this->id_nivel_acesso_aluno;
	}
	public function getAno_aluno(){
		return $this->ano_aluno;
	}
	public function getTurma_aluno(){
		return $this->turma_aluno;
	}
	public function getSala_aluno(){
		return $this->sala_aluno;
	}
	



	//sets
	public function setId_aluno($id_aluno){
		$this->id_aluno = $id_aluno;
	}
	public function setMatricula_aluno($matricula_aluno){
		$this->matricula_aluno = $matricula_aluno;
	}
	public function setNome_aluno($nome_aluno){
		$this->nome_aluno = $nome_aluno;
	}
	public function setEmail_aluno($email_aluno){
		$this->email_aluno = $email_aluno;
	}
	public function setCpf_aluno($cpf_aluno){
		$this->cpf_aluno = $cpf_aluno;
	}
	public function setRg_aluno($rg_aluno){
		$this->rg_aluno = $rg_aluno;
	}
	public function setSexo_aluno($sexo_aluno){
		$this->sexo_aluno = $sexo_aluno;
	}
	public function setData_nascimento_aluno($data_nascimento_aluno){
		$this->data_nascimento_aluno = $data_nascimento_aluno;
	}
	public function setTurno_aluno($turno_aluno){
		$this->turno_aluno = $turno_aluno;
	}
	public function setTelefone_aluno($telefone_aluno){
		$this->telefone_aluno = $telefone_aluno;
	}
	public function setRecord_aluno($record_aluno){
		$this->record_aluno = $record_aluno;
	}
	public function setId_nivel_acesso_aluno($id_nivel_acesso_aluno){
		$this->id_nivel_acesso_aluno = $id_nivel_acesso_aluno;
	}
	public function setAno_aluno($ano_aluno){
		$this->ano_aluno = $ano_aluno;
	}
	public function setTurma_aluno($turma_aluno){
		$this->turma_aluno =  $turma_aluno;
	}
	public function setSala_aluno($sala_aluno){
		$this->sala_aluno = $sala_aluno;
	}

}
?>