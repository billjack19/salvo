<?php include("instanciaComponente.php");

	try{
		$chaveNota = $_POST["chaveNota"];
		$chaveNota = $spdNFe->ConsultarNF($chaveNota);
		echo $chaveNota;
	}catch(Exception $e){
		echo $e;
	}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>