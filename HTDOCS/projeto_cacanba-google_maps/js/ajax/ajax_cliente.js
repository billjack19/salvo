function chamarTelaCliente(){
	chamarTelaOperacao();

	var id_cliente = "";
	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var bool_ativo = "";
	var telefone = "";
	var email = "";
	var endereco = "";
	var cnpj_user = "";


	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCliente = "";
	var valorAtivo = 0;
	var tabela_cliente = "";

	$.ajax({
		url:'controllers/funcoes_clienteController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_cliente': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){
		telaCadastroCliente += jk_cabecarioListagem("Cliente", "comboBuscaCliente", 
			  jk_button("", "success", "", "a", "telaAdicionarCliente(0);", jk_icon("plus")+"&nbsp;Adicionar Cliente")
			+ "&nbsp;&nbsp;"
			+ jk_button("", "primary", "", "v", "chamarTelePrincipal();", jk_icon("arrow-left")+"&nbsp;Voltar ao Mapa")
		);

		telaCadastroCliente += "<br>";

		telaCadastroCliente += "<div class='col-md-12'>";

		if (data == "") {
			telaCadastroCliente += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliente += "<br>";

			telaCadastroCliente += "<div class='bloco2'>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_cliente = 		subvetor[0];
				razao_social = 		subvetor[1];
				tipo = 				subvetor[2];
				inscricao_federal = subvetor[3];
				bool_ativo = 		subvetor[4];
				telefone = 			subvetor[5];
				email = 			subvetor[6];
				endereco = 			subvetor[7];
				cnpj_user = 		subvetor[8];

				if (bool_ativo == 1) { 
					desabilitar = "";
					icone_ativo = jk_icon("check");
					cor_ativo = "#0f0;"
					valorAtivo = 0;
				} else {
					desabilitar = "disabled";
					cor_ativo = "#f00;";
					icone_ativo = jk_icon("times")
					valorAtivo = 1;
				}

				tabela_cliente += jk_tr("","",
					  jk_td("left", razao_social)
					+ jk_td("left", inscricao_federal)
					+ jk_td("left", telefone)
					+ jk_td("left", email)
					// jk_td("left", "<td>Bairro</td>";
					// jk_td("left", "<td>Cidade</td>";
					// jk_td("left", "<td>UF</td>";
					+ jk_td("left",  
						jk_buttonComplemento("", "", "", "", "telaAdicionarCliente("+id_cliente+");", 
							jk_icon("pencil"), "style='color:#f0ad4e;' "+desabilitar)
					)
					/* + jk_td("left",  
						jk_buttonComplemento("", "", "", "", "chamarTelaLocalEntrega("+id_cliente+");", 
							jk_icon("plus"), style='color:green;' "+desabilitar)
					)*/
					+ jk_td("center",  
						jk_buttonComplemento("", "", "", "", "alteraAtivoCliente("+id_cliente+", "+valorAtivo+");", 
							icone_ativo, "style='color:"+cor_ativo+"'")
					)
				);
			}
			telaCadastroCliente += jk_table("table", "0",
				jk_tr("","",
					  jk_td("left", "Razão Social")
					+ jk_td("left", "CPF/cnpj")
					+ jk_td("left", "Telefone")
					+ jk_td("left", "E-mail")
					// jk_td("left", "<td>Bairro</td>";
					// jk_td("left", "<td>Cidade</td>";
					// jk_td("left", "<td>UF</td>";
					+ jk_td("left", "Editar")
					// + jk_td("left", "Interagir")
					+ jk_td("center", "Ativo")
				) + tabela_cliente
			);
			telaCadastroCliente += "</div>";	
		}
		telaCadastroCliente += "</div>";
		$("#areaOperacao").html(telaCadastroCliente);
		montarComboBuscaCliente();
	});
}

