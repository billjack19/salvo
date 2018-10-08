<?php
	class Emprestimo_livro{
		private $id_emprestimo_livro;
		private $id_livro;
		private $id_aluno;
		private $id_cadastro;
		private $data_inicial_emprestimo_livro;
		private $data_final_empretimo_livro;

		public function getId_emprestimo_livro(){
			return $this->id_emprestimo_livro;
		}
		public function getId_livro(){
			return $this->id_livro;
		}
		public function getId_aluno(){
			return $this->id_aluno;
		}
		public function getId_cadastro(){
			return $this->id_cadastro;
		}
		public function getData_inicial_emprestimo_livro(){
			return $this->data_inicial_emprestimo_livro;
		}
		public function getData_final_empretimo_livro(){
			return $this->data_final_empretimo_livro;
		}
		public function setId_emprestimo_livro($id_emprestimo_livro){
			$this->id_emprestimo_livro = $id_emprestimo_livro;
		}
		public function setId_livro($id_livro){
			$this->id_livro = $id_livro;
		}
		public function setId_aluno($id_aluno){
			$this->id_aluno = $id_aluno;
		}
		public function setId_cadastro($id_cadastro){
			$this->id_cadastro = $id_cadastro;
		}
		public function setData_inicial_emprestimo_livro($data_inicial_emprestimo_livro){
			$this->data_inicial_emprestimo_livro = $data_inicial_emprestimo_livro;
		}
		public function setData_final_empretimo_livro($data_final_empretimo_livro){
			$this->data_final_empretimo_livro = $data_final_empretimo_livro;
		}
	}

?>