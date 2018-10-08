<?php

ini_set('max_execution_time', 300);
date_default_timezone_set("America/Sao_Paulo");


session_start();

$id_projeto = !empty($_POST['projeto_id']) ? $_POST['projeto_id'] : $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


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

$connProjeto = new Conexao();
$connProjeto->set($hostConexao, 'db_host');
$connProjeto->set($userConexao, 'db_usuario');
$connProjeto->set($pwsConexao, 'db_senha');
$connProjeto->set($nameDbConexao, 'db_nome');
$connProjeto->conectar();

$pdoProjeto = $connProjeto->Connect(); 



if (!empty($_POST['criarDiretoriosLocais'])) {
	$pastaDis = "../../".$_POST['pasta']; // Diretorio de destino

	criarDiretorio($pastaDis."/".$projetoNome);
	criarDiretorio($pastaDis."/".$projetoNome."/tabelas");
	// criarDiretorio($pastaDis."/".$projetoNome."/tabelas/estrutura");
	// criarDiretorio($pastaDis."/".$projetoNome."/tabelas/dados");
	// criarDiretorio($pastaDis."/".$projetoNome."/tabelas/chaves");
	criarDiretorio($pastaDis."/".$projetoNome."/upload");

	if (!empty($_POST['pastaUpload'])) {
		copiarPasta("../../GeradorProjetos/".$projetoNome."/app/upload", $pastaDis."/".$projetoNome."/upload");
	}
}


if (!empty($_POST['listarTabelas'])) {
	$cont = 0;
	$sql = "SHOW TABLES";
	$verifica = $pdoProjeto->query($sql);
	foreach ($verifica as $dados) $cont++;
	echo $cont;
}



