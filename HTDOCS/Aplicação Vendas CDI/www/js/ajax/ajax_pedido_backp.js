function montarViewAdicionaPedido(){
	var motarSubMenu = "";
	var resultado = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"ClienteWs/listar/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){

		motarSubMenu += "<div class='text-left' style='margin-top: 15px;'>";
		motarSubMenu += "	<button onclick='n_editar();montarMenuPrincipal()' class='btn btn-block btn-info' title='Voltar'>";
		motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
		motarSubMenu += "		Voltar";
		motarSubMenu += "	</button>";
		motarSubMenu += "</div>";

		if (data.length == 0) {
			motarSubMenu += "<br>Não tem nenhum registro de Cliente no Servidor!";
		} else {
			resultado = data;

			motarSubMenu += "<form id='formAdicionaPedido'>";
			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<table><tr><td colspan='3'>";

			motarSubMenu += "<h4>Cliente</h4>";

			motarSubMenu += "<input type='text' id='clienteInputList'";
			motarSubMenu += "class='flexdatalist form-control'";
			motarSubMenu += "data-min-length='0' data-visible-properties='[\"razaoSocial\"]'";
			motarSubMenu += "data-selection-required='true' data-value-property='codigo'";
			motarSubMenu += "list='clienteDataList' required>";

			motarSubMenu += "</td></tr><tr><td colspan='3'>";

			motarSubMenu += "<h4>Documento</h4>";
			motarSubMenu += "<input type='text' id='documento' maxlength='6' class='form-control'>";

			motarSubMenu += "</td></tr><tr><td>";

			motarSubMenu += "<h4>Emissão</h4>";


			var now = new Date;
			var diaCerto = now.getDate();
			var mesCerto = now.getMonth() + 1;

			if (diaCerto < 10) 	diaCerto = "0"+diaCerto;
			if (mesCerto < 10) 	mesCerto = "0"+mesCerto;

			var dataAtual = now.getFullYear() + "-" + mesCerto + "-" + now.getDate();

			motarSubMenu += "<input type='date' id='emissao' value='"+dataAtual+"' class='form-control' disabled>";

			motarSubMenu += "</td><td>";
			motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			motarSubMenu += "</td><td>";


			motarSubMenu += "<h4>Total</h4>";
			motarSubMenu += "<input type='text' id='totalPedido' rel='dinheiro' value='R$ 0,00' class='form-control' disabled>";


			motarSubMenu += "</td></tr></table><br><br>";

			motarSubMenu += "</div>";
			motarSubMenu += "</form>";

			if ($("#editar").val() == 0) {

				var montarListaPedido = "<button id='buttonAdicionaPedido' class='btn btn-success btn-block' onclick='adicionaPedido()'>";
				montarListaPedido += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;";
				montarListaPedido += "Adicionar Pedido";
				montarListaPedido += "</button>";

			} else {
				var montarListaPedido = "";
				var lancPedidoId = $("#editar").val();
				montarListaItem(lancPedidoId);
			}
		}

		$("#cabecarioPrincipal").html(motarSubMenu);
		$("#listaPagina").html(montarListaPedido+"<br><br><br>");
		setarValorClienteInputList(resultado);

	});
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

	var nome = $("#clienteInputList").val();
	var valido = false;
	var clienteId = "";

	if (nome != "") {
		clienteId = nome;
	} else {
		clienteId = "0";
		// alert("invalido\n"+nome);
	}

	var documento = $("#documento").val();
	if (documento != "") {
		valido = true;
	}

	if (valido && clienteId != "0") {
		document.getElementById("clienteInputList").disabled = true;
		document.getElementById("documento").disabled = true;
		var filial = 1;
		var emissao = $("#emissao").val();
		var total = $("#totalPedido").val();

		total = total.replace("R$", "");
		total = total.replace(",", ".");

		var identificacao = $("#identificador").val();
		var flagImpressao = 0;

		// Codigo para adicionar pedido
		var user = { 
				"filial": filial, 
				"documento": documento, 
				"emissao": emissao, 
				"total": total, 
				"cliente": clienteId, 
				"identificacao": identificacao, 
				"flagImpressao": flagImpressao
			};

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
					position: 'bottom-left',
					extAlign: 'left',
					loader: true,
					loaderBg: '#44f'
				});
			} else {
				editarId(data);
				montarListaItem(data);
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
			position: 'bottom-left',
			extAlign: 'left',
			loader: true,
			loaderBg: '#44f'
		});
	}
}


