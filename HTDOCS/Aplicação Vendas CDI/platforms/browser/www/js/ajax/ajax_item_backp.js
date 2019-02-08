function montarViewAdicionaItem(){
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
		if (data.length == 0) {
			motarSubMenu += "<br>Não tem nenhum registro de Cliente no Servidor!";
		} else {
			motarSubMenu += "<h2 class='text-center'>Grupos</h2>";
			motarSubMenu += "<div class='text-left'>";
			motarSubMenu += "	<button onclick='montarListaItem("+lancPedidoId+")' class='btn btn-info' title='Voltar'>";
			motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			motarSubMenu += "		Voltar";
			motarSubMenu += "	</button>";
			motarSubMenu += "</div><br>";


			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<table>";

			for(i in data){
				if (controleDeLinha == -1) {
					motarSubMenu += "<tr>";
					controleDeLinha++;
				} else if (controleDeLinha >= controleDeLinhaContanti) {
					motarSubMenu += "</tr><tr>";
					controleDeLinha = 0;
				}

				motarSubMenu += "<td onclick='montarListaItensGrup("+data[i].grupoItem+")' align='center' height='50' width='20%'>";
				motarSubMenu += "<img src='http://192.168.1.102/vendasCDI/img/"+data[i].imagem+"' height='95%' width='100%'>";
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
	// montarModalComplementoItem();

	});
}

function montarListaItensGrup(idGrupoItem){

	var motarSubMenu = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"ItemWs/listarItem/"+idGrupoItem+"/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			motarSubMenu += "<h2 class='text-center'>Itens</h2>";
			motarSubMenu += "<br>Não tem nenhum item nesse grupo!";
		} else {
			motarSubMenu += "<h2 class='text-center'>Itens</h2>";
			motarSubMenu += "</div><br>";


			// motarSubMenu += "<form id='formAdicionaPedido'>";
			motarSubMenu += "<div class='col-md-12'>";
			motarSubMenu += "<table class='table'></tr>";
			motarSubMenu += "<td>Item</td>";
			motarSubMenu += "<td>Selecionar</td>";
			motarSubMenu += "</tr>";

			for(i in data){

				motarSubMenu += "<tr>";
				
				motarSubMenu += "<td>"+data[i].descricao+"</td>";

				motarSubMenu += "<td>";

				motarSubMenu += "<button class='btn' ";
				motarSubMenu += "data-id='"+data[i].item+"' data-item='"+data[i].descricao+"' ";
				motarSubMenu += "data-toggle='modal' data-target='#modalAdicinarItem' ";
				motarSubMenu += "onclick='selecionarItem(this)'>";

				motarSubMenu += "- >";

				motarSubMenu += "</button>";

				motarSubMenu += "</td>"

				motarSubMenu += "</tr>";

			}

			motarSubMenu += "</table><br><br>";

			motarSubMenu += "</div>";
			// motarSubMenu += "</form>";


		}
		$("#listaPagina").html(motarSubMenu);
	});
}

function selecionarItem(el){
	console.log("selecionarItem");
	var id = $(el).data("id");
	var descricao = $(el).data("item");

	$("#modalNomeItem").html(descricao);
	$("#modalIdItem").val(id);
}


function limparCamposModalItem(){
	$("#modalQtdItem").val("");
	$("#modalVlrUnitarioItem").val("");
	$("#modalVlrTotalItem").val("");
}



function adicionaItemAoPedido(){

	var quantidade = $("#modalQtdItem").val();
	var valorUnitario = $("#modalVlrUnitarioItem").val();
	var valorTotal = $("#modalVlrTotalItem").val();
	var item = $("#modalIdItem").val();
	var filial = 1;
	var sequecia = 1;

	quantidade = formataValorParaCalcular(quantidade);
	valorUnitario = formataValorParaCalcular(valorUnitario);
	valorTotal = formataValorParaCalcular(valorTotal);

	if (quantidade != "" && valorUnitario != "" && valorTotal != "" && item != "") {

		// Codigo para adicionar item ao pedido
		var user = { 
				"lancPedidoId":
				"filial": filial, 
				"documento": documento, 
				"sequecia": sequecia,
				"item": item,
				"quantidade": quantidade, 
				"valorUnitario": valorUnitario, 
				"valorTotal": valorTotal
			};

		$.ajax({
			type: 'POST',
			cache: false,
			url: urlWebService+"ItemWs/inserir",
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			data: JSON.stringify(user)
		}).done( function(data){
			if (data) {
				$.toast({
					text: "Item adicionado com sucesso!", 
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
			} else {
				$.toast({
					text: "Erro ao adicinar item ao pedido!", 
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
			position: 'bottom-left',
			extAlign: 'left',
			loader: true,
			loaderBg: '#44f'
		});
	}
}