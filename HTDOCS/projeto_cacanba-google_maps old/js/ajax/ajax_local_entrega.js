function chamarTelaLocalEntrega(id){
	// chamarTelaOperacao();

	var id_local_entrega = "";
	var endereco = "";
	var numero = "";
	var complemento = "";
	var bairro = "";
	var cidade = "";
	var uf = "";
	var cep = "";
	var cliente_id = "";
	var latitude = "";
	var longitude = "";
	var bool_ativo = "";

	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var principal = "";


	var desabilitar = "";
	var desabilitarAtivo = "";
	var desabilitarPrincipal = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroLocalEntrega = "";
	var ComplementoTela = "";
	var principalDesc = "";
	var valorAtivo = 0;

	$.ajax({
		url:'controllers/funcoes_localEntregaController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_local_entrega': true,
			'id_cliente': id
		}
	}).done( function(data){

		var vetor = data.split("[]");
		var subvetor = [];
		for (var i = 0; i < vetor.length; i++) {
			subvetor = vetor[i].split(",");

			id_local_entrega = 	subvetor[0];
			endereco = 			subvetor[1];
			numero = 			subvetor[2];
			complemento = 		subvetor[3];
			bairro = 			subvetor[4];
			cidade = 			subvetor[5];
			uf = 				subvetor[6];
			cep = 				subvetor[7];
			cliente_id = 		subvetor[8];
			latitude  = 		subvetor[9];
			longitude  = 		subvetor[10];
			bool_ativo  = 		subvetor[11];

			razao_social = 		subvetor[12];
			tipo = 				subvetor[13];
			inscricao_federal = subvetor[14];
			principal = 		subvetor[15];

			// Verificação de ativo
			if (bool_ativo == 1) { 
				desabilitar = "";
				icone_ativo = "<i class='fa fa-check' aria-hidden='true'></i>";
				cor_ativo = "#0f0;"
				valorAtivo = 0;
			} else {
				desabilitar = "disabled";
				cor_ativo = "#f00;";
				icone_ativo = "<i class='fa fa-times' aria-hidden='true'></i>";
				valorAtivo = 1;
			}

			// Verificação de endereço principal
			if (id_local_entrega == principal) {
				principalDesc = "<b>P</b>";
				desabilitarPrincipal = "disabled";
				desabilitarAtivo = "disabled";
			} else {
				principalDesc = "";
				desabilitarPrincipal = desabilitar;
				desabilitarAtivo = "";
			}

			ComplementoTela += "<tr>";

			ComplementoTela += "<td align='center'>"+principalDesc+"&nbsp;&nbsp;</td>";
			ComplementoTela += "<td>"+endereco+", "+numero+"</td>";
			ComplementoTela += "<td>"+bairro+"</td>";
			ComplementoTela += "<td>"+cidade+"</td>";
			ComplementoTela += "<td>"+uf+"</td>";
			ComplementoTela += "<td>"+cep+"</td>";

			ComplementoTela += "<td>";
			ComplementoTela += "<button class='btn' onclick='telaAdicionarLocalEntrega("+id_local_entrega+", "+id+");' style='color:#f0ad4e;' "+desabilitar+">";
			ComplementoTela += "<i class='fa fa-pencil' aria-hidden='true'></i>";
			ComplementoTela += "</button>";
			ComplementoTela += "</td>";

			ComplementoTela += "<td>";
			ComplementoTela += "<button class='btn' onclick='alteraAtivoLocalEntrega("+id_local_entrega+","+valorAtivo+","+id+");' style='color:"+cor_ativo+"' "+desabilitarAtivo+">";
			ComplementoTela += icone_ativo
			ComplementoTela += "</button>";
			ComplementoTela += "</td>";

			ComplementoTela += "<td align='center'>";
			ComplementoTela += "<button class='btn' onclick='alteraPrincipalLocalEntrega("+id_local_entrega+","+id+");' style='color:#000' "+desabilitarPrincipal+">";
			ComplementoTela += "<b>P</b>"
			ComplementoTela += "</button>";
			ComplementoTela += "</td>";

			ComplementoTela += "</tr>";
		}
		telaCadastroLocalEntrega += "<div class='col-md-12 text-center'>";
		telaCadastroLocalEntrega += "<h1>";
		telaCadastroLocalEntrega += "Locais de Entrega";
		// telaCadastroLocalEntrega += "<br>("+razao_social+" - "+inscricao_federal+")";
		telaCadastroLocalEntrega += "</h1>";
		telaCadastroLocalEntrega += "</div>";


		telaCadastroLocalEntrega += "<div class='col-md-12 text-center'>";
		telaCadastroLocalEntrega += "<div class='row'>";

		telaCadastroLocalEntrega += "<div class='col-md-4'>";
		telaCadastroLocalEntrega += "	<div class='input-group text-left'>"; //  style='margin-top: -50px; width: 20%; margin-left: 15px;'
		telaCadastroLocalEntrega += "		<div class='input-group-addon'>";
		telaCadastroLocalEntrega += "			<i class='fa fa-search' aria-hidden='true'></i>";
		telaCadastroLocalEntrega += "		</div>";
		telaCadastroLocalEntrega += "		<div id='comboBuscaLocalEntrega'></div>";
		telaCadastroLocalEntrega += "	</div>";
		telaCadastroLocalEntrega += "</div>";



		telaCadastroLocalEntrega += "<div class='col-md-6 col-md-offset-2 text-right'>"; //  style='margin-top: 0px;'
		telaCadastroLocalEntrega += "	<button class='btn btn-success' accessKey='a' onclick='telaAdicionarLocalEntrega(0, "+id+");'>";
		telaCadastroLocalEntrega += "	<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;Adicionar Local Cliente";
		telaCadastroLocalEntrega += "	</button>";
		// telaCadastroLocalEntrega += "	&nbsp;&nbsp;";
		// telaCadastroLocalEntrega += "	<button class='btn btn-primary' accessKey='v' onclick='chamarTelaCliente();'>";
		// telaCadastroLocalEntrega += "	<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Cliente";
		// telaCadastroLocalEntrega += "	</button>";
		telaCadastroLocalEntrega += "</div>";

		telaCadastroLocalEntrega += "</div>"
		telaCadastroLocalEntrega += "</div>";

		telaCadastroLocalEntrega += "<br>";

		telaCadastroLocalEntrega += "<div class='col-md-12'>";

		telaCadastroLocalEntrega += "<br>";

		telaCadastroLocalEntrega += "<div class='bloco'>";
		telaCadastroLocalEntrega += "<table class='table'>";
		telaCadastroLocalEntrega += "<tr>";
		telaCadastroLocalEntrega += "<td></td>";
		telaCadastroLocalEntrega += "<td>Endereço</td>";
		telaCadastroLocalEntrega += "<td>Bairro</td>";
		telaCadastroLocalEntrega += "<td>Cidade</td>";
		telaCadastroLocalEntrega += "<td>UF</td>";
		telaCadastroLocalEntrega += "<td>CEP</td>";
		telaCadastroLocalEntrega += "<td>Editar</td>";
		telaCadastroLocalEntrega += "<td>Ativo</td>";
		telaCadastroLocalEntrega += "<td>Definir Principal</td>";
		telaCadastroLocalEntrega += "</tr>";

		telaCadastroLocalEntrega += ComplementoTela;
		
		telaCadastroLocalEntrega += "</table>";
		telaCadastroLocalEntrega += "</div>";	

		telaCadastroLocalEntrega += "</div>";
		// $("#areaOperacao").html(telaCadastroLocalEntrega);
		$("#gradeLocalEntregaCliente").html(telaCadastroLocalEntrega);
		montarComboBuscaLocalEntrega(id);
	});
}



