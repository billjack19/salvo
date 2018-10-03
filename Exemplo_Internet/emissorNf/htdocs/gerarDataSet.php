<?php include("instanciaComponente.php");

try{
	$XML = "";
	$spdNFeDataSets->VersaoEsquema = "pl_008i1";	
	$spdNFeDataSets->DicionarioXML = "C:\\Program Files\\EasyPHP-DevServer-14.1VC9\\data\\localweb\\my portable files\\templates\\vm50a\\Conversor\\NFeDataSets.xml";
	
	$spdNFeDataSets->Incluir();
		//Dados da NF-e
		$spdNFeDataSets->SetCampo("versao_A02=3.10");
		$spdNFeDataSets->SetCampo("Id_A03=");
		$spdNFeDataSets->SetCampo("cUf_B02=41");
		$spdNFeDataSets->SetCampo("cNF_B03=004640327");
		$spdNFeDataSets->SetCampo("natOp_B04=VENDA MERC.ADQ.REC.TERC");
		$spdNFeDataSets->SetCampo("indPag_B05=1");
		$spdNFeDataSets->SetCampo("mod_B06=55");
		$spdNFeDataSets->SetCampo("serie_B07=".rand(20000,90000));
		$spdNFeDataSets->SetCampo("nNF_B08=312342");
		$spdNFeDataSets->SetCampo("dhEmi_B09=".$datahora);
		$spdNFeDataSets->SetCampo("dhSaiEnt_B10=".$datahora);
		$spdNFeDataSets->SetCampo("tpNF_B11=1");
		$spdNFeDataSets->SetCampo("idDest_B11a=1");
		$spdNFeDataSets->SetCampo("cMunFG_B12=4115200");
		$spdNFeDataSets->SetCampo("tpImp_B21=1");
		$spdNFeDataSets->SetCampo("tpEmis_B22=1");
		$spdNFeDataSets->SetCampo("cDV_B23=");
		$spdNFeDataSets->SetCampo("tpAmb_B24=2");
		$spdNFeDataSets->SetCampo("finNFe_B25=1");
		$spdNFeDataSets->SetCampo("indFinal_B25a=0");
		$spdNFeDataSets->SetCampo("indPres_B25b=0");
		$spdNFeDataSets->SetCampo("procEmi_B26=0");
		$spdNFeDataSets->SetCampo("verProc_B27=TecnoPHP BHETA");
		
		//Dados do Emitente
		$spdNFeDataSets->SetCampo("CNPJ_C02=08187168000160");
		$spdNFeDataSets->SetCampo("xNome_C03=Exemplo de Razão Social");
		$spdNFeDataSets->SetCampo("xFant_C04=Exemplo de nome fantasia");
		$spdNFeDataSets->SetCampo("xLgr_C06=Exemplo");
		$spdNFeDataSets->SetCampo("nro_C07=123");
		$spdNFeDataSets->SetCampo("xBairro_C09=Bairro de Exemplo");
		$spdNFeDataSets->SetCampo("cMun_C10=4115200");
		$spdNFeDataSets->SetCampo("xMun_C11=Maringa");
		$spdNFeDataSets->SetCampo("UF_C12=PR");
		$spdNFeDataSets->SetCampo("CEP_C13=87500000");
		$spdNFeDataSets->SetCampo("cPais_C14=1058");
		$spdNFeDataSets->SetCampo("xPais_C15=Brasil");
		$spdNFeDataSets->SetCampo("fone_C16=4432222222");
		$spdNFeDataSets->SetCampo("IE_C17=9044016688");
		$spdNFeDataSets->SetCampo("CRT_C21=3");
		
		//Dados do Destinatário
		$spdNFeDataSets->SetCampo("CNPJ_E02=08187168000160");
		$spdNFeDataSets->SetCampo("xNome_E04=NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL");
		$spdNFeDataSets->SetCampo("xLgr_E06=RUA DO CENTRO");
		$spdNFeDataSets->SetCampo("nro_E07=123");
		$spdNFeDataSets->SetCampo("xCpl_E08=TESTE");
		$spdNFeDataSets->SetCampo("xBairro_E09=Centro");
		$spdNFeDataSets->SetCampo("cMun_E10=4115200");
		$spdNFeDataSets->SetCampo("xMun_E11=Teste");
		$spdNFeDataSets->SetCampo("UF_E12=PR");
		$spdNFeDataSets->SetCampo("CEP_E13=87500000");
		$spdNFeDataSets->SetCampo("cPais_E14=1058");
		$spdNFeDataSets->SetCampo("xPais_E15=BRASIL");
		$spdNFeDataSets->SetCampo("fone_E16=445555555");
		$spdNFeDataSets->SetCampo("IndIEDest_E16a=1");
		$spdNFeDataSets->SetCampo("IE_E17=9044016688");
		$spdNFeDataSets->SetCampo("email_E19=alexandre_muzulao@hotmail.com");
		
		//Dados do Itens
		$spdNFeDataSets->IncluirItem();
			$spdNFeDataSets->SetCampo("nItem_H02=1");
			$spdNFeDataSets->SetCampo("xProd_I04=MELAO Saborozinho");
			$spdNFeDataSets->SetCampo("cProd_I02=0999");
			$spdNFeDataSets->SetCampo("cEAN_I03=");
			$spdNFeDataSets->SetCampo("NCM_I05=11081200");
			$spdNFeDataSets->SetCampo("CFOP_I08=51020");
			$spdNFeDataSets->SetCampo("CEST_I05c=");
			$spdNFeDataSets->SetCampo("uCom_I09=AABCC");
			$spdNFeDataSets->SetCampo("qCom_I10=1.00");
			$spdNFeDataSets->SetCampo("vUnCom_I10a=10.0000");
			$spdNFeDataSets->SetCampo("vProd_I11=10.00");
			$spdNFeDataSets->SetCampo("cEANTrib_I12=");
			$spdNFeDataSets->SetCampo("uTrib_I13=AABCC");
			$spdNFeDataSets->SetCampo("qTrib_I14=1");
			$spdNFeDataSets->SetCampo("vUnTrib_I14a=10.00");
			$spdNFeDataSets->SetCampo("indTot_I17b=1");
			$spdNFeDataSets->SetCampo("infAdProd_V01=infAdProd Observações do produto infAdProd");
			
			//Dados dos impostos
			$spdNFeDataSets->SetCampo("orig_N11=0");
			$spdNFeDataSets->SetCampo("CST_N12=00");
			$spdNFeDataSets->SetCampo("modBC_N13=0");
			$spdNFeDataSets->SetCampo("vBC_N15=0.01");
			$spdNFeDataSets->SetCampo("pICMS_N16=7.60");
			$spdNFeDataSets->SetCampo("vICMS_N17=0.01");
			
			$spdNFeDataSets->SetCampo("CST_Q06=01");
			$spdNFeDataSets->SetCampo("vBC_Q07=0.01");
			$spdNFeDataSets->SetCampo("pPIS_Q08=1.65");
			$spdNFeDataSets->SetCampo("vPIS_Q09=0.00");
			
			$spdNFeDataSets->SetCampo("CST_S06=01");
			$spdNFeDataSets->SetCampo("vBC_S07=0.01");
			$spdNFeDataSets->SetCampo("pCOFINS_S08=7.60");
			$spdNFeDataSets->SetCampo("vCOFINS_S11=0.01");
		$spdNFeDataSets->SalvarItem();
		
		$spdNFeDataSets->SetCampo("vBC_W03=0.01");
		$spdNFeDataSets->SetCampo("vICMS_W04=0.01");
		$spdNFeDataSets->SetCampo("vICMSDeson_W04a=0.00");
		$spdNFeDataSets->SetCampo("vBCST_W05=0.00");
		$spdNFeDataSets->SetCampo("vST_W06=0.00");
		$spdNFeDataSets->SetCampo("vProd_W07=10.00");
		$spdNFeDataSets->SetCampo("vFrete_W08=0.00");
		$spdNFeDataSets->SetCampo("vSeg_W09=0.00");
		$spdNFeDataSets->SetCampo("vDesc_W10=0.00");
		$spdNFeDataSets->SetCampo("vII_W11=0.00");
		$spdNFeDataSets->SetCampo("vIPI_W12=0.00");
		$spdNFeDataSets->SetCampo("vPIS_W13=0.00");
		$spdNFeDataSets->SetCampo("vCOFINS_W14=0.01");
		$spdNFeDataSets->SetCampo("vOutro_W15=0.00");
		$spdNFeDataSets->SetCampo("vNF_W16=10.00");
		
		$spdNFeDataSets->SetCampo("modFrete_X02=9");

	$spdNFeDataSets->Salvar();
	$XML = $spdNFeDataSets->LoteNFe;	
	$chave = str_replace("NFe", "", $spdNFeDataSets->GetCampo("id_A03"));	
	$retornos = array('xml' => $XML, "chaveNFe" => $chave);
	
	echo json_encode($retornos);
}
catch(Exception $e){
	echo $e;
}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>