if (!empty($_POST['backupTabela'])) {
	$tabela = $_POST['tabela'];
	$arrayCampos = array();
	$tabelaObj = new Tabela();
	$descricaoCampos = "(";

	$conteudoEstrutura = "
-- Criar tabela $tabela
-- Gerando em: " . date("d/m/Y H:i:s") . "
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `$tabela`;

CREATE TABLE IF NOT EXISTS `$tabela` (";

	$conteudoDados = "
-- Dados da tabela $tabela
-- Gerando em: " . date("d/m/Y H:i:s") . "
-- Pelo Gerador JK-19

TRUNCATE `$tabela`;

-- Dados da tabela: ";

	$conteudoChave = "
-- Chaves da $tabela
-- Gerando em: " . date("d/m/Y H:i:s") . "
-- Pelo Gerador JK-19
";

	$virgula = "";

	$sql = "DESCRIBE $tabela";
	$verifica = $pdoProjeto->query($sql);
	foreach ($verifica as $dados){
		$descricaoCampos .= $virgula." `" . $dados[0] . "`";

		$tabelaObj = new Tabela();
		$tabelaObj->set($dados[0], "nome");
		$tabelaObj->set(strtoupper(explode("(", $dados[1])[0]), "tipo");
		
		array_push($arrayCampos, $tabelaObj);

		$conteudoEstrutura .= $virgula . "
	`" . $dados[0] . "` " .  													/* Nome do campo */
		$dados[1] . " " . 														/* Tipo do campo */
		($dados[2] == "NO" ? "NOT NULL" : "") . 								/* Se pode ou não ser nulo */
		($dados[3] == "PRI" ? " PRIMARY KEY" : "") . 							/* Se é chave primaria */
		($dados[4] != "" ? " DEFAULT ".$dados[4] : "") . 						/* Complemento do campo */
		($dados[5] == "auto_increment" ? " AUTO_INCREMENT" : " ".$dados[5])."";	/* Complemento do campo */

		$virgula = ",";
	}
	$descricaoCampos .= ")";
	$conteudoEstrutura .= "
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

	$virgula = ""; $isTexto = false; $contRegistro = 0;

	$sql = "SELECT * FROM $tabela";
	$verifica = $pdoProjeto->query($sql);
	foreach ($verifica as $dados){
		$contRegistro++;
		$virgula = ""; $campos = "";

		for ($i=0; $i < sizeof($arrayCampos); $i++) { 
			// echo $arrayCampos[$i]->get("tipo"); 
			if (
				$arrayCampos[$i]->get("tipo") == "INT" 			|| 
				$arrayCampos[$i]->get("tipo") == "TINYINT" 		||
				$arrayCampos[$i]->get("tipo") == "SMALLINT" 	||
				$arrayCampos[$i]->get("tipo") == "MEDIUMINT" 	||
				$arrayCampos[$i]->get("tipo") == "BIGINT" 		||
				$arrayCampos[$i]->get("tipo") == "BIT" 			||
				$arrayCampos[$i]->get("tipo") == "FLOAT" 		|| 
				$arrayCampos[$i]->get("tipo") == "DOUBLE"  		||
				$arrayCampos[$i]->get("tipo") == "DECIMAL"

			)	 $isTexto = false;
			else $isTexto = true;

			$campos .= $virgula." ".($isTexto?"'":"").str_replace("'","\\'",$dados[$arrayCampos[$i]->get("nome")]).($isTexto?"'":"")."";
			$virgula = ",";
		}
		$conteudoDados .= "
INSERT INTO $tabela $descricaoCampos VALUES ($campos);";
	}
	if ($contRegistro == 0) $conteudoDados .= "Nenhum registro";



	$sql = "SELECT
			  KEY_COLUMN_USAGE.constraint_name AS nome_restricao
			, KEY_COLUMN_USAGE.table_name AS tabela_estrangeira
			, KEY_COLUMN_USAGE.column_name  AS coluna_estrangeira
			, KEY_COLUMN_USAGE.referenced_table_name  AS tabela_origem
			, KEY_COLUMN_USAGE.referenced_column_name AS coluna_origem
			, TABLE_CONSTRAINTS.CONSTRAINT_TYPE AS tipo_chave
		FROM information_schema.KEY_COLUMN_USAGE
		INNER JOIN
			information_schema.TABLE_CONSTRAINTS 
			ON KEY_COLUMN_USAGE.CONSTRAINT_SCHEMA = TABLE_CONSTRAINTS.CONSTRAINT_SCHEMA
			AND KEY_COLUMN_USAGE.TABLE_NAME = TABLE_CONSTRAINTS.TABLE_NAME
			AND KEY_COLUMN_USAGE.CONSTRAINT_NAME = TABLE_CONSTRAINTS.CONSTRAINT_NAME
		WHERE KEY_COLUMN_USAGE.CONSTRAINT_SCHEMA = '$nameDbConexao'
		AND KEY_COLUMN_USAGE.TABLE_NAME = '$tabela'
		AND KEY_COLUMN_USAGE.constraint_name <> 'PRIMARY'";
	$verifica = $pdoProjeto->query($sql);
	foreach ($verifica as $dados){
		$nome_restricao = $dados['nome_restricao'];
		$tabela_estrangeira = $dados['tabela_estrangeira'];
		$coluna_estrangeira = $dados['coluna_estrangeira'];
		$tabela_origem = $dados['tabela_origem'];
		$coluna_origem = $dados['coluna_origem'];

		if ($dados['tipo_chave'] == "UNIQUE") {
			$conteudoChave .= "

ALTER TABLE `$tabela_estrangeira`
	ADD UNIQUE INDEX `$nome_restricao` (`$coluna_estrangeira`);";
		} else {
			$conteudoChave .= "

ALTER TABLE `$tabela_estrangeira`
	ADD CONSTRAINT `$nome_restricao` FOREIGN KEY (`$coluna_estrangeira`) REFERENCES `$tabela_origem` (`$coluna_origem`);";
		}
	}

	criarArquivo("../../".$_POST['pasta']."/".$projetoNome."/tabelas/" . $tabela.".sql", $conteudoEstrutura);
	criarArquivo("../../".$_POST['pasta']."/".$projetoNome."/tabelas/" . $tabela."_dados.sql", $conteudoDados);
	criarArquivo("../../".$_POST['pasta']."/".$projetoNome."/tabelas/" . $tabela."_chaves.sql", $conteudoChave);

	$id_tabela = 0;
	$sql = "SELECT id_backup_tabela FROM backup_tabela WHERE projetos_id = $id_projeto AND descricao_tabela = '$tabela'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) $id_tabela = $dados[0];

	$sql = $id_tabela == 0 ? 
			"INSERT INTO backup_tabela (descricao_tabela, projetos_id) VALUES ('$tabela', $id_projeto)" : 
			"UPDATE backup_tabela SET data_atualizacao = NOW() WHERE id_backup_tabela = $id_tabela";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql = "SELECT data_atualizacao FROM backup_tabela WHERE projetos_id = $id_projeto AND descricao_tabela = '$tabela'";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) $id_tabela = $dados[0];

	echo 'Última atualização: '. implode("/", array_reverse(explode("-", substr($id_tabela, 0, 10)))) . substr($id_tabela, 10);
}












