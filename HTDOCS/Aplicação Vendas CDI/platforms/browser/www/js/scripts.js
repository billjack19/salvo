// Funções particulares desse projeto

function montarListaPedsito(){
	subirPagina();

	var identificador = $("#identificador").val();
	var dataPedido = $("#dataPedido").val();
	var corLinha = "";
	var valorTotal = 0;
	var emissaoItem = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"PedidoWS/listar/"+dataPedido+"/"+identificador+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		setStatus('inicial');

		// Conteudo Listado
		var montarListaPedido = "<h2 class='text-center'>";
		montarListaPedido += "Pedidos";
		montarListaPedido += "</h2>";
		montarListaPedido += "<table class='table'><tr>";
		montarListaPedido += "<td align='left' style='padding-top:1px;padding-bottom:1px;'>";

		montarListaPedido += "<button class='btn btn-warning' ";
		montarListaPedido += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha1\")'>";
		montarListaPedido += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
		montarListaPedido += "Ficha";
		montarListaPedido += "</button>";

		montarListaPedido += "</td>";
		montarListaPedido += "<td align='right' style='padding-top:1px;padding-bottom:1px;'>";
		montarListaPedido += "<button class='btn btn-success' onclick='setStatus(\"pagina2\");montarViewAdicionaPedido();'>";
		montarListaPedido += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;";
		montarListaPedido += "Adicionar Pedido";
		montarListaPedido += "</button>";
		montarListaPedido += "</td></tr></table>";


		if (data.length == 0) {
			montarListaPedido += "<br>Nenhum registro encontrado!";
		} else {
			montarListaPedido += "<table class='table' style='margin-top:-15px;''>";
			montarListaPedido += "<tr bgcolor='white'>";
			montarListaPedido += "<td>Ficha</td>";
			montarListaPedido += "<td>Razão Social</td>";
			montarListaPedido += "<td>Total</td>";
			montarListaPedido += "<td></td>";
			montarListaPedido += "<td></td>";
			montarListaPedido += "<td></td>";
			montarListaPedido += "</tr>";

			for(i in data){
				valorTotal = data[i].total;
				valorTotal = formataValorParaImprimir(valorTotal);

				if (data[i].total == 0) {	corLinha = "#E9E97A";	}

				else if (data[i].flagImpressao == 0) {	corLinha = "#E9967A";	}

				else {	corLinha = "#98FB98";	}

				montarListaPedido += "<tr id='linhaPedido"+data[i].idLancPedido+"' bgcolor='"+corLinha+"'>";

				montarListaPedido += "<td>"+data[i].ficha+"</td>";
				montarListaPedido += "<td>"+data[i].razaoSocial+"</td>";
				montarListaPedido += "<td>"+valorTotal+"</td>";

				

				// botão do editar
				montarListaPedido += "<td style='padding-right:1px; padding-left:1px;'>";

				if (data[i].flagImpressao == 0) {
					montarListaPedido += "<button class='btn' style='color:#f0ad4e;'";
					montarListaPedido += "onclick='setStatus(\"pagina2\");editarId("+data[i].idLancPedido+");montarListaItem("+data[i].idLancPedido+")'>";

					montarListaPedido += "<i class='fa fa-pencil' aria-hidden='true'></i>";

					montarListaPedido += "</button>";
				} else {
					montarListaPedido += "<button class='btn btn-danger' style='color:#f0ad4e;' disabled>";

					montarListaPedido += "<i class='fa fa-pencil' aria-hidden='true'></i>";

					montarListaPedido += "</button>";
				}

				montarListaPedido += "</td><td style='padding-right:1px; padding-left:1px;'>";


				// botão do excluir
				if (data[i].flagImpressao == 0) {
					montarListaPedido += "<button class='btn' style='color:red;'";
					montarListaPedido += "onclick='excluirPedido("+data[i].idLancPedido+")'>";

					montarListaPedido += "<i class='fa fa-times' aria-hidden='true'></i>";

					montarListaPedido += "</button>";
				} else {
					montarListaPedido += "<button class='btn  btn-danger' style='color:red;' disabled>";

					montarListaPedido += "<i class='fa fa-times' aria-hidden='true'></i>";

					montarListaPedido += "</button>";
				}

				montarListaPedido += "</td><td style='padding-right:1px; padding-left:1px;'>";


				// botão do visualizar
				montarListaPedido += "<button class='btn' style='color:blue;'";
				montarListaPedido += " data-toggle='modal' data-target='#modalPropriedadePedido'";
				montarListaPedido += " onclick='setStatus(\"pedido\");jogarValorModalPedido(this)'";

				emissaoItem = data[i].emissao;
				emissaoItem = emissaoItem.replace(" 00:00:00.0", "");

				montarListaPedido += "data-idLancPedido='"+data[i].idLancPedido+"' ";
				montarListaPedido += "data-filial='"+data[i].filial+"' ";
				montarListaPedido += "data-documento='"+data[i].documento+"' ";
				montarListaPedido += "data-emissao='"+emissaoItem+"' ";
				montarListaPedido += "data-total='"+valorTotal+"' ";
				montarListaPedido += "data-cliente='"+data[i].cliente+"' ";
				montarListaPedido += "data-identificacao='"+data[i].identificacao+"' ";
				montarListaPedido += "data-flagImpressao='"+data[i].flagImpressao+"' ";
				montarListaPedido += "data-razaoSocial='"+data[i].razaoSocial+"' ";
				montarListaPedido += "data-ficha='"+data[i].ficha+"' ";

				montarListaPedido += ">";
				montarListaPedido += "<i class='fa fa-eye' aria-hidden='true'></i>";
				montarListaPedido += "</button>";

				montarListaPedido += "</td></tr>";
			}
			montarListaPedido += "</table>";
		}

		$("#listaPagina").html(montarListaPedido);
	});
}

