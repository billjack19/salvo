<?php

ini_set('max_execution_time', 300);
require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

function formatarData($data){
	$vetorData = explode("-",$data);
	return $vetorData[2]."/".$vetorData[1]."/".$vetorData[0];
}

use Dompdf\Dompdf;
require_once "dompdf/autoload.inc.php";

$cont = 0;

$ano = $_GET['ano'];
$loteamenato = $_GET['loteamenato'];
$lote = $_GET['lote'];

$sql = "SELECT
	    TIPO,
	    VENCIMENTO,
	    RECEBIMENTO,
	    SEQUENCIA,
	    VALOR,
	    NumLote,
	    Quadra,
	    Nome,
	    CPF_CGC,
	    RAZAOSOCIAL,
	    FILIAL,
	    DocVendaLote,
	    AGRUPADOR,
	    Codigo
	FROM
	    (SELECT
	        1 AS TIPO,
	        cpritens_dup.VENCIMENTO,
	        cpritens_dup.DATA_PAGAMENTO AS RECEBIMENTO,
	        LEFT(cpritens_dup.SEQUENCIA, 5) AS SEQUENCIA,
	        SUM(cpritens_dup.VALOR_DUPLIC + coalesce(cpritens_dup.JUROS, 0) - coalesce(cpritens_dup.DESCONTO, 0)) AS VALOR,
	        TabLoteamentos_Lotes.NumLote,
	        TabLoteamentos_Lotes.Quadra,
	        TabLoteamentos.Nome,
	        CLIEFORNEC.CPF_CGC,
	        CLIEFORNEC.RAZAOSOCIAL,
	        NF_RECEBER.FILIAL,
	        NF_RECEBER.DocVendaLote,
	        CONCAT_WS('', NF_RECEBER.FILIAL, NF_RECEBER.DocVendaLote, CLIEFORNEC.CPF_CGC) AS AGRUPADOR,

	        TabLoteamentos.Codigo
	     FROM
	        cpritens_dup
	     INNER JOIN NF_RECEBER
	     ON cpritens_dup.Filial = NF_RECEBER.FILIAL
	        AND cpritens_dup.SERIE = NF_RECEBER.Serie
	        AND cpritens_dup.DUPLICATA = NF_RECEBER.NotaFiscal
	     INNER JOIN TabLoteamentos
	     ON NF_RECEBER.Loteamento = TabLoteamentos.Codigo
	     INNER JOIN TabLoteamentos_Lotes
	     ON NF_RECEBER.Loteamento = TabLoteamentos_Lotes.Loteamento
	        AND NF_RECEBER.NumLote = TabLoteamentos_Lotes.NumLote
	     INNER JOIN Lanc_VendasLote
	     ON NF_RECEBER.Loteamento = Lanc_VendasLote.Loteamento
	        AND NF_RECEBER.DocVendaLote = Lanc_VendasLote.Documento
	     INNER JOIN (SELECT
	                    Lanc_VendasLote_ClientesAnteriores.FILIAL,
	                    Lanc_VendasLote_ClientesAnteriores.Documento,
	                    Lanc_VendasLote_ClientesAnteriores.Cliente,
	                    Lanc_VendasLote_ClientesAnteriores.Cliente AS ClienteCPR
	                 FROM
	                    Lanc_VendasLote_ClientesAnteriores
	                 UNION
	                 SELECT
	                    Lanc_VendasLote_ClientesAnteriores.FILIAL,
	                    Lanc_VendasLote_ClientesAnteriores.Documento,
	                    Lanc_VendasLote_SociosAnteriores.Socio,
	                    Lanc_VendasLote_SociosAnteriores.Cliente AS ClienteCPR
	                 FROM
	                    Lanc_VendasLote_ClientesAnteriores
	                 INNER JOIN Lanc_VendasLote_SociosAnteriores
	                 ON Lanc_VendasLote_ClientesAnteriores.FILIAL = Lanc_VendasLote_SociosAnteriores.Filial
	                    AND Lanc_VendasLote_ClientesAnteriores.Documento = Lanc_VendasLote_SociosAnteriores.Documento
	                    AND Lanc_VendasLote_ClientesAnteriores.Cliente = Lanc_VendasLote_SociosAnteriores.Cliente
	                ) CLIENTES
	     ON NF_RECEBER.Filial = CLIENTES.Filial
	        AND NF_RECEBER.DocVendaLote = CLIENTES.Documento
	        AND CLIENTES.ClienteCPR = cpritens_dup.Cliente
	     INNER JOIN CLIEFORNEC
	     ON CLIEFORNEC.CODIGO = CLIENTES.Cliente
	     WHERE
	        (cpritens_dup.Loteamento IS NOT NULL)
	        AND (cpritens_dup.SERIE <> 'NCT')
	        AND (cpritens_dup.DATA_PAGAMENTO >= '$ano-01-01') 
	        AND (cpritens_dup.DATA_PAGAMENTO <= '$ano-12-31')
	        AND TabLoteamentos.Codigo = $loteamenato -- SELECIONA NA TELA
	        AND TabLoteamentos_Lotes.NumLote = '$lote' -- SELECIONA NA TELA
	        AND NOT (coalesce(Lanc_VendasLote.FlagDesistencia, 0) = 1 AND cpritens_dup.SERIE <> 'ADT')
	     GROUP BY
	        cpritens_dup.VENCIMENTO,
	        cpritens_dup.DATA_PAGAMENTO,
	        LEFT(cpritens_dup.SEQUENCIA, 5),
	        TabLoteamentos_Lotes.NumLote,
	        TabLoteamentos_Lotes.Quadra,
	        TabLoteamentos.Nome,
	        CLIEFORNEC.CPF_CGC,
	        CLIEFORNEC.RAZAOSOCIAL,
	        NF_RECEBER.FILIAL,
	        NF_RECEBER.DocVendaLote,
	        CONCAT_WS('', NF_RECEBER.FILIAL, NF_RECEBER.DocVendaLote, CLIEFORNEC.CPF_CGC),
	        TabLoteamentos.Codigo
	     UNION ALL
	     SELECT
	        0 AS TIPO,
	        cpritens_dup.VENCIMENTO,
	        cpritens_dup.DATA_PAGAMENTO AS RECEBIMENTO,
	        LEFT(cpritens_dup.SEQUENCIA, 5) AS SEQUENCIA,
	        SUM(cpritens_dup.VALOR_DUPLIC + coalesce(cpritens_dup.JUROS, 0) - coalesce(cpritens_dup.DESCONTO, 0)) AS VALOR,
	        TabLoteamentos_Lotes.NumLote,
	        TabLoteamentos_Lotes.Quadra,
	        TabLoteamentos.Nome,
	        CLIEFORNEC.CPF_CGC,
	        CLIEFORNEC.RAZAOSOCIAL,
	        NF_RECEBER.FILIAL,
	        NF_RECEBER.DocVendaLote,
	        CONCAT_WS(' ',NF_RECEBER.FILIAL, NF_RECEBER.DocVendaLote, CLIEFORNEC.CPF_CGC) AS AGRUPADOR,
	        TabLoteamentos.Codigo
	     FROM
	        cpritens_dup
	     INNER JOIN NF_RECEBER
	     ON cpritens_dup.Filial = NF_RECEBER.FILIAL
	        AND cpritens_dup.SERIE = NF_RECEBER.Serie
	        AND cpritens_dup.DUPLICATA = NF_RECEBER.NotaFiscal
	     INNER JOIN TabLoteamentos
	     ON NF_RECEBER.Loteamento = TabLoteamentos.Codigo
	     INNER JOIN TabLoteamentos_Lotes
	     ON NF_RECEBER.Loteamento = TabLoteamentos_Lotes.Loteamento
	        AND NF_RECEBER.NumLote = TabLoteamentos_Lotes.NumLote
	     INNER JOIN Lanc_VendasLote
	     ON NF_RECEBER.Loteamento = Lanc_VendasLote.Loteamento
	        AND NF_RECEBER.DocVendaLote = Lanc_VendasLote.Documento
	     INNER JOIN (SELECT
	                    Lanc_VendasLote.FILIAL,
	                    Lanc_VendasLote.Documento,
	                    Lanc_VendasLote.Cliente,
	                    Lanc_VendasLote.Cliente AS ClienteCPR
	                 FROM
	                    Lanc_VendasLote
	                 UNION
	                 SELECT
	                    Lanc_VendasLote_Clientes.FILIAL,
	                    Lanc_VendasLote_Clientes.Documento,
	                    Lanc_VendasLote_Clientes.Cliente,
	                    Lanc_VendasLote.Cliente AS ClienteCPR
	                 FROM
	                    Lanc_VendasLote
	                 INNER JOIN Lanc_VendasLote_Clientes
	                 ON Lanc_VendasLote_Clientes.FILIAL = Lanc_VendasLote.Filial
	                    AND Lanc_VendasLote_Clientes.Documento = Lanc_VendasLote.Documento
	                ) CLIENTES
	     ON NF_RECEBER.Filial = CLIENTES.Filial
	        AND NF_RECEBER.DocVendaLote = CLIENTES.Documento
	        AND CLIENTES.ClienteCPR = cpritens_dup.Cliente
	     INNER JOIN CLIEFORNEC
	     ON CLIEFORNEC.CODIGO = CLIENTES.Cliente
	     WHERE
	        (cpritens_dup.Loteamento IS NOT NULL)
	        AND (cpritens_dup.SERIE <> 'NCT')
	        AND (cpritens_dup.DATA_PAGAMENTO >= '$ano-01-01') -- DE ACORDO COM O ANO SELECIONADO
	        AND (cpritens_dup.DATA_PAGAMENTO <= '$ano-12-31') -- DE ACORDO COM O ANO SELECIONADO
	        AND TabLoteamentos.Codigo = $loteamenato -- SELECIONA NA TELA
	        AND TabLoteamentos_Lotes.NumLote = '$lote' -- SELECIONA NA TELA
	        AND NOT (coalesce(Lanc_VendasLote.FlagDesistencia, 0) = 1 AND cpritens_dup.SERIE <> 'ADT')
	     GROUP BY
	        cpritens_dup.VENCIMENTO,
	        cpritens_dup.DATA_PAGAMENTO,
	        LEFT(cpritens_dup.SEQUENCIA, 5),
	        TabLoteamentos_Lotes.NumLote,
	        TabLoteamentos_Lotes.Quadra,
	        TabLoteamentos.Nome,
	        CLIEFORNEC.CPF_CGC,
	        CLIEFORNEC.RAZAOSOCIAL,
	        NF_RECEBER.FILIAL,
	        NF_RECEBER.DocVendaLote,
	        CONCAT_WS(' ', NF_RECEBER.FILIAL, NF_RECEBER.DocVendaLote, CLIEFORNEC.CPF_CGC),
	        TabLoteamentos.Codigo
	    ) DADOS
	ORDER BY
	    Codigo,
	    NumLote,
	    RAZAOSOCIAL,
	    SEQUENCIA;";



