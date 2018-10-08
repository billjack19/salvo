
<?php 
require_once "../classe/conexao.php";

class regitrosDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraRegitros(Regitros $entidadeRegitros){
		try{
			$param = array(
				':ServerName'=>$entidadeRegitros->get('ServerName'), 
				':ServiceName'=>$entidadeRegitros->get('ServiceName'), 
				':Key_SQL_servive'=>$entidadeRegitros->get('Key_SQL_servive'), 
				':Port_Number'=>$entidadeRegitros->get('Port_Number'), 
				':user_regitros'=>$entidadeRegitros->get('user_regitros'), 
				':senha_regitros'=>$entidadeRegitros->get('senha_regitros')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO regitros (ServerName, ServiceName, Key_SQL_servive, Port_Number, user_regitros, senha_regitros) VALUES (:ServerName, :ServiceName, :Key_SQL_servive, :Port_Number, :user_regitros, :senha_regitros);"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Regitros ".$ex->getMessage();
		}
	}
	function atualizaRegitros(Regitros $entidadeRegitros, $id){
		try{
			$param = array(
				':ServerName'=>$entidadeRegitros->get('ServerName'), 
				':ServiceName'=>$entidadeRegitros->get('ServiceName'), 
				':Key_SQL_servive'=>$entidadeRegitros->get('Key_SQL_servive'), 
				':Port_Number'=>$entidadeRegitros->get('Port_Number'), 
				':user_regitros'=>$entidadeRegitros->get('user_regitros'), 
				':senha_regitros'=>$entidadeRegitros->get('senha_regitros')
			);

			$stmt = $this->pdo->prepare("UPDATE regitros SET ServerName = :ServerName, ServiceName = :ServiceName, Key_SQL_servive = :Key_SQL_servive, Port_Number = :Port_Number, user_regitros = :user_regitros, senha_regitros = :senha_regitros WHERE Id_SQL = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Regitros ".$ex->getMessage();
		}
	}
}
?>