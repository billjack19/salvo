

function montarTelaPrincipal(dataRegistro){
	document.getElementById("btnMenuGeralOrcamento").className = "hidden";

	indicePedido_Global = 0;
	pedido_edit_Global = "";
	ultimaPaginaGlobal = "conteudoPedido";
	var corLinha = "";
	var conteudo = "";
	var disabilitaButtonEdit = "";
	var clienteCodigo = "";


	/* Configuração das cores (Obs: não colocar ';' no final da cor e represenata por hexadecimal) */
	var corOk = "#27ae60"; // "#5cb85c";
	var corIncompleto = "#2980b9"; // "#f0ad4e";
	var corCancelado = "#ea6153"; // "#d9534f";


	/* conteudo += "<br>"; */
	conteudo += "<table class=\"table\">";
	conteudo += 	"<tr>";

	conteudo += 		"<td width='40%'>";
	conteudo += 			"<input class='form-control' type='date' value='"+dataRegistro+"' id='dataPedidosList' onchange='montarTelaPrincipal(this.value)'>";
	conteudo += 		"</td>";
	conteudo += 		"<td width='25%'>";
	conteudo += 			"<button class='btn btn-primary btn-block' onclick='montarTelaPrincipal($(\"#dataPedidosList\").val())'>";
	conteudo += 				"<i class='fa fa-refresh'></i>&nbsp;&nbsp;Atualizar";
	conteudo += 			"</button>";
	conteudo += 		"</td>";
	conteudo += 		"<td width='25%'>";
	conteudo += 			"<button class='btn btn-block' onclick='chamarTelaDeMenu( $(\"#dataPedidosList\").val() )'>";
	conteudo += 				"<i class='fa fa-list'></i>&nbsp;&nbsp;Menu";
	conteudo += 			"</button>";
	conteudo += 		"</td>";
	conteudo += 		"<td width='10%'>";
	conteudo +=				"<img src='img/Logo/" + usuario_Global.filial + ".jpg' width='100%'>";
	conteudo += 		"</td>";

	conteudo += 	"<tr>";
	conteudo += "</table>";

	$("#cabecarioOpcao").html(conteudo);


	conteudo = "";
	conteudo += "<div class=\"col-xs-12\">";


	$.ajax({
		url: caminhoServer+"pedido.php",
		type: 'POST',
		dataType: 'text',
		data:{
			'listaPedido': true,
			'filial': usuario_Global.filial,
			'vendedor': usuario_Global.vendedor,
			'data': dataRegistro /*"2017-10-31"  dataRegistro */
		}
	}).done( function(data){
		pedido_Global = JSON.parse(data);
		 console.log(pedido_Global); 
		if(pedido_Global.length == 0) {
			/* conteudo += "<br><br><br>"; */
			conteudo += "<h3 class='text-center'>Nenhum registro encontrado</h3>";
		}else {
			/* conteudo += "<br><br><br>"; */
			conteudo += "<table width='100%' class='fontTable2'>";
			conteudo += 	"<tr>";
			conteudo += 		"<td><b>Orçamento</b></td>"; /* Documento */
			conteudo += 		"<td><b>Cliente</b></td>"; /* Razao Social */
			conteudo += 		"<td align='center'><b>Total</b></td>";
			conteudo += 		"<td></td>";
			conteudo += 		"<td></td>";
			conteudo += 	"</tr>";

			for (var i = pedido_Global.length - 1; i >= 0; i--) {

				if (pedido_Global[i].flagcancelada == 1) {
					corLinha = corCancelado; // "#d9534f";
				} else if(
					pedido_Global[i].bairro == ""	||
					pedido_Global[i].cep == ""		||
					pedido_Global[i].cidade == ""	||
					pedido_Global[i].endereco == ""	||
					pedido_Global[i].estado == ""	||
					pedido_Global[i].numero == ""
				){
					corLinha = corIncompleto; // "#f0ad4e";
				} else {
					corLinha = corOk; // "#5cb85c";
				}
				disabilitaButtonEdit = pedido_Global[i].flagcancelada == 1 || pedido_Global[i].emissao.substring(0,10) != pegarData() ? "disabled" : "";

				clienteCodigo = pedido_Global[i].cliente == 0 ? "" : pedido_Global[i].cliente + " - ";

				conteudo += "<tr class='fontBranca' style='border-top-style:solid;' bgcolor='"+corLinha+"' name='linhaPedido"+i+"'>";
				conteudo += 	"<td colspan='3'>"+clienteCodigo+pedido_Global[i].razaosocial+"</td>";

				conteudo += 	"<td align='center' rowspan='2'>";
				conteudo += 		"<button class='btn' style='color: #f0ad4e' onclick='adcionarPedido("+i+")' "+disabilitaButtonEdit+">";
				conteudo += 			"<i class='fa fa-pencil'></i>";
				conteudo += 		"</button>";
				conteudo += 	"</td>";
				conteudo += 	"<td align='center' rowspan='2'>";
				conteudo += 		"<button class='btn' style='color: #428bca' onclick='selecionarPedido("+i+", \"v\")'>";
				conteudo += 			"<i class='fa fa-eye'></i>";
				conteudo += 		"</button>";
				conteudo += 	"</td>";
				
				conteudo += "</tr>";

				conteudo += "<tr class='fontBranca' bgcolor='"+corLinha+"' name='linhaPedido"+i+"'>";
				conteudo += 	"<td colspan='3'>";
				conteudo += 		"<table width='100%'>";
				conteudo += 			"<tr>"
				conteudo += 				"<td>"+pedido_Global[i].documento+"</td>";
				conteudo += 				"<td align='right'>"+formataValorParaImprimir(pedido_Global[i].total)+"</td>";
				conteudo += 			"</tr>";
				conteudo += 		"</table>";
				conteudo += 	"</td>";
				/* conteudo  += 	"<td></td>"; */
				conteudo += "</tr>";
			}
			conteudo += "</table>";
		}
		conteudo += "<br><br><br><br><br><br>";
		conteudo += "</div>";
		conteudo += "<div class='menuLegenda'>"
					+ 	"<table>"
					+ 		"<tr>"
					+ 			"<td>"
					+ 				"<div class='legenda' style='background-color: "+corOk+";'></div> "
					+ 			"</td>"
					+ 			"<td>"
					+ 				"OK &nbsp;&nbsp;&nbsp;&nbsp;"
					+ 			"</td>"
					+ 			"<td>"
					+ 				"<div class='legenda' style='background-color: "+corIncompleto+";'></div> "
					+ 			"</td>"
					+ 			"<td>"
					+				"Incompleto"
					+ 			"</td>"
					+ 			"<td>"
					+ 				"<div class='legenda' style='background-color: "+corCancelado+";'></div> "
					+ 			"</td>"
					+ 			"<td>"
					+ 				"Cancelado"
					+ 			"</td>"
					+ 		"</tr>"
					+ "</div>";
		$("#conteudoView").html(conteudo);
	});
	/* 
		Tabela que provavelmente não vai usar
	var conteudo = 	"<div class=\"col-xs-12\">";
	conteudo += 		"<h1>Orçamento - CDI</h1>";
	conteudo += 		"<div class=\"col-sm-5 iconPrincipal\"><br>";
	conteudo += 			"<span class=\"fontIcon\"><i class=\"fa fa-shopping-cart\"></i></span><br>";
	conteudo += 			"<h3>Vendas</h3>";
	conteudo += 		"</div>";
	conteudo += 		"<div class=\"col-sm-5 iconPrincipal\"><br>";
	conteudo += 			"<span class=\"fontIcon\"><i class=\"fa fa-users\"></i></span><br>";
	conteudo += 			"<h3>Clientes</h3>";
	conteudo += 		"</div>";
	conteudo += 	"</div>";
	$("#conteudoView").html(conteudo); */

	botaoFixoEsquerda("principal");
	botaoFixoDireita("principal");

	var logoCentroMenu = "";
	logoCentroMenu += "<a href=\"http://www.cdiinfo.com.br/\" target=\"_blank\"><img src=\"img/LogotipoCDI.jpg\" width=\"100%\"></a>";
	$("#logoCentroRodape").html(logoCentroMenu);
}



