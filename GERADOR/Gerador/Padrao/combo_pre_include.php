<?php

$nomeTable = $nomeTabela;

$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeNomeCombo = $nomeTabela."ComboPre";
$nomeFuncoesController = "funcoes_".$nomeTabela."Controller";


$param = "";
$colounaBool = $colunas - 1;
$colunaAtual = 1;
for ($i=0; $i < $colunas; $i++):  $param .= $i == 0 ? "\"".$colunaAtual."\"" : ",\"".$colunaAtual."\""; $colunaAtual++; endfor;



$contrudoCombo = "
function combo_$nomeTable(id, value){
	jk_comboVlrPreDataList(
		\"$nomeEntidade\", \"$nomeFuncoesController\", 
		{
			'pequisa_$nomeTable': true
		}, \"".$nomeTable."_id\", 
		[ $param ], 
		0, [1], \"\", \"".$nomeTable."Div\", \"\", $colounaBool, id, value
	);
}

function combo_".$nomeTable."_NV(){
	jk_comboDataList(
		\"$nomeEntidade\", \"$nomeFuncoesController\", 
		{
			'pequisa_$nomeTable': true
		}, \"".$nomeTable."_id\", 
		[ $param ], 
		0, [1], \"\", \"".$nomeTable."Div\", \"\", $colounaBool
	);
}";

// echo criarArquivo("../../GeradorProjetos/$projetoNome/app/js/ajax/$classeName.js", $contrudoAjax);

?>