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

	$.ajax({
		url:'controllers/funcoes_clienteController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_cliente': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){
		telaCadastroCliente += "<div class='col-md-12 text-center'>";
		telaCadastroCliente += "<h1>Cliente</h1>";
		telaCadastroCliente += "</div>";

		telaCadastroCliente += "<div class='col-md-12 text-center'>";
		telaCadastroCliente += "<div class='row'>";

		telaCadastroCliente += "<div class='col-md-4'>";
		telaCadastroCliente += "	<div class='input-group text-left'>";
		telaCadastroCliente += "		<div class='input-group-addon'>";
		telaCadastroCliente += "			<i class='fa fa-search' aria-hidden='true'></i>";
		telaCadastroCliente += "		</div>";
		telaCadastroCliente += "		<div id='comboBuscaCliente'></div>";
		telaCadastroCliente += "	</div>";
		telaCadastroCliente += "</div>";


		telaCadastroCliente += "<div class='col-md-6 col-md-offset-2 text-right'>"; //  style='margin-top: 0px;'
		telaCadastroCliente += "	<button class='btn btn-success' accessKey='a' onclick='telaAdicionarCliente(0);'>";
		telaCadastroCliente += "	<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;Adicionar Cliente";
		telaCadastroCliente += "	</button>";
		telaCadastroCliente += "	&nbsp;&nbsp;";
		telaCadastroCliente += "	<button class='btn btn-primary' accessKey='v' onclick='chamarTelePrincipal();'>";
		telaCadastroCliente += "	<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Mapa";
		telaCadastroCliente += "	</button>";
		telaCadastroCliente += "</div>";

		telaCadastroCliente += "</div>"
		telaCadastroCliente += "</div>";

		/*telaCadastroCliente += "<div class='col-md-12 text-right'  style='margin-top: 0px;'>";
		telaCadastroCliente += "<button class='btn btn-success' accessKey='a' onclick='telaAdicionarCliente(0);'>";
		telaCadastroCliente += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;Adicionar Cliente";
		telaCadastroCliente += "</button>";
		telaCadastroCliente += "&nbsp;&nbsp;";
		telaCadastroCliente += "<button class='btn btn-primary' accessKey='v' onclick='chamarTelePrincipal();'>";
		telaCadastroCliente += "<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Mapa";
		telaCadastroCliente += "</button>";
		telaCadastroCliente += "</div>";

		telaCadastroCliente += "<div class='input-group text-left' style='margin-top: -50px; width: 20%; margin-left: 15px;'>";
		telaCadastroCliente += "	<div class='input-group-addon'>";
		telaCadastroCliente += "		<i class='fa fa-search' aria-hidden='true'></i>";
		telaCadastroCliente += "	</div>";
		telaCadastroCliente += "	<div id='comboBuscaCliente'></div>";
		telaCadastroCliente += "</div>";*/

		telaCadastroCliente += "<br>";

		telaCadastroCliente += "<div class='col-md-12'>";
		

		if (data == "") {
			telaCadastroCliente += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliente += "<br>";

			telaCadastroCliente += "<div class='bloco2'>";
			telaCadastroCliente += "<table class='table'>";
			telaCadastroCliente += "<tr>";
			telaCadastroCliente += "<td>Razão Social</td>";
			telaCadastroCliente += "<td>CPF/CNPJ</td>";
			telaCadastroCliente += "<td>Telefone</td>";
			telaCadastroCliente += "<td>Email</td>";
			// telaCadastroCliente += "<td>Bairro</td>";
			// telaCadastroCliente += "<td>Cidade</td>";
			// telaCadastroCliente += "<td>UF</td>";
			telaCadastroCliente += "<td>Editar</td>";
			// telaCadastroCliente += "<td>Interagir</td>";
			telaCadastroCliente += "<td>Ativo</td>";

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
					icone_ativo = "<i class='fa fa-check' aria-hidden='true'></i>";
					cor_ativo = "#0f0;"
					valorAtivo = 0;
				} else {
					desabilitar = "disabled";
					cor_ativo = "#f00;";
					icone_ativo = "<i class='fa fa-times' aria-hidden='true'></i>";
					valorAtivo = 1;
				}

				telaCadastroCliente += "<tr>";
				telaCadastroCliente += "<td>"+razao_social+"</td>";
				telaCadastroCliente += "<td>"+inscricao_federal+"</td>";
				telaCadastroCliente += "<td>"+telefone+"</td>";
				telaCadastroCliente += "<td>"+email+"</td>";
				// telaCadastroCliente += "<td>"+bairro_cliente+"</td>";
				// telaCadastroCliente += "<td>"+cidade_cliente+"</td>";
				// telaCadastroCliente += "<td>"+uf_cliente+"</td>";
				telaCadastroCliente += "<td>";
				telaCadastroCliente += "<button class='btn' onclick='telaAdicionarCliente("+id_cliente+");' style='color:#f0ad4e;' "+desabilitar+">";
				telaCadastroCliente += "<i class='fa fa-pencil' aria-hidden='true'></i>";
				telaCadastroCliente += "</button>";
				telaCadastroCliente += "</td>";

				// telaCadastroCliente += "<td>";
				// telaCadastroCliente += "<button class='btn' onclick='chamarTelaLocalEntrega("+id_cliente+");' style='color:green;' "+desabilitar+">";
				// telaCadastroCliente += "<i class='fa fa-plus' aria-hidden='true'></i>";
				// telaCadastroCliente += "</button>";
				// telaCadastroCliente += "</td>";

				telaCadastroCliente += "<td>";
				telaCadastroCliente += "<button class='btn' onclick='alteraAtivoCliente("+id_cliente+","+valorAtivo+");' style='color:"+cor_ativo+"'>";
				telaCadastroCliente += icone_ativo
				telaCadastroCliente += "</button>";
				telaCadastroCliente += "</td>";

				telaCadastroCliente += "</tr>";
			}
			telaCadastroCliente += "</table>";
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
	telaAdicionaCliente += "<div class='col-md-11 text-left' style='margin-left:15px;margin-right:50px;'>";
	telaAdicionaCliente += "		<div class='text-left title'>";
	telaAdicionaCliente += "			<h2>";
	telaAdicionaCliente += "				Formulário de Cadastro de Cliente";
	telaAdicionaCliente += "			</h2>";
	telaAdicionaCliente += "			<div class='text-left'>";
	telaAdicionaCliente += "				<a href='#' accessKey='v' onclick='chamarTelaCliente();' class='btn' title='Voltar'>";
	telaAdicionaCliente += "					<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCliente += "				</a>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			";
	telaAdicionaCliente += "		</div>";
	telaAdicionaCliente += "</div>";

	telaAdicionaCliente += "		<div class='form-group bloco'>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Razão Social:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' accessKey='i' value='"+razao_social+"' id='razao_social_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";

	telaAdicionaCliente += "				<div class='col-md-4'>";
	telaAdicionaCliente += "					<label class='label-float'>Tipo Pessoa:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<select id='tipocadastro' class='form-control' onchange='definirInputPessoa(\"\")' required>";
	telaAdicionaCliente += "						<option value='f' selected>Pessoa Física</option>";
	telaAdicionaCliente += "						<option value='j'>Pessoa Jurídica</option>";
	telaAdicionaCliente += "					</select>";
	telaAdicionaCliente += "				</div>";

	// referente a seleção do campo de cima
	telaAdicionaCliente += "				<div class='col-md-4' id='divPessoaFisica'>";
	telaAdicionaCliente += "					<label class='label-float'>Pessoa Física:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+inscricao_federal+"' id='pessoa_fisica_cadastro' class='form-control' rel=cpf required>";
	telaAdicionaCliente += "				</div>";

	telaAdicionaCliente += "				<div class='hidden' id='divPessoaJuridica'>";
	telaAdicionaCliente += "					<label class='label-float'>Pessoa Jurídica:</label> <span style='color: red;'>*</span>";
	telaAdicionaCliente += "					<input type='text' value='"+inscricao_federal+"' id='pessoa_juridica_cadastro' class='form-control' rel=cnpj required>";
	telaAdicionaCliente += "				</div>";

	if (id == 0) {
		telaAdicionaCliente += "		</div>";
		telaAdicionaCliente += "		<br>";
		telaAdicionaCliente += "		<div class='row'>";
		telaAdicionaCliente += "			<h2 style='margin-left: 15px'>Endereço</h2>";
		telaAdicionaCliente += "			<div class='col-md-4 col-md-offset-8' style='margin-top: -60px;'>";
		telaAdicionaCliente += "				<label>Busca por CEP:</label>";
		telaAdicionaCliente += "				<div class='input-group'>";
		telaAdicionaCliente += "					<input id='cep_cadastro_busca' value='"+cep_cliente+"' type='text' rel=cep class='form-control' onkeyup='buscaPorCep2();' required>";
		telaAdicionaCliente += "					<div class='input-group-addon' id='carregarCep2'>";
		telaAdicionaCliente += "						<i class='fa fa-search' aria-hidden='true'></i>";
		telaAdicionaCliente += "					</div>";
		telaAdicionaCliente += "				</div>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "		</div>";
		telaAdicionaCliente += "		<br>";
		telaAdicionaCliente += "		<div class='row'>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>Endereço:</label> <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='text' value='"+endereco_cliente+"' id='endereco_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>Numero:</label> <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='number' value='"+numero_cliente+"' id='numero_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>Complemento:</label>";
		telaAdicionaCliente += "				<input type='test' value='"+complemento_cliente+"' id='complemento_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "		</div>";
		telaAdicionaCliente += "		<br>";
		telaAdicionaCliente += "		<div class='row'>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>Bairro:</label> <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='text' value='"+bairro_cliente+"' id='bairro_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>Cidade:</label> <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='text' value='"+cidade_cliente+"' id='cidade_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>UF:</label> <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='text' value='"+uf_cliente+"' id='uf_cadastro' class='form-control' required>";
		telaAdicionaCliente += "			</div>";
		telaAdicionaCliente += "		</div>";
		telaAdicionaCliente += "		<br>";
		telaAdicionaCliente += "		<div class='row'>";
		telaAdicionaCliente += "			<div class='col-md-4'>";
		telaAdicionaCliente += "				<label class='label-float'>CEP: <span style='color: red;'>*</span>";
		telaAdicionaCliente += "				<input type='text' value='"+cep_cliente+"' id='cep_cadastro' class='form-control' rel=cep required>";
		telaAdicionaCliente += "			</div>";
	}

	

	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "			<br>";
	telaAdicionaCliente += "			<div class='row'>";
	telaAdicionaCliente += "				<h2 style='margin-left: 15px'>Contato</h2>";
	telaAdicionaCliente += "				<div class='col-md-4' id='divPessoaJuridica'>";
	telaAdicionaCliente += "					<label class='label-float'>Telefone:</label>";
	telaAdicionaCliente += "					<input type='tel' value='"+telefone+"' id='telefone_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";

	telaAdicionaCliente += "				<div class='col-md-4' id='divPessoaJuridica'>";
	telaAdicionaCliente += "					<label class='label-float'>E-mail:</label>";
	telaAdicionaCliente += "					<input type='email' value='"+email+"' id='email_cadastro' class='form-control' required>";
	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "				";
	telaAdicionaCliente += "			</div>";

	telaAdicionaCliente += "			<br><br>";
	telaAdicionaCliente += "			<div class='col-md-12 text-center'>";
	telaAdicionaCliente += "				<div class='form-item'>";
	telaAdicionaCliente += "					<a href='#' onclick='chamarTelaCliente();' class='btn btn-info' title='Voltar'>";
	telaAdicionaCliente += "						<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCliente += "						&nbsp;Voltar para Cliente";
	telaAdicionaCliente += "					</a>";
	telaAdicionaCliente += "					&nbsp;";
	
	if (id != 0) {
		telaAdicionaCliente += "				<button onclick='editarCliente("+id+");' accessKey='s' class='btn btn-success'>";
		telaAdicionaCliente += "					<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCliente += "					&nbsp;Atualizar";
		telaAdicionaCliente += "				</button>";
		// telaAdicionaCliente += "				&nbsp;";
		// telaAdicionaCliente += "				<button onclick='chamarTelaLocalEntrega("+id+");' accessKey='a' class='btn btn-warning'>";
		// telaAdicionaCliente += "					<i class='fa fa-plus' aria-hidden='true'></i>";
		// telaAdicionaCliente += "					&nbsp;Local de Entrega";
		// telaAdicionaCliente += "				</button>";
		telaAdicionaCliente += "				<div id='gradeLocalEntregaCliente'></div>";
	} else {
		telaAdicionaCliente += "				<button onclick='adicionarCliente();' accessKey='s' class='btn btn-success'>";
		telaAdicionaCliente += "					<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCliente += "					&nbsp;Gravar";
		telaAdicionaCliente += "				</button>";
		telaAdicionaCliente += "				<br><br>";
	}

	telaAdicionaCliente += "				</div>";
	telaAdicionaCliente += "			</div>";
	telaAdicionaCliente += "		</div>";


	$("#areaOperacao").html(telaAdicionaCliente);
	$('#razao_social_cadastro').focus();

	mask();
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
				$.toast({
					text: "Erro ao tentar encontrar o CEP!", 
					heading: 'Aviso', 
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
						chamarTelaCliente();
						atualizaCliente();
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
				atualizaCliente();
				chamarTelaCliente();
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
						chamarTelaCliente();
						atualizaCliente();
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



function montarComboBuscaCliente(){
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
		var tipo = "";
		var inscricao_federal = "";
		var bool_ativo = "";
		var telefone = "";
		var email = "";
		var endereco = "";
		var cnpj_user = "";


		var montarInputListCidade = "";
		var arrayJson = "";
		var cont = 0;

		if (data == "") {
			montarInputListCidade += "<input type='text' class='form-control' placeholder='Sem registros (Cliente)' disabled>";
		} else {
			montarInputListCidade += "<input type='text' id='clienteCInputList'";
			montarInputListCidade += "class='flexdatalist form-control' placeholder='Cliente'";
			montarInputListCidade += "data-min-length='0' data-visible-properties='[\"razao_social\"]' ";
			montarInputListCidade += "data-selection-required='true' data-value-property='id_cliente' ";
			montarInputListCidade += "onchange='telaAdicionarCliente(this.value);' ";
			montarInputListCidade += "required>";

			var vetor = data.split("[]");
			var subvetor = [];
			
			arrayJson += "[";
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
		$("#comboBuscaCliente").html(montarInputListCidade);
		arrayJson = JSON.parse(arrayJson);
		setarValorClienteCInputList(arrayJson);
	});
}

function setarValorClienteCInputList(eljson){
	$('#clienteCInputList').flexdatalist({
		selectionRequired: true,
		valueProperty: 'id_cliente',
		searchIn: 'razao_social',
		minLength: 0,
		data: eljson
	});
	document.getElementById("clienteCInputList-flexdatalist").accessKey = "b";
}