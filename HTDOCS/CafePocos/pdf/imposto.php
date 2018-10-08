<?php

ini_set('max_execution_time', 300);
require_once "../class/conexao.php";

use Dompdf\Dompdf;
require_once "dompdf/autoload.inc.php";


$conn = new Conexao();
$pdo = $conn->Connect();

function formatarData($data){
	$vetorData = explode("-",$data);
	return $vetorData[2]."/".$vetorData[1]."/".$vetorData[0];
}

$cont = 0;



$ano = $_POST['ano'];
$loteamento = $_POST['loteamento'];
$lote = $_POST['numLote'];
$Nome = $_POST['loteamentoNome'];
$cpfCliente = $_POST['cpfCliente'];


$NumLote = $lote;
$NumLoteFormat = str_replace("/", "-", $NumLote);

$sql = "SELECT
    COUNT(DISTINCT cliefornec.codigo) AS SOCIOS
FROM
    cpritens_dup
INNER JOIN nf_receber
ON  cpritens_dup.filial = nf_receber.filial
    AND cpritens_dup.serie = nf_receber.serie
    AND cpritens_dup.duplicata = nf_receber.notafiscal
INNER JOIN tabloteamentos
ON  nf_receber.loteamento = tabloteamentos.codigo
INNER JOIN tabloteamentos_lotes
ON  nf_receber.loteamento = tabloteamentos_lotes.loteamento
    AND nf_receber.numlote = tabloteamentos_lotes.numlote
INNER JOIN (SELECT
                lanc_vendaslote.filial,
                lanc_vendaslote.documento,
                lanc_vendaslote.cliente,
                lanc_vendaslote.cliente AS clientecpr
            FROM
                lanc_vendaslote
            UNION
            SELECT
                lanc_vendaslote_clientes.filial,
                lanc_vendaslote_clientes.documento,
                lanc_vendaslote_clientes.cliente,
                lanc_vendaslote.cliente AS clientecpr
            FROM
                lanc_vendaslote
            INNER JOIN lanc_vendaslote_clientes
            ON  lanc_vendaslote_clientes.filial = lanc_vendaslote.filial
                AND lanc_vendaslote_clientes.documento = lanc_vendaslote.documento
           ) clientes
ON  nf_receber.filial = clientes.filial
    AND nf_receber.docvendalote = clientes.documento
    AND clientes.clientecpr = cpritens_dup.cliente
INNER JOIN cliefornec
ON  cliefornec.codigo = clientes.cliente
WHERE
    (cpritens_dup.loteamento IS NOT NULL)
    AND (cpritens_dup.serie <> 'nct')
    AND (cpritens_dup.DATA_PAGAMENTO >= '$ano-01-01') 
    AND (cpritens_dup.DATA_PAGAMENTO <= '$ano-12-31')
    AND TabLoteamentos.Codigo = $loteamento -- SELECIONA NA TELA
    AND TabLoteamentos_Lotes.NumLote = '$lote' -- SELECIONA NA TELA
";

$qtdSOCIOS = 1;
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$qtdSOCIOS = $dados['SOCIOS'];
}


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
	        AND TabLoteamentos.Codigo = $loteamento -- SELECIONA NA TELA
	        AND TabLoteamentos_Lotes.NumLote = '$lote' -- SELECIONA NA TELA
	        AND CLIEFORNEC.CPF_CGC = '$cpfCliente'
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
	        AND TabLoteamentos.Codigo = $loteamento -- SELECIONA NA TELA
	        AND TabLoteamentos_Lotes.NumLote = '$lote' -- SELECIONA NA TELA
	        AND CLIEFORNEC.CPF_CGC = '$cpfCliente'
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
$Quadra = "";
$CPF_CGC = "";
$RAZAOSOCIAL = "";
$FILIAL = "";
$DocVendaLote = "";
$AGRUPADOR = "";
$Codigo = "";


$conteudoTable .= "<table width=\"75%\" style=\"margin-left: 120px;\">";
$conteudoTable .= "	<tr>";
$conteudoTable .= "		<td align=\"left\"><b>Vencimento</b></td>";
$conteudoTable .= "		<td align=\"left\"><b>Recebimento</b></td>";
$conteudoTable .= "		<td align=\"left\"><b>Parcela</b></td>";
$conteudoTable .= "		<td align=\"right\"><b>Valor</b></td>";
$conteudoTable .= "	</tr>";



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



$FONE = "";
$EmpresaLoteamento = "";
$IR_CNPJ_EMPRESA = "";
$IR_PRAZO_ESCLARECIMENTOS = "";