function setarDescAba(texto){
	$("#descricaoTag").html("<a href=\"#\">"+texto+"</a>");
	if (texto == '') 	document.getElementById("descricaoTag").className = "hidden";
	else 				document.getElementById("descricaoTag").className = "";
}




function confirmaAdicionarPedio(){
	console.log("confirmaAdicionarPedio");
	if (
		statusPedido_Gloabal.tipoCliente != typeof(cliente_Global)					||
		statusPedido_Gloabal.descricaoCliente != $("#clienteSemRegistro").val()		||
		statusPedido_Gloabal.tipoItem != typeof(item_Global)						||
		statusPedido_Gloabal.telefone != $("#telefoneCliente").val()				||
		statusPedido_Gloabal.cep != $("#cepCliente").val()							||
		statusPedido_Gloabal.endereco != $("#enderecoCliente").val()				||
		statusPedido_Gloabal.numero != $("#numeroCliente").val()					||
		statusPedido_Gloabal.bairro != $("#bairroCliente").val()					||
		statusPedido_Gloabal.cidade != $("#cidadeCliente").val()					||
		statusPedido_Gloabal.estado != $("#estadoCliente").val()
		/* typeof(cliente_Global) == "object"		 || 
		$("#clienteSemRegistro").val() != ""	 || 
		typeof(item_Global) == "object" 		 ||
		$("#telefoneCliente").val() != ""		 ||
		$("#cepCliente").val() != ""			 ||
		$("#enderecoCliente").val() != ""		 ||
		$("#numeroCliente").val() != ""			 ||
		$("#bairroCliente").val() != ""			 ||
		$("#cidadeCliente").val() != "" 		 ||
		$("#estadoCliente").val() != "" */
	){
		bootbox.confirm({
			title: "Tem certaza que deseja fechar orçamento sem salvar?",
			message: "Ao apertar o botão \"Sim\" você irá perder todas as modicafições feitas nesse orçamento",
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
				if (result) adcionarPedido(-1);
			}
		});
	} else {
		adcionarPedido(-1);
	}
}



