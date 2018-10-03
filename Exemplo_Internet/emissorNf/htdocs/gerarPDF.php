<?php include("instanciaComponente.php");

try{
	$chaveNFe = $_POST["chaveNota"];		
	$spdNFe->ModeloRetrato = "C:\\xampp\\htdocs\\my portable files\\templates\\vm50a\\Danfe\\retrato.rtm";	
	$XML = file_get_contents("C:\\xampp\\htdocs\\my portable files\\XmlDestinatario\\".$chaveNFe."-nfe.xml");	
	$XML = str_replace("\xEF\xBB\xBF","",$XML);
	$spdNFe->ExportarDanfe("00001", $XML, $spdNFe->ModeloRetrato , 1, "C:\\xampp\\htdocs\\my portable files\\PDF\\".$chaveNFe.".PDF");	
}	
catch(Exception $e){
	echo $e;
}

unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>