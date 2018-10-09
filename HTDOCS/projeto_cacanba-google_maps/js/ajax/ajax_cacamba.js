function listarCacamba(){

	var latitude = "";
	var logitude = "";
	var titulo = "";
	var situacao = 0;
	var id_cacamba = 0;
	var filtro_cinza = document.getElementById("filtro_cacamba_cinza").checked;
	var filtro_vermelha = document.getElementById("filtro_cacamba_vermelha").checked;
	var filtro_verde = document.getElementById("filtro_cacamba_verde").checked;

	$.ajax({
		url:'controllers/funcoes_cacambaController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_cacamba': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){
		if (data == "") {

		} else {
			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_cacamba = subvetor[0];
				latitude = subvetor[1];
				logitude = subvetor[2];
				titulo = subvetor[4];
				situacao = subvetor[3];

				if (situacao == 1 && filtro_cinza) {
					adicionarMarcador(latitude , logitude, titulo, situacao, id_cacamba);
				} else if (situacao == 2 && filtro_vermelha){
					adicionarMarcador(latitude , logitude, titulo, situacao, id_cacamba);
				} else if (situacao == 3 && filtro_verde){
					adicionarMarcador(latitude , logitude, titulo, situacao, id_cacamba);
				}				
			}
		}
	});
}

function atualizaCacamba(){
	removerMarcadores();
	Markers = [];
	listarCacamba();
}


function chamarTelaCacamba(){
	chamarTelaOperacao();

	var id_cacamba = "";
	var descricao_cacamba = "";
	var cnpj_user = "";

	var telaCadastroCacamba = "";
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";

	$.ajax({
		url:'controllers/funcoes_cacambaController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_cacamba': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){
		telaCadastroCacamba += "<div class='col-md-12 text-center'>";
		telaCadastroCacamba += "<h1>Caçamba</h1>";
		telaCadastroCacamba += "</div>";


		telaCadastroCacamba += "<div class='col-md-12 text-right'  style='margin-top: 0px;'>";

		telaCadastroCacamba += "<button class='btn btn-success' accessKey='a' onclick='telaAdicionarCacamba(0);'>";
		telaCadastroCacamba += "<i class='fa fa-plus' aria-hidden='true'></i>&nbsp;&nbsp;Adicionar Caçamba";
		telaCadastroCacamba += "</button>";
		telaCadastroCacamba += "&nbsp;&nbsp;";
		telaCadastroCacamba += "<button class='btn btn-primary' accessKey='v' onclick='chamarTelePrincipal();'>";
		telaCadastroCacamba += "<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;&nbsp;Voltar ao Mapa";
		telaCadastroCacamba += "</button>";

		telaCadastroCacamba += "</div>";

		telaCadastroCacamba += "<br>";

		telaCadastroCacamba += "<div class='input-group text-left' style='margin-top: -50px; width: 20%; margin-left: 15px;'>";
		telaCadastroCacamba += "	<div class='input-group-addon'>";
		telaCadastroCacamba += "		<i class='fa fa-search' aria-hidden='true'></i>";
		telaCadastroCacamba += "	</div>";
		telaCadastroCacamba += "	<div id='comboBuscaCacamba'></div>";
		telaCadastroCacamba += "</div>";

		telaCadastroCacamba += "<br>";

		telaCadastroCacamba += "<div class='col-md-12'>";
		

		if (data == "") {
			telaCadastroCacamba += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCacamba += "<br>";

			telaCadastroCacamba += "<div class='bloco2'>";
			telaCadastroCacamba += "<table class='table'>";
			telaCadastroCacamba += "<tr>";
			telaCadastroCacamba += "<td>Descrição</td>";
			telaCadastroCacamba += "<td>CNPJ</td>";
			telaCadastroCacamba += "<td>Editar</td>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_cacamba = 		subvetor[0];
				descricao_cacamba = subvetor[1];
				cnpj_user = 		subvetor[2];


				telaCadastroCacamba += "<tr>";
				telaCadastroCacamba += "<td>"+descricao_cacamba+"</td>";
				telaCadastroCacamba += "<td>"+cnpj_user+"</td>";
				telaCadastroCacamba += "<td>";
				telaCadastroCacamba += "<button class='btn' onclick='telaAdicionarCacamba("+id_cacamba+");' style='color:#f0ad4e;' "+desabilitar+">";
				telaCadastroCacamba += "<i class='fa fa-pencil' aria-hidden='true'></i>";
				telaCadastroCacamba += "</button>";
				telaCadastroCacamba += "</td>";

				telaCadastroCacamba += "</tr>";
			}
			telaCadastroCacamba += "</table>";
			telaCadastroCacamba += "</div>";	
		}
		telaCadastroCacamba += "</div>";
		$("#areaOperacao").html(telaCadastroCacamba);
		montarComboBuscaCacamba();
	});
}



