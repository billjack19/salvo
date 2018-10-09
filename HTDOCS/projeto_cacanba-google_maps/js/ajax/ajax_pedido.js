function montarViewAdicionaPedido(){
	subirPagina();
	var motarSubMenu = "";
	var resultado = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"ClienteWs/listar/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){

		botaVoltarMenuPrincipal();
		// motarSubMenu += "<br><div class='text-left' style='margin-top: 15px;'>";
		// motarSubMenu += "	<button onclick='setStatus(\"incial\");n_editar();montarMenuPrincipal()' class='btn btn-block btn-info' title='Voltar'>";
		// motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
		// motarSubMenu += "		Voltar";
		// motarSubMenu += "	</button>";
		// motarSubMenu += "</div>";

		if (data.length == 0) {
			motarSubMenu += "<br>Não tem nenhum registro de Cliente no Servidor!";
		} else {
			resultado = data;

			motarSubMenu += "<br><br><form id='formAdicionaPedido'>";
			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<table class='table' width='100%'>";

			motarSubMenu += "<tr><td colspan='3'  onclick='document.getElementById(\"checkboxConsumidor\").click();'>";

			motarSubMenu += "<input type='hidden' value='0' id='selectConsumidorBootBox'>";


			motarSubMenu += "<div id='divCheckConsumidor'>";
			
			// motarSubMenu += "<table><tr><td>";
			motarSubMenu += "<h4>Consumidor: <span id='situacaoConsumidor'></span>";
			// motarSubMenu += "</td><td>";
			motarSubMenu += "<input class='hidden' type='checkbox' style='font-size:100px;' id='checkboxConsumidor' onclick='confereCheckConsumidor();'>";
			// motarSubMenu += "</td></tr></table>";
			motarSubMenu += "</h4>";

			motarSubMenu += "</div>";


			motarSubMenu += "</td></tr>";

			motarSubMenu += "<tr><td colspan='3'>";

			motarSubMenu += "<h4>Cliente</h4>";

			motarSubMenu += "<div id='inputCampoClienteData'>";

			motarSubMenu += "<input type='text' id='clienteInputList'";
			motarSubMenu += "class='flexdatalist form-control'";
			motarSubMenu += "data-min-length='0' data-visible-properties='[\"razaoSocial\"]'";
			motarSubMenu += "data-selection-required='true' data-value-property='codigo'";
			motarSubMenu += "list='clienteDataList' required>";

			motarSubMenu += "</div>";

			motarSubMenu += "</td></tr>";


			motarSubMenu += "<tr><td colspan='3'>";
			if ($("#fichaPesquisa").val() == 0) {
				motarSubMenu += "<h4>Ficha</h4>";
				motarSubMenu += "<input type='number' id='ficha' maxlength='6' class='form-control'>";
			} else {
				var numeroPesquisadoFicha = $("#fichaPesquisa").val();
				motarSubMenu += "<h4>Ficha</h4>";
				motarSubMenu += "<input type='number' value='"+numeroPesquisadoFicha+"' id='ficha' maxlength='6' class='form-control'>";
			}

			motarSubMenu += "<tr><td>";

			motarSubMenu += "<h4>Emissão</h4>";
			var dataAtual = pegarData();
			motarSubMenu += "<input type='date' id='emissao' value='"+dataAtual+"' class='form-control' disabled>";

			motarSubMenu += "</td><td>";
			motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			motarSubMenu += "</td><td>";


			motarSubMenu += "<h4>Total</h4>";
			motarSubMenu += "<input type='text' style='text-align: right;' id='totalPedido' rel='dinheiro' value='R$ 0,00' class='form-control' disabled>";


			motarSubMenu += "</td></tr></table><br><br>";

			motarSubMenu += "</div>";
			motarSubMenu += "</form>";
			motarSubMenu += "<table class='table'><tr>";
			motarSubMenu += "<td align='left' style='padding-top:1px;padding-bottom:1px;'>";

			// motarSubMenu += "<button class='btn btn-warning btn-block' ";
			// motarSubMenu += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha1\")'>";
			// motarSubMenu += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "Ficha";
			// motarSubMenu += "</button>";

			motarSubMenu += "</td></tr></table>";

			if ($("#editar").val() == 0) {

				var montarListaPedido = "<div id='botaoAdicionarPedidoUmaVez' class='text-center'>";
				montarListaPedido += "<button id='buttonAdicionaPedido' class='btn btn-success btn-block' onclick='adicionaPedido()'>";
				montarListaPedido += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;";
				montarListaPedido += "Adicionar Pedido";
				montarListaPedido += "</button>";
				montarListaPedido += "</div>";

			} else {
				var montarListaPedido = "";
				var lancPedidoId = $("#editar").val();
				montarListaItem(lancPedidoId);
			}
		}

		$("#cabecarioPrincipal").html(motarSubMenu);
		$("#listaPagina").html(montarListaPedido+"<br><br><br>");
		setarValorClienteInputList(resultado);
		document.getElementById("checkboxConsumidor").click();
		// perguntarConsumidor();

	});
}

