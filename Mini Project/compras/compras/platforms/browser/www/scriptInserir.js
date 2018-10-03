/* Inserir */
function adicionarPedido(){
	$.ajax({
		url: ip_Global + "controllers/controllerPedido.php",
		type: "POST",
		dataType: 'text',
		data: {
			"adicionarPedido": true,

			"usuarioID": usuario_Global.login
		},
		error: function(){
			alert("Falha: verifique sua conexão com a internet!");
		}
	}).done( function(data){
		console.log(data);
		try{
			var dataObj = JSON.parse(data);
			
			
		} catch(error){
			console.log("Falha: " + error);
		}
	});
}



function adidcionarItem(){
	console.log("adidcionarItem");
	var codProdutoModla = $("#codProdutoModla").val();
	var descricaoProdutoModal = $("#descricaoProdutoModal").val();
	var marcaProtudoModal = $("#marcaProtudoModal").val();
	var qtdProtudoModal = $("#qtdProtudoModal").val();
	var unidadeProdutoMdal = $("#unidadeProdutoMdal").val();

	if (
		codProdutoModla 		!= ""	&&
		descricaoProdutoModal 	!= ""	&&
		marcaProtudoModal 		!= ""	&&
		qtdProtudoModal 		!= ""	&&
		unidadeProdutoMdal 		!= ""
	) {	
		$.ajax({
			url: ip_Global + "controllers/controllerProduto.php",
			type: "POST",
			dataType: "text",
			data: {
				"adidcionarItem": true,
				"codigo_item": codProdutoModla,
				"descricao_item": descricaoProdutoModal,
				"marca_id": marcaProtudoModal,
				"unidade_medida_id": unidadeProdutoMdal,
				"quantidade_item": qtdProtudoModal,

				"usuarioID": usuario_Global.login
			}
		}).done(function(data){
			console.log(data);
			if (data.substring(data.length -1, data.length) == "1" || data.substring(data.length -1, data.length) == 1) {
				alert("Produto cadastrado com sucesso!");
				buscarSetarProduto($("#codProdutoModla").val(), false);
			} else {
				alert("Falha: " + data);
			}
		});
	} else {
		alert("Preencha todos os dados!");
	}
}




function adicionarMarca(){
	$("#adicionarMarcaInput").val($("#marcaProtudoModal-flexdatalist").val());
	$("#adicionarMarcaDiv")[0].className = "";
	$("#adicionarMarcaInput")[0].focus();
}


function adicionarMarcaAcao(){
	var marca = $("#adicionarMarcaInput").val();
	if (marca != "") {
		$.ajax({
			url: ip_Global + "controllers/controllerMarca.php",
			type: "POST",
			dataType: "text",
			data: {
				"adidcionarMarca": true,
				"marca": marca,

				"usuarioID": usuario_Global.login
			}
		}).done( function(data){
			console.log(data);
			if (data.substring(data.length-1, data.length) == "1") {
				alert("Marca cadastrada coom sucesso!");
				$("#comboMaraDiv").html("<h4>Carregando Marcas...</h4>");
				buscaMarca();
			} else {
				alert("Falha ao cadastrar marca: " + data);
			}
		});
	} else {
		$("#adicionarMarcaDiv")[0].className = "hidden";
		// alert("Digite a marca!");
	}
}