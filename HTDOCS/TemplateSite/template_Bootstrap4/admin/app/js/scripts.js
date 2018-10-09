function editar(el){
	var id = $(el).data("id");
	id = parseInt(id);
	$("#editar").val(id);
}

function n_editar(){
	$("#editar").val(0);
}



function grade(el, tabelaP, tabelaG){
	var grades = document.getElementsByName("grade");
	var id = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == tabelaP && $(grades[i]).data("g") == tabelaG) {
			id = parseInt($(el).data("id"));
			$(grades[i]).val(id);
		}
	}
}

function n_grade(tabelaP, tabelaG){
	var grades = document.getElementsByName("grade");
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == tabelaP && $(grades[i]).data("g") == tabelaG) {
			$(grades[i]).val(0);
		}
	}
}


function verificaGrade(tabela, tabelaG, tabelaForm){
	var grades = document.getElementsByName("grade");
	var botaoVoltarGrade = "";
	var contGrade = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("g") == tabela && $(grades[i]).val() != 0) {
			contGrade++;
			botaoVoltarGrade += "<a href=\"principal.php#!grade_"+tabela+"-"+$(grades[i]).data("p")+"\" onclick=\"n_grade('"+tabela+"', '"+tabelaG+"')\" class=\"btn btn-info\">";
			botaoVoltarGrade += 	"<i class=\"fa fa-arrow-left\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Voltar "+tabelaForm+"";
			botaoVoltarGrade += "</a>";
		}
	}
	if (contGrade == 0) {
		botaoVoltarGrade += "<a href=\"principal.php#!"+tabela+"\" onclick=\"n_grade('"+tabela+"', '"+tabelaG+"')\" class=\"btn btn-info\">";
		botaoVoltarGrade += 	"<i class=\"fa fa-arrow-left\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Voltar "+tabelaForm+"";
		botaoVoltarGrade += "</a>";
	}
	return botaoVoltarGrade;
}


function retornaValorIdTabelaPrimaria(tabelaP, tabelaG){
	var grades = document.getElementsByName("grade");
	var idTabelaPrimaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == tabelaP && $(grades[i]).data("g") == tabelaG) {
			idTabelaPrimaria = $(grades[i]).val();
		}
	}
	return idTabelaPrimaria;
}



function maius(obj){
    obj.value = obj.value.toUpperCase();
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
	var arrayCompleto = dataUN.split(" ");
	dataUN = arrayCompleto[0];
	dataUN = dataUN.split("-");
	var anoCerto = dataUN[0].substring(2, 4);
	dataUN = dataUN[2]+"/"+dataUN[1]+"/"+anoCerto;
	dataUN = arrayCompleto.length > 1 ? dataUN+" "+arrayCompleto[1] : dataUN;
	return dataUN;
}


function calculaTotalItem(){
	var quantidade = $("#modalQtdItem").val();
	
	formataValorParaCalcular(quantidade);
	var vlrUnitario = $("#modalVlrUnitarioItemReal").val();
	vlrUnitario = formataValorParaCalcular2(String(vlrUnitario));
	
	var codDescota = $("#qtd_n_cobrar").val();
	codDescota = codDescota != "" ? codDescota : 0;
	var contSelecionado = 0;
	var valorDesconto = 0;
	var numItemsDesconto = 0;
	var valorUnitario = 0;
	var contDesconto = 0;

	var vlrUnitarioComplemto = [];
	for(var i = 0; i < itensAdicionalArray.length; i++){
		if (document.getElementById("inputAdicional_"+itensAdicionalArray[i]).checked) {
			valorUnitario = $("#vlrUnitarioItemComplemento_"+itensAdicionalArray[i]).html();
			// console.log("valorUnitario: "+valorUnitario);
			vlrUnitarioComplemto.push(parseFloat(valorUnitario));
			contSelecionado++;
		}
	}

	vlrUnitarioComplemto.sort();
	// console.log("contSelecionado: "+contSelecionado+"\ncodDescota: "+codDescota);
	numItemsDesconto = parseInt(contSelecionado) - parseInt(codDescota);
	if (numItemsDesconto > 0) {
		for (var i = vlrUnitarioComplemto.length - 1; i >= 0; i--) {
			valorDesconto = parseFloat(vlrUnitarioComplemto[i]) + parseFloat(valorDesconto);
			contDesconto++;
			i = numItemsDesconto == contDesconto ? -1 : i;
		}
	}
	// console.log(valorDesconto);

	vlrUnitario = parseFloat(valorDesconto) + parseFloat(vlrUnitario);

	if (quantidade != "" && vlrUnitario != "") {
		// vlrUnitario = formataValorParaCalcular2(vlrUnitario);
		// vlrAdicional = formataValorParaCalcular(vlrAdicional);

		var total = quantidade * vlrUnitario;
		// total = parseFloat(total) + parseFloat(vlrAdicional);

		total = formataValorParaImprimir(total);
		vlrUnitario = formataValorParaImprimir(vlrUnitario);
		$("#modalVlrTotalItem").val(total);
		$("#modalVlrUnitarioItem").val(vlrUnitario);
	} else {
		$("#modalVlrTotalItem").val("");
	}
}

