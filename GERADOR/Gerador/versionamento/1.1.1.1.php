<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.1.1.1
	* Lançada: 26/01/2018

Acrecentou: 
	- adicionado chave de unico no login
	- verificação de campo único
**/
/*********************************************************************************************************************/

if ($versao == "1.1.1") {
	$sql = "ALTER TABLE `usuario`
		ADD UNIQUE INDEX `Login` (`login_usuario`);";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$versao = "1.1.1.1";
}
update($versao, $id_projeto, $pdoLocal);
?>