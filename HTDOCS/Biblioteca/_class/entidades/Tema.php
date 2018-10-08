<?php  
class Tema{
	private $id_tema;
	private $descricao_tema;

	public function getId_tema(){
		return $this->id_tema;
	}
	public function getDescricao_tema(){
		return $this->descricao_tema;
	}



	public function setId_tema($id_tema){
		$this->id_tema = $id_tema;
	}
	public function setDescricao_produto($descricao_tema){
		$this->descricao_tema = $descricao_tema;
	}
}
?>