function confereCheckConsumidor(){
	var check = document.getElementById("checkboxConsumidor").checked;
	if (check) {
		document.getElementById("clienteInputList-flexdatalist").disabled = true;
		document.getElementById("clienteInputList-flexdatalist").value = "CONSUMIDOR";
		$("#situacaoConsumidor").html("Sim");
	} else {
		document.getElementById("clienteInputList-flexdatalist").value = "";
		document.getElementById("clienteInputList-flexdatalist").disabled = false;
		document.getElementById("clienteInputList-flexdatalist").focus();
		$("#situacaoConsumidor").html("Não");
	}
}


function setarValorClienteInputList(elJSON){
	$('#clienteInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'codigo',
		searchIn: 'razaoSocial',
		minLength: 1,
		data: elJSON
	});
}

function adicionaPedido(){
	var carregando = "<h4>Carregando&nbsp;&nbsp;&nbsp;<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></h4>";
	$("#botaoAdicionarPedidoUmaVez").html(carregando);

	var nome = $("#clienteInputList").val();
	var selectConsumidorBootBox = $("#selectConsumidorBootBox").val();
	var valido = false;
	var clienteId = "";

	if (selectConsumidorBootBox == 1) {
		clienteId = "1";
	} else {
		var check = document.getElementById("checkboxConsumidor").checked;
		if (!check) {
			if (nome != "") {
				clienteId = nome;
				document.getElementById("clienteInputList-flexdatalist").disabled = true;
			} else {
				clienteId = "0";
			}
		} else {
			clienteId = "1";
		}
	}

	var ficha = $("#ficha").val();
	if (ficha != "") {
		valido = true;
	}

	if (valido && clienteId != "0") {
		var emissao = $("#emissao").val();


		$.ajax({
			type: 'GET',
			url: urlWebService+"PedidoWS/listarFichaAnteriorId/"+ficha+"/"+emissao+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){

			if (data.length == 0) {


				$.ajax({
					type: 'GET',
					url: urlWebService+"PedidoWS/listarFichaId/"+ficha+"/"+emissao+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){
					if (data != 0) {

						setStatus("pagina2");
						editarId(data);
						montarListaItem(data);
						$.toast({
							text: "Ficha em aberto!", 
							heading: 'Atenção!!!', 
							icon: 'error', 
							showHideTransition: 'slide', 
							allowToastClose: true, 
							hideAfter: 2500, 
							stack: 5, 
							position: 'top-right',
							extAlign: 'right',
							loader: true,
							loaderBg: '#44f'
						});

					} else {
						document.getElementById("ficha").disabled = true;

						var filial = 10;
						var total = $("#totalPedido").val();
						var vendedor = $("#vendedor").val();

						total = total.replace("R$", "");
						total = total.replace(",", ".");

						var identificacao = $("#identificador").val();
						var flagImpressao = 0;

						// Codigo para adicionar pedido
						var user = { 
								"filial": filial, 
								"ficha": ficha, 
								"emissao": emissao, 
								"total": total, 
								"cliente": clienteId, 
								"identificacao": identificacao, 
								"flagImpressao": flagImpressao,
								"vendedor": vendedor
							};
						// console.log(user);
						$.ajax({
							type: 'POST',
							cache: false,
							url: urlWebService+"PedidoWS/inserir",
							dataType: "json",
							contentType: "application/json; charset=utf-8",
							data: JSON.stringify(user)
						}).done( function(data){
							if (data == "0") {
								$.toast({
									text: "Erro ao adicinar pedido!", 
									heading: 'Falha', 
									icon: 'error', 
									showHideTransition: 'slide', 
									allowToastClose: true, 
									hideAfter: 2500, 
									stack: 5, 
									position: 'top-right',
									extAlign: 'right',
									loader: true,
									loaderBg: '#44f'
								});
							} else {
								editarId(data);
								montarListaItem(data);
							}
						});
					}
				});

			} else {
				$("#modalCampoFichaPedido").val(ficha);
				motarviewConsultarFicha();
			}
		});


	} else {
		$.toast({
			text: "Verifique se todos os dados foram preenchidos!", 
			heading: 'Falha', 
			icon: 'error', 
			showHideTransition: 'slide', 
			allowToastClose: true, 
			hideAfter: 2500, 
			stack: 5, 
			position: 'top-right',
			extAlign: 'right',
			loader: true,
			loaderBg: '#44f'
		});
	}
}