function montarListaItem(lancPedidoId){
	var motarSubMenu = "";
	var valorTotalPedido = 0;
	var documentoGeral = "";

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

			// motarSubMenu += "<h2 class='text-center'>Pedido</h2>";
			motarSubMenu += "<div class='text-left' style='margin-top: 15px;'>";
			motarSubMenu += "	<button onclick='n_editar();montarMenuPrincipal()' class='btn btn-block btn-info' title='Voltar'>";
			motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			motarSubMenu += "		Voltar";
			motarSubMenu += "	</button>";

			
			motarSubMenu += "</div>";

			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<table><tr><td>";

			motarSubMenu += "<h4>Cliente</h4>";
			motarSubMenu += "<input type='text' id='clienteInputList' value='"+data[i].razaoSocial+"' class='form-control' disabled>";


			motarSubMenu += "</td><td>";
			motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			motarSubMenu += "</td><td>";

			motarSubMenu += "<h4>Documento</h4>";
			motarSubMenu += "<input type='text' id='documentoInputList' value='"+data[i].documento+"' class='form-control' disabled>";

			motarSubMenu += "</td></tr><tr><td>";

			motarSubMenu += "<h4>Emissão</h4>";
			motarSubMenu += "<input type='date' id='emissaoInputList' value='"+data[i].emissao+"' class='form-control' disabled>";

			
			motarSubMenu += "</td><td>";
			motarSubMenu += "&nbsp;&nbsp;&nbsp;&nbsp;";
			motarSubMenu += "</td><td>";


			motarSubMenu += "<h4>Total</h4>";
			motarSubMenu += "<input type='text' id='totalInputList' value='"+valorTotalPedido+"' class='form-control' disabled>";

			motarSubMenu += "</td></tr></table><br>";
			motarSubMenu += "	<button onclick='n_editar();finalizarPedido("+data[i].idLancPedido+")' class='btn btn-block btn-success' title='Voltar'>";
			motarSubMenu += "		<i class='fa fa-check' aria-hidden='true'></i>&nbsp;";
			motarSubMenu += "		Finalizar pedido";
			motarSubMenu += "	</button>";
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
		var valorTotalItemU = 0;
		var valorUnitarioItemU = 0;
		var numRegistrosItens = 0;

		var montarListaItens = "<h2 class='text-center'>";
		montarListaItens += "<table class='table'><tr><td align='left'>";
		montarListaItens += "Itens";
		montarListaItens += "</td><td align='right'>";
		montarListaItens += "<button class='btn btn-success' onclick='montarViewAdicionaItem();'>";
		montarListaItens += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;";
		montarListaItens += "Adicionar Item";
		montarListaItens += "</button>";
		montarListaItens += "</td></tr></table>";
		montarListaItens += "</h2>";

		if (data.length == 0) {
			montarListaItens += "<br>Nenhum item a este pedido foi encontrado!";
		} else {
			montarListaItens += "<table class='table'><tr>";

			montarListaItens += "<td align='left'>Qtd</td>";
			montarListaItens += "<td align='left'>Item</td>";
			montarListaItens += "<td align='left'>Valor</td>";
			montarListaItens += "<td align='left'>Total</td>";
			montarListaItens += "<td></td>";

			for(i in data){
				numRegistrosItens++;

				valorTotalItemU = data[i].valorTotal;
				valorTotalItemU = formataValorParaImprimir(valorTotalItemU);

				valorUnitarioItemU = data[i].valorUnitario;
				valorUnitarioItemU = formataValorParaImprimir(valorUnitarioItemU);

				// acumula valor total
				valorTotalItem += data[i].valorTotal;

				// monta linha com a informação do item
				montarListaItens += "<tr id='linhaItem"+data[i].idLancPedido+"'>";

				montarListaItens += "<td align='left'>"+data[i].quantidade+"</td>";
				montarListaItens += "<td align='left'>"+data[i].itemNome+"</td>";
				montarListaItens += "<td align='left'>"+valorUnitarioItemU+"</td>";
				montarListaItens += "<td align='left'>"+valorTotalItemU+"</td>";

				montarListaPedido += "<td>";
				montarListaPedido += "<button class='btn' style='color:red;'";
				montarListaPedido += "onclick='excluirItemPedido("+data[i].idLancPedido+","+data[i].lancPedidoId+","+data[i].valorTotal+")'>";
				montarListaPedido += "<i class='fa fa-times' aria-hidden='true'></i>";
				montarListaPedido += "</button></td>";

				montarListaItens += "</tr>";
			}

			valorTotalItem = formataValorParaImprimir(valorTotalItem);
			montarListaItens += "<tr><td colspan='3'></td><td align='left'>"+valorTotalItem+"</td></tr>"			

			montarListaItens += "</table>";
		}
		numRegistrosItens++;
		$("#listaPagina").html(montarListaItens+"<br><br><br>");
		$("#sequencia").val(numRegistrosItens);

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
					position: 'bottom-left',
					extAlign: 'left',
					loader: true,
					loaderBg: '#44f'
				});
				$("#linhaItem"+idLancPedidoItem).remove();
				var valorTotalAtualiza = $("#totalInputList").val();
				valorTotalAtualiza = formataValorParaCalcular(valorTotalAtualiza);
				valorTotalAtualiza -= valor;
				$("#totalInputList").val(valorTotalAtualiza);
			}
		}
	});
}

