<?php 
require_once "../_class/Conexao2.php";
class funcionarioDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	
	function cadastraFuncionario(Funcionario $entidadeFuncionario){
		try{
			$param = array( 
				':nome_funcionario'=>$entidadeFuncionario->getNome_funcionario(),
				':cpf_funcionario'=>$entidadeFuncionario->getCpf_funcionario(),
				':rg_funcionario'=>$entidadeFuncionario->getRg_funcionario(),
				':sexo_funcionario'=>$entidadeFuncionario->getSexo_funcionario(),
				':data_nascimento_funcionario'=>$entidadeFuncionario->getData_nascimento_funcionario(),
				':telefone_funcionario'=>$entidadeFuncionario->getTelefone_funcionario(),
				':cep_funcionario'=>$entidadeFuncionario->getCep_funcionario(),
				':endereco_funcionario'=>$entidadeFuncionario->getEndereco_funcionario(),
				':numero_end_funcionario'=>$entidadeFuncionario->getNumero_end_funcionario(),
				':complemento_end_funcionario'=>$entidadeFuncionario->getComplemento_end_funcionario(),
				':bairro_end_funcionario'=>$entidadeFuncionario->getBairro_end_funcionario(),
				':estado_end_funcionario'=>$entidadeFuncionario->getEstado_end_funcionario(),
				':cidade_end_funcionario'=>$entidadeFuncionario->getCidade_end_funcionario(),
				':turno_funcionario'=>$entidadeFuncionario->getTurno_funcionario(),
				':cargo_funcionario'=>$entidadeFuncionario->getCargo_funcionario(),
				':id_nivel_de_acesso'=>$entidadeFuncionario->getId_nivel_de_acesso(),
				':email_funcionario'=>$entidadeFuncionario->getEmail_funcionario(),
				':masp_funcionario'=>$entidadeFuncionario->getMasp_funcionario()
			);

			$stmt = $this->pdo->prepare("INSERT INTO funcionario VALUES( 'null' , :nome_funcionario , :cpf_funcionario , :rg_funcionario ,  :sexo_funcionario , :data_nascimento_funcionario , :telefone_funcionario , :email_funcionario , :cep_funcionario , :endereco_funcionario , :numero_end_funcionario , :complemento_end_funcionario , :bairro_end_funcionario , :estado_end_funcionario , :cidade_end_funcionario, :turno_funcionario , :cargo_funcionario , :id_nivel_de_acesso , :masp_funcionario , 0 , 0 )");			
			
			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Aluno".$ex->getMessage();
		}
	}
	function pegaIdProfessor($aluno){
		$sql = "SELECT * FROM funcionario where ID_FUNCIONARIO = ".$aluno.";";
		$stmt = $this->pdo->query($sql);
		return $stmt;
	}
}
?>