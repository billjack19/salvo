<?php


/*

POST:
	- codigo_empresa
	- filial
	- documento
	- email
	- RAZAOSOCIAL

*/


session_start();

/***************************************************************************************************************************/
/* Iniciando conexão com o banco de dados */
/***************************************************************************************************************************/
require_once "../classe/conexao.php";
require_once "../classe/conexaoExe.php";

/* Entidades */
require_once "../classe/entidade/Filial.php";
require_once "../classe/entidade/Lanc_marketing.php";
require_once "../classe/entidade/Item.php";
require_once "../classe/entidade/Lanc_marketing_itens.php";

$conn = new ConexaoExe();
$connCDI = new Conexao();

if(
	   !empty($_SESSION['WEB_BANCO_DADOS']	)
	&& !empty($_SESSION['WEB_USUARIO_BD']	)
	&& !empty($_SESSION['WEB_SENHA_BD']		)
	&& !empty($_SESSION['WEB_NOME_BD']		)
){
	$conn->set( $_SESSION['WEB_BANCO_DADOS'] , 	'db_host'		);
	$conn->set( $_SESSION['WEB_USUARIO_BD']	 , 	'db_usuario'	);
	$conn->set( $_SESSION['WEB_SENHA_BD']	 , 	'db_senha'		);
	$conn->set( $_SESSION['WEB_NOME_BD']	 , 	'db_nome'		);
	$conn->conectar();
	$pdo = $conn->Connect(); 
} else {
	$validador = 0;
	$codigo_empresa = $_POST['codigo_empresa'];

	$sql = "SELECT * FROM cliefornec WHERE CODIGO = $codigo_empresa";
	$pdoCDI = $connCDI->Connect();

	$verifica = $pdoCDI->query($sql);
	foreach ($verifica as $dados) {
		$validador++;
		$conn->set( $dados['WEB_BANCO_DADOS'] 	 , 	'db_host'		);
		$conn->set( $dados['WEB_USUARIO_BD'] 	 , 	'db_usuario'	);
		$conn->set( $dados['WEB_SENHA_BD']		 , 	'db_senha'		);
		$conn->set( $dados['WEB_NOME_BD'] 		 , 	'db_nome'		);

		$conn->conectar();
		$pdo = $conn->Connect(); 
	}
}





date_default_timezone_set("America/Sao_Paulo");


/***************************************************************************************************************************/
/* Configurações filial para extrair dados da empresa */
/***************************************************************************************************************************/
$filialId = $_POST['filial'];
$filial = new Filial();

$sql = "SELECT descricao, endereco, numero, cidade, estado, bairro, fone, cep, email FROM filial WHERE filial = $filialId";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$filial->set(	$dados['descricao'], 	'descricao'		);
	$filial->set(	$dados['endereco'], 	'endereco'		);
	$filial->set(	$dados['numero'], 		'numero'		);
	$filial->set(	$dados['cidade'], 		'cidade'		);
	$filial->set(	$dados['estado'], 		'estado'		);
	$filial->set(	$dados['bairro'], 		'bairro'		);
	$filial->set(	$dados['fone'], 		'fone'			);
	$filial->set(	$dados['cep'], 			'cep'			);
	$filial->set(	$dados['email'], 		'email'			);
}
// echo toJson($filial);









/***************************************************************************************************************************/
/* Configurações da tabela site */
/***************************************************************************************************************************/
$sql = "SELECT * FROM site ORDER BY ID_SITE DESC LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$NOME_EMPRESA = 	$dados['NOME_EMPRESA'];
	// $NOME_CIDADE = 		$dados['NOME_CIDADE'];
	// $ESTADO = 			$dados['ESTADO'];
	$FONE = 			$dados['FONE'];
	$FONE_APP = 		$dados['FONE_APP'];
	$EMAIL = 			$dados['EMAIL'];
	$sendusername = 	$dados['sendusername'];
	$sendpassword = 	$dados['sendpassword'];
	$smtpserver = 		$dados['smtpserver'];
	$smtpserverport = 	$dados['smtpserverport'];
	$MailFrom = 		$dados['MailFrom'];
	$MailTo = 			$dados['MailTo'];
	$MailCc = 			$dados['MailCc'];
}
$MailTo = $_POST['email'];
















