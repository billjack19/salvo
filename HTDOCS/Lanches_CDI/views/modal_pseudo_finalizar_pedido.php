<!-- ******************************************************************************************************** -->
<!-- Janala Pseudo Modal SubGrupo -->
<!-- ******************************************************************************************************** -->
<div class="blocoComplementoFinalizaPedido text-center" id="modalFinalizarPedido" style="display: none;">
	<div class="col-xs-12" >
		<h1 id="modalSubGrupoDescricao">Finalizar Pedido</h1>
	</div>
	<div style="position: absolute; margin-left: 80%; margin-top: -80px;">
		<button onclick="fecharModalModalFinalizaPedido();" class="btn btn-default">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</button>
	</div>
	<div id="tabelaSubGrupoModal" class="">
		<div class="col-xs-12" style="/*margin-top: -15px;*/">
			<table>
				<tr>
					<td width="50%">
						<div id="teacladoNumericoFinalizarPedido"></div>
						<input type="hidden" id="campoSelecionado" value="">
						<script type="text/javascript">
							gerarTecladoNumerico();
							function gerarTecladoNumerico(){
								var teclado = "<table class='table'>";
								var num = 1;
								for (var i = 0; i < 3; i++) {
									teclado += "<tr>";
									for (var j =  0; j < 3; j++) {
										teclado += 	"<td align=\"center\">";
										teclado += 		"<button class=\"btn btn-block\" onclick=\"acionarValorFinalizaPedido('"+num+"')\">";
										teclado +=			num;
										teclado +=		"</button>";
										teclado += 	"</td>";
										num++;
									}
									teclado += "</tr>";
								}
								teclado += 	"<tr>";
								teclado += 		"<td align=\"center\">";
								teclado += 			"<button id='apagarTextoFinaliza' class=\"btn btn-block\" onclick=\"acionarValorFinalizaPedido('<')\">";
								teclado += 				"<i class=\"fa fa-arrow-left\"></i>";
								teclado += 			"</button>";
								teclado += 		"</td>";
								teclado += 		"<td align=\"center\">";
								teclado += 			"<button class=\"btn btn-block\" onclick=\"acionarValorFinalizaPedido('0')\">";
								teclado +=				"0";
								teclado +=			"</button>";
								teclado += 		"</td>";
								teclado += 		"<td align=\"center\">";
								teclado += 			"<button class=\"btn btn-block\" onclick=\"adicionarVigulaFinalizaPedido();\">";
								teclado +=				"&nbsp;,&nbsp;";
								teclado +=			"</button>";
								teclado += 		"</td>";
								teclado += 	"</tr>";
								teclado += "</table>";
								document.getElementById("teacladoNumericoFinalizarPedido").innerHTML = teclado;
							}
						</script>
					</td><td>
						<table>
							<tr align="left">
								<td width="40%"><b>&nbsp;&nbsp;&nbsp;<!-- Valor --> Total</b></td>
								<td width="60%">
									<input type="text" id="valorTotal_ModalFinalizaPedido" class="form-control" style="text-align:right;" disabled>
								</td>
							</tr>
							<!-- <tr align="left">
								<td><b>&nbsp;&nbsp;&nbsp; Valor Entrega</b></td>
								<td>
									<div class="input-group">
										<span class="input-group-addon" onclick="alterarTipoDesconto()" style="font-size: 15px;" id="tipoDescontoIcon">
											<b>R$</b>
										</span>
										<input type="text" id="valorEntrega_ModalFinalizaPedido" value="0" onkeyup="this.value = removerCaracter(this.value);limitarValorNum('valorEntrega_ModalFinalizaPedido', 10);calcularValorTotalModalFinalizarPedido()" onfocus="$('#campoSelecionado').val('valorEntrega_ModalFinalizaPedido')" style="text-align:right;" class="form-control">
									</div>
								</td>
							</tr> -->
							<tr align="left">
								<td><b>&nbsp;&nbsp;&nbsp;<!-- Valor --> Desconto</b></td>
								<td>
									<div class="input-group">
										<span class="input-group-addon" onclick="alterarTipoDesconto()" style="font-size: 15px;" id="tipoDescontoIcon">
											<b>R$</b>
										</span>
										<input type="text" id="valorDesconto_ModalFinalizaPedido" value="0" onkeyup="this.value = removerCaracter(this.value);limitarValorNum('valorDesconto_ModalFinalizaPedido', 10);calcularValorTotalModalFinalizarPedido()" onfocus="$('#campoSelecionado').val('valorDesconto_ModalFinalizaPedido')" style="text-align:right;" class="form-control">
									</div>
								</td>
							</tr>
							<tr align="left">
								<td><b>&nbsp;&nbsp;&nbsp;<!-- Valor --> à Pagar</b></td>
								<td><input type="text" id="valorPagar_ModalFinalizaPedido" class="form-control" style="text-align:right;" disabled></td>
							</tr>
							<tr align="left">
								<td><b>&nbsp;&nbsp;&nbsp;Troco</b></td>
								<td><input type="text" id="troco_ModalFinalizaPedido" class="form-control" style="text-align:right;" disabled></td>
							</tr>
						</table>
						<!-- <br> -->
						<table class="table" style="margin-top: 2px;">
							<tr>
								<td width="50%">
									<button class="btn btn-success btn-block" onclick="preFinalizacaoPedido();" id="btn_finalizarPedido" style="padding: 0px;" disabled>
										<i class="fa fa-check"></i><br>
										Finalizar
									</button>
								</td>
								<!-- <td width="33%">
									<button class="btn btn-primary btn-block" id="btn_imprimirPedido" onclick="imprimirTelaImpressao();" style="padding: 0px;" disabled>
										<i class="fa fa-print"></i><br>
										Imprimir
									</button>
								</td> -->
								<td width="50%">
									<button class="btn btn-danger btn-block" onclick="cancelarPedido()" style="padding: 0px;">
										<i class="fa fa-times"></i><br>
										Cancelar
									</button>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>


		<div class="col-xs-12">
			<div style="background-color: #337ab7;width: 100%;color: white;border-style: solid;border-radius: 10px;">
				<span  style="padding: 0;">
					<h2 class='text-center' style='margin: 0px;'>Formas de Pagamento</h2>
				</span>
			</div>
			<div style="border-style: solid;border-radius: 10px;">
				<table class="table">
					<tr>
						<td>
							Dinheiro
							<div class="input-group">
								<span class="input-group-addon" style="font-size: 15px;">
									<b>R$</b>
								</span>
								<input type="text" id="dinheiro_ModalFinalizaPedido" onkeyup="this.value = removerCaracter(this.value);limitarValorNum('dinheiro_ModalFinalizaPedido', 10);calcularValorTotalModalFinalizarPedido();" onfocus="$('#campoSelecionado').val('dinheiro_ModalFinalizaPedido')" maxlength="10" value="0" style="text-align:right;" class="form-control">
							</div>
						</td>
						<td>
							Cartão de Débito
							<div class="input-group">
								<span class="input-group-addon" style="font-size: 15px;">
									<b>R$</b>
								</span>
								<input type="text" id="cartaoDebito_ModalFinalizaPedido" onkeyup="this.value = removerCaracter(this.value);limitarValorNum('cartaoDebito_ModalFinalizaPedido', 10);calcularValorTotalModalFinalizarPedido()" onfocus="$('#campoSelecionado').val('cartaoDebito_ModalFinalizaPedido')" maxlength="10" value="0" style="text-align:right;" class="form-control">
							</div>
						</td>
						<td>
							Cartão de Crédito
							<div class="input-group">
								<span class="input-group-addon" style="font-size: 15px;">
									<b>R$</b>
								</span>
								<input type="text" id="cartaoCredito_ModalFinalizaPedido" onkeyup="this.value = removerCaracter(this.value);limitarValorNum('cartaoCredito_ModalFinalizaPedido', 10);calcularValorTotalModalFinalizarPedido()" onfocus="$('#campoSelecionado').val('cartaoCredito_ModalFinalizaPedido')" maxlength="10" value="0" style="text-align:right;" class="form-control">
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>