function telaAdicionarLocalEntrega(id, id_cliente){
	var id_local_entrega = "";
	var endereco = "";
	var numero = "";
	var complemento = "";
	var bairro = "";
	var cidade = "";
	var uf = "";
	var cep_cliente = "";
	var cliente_id = "";
	var latitude = "";
	var longitude = "";
	var bool_ativo = "";

	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var principal = "";



	chamarTelaOperacao();
	var telaAdicionaCliente = "";
	telaAdicionaCliente += "	<div class='col-md-11 text-left' style='margin-left:15px;margin-right:50px;'>";
	telaAdicionaCliente += "		<div class='text-left title'>";
	telaAdicionaCliente += "			<h2>";
	telaAdicionaCliente += "				Formulário de Cadastro de Local de Entrega";
	telaAdicionaCliente += "			</h2>";
	telaAdicionaCliente += "			<div class='text-left'>";
	telaAdicionaCliente += "				<a href='#' accessKey='v' onclick='telaAdicionarCliente("+id_cliente+");' class='btn' title='Voltar'>";
	telaAdicionaCliente += "					<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCliente += "				</a>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			";
	telaAdicionaCliente += "		</div>";
	telaAdicionaCliente += "</div>";
	
	telaAdicionaCliente += "		<div class='form-group bloco'>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<h2 style='margin-left: 15px'>Endereço</h2>";
	telaAdicionaCliente += "				<div class='col-md-4 col-md-offset-8' style='margin-top: -60px;'>";
	telaAdicionaCliente += "					<label>Busca por CEP:</label>";
	telaAdicionaCliente += "					<div class='input-group'>";
	telaAdicionaCliente += "						<input id='cep_cadastro_busca' value='"+cep_cliente+"' accessKey='i' type='text' rel=cep class='form-control' onkeyup='buscaPorCep2();' required>";
	telaAdicionaCliente += "						<div class='input-group-addon' id='carregarCep2'>";
	telaAdicionaCliente += "							<i class='fa fa-search' aria-hidden='true'></i>";
	telaAdicionaCliente += "						</div>";
	telaAdicionaCliente += "					</div>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			<br>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Endereço:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+endereco+"' id='endereco_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Numero:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='number' value='"+numero+"' id='numero_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Complemento:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='test' value='"+complemento+"' id='complemento_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			<br>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Bairro:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+bairro+"' id='bairro_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Cidade:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+cidade+"' id='cidade_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>UF:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+uf+"' id='uf_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			<br>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>CEP: <span style='color: red;'>*</span></label>";
	telaAdicionaCliente += "					<input type='text' value='"+cep_cliente+"' id='cep_cadastro' rel=cep class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";

	telaAdicionaCliente += "			<br><br>";
	telaAdicionaCliente += "			<div class='col-md-12 text-center'>";
	telaAdicionaCliente += "				<div class='form-item'>";
	telaAdicionaCliente += "					<a href='#' onclick='telaAdicionarCliente("+id_cliente+");' class='btn btn-info' title='Voltar'>";
	telaAdicionaCliente += "						<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCliente += "						&nbsp;Voltar para Cliente";
	telaAdicionaCliente += "					</a>";
	telaAdicionaCliente += "					&nbsp;";
	
	if (id != 0) {
		telaAdicionaCliente += "				<button onclick='editarLocalEntrega("+id+","+id_cliente+");' accessKey='s' class='btn btn-success'>";
		telaAdicionaCliente += "					<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCliente += "					&nbsp;Atualizar";
		telaAdicionaCliente += "				</button>";
	} else {
		telaAdicionaCliente += "				<button onclick='adicionarLocalEntrega("+id_cliente+");' accessKey='s' class='btn btn-success'>";
		telaAdicionaCliente += "					<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCliente += "					&nbsp;Gravar";
		telaAdicionaCliente += "				</button>";
	}
	telaAdicionaCliente += "					<br><br><br>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "		</div>";


	$("#areaOperacao").html(telaAdicionaCliente);
	$('#cep_cadastro_busca').focus();

	mask();
	if (id != 0) {
		$.ajax({
			url:'controllers/funcoes_localEntregaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_local_entrega_id': true,
				'id': id
			}
		}).done( function(data){

			var vetor = data.split(",");

			id_local_entrega = 	vetor[0];
			endereco = 			vetor[1];
			numero = 			vetor[2];
			complemento = 		vetor[3];
			bairro = 			vetor[4];
			cidade = 			vetor[5];
			uf = 				vetor[6];
			cep_cliente = 		vetor[7];
			cliente_id = 		vetor[8];
			latitude  = 		vetor[9];
			longitude  = 		vetor[10];
			bool_ativo  = 		vetor[11];

			razao_social = 		vetor[12];
			tipo = 				vetor[13];
			inscricao_federal = vetor[14];
			principal = 		vetor[15];
	
			$("#endereco_cadastro").val(endereco);
			$("#numero_cadastro").val(numero);
			$("#complemento_cadastro").val(complemento);
			$("#bairro_cadastro").val(bairro);
			$("#cidade_cadastro").val(cidade);
			$("#uf_cadastro").val(uf);
			$("#cep_cadastro").val(cep_cliente);
		});
	}
}