/***************************************************************************************************************************/
/* Consulta Orçamento */
/***************************************************************************************************************************/
// Variaveis de Configuração
$documento = $_POST['documento'];
$lanc_marketing = new Lanc_marketing();

// Verificação interna
$sql = "SELECT
			lanc_marketing.filial,
			lanc_marketing.documento,
			COALESCE(lanc_marketing.cliente, 0) AS cliente,
			lanc_marketing.razaosocial,
			lanc_marketing.total,
			lanc_marketing.endereco,
			lanc_marketing.bairro,
			lanc_marketing.cidade,
			lanc_marketing.estado,
			lanc_marketing.cep,
			lanc_marketing.telefone,
			lanc_marketing.emissao,
			lanc_marketing.flagcancelada,
			lanc_marketing.dataatualizacao,
			lanc_marketing.horaatualizacao,
			lanc_marketing.usuarioatualizacao,
			lanc_marketing.pagamento,
			lanc_marketing.observacao,
			lanc_marketing.numero,
			lanc_marketing.dataatualizacao_alteracao,
			lanc_marketing.horaatualizacao_alteracao,
			lanc_marketing.usuarioatualizacao_alteracao,
			COALESCE(lanc_marketing.contato, 'errorNotFind') AS contato
		FROM lanc_marketing
		WHERE lanc_marketing.documento = '$documento'
		AND lanc_marketing.filial = $filialId
		LIMIT 1";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$lanc_marketing->set((int)$dados['filial'], 					'filial');
	$lanc_marketing->set($dados['documento'], 						'documento');
	$lanc_marketing->set((int)$dados['cliente'], 					'cliente');
	$lanc_marketing->set($dados['razaosocial'], 					'razaosocial');
	$lanc_marketing->set((double)$dados['total'], 					'total');
	$lanc_marketing->set($dados['endereco'], 						'endereco');
	$lanc_marketing->set($dados['bairro'], 							'bairro');
	$lanc_marketing->set($dados['cidade'], 							'cidade');
	$lanc_marketing->set($dados['estado'], 							'estado');
	$lanc_marketing->set($dados['cep'], 							'cep');
	$lanc_marketing->set($dados['telefone'], 						'telefone');
	$lanc_marketing->set($dados['emissao'], 						'emissao');
	$lanc_marketing->set((int)$dados['flagcancelada'], 				'flagcancelada');
	$lanc_marketing->set($dados['dataatualizacao'], 				'dataatualizacao');
	$lanc_marketing->set($dados['horaatualizacao'], 				'horaatualizacao');
	$lanc_marketing->set($dados['usuarioatualizacao'], 				'usuarioatualizacao');
	$lanc_marketing->set($dados['pagamento'], 						'pagamento');
	$lanc_marketing->set($dados['observacao'], 						'observacao');
	$lanc_marketing->set($dados['numero'], 							'numero');
	$lanc_marketing->set($dados['dataatualizacao_alteracao'], 		'dataatualizacao_alteracao');
	$lanc_marketing->set($dados['horaatualizacao_alteracao'], 		'horaatualizacao_alteracao');
	$lanc_marketing->set($dados['usuarioatualizacao_alteracao'], 	'usuarioatualizacao_alteracao');
	$lanc_marketing->set($dados['contato'],							'contato');
}
















/***************************************************************************************************************************/
/* Consulta os Itens do Orçamento */
/***************************************************************************************************************************/
$arrayPedidosItem = [];
$lanc_marketing_itens = new Lanc_marketing_itens();
$item = new Item();

