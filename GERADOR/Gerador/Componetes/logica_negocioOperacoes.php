<?php

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


if (!empty($_POST['id_projeto'])) {
	$id_projeto = $_POST['id_projeto'];
	$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$projetoNome = $dados['nome'];
		$hostConexao = $dados['host'];
		$userConexao = $dados['user'];
		$pwsConexao = $dados['pws'];
		$nameDbConexao = $dados['bancoDados'];
	}

	include "../Classe/funcoes.php";
	include "../Classe/conexao.php";

	$conn = new Conexao();
	$conn->set($hostConexao, 'db_host');
	$conn->set($userConexao, 'db_usuario');
	$conn->set($pwsConexao, 'db_senha');
	$conn->set($nameDbConexao, 'db_nome');
	$conn->conectar();

	$pdoProjeto = $conn->Connect();
}








if (!empty($_POST['pesuisa_formula'])) {
	$textoPesquisa = "";
	if (!empty($_POST['textoPesquisa'])) {
		$textoPesquisa = "WHERE descricao_formula LIKE '%".$_POST['textoPesquisa']."%'";
		$textoPesquisa .= " OR formula_formula LIKE '%".$_POST['textoPesquisa']."%'";
	}

	$tabelaFormulas = "<table class='table'>";
	$tabelaFormulas .= "<tr>
							<td>Formula<td>
						</tr>";
	$sql = "SELECT * FROM formula $textoPesquisa;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$tabelaFormulas .= "
		<tr onclick='selecionarForm(".$dados['id_formula'].", \"".$dados['descricao_formula']."\", ".$dados['numero_campos_formula'].", \"".$dados['formula_formula']."\")'>
			<td><li>".$dados['descricao_formula']." / ".$dados['formula_formula']."</li></td>
		</tr>";
	}
	$tabelaFormulas .= "</table>";
	echo $tabelaFormulas;
}





if (!empty($_POST['gravar_logica'])) {
	$tabela_logica_negocio = $_POST['tabela_logica_negocio'];
	$campos_logica_negocio = $_POST['campos_logica_negocio'];
	$campos_data_logica_negocio = $_POST['campos_data_logica_negocio'];
	$projeto_id = $_POST['projeto_id'];
	$campo_resultado_logica_negocio = $_POST['campo_resultado_logica_negocio'];
	$formula_id = $_POST['formula_id'];
	$tipo_reultado_logica_negocio = $_POST['tipo_reultado_logica_negocio'];


	$sql = "INSERT INTO logica_negocio 
					( projetos_id, tabela_logica_negocio,    campos_logica_negocio, campos_data_logica_negocio,  campo_resultado_logica_negocio, tipo_reultado_logica_negocio, formula_id)
			VALUES 	($projeto_id, '$tabela_logica_negocio', '$campos_logica_negocio', '$campos_data_logica_negocio', '$campo_resultado_logica_negocio', '$tipo_reultado_logica_negocio', $formula_id);";
	
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}


if (!empty($_POST['atualizar_logica'])) {
	$tabela_logica_negocio = $_POST['tabela_logica_negocio'];
	$campos_logica_negocio = $_POST['campos_logica_negocio'];
	$campos_data_logica_negocio = $_POST['campos_data_logica_negocio'];
	$projeto_id = $_POST['projeto_id'];
	$campo_resultado_logica_negocio = $_POST['campo_resultado_logica_negocio'];
	$formula_id = $_POST['formula_id'];
	$tipo_reultado_logica_negocio = $_POST['tipo_reultado_logica_negocio'];
	$id = $_POST['id'];


	$sql = "UPDATE logica_negocio SET projetos_id = $projeto_id, tabela_logica_negocio = '$tabela_logica_negocio', campos_logica_negocio = '$campos_logica_negocio', campos_data_logica_negocio, '$campos_data_logica_negocio', campo_resultado_logica_negocio = '$campo_resultado_logica_negocio', tipo_reultado_logica_negocio = '$tipo_reultado_logica_negocio', formula_id = $formula_id
			WHERE id_logica_negocio = $id;";

	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}