function adicionarLocalEntrega(id_cliente){
	var endereco = $("#endereco_cadastro").val();
	endereco = formatarEndereco(endereco);
	var num = $("#numero_cadastro").val();
	var complemento = $("#complemento_cadastro").val();
	var bairro = $('#bairro_cadastro').val();
	var cidade =  $("#cidade_cadastro").val();
	cidade = formatarCidade(cidade);
	var estado_uf = $('#uf_cadastro').val();
	var cep = $("#cep_cadastro").val();

	var logitude = 0;
	var latitude = 0;
	var geometry = 0;

	if (	
			num == "" 
		|| 	bairro == ""
		|| 	estado_uf == ""
		|| 	endereco == "" 
		|| 	cidade == ""
		|| 	cep == ""
	) {
		$.toast({
			text: "Por favor! Preencha todos os dados!", 
			heading: 'Erro ao adicinar marcador', 
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
					url:'controllers/localEntregaController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'cliente_id': id_cliente,
						'endereco': $("#endereco_cadastro").val(),
						'numero': num,
						'complemento': complemento,
						'bairro': bairro,
						'cidade': $("#cidade_cadastro").val(),
						'uf': estado_uf,
						'cep': cep,
						'latitude': latitude,
						'longitude': logitude
					}
				}).done( function(data){
					console.log(data);
					if (data != 0) {
						$.toast({
							text: "Cadastrado com sucesso!", 
							heading: 'Sucesso', 
							icon: 'success', 
							showHideTransition: 'slide', 
							allowToastClose: true, 
							hideAfter: 2500, 
							stack: 5, 
							position: toast_position,
							extAlign: toast_extAlign,
							loader: true,
							loaderBg: '#44f'
						});
						chamarTelaLocalEntrega(id_cliente);
					}else {
						$.toast({
							text: "Falha ao cadastrar!", 
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
					}
				});
			} else {
				$.toast({
					text: "Verifique se os dados foram preenchidos corretamente!", 
					heading: 'Erro ao adicinar marcador', 
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
			}
		});
	}	
	return false;
}





