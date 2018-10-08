
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_posicao_cafe'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT posicao_cafe.* 
				FROM posicao_cafe posicao_cafe  
				WHERE cliente LIKE '%$filtro%'
				OR fazenda LIKE '%$filtro%'
				OR cidade LIKE '%$filtro%'
				OR insc_est LIKE '%$filtro%'
				OR safra LIKE '%$filtro%'
				OR lote LIKE '%$filtro%'
				OR lote_cliente LIKE '%$filtro%'
				OR entrada LIKE '%$filtro%'
				OR nfe_fiscal LIKE '%$filtro%'
				OR padrao LIKE '%$filtro%'
				OR preparo LIKE '%$filtro%'
				OR kilos LIKE '%$filtro%'
				OR sacas LIKE '%$filtro%'
				OR per_umi LIKE '%$filtro%'
				OR per_imp LIKE '%$filtro%'
				OR per_cat LIKE '%$filtro%'
				OR per_def LIKE '%$filtro%'
				OR cert LIKE '%$filtro%'
				OR data_atualizacao LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_posicao_cafe"]."{,}".
					$dados["cliente"]."{,}".
					$dados["fazenda"]."{,}".
					$dados["cidade"]."{,}".
					$dados["insc_est"]."{,}".
					$dados["safra"]."{,}".
					$dados["lote"]."{,}".
					$dados["lote_cliente"]."{,}".
					$dados["entrada"]."{,}".
					$dados["nfe_fiscal"]."{,}".
					$dados["padrao"]."{,}".
					$dados["preparo"]."{,}".
					$dados["kilos"]."{,}".
					$dados["sacas"]."{,}".
					$dados["per_umi"]."{,}".
					$dados["per_imp"]."{,}".
					$dados["per_cat"]."{,}".
					$dados["per_def"]."{,}".
					$dados["cert"]."{,}".
					$dados["data_atualizacao"];
		} else {
			echo    "[]".
					$dados["id_posicao_cafe"]."{,}".
					$dados["cliente"]."{,}".
					$dados["fazenda"]."{,}".
					$dados["cidade"]."{,}".
					$dados["insc_est"]."{,}".
					$dados["safra"]."{,}".
					$dados["lote"]."{,}".
					$dados["lote_cliente"]."{,}".
					$dados["entrada"]."{,}".
					$dados["nfe_fiscal"]."{,}".
					$dados["padrao"]."{,}".
					$dados["preparo"]."{,}".
					$dados["kilos"]."{,}".
					$dados["sacas"]."{,}".
					$dados["per_umi"]."{,}".
					$dados["per_imp"]."{,}".
					$dados["per_cat"]."{,}".
					$dados["per_def"]."{,}".
					$dados["cert"]."{,}".
					$dados["data_atualizacao"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_posicao_cafe_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT posicao_cafe.* 
				FROM posicao_cafe posicao_cafe
				WHERE id_posicao_cafe = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_posicao_cafe"]."{,}".
					$dados["cliente"]."{,}".
					$dados["fazenda"]."{,}".
					$dados["cidade"]."{,}".
					$dados["insc_est"]."{,}".
					$dados["safra"]."{,}".
					$dados["lote"]."{,}".
					$dados["lote_cliente"]."{,}".
					$dados["entrada"]."{,}".
					$dados["nfe_fiscal"]."{,}".
					$dados["padrao"]."{,}".
					$dados["preparo"]."{,}".
					$dados["kilos"]."{,}".
					$dados["sacas"]."{,}".
					$dados["per_umi"]."{,}".
					$dados["per_imp"]."{,}".
					$dados["per_cat"]."{,}".
					$dados["per_def"]."{,}".
					$dados["cert"]."{,}".
					$dados["data_atualizacao"];
	}
}




if (!empty($_POST['pequisa_posicao_cafe_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT posicao_cafe.* 
				FROM posicao_cafe posicao_cafe 
				WHERE $coluna = $id 
				AND (
					   cliente LIKE '%$filtro%'
					OR fazenda LIKE '%$filtro%'
					OR cidade LIKE '%$filtro%'
					OR insc_est LIKE '%$filtro%'
					OR safra LIKE '%$filtro%'
					OR lote LIKE '%$filtro%'
					OR lote_cliente LIKE '%$filtro%'
					OR entrada LIKE '%$filtro%'
					OR nfe_fiscal LIKE '%$filtro%'
					OR padrao LIKE '%$filtro%'
					OR preparo LIKE '%$filtro%'
					OR kilos LIKE '%$filtro%'
					OR sacas LIKE '%$filtro%'
					OR per_umi LIKE '%$filtro%'
					OR per_imp LIKE '%$filtro%'
					OR per_cat LIKE '%$filtro%'
					OR per_def LIKE '%$filtro%'
					OR cert LIKE '%$filtro%'
					OR data_atualizacao LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_posicao_cafe"]."{,}".
					$dados["cliente"]."{,}".
					$dados["fazenda"]."{,}".
					$dados["cidade"]."{,}".
					$dados["insc_est"]."{,}".
					$dados["safra"]."{,}".
					$dados["lote"]."{,}".
					$dados["lote_cliente"]."{,}".
					$dados["entrada"]."{,}".
					$dados["nfe_fiscal"]."{,}".
					$dados["padrao"]."{,}".
					$dados["preparo"]."{,}".
					$dados["kilos"]."{,}".
					$dados["sacas"]."{,}".
					$dados["per_umi"]."{,}".
					$dados["per_imp"]."{,}".
					$dados["per_cat"]."{,}".
					$dados["per_def"]."{,}".
					$dados["cert"]."{,}".
					$dados["data_atualizacao"];
		} else {
			echo    "[]".
					$dados["id_posicao_cafe"]."{,}".
					$dados["cliente"]."{,}".
					$dados["fazenda"]."{,}".
					$dados["cidade"]."{,}".
					$dados["insc_est"]."{,}".
					$dados["safra"]."{,}".
					$dados["lote"]."{,}".
					$dados["lote_cliente"]."{,}".
					$dados["entrada"]."{,}".
					$dados["nfe_fiscal"]."{,}".
					$dados["padrao"]."{,}".
					$dados["preparo"]."{,}".
					$dados["kilos"]."{,}".
					$dados["sacas"]."{,}".
					$dados["per_umi"]."{,}".
					$dados["per_imp"]."{,}".
					$dados["per_cat"]."{,}".
					$dados["per_def"]."{,}".
					$dados["cert"]."{,}".
					$dados["data_atualizacao"];
		}
		$cont++;
	}
}

?>
