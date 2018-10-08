<?php

/*********************************************************************************************************************/
/** 											* RESUMO DE VERSÃO * 
	* Versão: 1.3.1.1
	* Lançada: 30/01/2018

Removeu:
	- tabela area_acesso
		estava criando redundância de informação, passa as operações somente para o campo area_nivel_acesso da tabela nivel_acesso

Acrecentou: 
	- Verificação por nível de acesso na área de cadastro de usuário
	- Editar de nível de acesso
	- Caminho da grande até a tabela primaria ou pirncipal
	- Verificação de area de acesso no menu principal
	- Verificação de area de acesso no ajax lista para grade
	- Verificação de area de acesso nas views 
		- Lista, Adicionar e Editar 
		- Tanto em views Primarias / Principais quanto nas views de Grade
	- Criação do Modelo Principal (Pasta)
	- Logica de Negócio (Tabelas Gerador: Formula e Logica_negocio)
	- Logica de Negócio para Data
		- Calculo de diferença entre duas datas e calculo de aumento ou decremento em dias de um data para outra data
	- Verificação dos campos númericos
**/
/*********************************************************************************************************************/


if ($versao == "1.2.1.1") {
	$sql = "DROP TABLE `area_acesso`;";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();


	$versao = "1.3.1.1";
}
update($versao, $id_projeto, $pdoLocal);
?>