// Verificação interna
$sql = "SELECT
			-- Campos lanc_marketing_itens
			lanc_marketing_itens.sequencia,
			lanc_marketing_itens.sub_grupo,
			lanc_marketing_itens.grupo,
			lanc_marketing_itens.item,
			lanc_marketing_itens.quantidade,
			lanc_marketing_itens.valor_unitario,
			lanc_marketing_itens.valor_total,
			lanc_marketing_itens.valor_desconto,
			lanc_marketing_itens.unidade,

			-- Campos Item
			item.descricao,
			item.unidade_medida,

			-- Campo item_filial
			item_filial.estoque

		FROM lanc_marketing_itens
		INNER JOIN item 
			ON  lanc_marketing_itens.grupo = item.grupo
			AND lanc_marketing_itens.sub_grupo = item.sub_grupo
			AND lanc_marketing_itens.item = item.item
		INNER JOIN item_filial
			ON lanc_marketing_itens.filial = item_filial.filial
			AND lanc_marketing_itens.grupo = item_filial.grupo
			AND lanc_marketing_itens.sub_grupo = item_filial.sub_grupo
			AND lanc_marketing_itens.item = item_filial.item
		WHERE lanc_marketing_itens.documento = '$documento'
		AND lanc_marketing_itens.filial = $filialId";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$item = new Item();
	$item->set((int)$dados['sub_grupo'], 			'sub_grupo');
	$item->set((int)$dados['grupo'], 				'grupo');
	$item->set((int)$dados['item'], 				'item');
	$item->set($dados['descricao'], 				'descricao');
	$item->set($dados['unidade_medida'], 			'unidade_medida');
	$item->set((double)$dados['estoque'], 			'estoque');


	$lanc_marketing_itens = new Lanc_marketing_itens();
	$lanc_marketing_itens->set($filial, 'filial');
	$lanc_marketing_itens->set($documento, 'documento');
	$lanc_marketing_itens->set((int)$dados['sequencia'], 			'sequencia');
	$lanc_marketing_itens->set((int)$dados['sub_grupo'], 			'sub_grupo');
	$lanc_marketing_itens->set((int)$dados['grupo'], 				'grupo');
	$lanc_marketing_itens->set($item, 								'item');
	$lanc_marketing_itens->set((double)$dados['quantidade'], 		'quantidade');
	$lanc_marketing_itens->set((double)$dados['valor_unitario'], 	'valor_unitario');
	$lanc_marketing_itens->set((double)$dados['valor_total'], 		'valor_total');
	$lanc_marketing_itens->set((double)$dados['valor_desconto'], 	'valor_desconto');
	$lanc_marketing_itens->set($dados['unidade'], 					'unidade');

	array_push($arrayPedidosItem, $lanc_marketing_itens);
}















/***************************************************************************************************************************/
/* uploard do PDF */
/***************************************************************************************************************************/
// $uploardBool = false;
// $nome_final = "";
// $arquivo = $_FILES['arquivo']['name'];
// if ($arquivo != "") {
// 	//Pasta onde o arquivo vai ser salvo
// 	$_UP['pasta'] = '../upload/';
// 	//Tamanho máximo do arquivo em Bytes
// 	$_UP['tamanho'] = 1024*1024*1000; //50mb
// 	//Array com a extensões permitidas
// 	$_UP['extensoes'] = array('pdf');
// 	//Renomeiar
// 	// $_UP['renomeia'] = false;
// 	//Array com os tipos de erros de upload do PHP
// 	$_UP['erros'][0] = 'Não houve erro';
// 	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
// 	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
// 	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
// 	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
// 	//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
// 	if($_FILES['arquivo']['error'] != 0){
// 		// die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
// 		//exit; //Para a execução do script
// 	}
// 	//Faz a verificação da extensao do arquivo
// 	$extensao = explode('.', tratarString($_FILES['arquivo']['name']));
// 	for ($i = sizeof($extensao) - 1; $i >= 0; $i--): $extensao = $extensao[$i]; $i = -1; endfor;

// 	if(array_search($extensao, $_UP['extensoes']) === false){}
// 	//Faz a verificação do tamanho do arquivo
// 	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){}
// 	//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
// 	else{
// 		$nome_final = $_FILES['arquivo']['name'];
// 		$nome_final = date('dmY_His').tratarString($nome_final);
// 		$img_fundo_nome = $nome_final;
		
// 		//Verificar se é possivel mover o arquivo para a pasta escolhida
// 		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) 
// 			$uploardBool = true;
// 		else $uploardBool = false;
// 	}
// }















