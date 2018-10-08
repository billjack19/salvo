<?php

ini_set('max_execution_time', 300);
require_once "../classe/conexao.php";

use Dompdf\Dompdf;
require_once "dompdf/autoload.inc.php";

$conn = new Conexao();
$pdo = $conn->Connect();

function formatarData($data){
	$vetorData = explode("-",$data);
	return $vetorData[2]."/".$vetorData[1]."/".$vetorData[0];
}

$cont = 0;
$cliente = $_POST['cliente'];
$conteudoTable = "";


$nomeEmpresa = "";
$imagemLogo = "";
$RAZAOSOCIAL = "";
$CPF_CGC = "";
$conteudo = "";

$data_atualizacao = "";

$fazenda = "";
$fazendaOld = "";

$safra = "";
$safraOld = "";

$total_kg = 0;
$total_kg_fazenda = 0;
$total_safra = 0;
$total_safra_fazenda = 0;

$total_kg_geral = 0;
$total_safra_geral = 0;

$tabelaHead = "
			<table width='100%' border='0' style='font-size: 12px;'>
				<tr>
					<td><b>Lote</b></td>
					<td><b>Lote Cliente</b></td>
					<td><b>Entrada</b></td>
					<td align='center'><b>N. Fiscal</b></td>
					<td><b>Padrao</b></td>
					<td><b>Preparo</b></td>
					<td><b>KG's</b></td>
					<td><b>Sacas</b></td>
					<td><b>UMI.%</b></td>
					<td><b>IMP.%</b></td>
					<td><b>CAT.%</b></td>
					<td><b>DEF.%</b></td>
					<td><b>Cert</b></td>
				</tr>";
$tabelaBody = "";



$sql ="	SELECT * FROM empresa 
		WHERE bool_ativo_empresa = 1
		ORDER BY id_empresa DESC 
		LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$nomeEmpresa = $dados['descricao_empresa'];
	$imagemLogo = "../admin/app/upload/img/".$dados['imagem_logo_empresa'];
}



$sql = "SELECT CPF_CGC, RAZAOSOCIAL FROM cliefornec WHERE  CODIGO = $cliente";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$RAZAOSOCIAL = $dados['RAZAOSOCIAL'];
	$CPF_CGC = $dados['CPF_CGC'];
}