<!-- Modal finalizar pedido nome e telefone -->
<div class="modal fade" id="modalFinalizarNomeTelefone" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Finaliza Pedido:</h4>
			</div>
			<div class="modal-body">
				<div>
					<label class="label-float" for="name">Nome: <span style="color: red;">*</span></label>
					<input id="modalFinalizar_Nome" maxlength="50" type="tel" class="form-control" required>

					<label class="label-float" for="name">Telefone: <span style="color: red;">*</span></label>
					<input id="modalFinalizar_Telefone" maxlength="25" type="tel" class="form-control" required>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="mandarFinalizarPedido()">
					Finalizar Pedido
				</button>
				<button type="button" class="btn btn-default" id="btn_fecha_modalNomeContato" data-dismiss="modal">
					Fechar
				</button>
			</div>
		</div>
	</div>
</div>








<!-- Modal pesquisar cliente por todo -->
<div class="modal fade" id="modalpesquisaCliente" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Finaliza Pedido:</h4>
			</div>
			<div class="modal-body">
				<div>
					<label class="label-float" for="name">Nome: <span style="color: red;">*</span></label>
					<input id="modalFinalizar_Nome" maxlength="50" type="tel" class="form-control" required>

					<label class="label-float" for="name">Telefone: <span style="color: red;">*</span></label>
					<input id="modalFinalizar_Telefone" maxlength="25" type="tel" class="form-control" required>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="mandarFinalizarPedido()">
					Finalizar Pedido
				</button>
				<button type="button" class="btn btn-default" id="btn_fecha_modalNomeContato" data-dismiss="modal">
					Fechar
				</button>
			</div>
		</div>
	</div>
