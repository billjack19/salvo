function montarViewAdicionaItem(desconto){
	subirPagina();
	var motarSubMenu = "";
	var lancPedidoId = $("#editar").val();
	var controleDeLinha = -1;
	var controleDeLinhaContanti = 5;
	var contRegistro = 0;

	$.ajax({
		type: 'GET',
		url: urlWebService+"GrupoWs/listar/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		setStatus('pagina3');
		if (data.length == 0) {
			motarSubMenu += "<br>Não tem nenhum registro de Grupo no Servidor!";
		} else {
			botaoVoltarPedido(lancPedidoId, desconto);
			// motarSubMenu += "<h2 class='text-center'>Grupos</h2>";
			
			// motarSubMenu += "<br><div class='text-left' style='margin-top:15px;'>";
			// motarSubMenu += "	<button onclick='setStatus(\"pagina2\");montarListaItem("+lancPedidoId+")' class='btn btn-block btn-info' title='Voltar'>";
			// motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "		Voltar ao pedido";
			// motarSubMenu += "	</button>";
			// motarSubMenu += "</div>";
			
			motarSubMenu += "<br><br>";

			motarSubMenu += "<table class='table'><tr>";
			motarSubMenu += "<td align='left' style='padding-top:1px;padding-bottom:1px;'>";

			// motarSubMenu += "<button class='btn btn-warning btn-block' ";
			// motarSubMenu += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha1\")'>";
			// motarSubMenu += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
			// motarSubMenu += "Ficha";
			// motarSubMenu += "</button>";

			motarSubMenu += "</td></tr></table>";


			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<div id='listaItensPorGrupo'></div>";
			motarSubMenu += "<br>";
			motarSubMenu += "<button class='btn btn-block btn-info' onclick='montarListaItensTodos()'>";
			motarSubMenu += "Todos Itens";
			motarSubMenu += "</button>";
			motarSubMenu += "<br>";
			motarSubMenu += "<table>";

			for(i in data){
				// console.log("item"+data[i].descricao);
				if (controleDeLinha == -1) {
					motarSubMenu += "<tr>";
					controleDeLinha++;
				} else if (controleDeLinha >= controleDeLinhaContanti) {
					motarSubMenu += "</tr><tr>";
					controleDeLinha = 0;
				}

				motarSubMenu += "<td onclick='montarListaItensGrup("+data[i].grupoItem+", \""+data[i].descricao+"\")' align='center' height='auto' width='20%'>";
				motarSubMenu += "<img src='http://"+hostServeImage+":8088/vendasCDI/img/"+data[i].imagem+"' height='auto' width='100%'>";
				motarSubMenu += "<br><span class='text-center'>"+data[i].descricao+"</span>";
				motarSubMenu += "</td><td>&nbsp;&nbsp;</td>";
				controleDeLinha++;
				contRegistro++;

				if (data.length == contRegistro) {
					motarSubMenu += "</tr>";
				}

			}

			motarSubMenu += "</table>";
			motarSubMenu += "</div>";
		}
		$("#cabecarioPrincipal").html(motarSubMenu);
		$("#listaPagina").html("<br><br><br><br><br><br><br>");
	});
}

