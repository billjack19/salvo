<?php 
require_once "../class/conexao.php";

class reservaDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraReserva(Reserva $entidadeReserva){
		try{
			$param = array(
				':Loteamento'=>$entidadeReserva->get('Loteamento'),
				':NumLote'=>$entidadeReserva->get('NumLote'),
				':Corretor'=>$entidadeReserva->get('Corretor'),
				':DataReserva'=>$entidadeReserva->get('DataReserva'),
				':HoraReserva'=>$entidadeReserva->get('HoraReserva'),
				':ObservacaoReseva'=>$entidadeReserva->get('ObservacaoReseva'),
				':flagCancelada'=>$entidadeReserva->get('flagCancelada')
				);
			
			$stmt = $this->pdo->prepare("INSERT INTO lanc_reserva_lotes ( Loteamento, NumLote, Corretor, DataReserva, HoraReserva, ObservacaoReseva, flagCancelada ) VALUES (  :Loteamento, :NumLote, :Corretor, :DataReserva, :HoraReserva, :ObservacaoReseva, :flagCancelada );"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Reserva ".$ex->getMessage();
		}
	}
	function atualizaReserva(Reserva $entidadeReserva, $id){
		try{
			$param = array(
				':Loteamento'=>$entidadeReserva->get('Loteamento'),
				':NumLote'=>$entidadeReserva->get('NumLote'),
				':Corretor'=>$entidadeReserva->get('Corretor'),
				':DataReserva'=>$entidadeReserva->get('DataReserva'),
				':HoraReserva'=>$entidadeReserva->get('HoraReserva'),
				':ObservacaoReseva'=>$entidadeReserva->get('ObservacaoReseva'),
				':flagCancelada'=>$entidadeReserva->get('flagCancelada')
				);

			$stmt = $this->pdo->prepare("UPDATE lanc_reserva_lotes SET Loteamento = :Loteamento, NumLote = :NumLote, Corretor = :Corretor, DataReserva = :DataReserva, HoraReserva = :HoraReserva, ObservacaoReseva = :ObservacaoReseva, flagCancelada = :flagCancelada WHERE ID_LANC_RESERVA_LOTES = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Reserva ".$ex->getMessage();
		}
	}
}
?>