</div>








<!-- Modal cadastro cliente (modal_pseudo_finaliza_pedido) -->
<div class="modal fade col-xs-12" id="modalCadastroCliente" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cadastrar Cliente:</h4>
			</div>
			<div class="modal-body">
				<div class="col-xs-12">
					<div class="col-xs-6">
						Nome <span style="color: red">*</span>
						<input type="text" class="form-control" id="nomeCliente_Cadastro">
					</div>
					<div class="col-xs-6" style="opacity: 0;">
						Telefone <span style="color: red" name="obrigatorioDeliver"></span>
						<input type="text" class="form-control" disabled="true">
					</div>
					<div class="col-xs-6">
						Endereço <span style="color: red" name="obrigatorioDeliver"></span>
						<input type="text" id="enderecoCliente_Cadastro" class="form-control">
					</div>
					<div class="col-xs-6">
						Bairro <span style="color: red" name="obrigatorioDeliver"></span>
						<input type="text" id="bairroCliente_Cadastro" class="form-control">
					</div>
					<div class="col-xs-6">
						Cidade <span style="color: red" name="obrigatorioDeliver"></span>
						<input type="text" id="cidadeCliente_Cadastro" class="form-control">
					</div>
					<div class="col-xs-6">
						Cep <span style="color: red" name="obrigatorioDeliver"></span>
						<input type="text" id="cepCliente_Cadastro" class="form-control">
					</div>
				</div>
				<br><br><br><br><br><br><br>
				<div class="col-xs-12">
					<!-- <br><br> -->
					<div class="text-center" style="margin-top: 12px;">
						<h4 class="text-centert">Telefones:</h4>
					</div>
					<!-- <br> -->
					<div class="col-xs-6">
						<button class="btn btn-block btn-success" onclick="adicionarTelefone()">
							<i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar Telefone
						</button>
					</div>
					<div class="col-xs-6">
						<button class="btn btn-default" onclick="removerTelefone()">
							<i class="fa fa-minus"></i>&nbsp;&nbsp;Remover Telefone
						</button>
					</div>
					<div id="arrayTelefoneElemento">
						<div class="col-xs-6" id="telefone_1">
							Telefone <span style="color: red" name="obrigatorioDeliver"></span>
							<input type="text" name="telefoneCliente_cadastro" class="form-control">
						</div>
					</div>
				</div>
				<br><br><br><br><br><br><br>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" onclick="gravarClienteBd()">
						<i class="fa fa-floppy-o"></i>&nbsp;
							Salvar
					</button>
				<button type="button" class="btn btn-default" id="btn_fecha_modalPasquisaCliente" onclick="apagaItensModalAdicionaCliente()" data-dismiss="modal">
					<i class="fa fa-times"></i>&nbsp;
					Fechar
				</button>
			</div>
		</div>
	</div>