function telaAdicionarCliente(id){
	var id_cliente = "";
	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var bool_ativo = "";
	var telefone = "";
	var email = "";
	var endereco = "";
	var cnpj_user = "";

	var cep_cliente = "";
	var endereco_cliente = "";
	var numero_cliente = "";
	var complemento_cliente = "";
	var bairro_cliente = "";
	var cidade_cliente = "";
	var uf_cliente = "";


	chamarTelaOperacao();
	var telaAdicionaCliente = "";
	if (id == 0) {
		telaAdicionaCliente += jk_cabecarioFormulario("Cadastrar Cliente", "v", "chamarTelaCliente();");
	} else {
		telaAdicionaCliente += jk_cabecarioFormulario("Editar Cliente", "v", "chamarTelaCliente();");
	}

	telaAdicionaCliente += "<div class='form-group bloco'>";

	telaAdicionaCliente += jk_romDiv(
		  jk_campoInicialFormulario("4", "Razão Social", 	1, "", "razao_social_cadastro")
		+ "	<div class='col-md-4'>"
		+ "		<label class='label-float'>Tipo Pessoa:</label> <span style='color: red;'>*</span>"
		+ "		<select id='tipocadastro' class='form-control' onchange='definirInputPessoa(\"\")' required>"
		+ "			<option value='f' selected>Pessoa Física</option>"
		+ "			<option value='j'>Pessoa Jurídica</option>"
		+ "		</select>"
		+ "	</div>"
		+ jk_campoMaskFormulario("4\' id=\'divPessoaFisica", 	"Pessoa Físicas", 	0, "",	"pessoa_fisica_cadastro", 	"cpf")
		+ jk_campoMaskFormulario("4\' id=\'divPessoaJuridica", 	"Pessoa Jurídica", 	0, "",	"pessoa_juridica_cadastro", "cnpj")
	);

	if (id == 0) {
		telaAdicionaCliente += "<br>";
		telaAdicionaCliente += jk_romTituladaDiv(
			"Endereço teste",
			  "	<div class='col-md-4 col-md-offset-8' style='margin-top: -60px;'>"
			+ "		<label>Busca por CEP:</label>"
			+ "		<div class='input-group'>"
			+ "			<input id='cep_cadastro_busca' type='text' rel=cep class='form-control' onkeyup='buscaPorCep2();'>"
			+ "			<div class='input-group-addon' id='carregarCep2'>"
			+ "				<i class='fa fa-search' aria-hidden='true'></i>"
			+ "			</div>"
			+ "		</div>"
			+ "	</div>"
		);
		telaAdicionaCliente += "<br>";
		telaAdicionaCliente += jk_romDiv(
			  jk_campoFormulario("4", "Endereço", 		1, "",	"endereco_cadastro")
			+ jk_campoNumFormulario("4", "Número", 		1, "",	"numero_cadastro")
			+ jk_campoFormulario("4", "Complemento", 	0, "",	"complemento_cadastro")
		);
		telaAdicionaCliente += "<br>";
		telaAdicionaCliente += jk_romDiv(
			  jk_campoFormulario("4", "Bairro", 1, "",	"bairro_cadastro")
			+ jk_campoFormulario("4", "Cidade", 1, "",	"cidade_cadastro")
			+ jk_campoFormulario("4", "UF",		1, "",	"uf_cadastro")
		);
		telaAdicionaCliente += "<br>";
		telaAdicionaCliente += jk_romDiv(
			  jk_campoFormulario("4", "CEP", 1, "",	"cep_cadastro")
		);
	}

	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romTituladaDiv(
		"Contato",
		  jk_campoFormulario("4", "Telefone", 	0, "",	"telefone_cadastro")
		+ jk_campoFormulario("4", "E-mail", 	0, "",	"email_cadastro")
	);

	telaAdicionaCliente += "<br><br>";
	telaAdicionaCliente += "	<div class='col-md-12 text-center'>";
	telaAdicionaCliente += "		<div class='form-item'>";
	telaAdicionaCliente += jk_button("", "info", "", "", "chamarTelaCliente();", jk_icon("arrow-left")+"&nbsp;Voltar para Cliente");
	telaAdicionaCliente += "&nbsp;";
	if (id != 0) {
		telaAdicionaCliente += jk_button("", "success", "", "s", "editarCliente("+id+");", jk_icon("floppy-o")+"&nbsp;Atualizar");
		// telaAdicionaCliente += "		&nbsp;";
		// telaAdicionaCliente += jk_button("", "warning", "", "a", "chamarTelaLocalEntrega("+id+");", jk_icon("plus")+"&nbsp;Local de Entrega");
		telaAdicionaCliente += "		<div id='gradeLocalEntregaCliente'></div>";
	} else {
		telaAdicionaCliente += jk_button("", "success", "", "s", "adicionarCliente();", jk_icon("floppy-o")+"&nbsp;Gravar");
		telaAdicionaCliente += "<br><br>";
	}
	telaAdicionaCliente += "		</div>";
	telaAdicionaCliente += "	</div>";

	telaAdicionaCliente += "</div>";

	$("#areaOperacao").html(telaAdicionaCliente);
	$('#razao_social_cadastro').focus();

	mask();
	definirInputPessoa("");
	if (id != 0) {
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
			tipo = 				vetor[2];
			inscricao_federal = vetor[3];
			bool_ativo = 		vetor[4];
			telefone = 			vetor[5];
			email = 			vetor[6];
			endereco = 			vetor[7];
			cnpj_user = 		vetor[8];
	
			$("#razao_social_cadastro").val(razao_social);
			$("#tipocadastro").val(tipo);
			definirInputPessoa(inscricao_federal);
			$("#telefone_cadastro").val(telefone);
			$("#email_cadastro").val(email);

			chamarTelaLocalEntrega(id_cliente);
		});
	}
}