function editarLocalEntrega(id, id_cliente){
	var endereco = $("#endereco_cadastro").val();
	endereco = formatarEndereco(endereco);
	var num = $("#numero_cadastro").val();
	var complemento = $("#complemento_cadastro").val();
	var bairro = $('#bairro_cadastro').val();
	var cidade =  $("#cidade_cadastro").val();
	cidade = formatarCidade(cidade);
	var estado_uf = $('#uf_cadastro').val();
	var cep = $("#cep_cadastro").val();

	var logitude = 0;
	var latitude = 0;
	var geometry = 0;

	if (	
			cep == "" 
		|| 	num == "" 
		|| 	bairro == ""
		|| 	estado_uf == ""
		|| 	endereco == "" 
		|| 	cidade == ""
	) {
		$.toast({
			text: "Por favor! Preencha todos os dados!", 
			heading: 'Erro ao adicinar marcador', 
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
					url:'controllers/editar_localEntregaController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'id': id,
						'cliente_id': id_cliente,
						'endereco': $("#endereco_cadastro").val(),
						'numero': num,
						'complemento': complemento,
						'bairro': bairro,
						'cidade': $("#cidade_cadastro").val(),
						'uf': estado_uf,
						'cep': cep,
						'latitude': latitude,
						'longitude': logitude
					}
				}).done( function(data){
					console.log("editar: data = "+data);
					if (data == '1') {
						$.toast({
							text: "Alterado com sucesso!", 
							heading: 'Sucesso', 
							icon: 'success', 
							showHideTransition: 'slide', 
							allowToastClose: true, 
							hideAfter: 2500, 
							stack: 5, 
							position: toast_position,
							extAlign: toast_extAlign,
							loader: true,
							loaderBg: '#44f'
						});
						chamarTelaLocalEntrega(id_cliente);
					}else {
						$.toast({
							text: "Falha ao atualizar!", 
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
					}
				});
			} else {
				$.toast({
					text: "Verifique se os dados foram preenchidos corretamente!", 
					heading: 'Erro ao adicinar marcador', 
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
			}
		});
	}	
	return false;
}



function alteraAtivoLocalEntrega(id, bool_ativo, id_cliente){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar operação?",
		message: "Ao aperta o botão \"Sim\" você irá alterar o status desse local de entrega!",
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
					url:'controllers/funcoes_localEntregaController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'atualizar_ativo_local_entrega': true,
						'bool_ativo': bool_ativo,
						'id': id
					}
				}).done( function(data){
					if (data == 1) {
						$.toast({
							text: "Alterado com sucesso!", 
							heading: 'Sucesso', 
							icon: 'success', 
							showHideTransition: 'slide', 
							allowToastClose: true, 
							hideAfter: 2500, 
							stack: 5, 
							position: toast_position,
							extAlign: toast_extAlign,
							loader: true,
							loaderBg: '#44f'
						});
						chamarTelaLocalEntrega(id_cliente);
					} else {
						$.toast({
							text: "Falha ao alterar cadastro do cliente!", 
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
					}
				});
			}
		}
	});
}