</div>


<!-- Scripts Para Moldal de Pesquisa de Usuario -->
<script type="text/javascript">
	var numRegistroTelefoneSetados = 1;
	function adicionarTelefone(){
		if (numRegistroTelefoneSetados < 5) {
			numRegistroTelefoneSetados++;
			var elementoTelefone = "";
			elementoTelefone +=	"<div class=\"col-xs-6\" id=\"telefone_"+numRegistroTelefoneSetados+"\">";
			elementoTelefone +=		"Telefone <span style=\"color: red\" name=\"obrigatorioDeliver\"></span>";
			elementoTelefone +=		"<input type=\"text\" name=\"telefoneCliente_cadastro\" class=\"form-control\">";
			elementoTelefone +=	"</div>";
			$("#arrayTelefoneElemento").html($("#arrayTelefoneElemento").html()+elementoTelefone);
		} else {
			toastGeral("error", "Você pode inserir mais que quatro telefones!");
		}
	}

	function removerTelefone(){
		if (numRegistroTelefoneSetados != 1) {
			$("#telefone_"+numRegistroTelefoneSetados).remove();
			numRegistroTelefoneSetados--;
		} else {
			toastGeral("error", "Você não pode remover mais telefones");
		}
	}

	function gravarClienteBd(){
		var nomeCliente_Cadastro = $("#nomeCliente_Cadastro").val();
		var telefoneCliente_cadastro = document.getElementsByName("telefoneCliente_cadastro");
		var enderecoCliente_Cadastro = $("#enderecoCliente_Cadastro").val();
		var bairroCliente_Cadastro = $("#bairroCliente_Cadastro").val();
		var cidadeCliente_Cadastro = $("#cidadeCliente_Cadastro").val();
		var cepCliente_Cadastro = $("#cepCliente_Cadastro").val();

		var araryTelefoneJson = [];
		for (var i = 0; i < telefoneCliente_cadastro.length; i++) {
			araryTelefoneJson.push({teleofne: telefoneCliente_cadastro[i].value});
		}

		if (nomeCliente_Cadastro != "") {
			var user = {
				codigo: 0,
				razaoSocial: nomeCliente_Cadastro,
				telefone: araryTelefoneJson, //[{telefone: telefoneCliente_cadastro}],
				endereco: enderecoCliente_Cadastro,
				bairro: bairroCliente_Cadastro,
				cidade: cidadeCliente_Cadastro,
				estado: "",
				cep: cepCliente_Cadastro
			};

			$.ajax({
				type: 'POST',
				cache: false,
				url: urlWebService+"ClienteWs/inserir",
				dataType: "text",
				contentType: "application/json; charset=utf-8",
				data: JSON.stringify(user)
			}).done( function(data){
				console.log(data);
				if (data != "0" && data != 0) {
					toastGeral("success", "Cliente cadastrado com sucesso!");

					$("#clienteInputList-flexdatalist").val($("#nomeCliente_Cadastro").val());
					document.getElementById("clienteInputList-flexdatalist").disabled = true;
					$("#clienteInputList").val(data);
					
					document.getElementById("btn_fecha_modalPasquisaCliente").click();
				} else {
					toastGeral("error", "Erro: " + data);
				}
			});
		}
	}

	function apagaItensModalAdicionaCliente(){
		$("#nomeCliente_Cadastro").val("");
		$("#telefoneCliente_cadastro").val("");
		$("#enderecoCliente_Cadastro").val("");
		$("#bairroCliente_Cadastro").val("");
		$("#cidadeCliente_Cadastro").val("");
		$("#cepCliente_Cadastro").val("");
	}


	$('#modalpesquisaCliente').on('shown.bs.modal', function () {
		$("#pesquisaClienteInput").val("");
		$('#pesquisaClienteInput').focus();
		pesquisarClienteManeiraGeral("");
	});

	function pesquisarClienteManeiraGeral(search){
		var carregando = "<div class='text-center'>";
		carregando += "<br><h4>Carregando&nbsp;&nbsp;&nbsp;<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></h4>";
		carregando += "</div>";
		$("#resultadoPesquisa").html(carregando);

		var resultado = "";
		/* AJAX para busca de cliente */
		var user = { "razaoSocial": search };
		$.ajax({
			type: 'POST',
			cache: false,
			url: urlWebService+"ClienteWs/perquisar",
			dataType: "text",
			contentType: "application/json; charset=utf-8",
			data: JSON.stringify(user)
		}).done( function(data){
			var arrayJson = JSON.parse(data);
			if (arrayJson.length == 0) {
				resultado = "<h3>Nenhum resultado encontrado</h3>";
			} else {

				resultado += "<table class='table'>";
				resultado += 	"<tr>";
				resultado += 		"<td><b>Codigo</b></td>";
				resultado += 		"<td><b>Razão Social</b></td>";
				resultado += 		"<td><b>Telefone</b></td>";
				resultado += 	"</tr>";

				for(i in arrayJson){
					resultado += 	"<tr onclick='setarClienteDeBuscarPedido("+arrayJson[i].codigo+", \""+arrayJson[i].razaoSocial+"\");'>";
					resultado += 		"<td>"+arrayJson[i].codigo+"</td>";
					resultado += 		"<td>"+arrayJson[i].razaoSocial+"</td>";
					resultado += 		"<td>"+arrayJson[i].telefone+"</td>";
					resultado += 	"</tr>";
				}

				resultado += "</table>";
			}

			$("#resultadoPesquisa").html(resultado);
		});
	}

	function setarClienteDeBuscarPedido(codigo, nome){
		document.getElementById("clienteInputList-flexdatalist").value = nome;
		document.getElementById("clienteInputList").value = codigo;
		document.getElementById("btn_fecha_modalPasquisaCliente").click();
		setarClientePedido(codigo);
	}
