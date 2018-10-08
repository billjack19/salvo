<?php

ini_set('max_execution_time', 5000);

/** Atualização de projetos */

/*********************************************************************************************************************/

/** 	Este arquivo serve para atualizar versão do projeto gerado pelo gerador no banco de dados */
/** 	A sua importancia é de manter a introzação entre futuras implementações na forma de desenvolvimento de outros 
/* projetos */
/** Criado no dia 25-01-2018 */

/*

Representação da posição dos númweros referente a versão

	(Padrão)    (Tabela)    (Coluna)    (Chave)
	   |           |           |           |
	  \ /         \ /         \ /         \ /
	   N     .     N     .     N     .     N
*/

/*********************************************************************************************************************/

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdoLocal = $conn->Connect();

$id_projeto = $_POST['id_projeto'];



$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdoLocal->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
	$versao = $dados['versao'];
}


include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect();

/*********************************************************************************************************************/
/** 										* RESUMO DA PRIMEIRA VERSÃO  * 
	* Ínico do projeto GERADOR JK-19: 29/11/2017

Esta Aplicação possui: 
	- login
	- cadastro simpleS
	- cadastro em grade
	- opção de upload de arquivos
	- movimentação de arquivos de imagem
	- consulta a latitude e longitude por meio do endereço
	- relatorio personalizado pelo cliente de maneira limitada
		- cadastro
		- exclusão
		- filtro por cadastro ativo
		- filtro por campo de data da propria tabela (se tiver)
		- filtro por tabela(s) relacionada(s) / coluna / valor especifico de busca
			- aplicacao permite colocar quantos campos quiser de filtro porem tem o limite do campo na tabela
	- perfil
		- mudar nome
		- trocar senha
**/
/*********************************************************************************************************************/

include "1.1.1.0.php";
include "1.1.1.1.php";
include "1.2.1.1.php";
include "1.3.1.1.php";
include "1.4.1.1.php";
include "1.5.1.1.php";

/*
	OBSERVAÇÃO: na proxima verssão sera os numeros para tráz
	por exemplo

	1.2.1.1 	- supor que atualizaou uma tabela nova
	   |
	  \_/
	1.3.0.0 	- zera os numeros para tráz do numero significativo da tabela

	Regra valendo aprtir do dia 02/08/2018
*/


// Atualização...
function update ($versao, $id_projeto, $pdoLocal) {
	$sql = "UPDATE projetos SET versao = '$versao' WHERE id_projeto = $id_projeto";
	$stmt = $pdoLocal->prepare($sql);
	$stmt->execute();
}

echo "Versão atual: $versao";
?>