function alteraPrincipalLocalEntrega(id, id_cliente){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar operação?",
		message: "Ao aperta o botão \"Sim\" você irá definir este endereço como principal do cliente!",
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
					url:'controllers/funcoes_localEntregaController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'atualizar_principal_local_entrega': true,
						'id_local_entrega': id,
						'id': id_cliente
					}
				}).done( function(data){
					if (data == 1) {
						$.toast({
							text: "Alterado com sucesso!", 
							heading: 'Sucesso', 
							icon: 'success', 
							showHideTransition: 'slide', 
							allowToastClose: true, 
							hideAfter: 2500, 
							stack: 5, 
							position: toast_position,
							extAlign: toast_extAlign,
							loader: true,
							loaderBg: '#44f'
						});
						chamarTelaLocalEntrega(id_cliente);
					} else {
						$.toast({
							text: "Falha ao alterar cadastro do cliente!", 
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
					}
				});
			}
		}
	});
}

function montarComboBuscaLocalEntrega(id_cliente){
	$.ajax({
		url:'controllers/funcoes_localEntregaController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_local_entrega': true,
			'id_cliente': id_cliente
		}
	}).done( function(data){
		var id_local_entrega = "";
		var endereco = "";
		var numero = "";
		var complemento = "";
		var bairro = "";
		var cidade = "";
		var uf = "";
		var cep_cliente = "";
		var cliente_id = "";
		var latitude = "";
		var longitude = "";
		var bool_ativo = "";

		var razao_social = "";
		var tipo = "";
		var inscricao_federal = "";
		var principal = "";

		var montarInputListCidade = "";
		var arrayJson = "";
		var cont = 0;

		if (data == "") {
			montarInputListCidade += "<input type='text' class='form-control' placeholder='Sem registros (Local de Entrega)' disabled>";
		} else {
			montarInputListCidade += "<input type='text' id='localEntregaCInputList'";
			montarInputListCidade += "class='flexdatalist form-control' placeholder='Local de Entrega'";
			montarInputListCidade += "data-min-length='0' data-visible-properties='[\"endereco\"]' ";
			montarInputListCidade += "data-selection-required='true' data-value-property='id_local_entrega' ";
			montarInputListCidade += "onchange='telaAdicionarLocalEntrega(this.value,"+id_cliente+");' ";
			montarInputListCidade += "required>";

			var vetor = data.split("[]");
			var subvetor = [];
			
			arrayJson += "[";
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_local_entrega = 	subvetor[0];
				endereco = 			subvetor[1];
				numero = 			subvetor[2];
				complemento = 		subvetor[3];
				bairro = 			subvetor[4];
				cidade = 			subvetor[5];
				uf = 				subvetor[6];
				cep_cliente = 		subvetor[7];
				cliente_id = 		subvetor[8];
				latitude  = 		subvetor[9];
				longitude  = 		subvetor[10];
				bool_ativo  = 		subvetor[11];

				razao_social = 		subvetor[12];
				tipo = 				subvetor[13];
				inscricao_federal = subvetor[14];
				principal = 		subvetor[15];

				if (bool_ativo == 1) {
					if (cont  == 0) {
						arrayJson += "{\"id_local_entrega\": "+id_local_entrega+", \"endereco\": \""+endereco+","+numero+"\"}";
					} else {
						arrayJson += ",{\"id_local_entrega\": "+id_local_entrega+", \"endereco\": \""+endereco+","+numero+"\"}";
					}
					cont++;
				}
			}
			arrayJson += "]";
		}
		$("#comboBuscaLocalEntrega").html(montarInputListCidade);
		arrayJson = JSON.parse(arrayJson);
		setarValorLocalEntregaInputList(arrayJson);
	});
}

function setarValorLocalEntregaInputList(eljson){
	$('#localEntregaCInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'id_local_entrega',
		searchIn: 'endereco',
		minLength: 0,
		data: eljson
	});
	document.getElementById("localEntregaCInputList-flexdatalist").accessKey = "b";
}