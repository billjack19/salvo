<?php include("instanciaComponente.php");

try{

  $xml = $_POST["xmlNFe"];  
  $spdNFe->AuditorExibirRegrasValidacao = true;
  $spdNFe->AuditorCodigoProduto = 1;
  $spdNFe->AuditorModoOperacao = 1;
  $spdNFe->AuditorEstagio = 0;
  $spdNFe->AuditorTipoResposta = 0;  
  $spdNFe->AuditorDiretorioEsquemas = "C:\\xampp\\htdocs\\my portable files\\Esquemas\\Auditor";
  $spdNFe->AuditorDiretorioTemplates = "C:\\xampp\\htdocs\\my portable files\\templates\\Auditor";
  $spdNFe->AuditorDiretorioRegras = "C:\\xampp\\htdocs\\my portable files\\templates\\Auditor\\Regras";  

  $xmlResposta = $spdNFe->AuditorValidarXml($xml, "|");
  
  echo $xmlResposta;

}catch(Exception $e){
	echo $e;
}
?>