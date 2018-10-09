function listarCaminhao(){
	var filtro = document.getElementById("filtro_caminhao").checked;
	if (filtro) {

		var latitude = "";
		var logitude = "";
		var titulo = "";
		var situacao = 0;
		var id_caminhao = 0;
		var inputsCaminhaos = "";


		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {'pequisa_caminhao': true}
		}).done( function(data){
			if (data == "") { } 
			else {
				var vetor = data.split("[]");
				var subvetor = [];
				for (var i = 0; i < vetor.length; i++) {
					subvetor = vetor[i].split(",");


					id_caminhao = subvetor[0];
					latitude = subvetor[3];
					logitude = subvetor[2];
					titulo = subvetor[1];

					adicionarCaminhao(latitude , logitude, titulo);
				}
			}
		});
	}
}

function atualizaPosicaoCaminhao(){
	removerCaminhaos();
	Caminhaos = [];
	listarCaminhao();
}




/* -------------------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------------------- */
/* ------------------------------------------------ CRUD CAMINHAO COMPLETO -------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------------------------------------------------------- */

function chamarTelaCaminhao(){
	chamarTelaOperacao();

	var id_caminhao = "";
	var descricao = "";
	var longitude = "";
	var latidude = "";
	var motorista_id = "";
	var status_caminhao = "";
	var ultima_atualizacao = "";
	var ativo_caminhao = "";

	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCaminhao = "";

	$.ajax({
		url:'controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {'pequisa_caminhao': true}
	}).done( function(data){
		telaCadastroCaminhao += "<div class='col-md-12 text-center'>";
		telaCadastroCaminhao += "<h1>Caminhão</h1>";
		telaCadastroCaminhao += "</div>";

		telaCadastroCaminhao += "<div class='col-md-12 text-right'  style='margin-top: -50px;'>";
		telaCadastroCaminhao += "<button class='btn btn-success' accessKey='a' onclick='telaAdicionarCaminhao(0);'>";
		telaCadastroCaminhao += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;Adicionar Caminhão";
		telaCadastroCaminhao += "</button>";
		telaCadastroCaminhao += "&nbsp;&nbsp;";
		telaCadastroCaminhao += "<button class='btn btn-primary' accessKey='v' onclick='chamarTelePrincipal();'>";
		telaCadastroCaminhao += "<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Mapa";
		telaCadastroCaminhao += "</button>";
		telaCadastroCaminhao += "</div>";

		telaCadastroCaminhao += "<div class='col-md-12'>";
		

		if (data == "") {
			telaCadastroCaminhao += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCaminhao += "<br>";

			telaCadastroCaminhao += "<div class='bloco'>";
			telaCadastroCaminhao += "<table class='table'>";
			telaCadastroCaminhao += "<tr>";
			telaCadastroCaminhao += "<td>Descrição</td>";
			telaCadastroCaminhao += "<td name='motoristasCampo'>Motorista</td>";
			telaCadastroCaminhao += "<td>Situação</td>";
			telaCadastroCaminhao += "<td>Última Atualização</td>";
			// telaCadastroCaminhao += "<td>Bairro</td>";
			// telaCadastroCaminhao += "<td>Cidade</td>";
			// telaCadastroCaminhao += "<td>UF</td>";
			telaCadastroCaminhao += "<td>Editar</td>";
			telaCadastroCaminhao += "<td>Ativo</td>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_caminhao = 			subvetor[0];
				descricao = 			subvetor[1];
				longitude = 			subvetor[2];
				latidude = 				subvetor[3];
				motorista_id = 			subvetor[4];
				status_caminhao = 		subvetor[5];
				ultima_atualizacao = 	subvetor[6];
				ativo_caminhao = 		subvetor[7];
				// latidude_cliente = 		subvetor[8];
				// longitude_cliente = 	subvetor[9];
				// bool_ativo = 			subvetor[10];

				if (ativo_caminhao == 1) { 
					desabilitar = "";
					icone_ativo = "<i class='fa fa-check' aria-hidden='true'></i>";
					cor_ativo = "#0f0;"
				} else {
					desabilitar = "disabled";
					cor_ativo = "#f00;";
					icone_ativo = "<i class='fa fa-times' aria-hidden='true'></i>";
				}


				telaCadastroCaminhao += "<tr>";
				telaCadastroCaminhao += "<td>"+descricao+"</td>";
				telaCadastroCaminhao += "<td>"+motorista_id+"</td>";
				telaCadastroCaminhao += "<td>"+status_caminhao+"</td>";
				telaCadastroCaminhao += "<td>"+ultima_atualizacao+"</td>";
				// telaCadastroCaminhao += "<td>"+bairro_cliente+"</td>";
				// telaCadastroCaminhao += "<td>"+cidade_cliente+"</td>";
				// telaCadastroCaminhao += "<td>"+uf_cliente+"</td>";
				telaCadastroCaminhao += "<td>";
				telaCadastroCaminhao += "<button class='btn' onclick='telaAdicionarCaminhao("+id_caminhao+");' style='color:#f0ad4e;' "+desabilitar+">";
				telaCadastroCaminhao += "<i class='fa fa-pencil' aria-hidden='true'></i>";
				telaCadastroCaminhao += "</button>";
				telaCadastroCaminhao += "</td>";

				telaCadastroCaminhao += "<td>";
				telaCadastroCaminhao += "<button class='btn' onclick='alteraAtivoCliente("+id_caminhao+",0);' style='color:"+cor_ativo+"' "+desabilitar+">";
				telaCadastroCaminhao += icone_ativo
				telaCadastroCaminhao += "</button>";
				telaCadastroCaminhao += "</td>";

				telaCadastroCaminhao += "</tr>";
			}
			telaCadastroCaminhao += "</table>";
			telaCadastroCaminhao += "</div>";	
		}
		telaCadastroCaminhao += "</div>";
		$("#areaOperacao").html(telaCadastroCaminhao);
	});
}



