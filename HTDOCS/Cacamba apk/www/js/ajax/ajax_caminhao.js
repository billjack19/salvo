function montarListaCaminhaoVerifica(id_motorista){	
	$.ajax({
		url:urlWebService+'funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'listar_ocupado_caminhao': true,
			'id_motorista': id_motorista
		}
	}).done( function(data){
		console.log("data: "+data);
		if (data == "0" || data == 0) {
			montarListaCaminhoesDisponivel(id_motorista);
		} else {
			$("#id_caminhao_constante").val(data);
			montarListaCacambaPendentes();
		}
	});
}





function montarListaCaminhoesDisponivel(id_motorista){
	var montarListaCaminhaos = "";
	
	var id_caminhao = "";
	var latitude = "";
	var logitude = "";
	var titulo = "";
	
	$.ajax({
		url:urlWebService+'funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'listar_diponivel_caminhao': true }
	}).done( function(data){
		console.log("data: "+data);
		if (data == "") {
			montarListaCaminhaos += "<div class='col-md-12' class='text-center'>";
			montarListaCaminhaos += "<br>Nenhum caminhão disponível";
			montarListaCaminhaos += "<br>Verifique se algum motorista deixou de sair do caminhão, e tente novamente";
			montarListaCaminhaos += "</div>";
		} else {
			var vetor = data.split("[]");
			var subvetor = [];

			montarListaCaminhaos += "<div class='col-md-12 text-center'>";
			montarListaCaminhaos += "<h2>Caminhões disponíveis</h2>";

			montarListaCaminhaos += "<table class='table'>";
			montarListaCaminhaos += "<tr>";

			montarListaCaminhaos += "<td>Descrição</td>";
			montarListaCaminhaos += "<td></td>";

			montarListaCaminhaos += "</tr>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");


				id_caminhao = subvetor[0];
				latitude = subvetor[3];
				logitude = subvetor[2];
				titulo = subvetor[1];

				
				montarListaCaminhaos += "<tr>";

				montarListaCaminhaos += "<td>"+titulo+"</td>";
				montarListaCaminhaos += "<td>"
				montarListaCaminhaos += "<button class='btn' onclick='selecionarCaminhao("+id_caminhao+","+id_motorista+")'>";

				montarListaCaminhaos += "Selecionar&nbsp;<i class='fa fa-arrow-right' aria-hidden='true'></i>";

				montarListaCaminhaos += "</button>";
				montarListaCaminhaos += "</td>";

				montarListaCaminhaos += "</tr>";

			}

			montarListaCaminhaos += "</table>";
			montarListaCaminhaos += "</div>";
		}
		$("#listaPagina").html(montarListaCaminhaos);
	});
}


function selecionarCaminhao(id_caminhao, id_motorista){
	$.ajax({
		url:urlWebService+'funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'selecionar_caminhao': true,
			'id_caminhao': id_caminhao,
			'id_motorista': id_motorista
		}
	}).done( function(data){
		console.log("Selecionar caminhão (data): "+data);
		if (data == 1 || data == "1") {
			$("#id_caminhao_constante").val(id_caminhao);
			montarListaCacambaPendentes();
		}
	});
}



 
function montarListaCacambaPendentes(){
	chamaLocalizacao = true;

	var id_cacamba = "";
	var latitude = "";
	var logitude = "";
	var titulo = "";
	var situacao = "";

	var montarListaCacamba = "";
	var corDaLinha = "";

	$.ajax({
		url:urlWebService+'funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'listar_pendente_cacamba': true
		}
	}).done( function(data){
		if (data == "") {
			montarListaCacamba += "<div class='col-md-12' class='text-center' style='background-color: #fff;'>";
			montarListaCacamba += "<br>Nenhuma caçamba pendente";
			montarListaCacamba += "</div>";
		} else {
			var vetor = data.split("[]");
			var subvetor = [];

			montarListaCacamba += "<div class='col-md-12 text-center' style='background-color: #fff;'>";
			montarListaCacamba += "<h2>Caçambas Pendentes</h2>";

			montarListaCacamba += "<table class='table'>";
			montarListaCacamba += "<tr>";

			montarListaCacamba += "<td>Título</td>";
			montarListaCacamba += "<td></td>";

			montarListaCacamba += "</tr>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_cacamba = subvetor[0];
				latitude = subvetor[1];
				logitude = subvetor[2];
				titulo = subvetor[4];
				situacao = subvetor[3];

				if (situacao == 1) 	{ corDaLinha = "#428bca"; }
				else 				{ corDaLinha = "#5cb85c"; }

				montarListaCacamba += "<tr bgcolor='"+corDaLinha+"'>";

				montarListaCacamba += "<td style='color:#fff;'>"+titulo+"</td>";
				montarListaCacamba += "<td align='right'>"
				montarListaCacamba += "<button class='btn' onclick='selecionarCaminhao("+id_cacamba+")'>";

				montarListaCacamba += "Confirmar&nbsp;<i class='fa fa-arrow-right' aria-hidden='true'></i>";

				montarListaCacamba += "</button>";
				montarListaCacamba += "</td>";

				montarListaCacamba += "</tr>";
			}

			montarListaCacamba += "</table>";
			montarListaCacamba += "</div>";

			montarListaCacamba += "</table>";
			montarListaCacamba += "<table style='margin-left:15px;'><tr>";
			montarListaCacamba += "<td>";
			montarListaCacamba += "<div style='background-color: #428bca;' class='legenda'></div>";
			montarListaCacamba += "</td><td>";
			montarListaCacamba += "&nbsp;&nbsp;Levar&nbsp;&nbsp;&nbsp;";
			montarListaCacamba += "</td>";
			// "</tr><tr>";
			montarListaCacamba += "<td>";
			montarListaCacamba += "<div style='background-color: #5cb85c;' class='legenda'></div>";
			montarListaCacamba += "</td><td>";
			montarListaCacamba += "&nbsp;&nbsp;Recolher&nbsp;&nbsp;&nbsp;";
			montarListaCacamba += "</td>";
			montarListaCacamba += "</tr></table><br><br><br>";

			var botaoVoltarFixo = "<button class='btn btn-info' onclick='sairCaminhao();'>";
				botaoVoltarFixo += '<i class="fa fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;';
				botaoVoltarFixo += "Sair do Caminhão";
				botaoVoltarFixo += "</button>";
		}
		$("#listaPagina").html(montarListaCacamba);
		$("#botaoSairCaminhao").html(botaoVoltarFixo);

		setInterval(function(){
			if (chamaLocalizacao) {
				document.getElementById("buttonChecarLocalização").click();
			}
		}, 3000);
		
	});
}



function sairCaminhao(){
	bootbox.confirm({
		title: "Tem certeza que deseja sair do caminhão?",
		message: "Você será direcionado para tela de caminhões disponíveis!",
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
				var id_caminhao = $("#id_caminhao_constante").val();
				var id_motorista = $("#editar").val();
				chamaLocalizacao = false;
				$.ajax({
					url:urlWebService+'funcoesController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'sair_caminhao': true,
						'id_caminhao': id_caminhao
					}
				}).done( function(data){
					console.log("Sair caminhão (data): "+data);
					if (data == 1 || data == "1") {
						montarListaCaminhoesDisponivel(id_motorista);
						$("#botaoSairCaminhao").html("");
					}
				});
			}
		}
	});
}