function adcionarPedido(id){
	/* Setar classe no botão fixo de barras (para aparecer) este botão é o que chama o menu lateral */
	document.getElementById("btnMenuGeralOrcamento").className = "hamburger is-closed";

	var conteudo = "";
	var espaco = "&nbsp;&nbsp;&nbsp;";

/*
	conteudo += "<div class=\"w3-sidebar w3-bar-block w3-border-right\" style=\"display:none\" id=\"mySidebar\">";
	conteudo +=   	"<button onclick=\"w3_close()\" class=\"w3-bar-item w3-large\">";
	conteudo +=			"Orçamento: <span id='codigoPedido' name='codigoPedido'></span>&nbsp;&nbsp; <i class='fa fa-times'></i>";
	conteudo += 	"</button>";
	conteudo += 	"<a href=\"#\" class=\"w3-bar-item w3-button\" name='linkPeginaPedido' onclick='mostrarPedido(\"conteudoPedido\", this)'  onmouseover=\"setarDescAba('Pedido')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 		"<i class='fa fa-list'></i> Orçamento";
	conteudo += 	"</a>";
	conteudo += 	"<a href=\"#\" class=\"w3-bar-item w3-button\" name='linkPeginaPedido' onclick='mostrarPedido(\"conteudoPedidoItem\", this)' onmouseover=\"setarDescAba('Produtos')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 		"<i class='fa fa-shopping-cart'></i> Produtos";
	conteudo += 	"</a>";
	conteudo += 	"<a href=\"#\" class=\"w3-bar-item w3-button\" name='linkPeginaPedido' onclick='mostrarPedido(\"conteudoPedidoEntrega\", this)' onmouseover=\"setarDescAba('Entrega')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 		"<i class='fa fa-truck'></i> Entrega";
	conteudo += 	"</a>";
	conteudo += 	"<a href=\"#\" class=\"w3-bar-item w3-button\" name='linkPeginaPedido' onclick='mostrarPedido(\"conteudoPedidoPagamento\", this)' onmouseover=\"setarDescAba('Pagamento')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 		"<i class='fa fa-money'></i> Pagamento";
	conteudo += 	"</a>";
	conteudo += "</div>";
*/


	/* Menu geral */
	/* conteudo += "<div class='col-xs-12' style='position:fixed !important; background-color:white;'>"; */

	/* conteudo += "<div class=\"w3-teal\">"; */
	/* conteudo += 	"<div class=\"w3-container\">"; */
	/* conteudo += 		"<h1>My Page</h1>"; */
	/* conteudo += 	"</div>"; */
	/* conteudo += "</div>"; */
	conteudo += 	"<ul class=\"nav nav-tabs\" style='margin-left: 60px;margin-top: 0px;'>";
	/* conteudo += 		"<button class=\"w3-button w3-teal w3-xlarge\" onclick=\"w3_open()\"></button>"; */
	/* conteudo += 		"<li title='Menu' onclick=\"w3_open()\" onmouseover=\"setarDescAba('Menu')\" onmouseout=\"setarDescAba('')\">"; */
	/* conteudo += 			"<a href=\"#\" class='btn'><i class='fa fa-list'></i></a>"; */
	/* conteudo += 		"</li>"; */
	conteudo += 		"<li title='Novo' onclick='confirmaAdicionarPedio()' onmouseover=\"setarDescAba('Novo')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 			"<a href=\"#\" class='btn btn-primary botaoMenuPedido'>"+espaco+"<i class='fa fa-file-o'></i>"+espaco+"</a>";
	conteudo += 		"</li>";
	conteudo += 		"<li title='Salvar' id='btnSalvarPedido' onclick='salvarPedido()' onmouseover=\"setarDescAba('Salvar')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 			"<a href=\"#\" class='btn btn-success botaoMenuPedido'>"+espaco+"<i class='fa fa-floppy-o'></i>"+espaco+"</a>";
	conteudo += 		"</li>";
	conteudo += 		"<li title='Cancelar's id='btnCancelarPedido' onclick='cancelarPedido()' onmouseover=\"setarDescAba('Cancelar')\" onmouseout=\"setarDescAba('')\">";
	conteudo += 			"<a href=\"#\" class='btn btn-danger botaoMenuPedido'>"+espaco+"<i class='fa fa-times'></i>"+espaco+"</a>";
	conteudo += 		"</li>";
	/* Espanço entre a descrição do botão e o botão */
	conteudo += 		"<li style='color: black;background-color: gray;width: 5px;'></li>";
	/* Area para descricão do botão */
	conteudo += 		"<li id='descricaoTag' style='color: black;background-color: #eee;'></li>";
	
	conteudo += 	"<div class='imgFixedTopPedido'>"
	conteudo +=				"<img src='img/Logo/" + usuario_Global.filial + ".jpg' width='100%'>";
	conteudo += 	"</div>";
	
	conteudo += 	"</ul>";

	/* conteudo += "</div>"; */
	/*  Fim Menu de operações */
	
	$("#cabecarioOpcao").html(conteudo);


	conteudo = "";



	conteudo += "<div class='col-xs-12'>";

	/* Telas de pedido */
	/* conteudo += "<br><br><br><br>"; */

	conteudo +=		"<div class=\"container-fluid\">";
	conteudo +=  		"<div class=\"row\">";

	/* Função no arquivo tela/adicionaItem.js */
	conteudo += retornaTelaAdicionaItem(true);


	/* Função no arquivo tela/pedidoItem.js */
	conteudo += retornaTelaPedidoItem();


	/* Função no arquivo tela/pagamento.js */
	conteudo += retornaTelaPagamento();


	/* Função no arquivo tela/pedido.js */
	conteudo += retronaTelaPedido();


	/* Função no arquivo tela/entrega.js */
	conteudo += retronaTelaEntrega();

	conteudo += "<br><br><br>";
	/* Fim telas de pedido */


	conteudo += 		"</div>";
	conteudo += 	"</div>";
	conteudo += "</div>";




	/* Fim da view geral */
	$("#conteudoView").html(conteudo);
	
	botaoFixoEsquerda("addPedido");
	botaoFixoDireita("pedido");

	var valorSetadoPedido = "";
	cliente_Global = "";

	if (id == -1) {
		motarComboListCliente('clienteComboDatalist');
		$("#codigoPedido").html("");
		setarStatusGeralPedido();
	} else {
		/* Preencher com dados do pedido selecionado */
		pedido_edit_Global = pedido_Global[id];
		console.log(pedido_edit_Global);
		setarClientePedidoEditar();
		valorSetadoPedido = pedido_edit_Global.pagamento;
	}
	setarCondicoesPag(valorSetadoPedido);
	mask();
}



function setarStatusGeralPedido(){
	statusPedido_Gloabal = {
		tipoCliente: typeof(cliente_Global),
		descricaoCliente: $("#clienteSemRegistro").val(),
		tipoItem: typeof(item_Global),
		telefone: $("#telefoneCliente").val(),
		cep: $("#cepCliente").val(),
		endereco: $("#enderecoCliente").val(),
		numero: $("#numeroCliente").val(),
		bairro: $("#bairroCliente").val(),
		cidade: $("#cidadeCliente").val(),
		estado: $("#estadoCliente").val()
	}
}



function setarCondicoesPag(preValor){
	$.ajax({
		url: caminhoServer+"pagamento.php",
		type: 'POST',
		dataType: 'text',
		data:{'listarCondPag':true}
	}).done( function(data){
		console.log(data);
		data = JSON.parse(data);
		console.log(data);
		var selectCodPagamento = "";
		var selecionado = "";

		preValor = preValor == "" ? parametroCodigoDinheiro_Global : preValor.split(" ")[0];
		preValor = !isNaN(preValor) ? Number(preValor) : parametroCodigoDinheiro_Global;

		selectCodPagamento += "<select id='codPagamntoSelect' class='form-control'>";
		for (var i = 0; i < data.length; i++) {

			selecionado = data[i].codigo == preValor ? "selected" : "";

			selectCodPagamento += 	"<option value='"+data[i].codigo+" "+data[i].descricao+"' "+selecionado+">";
			selectCodPagamento += 		data[i].descricao;
			selectCodPagamento += 	"</option>";
		}
		selectCodPagamento += "</select><br>";

		$("#condPagamaentoDiv").html(selectCodPagamento);
	});
}


function salvarPedido(){
	document.getElementById("btnSalvarPedido").disabled = true;
	
	/* Varificar se tem cliente selecionado e se tem item selecionado tambem */
	if($("#clienteSemRegistro").val() != ""){
		try{
			if($("#clienteCombo_Global-flexdatalist").val() != "" && $("#clienteCombo_Global-flexdatalist").val() != "0"){
			/* if (cliente_Global.razaosocial == $("#clienteSemRegistro").val()) { */
				if (cliente_Global.codigo != undefined && cliente_Global.codigo != 0) {
					validarPedidoInsercao();
				} else {
					jk_toasth("error", "Cliente selecionado invalido", 5000);
				}
			} else {
				validarPedidoInsercao();
			}
		} catch(error){
			console.log("Deu pau no cliente (catch do try): " + error);
			validarPedidoInsercao();
		}
	/* } else if (typeof(cliente_Global) == "object") {
		console.log(cliente_Global);
		if (cliente_Global.codigo != undefined && cliente_Global.codigo != 0) {
			console.log(cliente_Global.codigo);
			validarPedidoInsercao();
		} else {
			jk_toasth("error", "Cliente selecionado invalido", 5000);
		} */
	} else {
		jk_toasth("error", "Para salvar é preciso ter algum cliente selecionado ou o nome caso não esteje cadastro", 5000);
	}
}


function setarItemSeleconado(){
	if (typeof(item_Global) == "object") {
		$("#itemCombo_Global-flexdatalist").val(item_Global.descricao);
		document.getElementById("itemCombo_Global-flexdatalist-results").style.display = 'none';
	}
}


