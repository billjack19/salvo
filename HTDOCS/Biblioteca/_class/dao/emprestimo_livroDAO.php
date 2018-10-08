<?php 
require_once "../../_class/Conexao2.php";
class emprestimoLivroDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function fazerEmprestimo_livro(Emprestimo_livro $entidadeEmprestimo_livro){
		try{
			$param = array( 
				":id_livro"=>$entidadeEmprestimo_livro->getId_livro(),
				":id_aluno"=>$entidadeEmprestimo_livro->getId_aluno(),
				":id_cadastro"=>$entidadeEmprestimo_livro->getId_cadastro(),
				":data_inicial_emprestimo_livro"=>$entidadeEmprestimo_livro->getData_inicial_emprestimo_livro(),
				":data_final_empretimo_livro"=>$entidadeEmprestimo_livro->getData_final_empretimo_livro()
			);

			$stmt = $this->pdo->prepare("
				INSERT INTO emprestimo_livro 
				VALUES( 'null' , :id_livro , :id_aluno , :id_cadastro ,  :data_inicial_emprestimo_livro , :data_final_empretimo_livro , 1);
				UPDATE aluno 
				SET NUMERO_LIVROS = NUMERO_LIVROS + 1 , FREQUENCIA_LIVRO = FREQUENCIA_LIVRO + 1 
				WHERE ID_ALUNO = :id_aluno;
				UPDATE livro 
				SET STATUS_LIVRO = 2 , FREQUENCIA_LIVRO = FREQUENCIA_LIVRO + 1 
				WHERE ID_LIVRO = :id_livro;");
						
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao fazer emprestimo".$ex->getMessage();
		}
	}
	function fazerEmprestimo_livro2(Emprestimo_livro $entidadeEmprestimo_livro){
		try{
			$param = array( 
				":id_livro"=>$entidadeEmprestimo_livro->getId_livro(),
				":id_aluno"=>$entidadeEmprestimo_livro->getId_aluno(),
				":id_cadastro"=>$entidadeEmprestimo_livro->getId_cadastro(),
				":data_inicial_emprestimo_livro"=>$entidadeEmprestimo_livro->getData_inicial_emprestimo_livro(),
				":data_final_empretimo_livro"=>$entidadeEmprestimo_livro->getData_final_empretimo_livro()
			);

			$stmt = $this->pdo->prepare("
				INSERT INTO emprestimo_livro2 
				VALUES( 'null' , :id_livro , :id_aluno , :id_cadastro ,  :data_inicial_emprestimo_livro , :data_final_empretimo_livro , 1);
				UPDATE funcionario 
				SET NUMERO_LIVROS = NUMERO_LIVROS + 1 , FREQUENCIA_LIVRO = FREQUENCIA_LIVRO + 1 
				WHERE ID_FUNCIONARIO = :id_aluno;
				UPDATE livro 
				SET STATUS_LIVRO = 2 , FREQUENCIA_LIVRO = FREQUENCIA_LIVRO + 1
				WHERE ID_LIVRO = :id_livro;");
						
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao fazer emprestimo".$ex->getMessage();
		}
	}
	function fazerDevolucao_livro($idEmprestimo){
		try{
			$hoje = date('Y-m-d');
			$stmt = $this->pdo->prepare("
				UPDATE emprestimo_livro SET STATUS_EMPRESTIMO = 2 , DATA_FINAL_EMPRESTIMO_LIVRO = '$hoje' WHERE ID_EMPRESTIMO_LIVRO = $idEmprestimo;
				UPDATE aluno SET NUMERO_LIVROS = NUMERO_LIVROS - 1 WHERE ID_ALUNO = (SELECT ID_ALUNO FROM emprestimo_livro WHERE ID_EMPRESTIMO_LIVRO = $idEmprestimo);
				UPDATE livro SET STATUS_LIVRO = 1 WHERE ID_LIVRO = (SELECT ID_LIVRO FROM emprestimo_livro WHERE ID_EMPRESTIMO_LIVRO = $idEmprestimo);");
						
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao fazer emprestimo".$ex->getMessage();
		}
	}
}
?>