function montarListaItensGrup(idGrupoItem, descricaoGrupoItem){

	var motarSubMenu = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"ItemWs/listarItem/"+idGrupoItem+"/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){

		if (data.length == 0) {
			motarSubMenu += "<h2 class='text-center' style='margin-top:-15px;'>Itens: "+descricaoGrupoItem+"</h2>";
			motarSubMenu += "<br>Não tem nenhum item nesse grupo!";
			$("#listaItensPorGrupo").html(motarSubMenu);
		} else {
			motarSubMenu += "<h2 class='text-center' style='margin-top:-15px;'>Itens: "+descricaoGrupoItem+"</h2>";

			motarSubMenu += "<div class='col-md-12'>";

			motarSubMenu += "<input type='text' ";
			motarSubMenu += "	id='itemInputList'";
			motarSubMenu += "	class='flexdatalist form-control'";
			motarSubMenu += "	data-min-length='0' ";
			motarSubMenu += "	data-visible-properties='[\"descricao\"]'";
			motarSubMenu += "	data-selection-required='true' ";
			motarSubMenu += "	data-value-property='*'";
			motarSubMenu += "	list='clienteDataList' ";
			motarSubMenu += "	onchange='setStatus(\"item\");selecionarItem()'";
			motarSubMenu += "required>";


			motarSubMenu += "<button class='btn btn-block btn-success'  style='margin-top:10px;'";
			motarSubMenu += "onclick='setStatus(\"item\");selecionarItem()'>";		

			motarSubMenu += "Selecionar Item &nbsp;";
			motarSubMenu += "<i class='fa fa-arrow-right' aria-hidden='true'></i>";

			motarSubMenu += "</button>";

			motarSubMenu += "<button class='hidden' ";
			motarSubMenu += "data-toggle='modal' data-target='#modalAdicinarItem' ";
			motarSubMenu += "id='abrirModalSelecionarPedido' >";
			motarSubMenu += "</button>";

			motarSubMenu += "</div><hr>";

			$("#listaItensPorGrupo").html(motarSubMenu);
			setarValorItemInputList(data);
			document.getElementById("itemInputList-flexdatalist").focus();
		}
	});
}

function montarListaItensTodos(){

	var motarSubMenu = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"ItemWs/listarTodosItem/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){

		if (data.length == 0) {
			motarSubMenu += "<h2 class='text-center' style='margin-top:-15px;'>Todos os Itens</h2>";
			motarSubMenu += "<br>Nenhum item encontrado!";
			$("#listaItensPorGrupo").html(motarSubMenu);
		} else {
			motarSubMenu += "<h2 class='text-center' style='margin-top:-15px;'>Todos os Itens</h2>";

			motarSubMenu += "<div class='col-md-12'>";

			motarSubMenu += "<input type='text' ";
			motarSubMenu += "	id='itemInputList'";
			motarSubMenu += "	class='flexdatalist form-control'";
			motarSubMenu += "	data-min-length='0' ";
			motarSubMenu += "	data-visible-properties='[\"descricao\"]'";
			motarSubMenu += "	data-selection-required='true' ";
			motarSubMenu += "	data-value-property='*'";
			motarSubMenu += "	list='clienteDataList' ";
			motarSubMenu += "	onchange='setStatus(\"item\");selecionarItem()'";
			motarSubMenu += "required>";


			motarSubMenu += "<button class='btn btn-block btn-success'  style='margin-top:10px;'";
			motarSubMenu += "onclick='setStatus(\"item\");selecionarItem()'>";		

			motarSubMenu += "Selecionar Item &nbsp;";
			motarSubMenu += "<i class='fa fa-arrow-right' aria-hidden='true'></i>";

			motarSubMenu += "</button>";

			motarSubMenu += "<button class='hidden' ";
			motarSubMenu += "data-toggle='modal' data-target='#modalAdicinarItem' ";
			motarSubMenu += "id='abrirModalSelecionarPedido' >";
			motarSubMenu += "</button>";

			motarSubMenu += "</div><hr>";

			$("#listaItensPorGrupo").html(motarSubMenu);
			setarValorItemInputList(data);
			document.getElementById("itemInputList-flexdatalist").focus();
		}
	});
}

function setarValorItemInputList(elJSON){
	$('#itemInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: '*',
		searchIn: 'descricao',
		minLength: 1,
		data: elJSON
	});
}