function validarPedidoInsercao(){
	console.log("validarPedidoInsercao");
	if ($("#codigoPedido").html() == "") {
		if (typeof(item_Global) == "object") {
			if (!isNaN($("#qdtItem").val()) && Number($("#qdtItem").val()) > 0 && Number($("#qdtItem").val()) < 1000000000 && preco_minimo_Global) {

				var totalPedido = document.getElementsByName("totalPedido");
				for (var i = 0; i < totalPedido.length; i++) totalPedido[i].value = $("#vlrTotal").val();

				salvarAlteracao();
			} else if (!preco_minimo_Global) {
				jk_toasth("error", "O valor de venda está abaixo do preço minimo que é "+formataValorParaImprimir(item_Global.preco_minimo));
			} else {			
				jk_toasth("error", "Verifique o valor da quantidade", 5000)
			}
		} else {
			jk_toasth("error", "Para salvar o pedido pela primeira vez deve haver um item selecionado!", 5000);
		}
	} else {
		salvarAlteracao();
	}
}


function salvarAlteracao(){
	/* var clienteSemRegistro = $("#clienteSemRegistro").val(); */

	var codigoCliente = $("#clienteCombo_Global").val(); /* $("#codigoCliente").val(); */
	var codigoClienteFlex = $("#clienteCombo_Global").val();
	var descricaoCliente = $("#clienteSemRegistro").val();

	var codigoItem = $("#codigoItem").val();
	var codigoItemFlex = $("#itemCombo_Global").val();
	var descricaoItem = $("#itemCombo_Global-flexdatalist").val();

	/* Paramentros AJAX */
	var cliente = typeof(cliente_Global) == "object" ? cliente_Global.codigo : 0;
	var razaosocial = $("#clienteSemRegistro").val(); /* clienteSemRegistro == "" ? cliente_Global.razaosocial : clienteSemRegistro; */

	try { 			var unidade_medida = item_Global.unidade_medida[$("#selectUnidadeMedid").val()].unidade_medida } 
	catch(erro){ 	var unidade_medida = ""; }


	$.ajax({
		url: caminhoServer+"pedido.php",
		type: 'POST',
		dataType: 'text',
		data:{
			'adicionarPedidoItem': true,
			'filial': usuario_Global.filial,

			'documento': $("#codigoPedido").html(),
			'emissao': $("#dataEmissaoPedido").val(),
			'total': formataValorParaCalcular2($("#totalPedido").val()),

			'endereco': $("#enderecoCliente").val(),
			'numero': $("#numeroCliente").val(),
			'bairro': $("#bairroCliente").val(),
			'cidade': $("#cidadeCliente").val(),
			'estado': $("#estadoCliente").val(),
			'cep': $("#cepCliente").val(),
			'telefone': $("#telefoneCliente").val(),
			'cliente': cliente,
			'razaosocial': razaosocial,
			'flagcancelada': 0,
			'usuario': usuario_Global.identificacao,
			'pagamento': $("#codPagamntoSelect").val(),
			'observacao': $("#observacaoOrcamento").val(),
			'vendedor': usuario_Global.vendedor,

			'contato': $("#contatoPedido").val(),

			'grupo': item_Global.grupo,
			'sub_grupo': item_Global.sub_grupo,
			'item': item_Global.item,
			'quantidade': parseFloat( formataValorParaCalcular2($("#qtdPrincipal").val()) ), /* $("#qdtItem").val(), */
			'valor_unitario': parseFloat( formataValorParaCalcular2($("#vlrVenda").val()) ),
			'unidade': unidade_medida,
			'valor_venda': formataValorParaCalcular2($("#vlrVenda").val()),
			'quantidadeprincipal': formataValorParaCalcular2($("#qtdPrincipal").val()),
			'valor_total': formataValorParaCalcular2($("#vlrTotal").val())
		}
	}).done( function(data){
		console.log(data);
		var arrayResultado = JSON.parse(data);
		console.log(arrayResultado);
		/* if (arrayResultado.length > 1) { */
		pedido_edit_Global = arrayResultado[0];
		/* pedido_item_Global = arrayResultado[1]; */
		setarClientePedidoEditar();
		jk_toasth("success", "Orçamento salvo!", 5000);
		setarStatusGeralPedido();
	});
}



function cancelarPedido(){
	if ($("#codigoPedido").html() != "") {
		bootbox.confirm({
			title: "Tem certeza que deseja cancelar este orçamento?",
			message: "Ao aperta o botão \"Sim\" você irá cancelar este pedido do sistema",
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
						url: caminhoServer+"pedido.php",
						type: 'POST',
						dataType: 'text',
						data:{
							'cancelarPedido': true,
							'filial': usuario_Global.filial,
							'documento': $("#codigoPedido").html()
						},
						error: function(){
							console.log("Deu pau na requisição");
						}
					}).done( function(data){
						console.log(data);
						adcionarPedido(-1);
					});
				}
			}
		});
	} else {
		jk_toasth("error", "Não tem orçamento salvo para cancelar!", 5000);
	}
}


function setarClientePedidoEditar(){
	console.log(pedido_edit_Global);

	var codigoPedido = document.getElementsByName("codigoPedido");
	for (var i = 0; i < codigoPedido.length; i++) {
		codigoPedido[i].innerHTML = pedido_edit_Global.documento;
	}

	var dataEmissaoPedido = document.getElementsByName("dataEmissaoPedido");
	for (var i = 0; i < dataEmissaoPedido.length; i++) {
		dataEmissaoPedido[i].value = pedido_edit_Global.emissao.substring(0,10);
	}

	$("#codigoItem").val("");
	$("#itemCombo_Global").val("");
	$("#itemCombo_Global-flexdatalist").val("");
	item_Global = "";
	$("#qdtItem").val(1);
	document.getElementById("divViewGeralUnd").className = "hidden";
	$("#qtdPrincipal").val("");
	$("#vlrVenda").val("");
	$("#vlrTotal").val("");
	$("#estoqueProduto").val("");

	$("#telefoneCliente").val(pedido_edit_Global.telefone);

	$("#observacaoOrcamento").val(pedido_edit_Global.observacao);

	if (pedido_edit_Global.contato != "errorNotFind") {
		$("#contatoPedido").val(pedido_edit_Global.contato);
	}

	try{
		$("#cepCliente").val(pedido_edit_Global.cep);
		$("#enderecoCliente").val(pedido_edit_Global.endereco);
		document.getElementById("enderecoCliente").disabled = true;
		$("#bairroCliente").val(pedido_edit_Global.bairro);
		document.getElementById("bairroCliente").disabled = true;
		$("#cidadeCliente").val(pedido_edit_Global.cidade);
		document.getElementById("cidadeCliente").disabled = true;
		$("#estadoCliente").val(pedido_edit_Global.estado);
		document.getElementById("estadoCliente").disabled = true;
		$("#numeroCliente").val(pedido_edit_Global.numero);
	} catch(erro){ console.log(erro); }

	document.getElementById("codigoCliente").disabled = true;
	document.getElementById("clienteSemRegistro").disabled = true;

	try {
		document.getElementById("clienteCombo_Global").disabled = true;
		document.getElementById("clienteCombo_Global-flexdatalist").disabled = true;
	} catch(erro) {
		/* console.log(erro); */
		var fundoFalso = "";
		fundoFalso += "<input type='text' class='hidden' id='clienteCombo_Global' disabled>";
		fundoFalso += "<input type='text' class='form-control' id='clienteCombo_Global-flexdatalist' disabled>";
		$("#clienteComboDatalist").html(fundoFalso);
		motarComboListItem('itemComboDatalist');
	}

	document.getElementById("clienteCombo_Global-flexdatalist").value = pedido_edit_Global.cliente;
	document.getElementById("clienteSemRegistro").value = pedido_edit_Global.razaosocial;
	
	if (pedido_edit_Global.cliente != 0) setarSoCliente(pedido_edit_Global.cliente);

	document.getElementById("clienteCombo_Global").disabled = pedido_edit_Global.cliente;

	document.getElementById("btnSalvarPedido").disabled = false;
	pesquisaItensPedido();
}