$conteudoTable = "";
$valor_total = 0;

$TIPO = "";
$VENCIMENTO = "";
$RECEBIMENTO = "";
$SEQUENCIA = "";
$VALOR = "";
$NumLote = "";
$Quadra = "";
$Nome = "";
$CPF_CGC = "";
$RAZAOSOCIAL = "";
$FILIAL = "";
$DocVendaLote = "";
$AGRUPADOR = "";
$Codigo = "";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {	

	$TIPO = $dados['TIPO'];
	$VENCIMENTO = $dados['VENCIMENTO'];
	$RECEBIMENTO = $dados['RECEBIMENTO'];
	$SEQUENCIA = $dados['SEQUENCIA'];
	$VALOR = $dados['VALOR'];
	$NumLote = $dados['NumLote'];
	$Quadra = $dados['Quadra'];
	$Nome = $dados['Nome'];
	$CPF_CGC = $dados['CPF_CGC'];
	$RAZAOSOCIAL = $dados['RAZAOSOCIAL'];
	$FILIAL = $dados['FILIAL'];
	$DocVendaLote = $dados['DocVendaLote'];
	$AGRUPADOR = $dados['AGRUPADOR'];
	$Codigo = $dados['Codigo'];

	$valor_total += $VALOR;

	$VENCIMENTO = formatarData(substr($VENCIMENTO, 0, 10));
	$RECEBIMENTO = formatarData(substr($RECEBIMENTO, 0, 10));

	$VALOR = $VALOR < 0 ? "- R$ ".number_format($VALOR * (-1), 2, ",", ".") : "R$ ".number_format($VALOR, 2, ",", ".");

	$conteudoTable .= "<tr>";
	$conteudoTable .= "	<td>$VENCIMENTO</td>";
	$conteudoTable .= "	<td>$RECEBIMENTO</td>";
	$conteudoTable .= "	<td>$SEQUENCIA</td>";
	$conteudoTable .= "	<td align='right'>$VALOR</td>";
	$conteudoTable .= "</tr>";

	$cont++;
}


