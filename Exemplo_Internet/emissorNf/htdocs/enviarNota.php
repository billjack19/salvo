<?php include("instanciaComponente.php");

try{
	$xml = $_POST["xmlRet"];	
	$xml = $spdNFe->EnviarNF("0001", $xml, false);
	//$xml = $spdNFe->EnviarNFSincrono("0001", $xml, false);

	$nroRecibo = simplexml_load_string($xml);		
	$nroRec = $nroRecibo->infRec;	
	$retornosEnvio = array('xml' => $xml, "nroRec" => $nroRec);

	echo json_encode($retornosEnvio);
}
catch(Exception $e){
	echo $e;
}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>