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

$id = $_GET['id'];
$sql = "SELECT 
			mov.cacamba_id,
			mov.valor_total,
			mov.emissao,
			mov.entrega,
			mov.retirada,
			mov.periodo,
			mov.observacao,
			 ca.descricao_cacamba,
			 le.endereco, 
			 le.numero, 
			 le.complemento, 
			 le.bairro, 
			 le.cidade, 
			 le.uf, 
			 le.cep, 
			 le.cliente_id, 
			cli.razao_social, 
			cli.tipo, 
			cli.inscricao_federal,
			cli.telefone,
			cli.endereco AS principal,
			 em.CNPJ AS CNPJ_empresa,
			 em.razao_social AS razao_social_empresa,
			 em.nome_fantasia AS nome_fantasia_empresa,
			 em.endereco AS endereco_empresa,
			 em.numero AS numero_empresa,
			 em.telefone AS telefone_empresa,
			 em.email AS email_empresa,
			 em.imagem AS imagem_empresa

		FROM movimentacao_cacamba mov 
		INNER JOIN cacamba ca ON mov.cacamba_id = ca.id_cacamba
		INNER JOIN local_entrega le ON mov.local_entrega_id = le.id_local_entrega 
		INNER JOIN cliente cli ON le.cliente_id = cli.id_cliente 
		INNER JOIN empresa em ON mov.cnpj_user = em.CNPJ
		WHERE mov.id_movimentacao_cacamba = $id
		AND mov.flag_impressao = 0";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {	
	$cacamba_id = $dados['cacamba_id'];
	$valor_total = $dados['valor_total'];
	$emissao = $dados['emissao'];
	$entrega = $dados['entrega'];
	$retirada = $dados['retirada'];
	$periodo = $dados['periodo'];
	$observacao = $dados['observacao'];

	$descricao_cacamba = $dados['descricao_cacamba'];

	$endereco = $dados['endereco'];
	$numero = $dados['numero'];
	$complemento = $dados['complemento'];
	$bairro = $dados['bairro'];
	$cidade = $dados['cidade'];
	$uf = $dados['uf'];
	$cep = $dados['cep'];
	$cliente_id = $dados['cliente_id'];

	$razao_social = $dados['razao_social'];
	$tipo = $dados['tipo'];
	$inscricao_federal = $dados['inscricao_federal'];
	$telefone = $dados['telefone'];
	$endereco = $dados['endereco'];

	$CNPJ_empresa = $dados['CNPJ_empresa'];
	$razao_social_empresa = $dados['razao_social_empresa'];
	$nome_fantasia_empresa = $dados['nome_fantasia_empresa'];
	$endereco_empresa = $dados['endereco_empresa'];
	$numero_empresa = $dados['numero_empresa'];
	$telefone_empresa = $dados['telefone_empresa'];
	$email_empresa = $dados['email_empresa'] != "" ? ' - '.$dados['email_empresa'] : "";
	$imagem_empresa = $dados['imagem_empresa'];

	$cont++;
}