/***************************************************************************************************************************/
/* Variaveis Pedido */
/***************************************************************************************************************************/

$numeroEnderecoUnico = $lanc_marketing->get('numero') != "" ?  " - " . $lanc_marketing->get('numero') : "";
$estadoEnderecoUnico = $lanc_marketing->get('estado') != "" ?  " - " . $lanc_marketing->get('estado') : "";



$arrayPagamento = explode(" ", $lanc_marketing->get('pagamento'));
$pagamento = "";

try{
	$codigoPag = (int) $arrayPagamento[0];
	for($i = 1; $i <  sizeof($arrayPagamento); $i++) $pagamento .= $arrayPagamento[$i];
}catch(Exception $e){
	$pagamento = $lanc_marketing->get('pagamento');
}


$numDocumento = $lanc_marketing->get('documento');;
$emissao = formataDataUn( substr($lanc_marketing->get('emissao'), 0, 10) );
$nomeCliente = $lanc_marketing->get('razaosocial');
$telefoneCliente = $lanc_marketing->get('telefone');
$contatoCliente = $lanc_marketing->get('contato');
$endereco = $lanc_marketing->get('endereco') . $numeroEnderecoUnico;
$bairro = $lanc_marketing->get('bairro');
$cidadeEstado = $lanc_marketing->get('cidade') . $estadoEnderecoUnico;
$formaPagamento = $pagamento;
$observacoa = $lanc_marketing->get('observacao');



/* Div onde Vai a tabela de itens do orçamento */
$valorTotal = 0;
$contudoProduto = "";
$contudoProduto .= 	"<table width='100%' class='fontTable2'>"
		 . 			"<tr>"
		 . 				"<td class='fontMenor' align='left'>	<b>Descrição</b>	</td>"
		 . 				"<td class='fontMenor' align='left'>	<b>Qdt - U.M.</b>	</td>"
		 . 				"<td class='fontMenor' align='center'>	<b>Vlr. Uni.</b>	</td>"
		 . 				"<td class='fontMenor' align='center'>	<b>Vlr. Total</b>	</td>"
		 . 			"</tr>";

for ($i = sizeof($arrayPedidosItem) - 1; $i >= 0; $i--) {
	/* pedido_item_Global[i] */
	$contudoProduto .= 	"<tr id='linhaPedidoItem".i."' style='border-top-style:solid;'>"
			 . 			"<td class='fontMenor'>"
			 . 				$arrayPedidosItem[$i]->get('item')->get('item')." - ".$arrayPedidosItem[$i]->get('item')->get('descricao')
			 . 			"</td>"
			 // . 		"</tr>"
			 // . 		"<tr id='linhaPedidoItem2".i."'>"
			 . 			"<td class='fontMenor' align='left'>"
			 . 				$arrayPedidosItem[$i]->get('quantidade') . " - " . $arrayPedidosItem[$i]->get('unidade')
			 . 			"</td>"
			 . 			"<td class='fontMenor' align='center'>"
			 . 				formataValorParaImprimir($arrayPedidosItem[$i]->get('valor_unitario'))
			 . 			"</td>"
			 . 			"<td class='fontMenor' align='right'>"
			 . 				formataValorParaImprimir($arrayPedidosItem[$i]->get('valor_total'))
			 . 			"</td>"
			 . 		"</tr>";
	$valorTotal += (float) $arrayPedidosItem[$i]->get('valor_total');
}
$contudoProduto .= 		"<tr>"
		 . 				"<td class='fontMenor' align='right' colspan='3'><b>Total: </b></td>"
		 . 				"<td class='fontMenor' align='right'>".formataValorParaImprimir($valorTotal)."</td>"
		 . 			"</tr>"
		 . 		"</table>";



/* Dados da empresa */
$nomeEmpresa = $filial->get('descricao');

$enderecoEmpresa = $filial->get('endereco') . ", " 
					. $filial->get('numero') . ", "
					. $filial->get('bairro');

$enderec2Empresa = $filial->get('cidade') . " - "
					. $filial->get('estado') . " CEP:"
					. $filial->get('cep');