$valor_total = "R$ ".number_format($valor_total, 2, ",", ".");

// $conteudoTable
// $ano
// $valor_total
// $Quadra
// $loteamenato
// $NumLote

if ($cont != 0) {


	$dompdf = new DOMPDF();
	$dompdf->load_html('

<!DOCTYPE html>
<html>
<head>
	<link rel=\'shortcut icon\' href="../img/cacamba_verde.png" />
	<title>Comprovate de Locação</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<!--link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.min.css"--> 
</head>
<body>
	<center>
	<div class="papel">


		<table>
			<tr>
				<td>Vencimento</td>
				<td>Recebimento</td>
				<td>Parcela</td>
				<td>Valor</td>
			</tr>
			
		</table>
		<h3>VALOR PAGO EM  -  (listados acima)</h3>
		<h3>LOTE  QUADRA  do </h3>

		
	</div>
	</center>
<style type="text/css">
	.papel{
		margin-left: -25px;
		margin-top: -25px; 
		margin-right: -25px;
		margin-bottom: -25px;
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
</style>
</body>
</html>
		');
	$dompdf->render();
	$dompdf->stream(
		"comprovate_".$id.".pdf",
		array(
			"Attachment" => false
		)
	);
	

} else {
	echo "
	<?xml version=\"1.0\" encoding=\"UTF-8\"?>
	<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
	  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
	<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pt-br\" xml:lang=\"pt-br\">
	<head>
	<title>Objeto n&atilde;o encontrado!</title>
	<link rev=\"made\" href=\"mailto:postmaster@localhost\" />
	<style type=\"text/css\"><!--/*--><![CDATA[/*><!--*/ 
	    body { color: #000000; background-color: #FFFFFF; }
	    a:link { color: #0000CC; }
	    p, address {margin-left: 3em;}
	    span {font-size: smaller;}
	/*]]>*/--></style>
	</head>
	<body>
	<h1>Objeto n&atilde;o encontrado!</h1>
	<p>
	    A URL requisitada n&atilde;o foi encontrada neste servidor.
	    Se voc&ecirc; digitou o endere&ccedil;o (URL) manualmente,
	    por favor verifique novamente a sintaxe do endere&ccedil;o.
	</p>
	<p>
	Se voc&ecirc; acredita ter encontrado um problema no servidor,
	por favor entre em contato com o 
	<a href=\"mailto:postmaster@localhost\">webmaster</a>.

	</p>

	<h2>Error 404</h2>
	<address>
	  <a href=\"/\">localhost</a><br />
	  <span>Apache/2.4.18 (Win32) OpenSSL/1.0.2e PHP/7.0.5</span>
	</address>
	</body>
	</html>";
}


?>