if ($cont != 0) {
	$sql = "UPDATE movimentacao_cacamba 
			SET flag_impressao = 1
			WHERE id_movimentacao_cacamba = $id";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$descricao = "";
	$descricaoInpotante = "";
	$contInstrucao = 0;

	$sql = "SELECT ordem, descricao FROM instrucao WHERE cnpj_user = $CNPJ_empresa ORDER BY ordem";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$ordem = $dados['ordem'];
		if ($dados['ordem'] == 0) {
			$descricaoInpotante = "	<tr>
										<td>
											<span style=\"font-size: 15px;\">
												<b>Inportante:</b>
											</span>
										</td>
									</tr>
									<tr>
										<td style=\"font-size: 11px;\">
											".$dados['descricao']."
										</td>
									</tr>";
		} else if ($contInstrucao == 0) {
			$descricao .= "	<tr>
								<td><b>Instrução ao Cliente:</b></td>
							</tr>
							<tr>
								<td style=\"font-size: 11px;\">
									<li>".$dados['descricao']."</li>
								</td>
							</tr>";

			$contInstrucao++;
		} else {
			$descricao .= "	<tr>
								<td style=\"font-size: 11px;\">
									<li>".$dados['descricao']."</li>
								</td>
							</tr>";
		}
	}

	// $emissao = formatarData(substr($emissao,0,10)).substr($emissao,10);
	$entrega = formatarData($entrega);
	$retirada = formatarData($retirada);
	$valor_total = "R$ ".number_format($valor_total,2,",",".");

	$conteudo = '
			<table style="width: 100%">
				<tr>
					<td>
						<div style="margin-left: 10%; width: 1000%;">
							<img src="../empresa/'.$imagem_empresa.'" style="max-height: 50px;">
						</div>
					</td>
					<td align="center" style="width: 50%" style="background-color: green;">
						<div class="col-md-12 text-center">
							<h4>'.$nome_fantasia_empresa.'<br>
							'.$telefone_empresa.'
							</h4>
						<div>
					</td>
				</tr>
			</table>
			<table style="width: 100%;">
				<tr>
					<td style="width: 50%;"><b>'.$razao_social_empresa.'</b></td>
					<td align="right">'.$endereco_empresa.', '.$numero_empresa.$email_empresa.'</td>
				</tr>	
			</table>
			<hr class="hrPadrao">
			<table style="width: 100%;">
				<tr style="margin-top: -10px;">
					<td>
						<span style="font-size: 25px;"><b>Pedido Nº '.$id.'</b></span>
					</td>
					<td>
						<span style="font-size: 17px;">Data:<b>&nbsp;&nbsp;'.$emissao.'</b></span>
					</td>
				</tr>
			</table>
			<hr class="hrPadrao">
			<table style="width: 100%; ">
				<tr>
					<td>Cliente:</td> <td><b>'.$cliente_id.' - '.$razao_social.'</b></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Endereço:</td> <td><b>'.$endereco.', '.$numero.'</b></td>
				</tr>
				<tr>
					<td>CNPJ/CPF:</td> <td><b>'.$inscricao_federal.'</b></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Bairro/CEP:</td> <td><b>'.$bairro.' - '.$cep.'</b></td>
				</tr>
				<tr>
					<td>Fone:</td> <td><b>'.$telefone.'</b></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>Cidade/UF:</td> <td><b>'.$cidade.' - '.$uf.'</b></td>
				</tr>
			</table>
			<hr class="hrPadrao">
			<table style="width: 100%;">
				<tr>
					<td><b>Código</b></td>
					<td><b>Descrição</b></td>
					<td><b>Entrega</b></td>
					<td><b>Retirada</b></td>
					<td><b>Locação</b></td>
					<td align="right"><b>Valor</b></td>
				</tr>
				<tr>
					<td align="center"><b>'.$cacamba_id.'</b></td>
					<td><b>'.$descricao_cacamba.'</b></td>
					<td><b>'.$entrega.'</b></td>
					<td><b>'.$retirada.'</b></td>
					<td><b>'.$periodo.' Dias</b></td>
					<td align="right"><b>'.$valor_total.'</b></td>
				</tr>
			</table>
			
			<hr class="hrPadrao">
			<table width="100%">
				<tr>
					<td>Forma de Pagamento:</td>
					<!--td align="right">Total a Receber</td-->
				</tr>
				<!--tr>
					<td colspan="2" align="right"><b>'.$valor_total.'</b></td>
				</tr-->
			</table>
			<hr class="hrPadrao">
			<div class="row">
				<div class="col-xs-6">
					<table>
						'.$descricao.$descricaoInpotante.'
					</table>
				</div>
				<div class="col-xs-6">
					<span style="font-size: 15px;"><b>Endereço de Entrega:</b></span><br>
					<span style="font-size: 15px;">'.$endereco.', '.$numero.'</span><br>
					<span style="font-size: 15px;"><b>Observação:</b></span><br>
					<span style="font-size: 15px;">'.$observacao.'</span>
					<br><br><br>
					<div class="col-xs-9 text-center" style="margin-left: -20px;">
						<hr style="border-top: 1px solid #000;margin-top: 1px;margin-bottom: 1px;margin-right: 10px;">
						Assinatura do Responsável<br><br>
					</div>
				</div>
			</div>';



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
	<div class="papel">
		'.$conteudo.'
		<hr class="style16">
		'.$conteudo.'
	</div>
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