function formataValorParaCalcular(valor){
	valor = String(valor);
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

function formataValorParaQuantidade(valor){
	valor = parseFloat(valor);
	valor = valor.toFixed(3);
	valor = valor.replace(".",",");
	return valor;
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

function excluir(el , table){
	bootbox.confirm({
		title: "Tem certeza que deseja alterar o status deste cadastro?",
		message: "Ao aperta o botão \"Sim\" você irá alterar o estatus deste cadastro",
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
					url:'app/controllers/funcoesController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'excluir'	: true,
						'id'		: $(el).data("id"),
						'table' 	: table,
					}
				}).done( function(data){
					// if (data == "1") {
						toast.success("Status alterado com sucesso!");
						// $("#linha"+$(el).data("id")).remove();
					// } else {
					// 	toast.danger("Falha ao altera status!");
					// }
				});
			}
		}
	});
}

var condicaoInpc = true;
function valorInpc(){
	if (condicaoInpc) {
		$.ajax({
			url:'app/controllers/interagirUnidConsController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'inpc': true
			}
		}).done( function(data){
			if (data != null) {
				var cont = 0;
				var vetor = data.split(",,");
				var subVetor = "";
				for (var i = 0; i < vetor.length; i++) {
					cont++;
					subVetor = vetor[i].split(",");
					document.getElementById("inpc"+subVetor[1]).value = subVetor[2];
					document.getElementById("id_inpc"+subVetor[1]).value = subVetor[0];
				}
				if (cont >= 59) {
					condicaoInpc = false;
				}
			}
		});
	}
}

function liberarParaGerar(){
	document.getElementById("gerar_documentacao").disabled = false;
}

function atualizar_sitiacao(situacao){
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'atualiza_situacao': true,
			'id_unid_cons': 	 $('#editar').val()
		}
	}).done( function(data){
		alteradoParaAtualizar();
	});
}

function listaPLaca(){
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'html',
		data: {'pesquisa_caminhao_select': true}
	}).done( function(data){
		console.log(data);
		$("#listaCaminhao").html(data);
	});
}

function listaPLacaVin(){
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'html',
		data: {'pesquisa_caminhao_vin_select': true}
	}).done( function(data){
		console.log(data);
		$("#listaCaminhaoVin").html(data);
	});
}

function listaPLacaNVin(){
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'html',
		data: {'pesquisa_caminhao_n_vin_select': true}
	}).done( function(data){
		console.log(data);
		$("#listaCaminhaoNVin").html(data);
	});
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




/***************************************************************************************************************************************/
/* Funções para upload *****************************************************************************************************************/
/***************************************************************************************************************************************/
$("#imagemInputImagem").on("change", function(){
	var files = !!this.files ? this.files : [];
	if (!files.length || !window.FileReader) return;

	if (/^image/.test( files[0].type)){
		var reader = new FileReader();
		reader.readAsDataURL(files[0]);

		reader.onload = function(){
			$("#imgemViewsUploadImagem").attr('src', this.result);
			document.getElementById("btn_uploadImagemSubmit").disabled = false;
			$("#erroExtencaoArqImagem").html("");
		}
	} else {
		$("#imgemViewsUploadImagem").attr('src', "app/img/padraoUp.png");
		document.getElementById("btn_uploadImagemSubmit").disabled = true;
		$("#erroExtencaoArqImagem").html("Arquivo inválido!");
	}
});