$teledfoneFormateado = "(" . substr($filial->get('fone'), 0, 2) . ") " 
						. 		substr($filial->get('fone'), 2, 5) . "-"
						. 		substr($filial->get('fone'), 5, strlen($filial->get('fone')) );


$contatoEmpresa  = "Fone: " . $teledfoneFormateado 
					. " E-mail: " . $filial->get('email');


$filialUrlLogo = $_POST['filial'];
$RAZAOSOCIALUrlLogo = $_POST['RAZAOSOCIAL'];
$RAZAOSOCIALUrlLogo = str_replace(".", "", $RAZAOSOCIALUrlLogo);
$RAZAOSOCIALUrlLogo = str_replace(" ", "_", $RAZAOSOCIALUrlLogo);









// <img src='cid:1' width=\"20%\">


/***************************************************************************************************************************/
/* Montagem do E-mail */
/***************************************************************************************************************************/
	// $Nome = $_POST['name'];
	// $Email = $_POST['email'];
	// $Telefone = $_POST['phone'];
	$Assunto =  "Orçamento da ".$filial->get('descricao'); // "Formulario de Contato - Site $NOME_EMPRESA";
	// $Mensagem = $_POST['message'];

/*<!-- 
	<h2>Formulario de Contato</h2>
	<div style=\"font-size: 20px;\">
		<b>Nome:</b>&nbsp;&nbsp;$Nome
		<br>
		<b>E-mail:</b>&nbsp;$Email
		<br>
		<b>Telefone:</b>&nbsp;$Telefone
		<br>
		<b>Assunto:</b>&nbsp;$Assunto
		<br>
		<b>Mensagem:</b>&nbsp;$Mensagem
		<br><br>
		Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>
	</div>
	<br><br><br>
-->*/

	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');

	// Compo E-mail
	$arquivo = "
		<style type='text/css'>
			body {
				margin:0px;
				font-family:Verdane;
				font-size:12px;
				color: #444;
			}
			a{
				color: #666666;
				text-decoration: none;
			}
			a:hover {
				color: #FF0000;
				text-decoration: none;
			}
			h2 {
				font-size:20px;
			}
			.fontMenor{
				font-size: 12px;
			}
			.assisnatura{
				border-top-style: solid;
				/*border-radius: 10px;*/
				border-collapse: separate;
				border-top-width: 1.5px;
				/*border-top-left-radius: 10px;*/
				border-top-right-radius: 50px 50px;
			}
		</style>
		<html>

			<table width=\"100%\">
				<tr>
					<td width=\"50%\">
						<table width=\"100%\" style=\"border-style: solid;\">
							<tr>
								<td align=\"center\">
									<img src='http://cdiinfo.com.br/aplicacoes_web/logo/".$RAZAOSOCIALUrlLogo."/".$filialUrlLogo.".jpg' width=\"20%\">
								</td>
							</tr>
							<tr>
								<td align=\"center\" class=\"fontMenor\">".$nomeEmpresa."</td>
							</tr>
							<tr>
								<td align=\"center\" class=\"fontMenor\">".$enderecoEmpresa."</td>
							</tr>
							<tr>
								<td align=\"center\" class=\"fontMenor\">".$enderec2Empresa."</td>
							</tr>
							<tr>
								<td align=\"center\" class=\"fontMenor\">".$contatoEmpresa."</td>
							</tr>
						</table>
					</td>
					<td width=\"50%\">
						<table width=\"100%\">
							<tr>
								<td width=\"100%\">
									<h2>Orçamento: N°".$numDocumento."</h2>
								</td>
							<tr>
							</tr>
								<td>
									<h2>Emissão: ".$emissao."</h2>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>




			<table width=\"100%\">
				<tr>
					<td width=\"50%\">
						<table width=\"100%\">
							<tr>
								<td colspan='2' style=\"border-bottom-style: solid;\">
									<h2 style=\"margin: 0\">Dados do Cliente</h2>
								</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Nome:</b></td>
								<td class=\"fontMenor\">".$nomeCliente."</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Telefone: </b></td>
								<td class=\"fontMenor\">".$telefoneCliente."</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Contato:</b></td>
								<td class=\"fontMenor\">".$contatoCliente."</td>
							</tr>
						</table>
					</td>
					<td width=\"50%\">
						<table width=\"100%\">
							<tr>
								<td colspan=\"2\" style=\"border-bottom-style: solid;\">
									<h2 style=\"margin: 0\">Local de Entrega</h2>
								</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Enderecço</b></td>
								<td class=\"fontMenor\">".$endereco."</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Bairro</b></td>
								<td class=\"fontMenor\">".$bairro."</td>
							</tr>
							<tr>
								<td class=\"fontMenor\"><b>Cidade - UF</b></td>
								<td class=\"fontMenor\">".$cidadeEstado."</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

			<h2 style='margin-bottom: 0;border-bottom-style: solid;'>Produtos</h2>
			<div>".$contudoProduto."</div>



			<h2 style=\"margin-bottom: 0;border-bottom-style: solid;\">Codições Gerais</h2>
			<table width=\"100%\">
				<tr>
					<td><b>Forma de Pagamento: </b></td>
					<td>".$formaPagamento."</td>
				</tr>
				<tr>
					<td><b>Observações: </b></td>
					<td>".$observacoa."</td>
				</tr>

			</table>
			<br>
			Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>
		</html>"; // $ComplementoTable