if (!empty($_POST['excluit_grade_config'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM logica_negocio WHERE id_logica_negocio = $id;";
	
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}






if(!empty($_POST['listarColunasTabela'])) {
	$id = $_POST['id_projeto'];
	$tabela = $_POST['tabela'];
	$contRegistros = 0;

	$descricao_grade = "<b>Sem Registro de Colunas</b>";
	$tabela_primaria_grade = "<datalist id='colunasList'>";
	$datalistData = "<datalist id='colunasDataList'>";
	$datalistResultado = "<datalist id='ColunasResultado'>";
	$arrayColuna = "";

	$sql = "SHOW COLUMNS FROM $tabela WHERE Type LIKE '%int%' OR Type LIKE '%float%' OR  Type LIKE '%date%';";
	$verifica = $pdoProjeto->query($sql);
	foreach ($verifica as $dados) {
		$arrayColuna = explode("_", $dados[0]);
		if ($dados[3] != "PRI" && end($arrayColuna) != "id" && $arrayColuna[0] != "bool" && $dados[0] != "data_atualizacao_$tabela") {
			if ($dados[1] == "date" || $dados[1] == "datetime") {
				$datalistData .= "<option value='".$dados[0]."'>";
			}
			else {
				$tabela_primaria_grade .= "<option value='".$dados[0]."'>";
			}
			$datalistResultado .= "<option value='".$dados[0]."'>";
			$contRegistros++;
		}
	}
	$tabela_primaria_grade = $contRegistros == 0 ? $descricao_grade : $tabela_primaria_grade."</datalist>".$datalistData."</datalist>".$datalistResultado."</datalist>";
	echo $tabela_primaria_grade;
}




if (!empty($_POST['listarLogica'])) {
	$id = $_POST['id_projeto'];
	$tabela = $_POST['tabela'];
	$contRegistros = 0;

	$descricao_grade = "Sem Registro";

	$tabela_primaria_grade = "<table class='table'>";
	$tabela_primaria_grade .= "<tr>";
	$tabela_primaria_grade .= "<td>Codigo</td>";
	$tabela_primaria_grade .= "<td>Tabela Selecionada</td>";
	$tabela_primaria_grade .= "<td>Campos</td>";
	$tabela_primaria_grade .= "<td>Campos Data</td>";
	$tabela_primaria_grade .= "<td>Campo Resultado</td>";
	$tabela_primaria_grade .= "<td>Tipo de valor</td>";
	$tabela_primaria_grade .= "<td>Formula</td>";
	$tabela_primaria_grade .= "<td>Selecionar</td>";
	$tabela_primaria_grade .= "<td>Excluir</td>";
	$tabela_primaria_grade .= "</tr>";


	$campos = "";
	$camposData = "";
	$camposArray = [];
	$sql = "SELECT logica_negocio.*, formula.numero_campos_formula, formula.numero_campos_data_formula, formula.descricao_formula, formula.formula_formula
			FROM logica_negocio logica_negocio 
			INNER JOIN formula ON logica_negocio.formula_id = formula.id_formula
			WHERE logica_negocio.projetoS_id = $id
			AND logica_negocio.tabela_logica_negocio = '$tabela';";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$contRegistros++;

		$campos = "";
		$camposArray = explode("+", $dados['campos_logica_negocio']);
		for ($i=0; $i < sizeof($camposArray); $i++) { 
			$campos .= $i == 0 ? $camposArray[$i] : "<br>".$camposArray[$i];
		}
		$camposData = "";
		$camposArray = explode("+", $dados['campos_data_logica_negocio']);
		for ($i=0; $i < sizeof($camposArray); $i++) { 
			$camposData .= $i == 0 ? $camposArray[$i] : "<br>".$camposArray[$i];
		}

		$tabela_primaria_grade .= "<tr>";
		$tabela_primaria_grade .= 	"<td>".$dados['id_logica_negocio']."</td>";
		$tabela_primaria_grade .= 	"<td>".$dados['tabela_logica_negocio']."</td>";
		$tabela_primaria_grade .= 	"<td>".$campos."</td>";
		$tabela_primaria_grade .= 	"<td>".$camposData."</td>";
		$tabela_primaria_grade .= 	"<td>".$dados['campo_resultado_logica_negocio']."</td>";
		$tabela_primaria_grade .= 	"<td>".$dados['tipo_reultado_logica_negocio']."</td>";
		$tabela_primaria_grade .= 	"<td>".$dados['descricao_formula']."</td>";
		$tabela_primaria_grade .= 	"<td>";
		$tabela_primaria_grade .=		"<button onclick=\"selecionarConfig(".$dados['id_logica_negocio'].", '".$dados['descricao_formula']."', ".$dados['numero_campos_formula'].", ".$dados['numero_campos_data_formula'].", '".$dados['formula_formula']."', ".$dados['formula_id'].", '".$dados['campos_logica_negocio']."', '".$dados['campos_data_logica_negocio']."', '".$dados['campo_resultado_logica_negocio']."', '".$dados['tipo_reultado_logica_negocio']."')\">Selecionar</button>";
		$tabela_primaria_grade .=	"</td>";
		$tabela_primaria_grade .= 	"<td>";
		$tabela_primaria_grade .=		"<button onclick='excluirConfig(".$dados['id_logica_negocio'].")'>Excluir</button>";
		$tabela_primaria_grade .=	"</td>";
		$tabela_primaria_grade .= "</tr>";
	}

	$tabela_primaria_grade = $contRegistros == 0 ? "Sem Configuração" : $tabela_primaria_grade . "</table><br><br><br><br>";
	echo $tabela_primaria_grade;
}

?>