$sql = "SELECT * FROM posicao_cafe 
		WHERE cliente = $cliente
		ORDER BY fazenda, safra, entrada;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$fazenda = $dados['fazenda'];
	$cidade = $dados['cidade'];
	$insc_est = $dados['insc_est'];
	$safra = $dados['safra'];

	$data_atualizacao = $dados['data_atualizacao'];

	$tabelaBody = "
					<tr>
						<td>".$dados['lote']."</td>
						<td>".$dados['lote_cliente']."</td>
						<td>".formatarData(substr($dados['entrada'], 0, 10))."</td>
						<td align='center'>".$dados['nfe_fiscal']."</td>
						<td>".$dados['padrao']."</td>
						<td>".$dados['preparo']."</td>
						<td align='right'>".number_format($dados['kilos'], 2, ",", ".")."</td>
						<td align='right'>".number_format($dados['sacas'], 2, ",", ".")."</td>
						<td align='center'>".$dados['per_umi']."</td>
						<td align='center'>".$dados['per_imp']."</td>
						<td align='center'>".$dados['per_cat']."</td>
						<td align='center'>".$dados['per_def']."</td>
						<td>".$dados['cert']."</td>
					</tr>";


	if ($cont == 0) {
		$fazendaOld = $dados['fazenda'];
		$safraOld = $dados['safra'];

		$total_kg += $dados['kilos'];
		$total_safra += $dados['sacas'];

		$total_kg_fazenda += $dados['kilos'];
		$total_safra_fazenda += $dados['sacas'];

		$total_kg_geral += $dados['kilos'];
		$total_safra_geral += $dados['sacas'];

		$conteudo .= "
			<b>FAZENDA:</b> $fazenda &nbsp;&nbsp;&nbsp;&nbsp; 
			<b>CIDADE:</b> $cidade &nbsp;&nbsp;&nbsp;&nbsp; 
			<b>INSC.EST.:</b> $insc_est 
			<br>
			<b>Safra:</b> $safra <br>
			$tabelaHead 
			$tabelaBody";
	}
	else if ($fazenda != $fazendaOld) {
		$fazendaOld = $dados['fazenda'];
		$safraOld = $dados['safra'];


		$total_kg = number_format($total_kg, 2, ",", ".");
		$total_safra = number_format($total_safra, 2, ",", ".");

		$total_kg_fazenda = number_format($total_kg_fazenda, 2, ",", ".");
		$total_safra_fazenda = number_format($total_safra_fazenda, 2, ",", ".");

		$conteudo .= "
				<tr style='text-align: right; background-color: #ddd;'>
					<td colspan='6'>
						Total da Safra: 
					</td>
					<td>
						$total_kg
					</td>
					<td>
						$total_safra
					</td>
					<td colspan='5'></td>
				</tr>
				<tr style='text-align: right;background-color: #ddd;'>
					<td colspan='6'>
						Total da Fazenda: 
					</td>
					<td>
						$total_kg_fazenda
					</td>
					<td>
						$total_safra_fazenda
					</td>
					<td colspan='5'></td>
				</tr>
			</table>
			<br><br>
			<b>FAZENDA:</b> $fazenda &nbsp;&nbsp;&nbsp;&nbsp; 
			<b>CIDADE:</b> $cidade &nbsp;&nbsp;&nbsp;&nbsp; 
			<b>INSC.EST.:</b> $insc_est 
			<br>
			<b>Safra:</b> $safra <br>
			$tabelaHead 
			$tabelaBody";

		$total_kg = 0;		$total_kg += $dados['kilos'];
		$total_safra = 0;		$total_safra += $dados['sacas'];

		$total_kg_fazenda = 0;		$total_kg_fazenda += $dados['kilos'];
		$total_safra_fazenda = 0;		$total_safra_fazenda += $dados['sacas'];

		$total_kg_geral += $dados['kilos'];
		$total_safra_geral += $dados['sacas'];
	}
	else if ($safra != $safraOld) {
		$safraOld = $dados['safra'];
		

		$total_kg = number_format($total_kg, 2, ",", ".");
		$total_safra = number_format($total_safra, 2, ",", ".");

		$conteudo .= "
				<tr style='text-align: right;background-color: #ddd;'>
					<td colspan='6'>
						Total da Safra: 
					</td>
					<td>
						$total_kg
					</td>
					<td>
						$total_safra
					</td>
					<td colspan='5'></td>
				</tr>
			</table>
			<br>
			<b>Safra:</b> $safra <br>
			$tabelaHead 
			$tabelaBody";

		$total_kg = 0;			$total_kg += $dados['kilos'];
		$total_safra = 0;		$total_safra += $dados['sacas'];

		$total_kg_fazenda += $dados['kilos'];
		$total_safra_fazenda += $dados['sacas'];

		$total_kg_geral += $dados['kilos'];
		$total_safra_geral += $dados['sacas'];
	}
	else {
		$total_kg += $dados['kilos'];
		$total_safra += $dados['sacas'];

		$total_kg_fazenda += $dados['kilos'];
		$total_safra_fazenda += $dados['sacas'];

		$total_kg_geral += $dados['kilos'];
		$total_safra_geral += $dados['sacas'];

		$conteudo .= " 
			$tabelaBody";
	}
	$cont++;
}


