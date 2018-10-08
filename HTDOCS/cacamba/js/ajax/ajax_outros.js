function marcaFiltro(filtro){
	var check = document.getElementById("filtro"+filtro).checked;
	document.getElementById("filtro"+filtro).click();
	if (!check) {
		document.getElementById("linha"+filtro).style.backgroundColor = "#5cb85c";
		atualizaCacamba();
		atualizaPosicaoCaminhao();
		atualizaCliente();
	} else {
		document.getElementById("linha"+filtro).style.backgroundColor = "#d9534f";
		atualizaCacamba();
		atualizaPosicaoCaminhao();
		atualizaCliente();
	}
}


function listarClientesCombo(){
	$.ajax({
		url:'controllers/funcoes_clienteController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_cliente': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){

		var id_cliente = "";
		var razao_social = "";
		var endereco_cliente = "";
		var numero_cliente = "";
		var bairro_cliente = "";
		var cidade_cliente = "";
		var uf_cliente = "";
		var cep_cliente = "";
		var latidude_cliente = "";
		var longitude_cliente = "";
		var telaCadastroCliente = "";
		var bool_ativo = "";


		var montarInputListCidade = "";
		var arrayJson = "";
		var cont = 0;

		if (data == "") {
			$.toast({
				text: "Nunhum Cliente!", 
				heading: 'Falha', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: toast_position,
				extAlign: toast_extAlign,
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			montarInputListCidade += "<input type='text' id='clienteInputList'";
			montarInputListCidade += "class='flexdatalist form-control'";
			montarInputListCidade += "data-min-length='0' data-visible-properties='[\"razao_social\"]' ";
			montarInputListCidade += "data-selection-required='true' data-value-property='id_cliente' ";
			montarInputListCidade += "onclick='descricaoClienteModal();' ";
			montarInputListCidade += "list='clienteDataList' required>";

			var vetor = data.split("[]");
			var subvetor = [];
			
			arrayJson += "[";
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_cliente = 		subvetor[0];
				razao_social = 		subvetor[1];
				endereco_cliente = 	subvetor[2];
				numero_cliente = 	subvetor[3];
				bairro_cliente = 	subvetor[4];
				cidade_cliente = 	subvetor[5];
				uf_cliente = 		subvetor[6];
				cep_cliente = 		subvetor[7];
				latidude_cliente = 	subvetor[8];
				longitude_cliente = subvetor[9];
				bool_ativo = 		subvetor[10];

				if (bool_ativo == 1) {
					if (cont  == 0) {
						arrayJson += "{\"id_cliente\": "+id_cliente+", \"razao_social\": \""+razao_social+"\"}";
					} else {
						arrayJson += ",{\"id_cliente\": "+id_cliente+", \"razao_social\": \""+razao_social+"\"}";
					}
					cont++;
				}
			}
			arrayJson += "]";
		}
		$("#comboClienteModalCacambaCliente").html(montarInputListCidade);
		arrayJson = JSON.parse(arrayJson);
		setarValorClienteInputList(arrayJson);
	});
}

function setarValorClienteInputList(eljson){
	$('#clienteInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'id_cliente',
		searchIn: 'razao_social',
		minLength: 0,
		data: eljson
	});
}


function mostrarValorCombo(){
	var valor = $("#cidadeInputList").val();
	alert('valor: '+valor);
}

