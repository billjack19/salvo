<?php include("instanciaComponente.php");

//converter para Json o XML de retorno e pegar a tag desejada
try{
	$XML = simplexml_load_string($spdNFe->StatusDoServico());	
	//echo $XML;
	$statusServico = $XML->xMotivo;	
}
catch(Exception $e){
	echo $e;	
}
//Montando Array para passar ao listar certificado
$ListaDeCertificados = $spdNFe->ListarCertificados('|');
$ListaDeCertificados = explode("|", $ListaDeCertificados);

$UfConfig = $spdNFe->Uf;
function spdNFeUF(){
	if($UfConfig = "PR"){
		return "Paraná";
	}
}
?>
<!DOCTYPE html>
<head lang="en">
	<title>TecnoSpeed TI NF-e</title>
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1" >
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/lib/appDemo.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script type="text/javascript" src="/js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<link rel="icon" type="image/x-icon" href="/Imagens/Logo.png">
</head>
<body>
	<div>
		<div class="mainbox col-md-12">						
			<div class="panel panel-info" style="padding-top:50px">					
				<div class="panel-heading">
				<div class="navbar navbar-inverse navbar-fixed-top col-md-12" >
					<div class="container">
						<div class="navbar-header">
							<a href="localhost" class="navbar-brand">Demonstração NF-e TecnoSpeed</a>
						</div>
						<div>
							<ul class="nav navbar-nav">
								<li><a href="eventos.php">Eventos NF-e</a></li>
								<li><a href="sobre.php">Sobre a Demonstração</a></li>
							</ul>
						</div>
					</div> 
				</div>
					<div class="panel-title"><strong>Demonstração NF-e - Componente NF-e na versão: <?= $spdNFe->versao.'  -  Status do Serviço no '.$spdNFe->Uf.': '.$statusServico  ?></strong></div>
						<div style="padding-top:5px" class="panel-body">
							<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">					
							</div>
							<div class="pull-left col-md-12">								
								<strong>Certificado digital válido até: </strong>		
									<select class="form-control select-uf" id="nomeCertificado">	
										<?php foreach($ListaDeCertificados as $value){ ?>
											<option><?= $value ?></option>
										<?php } ?>										
								</select>
								<br>															
							</div>
							<!--form id="loginform" class="form-horizontal" role="form"-->
                            <div class="pull-left col-md-12">																						
							<div class="row">
								<div class="panel panel-primary">													
										<div class="panel-heading">
											<h3 class="panel-title">Informações</h3>
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-6">
													<strong>Unidade Federativa Emissão</strong>
										  			<input type="text" class="form-control" id="UfEmitente" placeholder="Unidade federativa configurada para o Emitente da NF-e" aria-describedby="basic-addon2" value="<?php echo spdNFeUF(); ?>">
												</div>
												<div class="col-md-6">
													<strong>CNPJ Emitente</strong>
										  			<input type="text" class="form-control" id="CnpjEmitente" placeholder="CNPJ configurado para o Emitente da NF-e" aria-describedby="basic-addon2" value="<?php echo $spdNFe->Cnpj ?>"><br>
												</div>											
												<div class="col-md-6">
													<strong>Nº Recibo</strong>
										  			<input type="text" class="form-control" id="nroRecibo" placeholder="Número do Recibo da NF-e com 15 caracteres" aria-describedby="basic-addon2">
												</div>
												<div class="col-md-6">
													<strong>Chave NF-e</strong>
										  			<input type="text" class="form-control" id="chaveNfe" placeholder="Chave da NF-e com 44 caracteres" aria-describedby="basic-addon2">
												</div>
											</div>
										</div>									
									</div>
								<div class="panel panel-primary">							
									<div class="panel-heading">
										<h3 class="panel-title">Métodos Componente NF-e</h3>
									</div>
									<div class="panel-body">
									<div class="bs-example" data-example-id="simple-justified-button-group">										
										<div class="btn-group btn-group-justified" role="group" aria-label="...">
										  <div class="btn-group" role="group">
										  	<form action="index.php">
												<button type="button" class="btn btn-default" id="configuraIni" title="Abrir arquivo ini para efetuar configurações.">Configurar Ini</button>
											</form>
										  </div>
										  <div class="btn-group" role="group">
										  		<button type="button" class="btn btn-default" id="assinarNota" title="Assinatura do método Assinar: $xml = $spdNFe->AssinarNota($xml);">3 - Assinar XML</button>
										  </div>
										  <div class="btn-group" role="group">
										  		<button type="button" class="btn btn-default" id="consultarNFe" title="Assinatura do método Consultar NF-e: $chaveNota = $spdNFe->ConsultarNF($chaveNota);">7 - Consultar NF-e</button>										
										  </div>
										  <div class="btn-group" role="group">
											<div class="dropdown">
												<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Impressão / Enviar e-mail <span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="#" id="gerarPDF">Danfe PDF</a></li>												  
												  <li role="separator" class="divider"/>
													<li><a href="#" id="EnviarEmail" data-toggle="modal" data-target=".bs-modal-sm-email-send">Enviar DANFE e XML por e-mail</a></li>
												</ul>
											  </div>												
											</div>
										</div>
										<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-default" id="loadConfig" title="Salvar arquivo de configurações.">Salvar Ini</button>
											</div>
											<div class="btn-group" role="group">												
												<button type="button" class="btn btn-default" id="auditarXML" title="Auditar XML da NF-e">4 - Auditar NF-e</button>
											</div>

											<div class="btn-group" role="group">
												<div class="dropdown">
												<button type="button" class="btn btn-default" title="Converter XML para DataSet" data-toggle="dropdown">Converter XML para Data Set <span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="#" id="ConvDataSet">Efetuar a conversão por XML na página</a></li>
												  <li role="separator" class="divider"/>
													<li><a href="#" data-toggle="modal" data-target=".bs-modal-lg-Search-File">Efetuar a conversão selecionando um arquivo XML na máquina</a></li>
												</ul>
											  </div>
											</div>
												<!--button type="button" class="btn btn-default" title="Converter XML para DataSet" data-toggle="modal" data-target=".bs-modal-lg-Search-File">Converter XML para Data Set</button-->																					
											<div class="btn-group" role="group">
												<!--button type="button" class="btn btn-default" ></button-->
											</div>
										</div>
										<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
											<div class="btn-group" role="group">														
												<button type="button" class="btn btn-default" id="consultaStatus" title="Assinatura do método consultar Status: $spdNFe->StatusDoServico();">1 - Consultar Status</button>												
										  </div>
										  <div class="btn-group" role="group">										  	
												<button type="button" class="btn btn-default" id="enviarNota" title="Assinatura do método Enviar NF-e: $xml = $spdNFe->EnviarNF('0001', $xml, false);">5 - Enviar NF-e</button>											
										  </div>
										  <div class="btn-group" role="group">
											<!-- Large modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Eventos NF-e</button>

											<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
											  <div class="modal-dialog modal-lg" role="document">
											    <div class="modal-content">

											      	<div class="bs-example" data-example-id="simple-nav-justified">											    
												    	 <ul class="nav nav-pills nav-justified"> 
												    	 	<ul class="nav nav-tabs" id="myTabs" role="tablist">
																<li role="presentation" class="active">
																	<a href="#consultaDFe" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
																		<font>
																			<font>Consulta DF-e</font>
																		</font>
																	</a>
																</li>
																<li role="presentation" class="">
																	<a href="#cartaDeCorrecao" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
																		<font>
																			<font>Carta de Correção (CCe)</font>
																		</font>
																	</a>
																</li>
																<li role="presentation" class="">
																	<a href="#cancelamento" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
																		<font>
																			<font>Cancelamento</font>
																		</font>
																	</a>
																</li>
															</ul> 
												    	 </ul> 
												    	 <div class="tab-content">												    	 	
														    <div role="tabpanel" class="tab-pane active" id="consultaDFe">
													    		<h1> Consulta DF-e <br>
													    			<small> Nesta aba será feita a consulta DF-e, a manifestação e o Download do XML da NF-e </small>
													    		</h1>
													    		<div class="panel panel-primary">
																	<div class="panel-heading">
																		<h3 class="panel-title">Informações / Ações</h3>
																	</div>
																	<div class="panel-body">
																		<div class="row">
																			<div class="col-md-3">
																				<strong>Nº NSU Inicial</strong>
																	  			<input type="text" class="form-control text-center" id="nsuInicial" placeholder="000000000000000" aria-describedby="basic-addon2" value="">
																			</div>
																			<div class="col-md-3">
																				<strong>Nº NSU Final</strong>
																	  			<input type="text" class="form-control text-center" id="nsuFinal" placeholder="000000000000000" aria-describedby="basic-addon2" value="" disabled><br>
																			</div>											
																			<div class="col-md-6">
																				<strong>Tipo Evento</strong><br>																	  			
																	  			<input type="checkbox"> 210200 – Confirmação da Operação.<br>
																	  			<input type="checkbox"> 210210 – Ciência da Operação.<br>
																	  			<input type="checkbox"> 210220 – Desconhecimento da Operação.<br>
																	  			<input type="checkbox"> 210240 – Operação não Realizada.
																			</div>																			
																		</div>																
													    			<br>
														    			<div class="bs-example text-center" data-example-id="simple-justified-button-group">										
																			<div class="btn-group btn-justified-center" role="group" aria-label="...">
																			  <div class="btn-group" role="group">
																			  	<div class="btn">
																				  	<form action="index.php">
																						<button type="button" class="btn btn-info" id="consultaDFe">Consulta DF-e</button>
																					</form>
																				</div>
																			  </div>																			  
																			  <div class="btn-group" role="group">
																			  	<div class="btn">
																			  	<form action="index.php">
																			  		<button type="button" class="btn btn-info" id="manifestarNotas">Manifestar Notas</button>
																			  	</form>
																			  </div>
																			  </div>																			  
																			  <div class="btn-group" role="group">
																			  	<div class="btn">
																			  	<form action="index.php">
																			  		<button type="button" class="btn btn-info" id="downloadNFe">Download NF-e</button>
																			  	</form>
																			  </div>
																			  </div>
																			</div>
																		</div>
																	</div>									
																</div>
													    		<div class="panel panel-primary">																	
																	<div class="panel-heading">
													    				<h3 class="panel-title">Notas</h3>
													    			</div>														    						
																	<div class="table table-bordered">
																		<table class="table table-bordered">
																			<thead>
																				<tr>
																					<th>
																						<font>
																							<font>
																								<input type="checkbox" ng-change="selecionaTodas(produtoAtivo.data, cbMestre)" ng-model="cbMestre" class="ng-pristine ng-valid">
																							</font>
																						</font>
																					</th>
																					<th>
																						<font>
																							<font>Handle</font>
																						</font>
																					</th>																						
																					<th>
																						<font>
																							<font>Chave Nota</font>
																						</font>
																					</th>
																					<th>
																						<font>
																							<font>Doc. Emitente</font>
																						</font>
																					</th>
																					<th>
																						<font>
																							<font>Nome Emitente</font>
																						</font>
																					</th>
																					<th>
																						<font>
																							<font>Situação da MDE</font>
																						</font>
																					</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<th scope="row">
																						<font>
																							<font>
																								<input type="checkbox" ng-change="selecionaTodas(produtoAtivo.data, cbMestre)" ng-model="cbMestre" class="ng-pristine ng-valid">
																							</font>
																						</font>
																					</th>
																					<td>
																						<font>
																							<font>1</font>
																						</font>
																					</td>																							
																					<td>
																						<font>
																							<font>50160803661869000175550010000749061416403146</font>
																						</font>
																					</td>
																					<td>
																						<font>
																							<font>03661869000175</font>
																						</font>
																					</td>
																					<td>
																						<font>
																							<font>NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL</font>
																						</font>
																					</td>
																					<td>
																						<font>
																							<font>Sem Manifestação do Destinatário</font>
																						</font>
																					</td>																				
																				</tr>
																			</tbody>
																		</table>
																	</div>																
																</div>													    		
														    </div>
														    <div role="tabpanel" class="tab-pane" id="cartaDeCorrecao">														    	
														    	<h1> Carta de Correção (CCe) <br>
														    		<small>Nesta aba será feita a carta de correção da NFe.</small>
														    	</h1>
														    </div>
														    <div role="tabpanel" class="tab-pane" id="cancelamento">
														    	<h1> Cancelamento NF-e <br>
														    		<small>Nesta aba será feito o cancelamento da NF-e.</small>
														    	</h1>														    	
														    </div>														    
														  </div>
											    	</div>
											    </div>
											  </div>
											</div>
											<!-- Large modal -->
										  </div>
										  <div class="btn-group" role="group">
											<!--button type="button" class="btn btn-default" ></button-->
										  </div>
										</div>	
											<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group with nested dropdown">
												<div class="btn-group" role="group">													
													<button type="button" class="btn btn-default" id="gerarXMLDataSet">2 - XML por DataSet</button>
												</div>
										  <div class="btn-group" role="group">
											<button type="button" class="btn btn-default" id="consultarRecibo" title="Assinatura do método consultar Recibo: $xml = $spdNFe->ConsultarRecibo($nroRecibo);">6 - Consultar Recibo</button>
										  </div>
										  <div class="btn-group" role="group">
											<!--button type="button" class="btn btn-default" ></button-->
										  </div>
										  <div class="btn-group" role="group">
											<!--button type="button" class="btn btn-default" ></button-->
										  </div>
										</div>
									</div>
									</div> 
								</div>
								<div>
									<div style="padding-top:1px" class="panel-body" >
										<div style="display:none" id="login-alert" class="alert alert-danger col-sm-8"></div>
										<div class="form-group">
					   						 <label for="textArea">Resultados e XML Gerado</label>
					    					<textarea class="form-control" name="textAreaXml" id="idXML" rows="10"></textarea>
									 	</div>				
					                </div> 
								</div>
							</div>							
						</div>
					</div>						
				</div>	
			</div>
		</div>
	</div>
	<!--Modal para selecionar o XML via arquivo-->
	<div class="modal fade bs-modal-lg-Search-File" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content col-md-6 col-md-offset-3">
				<div class="panel-heading panel-primary">
					<h3 class="panel-title"><strong>Importar notas por XML</strong></h3>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<strong>Escolha um arquivo XML</strong>
						<hr>
				            <input type="file" id="fileUpload" name="fileUpload">
				            <p class="help-block">Somente extensão .xml</p>
						<hr>
						<form id="ConvArqXMLDataSet.php" method="POST" enctype="multipart/form-data">
							<button type="submit" id="btnEnviar" class="btn btn-primary">Enviar</button>
					    	<button type="close" class="btn btn-default data-dismiss="modal"">Fechar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Modal para selecionar o XML via arquivo-->
	<!-- Modal para envio de e-mail -->
	<div class="modal fade bs-modal-sm-email-send" tabindex="-1" role="dialog" arial-labelledby="myLangeModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dimiss="modal" arial-label="close"><span arial-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myLangeModalLabel">Enviar nota por E-mail</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-xs-4">
								<form>
									<div class="form-group">
									   <label for="exemploEnvioEmail">Servidor SMTP</label>
									   <input type="email" class="form-control" id="servidorSmtp" placeholder="smtp.gmail.com" required autofocus tabindex="1">
									 </div>
									<div class="form-group">
									   <label for="exemploEnvioEmail">E-mail Remetente</label>
									   <input type="email" class="form-control" id="emailRemetente" placeholder="@gmail.com" required autofocus tabindex="2">
									 </div>
									<div class="form-group">
									   <label for="exemploEnvioEmail">E-mail Destinatário</label>
									   <input type="email" class="form-control" id="emailDestinatario" placeholder="@gmail.com" required autofocus tabindex="3">
									 </div>
									<div class="form-group">
									   <label for="exemploEnvioEmail">Usuário</label>
									   <input type="email" class="form-control" id="emailUsuario" placeholder="@gmail.com" required autofocus tabindex="3">
									 </div>
									<div class="form-group">
									   <label for="exemploEnvioEmail">Senha</label>
									   <input type="password" class="form-control" id="emailPassword" placeholder="Password" required autofocus tabindex="4">
									 </div>	
									 <div class="row">
									 	<div class='col-sm-6'>
									 		<div classa="form-group">
									 			<label for="exemploEnvioEmail">Porta</label>
									 			<input type="number" class="form-control" id="emailPorta" placeholder="587" value="587" required tabindex="5">
									 		</div>
									 	</div>
									 	<div class='col-sm-6'>
									 		<div classa="form-group">
									 			<label for="exemploEnvioEmail">Time Out</label>
									 			<input type="number" class="form-control" id="emailTimeOut" placeholder="30000" value="30000" required tabindex="6">
									 		</div>
									 	</div>
									 </div>								
					  			</form>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
								   <label for="exemploEnvioEmail">Chave Nota</label>
								   	<select class="form-control select-uf" id="chaveNota" required autofocus tabindex="7">	
										<?php 										
										foreach(glob("$spdNFe->DiretorioXmlDestinatario{*.xml}", GLOB_BRACE) as $value){ ?>
											<option><?= str_replace("C:\\xampp\\htdocs\\my portable files\\XMLDestinatario\\","",$value) ?></option>
										<?php } ?>
									</select>	
								 </div>
								 <div class="form-group">
								 	<div class="row">
								 		<div class="col-md-4">
								 			<label>
								 				<input type="checkbox" id="EmailAutenticacao" checked value="1"> Autenticação ?
								 			</label>
								 		</div>
								 		<div class="col-md-4">
								 			<label>
								 				<input type="checkbox" id="emailHtml" checked> E-mail HTML ?
								 			</label>
								 		</div>
								 		<div class="col-md-4">
								 			<label>
								 				<input type="checkbox" id="EmailCancelamento"> Cancelamento ?
								 			</label>
								 		</div>
								 	</div>
								 </div>
								 <div class="form-group">
							 		<label for="exemploEnvioEmail">Assunto</label>
							 		<input type="text" class="form-control" id="AssuntoEmail" placeholder="Assunto do email" required autofocus tabindex="8">
								 </div>
								 <div class="form-group">
								 	<label for="exemploEnvioEmail">Mensagem</label>
								 	<textarea class="form-control" rows="10" id="mensagemEmail" placeholder="Mensagem do e-mail" required autofocus tabindex="9"></textarea>								 	
								 </div>
							</div>
						</div>						  
					</form>
				</div>
				<div class="modal-footer">
        			<button type="button" class="btn btn-primary" id="enviarEmail">Enviar e-mail</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal para envio de e-mail -->
</body>
</html>