if (!empty($_POST['backupGeral'])) {
	$conteudoChave = "";

	$conteudo = "
-- Backup Geral
-- Gerando em: " . date("d/m/Y H:i:s") . "
-- Pelo Gerador JK-19

DROP DATABASE IF EXISTS $nameDbConexao;
CREATE DATABASE $nameDbConexao;
USE $nameDbConexao;
";
	$sql = "SHOW TABLES";
	$verificaTabela = $pdoProjeto->query($sql);
	foreach ($verificaTabela as $dadosTabela){
		$tabela = $dadosTabela[0];
		$arrayCampos = array();
		$tabelaObj = new Tabela();
		$descricaoCampos = "(";
		$conteudo .= "



-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Tabela: $tabela
DROP TABLE IF EXISTS `$tabela`;

CREATE TABLE IF NOT EXISTS `$tabela` (";
		$virgula = "";

		$sql = "DESCRIBE $tabela";
		$verifica = $pdoProjeto->query($sql);
		foreach ($verifica as $dados){
			$descricaoCampos .= $virgula." `" . $dados[0] . "`";

			$tabelaObj = new Tabela();
			$tabelaObj->set($dados[0], "nome");
			$tabelaObj->set(strtoupper(explode("(", $dados[1])[0]), "tipo");
			
			array_push($arrayCampos, $tabelaObj);

			$conteudo .= $virgula . "
	`" . 	$dados[0] . "` " .														/* Nome do campo */
			$dados[1] . " " . 														/* Tipo do campo */
			($dados[2] == "NO" ? "NOT NULL" : "") . 								/* Se pode ou não ser nulo */
			($dados[3] == "PRI" ? " PRIMARY KEY" : "") . 							/* Se é chave primaria */
			($dados[4] != "" ? " DEFAULT ".$dados[4] : "") . 						/* Complemento do campo */
			($dados[5] == "auto_increment" ? " AUTO_INCREMENT" : " ".$dados[5])."";	/* Complemento do campo */

			$virgula = ",";
		}
		$descricaoCampos .= ")";
		$conteudo .= "
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: ";

		$virgula = ""; $isTexto = false; $contRegistro = 0;

		$sql = "SELECT * FROM $tabela";
		$verifica = $pdoProjeto->query($sql);
		foreach ($verifica as $dados){
			$virgula = ""; $campos = "";  $contRegistro++;

			for ($i=0; $i < sizeof($arrayCampos); $i++) { 
				// echo $arrayCampos[$i]->get("tipo"); 
				if (
					$arrayCampos[$i]->get("tipo") == "INT" 			|| 
					$arrayCampos[$i]->get("tipo") == "TINYINT" 		||
					$arrayCampos[$i]->get("tipo") == "SMALLINT" 	||
					$arrayCampos[$i]->get("tipo") == "MEDIUMINT" 	||
					$arrayCampos[$i]->get("tipo") == "BIGINT" 		||
					$arrayCampos[$i]->get("tipo") == "BIT" 			||
					$arrayCampos[$i]->get("tipo") == "FLOAT" 		|| 
					$arrayCampos[$i]->get("tipo") == "DOUBLE"  		||
					$arrayCampos[$i]->get("tipo") == "DECIMAL"

				)	 $isTexto = false;
				else $isTexto = true;

				$campos .= $virgula." ".($isTexto?"'":"").str_replace("'","\\'",$dados[$arrayCampos[$i]->get("nome")]).($isTexto?"'":"")."";
				$virgula = ",";
			}
			$conteudo .= "
INSERT INTO $tabela $descricaoCampos VALUES ($campos);";
		}
		if ($contRegistro == 0) $conteudo .= "Nenhum registro";


		$contChave = 0;
		$conteudoChave .= "




-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
-- Chaves da Tabela: $tabela";

		$sql = "SELECT
				  KEY_COLUMN_USAGE.constraint_name AS nome_restricao
				, KEY_COLUMN_USAGE.table_name AS tabela_estrangeira
				, KEY_COLUMN_USAGE.column_name  AS coluna_estrangeira
				, KEY_COLUMN_USAGE.referenced_table_name  AS tabela_origem
				, KEY_COLUMN_USAGE.referenced_column_name AS coluna_origem
				, TABLE_CONSTRAINTS.CONSTRAINT_TYPE AS tipo_chave
			FROM information_schema.KEY_COLUMN_USAGE
			INNER JOIN
				information_schema.TABLE_CONSTRAINTS 
				ON KEY_COLUMN_USAGE.CONSTRAINT_SCHEMA = TABLE_CONSTRAINTS.CONSTRAINT_SCHEMA
				AND KEY_COLUMN_USAGE.TABLE_NAME = TABLE_CONSTRAINTS.TABLE_NAME
				AND KEY_COLUMN_USAGE.CONSTRAINT_NAME = TABLE_CONSTRAINTS.CONSTRAINT_NAME
			WHERE KEY_COLUMN_USAGE.CONSTRAINT_SCHEMA = '$nameDbConexao'
			AND KEY_COLUMN_USAGE.TABLE_NAME = '$tabela'
			AND KEY_COLUMN_USAGE.constraint_name <> 'PRIMARY'";
		$verifica = $pdoProjeto->query($sql);
		foreach ($verifica as $dados){
			$contChave++;
			$nome_restricao = $dados['nome_restricao'];
			$tabela_estrangeira = $dados['tabela_estrangeira'];
			$coluna_estrangeira = $dados['coluna_estrangeira'];
			$tabela_origem = $dados['tabela_origem'];
			$coluna_origem = $dados['coluna_origem'];

			if ($dados['tipo_chave'] == "UNIQUE") {
				$conteudoChave .= "

ALTER TABLE `$tabela_estrangeira`
	ADD UNIQUE INDEX `$nome_restricao` (`$coluna_estrangeira`);";
			} else {
				$conteudoChave .= "

ALTER TABLE `$tabela_estrangeira`
	ADD CONSTRAINT `$nome_restricao` FOREIGN KEY (`$coluna_estrangeira`) REFERENCES `$tabela_origem` (`$coluna_origem`);";
			}
		}
		if ($contChave == 0) $conteudoChave .= " - Nenhuma chave encontrada";
	}

	$conteudo .= "




-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
-- Chaves de todas as Tabelas $conteudoChave";


	criarArquivo("../../".$_POST['pasta']."/".$projetoNome."/".$projetoNome.".sql", $conteudo);
	// echo 'Arquivo criado: ' . $projetoNome . '.sql';

	$sql = "UPDATE projetos SET backup_geral = NOW() WHERE id_projeto = $id_projeto";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql = "SELECT 
				DATE_FORMAT(STR_TO_DATE(backup_geral, '%Y-%m-%d %H:%i:%s'), 'Última atualização: %d/%m/%Y %H:%i:%s') AS backup_geral
			FROM projetos 
			WHERE id_projeto = $id_projeto
			LIMIT 1;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) echo $dados[0];
}