/***************************************************************************************************************************/
/* Evia o E-mail pelo PHPMailer */
/***************************************************************************************************************************/
require_once "PHPMailer-master/vendor/autoload.php";

// Inicia a classe PHPMailer
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->SMTPDebug = 0;
$mail->Host = $smtpserver; // Endereço do servidor SMTP // $mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = $sendusername; // Usuário do servidor SMTP // $mail->Username = 'cdiinfo.suporte@gmail.com';
$mail->Password = $sendpassword; // Senha do servidor SMTP // $mail->Password = 'cdiinfo!@#';
$mail->Port = $smtpserverport;
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = "";

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = $MailFrom; 											// Seu e-mail
$mail->FromName = "CDI - $NOME_EMPRESA"; 							// Seu nome

// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// $mail->AddAddress("jackbiller19@gmail.com", $Nome);
$mail->AddAddress($MailTo, $Nome);  								// Para quem será enviado
$mail->AddCC($MailCc, $Nome); 										// Copia
$mail->AddBCC('jackmailteste@gmail.com', 'CDI ($NOME_EMPRESA)'); 	// Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); 												// Define que o e-mail será enviado como HTML


/*$imagemLogo = "http://cdiinfo.com.br/aplicacoes_web/logo/"			/* Caminho absoluto */
/*			   . $RAZAOSOCIALUrlLogo . "/" 							/* Nome da Empresa */
/*			   . $filialUrlLogo . ".jpg";
*/

// Setandado Imagem no E-mail
/*$mail->AddEmbeddedImage(											
	"http://cdiinfo.com.br/aplicacoes_web/logo/".$RAZAOSOCIALUrlLogo."/".$filialUrlLogo.".jpg", '1'
);*/

$mail->CharSet = 'uft-8'; 											// Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = /* "Orçamento: ". */ $Assunto; 					// Assunto da mensagem
$mail->Body = $arquivo;												// Corpo do E-mail
$mail->AltBody = "";

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// if ($uploardBool) {
	// $mail->AddAttachment("../upload/$nome_final", $nome_final);  // Insere um anexo
// }

// Envia o e-mail
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$enviado = $mail->Send();											// Envia o E-mail

// Limpa os destinatários e os anexos
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
if ($enviado) {														// Verifica se foi enviado com sucesso
	$emailEnviado = true;
	echo "1";
} else {
	$emailEnviado = false;
	echo "Não foi possível enviar o e-mail.";
	echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
}



