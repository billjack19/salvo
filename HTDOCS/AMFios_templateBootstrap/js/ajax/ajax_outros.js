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

function montarComboBuscaCacambaModal(){
	jk_comboDataList(
		"Caçamba", "funcoes_cacambaController", 
		{
			'pequisa_cacamba': true,
			'cnpj': $("#identificador").data("cnpj")
		}, "cacambaModalInputList", 
		[ "1","2" ], 
		0, [1], "", "comboCacambaModalCacambaCliente", "", 0
	);
}

function listarClientesCombo(){
	jk_comboDataList(
		"Cliente", "funcoes_clienteController", 
		{
			'pequisa_cliente': true,
			'cnpj': $("#identificador").data("cnpj")
		}, "clienteModalInputList", 
		[ "1","2","3","4","5" ],
		0, [1], "", "comboClienteModalCacambaCliente", "montarComboBuscaLocalEntregaModal(this.value);", 4
	);
}

function montarComboBuscaLocalEntregaModal(id_cliente){
	var descricao_cliente = $("#clienteModalInputList-flexdatalist").val();
	if (id_cliente != "" && id_cliente != 0 && id_cliente != "undefined" && id_cliente != undefined && descricao_cliente != "") {
		jk_comboDataList(
			"Local de Entrega", "funcoes_localEntregaController", 
			{
				'pequisa_local_entrega': true,
				'id_cliente': id_cliente
			}, "localEntregaModalInputList", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12" ],
			0, [1,2], "", "comboLocalEntregaModalCacambaCliente", "", 11
		);
	} else {
		$("#comboLocalEntregaModalCacambaCliente").html("<input type='text' value='Escolha o Cliente' class='form-control' disabled>");
	}
}

// focar campo cliente do modal de adicionar cacamba ao cliente
$('#modalAdicinarMarcador').on('shown.bs.modal', function () {
   $('#cacambaModalInputList-flexdatalist').focus();
   $("#descricaoClienteModalCacambaCliente").html('');
});


/***********************************************************************************************************************************/
/*                                                      Filtros por região                                                         */
/***********************************************************************************************************************************/

// Montar combos das regioes e sub regioes
function listarRegiaoCombo(){
	jk_comboDataList(
		"Região", "funcoesController", 
		{'pequisa_regiao': true }, "regiaoInputList", 
		[ "1","2" ],
		0, [1], "h", "comboRegioesDiv", "listarSubRegiaoCombo(this.value);", 0
	);
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
		jk_comboDataList(
			"Sub Região", "funcoesController", 
			{
				'pequisa_sub_regiao': true,
				'regiao_id': regiao_id 
			}, "subRegiaoInputList", 
			[ "1","2" ],
			0, [1], "j", "comboSubRegioesDiv", "selecionarSubRegiao();", 0
		);
	} else {
		$("#comboSubRegioesDiv").html("<input type='text' value='Esconlha a Região' class='form-control' disabled>");
	}
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