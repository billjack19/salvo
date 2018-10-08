<?php
class Emprestimo_kit{
	private $id_emprestimo_kit;
	private $id_kit;
	private $id_funcionario;
	private $data_emprestimo_kit;
	private $codigo_aula_emprestimo_kit;

	public function getId_emprestimo_kit(){
		return $this->id_emprestimo_kit;
	}
	public function getId_kit(){
		return $this->id_kit;
	}
	public function getId_funcionario(){
		return $this->id_funcionario;
	}
	public function getData_emprestimo_kit(){
		return $this->data_emprestimo_kit;
	}
	public function getCodigo_aula_emprestimo_kit(){
		return $this->codigo_aula_emprestimo_kit;
	}

	public function setId_emprestimo_kit($id_emprestimo_kit){
		$this->id_emprestimo_kit = $id_emprestimo_kit;
	}
	public function setId_kit($id_kit){
		$this->id_kit = $id_kit;
	}
	public function setId_funcionario($id_funcionario){
		$this->id_funcionario = $id_funcionario;
	}
	public function setData_emprestimo_kit($data_emprestimo_kit){
		$this->data_emprestimo_kit = $data_emprestimo_kit;
	}
	public function setCodigo_aula_emprestimo_kit($codigo_aula_emprestimo_kit){
		$this->codigo_aula_emprestimo_kit = $codigo_aula_emprestimo_kit;
	}

}
?>