function setarSoCliente(cliente){
	cliente = parseInt(cliente);
	if (jk_validaCampo(cliente, "", "")) {
		$.ajax({
			url: caminhoServer+"cliente.php",
			type: 'POST',
			dataType: 'text',
			data:{
				'listarClienteId': true,
				'id': cliente
			},
			error: function(){
				jk_toasth("error", "Codigo inválido!", 5000);
				setarStatusGeralPedido();
			}
		}).done( function(data){
			/* console.log(data); */
			if(jk_validaCampo(data, "", "Codigo invalido!")){
				cliente_Global = JSON.parse(data);
			} else $("#codigoCliente").val(cliente_Global.codigo);
			setarStatusGeralPedido();
		});
	}
}






function atualizaTotal(total){
	$.ajax({
		url: caminhoServer+"pedido.php",
		type: 'POST',
		dataType: 'text',
		data:{
			'atualizaTotal': true,
			'total': total,
			'filial': usuario_Global.filial,
			'documento': pedido_edit_Global.documento
		}
	}).done( function(data){
		console.log(data);
	});
}




/*******************************************************************************************************/
/** Funções Itens do pedido */
/*******************************************************************************************************/
function pesquisaItensPedido(){
	$.ajax({
		url: caminhoServer+"pedido_item.php",
		type: 'POST',
		dataType: 'text',
		data:{
			'listaPedidoItem': true,
			'filial': usuario_Global.filial,
			'documento': pedido_edit_Global.documento
		}
	}).done( function(data){
		/* console.log(data); */
		pedido_item_Global = JSON.parse(data);
		console.log(pedido_item_Global);

		/* setarIndiceLanc_marketing(); */
		$("#conteudoItensPedidoExclusivo").html(montarTabelaItens2(true));
	});
}



function montarTabelaItens2(editar){
	var conteudo = "";
	 var valorTotal = 0; 
	if (pedido_item_Global.length == 0) {
		conteudo += "<h3>Nenhum registro encontrado</h3>";
	} else {
		conteudo += "<table width='100%' class='fontTable2'>";
		conteudo += 	"<tr>";
		conteudo += 		"<td><b>Descrição</b></td>";
		/* conteudo += 		"<td><b>U.M.</b></td>"; */
		conteudo += 		"<td align='center'><b>Qdt - U.M.</b></td>";
		conteudo += 		"<td align='right'><b>Vlr. Uni.</b></td>";
		/* conteudo += 		"<td align='right'><b>Valor Desconto</b></td>"; */
		conteudo += 		"<td align='right'><b>Vlr. Total</b></td>";
		conteudo += 		"<td></td>";
		conteudo += 	"</tr>";

		for (var i = 0; i < pedido_item_Global.length; i++) {
			/* pedido_item_Global[i] */
			conteudo += 	"<tr id='linhaPedidoItem"+i+"' style='border-top-style:solid;'>";
			conteudo += 		"<td colspan='4'>"+pedido_item_Global[i].item.item+" - "+pedido_item_Global[i].item.descricao+"</td>";
			
			if (editar) {
				conteudo += 	"<td align='center' rowspan='2' style='vertical-align: center'>";
				conteudo += 		"<button class='btn' onclick='excluirItem2("+i+")'>";
				conteudo += 			"<i class='fa fa-times' style='color: red'></i>";
				conteudo += 		"</button>";
				conteudo += 	"</td>";
			}
			
			conteudo += 	"</tr>";
			conteudo += 	"<tr id='linhaPedidoItem2"+i+"'>";

			conteudo += 		"<td colspan='4'>";

			conteudo += 			"<table width='100%'>";
			conteudo +=					"<tr>";
			/* 		 +	 					"<td>"+pedido_item_Global[i].unidade+"</td>"; */
			conteudo += 					"<td width='33%'>"+String(pedido_item_Global[i].quantidade).replace('.',',')+" - "+pedido_item_Global[i].unidade+"</td>";
			conteudo +=						"<td width='33%'>"+formataValorParaImprimir(pedido_item_Global[i].valor_unitario)+"</td>";
			/*  	 + 						"<td align='right'>"+pedido_item_Global[i].valor_desconto+"</td>"; */
			conteudo += 					"<td width='33%'>"+formataValorParaImprimir(pedido_item_Global[i].valor_total)+"</td>";
			conteudo +=	 				"</tr>";
			conteudo +=	 			"</table>";

			conteudo +=	 		"</td>";

			conteudo +=		"</tr>";
			
			valorTotal += parseFloat(pedido_item_Global[i].valor_total); 
		}
		conteudo += 	"<tr>";
		/* conteudo += 		"<td ></td>"; */
		conteudo += 		"<td align='right' colspan='3'><b>Total: </b></td>";
		conteudo += 		"<td align='right'>"+formataValorParaImprimir(valorTotal)+"</td>";
		conteudo += 		editar ? "<td></td>" : "";
		conteudo += 	"</tr>";
		conteudo += "</table>";
	}

	/* Atualiza o valor do pedido campo que aparece em todads as telas  */
	var totalPedido = document.getElementsByName("totalPedido");
	for (var i = 0; i < totalPedido.length; i++) {
		totalPedido[i].value = formataValorParaImprimir(valorTotal);
	}
	pedido_edit_Global.total = valorTotal;
	atualizaTotal(valorTotal);

	return conteudo;
}