function telaAdicionarCacamba(id){ 
	var id_cacamba = "";
	var descricao_cacamba = "";
	var cnpj_user = "";


	chamarTelaOperacao();
	var telaAdicionaCacamba = "";
	telaAdicionaCacamba += "<div class='col-md-11 text-left' style='margin-left:15px;margin-right:50px;'>";
	telaAdicionaCacamba += "		<div class='text-left title'>";
	telaAdicionaCacamba += "			<h2>";
	telaAdicionaCacamba += "				Formulário de Cadastro de Caçamba";
	telaAdicionaCacamba += "			</h2>";
	telaAdicionaCacamba += "			<div class='text-left'>";
	telaAdicionaCacamba += "				<a href='#' accessKey='v' onclick='chamarTelaCacamba();' class='btn' title='Voltar'>";
	telaAdicionaCacamba += "					<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCacamba += "				</a>";
	telaAdicionaCacamba += "			</div>";
	telaAdicionaCacamba += "			";
	telaAdicionaCacamba += "		</div>";
	telaAdicionaCacamba += "		<div class='form-group bloco'>";
	telaAdicionaCacamba += "			<div class='row'>";
	telaAdicionaCacamba += "				<div class='col-md-5'>";
	telaAdicionaCacamba += "					<label class='label-float'>Descrição:</label> <span style='color: red;'>*</span></label>";
	telaAdicionaCacamba += "					<input type='text' accessKey='i' value='"+descricao_cacamba+"' id='descricao_cadastro' class='form-control' required>";
	telaAdicionaCacamba += "				</div>";
	telaAdicionaCacamba += "			<br>";
	telaAdicionaCacamba += "			<div class='row'>";
	telaAdicionaCacamba += "			</div>";
	telaAdicionaCacamba += "			<br><br>";
	telaAdicionaCacamba += "			<div class='col-md-6 col-md-offset-3 text-center'>";
	telaAdicionaCacamba += "				<div class='form-item'>";
	telaAdicionaCacamba += "					<a href='#' onclick='chamarTelaCacamba();' class='btn btn-info' title='Voltar'>";
	telaAdicionaCacamba += "						<i class='fa fa-arrow-left' aria-hidden='true'></i>";
	telaAdicionaCacamba += "						&nbsp;Voltar para Caçamba";
	telaAdicionaCacamba += "					</a>";
	telaAdicionaCacamba += "					&nbsp;";
	
	if (id != 0) {
		telaAdicionaCacamba += "					<button onclick='editarCacamba("+id+");' accessKey='s' class='btn btn-success'>";
		telaAdicionaCacamba += "						<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCacamba += "						&nbsp;Atualizar";
		telaAdicionaCacamba += "					</button>";
	} else {
		telaAdicionaCacamba += "					<button onclick='adicionarCacamba();' accessKey='s' class='btn btn-success'>";
		telaAdicionaCacamba += "						<i class='fa fa-floppy-o' aria-hidden='true'></i>";
		telaAdicionaCacamba += "						&nbsp;Gravar";
		telaAdicionaCacamba += "					</button>";
	}

	telaAdicionaCacamba += "				</div>";
	telaAdicionaCacamba += "			</div>";
	telaAdicionaCacamba += "		</div>";
	telaAdicionaCacamba += "</div>";

	$("#areaOperacao").html(telaAdicionaCacamba);
	$('#descricao_cadastro').focus();

	mask();
	if (id != 0) {
		$.ajax({
			url:'controllers/funcoes_cacambaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_cacamba_id': true,
				'id': id
			}
		}).done( function(data){
			console.log("trazer valor pra editar"+data)

			var vetor = data.split(",");

			id_cacamba = 		vetor[0];
			descricao_cacamba = vetor[1];
			cnpj_user = 		vetor[2];

			$('#descricao_cadastro').val(descricao_cacamba);
		});
	}
}


function adicionarCacamba(){
	var descricao = $("#descricao_cadastro").val();
	var cnpj_user_gravar = $("#identificador").data("cnpj");

	if (descricao == "" || cnpj_user_gravar == "") {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
		$.ajax({
			url:'controllers/cacambaController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'descricao_cacamba': descricao,
				'cnpj_user': cnpj_user_gravar
			}
		}).done( function(data){
			// console.log("cadastro cacamba data: "+data);
			if (data == '1') {
				jk_toasth('success', "Cadastrado com sucesso!");
				chamarTelaCacamba();
			}else {
				jk_toasth('error', "Falha ao cadastrar!");
			}
		});
	}
}


function editarCacamba(id){
	var descricao = $("#descricao_cadastro").val();
	var cnpj_user_gravar = $("#identificador").data("cnpj");

	if (descricao == "" || cnpj_user_gravar == "") {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
		$.ajax({
			url:'controllers/editar_cacambaController.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'id': id,
				'descricao_cacamba': descricao,
				'cnpj_user': cnpj_user_gravar
			}
		}).done( function(data){
			// console.log("editar: data = "+data);
			if (data == '1') {
				jk_toasth('success', "Alterado com sucesso!");
				chamarTelaCacamba();
			}else {
				jk_toasth('error', "Falha ao atualizar!");
			}
		});
	}
}

function montarComboBuscaCacamba(){
	jk_comboDataList(
		"Caçamba", "funcoes_cacambaController", 
		{
			'pequisa_cacamba': true,
			'cnpj': $("#identificador").data("cnpj")
		}, "cacambaInputList", 
		[ "1","2" ],
		0, [1], "b", "comboBuscaCacamba", "telaAdicionarCacamba(this.value);", 0
	);
}