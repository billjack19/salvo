// Funções particulares desse projeto
function chamarTelaOperacao(){
	document.getElementById("novaJanelaOperacao").className = "areaTotalOperacao";
	document.getElementById("usuarioLagadoView").className = "hidden";
	document.getElementById("divCamposBuscaRgiao").className = "hidden";
	$("#areaOperacao").html("");

}

function chamarTelePrincipal(){
	console.log('chamarTelePrincipal');
	document.getElementById("novaJanelaOperacao").className = "hidden";
	document.getElementById("usuarioLagadoView").className = "divNomeUsuario";
	document.getElementById("divCamposBuscaRgiao").className = "col-xs-7";
	$("#areaOperacao").html("");
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


function pegaDataHoraForm(){
	var now = new Date();
	
	var diaCerto = now.getDate() < 10 ? "0"+now.getDate() : now.getDate();
	var mesCerto = now.getMonth()+1;
	mesCerto = mesCerto < 10 ? "0"+mesCerto : mesCerto;

	var hora = now.getHours() < 10 ? "0"+now.getHours() : now.getHours();
	var minuto = now.getMinutes() < 10 ? "0"+now.getMinutes() : now.getMinutes();
	var segundo = now.getSeconds() < 10 ? "0"+now.getSeconds() : now.getSeconds();

	now = diaCerto+"/"+mesCerto+"/"+now.getFullYear()+"  "+hora+":"+minuto+":"+segundo;
	return now;
}
// function pegaDataHoraForm(){
// 	var now = new Date();
// 	var mesCerto = now.getMonth()+1;
// 	now = now.getDate()+"/"+mesCerto+"/"+now.getFullYear()+"  "+now.getHours()+":"+now.getMinutes()+":"+now.getSeconds();
// 	return now;
// }

function formatarData(dataUN){
	dataUN = dataUN.split("-");
	dataUN = dataUN[2]+"/"+dataUN[1]+"/"+dataUN[0];

	return dataUN;
}



function limparValorCombo(id){
	document.getElementById( id ).value = "";
	document.getElementById( id + "-flexdatalist" ).value = "";
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
	valor = moeda(valor , 2 , "," , ".");
	//valor = valor.toFixed(2);
	//valor = valor.replace(".", ",");
	valor = "R$"+valor;
	return valor;
}

function formatarValorParaDecimal(valor){	
	valor = parseFloat(valor);
	valor = valor.toFixed(2);
	valor = valor.replace(".", ",");
	// valor = "R$ "+valor;
	return valor;
}

function converterArrayParaJson(array){
	var objJson = '{', indice = "", valor = "", vetor = [];
	for (var i = 0; i < array.length; i++) {
		vetor = array[i].split(":");
		indice = "\"" + vetor[0] + "\"";

		if (vetor[2] == 'n') valor = vetor[1];
		else valor = "\"" + vetor[1] + "\"";
		
		if (i == 0) objJson += indice + ":" + valor;
		else objJson += "," + indice + ":" + valor;
	}
	objJson += "}";
	console.log("\n\n\n\n\n\n\n"+objJson);
	objJson = JSON.parse(objJson);
	return objJson;
}


function botaVoltarMenuPrincipal(){
	var motarSubMenu = "<button onclick='setStatus(\"inicial\");n_editar();montarMenuPrincipal()' class='btn btn-info' title='Voltar'>";
	motarSubMenu += "<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
	motarSubMenu += "Voltar";
	motarSubMenu += "</button>";

	$("#botaoVoltarFixo").html(motarSubMenu);

}

function botaoVoltarPedido(id){
	var motarSubMenu = "	<button onclick='setStatus(\"pagina2\");montarListaItem("+id+")' class='btn btn-info' title='Voltar'>";
	motarSubMenu += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
	motarSubMenu += "		Voltar ao pedido";
	motarSubMenu += "	</button>";

	$("#botaoVoltarFixo").html(motarSubMenu);
}

function moeda(valor, casas, separdor_decimal, separador_milhar){ 
 
	var valor_total = parseInt(valor * (Math.pow(10,casas)));
	var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
	var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));
	
	 
	if(centavos%10 == 0 && centavos+"".length<2 ){
		centavos = centavos+"0";
	}else if(centavos<10){
		centavos = "0"+centavos;
	}
	 
	var milhares = parseInt(inteiros/1000);
	inteiros = inteiros % 1000; 
	
	var retorno = "";
	
	if(milhares>0){
		retorno = milhares+""+separador_milhar+""+retorno
		if(inteiros == 0){
			inteiros = "000";
		} else if(inteiros < 10){
			inteiros = "00"+inteiros; 
		} else if(inteiros < 100){
			inteiros = "0"+inteiros; 
		}
	}
	retorno += inteiros+""+separdor_decimal+""+centavos;	
	return retorno;
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