function montarMenuPrincipal(){

	// Configuração de data
	var dataAtual = pegarData();


	var identificador = $("#identificador").val();
	var razaoSocial = $("#identificador").data("razaosocial");


	// var cabecario_text_html = "<br><h2 class='text-center'>Página Principal</h2>";
	var cabecario_text_html = "<div class='col-md-12' style='margin-top:10px;'>";
	cabecario_text_html += "<table class='table' style='margin-bottom: -20px;'><tr><td colspan='2'>"
	
	cabecario_text_html += "<h4 style='margin-bottom:1px;margin-top:1px;'>"+identificador+":"+razaoSocial+"</h4>";
	// cabecario_text_html += "<input type='text' value='' class='form-control' disabled>";
	
	cabecario_text_html += "</td><tr></tr><td width='50%'>";
	
	// cabecario_text_html += "<h4>Data</h4>";
	cabecario_text_html += "<input type='date' id='dataPedido' value='"+dataAtual+"' class='form-control' onclick='montarListaPedsito()'>";
	
	cabecario_text_html += "</td><td width='50%'>";
	
	cabecario_text_html += "<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>";
	cabecario_text_html += "Listar";
	cabecario_text_html += "</button>";
	cabecario_text_html += "</div>";

	cabecario_text_html += "</td></tr></table>";

	
	cabecario_text_html += "</div>";
	
	$("#cabecarioPrincipal").html(cabecario_text_html);
	montarListaPedsito();
}

function excluirPedido(id){

	bootbox.confirm({
		title: "Tem certeza que deseja excluir este pedido?",
		message: "Ao aperta o botão \"Sim\" você irá excluir este pedido por completo do sistema",
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
				// remover itens
				$.ajax({
					type: 'GET',
					url: urlWebService+"PedidoWS/removerItens/"+id+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){ console.log("data:"+data); });

				// remover pedido
				$.ajax({
					type: 'GET',
					url: urlWebService+"PedidoWS/remover/"+id+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){ console.log("data:"+data); });

				$.toast({
					text: "Pedido removido com sucesso!", 
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
				$("#linhaPedido"+id).remove();
			}
		}
	});
}



/*********************************************************************************************************************/
/*-----------------------------------------//** Separado Codigo **//*------------------------------------------------*/
/*********************************************************************************************************************/



// Funções Genericas Para Projetos
function editar(el){
	var id_cliente_unid_cons = $(el).data("id");
	$("#editar").val(id_cliente_unid_cons);
}

function editarId(id){
	$("#editar").val(id);
}

function n_editar(){
	$("#editar").val(0);
	$("#fichaPesquisa").val(0);
}

function maius(obj){
	obj.value = obj.value.toUpperCase();
}

function subirPagina(){
	var html = document.documentElement;
	html.scrollLeft = 0;
	html.scrollTop = 0;
}


function pegarData(){

	var now = new Date;
	var diaCerto = now.getDate();
	var mesCerto = now.getMonth() + 1;

	if (diaCerto < 10) 	diaCerto = "0" + diaCerto;
	if (mesCerto < 10) 	mesCerto = "0" + mesCerto;

	var dataAtual = now.getFullYear() + "-" + mesCerto + "-" + diaCerto;
	return dataAtual;
}

function formatarData(dataUN){
	dataUN = dataUN.split("-");
	dataUN = dataUN[2]+"/"+dataUN[1]+"/"+dataUN[0];

	return dataUN;
}


function calculaTotalItem(){
	var quantidade = $("#modalQtdItem").val();
	var vlrUnitario = $("#modalVlrUnitarioItem").val();

	if (quantidade != "" && vlrUnitario != "") {
		quantidade = formataValorParaCalcular(quantidade);
		vlrUnitario = formataValorParaCalcular(vlrUnitario);

		var total = quantidade * vlrUnitario;

		total = formataValorParaImprimir(total);
		$("#modalVlrTotalItem").val(total);
	} else {
		$("#modalVlrTotalItem").val("");
	}
}

