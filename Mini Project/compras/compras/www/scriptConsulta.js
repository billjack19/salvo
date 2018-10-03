/* Consultar */
function buscarProduto(consulta){
	if (consulta != "") {
		$.ajax({
			url: ip_Global + "controllers/controllerProduto.php",
			type: "POST",
			dataType: 'text',
			data: {
				'buscarProduto': true,
				'consulta': consulta,

				'usuarioID': usuario_Global.login
			},
			error: function(){
				alert("Falha: verifique sua conexão com Internet");
			}
		}).done( function(data){
			console.log(data);
			$("#resultadoConsulta").html(data);
		});
	}
}


function buscarProdutoPesquisa(consulta){
	if (consulta != "") {
		$.ajax({
			url: ip_Global + "controllers/controllerProduto.php",
			type: "POST",
			dataType: 'text',
			data: {
				'buscaProdutoLista': true,
				'consulta': consulta,

				'usuarioID': usuario_Global.login
			},
			error: function(){
				alert("Falha: verifique sua conexão com Internet");
			}
		}).done( function(data){
			console.log(data);
			try{
				data = JSON.parse(data);
				console.log(data);

				if (data.length == 0) {
					var lista = "<h3>Nenhmu produto encontrado</h3>";
				} else {
					var lista = "<table class='table'>"
							  + 	"<tr>"
							  + 		"<td>"
							  + 			"<b>Quantidade | UN | Descrição | Marca | Código</b>"
							  // + 			"<table width='100%' style='padding: 0'>"
							  // + 				"<tr>"
							  // + 					"<td colspan='2' style='padding: 0'><b>Descrição</b></td>"
							  // + 				"</tr>"
							  // + 				"<tr>"
							  // + 					"<td style='padding: 0'><b>Quantidade</b></td>"
							  // + 					"<td style='padding: 0'><b>Marca</b></td>"
							  // + 				"</tr>"
							  // + 			"</table>"
							  // + 		"</td>"
							  + 	"</tr>";
					for (var i = 0; i < data.length; i++) {
						lista  += 	"<tr onclick='buscarSetarProduto({cod: \"" + data[i].codigo_item + "\"})'>"
							  + 		"<td>"
							  + 			data[i].quantidade_item 		+ "" 
							  + 			data[i].sigla_unidade_medida 	+ " - " 
							  + 			data[i].descricao_item 			+ " " 
							  + 			data[i].descricao_marca 		+ " (" 
							  + 			data[i].codigo_item 			+ ")"
							  // + 			"<table width='100%'>"
							  // + 				"<tr>"
							  // + 					"<td colspan='2' style='padding: 0'>" + data[i].codigo_item + " - " + data[i].descricao_item + "</td>"
							  // + 				"</tr>"
							  // + 				"<tr>"
							  // + 					"<td style='padding: 0'>" + data[i].quantidade_item + " - " + data[i].sigla_unidade_medida + "</td>"
							  // + 					"<td style='padding: 0'>" + data[i].descricao_marca + "</td>"
							  // + 				"</tr>"
							  // + 			"</table>"
							  + 		"</td>"
							  + 	"</tr>";
							  /*"<tr onclick='buscarSetarProduto(\"" + data[i].codigo_item + "\", false)>"
							  + 		"<td colspan='2'>" + data[i].codigo_item + " - " + data[i].descricao_item + "</td>"
							  + 	"</tr>"
							  + 	"<tr onclick='buscarSetarProduto(\"" + data[i].codigo_item + "\", false)>"
							  + 		"<td>" + data[i].quantidade_item + " - " + data[i].sigla_unidade_medida + "</td>"
							  + 		"<td>" + data[i].descricao_marca + "</td>"
							  + 	"</tr>";*/
					}
					lista += "</table>";
					// console.log(lista);
				}
				$("#resultadoPesquisaProdutoDiv").html(lista);
			} catch(error){
				alert("Falha na converssão para objeto JSON: " + error);
			}
		});
	}	
}



function buscarSupermercado(){
	// console.log(ip_Global + "controllers/controllerSupermercado.php");
	$.ajax({
		url: ip_Global + "controllers/controllerSupermercado.php",
		type: "POST",
		dataType: "text",
		data:{
			"buscaSupermercado": true,

			"usuarioID": usuario_Global.login
		},
		error: function(){
			alert("Falha: verifique sua conexão com Internet");
		}
	}).done( function(data){
		console.log(data);
		try{
			var dataObj = JSON.parse(data);
			if (dataObj[0].id_supermercado != undefined) {

				var selectSupermecado = "<select class='form-control' id='selectSupermecado'>";

				for (var i = 0; i < dataObj.length; i++) {
					selectSupermecado += "<option value='"+dataObj[i].id_supermercado+"'>" 
										+ 		dataObj[i].descricao_supermercado 
										+ "</option>";
				}
				selectSupermecado += "</select>";

				$("#comboSupermecado").html(selectSupermecado);
			}
		} catch(error){
			console.log("Falha: na conversão para objeto JSON: " + error);
		}
	});
}


