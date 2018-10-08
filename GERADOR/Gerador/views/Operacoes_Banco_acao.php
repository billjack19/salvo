<?php

include "../Classe/conexaoLocal.php";

ini_set('max_execution_time', 5000);


$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();
$pdoLocal = $conn->Connect();

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

include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect();



if (!empty($_POST['criarTabela'])) {
	$tabela = $_POST['tabela'];
	$cont = 0;

	$sql = "CREATE TABLE IF NOT EXISTS $tabela (
				id_$tabela int NOT NULL PRIMARY KEY AUTO_INCREMENT,
				data_atualizacao_$tabela datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				usuario_id int NOT NULL,
				bool_ativo_$tabela int(11) NOT NULL DEFAULT 1
			);";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$criarChave = true;
	$sql = "SHOW INDEX FROM $tabela";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ('fk_'.$tabela.'<>usuario' == $dados[2]) {
			$criarChave = false;
		}
	}

	if ($criarChave) {
		$sql = "ALTER TABLE `$tabela`
				ADD CONSTRAINT `fk_".$tabela."<>usuario` 
				FOREIGN KEY (`usuario_id`)
				REFERENCES `usuario` (`id_usuario`);";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}
	echo retornaTabela($pdo);
}



if (!empty($_POST['incluirTabela'])) {
	$tabela = $_POST['tabela'];
	$myfile = fopen("../TabelasBD/".$tabela, "r") or die("Unable to open file!");
	$sql = fread($myfile,filesize($pastaSrc."/".$nomeArquivo));
	fclose($myfile);

	$stmt = $pdo->prepare($sql);
	echo $stmt->execute();
}






if (!empty($_POST['incluirPadrao'])) {
	$listaDeTabelas = "Tabelas:";
	$id_padrao = $_POST['tabela'];
	$tabela = "";
	$sql = "SELECT * FROM tabela_algoritimo_exe_item WHERE tabela_algoritimo_exe_id = $id_padrao;";
	$verifica = $pdoLocal->query($sql);
	foreach ($verifica as $dados) {
		$listaDeTabelas .= "\n     $tabela";
		$tabela = $dados['descricao_tabela'];
		$myfile = fopen("../TabelasBD/".$tabela, "r") or die("Unable to open file!");
		$sql = fread($myfile,filesize("../TabelasBD/".$tabela));
		fclose($myfile);

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}
	echo "\n\nTodas as tabelas do padrão foram carregadas na sua base de dados;\n\n $listaDeTabelas";
}









if (!empty($_POST["adicionarColuna"])) {
	$tabela = $_POST['tabela'];
	$descricao = $_POST['descricao'];
	$especificaoes = $_POST['especificaoes'];
	$colunaAfter = $_POST['colunaAfter'];
	$tipo = $_POST['tipo'];

	$descricao = $tipo == "forekey" ? $descricao : $descricao."_".$tabela;
	$tabelaEstrangeira = str_replace("_id", "", $descricao);

	$resultado = "";

	$sql = "ALTER TABLE `$tabela`
			ADD COLUMN `$descricao` $especificaoes
			AFTER `$colunaAfter`;";
	
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	if ($tipo == "forekey" && ($stmt == 1 || $stmt == "1")) {
		$sql = "ALTER TABLE `$tabela`
				ADD CONSTRAINT `fk_".$tabela."<>$tabelaEstrangeira` 
				FOREIGN KEY (`$descricao`)
				REFERENCES `$tabelaEstrangeira` (`id_$tabelaEstrangeira`);";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}

	// echo $stmt;
}






if (!empty($_POST["excluirColuna"])) {
	$tabela = $_POST['tabela'];
	$coluna = $_POST['coluna'];
	$resultado = "";

	if (substr($coluna, -3) == "_id") {
		$tabelaEstrangeira = substr($coluna, 0, strlen($coluna) - 3 );
		echo $tabelaEstrangeira;
		$sql = 'ALTER TABLE `'.$tabela.'`
				DROP INDEX `fk_'.$tabela.'<>'.$tabelaEstrangeira.'`,
				DROP FOREIGN KEY `fk_'.$tabela.'<>'.$tabelaEstrangeira.'`;';

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
	}

	$sql = "ALTER TABLE `$tabela` DROP COLUMN `$coluna`;";
	
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	// echo $stmt;
}






if (!empty($_POST["mudarDePosicaoColuna"])) {
	$tabela = $_POST['tabela'];
	$coluna = $_POST['coluna'];
	$descricao = $_POST['descricao'];
	$especificaoes = $_POST['especificaoes'];
	$$colunaAfter = $_POST['$colunaAfter'];
	$resultado = "";

	$sql = "ALTER TABLE `$tabela`
			CHANGE COLUMN `$coluna` `".$descricao."_$tabela` $especificaoes
			AFTER `$colunaAfter`;"; //  FIRST
	
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	echo $stmt;
}




if (!empty($_POST['listarColunas'])) {
	$tabela = $_POST['tabela'];
	$oldColuna = "FIRST";

	$tabelaDeColunas = "
		<table border='1' width='100%'>
			<tr>
				<td><b>Coluna</b></td>
				<td><b>Tipo</b></td>
				<td><b>Null</b></td>
				<td><b>Chave</b></td>
				<td><b>Padrão</b></td>
				<td><b>Extra</b></td>
				<td><b>Coluna Anterior</b></td>
				<td><b>Excluir</b></td>
			</tr>
	";

	$selectColunas = "<select id='selectColunasOperar'>";

	$sql = "SHOW COLUMNS FROM $tabela;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$tabelaDeColunas .= '
			<tr>
				<td>'.$dados[0].'</td>
				<td>'.$dados[1].'</td>
				<td>'.$dados[2].'</td>
				<td>'.$dados[3].'</td>
				<td>'.$dados[4].'</td>
				<td>'.$dados[5].'</td>
				<td>'.$oldColuna.'</td>
				<td>
					<button onclick=\'excluirColuna("'.$dados[0].'")\'>Remover Coluna</button>
				</td>
			</tr>';

		$selectColunas .= "<option value='".$dados[0]."'>".$dados[0]."</option>";

		$oldColuna = $dados[0];
	}
	$tabelaDeColunas .= "</table>";
	$selectColunas .= "</select>";

	echo $tabelaDeColunas . "[,]" . $selectColunas;

	
}




function retornaTabela($pdo){
	$sqlFun = "SHOW TABLES";
	$verifica = $pdo->query($sqlFun);

	$tabelaDeTabelas = "<input list='tabelas' id='tabelasParaColunas' onfocus='this.value = \"\"'>";
	$tabelaDeTabelas .= "<datalist id='tabelas'>";


	$tabelaDeTabelasEstrangeira = "<input list='tabelas' id='tabelasEstrangeira' onfocus='this.value = \"\"'>";

	$tabelaExclusao = "<input list='tabelas' id='selectTabelaExcluir' onfocus='this.value = \"\"'>";
	foreach ($verifica as $dados) {
		$tabelaDeTabelas .= '<option value="'.$dados[0].'">';
	}
	$tabelaDeTabelas .= "</datalist>";

	echo $tabelaDeTabelas . "[,]" . $tabelaExclusao . "[,]" . $tabelaDeTabelasEstrangeira;
}

?>