function definirInputPessoa(valor){
	$("#pessoa_fisica_cadastro").val(valor);
	$("#pessoa_juridica_cadastro").val(valor);

	var selecionado = $("#tipocadastro").val();
	if (selecionado == "f") {
		document.getElementById("divPessoaFisica").className = "col-md-4";
		document.getElementById("divPessoaJuridica").className = "hidden";
	} else {
		document.getElementById("divPessoaFisica").className = "hidden";
		document.getElementById("divPessoaJuridica").className = "col-md-4";
	}
}


function buscaPorCep2(){
	var cep = $("#cep_cadastro_busca").val();
	cep = cep.replace("_", "");

	var numCep = cep.length;
	var iconeCarrega = "<i class='fa fa-spinner fa-pulse fa-fw'></i>";
	var iconeVoltar = $("#carregarCep2").html();

	if (numCep == 9) {
		document.getElementById("cep_cadastro_busca").disabled = true;
		$("#carregarCep2").html(iconeCarrega);
		var url = "https://viacep.com.br/ws/"+cep+"/json/";

		$.ajax({
			type: 'GET',
			cache: false,
			url: url,
			dataType: "json",
			contentType: "application/json; charset=utf-8"
		}).done( function(data){
			if (data.erro) {
				jk_toasth('error', "Erro ao tentar encontrar o CEP!");
				$("#carregarCep2").html(iconeVoltar);

				$("#endereco_cadastro").val("");
				$("#bairro_cadastro").val("");
				$("#cidade_cadastro").val("");
				$("#uf_cadastro").val("");
				$('#cep_cadastro').val("");
				$('#cep_cadastro_busca').val("");

				document.getElementById("cep_cadastro_busca").disabled = false;
				document.getElementById("cep_cadastro").disabled = false;
				document.getElementById("endereco_cadastro").disabled = false;
				document.getElementById("bairro_cadastro").disabled = false;
				document.getElementById("cidade_cadastro").disabled = false;
				document.getElementById("uf_cadastro").disabled = false;
				$('#cep_cadastro_busca').focus();
			} else {
				var logradouro = data.logradouro;
				var bairro = data.bairro;
				var localidade = data.localidade;
				var uf = data.uf;

				$("#endereco_cadastro").val(logradouro);
				$("#bairro_cadastro").val(bairro);
				$("#cidade_cadastro").val(localidade);
				$("#uf_cadastro").val(uf);
				$("#carregarCep2").html(iconeVoltar);
				$("#cep_cadastro").val($("#cep_cadastro_busca").val());
				$('#numero_cadastro').focus();
				document.getElementById("cep_cadastro_busca").disabled = false;
				document.getElementById("cep_cadastro").disabled = true;
				document.getElementById("endereco_cadastro").disabled = true;
				document.getElementById("bairro_cadastro").disabled = true;
				document.getElementById("cidade_cadastro").disabled = true;
				document.getElementById("uf_cadastro").disabled = true;
			}
		});
	} else {
		$("#endereco_cadastro").val("");
		$("#bairro_cadastro").val("");
		$("#cidade_cadastro").val("");
		$("#uf_cadastro").val("");
		$('#cep_cadastro').val("");

		document.getElementById("cep_cadastro").disabled = false;
		document.getElementById("endereco_cadastro").disabled = false;
		document.getElementById("bairro_cadastro").disabled = false;
		document.getElementById("cidade_cadastro").disabled = false;
		document.getElementById("uf_cadastro").disabled = false;
	}
}


