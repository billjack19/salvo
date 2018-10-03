<?php include("instanciaComponente.php");
try{	
	/*$XML = file_get_contents("");	
	$XML = str_replace("\xEF\xBB\xBF","",$XML);	*/
	$XML = $_POST["xmlNFe"];	
	$spdNFeDataSets->ConverterXmlParaDataSet($XML,"pl_008i1");
	//informações da NF-e
	$versao_A02    =    $spdNFeDataSets->GetCampo("versao_A02");
	$Id_A03        =	$spdNFeDataSets->GetCampo("Id_A03");
	$cUf_B02       =	$spdNFeDataSets->GetCampo("cUf_B02");
	$cNF_B03       =	$spdNFeDataSets->GetCampo("cNF_B03");
	$natOp_B04     =    $spdNFeDataSets->GetCampo("natOp_B04");
	$indPag_B05    =	$spdNFeDataSets->GetCampo("indPag_B05");	
	$mod_B06       =	$spdNFeDataSets->GetCampo("mod_B06");
	$serie_B07     =    $spdNFeDataSets->GetCampo("serie_B07");	
	$nNF_B08       =    $spdNFeDataSets->GetCampo("nNF_B08");	
	$dhEmi_B09     =	$spdNFeDataSets->GetCampo("dhEmi_B09");
	$dhSaiEnt_B10  =	$spdNFeDataSets->GetCampo("dhSaiEnt_B10");
	$tpNF_B11      =	$spdNFeDataSets->GetCampo("tpNF_B11");
	$idDest_B11a   =	$spdNFeDataSets->GetCampo("idDest_B11a");
	$cMunFG_B12    =	$spdNFeDataSets->GetCampo("cMunFG_B12");
	$tpImp_B21     =	$spdNFeDataSets->GetCampo("tpImp_B21");
	$tpEmis_B22	   =	$spdNFeDataSets->GetCampo("tpEmis_B22");
	$cDV_B23       =	$spdNFeDataSets->GetCampo("cDV_B23");
	$tpAmb_B24     =	$spdNFeDataSets->GetCampo("tpAmb_B24");
	$finNFe_B25    =	$spdNFeDataSets->GetCampo("finNFe_B25");
	$indFinal_B25a =	$spdNFeDataSets->GetCampo("indFinal_B25a");
	$indPres_B25b  =	$spdNFeDataSets->GetCampo("indPres_B25b");
	$procEmi_B26   =	$spdNFeDataSets->GetCampo("procEmi_B26");
	$verProc_B27   =	$spdNFeDataSets->GetCampo("verProc_B27");

	//Informações do Emitente
	$CNPJ_C02 	=  $spdNFeDataSets->GetCampo("CNPJ_C02");
	$xNome_C03 	=  $spdNFeDataSets->GetCampo("xNome_C03");

	//Informações do Destinatário	
	$CNPJ_E02 	=	$spdNFeDataSets->GetCampo("CNPJ_E02");
	$xNome_E04	=	$spdNFeDataSets->GetCampo("xNome_E04");

	//Informações do Item da Nota
	$spdNFeDataSets->FindDataSet("H")->First();
	while(!feof ($spdNFeDataSets->FindDataSet("H")->Eof())){
		$nItem_H02 	=	$spdNFeDataSets->GetCampo("nItem_H02");
		$xProd_I04 	=	$spdNFeDataSets->GetCampo("xProd_I04");
		$vProd_I11	=	$spdNFeDataSets->GetCampo("vProd_I11");
		$CSOSN_N12a	=	$spdNFeDataSets->GetCampo("CSOSN_N12a");
		$spdNFeDataSets->FindDataSet("H")->Next();
	}

	//Informações das duplicatas
	$spdNFeDataSets->FindDataSet("Y")->First();
	while(!feof ($spdNFeDataSets->FindDataSet("Y")->Eof())){
		$nroDup = 	$spdNFeDataSets->GetCampo("nDup_Y08");
		$Venc	=	$spdNFeDataSets->GetCampo("dVenc_Y09");
		$valor 	=	$spdNFeDataSets->GetCampo("vDup_Y10");
		$spdNFeDataSets->FindDataSet("Y")->Next();
	}

	echo "Ambiente: ".$tpAmb_B24." - "."Data e Hora: ".$dhEmi_B09;
}catch(Exception $e){
	echo $e;
}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>