function telaAdicionarCaminhao(id){ 
	var id_caminhao = "";
	var descricao = "";
	var longitude = "";
	var latidude = "";
	var motorista_id = "";
	var status_caminhao = "";
	var ultima_atualizacao = "";
	var ativo_caminhao = "";


	chamarTelaOperacao();
	var telaAdicionaCaminhao = "";
	telaAdicionaCaminhao += "<div class='col-md-11 text-left' style='margin-left:15px;margin-right:50px;'>";
	telaAdicionaCaminhao += "		<div class='text-left title'>";
	telaAdicionaCaminhao += "			<h2>";
	telaAdicionaCaminhao += "				Formulário de Cadastro de Cliente";
	telaAdicionaCaminhao += "			</h2>";
	telaAdicionaCaminhao += "			<div class='text-left'>";
	telaAdicionaCaminhao += "				<a href='#' onclick='chamarTelaCaminhao();' accessKey='v' class='btn' title='Voltar'>";
	telaAdicionaCaminhao += "					<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCaminhao += "				</a>";
	telaAdicionaCaminhao += "			</div>";
	telaAdicionaCaminhao += "			";
	telaAdicionaCaminhao += "		</div>";
	telaAdicionaCaminhao += "		<div class='form-group row'>";
	telaAdicionaCaminhao += "			<div class='row'>";
	telaAdicionaCaminhao += "				<div class='col-md-5'>";
	telaAdicionaCaminhao += "					<label class='label-float'>Descrição:</label> <span style='color: red;'>*</span></label>";
	telaAdicionaCaminhao += "					<input type='text' accessKey='i' value='"+descricao+"' id='descricao_cadastro' class='form-control' required>";
	telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "				<div class='col-md-4'>";
	// telaAdicionaCaminhao += "					<label>CEP: <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<div class='input-group'>";
	// telaAdicionaCaminhao += "						<input id='cep_cadastro' value='"+cep_cliente+"' type='text' rel=cep class='form-control' onkeyup='buscaPorCep2();' required>";
	// telaAdicionaCaminhao += "						<div class='input-group-addon' id='carregarCep2'>";
	// telaAdicionaCaminhao += "							<i class='fa fa-location-arrow' aria-hidden='true'></i>";
	// telaAdicionaCaminhao += "						</div>";
	// telaAdicionaCaminhao += "					</div>";
	// telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "				<div class='col-md-3'>";
	// telaAdicionaCaminhao += "					<label class='label-float'>Numero:</label> <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<input type='number' value='"+numero_cliente+"' id='numero_cadastro' class='form-control' required>";
	// telaAdicionaCaminhao += "				</div>";
	telaAdicionaCaminhao += "			</div>";
	telaAdicionaCaminhao += "			<br>";
	// telaAdicionaCaminhao += "			<div class='row'>";
	// telaAdicionaCaminhao += "				<div class='col-md-4'>";
	// telaAdicionaCaminhao += "					<label class='label-float'>Endereço:</label> <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<input type='text' value='"+endereco_cliente+"' id='endereco_cadastro' class='form-control' disabled required>";
	// telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "				<div class='col-md-3'>";
	// telaAdicionaCaminhao += "					<label class='label-float'>Bairro:</label> <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<input type='text' value='"+bairro_cliente+"' id='bairro_cadastro' class='form-control' disabled required>";
	// telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "				<div class='col-md-3'>";
	// telaAdicionaCaminhao += "					<label class='label-float'>Cidade:</label> <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<input type='text' value='"+cidade_cliente+"' id='cidade_cadastro' class='form-control' disabled required>";
	// telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "				<div class='col-md-2'>";
	// telaAdicionaCaminhao += "					<label class='label-float'>UF:</label> <span style='color: red;'>*</span></label>";
	// telaAdicionaCaminhao += "					<input type='text' value='"+uf_cliente+"' id='uf_cadastro' class='form-control' disabled required>";
	// telaAdicionaCaminhao += "				</div>";
	// telaAdicionaCaminhao += "			</div>";
	telaAdicionaCaminhao += "			<br>";
	telaAdicionaCaminhao += "			<div class='row'>";
	telaAdicionaCaminhao += "			</div>";
	telaAdicionaCaminhao += "			<br><br>";
	telaAdicionaCaminhao += "			<div class='col-md-6 col-md-offset-3 text-center'>";
	telaAdicionaCaminhao += "				<div class='form-item'>";
	telaAdicionaCaminhao += "					<a href='#' onclick='chamarTelaCliente();' class='btn btn-info' title='Voltar'>";
	telaAdicionaCaminhao += "						<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCaminhao += "						&nbsp;Voltar para Caminhão";
	telaAdicionaCaminhao += "					</a>";
	telaAdicionaCaminhao += "					&nbsp;";
	
	if (id != 0) {
		telaAdicionaCaminhao += "					<button onclick='editarCaminhao("+id+");' accessKey='s' class='btn btn-success'>";
		telaAdicionaCaminhao += "						<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCaminhao += "						&nbsp;Atualizar";
		telaAdicionaCaminhao += "					</button>";
	} else {
		telaAdicionaCaminhao += "					<button onclick='adicionarCaminhaoCadastro();' accessKey='s' class='btn btn-success'>";
		telaAdicionaCaminhao += "						<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCaminhao += "						&nbsp;Enviar";
		telaAdicionaCaminhao += "					</button>";
	}
/*
	telaAdicionaCaminhao += "					&nbsp;";
	telaAdicionaCaminhao += "					<button type='reset' class='btn btn-danger'>";
	telaAdicionaCaminhao += "						<i class='fa fa-trash-o' aria-hidden='true'></i>";
	telaAdicionaCaminhao += "						&nbsp;Limpar";
	telaAdicionaCaminhao += "					</button>";*/
	telaAdicionaCaminhao += "				</div>";
	telaAdicionaCaminhao += "			</div>";
	telaAdicionaCaminhao += "		</div>";
	telaAdicionaCaminhao += "</div>";

	$("#areaOperacao").html(telaAdicionaCaminhao);
	$('#descricao_cadastro').focus();

	mask();
	if (id != 0) {
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_caminhao_id': true,
				'id': id
			}
		}).done( function(data){

			var vetor = data.split(",");

			id_caminhao = 			subvetor[0];
			descricao = 			subvetor[1];
			longitude = 			subvetor[2];
			latidude = 				subvetor[3];
			motorista_id = 			subvetor[4];
			status_caminhao = 		subvetor[5];
			ultima_atualizacao = 	subvetor[6];
			ativo_caminhao = 		subvetor[7];
	
			$('#descricao_cadastro').val(descricao);
			// $('#endereco_cadastro').val(endereco_cliente);
			// $('#numero_cadastro').val(numero_cliente);
			// $('#bairro_cadastro').val(bairro_cliente);
			// $('#cidade_cadastro').val(cidade_cliente);
			// $('#uf_cadastro').val(uf_cliente);
			// $('#cep_cadastro').val(cep_cliente);
		});
	}
}