if (!empty($_POST['ultimaAtulizacao'])) {
	$arrayTabelas = array();
	$tabela = new Tabela();

	$sql = "SELECT 
				DATE_FORMAT(STR_TO_DATE(data_atualizacao, '%Y-%m-%d %H:%i:%s'), 'Última atualização: %d/%m/%Y %H:%i:%s') AS data_atualizacao,
				descricao_tabela 
			FROM 
				backup_tabela 
			WHERE 
				projetos_id = $id_projeto";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$tabela = new Tabela();
		$tabela->set($dados['descricao_tabela'], 'nome');
		$tabela->set($dados["data_atualizacao"], 'data');
		array_push($arrayTabelas, $tabela);
	} 
	echo toJson($arrayTabelas);
}




if (!empty($_POST['importarTabela'])) {
	$tabela = $_POST['tabela'];
	$arquvo = fopen("../../".$_POST['pasta']."/".$projetoNome."/tabelas/".$tabela.".sql", "r") or die("Unable to open file!");
	$sql = fread($arquvo,filesize("../../".$_POST['pasta']."/".$projetoNome."/tabelas/".$tabela.".sql"));
	fclose($arquvo);
	$stmt = $pdoProjeto->prepare($sql);
	echo $stmt->execute();
}


if (!empty($_POST['importarBanco'])) {
	$arquvo = fopen("../../".$_POST['pasta']."/".$projetoNome."/".$projetoNome.".sql", "r") or die("Unable to open file!");
	$sql = fread($arquvo,filesize("../../".$_POST['pasta']."/".$projetoNome."/".$projetoNome.".sql"));
	fclose($arquvo);
	/*
	 *	// Quebrar por tabela
	 *	$sql = explode("CREATE TABLE IF NOT EXISTS ", $sql);
	 *	for ($i=0; $i < sizeof($sql); $i++) { 
	 *		$stmt = $pdoProjeto->prepare( ($i != 0 ? "CREATE TABLE IF NOT EXISTS " : "").$sql[$i]);
	 *		echo $stmt->execute();
	 *	}
	 */
	$stmt = $pdoProjeto->prepare($sql);
	echo $stmt->execute();
}





class Tabela{
	var $nome;
	var $tipo;
	var $data;

	public function get($nome_campo){
		return $this->$nome_campo;
	}

	public function set($valor , $nome_campo){
		$this->$nome_campo = $valor;
	}
}
?>