function descricaoClienteModal(){
	var descricaoCliente = "";
	var id = $("#clienteInputList").val();
	if (id != 0 && id != "") {		
		var id_cliente = "";
		var razao_social = "";
		var endereco_cliente = "";
		var numero_cliente = "";
		var bairro_cliente = "";
		var cidade_cliente = "";
		var uf_cliente = "";
		var cep_cliente = "";
		var latidude_cliente = "";
		var longitude_cliente = "";
		var telaCadastroCliente = "";
		var bool_ativo = "";

		$.ajax({
			url:'controllers/funcoes_clienteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_cliente_id': true,
				'id': id
			}
		}).done( function(data){

			var vetor = data.split(",");

			id_cliente = 		vetor[0];
			razao_social = 		vetor[1];
			endereco_cliente = 	vetor[2];
			numero_cliente = 	vetor[3];
			bairro_cliente = 	vetor[4];
			cidade_cliente = 	vetor[5];
			uf_cliente = 		vetor[6];
			cep_cliente = 		vetor[7];
			latidude_cliente = 	vetor[8];
			longitude_cliente = vetor[9];
			bool_ativo = 		vetor[10];

			descricaoCliente += "<br><h3><b>Razão Social:</b>&nbsp;"+razao_social+"<br>";
			descricaoCliente += "<b>Endereço:</b>&nbsp;"+endereco_cliente+",&nbsp;<b>Nº:</b>"+numero_cliente+"<br>";
			descricaoCliente += "<b>Bairro:</b>&nbsp;"+bairro_cliente+"<br>";
			descricaoCliente += "<b>Cidade:</b>&nbsp;"+cidade_cliente+"<br>";
			descricaoCliente += "<b>UF:</b>&nbsp;"+uf_cliente+"<br>";
			descricaoCliente += "<b>CEP:</b>&nbsp;"+cep_cliente+"</h3>";

			$("#descricaoClienteModalCacambaCliente").html(descricaoCliente);
		});
	}
}


// focar campo cliente do modal de adicionar cacamba ao cliente
$('#modalcacambaCliente').on('shown.bs.modal', function () {
   $('#clienteInputList-flexdatalist').focus();
   $("#descricaoClienteModalCacambaCliente").html('');
});












/***********************************************************************************************************************************/
/*                                                      Filtros por região                                                         */
/***********************************************************************************************************************************/

// Montar combos das regioes e sub regioes
function listarRegiaoCombo(){
	$.ajax({
		url:'controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {'pequisa_regiao': true }
	}).done( function(data){

		var id_regiao = "";
		var descricao_regiao = "";
		var latitude_regiao = "";
		var longitude_regiao = "";


		var montarInputListCidade = "";
		var arrayJson = "";
		var cont = 0;

		if (data == "") {
			$.toast({
				text: "Nunhuma Ragião!", 
				heading: 'Falha', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: toast_position,
				extAlign: toast_extAlign,
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			montarInputListCidade += "<input type='text' accessKey='h' id='regiaoInputList'";
			montarInputListCidade += "class='flexdatalist form-control' placeholder='Região'";
			montarInputListCidade += "data-min-length='0' data-visible-properties='[\"descricao_regiao\"]' ";
			montarInputListCidade += "data-selection-required='true' data-value-property='id_regiao' ";
			montarInputListCidade += "onchange='listarSubRegiaoCombo(this.value);' ";
			montarInputListCidade += "required>";

			var vetor = data.split("[]");
			var subvetor = [];
			
			arrayJson += "[";
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_regiao = 		subvetor[0];
				descricao_regiao = 	subvetor[1];
				latitude_regiao = 	subvetor[2];
				longitude_regiao = 	subvetor[3];

				if (cont  == 0) {
					arrayJson += "{\"id_regiao\": "+id_regiao+", \"descricao_regiao\": \""+descricao_regiao+"\"}";
				} else {
					arrayJson += ",{\"id_regiao\": "+id_regiao+", \"descricao_regiao\": \""+descricao_regiao+"\"}";
				}
				cont++;
			}
			arrayJson += "]";
		}
		$("#comboRegioesDiv").html(montarInputListCidade);
		arrayJson = JSON.parse(arrayJson);
		setarValorRegiaoInputList(arrayJson);
	});
}

function setarValorRegiaoInputList(eljson){
	$('#regiaoInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'id_regiao',
		searchIn: 'descricao_regiao',
		minLength: 0,
		data: eljson
	});
	document.getElementById("regiaoInputList-flexdatalist").accessKey = "h";
}


