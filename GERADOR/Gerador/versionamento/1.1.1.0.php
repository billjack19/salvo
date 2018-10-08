<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.1.1
	* Lançada: 25/01/2018

Acrecentou: 
	- campo para nivel de acesso
	- Padrão de Tabelas Exe
		- Incluir Padão de Tabelas numa determinada sequencia ao seu projeto
**/
/*********************************************************************************************************************/


if ($versao == "1") {
	$sql = "ALTER TABLE `usuario`
			ADD COLUMN `nivel_acesso_id` INT NOT NULL DEFAULT '1' 
			AFTER `senha_usuario`;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$versao = "1.1.1";
}

update($versao, $id_projeto, $pdoLocal);

?>