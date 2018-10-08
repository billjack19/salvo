<?php

$nomeTable = $nomeTabela;

$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeNomeCombo = $nomeTabela."ComboGrade";
$nomeFuncoesController = "funcoes_".$nomeTabela."Controller";


$param = "";
$colounaBool = $colunas - 1;
$colunaAtual = 1;
for ($i=0; $i < $colunas; $i++):  $param .= $i == 0 ? "\"".$colunaAtual."\"" : ",\"".$colunaAtual."\""; $colunaAtual++; endfor;



$contrudoCombo = "
function jk_".$nomeTable."DataListGrade(tabela, id_grade) {
	if (id_grade != \"\" && id_grade != 0) {
		jk_comboDataList(
			\"$nomeEntidade\", \"$nomeFuncoesController\", 
			{
				'pequisa_".$nomeTable."_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, \"".$nomeTable."_id\", 
			[ $param ], 
			0, [1], \"\", \"".$nomeTable."Div\", \"\", $colounaBool
		);
	}
	else {
		var campo = \"<input type='text' value='Aguardando seleção...' class='form-control' id='".$nomeTable."_id' disabled>\";
		\$(\"#".$nomeTable."Div\").html(campo);
	}
}

function jk_".$nomeTable."DataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != \"\" && id_grade != 0) {
		jk_comboVlrPreDataList(
			\"$nomeEntidade\", \"$nomeFuncoesController\", 
			{
				'pequisa_".$nomeTable."_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, \"".$nomeTable."_id\", 
			[ $param ], 
			0, [1], \"\", \"".$nomeTable."Div\", \"\", $colounaBool, id, valor
		);
	}
	else {
		var campo = \"<input type='text' value='Aguardando seleção...' class='form-control' id='".$nomeTable."_id' disabled>\";
		\$(\"#".$nomeTable."Div\").html(campo);
	}
}";

// echo criarArquivo("../../GeradorProjetos/$projetoNome/app/js/ajax/$classeName.js", $contrudoAjax);

?>