function listarSubRegiaoCombo(regiao_id){
	var descricao_regiao = document.getElementById("regiaoInputList-flexdatalist").value;
	if (regiao_id != "" && regiao_id != 0 && regiao_id != "undefined" && regiao_id != undefined && descricao_regiao != "") {
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_regiao_id': true,
				'regiao_id': regiao_id 
			}
		}).done( function(data){
			var id_regiao = "";
			var descricao_regiao = "";
			var latitude_regiao = "";
			var longitude_regiao = "";

			var vetor = data.split("[]");
			var subvetor = [];

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_regiao = 		subvetor[0];
				descricao_regiao = 	subvetor[1];
				latitude_regiao = 	subvetor[2];
				longitude_regiao = 	subvetor[3];

				var posicao = {lat: parseFloat(latitude_regiao), lng: parseFloat(longitude_regiao)};
				map.setCenter(posicao);
				map.setZoom(14);
			}
		});

		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_sub_regiao': true,
				'regiao_id': regiao_id 
			}
		}).done( function(data){

			var id_sub_regiao = "";
			var descricao_sub_regiao = "";
			var latitude_sub_regiao = "";
			var longitude_sub_regiao = "";

			var montarInputListCidade = "";
			var arrayJson = "";
			var cont = 0;

			if (data == "") {
				$.toast({
					text: "Nunhuma Sub Região!", 
					heading: 'Falha', 
					icon: 'error', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: toast_position,
					extAlign: toast_extAlign,
					loader: true,
					loaderBg: '#44f'
				});
			} else {
				montarInputListCidade += "<input type='text' accessKey='j' id='subRegiaoInputList'";
				montarInputListCidade += "class='flexdatalist form-control' placeholder='Sub_Região'";
				montarInputListCidade += "data-min-length='0' data-visible-properties='[\"descricao_sub_regiao\"]' ";
				montarInputListCidade += "data-selection-required='true' data-value-property='id_sub_regiao' ";
				montarInputListCidade += "onchange='selecionarSubRegiao();' ";
				montarInputListCidade += "required>";

				var vetor = data.split("[]");
				var subvetor = [];
				
				arrayJson += "[";
				for (var i = 0; i < vetor.length; i++) {
					subvetor = vetor[i].split(",");

					id_sub_regiao = 		subvetor[0];
					descricao_sub_regiao = subvetor[1];
					latitude_sub_regiao = 	subvetor[2];
					longitude_sub_regiao = subvetor[3];

					if (cont  == 0) {
						arrayJson += "{\"id_sub_regiao\": "+id_sub_regiao+", \"descricao_sub_regiao\": \""+descricao_sub_regiao+"\"}";
					} else {
						arrayJson += ",{\"id_sub_regiao\": "+id_sub_regiao+", \"descricao_sub_regiao\": \""+descricao_sub_regiao+"\"}";
					}
					cont++;
				}
				arrayJson += "]";
			}
			$("#comboSubRegioesDiv").html(montarInputListCidade);
			arrayJson = JSON.parse(arrayJson);
			setarValorSubRegiaoInputList(arrayJson);
		});
	}
}

function setarValorSubRegiaoInputList(eljson){
	$('#subRegiaoInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'id_sub_regiao',
		searchIn: 'descricao_sub_regiao',
		minLength: 0,
		data: eljson
	});
	document.getElementById("subRegiaoInputList-flexdatalist").accessKey = "j";
}



function selecionarSubRegiao(){
	var regiao_id = $("#subRegiaoInputList").val();
	var descricao_sub_regiao = document.getElementById("subRegiaoInputList-flexdatalist").value;
	if (regiao_id != "" && regiao_id != 0 && regiao_id != "undefined" && regiao_id != undefined && descricao_sub_regiao != "") {
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_sub_regiao_id': true,
				'sub_regiao_id': regiao_id 
			}
		}).done( function(data){
			var id_regiao = "";
			var descricao_regiao = "";
			var latitude_regiao = "";
			var longitude_regiao = "";

			var vetor = data.split("[]");
			var subvetor = [];

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_regiao = 		subvetor[0];
				descricao_regiao = 	subvetor[1];
				latitude_regiao = 	subvetor[2];
				longitude_regiao = 	subvetor[3];

				var posicao = {lat: parseFloat(latitude_regiao), lng: parseFloat(longitude_regiao)};
				map.setCenter(posicao);
				map.setZoom(16);
			}
		});
	}
}