if ($cont == 0) {
	$conteudo = "<h3>Nenhum registro encontrado</h3>";
} else {
	$total_kg = number_format($total_kg, 2, ",", ".");
	$total_safra = number_format($total_safra, 2, ",", ".");

	$total_kg_fazenda = number_format($total_kg_fazenda, 2, ",", ".");
	$total_safra_fazenda = number_format($total_safra_fazenda, 2, ",", ".");

	$total_kg_geral = number_format($total_kg_geral, 2, ",", ".");
	$total_safra_geral = number_format($total_safra_geral, 2, ",", ".");


	$conteudo .= "
				<tr style='text-align: right;background-color: #ddd;'>
					<td colspan='6'>
						Total da Safra: 
					</td>
					<td>
						$total_kg
					</td>
					<td>
						$total_safra
					</td>
					<td colspan='5'></td>
				</tr>
				<tr style='text-align: right;background-color: #ddd;'>
					<td colspan='6'>
						Total da Fazenda: 
					</td>
					<td>
						$total_kg_fazenda
					</td>
					<td>
						$total_safra_fazenda
					</td>
					<td colspan='5'></td>
				</tr>
				<tr style='text-align: right;background-color: #ddd;'>
					<td colspan='6'>
						Total Geral: 
					</td>
					<td>
						$total_kg_geral
					</td>
					<td>
						$total_safra_geral
					</td>
					<td colspan='5'></td>
				</tr>
			</table>";
}

/* <tr><td colspan='13'><br></td></tr> */


date_default_timezone_set("America/Sao_Paulo");

$hoje = date("d/m/Y");
$hora = date("H:i:s");

$data_atualizacao = formatarData(substr($data_atualizacao, 0, 10)).substr($data_atualizacao, 10, strlen($data_atualizacao));

$renderPdf = '
<!DOCTYPE html>
<html>
<head>
	<title>Posição do Café</title>
	<style>
		@page { margin: 160px 50px 50px 50px; }
#header { position: fixed; left: -15px; top: -160px; right: -15px; height: 180px; background-color: fff; text-align: center; }
#footer { position: fixed; left: 0px; bottom: -35px; right: 70px; height: 30px; background-color: #fff; text-align: right; }
#footer .page:after { content: counter(page, decimal); }
	</style>
</head>
<body>
	<div id="header">
		<div style="font-size: 10px; text-align: right; margin-top: 5px;">
			<b>Emitido em: </b>'.$hoje.' '.$hora.' <br>
			<b>Última Atualização: </b>'.$data_atualizacao.'
		</div>
		<div class="imagemLogo">
			<img src="'.$imagemLogo.'" width="100%">
		</div>
		<!--div style="margin-left: 105px;"-->
			<h4>'.$nomeEmpresa.'</h4>
		<!--/div-->
		<b>
			Posição Financeira de Café
		</b>
		<br><br>
		<b>PRODUTOR:</b> '.$RAZAOSOCIAL.'
		&nbsp;&nbsp;&nbsp;&nbsp;
		<b>CPF/CGC:</b> '.$CPF_CGC.'
		<br><br><br>
	</div>

	<div id="footer">
		<span class="page">Pág.: </span>
	</div>


	<div class="" style="width: 100%; margin-left: -25px; margin-right: -25px;">
		'.$conteudo.'
	</div>


	<!--div class="papel text-center">
	</div-->

	<style type="text/css">
		.papel{
			margin-left: -25px;
			/*margin-top: -25px; */
			margin-right: -25px;
			/*margin-bottom: -30px;*/
		}
		.hrPadrao{
			/*border-top: 1px solid #000;*/
			margin-bottom: 1px;
			margin-top: 1px;
		}
		hr.style16 { 
			border-top: 2px dashed #333;
			margin-bottom: 22px;
			margin-top: 15px;
			margin-right: -20px;
			margin-left: -25px;
		}
		.imagemLogo{
			width: 100px;
			position: absolute;
			margin-top: -20px;
			margin-left: -20px;
		}
	</style>
</body>
</html>';



// $myfile = fopen("teste/posicao_cafe.html", "w") or die("Unable to open file!");
// $txt = $renderPdf;
// fwrite($myfile, $txt);
// fclose($myfile);
// return 1;	



$dompdf = new DOMPDF();
$dompdf->load_html($renderPdf);
$dompdf->render();
$dompdf->stream(
	"Posição do Café ".date("d-m-Y")." (".$RAZAOSOCIAL.").pdf",
	array(
		"Attachment" => true
	)
);
?>