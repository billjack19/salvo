<?php

// include "../Classe/funcoes.php";


// $nomeTabela, $id_tabela, $colunas, $projetoNome


// $nomeTabela = $_POST['nomeTabela'];
// $id_tabela = $_POST['id_tabela'];
// $colunas = $_POST['colunas'];
// $projetoNome = $_POST['projetoNome'];

$nomeTable = $nomeTabela;
$nomeTableForm = formatarNomeHeadTable2($nomeTable);
$nomeTableFormPM = letraMaiuscula(substr($nomeTable, 0, 1)).substr($nomeTable, 1, strlen($nomeTable));

$variaveisColunas = "";
$paramatroSubVetor = "";
$numColuna = 0;

$nomeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));

$classeNameView = $nomeTable;





$contrudoView = "
<h1>$nomeTableForm</h1>

<div class=\"col-md-4 col-xs-12\">
	<input class=\"form-control\" placeholder=\"Pesquisar...\" aria-describedby=\"basic-addon2\" id=\"pesquisa_$nomeTable\" accesskey=\"b\" onkeyup='buscar_$nomeTable()'>
</div>



<div class=\"col-md-8 col-xs-12 text-right\">
	<a href=\"principal.php#!adicionar_$nomeTable\" name=\"adiconar\" class=\"btn btn-success\" accesskey=\"a\">
		<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Adicionar $nomeTableForm
	</a>
</div>

<br><br>

<div id=\"conteudo$nomeTableFormPM\"></div>

<script type=\"text/javascript\">
	verificaAcess('".$nomeTable."', 'L');
</script>

<script type=\"text/javascript\" src=\"app/js/ajax/ajax_lista_$nomeTable.js\"></script>
";

// echo criarArquivo("../../GeradorProjetos/$projetoNome/app/js/ajax/$classeName.js", $contrudoAjax);

?>