</script>





<script type="text/javascript">

	/* Função para fazer o click do apagar os texto do modal de finaliar o pedido segurando o botão */
	var intervalId = false;
	function apagarDireto(){
		setInterval(function(){if(intervalId)acionarValorFinalizaPedido('<')}, 500);
	} apagarDireto();
	$('#apagarTextoFinaliza').on('mousedown', function(){intervalId = true;});
	$('#apagarTextoFinaliza').on('mouseup',   function(){intervalId = false;});


	function preFinalizacaoPedido(){
		console.log("preFinalizacaoPedido");
		var cliente = $("#clienteInputList").val();
		var filial = $("#filial").val();
		var documento = $("#documentoGeral").val();

		$.ajax({
			type: 'GET',
			url: urlWebService+"MesaWs/retornaClientePeddio/"+filial+"/"+documento+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			console.log(data);
			$("#modalFinalizar_Nome").val("");
			$("#modalFinalizar_Telefone").val("");
			/* for (i in data) { */
				if (data.filial != 0 && data.filial != codigoConsumidor){
					if (data.nome != " ") 		$("#modalFinalizar_Nome").val(data.nome);
					if (data.telefone != " ") 	$("#modalFinalizar_Telefone").val(data.telefone);
				}
			/* } */
			$("#modalFinalizarNomeTelefone").modal("show");
		});
	}
	$('#modalFinalizarNomeTelefone').on('shown.bs.modal', function () {
		$('#modalFinalizar_Nome').focus();
	});

	function mandarFinalizarPedido(){
		var nome = $("#modalFinalizar_Nome").val();
		var contato = $("#modalFinalizar_Telefone").val();
		if (nome != "" && contato != "") {
			finalizarPedidoAcao(nome, contato);
			document.getElementById("btn_fecha_modalNomeContato").click();
		} else {
			toastGeral("error", "Preencha todos os dados!");
		}
	}




	function adicionarVigulaFinalizaPedido(){
		var campo = $("#campoSelecionado").val();
		if (campo != "") {
			var valorCampo  = document.getElementById(campo).value;
			valorCampo = valorCampo.split(",");
			if(valorCampo.length == 1) valorCampo += ",";
			document.getElementById(campo).value = valorCampo;
		}
	}

	function acionarValorFinalizaPedido(valor){
		var campo = $("#campoSelecionado").val();
		var valorCampo  = document.getElementById(campo).value;
		/* valorCampo = formataValorParaCalcular2(valorCampo);
		console.log(valorCampo);*/
		if (campo != "") {
			if (valor == "<") {
				valorCampo = valorCampo.substring(0, valorCampo.length - 1);
				if (valorCampo == "") valorCampo = "0";
				document.getElementById(campo).value = valorCampo;
			}
			/* else if (valorCampo.length > 10) { */
			else if (valorCampo == 0) {
				document.getElementById(campo).value = valor;
			}else {
				document.getElementById(campo).value += valor;
			}
			/* } */
		}
		calcularValorTotalModalFinalizarPedido();
	}


	var percentualMaximoDesconto = 13;
	function calcularValorTotalModalFinalizarPedido(){
		var valorPagar = 0;
		var troco = 0;

		var valorTotal = $("#valorTotal_ModalFinalizaPedido").val();
		valorTotal = formataValorParaCalcular2(valorTotal);
		
		/*var valorEntrega = $("#valorEntrega_ModalFinalizaPedido").val();
		valorEntrega = formatarValorCamposFinaliza(valorEntrega);*/

		var valorDesconto = $("#valorDesconto_ModalFinalizaPedido").val();
		valorDesconto = formatarValorCamposFinaliza(valorDesconto);

		var dinheiro = $("#dinheiro_ModalFinalizaPedido").val();
		dinheiro = formatarValorCamposFinaliza(dinheiro);

		var cartaoDebito = $("#cartaoDebito_ModalFinalizaPedido").val();
		cartaoDebito = formatarValorCamposFinaliza(cartaoDebito);

		var cartaoCredito = $("#cartaoCredito_ModalFinalizaPedido").val();
		cartaoCredito = formatarValorCamposFinaliza(cartaoCredito);

		
		/* Limite de desconto */
		if ($("#tipoDescontoIcon").html() == "<b>%</b>") {
			if (valorDesconto > percentualMaximoDesconto) {
				valorDesconto = percentualMaximoDesconto;
				$("#valorDesconto_ModalFinalizaPedido").val(percentualMaximoDesconto);
			} 
			valorDesconto = (valorTotal * valorDesconto) / 100;
		}
		else if ( (valorDesconto * 100) / valorTotal > percentualMaximoDesconto){
			valorDesconto = (valorTotal * percentualMaximoDesconto) / 100;
			$("#valorDesconto_ModalFinalizaPedido").val(formatarValorParaDecimal2Finaliza(valorDesconto));
		}
		valorPagar = valorTotal - valorDesconto; /* + valorEntrega; */

		

		/* Soma dos valores do cortão de credido com o de debito não podem ser maior que o valor a pagar */
		if (cartaoDebito + cartaoCredito >= valorPagar) {
			if (cartaoDebito > cartaoCredito) {
				cartaoDebito = descontaValorCartao(cartaoDebito, cartaoCredito, valorPagar);
			} else {
				cartaoCredito = descontaValorCartao(cartaoCredito, cartaoDebito, valorPagar);
			}
			dinheiro = 0;
		}
		/*else if (dinheiro >= valorPagar) {
			cartaoCredito = 0;
			cartaoDebito = 0;
		}*/

		troco = (dinheiro + cartaoDebito + cartaoCredito) - valorPagar;

		$("#dinheiro_ModalFinalizaPedido").val(formatarValorParaDecimal2Finaliza(dinheiro));
		$("#cartaoDebito_ModalFinalizaPedido").val(formatarValorParaDecimal2Finaliza(cartaoDebito));
		$("#cartaoCredito_ModalFinalizaPedido").val(formatarValorParaDecimal2Finaliza(cartaoCredito));

		if (troco >= 0) {
			document.getElementById("btn_finalizarPedido").disabled = false;
			/* document.getElementById("btn_imprimirPedido").disabled = false; */
		}
		else {
			document.getElementById("btn_finalizarPedido").disabled = true;
			/* document.getElementById("btn_imprimirPedido").disabled = true; */
		}


		valorPagar = formataValorParaImprimir(valorPagar);
		troco = formataValorParaImprimir(troco);

		$("#valorPagar_ModalFinalizaPedido").val(valorPagar);
		$("#troco_ModalFinalizaPedido").val(troco);
	}

	function descontaValorCartao(cartaoInicial, cartaoFinal, valorTotal){
		cartaoInicial -= ((cartaoInicial + cartaoFinal) - valorTotal);
		cartaoInicial = cartaoInicial.toFixed(2);
		cartaoInicial = parseFloat(cartaoInicial);
		return cartaoInicial;
	}

	function formatarValorCamposFinaliza(valor){
		if(valor == "") valor = 0;
		/* document.getElementById(idCampo).value = valor;
		$("#valor_ModalFinalizaPedido").val(valor);*/
		valor = valor.replace(",", ".");
		valor = parseFloat(valor);
		return valor;
	}
	function formatarValorParaDecimal2Finaliza(valor){	
		valor = String(valor);
		/* valor = valor.toFixed(2); */
		valor = valor.replace(".", ",");
		/* valor = "R$ "+valor; */
		return valor;
	}


	function alterarTipoDesconto(){
		var tipoDesconto =  $("#tipoDescontoIcon").html();
		if(tipoDesconto == "<b>%</b>") tipoDesconto = "<b>R$</b>";
		else tipoDesconto = "<b>%</b>";
		$("#tipoDescontoIcon").html(tipoDesconto);
		calcularValorTotalModalFinalizarPedido();
	}


	function cancelarPedido(){
		var filial = $("#filial").val();
		var documento = $("#documentoGeral").val();
		if ($("#documentoGeral").val() != "0") {
			bootbox.confirm({
				title: "Tem certeza que deseja cancelar este pedido?",
				message: "Ao aperta o botão \"Sim\" você irá cancelar este pedido",
				buttons: {
					confirm: {
						label: 'Sim',
						className: 'btn-success'
					},
					cancel: {
						label: 'Não',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if (result) {
						$.ajax({
							type: 'GET',
							url: urlWebService+"MesaWs/cancelarPedido/"+filial+"/"+documento+parametrosWebService,
							contentType: "application/json",
							dataType: 'text',
							jsonpCallback: "localJsonpCallback"
						}).done(function(data){
							abrirTelaPedido('talaPedidos');
							fecharModalModalFinalizaPedido();
							novoPedido();
						});
					}
				}
			});
		} else toastGeral("error", "Nenhum pedido selecionado");
	}

	function cancelarPedidoDocumento(documento){
		var filial = $("#filial").val();

		bootbox.confirm({
			title: "Tem certeza que deseja cancelar este pedido?",
			message: "Ao aperta o botão \"Sim\" você irá cancelar este pedido",
			buttons: {
				confirm: {
					label: 'Sim',
					className: 'btn-success'
				},
				cancel: {
					label: 'Não',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if (result) {
					$.ajax({
						type: 'GET',
						url: urlWebService+"MesaWs/cancelarPedido/"+filial+"/"+documento+parametrosWebService,
						contentType: "application/json",
						dataType: 'text',
						jsonpCallback: "localJsonpCallback"
					}).done(function(data){
						abrirTelaPedido('talaPedidos');
						fecharModalModalFinalizaPedido();
						novoPedido();
					});
				}
			}
		});
	}

	function fecharModalModalFinalizaPedido(){
		$("#valorDesconto_ModalFinalizaPedido").val("0");
		$("#dinheiro_ModalFinalizaPedido").val("0");
		$("#cartaoDebito_ModalFinalizaPedido").val("0");
		$("#cartaoCredito_ModalFinalizaPedido").val("0");
		document.getElementById('modalFinalizarPedido').style.display='none';
	}
</script>

<style type="text/css">
	.blocoComplementoFinalizaPedido{
		height: 80%;
		background-color: #fbfbfb;
		padding-right: 15px;
		box-shadow: 5px 5px 5px 5px #555;
		border-radius: 5px;
		width: 55%;
		position: absolute;
		margin-top: 120px;
		margin-left: 2%;
		/*margin-right: 2%;*/
	}
</style>