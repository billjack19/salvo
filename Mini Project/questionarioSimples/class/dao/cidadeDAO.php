<?php 
require_once "../class/conexao.php";

class cidadeDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraCidade(Cidade $entidadeCidade){
		try{
			$param = array(
				':Nome'=>$entidadeCidade->get('Nome'),
				':CodigoIBGE'=>$entidadeCidade->get('CodigoIBGE'),
				':Estado'=>$entidadeCidade->get('Estado'),
				':DataAtualizacao'=>$entidadeCidade->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeCidade->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeCidade->get('UsuarioAtualizacao'),
				':NomeAbreviado'=>$entidadeCidade->get('NomeAbreviado')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO tabcidade ( Nome, CodigoIBGE, Estado, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao, NomeAbreviado ) VALUES ( :Nome, :CodigoIBGE, :Estado, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao, :NomeAbreviado );");

			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Cidade ".$ex->getMessage();

		}
	}
	function atualizaCidade(Cidade $entidadeCidade ,$id){
		try{
			$param = array(
				':Nome'=>$entidadeCidade->get('Nome'),
				':CodigoIBGE'=>$entidadeCidade->get('CodigoIBGE'),
				':Estado'=>$entidadeCidade->get('Estado'),
				':DataAtualizacao'=>$entidadeCidade->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeCidade->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeCidade->get('UsuarioAtualizacao'),
				':NomeAbreviado'=>$entidadeCidade->get('NomeAbreviado')
			);
			
			$stmt = $this->pdo->prepare("UPDATE tabcidade SET Nome = :Nome, CodigoIBGE = :CodigoIBGE, Estado = :Estado, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao, NomeAbreviado = :NomeAbreviado WHERE Cidade = ".$id.";");
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Cidade ".$ex->getMessage();
		}
	}
}
?>