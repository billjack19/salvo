<?php


/***********************************************************************************************************/
/* Configuração de Formulas */
/***********************************************************************************************************/
$formulas = "";
$formula_Casos = "";
$formulaBruta = "";
$formulaMondtada = "";

$camposFormula = "";
$ifCamposFormula = "";

$camposParaInteiros = "";
$camposParaDecimal = "";


$nomeFuncao = "";


$numCampos = 0;
$contNumCampos = 0;

$sql = "SELECT * FROM formula;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$camposFormula = "";
	$ifCamposFormula = "";

	$camposParaInteiros = "";
	$camposParaDecimal = "";
	$camposParaData = "";


	$formulaMondtada = "";

	$numCampos = $dados['numero_campos_formula'];
	$numCamposData = $dados['numero_campos_data_formula'];
	$formulaBruta = explode(" ", $dados['formula_formula']);
	$nomeFuncao = $dados['descricao_formula'];






	/******************************************* Números *******************************************/
	if ($numCampos > 1) {
		$camposFormula .= "
	campos = campos.split(\"+\");";

		for ($i=0; $i < $numCampos; $i++) { 
			$camposFormula .= "
	var n$i = document.getElementById(campos[$i]).value;";
		
			$ifCamposFormula .= $i == 0 ? "n$i != \"\"" : " && n$i != \"\"";

			$camposParaInteiros .= "
			n$i = parseInt(n$i);";
			$camposParaDecimal .= "
			n$i = parseFloat(n$i);";
		}
	}
	else if ($numCampos == 1) {
		$camposFormula = "
	var n0 = document.getElementById(campos).value;";

		$ifCamposFormula = "n0 != \"\"";

		$camposParaInteiros = "n0 = parseInt(n0);";
		$camposParaDecimal = "n0 = parseFloat(n0);";
	}







	/******************************************* Datas *******************************************/
	if ($numCamposData > 1) {
		$camposFormula .= "
	camposData = camposData.split(\"+\");";

		for ($i=0; $i < $numCamposData; $i++) { 
			$camposFormula .= "
	var d$i = document.getElementById(camposData[$i]).value;";
		
			$ifCamposFormula .= $ifCamposFormula == "" ? "moment(d$i, 'YYYY-MM-DD').isValid()" : " && moment(d$i, 'YYYY-MM-DD').isValid()";

			$camposParaData .= "

		var ano$i = d$i.split(\"-\")[0];
		ano$i = \"\"+parseInt(ano$i);
		if (ano$i.length != 4) validaData = false;
		d$i = moment(d$i, 'YYYY-MM-DD');";
		}
	}
	else if ($numCamposData == 1) {
		$camposFormula .= "
	var d0 = document.getElementById(camposData).value;";

		$ifCamposFormula .= $ifCamposFormula == "" ? "moment(d0, 'YYYY-MM-DD').isValid()" : " && moment(d0, 'YYYY-MM-DD').isValid()";

		$camposParaData .= "

		var ano0 = d0.split(\"-\")[0];
		ano0 = \"\"+parseInt(ano0);
		if (ano0.length != 4) validaData = false;
		d0 = moment(d0, 'YYYY-MM-DD');";
	}






/******************************************* Formatar Formula *******************************************/
	for ($i=0; $i < sizeof($formulaBruta); $i++) { 
		if ($formulaBruta[$i] == "p") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= "( " . $formulaBruta[$i-1] . " * " . $formulaBruta[$i+1] . " ) / 100";
			$i++;
		}
		else if ($formulaBruta[$i] == "e") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= "Math.pow(".$formulaBruta[$i-1].", ".$formulaBruta[$i+1].")";
			$i++;
		}
		else if ($formulaBruta[$i] == "r") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= "Math.exp(Math.log(".$formulaBruta[$i-1].") / ".$formulaBruta[$i+1].")";
			$i++;
		}
		else if ($formulaBruta[$i] == "d-") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= $formulaBruta[$i-1].".subtract(".$formulaBruta[$i+1].", 'days').format('YYYY-MM-DD')";
			$i++;
		}
		else if ($formulaBruta[$i] == "d+") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= $formulaBruta[$i-1].".add(".$formulaBruta[$i+1].", 'days').format('YYYY-MM-DD')";
			$i++;
		}
		else if ($formulaBruta[$i] == "d<>") {
			$formulaMondtada = substr($formulaMondtada, 0, strlen($formulaMondtada) - 2);
			$formulaMondtada .= $formulaBruta[$i+1].".diff(".$formulaBruta[$i-1].", 'days')";
			$i++;
		}
		else {
			$formulaMondtada .= " ".$formulaBruta[$i];
		}
	}
	$formulaMondtada .= ";";
	
	$formulas .= "

function ".$nomeFuncao."(campos, camposData, tipo) {
	var resultado = \"\";
	var validaData = true;".$camposFormula."

	if ($ifCamposFormula) {";

if ($numCampos > 1) {
	$formulas .= "
		if (tipo == \"i\" || tipo == \"s\") {".$camposParaInteiros."
		}
		else {".$camposParaDecimal."
		}";
}
else if ($numCampos == 1) {
	$formulas .= "
		if (tipo == \"i\" || tipo == \"s\") ".$camposParaInteiros."
		else ".$camposParaDecimal;
}
		
$formulas .= $camposParaData."

		if (validaData){
			resultado = ".$formulaMondtada."
		}
	}
	return resultado;
}";
		
	if ($dados['id_formula'] > 9) {
		$formula_Casos .= "
		case ".$dados['id_formula'].": resultadoLocal = ".$nomeFuncao."(campos, camposData, tipo); break;";
	}
	else {
		$formula_Casos .= "
		case ".$dados['id_formula'].":  resultadoLocal = ".$nomeFuncao."(campos, camposData, tipo); break;";
	}
}










/*************************************************************************************************************/
/* Gerando arquivo calculador */
/*************************************************************************************************************/
$calculadorJS = "
function calculador(op, campos, camposData, resultado, campoAtual, tipo){
	var resultadoLocal = \"\";
	switch(op){".$formula_Casos."
		default: resultadoLocal = \"\";
	}
	document.getElementById(resultado).value = resultadoLocal;
	document.getElementById(resultado).disabled = false;
	document.getElementById(resultado).click();
	document.getElementById(resultado).disabled = true;
	if (campoAtual != \"\") {
		document.getElementById(campoAtual).focus();
	}
}".$formulas;

// echo "calculador.js";
criarArquivo("../../GeradorProjetos/$projetoNome/app/js/calculador.js", $calculadorJS);

?>