function excluirItem2(indice){
	if (pedido_item_Global.length > 1) {
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
					$.ajax({
						url: caminhoServer+"pedido_item.php",
						type: 'POST',
						dataType: 'text',
						data:{
							'deletarItemPedido': true,
							'filial': pedido_item_Global[indice].filial,
							'id':pedido_item_Global[indice].sequencia,
							'documento':pedido_item_Global[indice].documento,
							'valor':pedido_item_Global[indice].valor_total
						}
					}).done( function(data){
						console.log("Apagou o item");
						console.log(data);
						if (jk_validaCampo(data, "Item excluido com sucesso!", "Falha ao excluir item")) {
							pesquisaItensPedido();
							$("#linhaPedidoItem"+indice).remove();
							$("#linhaPedidoItem2"+indice).remove();
						}
					});
				}
			}
		});
	} else {
		jk_toasth("error", "Você não pode apagar todos os itens do pedido", 5000);
	}
}



function motarComboListCliente(idDiv){
	$.ajax({
		url: caminhoServer+"cliente.php",
		type: 'POST',
		dataType: 'text',
		data:{ 'listarSoCliente': true }
	}).done( function(dataCliente){
		/* console.log(dataCliente); */
		clientes_list_Global = JSON.parse(dataCliente);
		console.log(clientes_list_Global);
		
		var montarInputList = "";

		if (clientes_list_Global.length == 0) {
			montarInputList += "<input type='text' class='form-control' placeholder='Sem registros (Cliente)' disabled>";
		} else {
			montarInputList += "<input type='text' id='clienteCombo_Global'";
			montarInputList += "class='flexdatalist form-control' placeholder='Cliente'";
			montarInputList += "data-min-length='0' data-visible-properties='[\"razaosocial\"]' ";
			montarInputList += "data-selection-required='true' data-value-property='codigo' ";
			montarInputList += "onchange='mudarCliente(this.value)' onfocus='limparValorCombo(this.id)'";
			montarInputList += "disabled>";
		}
		$("#"+idDiv).html(montarInputList);

		setarValorComboNotRequi(clientes_list_Global,'clienteCombo_Global','codigo','razaosocial','c',0,"");
		motarComboListItem('itemComboDatalist');
	});
}



function motarComboListItem(idDiv){
	$.ajax({
		url: caminhoServer+"item.php",
		type: 'POST',
		dataType: 'text',
		data:{
			'listarSoItem': true,
			'filial': usuario_Global.filial
		}
	}).done( function(dataItem){
		/* console.log(dataItem); */
		item_list_Global = JSON.parse(dataItem);
		console.log(item_list_Global);
		
		var montarInputList = "";

		if (item_list_Global.length == 0) {
			montarInputList += "<input type='text' class='form-control' placeholder='Sem registros (Cliente)' disabled>";
		} else {
			montarInputList += "<input type='text' id='itemCombo_Global'";
			montarInputList += "class='flexdatalist form-control' placeholder='Cliente'";
			montarInputList += "data-min-length='0' data-visible-properties='[\"descricao\"]' ";
			montarInputList += "data-selection-required='true' data-value-property='item' ";
			montarInputList += "onchange='mudarItem(this.value)' onfocus='limparValorCombo(this.id)'";
			montarInputList += "required disabled>";
		}
		$("#"+idDiv).html(montarInputList);

		setarValorCombo(item_list_Global,'itemCombo_Global','item','descricao','i',0,"");
	});
}




function mudarItem(item){
	if (jk_validaCampo(item, "", "")) {
		$.ajax({
			url: caminhoServer+"item.php",
			type: 'POST',
			dataType: 'text',
			data:{
				'listarItemId': true,
				'id': item,
				'filial': usuario_Global.filial
			},
			error: function(){
				/* jk_toasth("error", "Codigo inválido!", 5000); */
			}
		}).done( function(data){
			 console.log(data);
			if(jk_validaCampo(data.substring(2, data.length).replace("}", ""), "", "")){
				item_Global = JSON.parse(data);
				console.log(item_Global);

				var select_unidade = "";
				var selecionado = "";
				select_unidade += "<select id='selectUnidadeMedid' class='form-control' onchange='selecionarUnidade()'>";
				for (var i = 0; i < item_Global.unidade_medida.length; i++) {

					selecionado = item_Global.unidade_medida[i].unidade_medida == item_Global.unidade_medida_venda ? " selected" : "";

					select_unidade += 	"<option value='"+i+"'"+selecionado+">";
					select_unidade += 		item_Global.unidade_medida[i].descricao_unidade + " - " + item_Global.unidade_medida[i].unidade_medida;
					select_unidade += 	"</option>";
				}
				select_unidade += "</select><br>";

				document.getElementById('divViewGeralUnd').className = "col-sm-6";
				$("#divSelectUnidade").html(select_unidade);
				$("#codigoItem").val(item);
				$("#itemCombo_Global").val(item);
				$("#itemCombo_Global-flexdatalist").val(item_Global.descricao);
				$("#vlrVenda").val(formataValorParaImprimir(item_Global.preco_medio));
				$("#estoqueProduto").val(item_Global.estoque);

				selecionarUnidade();
			} else $("#codigoItem").val(item_Global.codigo);
		});
	}
}




function selecionarUnidade(){
	console.log("selecionarUnidade");
	var indice = $("#selectUnidadeMedid").val();
	var quantidade = item_Global.unidade_medida[indice].quantidade;
	var unidade_medida = item_Global.unidade_medida[indice].unidade_medida;
	var preco_medio = item_Global.preco_medio;
	var vlrVenda = formataValorParaCalcular2($("#vlrVenda").val());
	var preco_minimo = item_Global.preco_minimo;

	console.log("vlrVenda: "+vlrVenda+"\npreco_minimo: "+preco_minimo);
	console.log(item_Global);

	if (vlrVenda < preco_minimo) 	preco_minimo_Global = false;
	else 							preco_minimo_Global = true;

	try {
		$("#qtdPrincipal").val( formatarValorParaDecimal(parseFloat(quantidade) * Number($("#qdtItem").val())) );
	} catch(erro){
		jk_toasth("error", "A qunatidade do imtem está incorreta!", 5000);
	}

	/* $("#vlrVenda").val( formataValorParaImprimir(parseFloat(preco_medio)) ); */
	calcularTotal();
}


function calcularTotal(){
	/* $("#selectUnidadeMedid").val(); */
	/* var qunatidade = $("#qdtItem").val(); */
	var quantidadePrincipal = formataValorParaCalcular2($("#qtdPrincipal").val());
	var vlrVenda = formataValorParaCalcular2($("#vlrVenda").val());
	var valorTotal = parseFloat(quantidadePrincipal) * parseFloat(vlrVenda); /* parseFloat(qunatidade) * */
	
	$("#vlrTotal").val(formataValorParaImprimir(valorTotal));
}



