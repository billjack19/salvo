function chamarTelaLocalEntrega(id){
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
				cor_ativo = "#0f0;";
				icone_ativo = jk_icon("check");
				valorAtivo = 0;
			} else {
				desabilitar = "disabled";
				cor_ativo = "#f00;";
				icone_ativo = jk_icon("times");
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

			ComplementoTela += jk_tr("", "",
				  jk_td("center", principalDesc+"&nbsp;&nbsp;")
				+ jk_td("left", endereco+", "+numero)
				+ jk_td("left", bairro)
				+ jk_td("left", cidade)
				+ jk_td("left", uf)
				+ jk_td("left", cep)
				+ jk_td("left", 
					jk_buttonComplemento("", "", "", "", "telaAdicionarLocalEntrega("+id_local_entrega+", "+id+");", 
						jk_icon("pencil"), "style='color:#f0ad4e;' "+desabilitar)
				)
				+ jk_td("center", 
					jk_buttonComplemento("", "", "", "", "alteraAtivoLocalEntrega("+id_local_entrega+","+valorAtivo+","+id+", 0);", 
						icone_ativo, "style='color:"+cor_ativo+"' "+desabilitarAtivo)
				)
				+ jk_td("center", 
					jk_buttonComplemento("", "", "", "", "alteraPrincipalLocalEntrega("+id_local_entrega+","+id+", 0);", 
						"<b>P</b>", "style='color:#000' "+desabilitarPrincipal)
				)
			);
		}

		telaCadastroLocalEntrega += jk_cabecarioListagem("Locais de Entrega", "comboBuscaLocalEntrega", 
			jk_button("", "success", "", "a", "telaAdicionarLocalEntrega(0, "+id+");", jk_icon("plus")+"&nbsp;Adicionar Local de Entrega")
		);
		// telaCadastroLocalEntrega += "	<button class='btn btn-primary' accessKey='v' onclick='chamarTelaCliente();'>";
		// telaCadastroLocalEntrega += "	<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Cliente";
		// telaCadastroLocalEntrega += "	</button>";

		telaCadastroLocalEntrega += "<br>";

		telaCadastroLocalEntrega += "<div class='col-md-12'>";

		telaCadastroLocalEntrega += "<br>";

		telaCadastroLocalEntrega += "<div class='bloco'>";

		telaCadastroLocalEntrega += jk_table("table", "0",
			jk_tr("","",
				  jk_td("left", "")
				+ jk_td("left", "Endereço")
				+ jk_td("left", "Bairro")
				+ jk_td("left", "Cidade")
				+ jk_td("left", "UF")
				+ jk_td("left", "CEP")
				+ jk_td("left", "Editar")
				+ jk_td("center", "Ativo")
				+ jk_td("center", "Definir Principal")
			) + ComplementoTela
		);
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
	if (id == 0) {
		telaAdicionaCliente += jk_cabecarioFormulario("Cadastrar Local de Entrega", "v", "telaAdicionarCliente("+id_cliente+");");
	} else {
		telaAdicionaCliente += jk_cabecarioFormulario("Editar Local de Entrega", "v", "telaAdicionarCliente("+id_cliente+");");
	}

	telaAdicionaCliente += "<div class='form-group bloco'>";

	telaAdicionaCliente += jk_romTituladaDiv(
		"Endereco",
		  "	<div class='col-md-4 col-md-offset-8' style='margin-top: -60px;'>"
		+ "		<label>Busca por CEP:</label>"
		+ "		<div class='input-group'>"
		+ "			<input id='cep_cadastro_busca' value='"+cep_cliente+"' accessKey='i' type='text' rel=cep class='form-control' onkeyup='buscaPorCep2();' required>"
		+ "			<div class='input-group-addon' id='carregarCep2'>"
		+ "				<i class='fa fa-search' aria-hidden='true'></i>"
		+ "			</div>"
		+ "		</div>"
		+ "	</div>"
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
		  jk_campoFormulario("4", "Endereço", 		1, "", "endereco_cadastro")
		+ jk_campoNumFormulario("4", "Número", 		1, "", "numero_cadastro")
		+ jk_campoFormulario("4", "Complemento", 	0, "", "complemento_cadastro")
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
		  jk_campoFormulario("4", "Bairro", 	1, "", "bairro_cadastro")
		+ jk_campoFormulario("4", "Cidade", 	1, "", "cidade_cadastro")
		+ jk_campoFormulario("4", "UF", 		1, "", "uf_cadastro")
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
		jk_campoFormulario("4", "CEP", 	1, "", "cep_cadastro")
	);
	telaAdicionaCliente += "	<br><br>";
	telaAdicionaCliente += "	<div class='col-md-12 text-center'>";
	telaAdicionaCliente += "		<div class='form-item'>";

	telaAdicionaCliente += jk_button("", "info", "", "", "telaAdicionarCliente("+id_cliente+");", jk_icon("arrow-left")+"&nbsp;Voltar para Cliente");

	telaAdicionaCliente += "			&nbsp;";

	if (id != 0) {
		telaAdicionaCliente += jk_button("", "success", "", "s", "operacaoLocalEntrega("+id+", "+id_cliente+");", jk_icon("floppy-o")+"&nbsp;Atualizar");
	} else {
		telaAdicionaCliente += jk_button("", "success", "", "s", "operacaoLocalEntrega(0, "+id_cliente+");", jk_icon("floppy-o")+"&nbsp;Gravar");
	}

	telaAdicionaCliente += "			<br><br><br>";
	telaAdicionaCliente += "		</div>";
	telaAdicionaCliente += "	</div>";

	telaAdicionaCliente += "</div>";

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