function montarListaItem(lancPedidoId){
	var motarSubMenu = "";
	var valorTotalPedido = 0;
	var documentoGeral = "";
	var emissaoItem = 0;

	// Monta cabeçario do pedido
	$.ajax({
		type: 'GET',
		url: urlWebService+"PedidoWS/listarId/"+lancPedidoId+"/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		for(i in data){
			documentoGeral = data[i].documento;

			valorTotalPedido = data[i].total;
			valorTotalPedido = formataValorParaImprimir(valorTotalPedido);

			botaVoltarMenuPrincipal();
			// motarSubMenu += "<h2 class='text-center'>Pedido</h2>";
			// motarSubMenu += "<br><div class='text-left' style='margin-top: 15px;'>";
			// motarSubMenu += "	<button onclick='setStatus(\"inicial\");n_editar();montarMenuPrincipal()' class='btn btn-block btn-info' title='Voltar'>";
			// motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "		Voltar";
			// motarSubMenu += "	</button>";
			// motarSubMenu += "</div>";

			motarSubMenu += "<br><br><div class='col-md-12'>";
			motarSubMenu += "<table><tr>";				

			motarSubMenu += "<td colspan='3'>";

			motarSubMenu += "<h2>Ficha: "+data[i].ficha+"</h2>";

			// motarSubMenu += "<br><button class='btn btn-warning btn-block' ";
			// motarSubMenu += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha1\")'>";
			// motarSubMenu += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "Ficha";
			// motarSubMenu += "</button>";

			// motarSubMenu += "<h4>Documento</h4>";
			// motarSubMenu += "<input type='text' id='documentoInputList' value='"+data[i].documento+"' class='form-control' disabled>";

			motarSubMenu += "</td></tr><tr><td>";


			emissaoItem = data[i].emissao;
			emissaoItem = emissaoItem.replace(" 00:00:00.0", "");
			emissaoItem = formatarData(emissaoItem);
			motarSubMenu += "<h4>Emissão</h4>";
			motarSubMenu += "<input type='text' id='emissaoInputList' value='"+emissaoItem+"' class='form-control' disabled>";

			
			motarSubMenu += "</td><td>";
			// motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			// motarSubMenu += "</td><td>";


			motarSubMenu += "<h4>Valor Total</h4>";
			motarSubMenu += "<input type='text' style='text-align: right;' id='valorTotalPedidoInputList' value='"+valorTotalPedido+"' class='form-control' disabled>";

			motarSubMenu += "</td></tr><tr>";

			motarSubMenu += "<td colspan='3'>";

			motarSubMenu += "<h4>Cliente</h4>";
			motarSubMenu += "<input type='text' id='clienteInputList' value='"+data[i].razaoSocial+"' class='form-control' disabled>";
			
			motarSubMenu += "</td>";
			// motarSubMenu += "<td>";
			// motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			// motarSubMenu += "</td><td>";

			// motarSubMenu += "<h4>Ficha</h4>";
			// motarSubMenu += "<input type='text' id='fichaInputList' value='"+data[i].ficha+"' class='form-control' disabled>";

			// motarSubMenu += "</td>";

			motarSubMenu += "</tr><tr><td colspan='3'>";

			

			motarSubMenu += "</td></tr><tr>";

			// motarSubMenu += "<td colspan='3'>";

			// motarSubMenu += "	<br><button onclick='finalizarPedido("+data[i].idLancPedido+")' class='btn btn-block btn-success' title='Voltar'>";
			// motarSubMenu += "		<i class='fa fa-check' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "		Finalizar pedido";
			// motarSubMenu += "	</button>";

			// motarSubMenu += "</td>";

			"</tr></table><br>";
			motarSubMenu += "</div>";
			// motarSubMenu += "<br><hr>";
		}
		$("#cabecarioPrincipal").html(motarSubMenu);
		$("#documentoGeral").val(documentoGeral);
	});

	// Pega os itens que estão no pedido
	$.ajax({
		type: 'GET',
		url: urlWebService+"ItemWs/listarLancPedidoItem/"+lancPedidoId+"/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		var valorTotalItem = 0;
		var valorQuantidade = 0;
		var valorTotalItemU = 0;
		var valorUnitarioItemU = 0;
		var numRegistrosItens = 0;

		var montarListaItens = "<h2 class='text-center'>";
		montarListaItens += "<table class='table'><tr><td align='left'>";
		montarListaItens += "Itens";
		montarListaItens += "</td><td align='right'>";
		montarListaItens += "<button class='btn btn-success' onclick='setStatus(\"pagina3\");montarViewAdicionaItem();'>";
		montarListaItens += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;";
		montarListaItens += "Adicionar Item";
		montarListaItens += "</button>";
		montarListaItens += "</td></tr></table>";
		montarListaItens += "</h2>";

		if (data.length == 0) {
			montarListaItens += "<br>Nenhum item a este pedido foi encontrado!";
		} else {
			montarListaItens += "<table class='table'><tr>";

			montarListaItens += "<td align='left'></td>";
			montarListaItens += "<td align='left'>Item</td>";
			montarListaItens += "<td align='left'>Qtd</td>";
			montarListaItens += "<td align='left'>Valor</td>";
			montarListaItens += "<td align='left'>Total</td>";
			montarListaItens += "<td></td>";

			for(i in data){
				numRegistrosItens++;

				valorTotalItemU = data[i].valorTotal;
				valorTotalItemU = formataValorParaImprimir(valorTotalItemU);

				valorUnitarioItemU = data[i].valorUnitario;
				valorUnitarioItemU = formataValorParaImprimir(valorUnitarioItemU);

				valorQuantidade = data[i].quantidade;
				valorQuantidade = formatarValorParaDecimal(valorQuantidade);

				// acumula valor total
				valorTotalItem += data[i].valorTotal;

				// monta linha com a informação do item
				montarListaItens += "<tr id='linhaItem"+data[i].idLancPedido+"'>";

				montarListaItens += "<td align='left'>"+numRegistrosItens+"</td>"
				montarListaItens += "<td align='left'>"+data[i].itemNome+"</td>";
				montarListaItens += "<td align='left'>"+valorQuantidade+"</td>";
				montarListaItens += "<td align='left'>"+valorUnitarioItemU+"</td>";
				montarListaItens += "<td align='left'>"+valorTotalItemU+"</td>";
				
				montarListaItens += "<td>";
				montarListaItens += "<button class='btn' style='color:red;'";
				montarListaItens += "onclick='excluirItemPedido("+data[i].idLancPedido+","+data[i].lancPedidoId+","+data[i].valorTotal+")'>";
				montarListaItens += "<i class='fa fa-times' aria-hidden='true'></i>";
				montarListaItens += "</button>";
				montarListaItens += "</td>";

				montarListaItens += "</tr>";
			}

			valorTotalItem = formataValorParaImprimir(valorTotalItem);
			montarListaItens += "<tr><td colspan='4'></td>";
			montarListaItens += "<td align='left'>";
			montarListaItens += "<span id='valorTotalPedidoSpan'>"+valorTotalItem+"</span>";
			montarListaItens += "</td>";
			montarListaItens += "<td></td>";
			montarListaItens += "</tr>";

			montarListaItens += "</table>";
		}
		numRegistrosItens++;
		$("#listaPagina").html(montarListaItens+"<br><br><br>");

		
		$.ajax({
			type: 'GET',
			url: urlWebService+"ItemWs/retornaSeguencia/"+lancPedidoId+"/"+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			// console.log(data);
			var sequenciaReal = parseInt(data) + 1;
			$("#sequencia").val(sequenciaReal);
		});
	});
}

