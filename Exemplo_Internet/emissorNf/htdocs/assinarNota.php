<?php include("instanciaComponente.php");

try{
	$xml = $_POST["xml"];
	$xml = $spdNFe->AssinarNota($xml);
	echo $xml;
}
catch(Exception $e){
	echo $e;
}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>