function mudarQdtItem(operacao){
	var quantidade = $("#qdtItem").val();
	quantidade = parseFloat(quantidade);

		 if (operacao == "-") {if(quantidade > 1) 	quantidade--;}
	else if (operacao == '+') 						quantidade++;
	else 											quantidade = operacao;

	$("#qdtItem").val(quantidade);
	$("#qtdPrincipal").val( 
		formatarValorParaDecimal(Number(item_Global.unidade_medida[$("#selectUnidadeMedid").val()].quantidade) * Number($("#qdtItem").val()))
	);
	calcularTotal();
}





var indiceEndereco_Global = 0;

function mudarCliente(cliente){
	cliente = parseInt(cliente);
	if (jk_validaCampo(cliente, "", "")) {
		$.ajax({
			url: caminhoServer+"cliente.php",
			type: 'POST',
			dataType: 'text',
			data:{
				'listarClienteId': true,
				'id': cliente
			},
			error: function(){
				jk_toasth("error", "Codigo inválido!", 5000);
			}
		}).done( function(data){
			 console.log(data); 
			if(jk_validaCampo(data, "", "Codigo invalido!")){
				cliente_Global = JSON.parse(data);
				$("#clienteSelecionado").val(cliente_Global.codigo+": "+cliente_Global.razaosocial);
				console.log(cliente_Global);
				setarClienteSelecionado();
			} else $("#codigoCliente").val(cliente_Global.codigo);
		});
	} else {
		zerarCamposEndereco(false, "", false);
	}
}



function setarClienteSelecionado(){
	console.log("setarClienteSelecionado");
	var esquerdaEndereco = "";
	var diretaEndereco = "";
	var indicePagEndereco = "";

	if (cliente_Global.telefone.length != 0) {
		/* console.log("telefone Exite"); */
		$("#telefoneCliente").val(cliente_Global.telefone[0].telefone);
	} else {
		/* console.log("telefone não Exite"); */
		$("#telefoneCliente").val("");
	}

	if (cliente_Global.endereco.length > 0 && cliente_Global.endereco[0].cep != "00000000") {
		console.log("endereco exite");

		zerarCamposEndereco(true, "", false);
		$("#cepCliente").val(cliente_Global.endereco[0].cep);
		$("#enderecoCliente").val(cliente_Global.endereco[0].endereco);
		$("#numeroCliente").val(cliente_Global.endereco[0].numero);
		$("#bairroCliente").val(cliente_Global.endereco[0].bairro);
		$("#cidadeCliente").val(cliente_Global.endereco[0].cidade);
		$("#estadoCliente").val(cliente_Global.endereco[0].estado);

		indiceEndereco_Global = 0;

		if (cliente_Global.endereco.length > 1) {

			var indeceReal = 0;
			indicePagEndereco += "<center>";
			for (var i = 1; i <= cliente_Global.endereco.length && i < 21; i++) {
				indeceReal = i - 1;
				indicePagEndereco += "<a href='#' class='tamanhoTotal' style='color: blue' name='indiceEndereco' onclick='setarEnderecoIndece("+indeceReal+", this)'>"+i+"</a>&nbsp;&nbsp;";
			}
			indicePagEndereco += "</center>";
			$("#indicePagEndereco").html(indicePagEndereco);


			esquerdaEndereco += "<a href='#' onclick='moverEndereco(\"e\")'>";
			esquerdaEndereco += 	"<i class='fa fa-arrow-left'></i>";
			esquerdaEndereco += "</a>";

			diretaEndereco += 	"<a href='#' onclick='moverEndereco(\"d\")'>";
			diretaEndereco += 		"<i class='fa fa-arrow-right'></i>";
			diretaEndereco += 	"</a>";

			$("#esquerdaEndereco").html("");
			$("#diretaEndereco").html(diretaEndereco);
		} else {
			$("#esquerdaEndereco").html("");
			$("#diretaEndereco").html("");
			$("#indicePagEndereco").html("");
		}
	} else {
		zerarCamposEndereco(false, "", false);
	}

	$("#codigoCliente").val(cliente_Global.codigo);
	$("#clienteCombo_Global").val(cliente_Global.codigo);
	$("#clienteCombo_Global-flexdatalist").val(cliente_Global.codigo);
	$("#clienteSemRegistro").val(cliente_Global.razaosocial);
}



function setarSemRegistro(valor){
	console.log("setarSemRegistro: ");
	try{
		document.getElementById("clienteCombo_Global-flexdatalist-results").style.display = "none";
	} catch(error){
		console.log(error);
	}

	if (valor != "") {
		if (typeof(cliente_Global) == "object" && valor == cliente_Global.razaosocial) {
			document.getElementById("codigoCliente").disabled = false;
			document.getElementById("clienteCombo_Global").disabled = false;
			document.getElementById("clienteCombo_Global-flexdatalist").disabled = false;	
		} else {
			cliente_Global = "";
			zerarCamposEndereco(false, "", false);
			document.getElementById("codigoCliente").disabled = true;
			document.getElementById("clienteCombo_Global").disabled = true;
			document.getElementById("clienteCombo_Global-flexdatalist").disabled = true;
			document.getElementById("codigoCliente").value = "";
			document.getElementById("telefoneCliente").value = "";

			document.getElementById("clienteSelecionado").value = "";
		}
	}
	else {
		cliente_Global = "";
		/*if(cliente_Global != "" || typeof(cliente_Global) == "object"){
			$("#clienteSelecionado").val(cliente_Global.codigo+": "+cliente_Global.razaosocial); */
			/* setarClienteSelecionado(); */
		/* } */
		document.getElementById("codigoCliente").disabled = false;
		document.getElementById("clienteCombo_Global").disabled = false;
		document.getElementById("clienteCombo_Global-flexdatalist").disabled = false;
	}
}



function zerarCamposEndereco(valorDisabled, valorCep, valorDisabledCep){
	$("#cepCliente").val(valorCep);
	$("#enderecoCliente").val("");
	$("#numeroCliente").val("");
	$("#bairroCliente").val("");
	$("#cidadeCliente").val("");
	$("#estadoCliente").val("");
	document.getElementById("cepCliente").disabled = valorDisabledCep;
	document.getElementById("enderecoCliente").disabled = valorDisabled;
	document.getElementById("numeroCliente").disabled = valorDisabledCep;
	document.getElementById("bairroCliente").disabled = valorDisabled;
	document.getElementById("cidadeCliente").disabled = valorDisabled;
	document.getElementById("estadoCliente").disabled = valorDisabled;

	$("#esquerdaEndereco").html("");
	$("#diretaEndereco").html("");
	$("#indicePagEndereco").html("");

	$("#clienteCombo_Global").val("");
	$("#clienteCombo_Global-flexdatalist").val("");
}