$sql = "SELECT 
			site.FONE, 
			tabloteamentos.EmpresaLoteamento, 
			tabloteamentos.IR_CNPJ_EMPRESA,
			tabloteamentos.IR_PRAZO_ESCLARECIMENTOS
		FROM tabloteamentos tabloteamentos
		INNER JOIN site site ON 1 = 1
		WHERE tabloteamentos.Codigo = $loteamento;
			";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) { 
	$FONE_SITE = $dados['FONE'];
	$EmpresaLoteamento = $dados['EmpresaLoteamento'];
	$IR_CNPJ_EMPRESA = $dados['IR_CNPJ_EMPRESA'];
	$IR_PRAZO_ESCLARECIMENTOS = $dados['IR_PRAZO_ESCLARECIMENTOS'];
}

$IR_PRAZO_ESCLARECIMENTOS = formatarData(substr($IR_PRAZO_ESCLARECIMENTOS, 0, 10));

$conteudoTable .= "</table>";

$textConfiPosVlr =  $qtdSOCIOS > 1 ? "referente ao sócio comprador acima" : "listados acima";


$valor_total = $valor_total / $qtdSOCIOS;
$valor_total = "R$ ".number_format($valor_total, 2, ",", ".").' ('.$textConfiPosVlr.')';

if ($cont == 0) {
	$conteudoTable = "<br><br>Nenhum Registro Encontrado!<br><br>";
	$Quadra = "(Sem registro)";
	$CPF_CGC = "(Sem registro)";
	$RAZAOSOCIAL = "(Sem registro)";
	$valor_total = "NULO";
}

date_default_timezone_set("America/Sao_Paulo");

$hoje = date("d/m/Y");
$hora = date("h:i:sa");

$arrayHoje = explode("/", $hoje);
$dia = $arrayHoje[0];
$mes = $arrayHoje[1];
$anoAtual = $arrayHoje[2];

switch ($mes) {
	case 1:  $mes = "Janeiro";		break;
	case 2:  $mes = "Fevereiro";	break;
	case 3:  $mes = "Março";		break;
	case 4:  $mes = "Abriu";		break;
	case 5:  $mes = "Maio";			break;
	case 6:  $mes = "Junho";		break;
	case 7:  $mes = "Julho";		break;
	case 8:  $mes = "Agosto";		break;
	case 9:  $mes = "Setembro";		break;
	case 10: $mes = "Outubro";		break;
	case 11: $mes = "Novembro";		break;
	case 12: $mes = "Dezembro";		break;
	default: $mes = $mes;			break;
}


	

	$dompdf = new DOMPDF();
	$dompdf->load_html('
<!DOCTYPE html>
<html>
<head>
	<link rel=\'shortcut icon\' href="../img/cacamba_verde.png" />
	<title>Comprovate de Locação</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
	<div style="position: absolute; margin-left: 590px; margin-right: -20px; margin-top: -25px; font-size: 9px;">
		<b>Emitido em: </b>'.$hoje.' '.$hora.'
	</div>
	<center>
	<div class="papel text-center">
		<b>Demostrativo de Imposto de Renda</b>
		<br>
		<b>
			'.$Nome.' [Lote '.$NumLote.' Quadra '.$Quadra.']
		</b>
		<hr class="hrPadrao">
		Prezado(a) Senhor(a)
		<br>
		NOME DO COMPRADOR(A): '.$RAZAOSOCIAL.'
		<br>
		CPF: '.$CPF_CGC.'
		<br><br>
		Para efeitos de sua Declaração de Imposto de Renda - Pessoa Física, Informamos abaixo o valor pago pelo(a) Senhor(a) durante o ano base de '.$ano.', relativo ao somatório das parcelas do lote comprado.
		<br><br>
		<div style="border-style: solid;">
			<b>DOCUMENTOS RECEBIDOS</b>
		</div>
		'.$conteudoTable.'
		<br>
		VALOR PAGO EM '.$ano.' - '.$valor_total.'
		<br>
		LOTE '.$NumLote.' QUADRA '.$Quadra.' do '.$Nome.'

		<br><br>
		Para qualquer esclarecimento, ligue '.$FONE_SITE.' (Marilza) até o dia '.$IR_PRAZO_ESCLARECIMENTOS.'
		<br><br><br><br><br><br><br><br><br>
		<table width="100%">
			<tr>
				<td align="center" width="40%">
					_____________________________________________________
					<br>'.$Nome.'
					<br>'.$EmpresaLoteamento.'
					<br>CNPJ: '.$IR_CNPJ_EMPRESA.'
				</td>
				<td align="center" width="50%">
					Poços de Caldas, '.$dia.' de '.$mes.' de '.$anoAtual.'
					<br><br><br><br><br><br><br><br><br><br><br>
				</td>
			</tr>
		</table>

	</div>
	</center>
	<style type="text/css">
		.papel{
			margin-left: -25px;
			margin-top: -25px; 
			margin-right: -25px;
			margin-bottom: -30px;
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
		"Demostrativo de Imposto de Renda $ano - $Nome Lote $$NumLoteFormat Quadra $Quadra.pdf",
		array(
			"Attachment" => true
		)
	);

// header("Location: ../consultaDuplicata.php");
?>