/***************************************************************************************************************************/
/*gravar contato no banco */
/***************************************************************************************************************************/
/*	$entidadeContato = new Contato();
	$contatoDAO = new contatoDAO();

	$entidadeContato->set($Nome, 'nome_contato');
	$entidadeContato->set($Email, 'email_contato');
	$entidadeContato->set($Telefone, 'telefone_contato');
	$entidadeContato->set($Assunto, 'assunto_contato');
	$entidadeContato->set($Mensagem, 'mensagem_contato');
	$entidadeContato->set(4, 'usuario_id');
	$entidadeContato->set(1, 'bool_ativo_contato');

	// $entidadeContato->set($Nome, 'NOME_CONTATO');
	// $entidadeContato->set($Email, 'EMAIL_CONTATO');
	// $entidadeContato->set($Telefone, 'TELEFONE_CONTATO');
	// $entidadeContato->set($Assunto, 'ASSUNTO_CONTATO');
	// $entidadeContato->set($Mensagem, 'MENSAGEM_CONTATO');
	// $entidadeContato->set(1, 'bool_ativo_contato');
	// $entidadeContato->set(date('Y-m-d').' '.(date('H')-3).date(':i:s'), 'DT_CONTATO');
	// $entidadeContato->set(date('Y-m-d H:i:s'), 'DT_CONTATO');

	$retorno = $contatoDAO->cadastraContato($entidadeContato);
	if ($retorno == 1 || $retorno == "1") 	$_SESSION['contatoValido'] = true;
	else 									$_SESSION['contatoInvalido'] = true;
	echo 1;
	header("Location: ../contato.php");*/
// }


function tratarString($texto){
	$texto = str_replace(" ", "_", $texto);

	$texto = str_replace("ç", "c", $texto);
	$texto = str_replace("Ç", "C", $texto);

	$texto = str_replace("é", "e", $texto);
	$texto = str_replace("ê", "e", $texto);
	$texto = str_replace("è", "e", $texto);
	$texto = str_replace("É", "E", $texto);
	$texto = str_replace("Ê", "E", $texto);
	$texto = str_replace("È", "E", $texto);

	$texto = str_replace("â", "a", $texto);
	$texto = str_replace("á", "a", $texto);
	$texto = str_replace("à", "a", $texto);
	$texto = str_replace("ã", "a", $texto);
	$texto = str_replace("Â", "A", $texto);
	$texto = str_replace("Á", "A", $texto);
	$texto = str_replace("À", "A", $texto);
	$texto = str_replace("Ã", "A", $texto);

	$texto = str_replace("ô", "o", $texto);
	$texto = str_replace("ò", "o", $texto);
	$texto = str_replace("ó", "o", $texto);
	$texto = str_replace("õ", "o", $texto);
	$texto = str_replace("Ô", "O", $texto);
	$texto = str_replace("Ó", "O", $texto);
	$texto = str_replace("Ò", "O", $texto);
	$texto = str_replace("Õ", "O", $texto);

	$texto = str_replace("î", "i", $texto);
	$texto = str_replace("ì", "i", $texto);
	$texto = str_replace("í", "i", $texto);
	$texto = str_replace("Î", "I", $texto);
	$texto = str_replace("Ì", "I", $texto);
	$texto = str_replace("Í", "I", $texto);

	$texto = str_replace("û", "u", $texto);
	$texto = str_replace("ú", "u", $texto);
	$texto = str_replace("ù", "u", $texto);
	$texto = str_replace("Û", "U", $texto);
	$texto = str_replace("Ú", "U", $texto);
	$texto = str_replace("Ù", "U", $texto);

	$texto = str_replace("ñ", "n", $texto);
	$texto = str_replace("Ñ", "N", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}














/***************************************************************************************************************************/
/* Funções do JavaScript para PHP */
/***************************************************************************************************************************/
function formataDataUn($dataUn){
	$dataUn = explode("-", $dataUn);
	return $dataUn[2] . "/" . $dataUn[1] . "/" . $dataUn[0];
}


function formataValorParaImprimir($valor){
	 $valor = (float) $valor; 
	if ($valor >= 0) {
		$valor = number_format($valor, 2, ",", ".");
		$valor = "R$" . $valor;
	} else {
		$valor = $valor * (-1);
		$valor = number_format($valor, 2, ",", ".");
		$valor = "R$-" . $valor;
	}
	return $valor;
}

?>