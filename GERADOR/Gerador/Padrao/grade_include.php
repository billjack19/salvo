<?php

$nomeArquivos = "";
$contArq = 0;
$nomeTable = $nomeTabela;
$arrayTabelaGrade = [];

for ($i=0; $i < sizeof($camposGrade); $i++) { 
	$arrayTabelaGrade = explode(",", $camposGrade[$i]);

	if ( sizeof($arrayTabelaGrade) > 1 && $arrayTabelaGrade[1] == $nomeTable ) {
		$contArq++;

		$nomeTableForm = formatarNomeHeadTable2($nomeTable);
		$nomeTableFormPM = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));

		$variaveisColunas = "";
		$paramatroSubVetor = "";
		$numColuna = 0;

		$nomeEntidadePrimaria = letraMaiuscula(
									substr($arrayTabelaGrade[0], 0, 1)).substr($arrayTabelaGrade[0], 1, 
									strlen($arrayTabelaGrade[0])
								);

		$classeNameView = "grade_".$nomeTable."-".$arrayTabelaGrade[0];


		$contrudoView = "
<h1>$nomeTableForm</h1>
<h3 style='display: none'>".formatarNomeHeadTable2($arrayTabelaGrade[0]).": <span id=\"nome$nomeEntidadePrimaria\"></span></h3>

<span id=\"botaoVoltarGrade\"></span>
<div class=\"col-md-4 col-xs-12\">
	<input class=\"form-control\" placeholder=\"Pesquisar...\" aria-describedby=\"basic-addon2\" id=\"pesquisa_$nomeTable\" accesskey=\"b\" onkeyup='buscar_$nomeTable()'>
</div>


<div class=\"col-md-8 col-xs-12 text-right\">
	<!-- &nbsp; -->
	<a href=\"principal.php#!adicionar_grade_".$nomeTable."-".$arrayTabelaGrade[0]."\" class=\"btn btn-success\" name=\"adiconar\" accesskey=\"a\">
		<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Adicionar $nomeTableForm
	</a>
</div>

<br><br>

<script type=\"text/javascript\">
	// console.log('".$nomeTable."-".$arrayTabelaGrade[0]."');
	verificaAcess('".$nomeTable."-".$arrayTabelaGrade[0]."', 'L');
</script>

<div id=\"conteudo$nomeTableFormPM\"></div>

<script type=\"text/javascript\" src=\"app/js/ajax/ajax_grade_$nomeTable-".$arrayTabelaGrade[0].".js\"></script>
";

		criarArquivo("../GeradorProjetos/$projetoNome/app/views/$classeNameView.htm", $contrudoView);
		$nomeArquivos .= $contArq == 1 ? $classeNameView : "+".$classeNameView;
	}
}

?>