function adicionarCliente(){
	var titulo = $("#razao_social_cadastro").val();
	var tipocadastro = $("#tipocadastro").val();
	var inscricao_federal = "";
	if (tipocadastro == "f") {
		inscricao_federal = $("#pessoa_fisica_cadastro").val();
	} else {
		inscricao_federal = $("#pessoa_juridica_cadastro").val();
	}

	// enderco
	var endereco = $("#endereco_cadastro").val();
	endereco = formatarEndereco(endereco);
	var num = $("#numero_cadastro").val();
	var complemento = $("#complemento_cadastro").val();
	var bairro = $('#bairro_cadastro').val();
	var cidade =  $("#cidade_cadastro").val();
	cidade = formatarCidade(cidade);
	var estado_uf = $('#uf_cadastro').val();
	var cep = $("#cep_cadastro").val();

	// contato
	var telefone = $("#telefone_cadastro").val();
	var email = $("#email_cadastro").val();


	var logitude = 0;
	var latitude = 0;
	var geometry = 0;

	if (	
			cep == "" 
		|| 	titulo == "" 
		|| 	inscricao_federal == "" 
		|| 	num == "" 
		|| 	bairro == ""
		|| 	estado_uf == ""
		|| 	endereco == "" 
		|| 	cidade == ""
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
				$.ajax({
					url:'controllers/clienteController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'razao_social': titulo,
						'tipo': tipocadastro,
						'inscricao_federal': inscricao_federal,
						'telefone': telefone,
						'email': email,
						'cnpj_user': $("#identificador").data("cnpj"),
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
					// console.log(data);
					if (data != 0) {
						jk_toasth('success', "Cadastrado com sucesso!");
						chamarTelaCliente();
						atualizaCliente();
					}else {
						jk_toasth('error', "Falha ao cadastrar!");
					}
				});
			} else {
				jk_toasth('error', "Verifique se os dados foram preenchidos corretamente!");
			}
		});
	}	
	return false;
}


function editarCliente(id){
	var titulo = $("#razao_social_cadastro").val();
	var tipocadastro = $("#tipocadastro").val();
	var inscricao_federal = "";
	if (tipocadastro == "f") {
		inscricao_federal = $("#pessoa_fisica_cadastro").val();
	} else {
		inscricao_federal = $("#pessoa_juridica_cadastro").val();
	}

	// contato
	var telefone = $("#telefone_cadastro").val();
	var email = $("#email_cadastro").val();

	var logitude = 0;
	var latitude = 0;
	var geometry = 0;

	if (	
			titulo == "" 
		|| 	inscricao_federal == "" 
	) {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
		$.ajax({
			url:'controllers/editar_clienteController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'id': id,
				'razao_social': titulo,
				'tipo': tipocadastro,
				'inscricao_federal': inscricao_federal,
				'telefone': telefone,
				'email': email
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
	}
}


function alteraAtivoCliente(id, bool_ativo){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar operação?",
		message: "Ao aperta o botão \"Sim\" você irá alterar o status desse cliente!",
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
					url:'controllers/funcoes_clienteController.php',
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


function montarComboBuscaCliente(){
	jk_comboDataList(
		"Cliente", "funcoes_clienteController", 
		{
			'pequisa_cliente': true,
			'cnpj': $("#identificador").data("cnpj")
		}, "funcoes_clienteController", 
		[ "1","2","3","4","5" ],
		0, [1], "b", "comboBuscaCliente", "telaAdicionarCliente(this.value);", 4
	);
}