function finalizarPedido(id){

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
					position: 'bottom-left',
					extAlign: 'left',
					loader: true,
					loaderBg: '#44f'
				});
				var dataDoPedido = $("#emissaoInputList").val();
				montarMenuPrincipalData(dataDoPedido);
			}
		}
	});
}

/*

FORMA QUE ADAPITEI PARA O INPUT COMBO (DATALIST)

<input type='text' 
	id='clienteInputList'
	class='flexdatalist form-control'
	data-min-length='0' 
	data-visible-properties='[\"razaoSocial\"]'
	data-selection-required='true' 
	data-value-property='codigo'
	list='clienteDataList' 
required>

function setarValorClienteInputList(elJSON){
	$('#clienteInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'codigo',
		searchIn: 'razaoSocial',
		minLength: 1,
		data: elJSON
	});
}

/---------------------- // ------------------------------/

MODELO INTERNET

<input type='text'
	   placeholder='Programming language name'
	--   class='flexdatalist'
	   data-min-length='1'
	--   data-selection-required='true'
	   list='languages'
	   value='PHP'
	   name='language2'>

<datalist id="languages">
	<option value="PHP">PHP</option>
	<option value="JavaScript">JavaScript</option>
	<option value="Cobol">Cobol</option>
	<option value="C#">C#</option>
	<option value="C++">C++</option>
	<option value="Java">Java</option>
	<option value="Pascal">Pascal</option>
	<option value="FORTRAN">FORTRAN</option>
	<option value="Lisp">Lisp</option>
	<option value="Swift">Swift</option>
</datalist>

*********

$('.flexdatalist').flexdatalist({
	 selectionRequired: true,
	 minLength: 1
});

/ ************************************************* /

<input type='text'
	   placeholder='Write your country name'
	   class='flexdatalist'
	   data-data='countries.json'
	   data-search-in='name'
	   data-min-length='1'
	   name='country_name_suggestion'>


**********

$('.flexdatalist').flexdatalist({
	 minLength: 1,
	 searchIn: 'name',
	 data: 'countries.json'
});

/ ************************************************* /

<input type='text'
	   placeholder='Write your country name'
	   class='flexdatalist'
	   data-data='countries.json'
	   data-search-in='name'
	   data-visible-properties='["name","capital","continent"]'
	   data-selection-required='true'
	   data-value-property='*'
	   data-min-length='0'
	   id='relative'
	   name='country_allresults'>

*************

$('.flexdatalist').flexdatalist({
	 minLength: 0,
	 valueProperty: '*',
	 selectionRequired: true,
	 visibleProperties: ["name","capital","continent"],
	 searchIn: 'name',
	 data: 'countries.json'
});

*/