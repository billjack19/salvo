
<?php 
require_once "../classe/conexao.php";

class posicao_cafeDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraPosicao_cafe(Posicao_cafe $entidadePosicao_cafe){
		try{
			$param = array(
				':cliente'=>$entidadePosicao_cafe->get('cliente'), 
				':fazenda'=>$entidadePosicao_cafe->get('fazenda'), 
				':cidade'=>$entidadePosicao_cafe->get('cidade'), 
				':insc_est'=>$entidadePosicao_cafe->get('insc_est'), 
				':safra'=>$entidadePosicao_cafe->get('safra'), 
				':lote'=>$entidadePosicao_cafe->get('lote'), 
				':lote_cliente'=>$entidadePosicao_cafe->get('lote_cliente'), 
				':entrada'=>$entidadePosicao_cafe->get('entrada'), 
				':nfe_fiscal'=>$entidadePosicao_cafe->get('nfe_fiscal'), 
				':padrao'=>$entidadePosicao_cafe->get('padrao'), 
				':preparo'=>$entidadePosicao_cafe->get('preparo'), 
				':kilos'=>$entidadePosicao_cafe->get('kilos'), 
				':sacas'=>$entidadePosicao_cafe->get('sacas'), 
				':per_umi'=>$entidadePosicao_cafe->get('per_umi'), 
				':per_imp'=>$entidadePosicao_cafe->get('per_imp'), 
				':per_cat'=>$entidadePosicao_cafe->get('per_cat'), 
				':per_def'=>$entidadePosicao_cafe->get('per_def'), 
				':cert'=>$entidadePosicao_cafe->get('cert'), 
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO posicao_cafe (cliente, fazenda, cidade, insc_est, safra, lote, lote_cliente, entrada, nfe_fiscal, padrao, preparo, kilos, sacas, per_umi, per_imp, per_cat, per_def, cert, ) VALUES (:cliente, :fazenda, :cidade, :insc_est, :safra, :lote, :lote_cliente, :entrada, :nfe_fiscal, :padrao, :preparo, :kilos, :sacas, :per_umi, :per_imp, :per_cat, :per_def, :cert, );"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao cadastrar Posicao_cafe ".$ex->getMessage();
		}
	}
	function atualizaPosicao_cafe(Posicao_cafe $entidadePosicao_cafe, $id){
		try{
			$param = array(
				':cliente'=>$entidadePosicao_cafe->get('cliente'), 
				':fazenda'=>$entidadePosicao_cafe->get('fazenda'), 
				':cidade'=>$entidadePosicao_cafe->get('cidade'), 
				':insc_est'=>$entidadePosicao_cafe->get('insc_est'), 
				':safra'=>$entidadePosicao_cafe->get('safra'), 
				':lote'=>$entidadePosicao_cafe->get('lote'), 
				':lote_cliente'=>$entidadePosicao_cafe->get('lote_cliente'), 
				':entrada'=>$entidadePosicao_cafe->get('entrada'), 
				':nfe_fiscal'=>$entidadePosicao_cafe->get('nfe_fiscal'), 
				':padrao'=>$entidadePosicao_cafe->get('padrao'), 
				':preparo'=>$entidadePosicao_cafe->get('preparo'), 
				':kilos'=>$entidadePosicao_cafe->get('kilos'), 
				':sacas'=>$entidadePosicao_cafe->get('sacas'), 
				':per_umi'=>$entidadePosicao_cafe->get('per_umi'), 
				':per_imp'=>$entidadePosicao_cafe->get('per_imp'), 
				':per_cat'=>$entidadePosicao_cafe->get('per_cat'), 
				':per_def'=>$entidadePosicao_cafe->get('per_def'), 
				':cert'=>$entidadePosicao_cafe->get('cert'), 
			);

			$stmt = $this->pdo->prepare("UPDATE posicao_cafe SET cliente = :cliente, fazenda = :fazenda, cidade = :cidade, insc_est = :insc_est, safra = :safra, lote = :lote, lote_cliente = :lote_cliente, entrada = :entrada, nfe_fiscal = :nfe_fiscal, padrao = :padrao, preparo = :preparo, kilos = :kilos, sacas = :sacas, per_umi = :per_umi, per_imp = :per_imp, per_cat = :per_cat, per_def = :per_def, cert = :cert,  WHERE id_posicao_cafe = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Posicao_cafe ".$ex->getMessage();
		}
	}
}
?>