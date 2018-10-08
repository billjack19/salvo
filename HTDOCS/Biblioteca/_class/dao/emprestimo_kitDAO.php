<?php 
require_once "../_class/Conexao2.php";
class emprestimo_kitDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraEmprestimo_kit(Emprestimo_kit $entidadeEmprestimo_kit){
		try{
			$param = array( 
				':id_kit'=>$entidadeEmprestimo_kit->getId_kit(),
				':id_funcionario'=>$entidadeEmprestimo_kit->getId_funcionario(),
				':data_emprestimo_kit'=>$entidadeEmprestimo_kit->getData_emprestimo_kit(),
				':codigo_aula_emprestimo_kit'=>$entidadeEmprestimo_kit->getCodigo_aula_emprestimo_kit()
			);
			$stmt = $this->pdo->prepare("INSERT INTO emprestimo_kit VALUES ('null' , :id_kit , :id_funcionario , :data_emprestimo_kit , :codigo_aula_emprestimo_kit , 1 )");
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
}
?>