function buscaListaProdutos(){
	/*
		Saber qual pedido que está
		Sempre terá que ter um pedido de compra mesmo que seja em branco
		A data inicial só começa a contar apatir do primiro item
		Sugestão: colocar campo numItens na tabela de Pedido/Compra
	*/
}


function buscarProdutosComprados(){

}


function buscarHistoriocosPedido(){

}



function buscarUnidadeMedida(){
	$.ajax({
		url: ip_Global + "controllers/controllerUnidadeMedida.php",
		type: "POST",
		dataType: "text",
		data: { 
			"buscarUnidadeMedida": true,

			"usuarioID": usuario_Global.login
		}
	}).done( function(data){
		console.log(data);

		try{
			data = JSON.parse(data);
			console.log(data);
			if (data.length > 1) {
				var select = "<select class='form-control' id='unidadeProdutoMdal'>";
				for (var i = 0; i < data.length; i++) {
					select 	+= 	"<option value='" + data[i].id_unidade_medida + "'>"
							+ 		data[i].sigla_unidade_medida + " - " + data[i].descricao_unidade_medida 
							+ 	"</option>";
				}
				select += "</select>";
			} else {
				var select  = 	"<select class='form-control' id='unidadeProdutoMdal' disabled>"
							+ 		"<option value=''>Sem Unidade</option>";
							+ 	"</select>";
			}
			console.log("select: " + select);
			$("#selectUnidadeMedDiv").html(select);
		} catch(error){
			console.log("Falha: erro na converssã do objeto JSON: " + error);
		}
	});
}









function buscaMarca(){
	// $("#divOsIdCombo").html("<h3>Carregando Obras...</h3>");
	$.ajax({
		url: ip_Global + "controllers/controllerMarca.php",
		type: "POST",
		dataType: "text",
		data: {
			'buscaMarca': true,

			"usuarioID": usuario_Global.login
		}
	}).done( function(data){
		console.log(data);
		try{
			data = JSON.parse(data);
			console.log(data);
			if(data[0].debug != "OK") console.error("Error: " + data.debug);
			else {
				var inputDataList = "<div class=\"input-group\">"
								  +		"<input type='text' id='marcaProtudoModal'"
								  +			" class='flexdatalist form-control' placeholder='Obra'"
								  +			" data-min-length='0' data-visible-properties='[\"descricao_marca\"]' "
								  +			" data-selection-required='true' data-value-property='id_marca' "
								  // +		" onchange='selecionaOs(this.value)' onblur='selecionaOs(this.value)'"
								  +			" required disabled>"
								  + 	"<span class=\"input-group-addon\" onclick='adicionarMarca()'>"
								  +			"&nbsp;&nbsp;&nbsp;<i class=\"fa fa-plus\"></i>&nbsp;&nbsp;&nbsp;"
								  +		"</span>"
								  + "</div>"
								  + "<div class='hidden' id='adicionarMarcaDiv'>"
								  + 	"<div class=\"input-group\">"
								  + 		"<input type='text' class='form-control' id='adicionarMarcaInput'>"
								  + 		"<span class=\"input-group-addon\" onclick='adicionarMarcaAcao()'>"
								  +				"&nbsp;&nbsp;&nbsp;<i class=\"fa fa-floppy-o\"></i>&nbsp;&nbsp;&nbsp;"
								  +			"</span>"
								  + "</div>";

				$("#comboMaraDiv").html(inputDataList);
				setarValorCombo(data,'marcaProtudoModal','id_marca','descricao_marca','',0,"", function(){});
			}
		} catch(error){
			console.error(error);
		}
	});
}



function setarValorCombo(eljson, id, value, descricao, accessKey, idValor, DescricaoValor, onblur){
	$('#'+id+'').flexdatalist({
		selectionRequired: true,
		valueProperty: value,
		searchIn: descricao,
		minLength: 0,
		data: eljson
	});
	document.getElementById( id + "-flexdatalist").disabled = false;
	document.getElementById( id + "-flexdatalist").accessKey = accessKey;
	$("#" + id + "-flexdatalist").blur( onblur );

	if (idValor != 0 && DescricaoValor != "") {
		document.getElementById( id ).value = idValor;
		document.getElementById( id + "-flexdatalist" ).value = DescricaoValor;
		// $("#" + id + "-flexdatalist")[0].onfocus = function(){ viewRodape("hide"); }
		// $("#" + id + "-flexdatalist")[0].onblur  = function(){ viewRodape("show"); }
	}
}