function formataValorParaCalcular(valor){
	valor = valor.replace("R$", "");
	// valor = valor.replace(".", "");
	valor = valor.replace(" ", "");
	valor = valor.replace(",", "");
	valor = parseFloat(valor);
	valor = valor.toFixed(2);
	return valor;
}

function formataValorParaCalcular2(valor){
	valor = valor.replace("R$", "");
	valor = valor.replace(".", "");
	valor = valor.replace(" ", "");
	valor = valor.replace(",", ".");
	valor = parseFloat(valor);
	valor = valor.toFixed(2);
	return valor;
}

function formataValorParaImprimir(valor){
	valor = parseFloat(valor);
	valor = valor.toFixed(2);
	valor = valor.replace(".", ",");
	valor = "R$ "+valor;
	return valor;
}

function formatarValorParaDecimal(valor){	
	valor = parseFloat(valor);
	valor = valor.toFixed(2);
	valor = valor.replace(".", ",");
	// valor = "R$ "+valor;
	return valor;
}




function mask(){
	jQuery(function($){
		$('.cpf').mask("999.999.999-99");
		$('.rg').mask("aa-99.999.999");
		$('.cnpj').mask("99.999.999/9999-9");

		$('.telefone').mask("(99) 9999-9999");
		$('.celular').mask("(99) 9 9999-9999");

		$('.cep').mask("99.999-999");
	});

	$.mask.definitions['H'] = "[0-2]";
	$.mask.definitions['h'] = "[0-9]";
	$.mask.definitions['O'] = "[0-5]";
	$.mask.definitions['m'] = "[0-9]";

	$("input[rel=data], input[data-mask=data]").mask("99/99/9999");
	$("input[data-mask=ano]").mask("9999");
	$("input[rel=hora], input[data-mask=hora]").mask("Hh:Om");
	$("input[rel=minutos], input[data-mask=minutos]").mask("99?9M");
	$("input[rel=placa], input[data-mask=placa]").mask("aaa-9999");
	$("input[rel=cpf], input[data-mask=cpf]").mask("999.999.999-99");
	$("input[rel=cnpj], input[data-mask=cnpj]").mask("99.999.999/9999-99");
	$("input[rel=cei], input[data-mask=cei]").mask("99.9999999.99-99");
	$("input[rel=ncm], input[data-mask=ncm]").mask("9999.99.99");
	$("input[rel=cest], input[data-mask=cest]").mask("99.9999.99");
	$("input[rel=cnae], input[data-mask=cnae]").mask("9999-9.99");
	$("input[rel=planoDeContas], input[data-mask=planoDeContas]").mask("9.9.99.99.99");
	$("input[rel=cep], input[data-mask=cep]").mask("99999-999");
	$("input[rel=ean], input[data-mask=ean]").mask("9999999999999");

	$("input[rel=quantidade], input[data-mask=quantidade]").maskMoney({showSymbol: false, precision: 4, decimal: ",", thousands: ""});
	$("input[rel=porcento], input[data-mask=porcento]").maskMoney({showSymbol: true, symbol:"%" , decimal: ",", thousands: ""});
	$("input[rel=decimalGeral], input[data-mask=decimalGeral]").maskMoney({showSymbol: true, symbol:"" , decimal: ",", thousands: ""});
	$("input[rel=dinheiro], input[data-mask=dinheiro]").maskMoney({showSymbol: true, symbol: "R$", decimal: ",", thousands: ""});
	$("input[rel=peso4dec], input[data-mask=peso4dec]").maskMoney({showSymbol: false, precision: 4, decimal: ",", thousands: "."});

	$("input[data-mask=num1dec]").maskMoney({showSymbol: false, precision: 1, decimal: ",", thousands: "."});
	$("input[data-mask=num2dec]").maskMoney({showSymbol: false, precision: 2, decimal: ",", thousands: "."});
	$("input[data-mask=num3dec]").maskMoney({showSymbol: false, precision: 3, decimal: ",", thousands: "."});
	$("input[data-mask=num4dec]").maskMoney({showSymbol: false, precision: 4, decimal: ",", thousands: "."});

	$("input[rel=telefone], input[rel=celular], input[data-mask=telefone], input[data-mask=celular]").focusout(function () {
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if (phone.length > 10) {
			element.mask("(99) 99999-999?9");
		} else {
			element.mask("(99) 9999-9999?9");
		}
	}).trigger('focusout');

	$("input[rel=telefone_sem_ddd], input[rel=celular], input[data-mask=telefone_sem_ddd], input[data-mask=celular]").focusout(function () {
		var phone, element;
		element = $(this);
		element.unmask();
		phone = element.val().replace(/\D/g, '');
		if (phone.length > 10) {
			element.mask("99999-999?9");
		} else {
			element.mask("9999-9999?9");
		}
	}).trigger('focusout');
}

function maiuscula(z){
	return z.toUpperCase();
}