<?php 
/* movimentacaoDAO .php */

require_once "../class/conexao.php";

class movimentacaoDAO{
	function __construct(){
		$this->conn = new Conexao();
		$this->pdo = $this->conn->Connect();
	}
	function cadastraMovimentacao(Movimentacao $entidadeMovimentacao){
		try{
			$param = array(
				':cacamba_id'=>$entidadeMovimentacao->get('cacamba_id'),
				':local_entrega_id'=>$entidadeMovimentacao->get('local_entrega_id'),
				':situacao'=>$entidadeMovimentacao->get('situacao'),
				':titulo'=>$entidadeMovimentacao->get('titulo'),
				':valor_total'=>$entidadeMovimentacao->get('valor_total'),
				':emissao'=>$entidadeMovimentacao->get('emissao'),
				':entrega'=>$entidadeMovimentacao->get('entrega'),
				':retirada'=>$entidadeMovimentacao->get('retirada'),
				':periodo'=>$entidadeMovimentacao->get('periodo'),
				':confirma_carreto'=>$entidadeMovimentacao->get('confirma_carreto'),
				':observacao'=>$entidadeMovimentacao->get('observacao'),
				':flag_entrega'=>$entidadeMovimentacao->get('flag_entrega'),
				':flag_recolhe'=>$entidadeMovimentacao->get('flag_recolhe'),
				':flag_pagto'=>$entidadeMovimentacao->get('flag_pagto'),
				':cnpj_user'=>$entidadeMovimentacao->get('cnpj_user')
			);
			
			$stmt = $this->pdo->prepare("INSERT INTO movimentacao_cacamba (cacamba_id, local_entrega_id, situacao, titulo, valor_total, emissao, entrega, retirada, periodo, confirma_carreto, observacao, flag_entrega, flag_recolhe, flag_pagto, cnpj_user) VALUES (:cacamba_id, :local_entrega_id, :situacao, :titulo, :valor_total, :emissao, :entrega, :retirada, :periodo, :confirma_carreto, :observacao, :flag_entrega, :flag_recolhe, :flag_pagto, :cnpj_user);"
			);
			$result = $stmt->execute($param);
			if ($result == 1 || $result == "1") {
				return (int) $this->pdo->lastInsertId();
			} else {
				return 0;
			}
		}catch(PDOException $ex){
			return "Erro ao cadastrar Caçamba ".$ex->getMessage();
		}
	}
	

	function atualizaMovimentacao(Movimentacao $entidadeMovimentacao, $id){
		try{
			$param = array(
				':cacamba_id'=>$entidadeMovimentacao->get('cacamba_id'),
				':local_entrega_id'=>$entidadeMovimentacao->get('local_entrega_id'),
				':titulo'=>$entidadeMovimentacao->get('titulo'),
				':valor_total'=>$entidadeMovimentacao->get('valor_total'),
				':emissao'=>$entidadeMovimentacao->get('emissao'),
				':entrega'=>$entidadeMovimentacao->get('entrega'),
				':retirada'=>$entidadeMovimentacao->get('retirada'),
				':periodo'=>$entidadeMovimentacao->get('periodo'),
				':observacao'=>$entidadeMovimentacao->get('observacao')
			);

			$stmt = $this->pdo->prepare("UPDATE movimentacao_cacamba SET cacamba_id = :cacamba_id, local_entrega_id = :local_entrega_id, titulo = :titulo, valor_total = :valor_total, emissao = :emissao, entrega = :entrega, retirada = :retirada, periodo = :periodo, observacao = :observacao WHERE id_movimentacao_cacamba = ".$id.";"
			);
			return $stmt->execute($param);
		}catch(PDOException $ex){
			return "Erro ao atualizar Caçamba ".$ex->getMessage();
		}
	}
}
?>