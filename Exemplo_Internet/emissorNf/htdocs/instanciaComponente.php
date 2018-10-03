<?php
$spdNFe = new COM("NFeX.spdNFeX"); //instanciando a NFeX.dll
$spdNFeDataSets = new COM("NFeDataSetX.spdNFeDataSetX");//instanciando a NfeDataSetX.dll
//    $spdNFe->LoadConfig("C:/xampp/htdocs/my portable files/nfeconfig.ini"); //Passando por pasta
	$DirArq = "C:\\xampp\\htdocs\\my portable files";	
	//$spdNFe->CaminhoCertificado = "C:/xampp/htdocs/my portable files/certificado.pfx";
	//$spdNFe->SenhaCertificado = "senha123"
	$spdNFe->NomeCertificado = "CN=TECNOSPEED TECNOLOGIA DE INFORMACAO LTDA:08187168000160, OU=AR CERTIFICADOS PONTO COM, O=ICP-Brasil, C=BR, S=PR, L=MARINGA, E=";
	$spdNFe->UF = "PR";
	$spdNFe->CNPJ = "08187168000160";
	$spdNFe->ArquivoServidoresHom = $DirArq."\\nfeServidoresHom.ini";
	$spdNFe->ArquivoServidoresProd = $DirArq."\\nfeServidoresProd.ini";
	$spdNFe->DiretorioEsquemas  = $DirArq."\\Esquemas";
	$spdNFe->DiretorioTemplates = $DirArq."\\Templates";
	$spdNFe->DiretorioLog = $DirArq."\\Log";	
	$spdNFe->VersaoManual = "5.0a";	
	$spdNFe->ConexaoSegura = 1;
	$spdNFe->TimeOut = 60000;
	$spdNFe->Ambiente = 2;
	$spdNFe->MaxSizeLoteEnvio = 500;
	$spdNFe->DiretorioXmlDestinatario = $DirArq."\\XMLDestinatario";
	$spdNFe->DiretorioLogErro = $DirArq."\\LogErro";
	$spdNFe->DiretorioTemporario = $DirArq."\\Temp";
	$spdNFe->ModoOperacao = "NORMAL";
	$spdNFe->CaracteresRemoverAcentos="áéíóúàèìòùâêîôûäëïöüãõñçÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÄËÏÖÜÃÕÑÇºª&@";

$socket = fsockopen('udp://pool.ntp.br', 123, $err_no, $err_str, 1);
if ($socket)
{
    if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
    {
        stream_set_timeout($socket, 1);
        $unpack0 = unpack("N12", fread($socket, 48));        
    }    
}
$datahora = str_replace("CES","",date('Y-m-d'."T".'h:i:s', $unpack0[7])."-03:00");
$datahora = date("Y-m-d"."T"."h:i:s", strtotime('+2 hour', strtotime($datahora)));
$datahora = str_replace("CES","",$datahora."-03:00");