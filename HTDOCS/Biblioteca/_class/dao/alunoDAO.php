<?php 
require_once "../_class/Conexao2.php";
class alunoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraAluno(Aluno $entidadeAluno){
		try{
			$param = array(
				':matricula_aluno'=>$entidadeAluno->getMatricula_aluno(),
				':nome_aluno'=>$entidadeAluno->getNome_aluno(),
				':email_aluno'=>$entidadeAluno->getEmail_aluno(),
				':cpf_aluno'=>$entidadeAluno->getCpf_aluno(),
				':rg_aluno'=>$entidadeAluno->getRg_aluno(),
				':sexo_aluno'=>$entidadeAluno->getSexo_aluno(),
				':data_nascimento_aluno'=>$entidadeAluno->getData_nascimento_aluno(),
				':turno_aluno'=>$entidadeAluno->getTurno_aluno(),
				':telefone_aluno'=>$entidadeAluno->getTelefone_aluno(),
				':record_aluno'=>$entidadeAluno->getRecord_aluno(),
				':id_nivel_acesso'=>$entidadeAluno->getId_nivel_acesso_aluno(),
				':ano_aluno'=>$entidadeAluno->getAno_aluno(),
				':turma_aluno'=>$entidadeAluno->getTurma_aluno(),
				':sala_aluno'=>$entidadeAluno->getSala_aluno()
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO aluno VALUES( 'null' , :matricula_aluno , :nome_aluno , :email_aluno ,  :cpf_aluno , :rg_aluno , :sexo_aluno , :data_nascimento_aluno , :turno_aluno , :telefone_aluno , :record_aluno , :id_nivel_acesso , :ano_aluno , :turma_aluno , :sala_aluno , 0 , 0)");

			
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno ".$ex->getMessage();

		}
	}


	function pegaAluno(){
		$sql = "SELECT * FROM aluno ORDER BY NOME_ALUNO";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}

	function pesquisaAluno(Aluno $entidadeAluno){
		try{
			$where = "";
			if (!empty($entidadeAluno->getId_aluno())) {
				if (!empty($where)) {
						$where.="WHERE ID_ALUNO=".$entidadeAluno->getId_aluno();
				}
				else $where.="AND ID_ALUNO=".$entidadeAluno->getId_aluno();
			}
			if (!empty($entidadeAluno->getMatricula_aluno())) {
				if (!empty($where)) {
						$where.="WHERE MATRICULA_ALUNO LIKE '%".$entidadeAluno->getMatricula_aluno()."%'";
				}
				else $where.="AND MATRICULA_ALUNO LIKE '%".$entidadeAluno->getMatricula_aluno()."%'";
			}
			if (!empty($entidadeAluno->getNome_aluno())) {
				if (!empty($where)) {
						$where.="WHERE NOME_ALUNO LIKE '%".$entidadeAluno->getNome_aluno()."%'";
				}
				else $where.="AND NOME_ALUNO LIKE '%".$entidadeAluno->getNome_aluno()."%'";
			}
			if (!empty($entidadeAluno->getEmail_aluno())) {
				if (!empty($where)) {
						$where.="WHERE EMAIL_ALUNO LIKE '%".$entidadeAluno->getEmail_aluno()."%'";
				}
				else $where.="AND EMAIL_ALUNO LIKE '%".$entidadeAluno->getEmail_aluno()."%'";
			}

			$sql = "SELECT * FROM aluno ".$where." ORDER BY ID_LIVRO";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$retorno = '';

			if (!$stmt->rowCount()) {
				$retorno = $stmt->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP);

				return $retorno;
			}
		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
	function pegaIdAluno($aluno){
		$sql = "SELECT * FROM aluno where ID_ALUNO = ".$aluno.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>