function excluirItemPedido(idLancPedidoItem, idLancPedido, valor){
	bootbox.confirm({
		title: "Tem certeza que deseja remover este item do pedido?",
		message: "Ao aperta o botão \"Sim\" você irá remover este item do pedido por completo do sistema",
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
				// atualizar o valor do pedido
				$.ajax({
					type: 'GET',
					url: urlWebService+"ItemWs/atualizaValorPedido/"+idLancPedido+"/"+valor+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){ console.log("data:"+data); });

				// remover item do pedido
				$.ajax({
					type: 'GET',
					url: urlWebService+"ItemWs/remover/"+idLancPedidoItem+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){ console.log("data:"+data); });

				$.toast({
					text: "Item removido com sucesso!", 
					heading: 'Nota', 
					icon: 'info', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'top-right',
					extAlign: 'right',
					loader: true,
					loaderBg: '#44f'
				});
				$("#linhaItem"+idLancPedidoItem).remove();
				var valorTotalAtualiza = $("#valorTotalPedidoInputList").val();
				valorTotalAtualiza = formataValorParaCalcular(valorTotalAtualiza);
				valorTotalAtualiza = parseFloat(valorTotalAtualiza) - parseFloat(valor);
				valorTotalAtualiza = formataValorParaImprimir(valorTotalAtualiza);
				$("#valorTotalPedidoInputList").val(valorTotalAtualiza);
				$("#valorTotalPedidoSpan").html(valorTotalAtualiza);
			}
		}
	});
}

