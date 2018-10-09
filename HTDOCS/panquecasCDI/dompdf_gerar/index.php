<?php


$_REQUEST["id_lanc_item"];
$_REQUEST["texto"];
$_REQUEST["qtd"];


use Dompdf\Dompdf;
require_once "dompdf/autoload.inc.php";

$html = '

<!DOCTYPE html>
<html>
<head>
	<title>Pedido a ser imprimido</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
	<h1>
		<b>Pedido: '.$_REQUEST["id_lanc_item"].'</b><br>
		<b>'.$_REQUEST["qtd"]." </b>".$_REQUEST["texto"].'
	</h1>
</body>
</html>
		';


$arquivo = "../pedidos/".$_REQUEST["id_lanc_item"].".pdf";
if (!unlink($arquivo)){ /* echo ("Erro ao deletar $arquivo"); */ }
else { /* echo ("Deletado $arquivo com sucesso!"); */ }

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$pdf = $dompdf->output();
$file_location = "../pedidos/".$_REQUEST["id_lanc_item"].".pdf";
file_put_contents($file_location,$pdf);
 




echo "1";

?>