function adicionarCaminhaoCadastro(){
	var descricao = $("#descricao_cadastro").val();

	var logitude = "0";
	var latitude = "0";
	// var geometry = 0;

	if (descricao == "") {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
		$.ajax({
			url:'controllers/clienteController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'razao_social': titulo,
				'endereco_cliente': $("#endereco_cadastro").val(),
				'numero_cliente': num,
				'bairro_cliente': $('#bairro_cadastro').val(),
				'cidade_cliente': $("#cidade_cadastro").val(),
				'uf_cliente': $('#uf_cadastro').val(),
				'cep_cliente': cep,
				'latidude_cliente': latitude,
				'longitude_cliente': logitude,
				'bool_ativo': 1
			}
		}).done( function(data){
			// console.log(data);
			if (data == '1') {
				jk_toasth('success', "Cadastrado com sucesso!");
				$('#descricao_cadastro').val('');
				atualizaCliente();
			}else {
				jk_toasth('error', "Falha ao cadastrar!");
			}
		});
	}	
	return false;
}





function editarCaminhao(id){


	if (cep == "" || titulo == "" || num == "" || endereco == "" || cidade == "") {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
		$.ajax({
			type: 'GET',
			url: urlGoogleMaps+"?address="+endereco+","+num+","+cidade+","+cep+chaveGoogleMaps,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			if(data.status == "OK"){
				for (var i = 0; i < data.results.length; i++) {
					geometry = data.results[i].geometry;
					for(i in geometry){
						if ( geometry[i].lat != undefined && geometry[i].lng != undefined) {
							latitude = geometry[i].lat;
							logitude = geometry[i].lng;
						}
					}
				}
				$.ajax({
					url:'controllers/editar_clienteController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'id': id,
						'razao_social': titulo,
						'endereco_cliente': $("#endereco_cadastro").val(),
						'numero_cliente': num,
						'bairro_cliente': $('#bairro_cadastro').val(),
						'cidade_cliente': $("#cidade_cadastro").val(),
						'uf_cliente': $('#uf_cadastro').val(),
						'cep_cliente': cep,
						'latidude_cliente': latitude,
						'longitude_cliente': logitude,
						'bool_ativo': 1
					}
				}).done( function(data){
					console.log("editar: data = "+data);
					if (data == '1') {
						jk_toasth('success', "Alterado com sucesso!");
						atualizaCliente();
						chamarTelaCliente();
					}else {
						jk_toasth('error', "Falha ao atualizar!");
					}
				});
			} else {
				jk_toasth('error', "Verifique se os dados foram preenchidos corretamente!");
			}
		});
	}	
	return false;
}







function alteraAtivoCliente(id, bool_ativo){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar operação?",
		message: "Ao aperta o botão \"Sim\" você irá desativar o cliente, e não poderá mais edita-lo!",
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
					url:'controllers/funcoesController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'atualizar_ativo_cliente': true,
						'bool_ativo': bool_ativo,
						'id': id
					}
				}).done( function(data){
					if (data == 1) {
						jk_toasth('success', "Alterado com sucesso!");
						chamarTelaCliente();
						atualizaCliente();
					} else {
						jk_toasth('error', "Falha ao alterar cadastro do cliente!");
					}
				});
			}
		}
	});
}