function moverEndereco(direcao){
	if (direcao == 'e' && (indiceEndereco_Global - 1) >= 0) {
		indiceEndereco_Global--;
	} else if (direcao == 'd' && (indiceEndereco_Global + 1) < cliente_Global.endereco.length) {
		indiceEndereco_Global++;
	}

	/* zerarCamposEndereco = limpa todos os campos e habilita ou desabilita o disabled */
	zerarCamposEndereco(true, "", false);

	$("#clienteCombo_Global").val(cliente_Global.codigo);
	/* $("#clienteCombo_Global-flexdatalist").val(cliente_Global.razaosocial); */
	$("#clienteCombo_Global-flexdatalist").val(cliente_Global.codigo);
	$("#clienteSemRegistro").val(cliente_Global.razaosocial);

	$("#cepCliente").val(cliente_Global.endereco[indiceEndereco_Global].cep);
	$("#enderecoCliente").val(cliente_Global.endereco[indiceEndereco_Global].endereco);
	$("#numeroCliente").val(cliente_Global.endereco[indiceEndereco_Global].numero);
	$("#bairroCliente").val(cliente_Global.endereco[indiceEndereco_Global].bairro);
	$("#cidadeCliente").val(cliente_Global.endereco[indiceEndereco_Global].cidade);
	$("#estadoCliente").val(cliente_Global.endereco[indiceEndereco_Global].estado);
	validaSetaEndereco();
}

function setarEnderecoIndece(indice, elemento){
	indiceEndereco_Global = indice;

	/* zerarCamposEndereco = limpa todos os campos e habilita ou desabilita o disabled */
	zerarCamposEndereco(true, "", false);

	$("#clienteCombo_Global").val(cliente_Global.codigo);
	/* $("#clienteCombo_Global-flexdatalist").val(cliente_Global.razaosocial); */
	$("#clienteCombo_Global-flexdatalist").val(cliente_Global.codigo);
	$("#clienteSemRegistro").val(cliente_Global.razaosocial);

	$("#cepCliente").val(cliente_Global.endereco[indice].cep);
	$("#enderecoCliente").val(cliente_Global.endereco[indice].endereco);
	$("#numeroCliente").val(cliente_Global.endereco[indice].numero);
	$("#bairroCliente").val(cliente_Global.endereco[indice].bairro);
	$("#cidadeCliente").val(cliente_Global.endereco[indice].cidade);
	$("#estadoCliente").val(cliente_Global.endereco[indice].estado);
	validaSetaEndereco();
}

function validaSetaEndereco(){
	var esquerdaEndereco = "";
	var diretaEndereco = "";

	if (indiceEndereco_Global > 0) {
		esquerdaEndereco += "<a href='#' onclick='moverEndereco(\"e\")'>";
		esquerdaEndereco += 	"<i class='fa fa-arrow-left'></i>";
		esquerdaEndereco += "</a>";
	}
	if ((indiceEndereco_Global + 1) < cliente_Global.endereco.length) {
		diretaEndereco += 	"<a href='#' onclick='moverEndereco(\"d\")'>";
		diretaEndereco += 		"<i class='fa fa-arrow-right'></i>";
		diretaEndereco += 	"</a>";
	}
	$("#esquerdaEndereco").html(esquerdaEndereco);
	$("#diretaEndereco").html(diretaEndereco);

	/* Indices de paginação dos endereços */
	var indicePagEndereco = "";
	indicePagEndereco += "<center>";
	if (cliente_Global.endereco.length > 20) {
		var indeceReal = 0;
		var indiceMinimo = indiceEndereco_Global - 9;
		if(indiceMinimo < 0) indiceMinimo = 1;

		for ( var i = indiceMinimo; i <= cliente_Global.endereco.length && i < (indiceMinimo + 20); i++ ) {
			if (i > 0) {
				indeceReal = i - 1;
				indicePagEndereco += "<a href='#' class='tamanhoTotal' style='color: blue' name='indiceEndereco' onclick='setarEnderecoIndece("+indeceReal+", this)'>"+i+"</a>&nbsp;&nbsp;";
			}
		}
	} else {
		for (var i = 1; i <= cliente_Global.endereco.length && i < 21; i++) {
			indeceReal = i - 1;
			indicePagEndereco += "<a href='#' class='tamanhoTotal' style='color: blue' name='indiceEndereco' onclick='setarEnderecoIndece("+indeceReal+", this)'>"+i+"</a>&nbsp;&nbsp;";
		}
	}
	indicePagEndereco += "</center>";
	$("#indicePagEndereco").html(indicePagEndereco);
}



function retornaCabecarioPedido(){
	var conteudo = "";
	/* conteudo += 	"Orçamento: <span id='codigoPedido' name='codigoPedido'></span>"; */
	conteudo += 	"<table class='table'>";
	conteudo += 		"<tr>";
	conteudo += 			"<td width='50%'>";
	conteudo += 				"Data Emissão";
	conteudo += 				"<input type='date' id='dataEmissaoPedido' name='dataEmissaoPedido' class='form-control' value='"+pegarData()+"' disabled>";
	conteudo += 			"</td>";
	conteudo += 			"<td class='text-right' width='50%'>";
	conteudo += 				"Total";
	conteudo += 				"<input type='text' id='totalPedido' name='totalPedido' value='"+formataValorParaImprimir(0)+"' class='form-control' style='text-align: right;' disabled>";
	conteudo += 			"</td>";
	conteudo += 		"</tr>";
	conteudo +=		"</table>";
	return conteudo;
}


function mostrarPedidoPre(idPegina, elemento){
	document.getElementById("btnMenuGeralOrcamento").click();
	mostrarPedido(idPegina, elemento);
}


function mostrarPedido(idPegina, elemento){
	var telaGeralAddPedido = document.getElementsByName("telaGeralAddPedido");
	for (var i = 0; i < telaGeralAddPedido.length; i++) {
		telaGeralAddPedido[i].className = "hidden";
	}
	document.getElementById(idPegina).className = "";


		 if (idPegina == "conteudoAdicionaPedidoItem" && typeof(item_Global) == "object") salvarPedido();
	else if (idPegina == "conteudoAdicionaPedidoItem" && idPegina == ultimaPaginaGlobal) jk_toasth("error", "Nenhum item selecionado!", 5000);

	ultimaPaginaGlobal = idPegina;

	/* var linkPeginaPedido = document.getElementsByName("linkPeginaPedido");
	for (var i = 0; i < linkPeginaPedido.length; i++) {
		linkPeginaPedido[i].className = "";
	} */
	/* if(elemento != null) elemento.className = "active"; */
}