<?php include("instanciaComponente.php");

try{
	$nomeCertificado = $_POST["nomeCertificado"];	
}
catch(Exception $e){
	$nomeCertificado = "CN=TECNOSPEED TECNOLOGIA DE INFORMACAO LTDA:08187168000160, OU=AR CERTIFICADOS PONTO COM, O=ICP-Brasil, C=BR, S=PR, L=MARINGA, E=";		
}
$spdNFe->NomeCertificado = $nomeCertificado;

try{
	$conteudoINI = $_POST["conteudoINI"];
	$arquivo = fopen("C:/xampp/htdocs/my portable files/nfeconfig.ini","w+");
	$escrever = fwrite($arquivo, $conteudoINI);
	fclose($arquivo);

	echo $nomeCertificado;
}catch(Exception $ex){
	echo $e;	
}
?>