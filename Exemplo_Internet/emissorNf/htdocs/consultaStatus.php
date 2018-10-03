<?php include("instanciaComponente.php");

try{	
	echo $spdNFe->StatusDoServico();
}
catch(Exception $e){
	echo $e;	
}

unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>