function operacaoLocalEntrega(id, id_cliente){
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
				var dadosArray = [
					"cliente_id:"+id_cliente+":n",
					"endereco:"+$("#endereco_cadastro").val()+":s",
					"numero:"+num+":s",
					"complemento:"+complemento+":s",
					"bairro:"+bairro+":s",
					"cidade:"+$("#cidade_cadastro").val()+":s",
					"uf:"+estado_uf+":s",
					"cep:"+cep+":s",
					"latitude:"+latitude+":n",
					"longitude:"+logitude+":n"
				];
				var arquivoPHP = "localEntregaController";
				var descricaoCalback = "Cadastrado";
				if (id != 0) {
					dadosArray.push("id:"+id+":n");
					arquivoPHP = "editar_localEntregaController";
					descricaoCalback = "Atualizado";
				}
				dadosArray = converterArrayParaJson(dadosArray);
				executarOperacao(dadosArray, arquivoPHP, descricaoCalback);
			} else {
				jk_toasth('error', "Verifique se os dados foram preenchidos corretamente!");
			}
		});
	}	
	return false;
}

function executarOperacao(dados, arquivo, descricaoCalback){
	$.ajax({
		url:'controllers/'+arquivo+'.php',
		type: 'POST',
		dataType: 'html',
		data: dados
	}).done( function(data){
		console.log(data);
		if (data != 0) {
			jk_toasth('success', descricaoCalback+" com sucesso!");
			chamarTelaLocalEntrega(id_cliente);
		}else {
			jk_toasth('error', descricaoCalback+" falhou!");// ao cadastrar!
		}
	});
}

function alteraAtivoLocalEntrega(id, bool_ativo, id_cliente, condAtivar){
	if (condAtivar == 0) {
		jk_confirma(
			"Tem certeza que deseja confirmar operação?", 
			"Ao aperta o botão \"Sim\" você irá alterar o status desse local de entrega!", 
			"alteraAtivoLocalEntrega", [id, bool_ativo, id_cliente, 1]
		);
	} else {
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
				jk_toasth('success', "Alterado com sucesso!");
				chamarTelaLocalEntrega(id_cliente);
			} else {
				jk_toasth('success', "Falha ao alterar cadastro do local de entrega!");
			}
		});
	}
}


function alteraPrincipalLocalEntrega(id, id_cliente, condAtivar){
	if (condAtivar == 0) {
		jk_confirma(
			"Tem certeza que deseja confirmar operação?", 
			"Ao aperta o botão \"Sim\" você irá definir este endereço como principal do cliente!", 
			"alteraPrincipalLocalEntrega", [id, id_cliente, 1]
		);
	} else {
		$.ajax({
			url:'controllers/funcoes_localEntregaController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'atualizar_principal_local_entrega': true,
				'id_local_entrega': parseInt(id),
				'id': parseInt(id_cliente)
			}
		}).done( function(data){
			console.log(data);
			if (data == 1) {
				jk_toasth('success', "Alterado com sucesso!");
				chamarTelaLocalEntrega(id_cliente);
			} else {
				jk_toasth('error', "Falha ao alterar cadastro do cliente!");
			}
		});
	}
}

function montarComboBuscaLocalEntrega(id_cliente){
	jk_comboDataList(
		"Local de Entrega", "funcoes_localEntregaController", 
		{
			'pequisa_local_entrega': true,
			'id_cliente': id_cliente
		}, "localEntregaCInputList", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12" ],
		0, [1,2], "b", "comboBuscaLocalEntrega", "telaAdicionarLocalEntrega(this.value,"+id_cliente+");", 11
	);
}