// {"item":6,"grupoItem":1,"subGrupoItem":1,"unidade_medida":"UN","descricao":"ABACAXI"},
function selecionarItem(){
	var objetoItem = $('#itemInputList').val();

	if (objetoItem == '') {
		document.getElementById("fecharModalBottun").click();
		$.toast({
			text: "Por favor selecione um item!", 
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
		objetoItem = objetoItem.replace("{", "");
		objetoItem = objetoItem.replace("}", "");
		objetoItem = objetoItem.replace("\"\"descricao\":", "");
		objetoItem = objetoItem.replace("\"subGrupoItem\":", "");
		objetoItem = objetoItem.replace("\"unidade_medida\":\"", "");
		objetoItem = objetoItem.replace("\"grupoItem\":", "");
		objetoItem = objetoItem.replace("\"item\":", "");

		objetoItem = objetoItem.split(",");

		var item = objetoItem[0];
		var grupo = objetoItem[1];
		var subGrupo = objetoItem[2];
		var unidadeMedida = objetoItem[3];
		unidadeMedida = unidadeMedida.replace("\"", "");
		// console.log(unidadeMedida);
		var desc = objetoItem[4];
		desc = desc.replace("\"descricao\":", "");
		// console.log(desc);

		$("#modalIdItem").val(item);
		$("#modalNomeItem").html(desc);
		$("#modalUnidadeMedidaItem").val(unidadeMedida);
		$("#modalSubGrupoItem").val(subGrupo);
		$("#modalGrupoItem").val(grupo);

		document.getElementById("abrirModalSelecionarPedido").click();
		document.getElementById("modalQtdItem").focus();
	}
}


function limparCamposModalItem(){
	$("#modalQtdItem").val("");
	$("#modalVlrUnitarioItem").val("");
	$("#modalVlrTotalItem").val("");
	$("#modalComplementoItem").val("");
}


function adicionaItemAoPedido(){

	var quantidade = $("#modalQtdItem").val();
	var valorUnitario = $("#modalVlrUnitarioItem").val();
	var valorTotal = $("#modalVlrTotalItem").val();
	var item = $("#modalIdItem").val();
	var filial = 10;
	var documento = $("#documentoGeral").val();
	var sequecia = $("#sequencia").val();
	var lancPedidoId = $("#editar").val();
	var unidadeMedida = $("#modalUnidadeMedidaItem").val(unidadeMedida);
	var subGrupo = $("#modalSubGrupoItem").val(subGrupo);
	var grupo = $("#modalGrupoItem").val(grupo);
	var complemeto = $("#modalComplementoItem").val();


	quantidade = formataValorParaCalcular(quantidade);
	valorUnitario = formataValorParaCalcular(valorUnitario);
	valorTotal = formataValorParaCalcular2(valorTotal);

	if (
		   quantidade != "" 
		&& valorUnitario != "" 
		&& valorTotal != ""  
		&& item != "" 
		&& sequecia != "" 
		&& quantidade != 0 
		&& valorTotal >= 0 
		&& valorUnitario >= 0 
	){

		var lancPedidoIdObject = { 
				"lancPedidoId": lancPedidoId,
				"filial": filial, 
				"documento": documento, 
				"sequencia": sequecia,
				"item": item,
				"quantidade": quantidade, 
				"valorUnitario": valorUnitario, 
				"valorTotal": valorTotal,
				"grupoItem" : grupo,
				"subGrupoItem": subGrupo,
				"unidadeMedida": unidadeMedida,
				"adicionalProduto": complemeto
			};
			// console.log(lancPedidoIdObject);
		$.ajax({
			type: 'POST',
			cache: false,
			url: urlWebService+"ItemWs/inserir",
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			data: JSON.stringify(lancPedidoIdObject)
		}).done( function(data){
			// console.log("data: "+data);
			if (data) {
				
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

				$.toast({
					text: "Item adicionado com sucesso!", 
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
				document.getElementById("fecharModalBottun").click();
				document.getElementById("itemInputList-flexdatalist").value = "";
				setStatus("pagina3");
				// document.getElementById("modalQtdItem").focus();
			} else {
				$.toast({
					text: "Erro ao adicinar item ao pedido!", 
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
			limparCamposModalItem();
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

/*
documento
:
"003283"
filial
:
10
grupoItem
:
"1"
item
:
"6"
lancPedidoId
:
"4189"
quantidade
:
"12.00"
sequencia
:
"2"
subGrupoItem
:
"1"
unidade_medida
:
""UN""
valorTotal
:
"24.00"
valorUnitario
:
"2.00"

*/