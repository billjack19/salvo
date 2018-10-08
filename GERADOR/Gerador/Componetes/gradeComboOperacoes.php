<?php

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


if (!empty($_POST['gravar_grade_config'])) {
	$tabela = $_POST['tabela'];
	$campo_primario = $_POST['campo_primario'];
	$campo_grade = $_POST['campo_grade'];
	$campo_grade_primario = $_POST['campo_grade_primario'];
	$campo_principal = $_POST['campo_principal'];

	$projeto_id = $_POST['projeto_id'];

	$sequencia = 1;
	$sql = "SELECT sequencia 
			FROM grade_combo 
			WHERE projetos_id = $projeto_id 
			AND tabela = '$tabela'
			ORDER BY sequencia DESC
			LIMIT 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$sequencia = $dados[0]+1;
	}

	$sql = "INSERT INTO grade_combo 
					(  tabela,   campo_primario,   campo_grade,    campo_grade_primario,    campo_principal,   projetos_id,	sequencia)
			VALUES 	('$tabela', '$campo_primario','$campo_grade', '$campo_grade_primario', '$campo_principal', $projeto_id, $sequencia);";
	
	echo $sql;
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}


if (!empty($_POST['excluit_grade_config'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM grade_combo WHERE id_grade_combo = $id;";
	
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}



if (!empty($_POST['listarGrade'])) {
	$tabela = $_POST['tabela'];
	$projeto_id = $_POST['projeto_id'];

	$cont = 0;
	$resultado = "
	<br><table style='width: 100%'>
		<tr>
			<td><b>Campo Primario</b></td>
			<td><b>Campo Grade</b></td>
			<td><b>Campo Grade Primario</b></td>
			<td><b>Campo Principal</b></td>
			<td><b>Sequencia</b></td>
			<td><b>Excluir</b></td>
		</tr>";

	$sql = "SELECT * FROM grade_combo WHERE projetos_id = $projeto_id AND tabela = '$tabela' ORDER BY sequencia;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$id_grade_combo = $dados['id_grade_combo'];
		$campo_primario = $dados['campo_primario'];
		$campo_grade = $dados['campo_grade'];
		$campo_grade_primario = $dados['campo_grade_primario'];
		$campo_principal = $dados['campo_principal'];
		$sequencia = $dados['sequencia'];
		$cont++;
		$resultado .= "
		<tr>
			<td>$campo_primario</td>
			<td>$campo_grade</td>
			<td>$campo_grade_primario</td>
			<td>$campo_principal</td>
			<td>
				<input value='$sequencia' id='sequenciaCampo_$id_grade_combo'><br>
				<button onclick='alterarSequencia($id_grade_combo)'>Altera Sequencia</button>
			</td>
			<td>
				<button onclick='excluirConfig($id_grade_combo)'>Excluir</button>
			</td>
		</tr>";
	}
	$resultado = $cont == 0 ? "<h2>Nenhum Resultado Encontrado!</h2>" : $resultado."</table>";
	echo $resultado;
}


if (!empty($_POST['alterarSequencia'])) {
	$id = $_POST['id'];
	$sequencia = $_POST['sequencia'];

	$sql = 'UPDATE grade_combo SET sequencia = '.$sequencia.' WHERE id_grade_combo = '.$id;
	$verifica = $pdo->prepare($sql);
	echo $verifica->execute();
}





if (!empty($_POST['listarColunas'])) {
	$tabela = $_POST['tabela'];
	$projeto_id = $_POST['projeto_id'];


	$sql = "SELECT * FROM projetos WHERE id_projeto = $projeto_id;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$projetoNome = $dados['nome'];
		$hostConexao = $dados['host'];
		$userConexao = $dados['user'];
		$pwsConexao = $dados['pws'];
		$nameDbConexao = $dados['bancoDados'];
	}

	include "../Classe/conexao.php";

	$conn = new Conexao();
	$conn->set($hostConexao, 'db_host');
	$conn->set($userConexao, 'db_usuario');
	$conn->set($pwsConexao, 'db_senha');
	$conn->set($nameDbConexao, 'db_nome');
	$conn->conectar();

	$pdo = $conn->Connect();

	$sql = "SHOW COLUMNS FROM $tabela;";
	$verifica = $pdo->query($sql);

	$resultado = "<datalist id=\"colunasList\">";
	foreach ($verifica as $dados) {
		$resultado .= "<option value='".$dados[0]."'>";
	}
	$resultado .= "<datalist>";
	echo $resultado;
}




?>