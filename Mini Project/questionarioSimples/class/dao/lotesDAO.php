<?php 
require_once "../class/conexao.php";

class lotesDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraLotes(Lotes $entidadeLotes){
		try{
			$param = array(
				':Loteamento'=>$entidadeLotes->get('Loteamento'),
				':NumLote'=>$entidadeLotes->get('NumLote'),
				':Matricula'=>$entidadeLotes->get('Matricula'),
				':Quadra'=>$entidadeLotes->get('Quadra'),
				':AreaTotal'=>$entidadeLotes->get('AreaTotal'),
				':Frente'=>$entidadeLotes->get('Frente'),
				':Esquina'=>$entidadeLotes->get('Esquina'),
				':Data'=>$entidadeLotes->get('Data'),
				':Valor'=>$entidadeLotes->get('Valor'),
				':Observacao'=>$entidadeLotes->get('Observacao'),
				':Status'=>$entidadeLotes->get('Status'),
				':DataAtualizacao'=>$entidadeLotes->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeLotes->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeLotes->get('UsuarioAtualizacao'),
				':Xpoint'=>$entidadeLotes->get('Xpoint'),
				':Ypoint'=>$entidadeLotes->get('Ypoint'),
				':DataEscritura'=>$entidadeLotes->get('DataEscritura'),
				':DataContabil'=>$entidadeLotes->get('DataContabil'),
				':AssinadaPor'=>$entidadeLotes->get('AssinadaPor'),
				':Cartorio'=>$entidadeLotes->get('Cartorio'),
				':Livro'=>$entidadeLotes->get('Livro'),
				':Folha'=>$entidadeLotes->get('Folha'),
				':ValorEscritura'=>$entidadeLotes->get('ValorEscritura'),
				':DataContrato'=>$entidadeLotes->get('DataContrato'),
				':ValorContrato'=>$entidadeLotes->get('ValorContrato'),
				':AnoDIMOB'=>$entidadeLotes->get('AnoDIMOB'),
				':ValorDIMOB'=>$entidadeLotes->get('ValorDIMOB'),
				':LadoDireito'=>$entidadeLotes->get('LadoDireito'),
				':LadoEsquerdo'=>$entidadeLotes->get('LadoEsquerdo'),
				':Fundo'=>$entidadeLotes->get('Fundo'),
				':Confrontamentos'=>$entidadeLotes->get('Confrontamentos')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO tabloteamentos_lotes ( Loteamento, NumLote, Matricula, Quadra, AreaTotal, Frente, Esquina, Data, Valor, Observacao, Status, DataAtualizacao, HoraAtualizacao, UsuarioAtualizacao, Xpoint, Ypoint, DataEscritura, DataContabil, AssinadaPor, Cartorio, Livro, Folha, ValorEscritura, DataContrato, ValorContrato, AnoDIMOB, ValorDIMOB, LadoDireito, LadoEsquerdo, Fundo, Confrontamentos )  VALUES ( :Loteamento, :NumLote, :Matricula, :Quadra, :AreaTotal, :Frente, :Esquina, :Data, :Valor, :Observacao, :Status, :DataAtualizacao, :HoraAtualizacao, :UsuarioAtualizacao, :Xpoint, :Ypoint, :DataEscritura, :DataContabil, :AssinadaPor, :Cartorio, :Livro, :Folha, :ValorEscritura, :DataContrato, :ValorContrato, :AnoDIMOB, :ValorDIMOB, :LadoDireito, :LadoEsquerdo, :Fundo, :Confrontamentos );");

			return $stmt->execute($param);

		}catch(PDOException $ex){
			return "Erro ao cadastrar Lotes ".$ex->getMessage();

		}
	}
	function atualizaLotes(Lotes $entidadeLotes ,$id){
		try{
			$param = array(
				':Loteamento'=>$entidadeLotes->get('Loteamento'),
				// ':NumLote'=>$entidadeLotes->get('NumLote'),
				':Matricula'=>$entidadeLotes->get('Matricula'),
				':Quadra'=>$entidadeLotes->get('Quadra'),
				':AreaTotal'=>$entidadeLotes->get('AreaTotal'),
				':Frente'=>$entidadeLotes->get('Frente'),
				':Esquina'=>$entidadeLotes->get('Esquina'),
				':Data'=>$entidadeLotes->get('Data'),
				':Valor'=>$entidadeLotes->get('Valor'),
				':Observacao'=>$entidadeLotes->get('Observacao'),
				':Status'=>$entidadeLotes->get('Status'),
				':DataAtualizacao'=>$entidadeLotes->get('DataAtualizacao'),
				':HoraAtualizacao'=>$entidadeLotes->get('HoraAtualizacao'),
				':UsuarioAtualizacao'=>$entidadeLotes->get('UsuarioAtualizacao'),
				':Xpoint'=>$entidadeLotes->get('Xpoint'),
				':Ypoint'=>$entidadeLotes->get('Ypoint'),
				':DataEscritura'=>$entidadeLotes->get('DataEscritura'),
				':DataContabil'=>$entidadeLotes->get('DataContabil'),
				':AssinadaPor'=>$entidadeLotes->get('AssinadaPor'),
				':Cartorio'=>$entidadeLotes->get('Cartorio'),
				':Livro'=>$entidadeLotes->get('Livro'),
				':Folha'=>$entidadeLotes->get('Folha'),
				':ValorEscritura'=>$entidadeLotes->get('ValorEscritura'),
				':DataContrato'=>$entidadeLotes->get('DataContrato'),
				':ValorContrato'=>$entidadeLotes->get('ValorContrato'),
				':AnoDIMOB'=>$entidadeLotes->get('AnoDIMOB'),
				':ValorDIMOB'=>$entidadeLotes->get('ValorDIMOB'),
				':LadoDireito'=>$entidadeLotes->get('LadoDireito'),
				':LadoEsquerdo'=>$entidadeLotes->get('LadoEsquerdo'),
				':Fundo'=>$entidadeLotes->get('Fundo'),
				':Confrontamentos'=>$entidadeLotes->get('Confrontamentos')
			);
			
			$stmt = $this->pdo->prepare("UPDATE tabloteamentos_lotes SET Loteamento = :Loteamento, Matricula = :Matricula, Quadra = :Quadra, AreaTotal = :AreaTotal, Frente = :Frente, Esquina = :Esquina, Data = :Data, Valor = :Valor, Observacao = :Observacao, Status = :Status, DataAtualizacao = :DataAtualizacao, HoraAtualizacao = :HoraAtualizacao, UsuarioAtualizacao = :UsuarioAtualizacao, Xpoint = :Xpoint, Ypoint = :Ypoint, DataEscritura = :DataEscritura, DataContabil = :DataContabil, AssinadaPor = :AssinadaPor, Cartorio = :Cartorio, Livro = :Livro, Folha = :Folha, ValorEscritura = :ValorEscritura, DataContrato = :DataContrato, ValorContrato = :ValorContrato, AnoDIMOB = :AnoDIMOB, ValorDIMOB = :ValorDIMOB, LadoDireito = :LadoDireito, LadoEsquerdo = :LadoEsquerdo, Fundo = :Fundo, Confrontamentos = :Confrontamentos WHERE NumLote = ".$id.";"); // , NumLote = :NumLote
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Lotes ".$ex->getMessage();
		}
	}
}
?>