function finalizarPedido(id){

	var valorTotal = $("#valorTotalPedidoInputList").val();
	valorTotal = formataValorParaCalcular2(valorTotal);

	if (valorTotal <= 0) {
		$.toast({
			text: "Pedido com valor zerado não pode ser finalizado!", 
			heading: 'Nota', 
			icon: 'error', 
			showHideTransition: 'slide', 
			allowToastClose: true, 
			hideAfter: 2500, 
			stack: 5, 
			position: 'top-right',
			extAlign: 'right',
			loader: true,
			loaderBg: '#44f'
		});
	} else {
		bootbox.confirm({
			title: "Tem certeza que deseja finalizar este pedido?",
			message: "Ao aperta o botão \"Sim\" você não poderá excluir e nem editar este pedido!",
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
					n_editar();
					// finaliza pedido
					$.ajax({
						type: 'GET',
						url: urlWebService+"PedidoWS/finalizar/"+id+parametrosWebService,
						contentType: "application/json",
						jsonpCallback: "localJsonpCallback"
					}).done( function(data){ console.log("data:"+data); });

					$.toast({
						text: "Pedido foi finalizado com sucesso!", 
						heading: 'Nota', 
						icon: 'success', 
						showHideTransition: 'slide', 
						allowToastClose: true, 
						hideAfter: 2500, 
						stack: 5, 
						position: 'top-right',
						extAlign: 'right',
						loader: true,
						loaderBg: '#44f'
					});
					var dataDoPedido = $("#emissaoInputList").val();
					montarMenuPrincipal();
				}
			}
		});
	}
}