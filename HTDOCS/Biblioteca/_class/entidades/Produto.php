<?php  
class Produto{
	private $id_produto;
	private $descricao_produto;
	private $status_produto;

	public function getId_produto(){
		return $this->id_produto;
	}
	public function getDescricao_produto(){
		return $this->descricao_produto;
	}
	public function getStatus_produto(){
		return $this->status_produto;
	}
	



	public function setId_produto($id_produto){
		$this->id_produto = $id_produto;
	}
	public function setDescricao_produto($descricao_produto){
		$this->descricao_produto = $descricao_produto;
	}
	public function setStatus_produto($status_produto){
		$this->status_produto = $status_produto;
	}
}
?>