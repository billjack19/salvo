<?php include("instanciaComponente.php");

	try{
		$nroRecibo = $_POST["reciboNota"];
		$xml = $spdNFe->ConsultarRecibo($nroRecibo);
		echo $xml;
	}
	catch(Exception $e){
		echo $e;
	}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>