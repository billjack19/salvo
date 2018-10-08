function montarListaCaminhao(id_motorista){
	$.ajax({
		type: 'GET',
		url: urlWebService+"CaminhaoWS/listarOcupado/"+id_motorista+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			montarListaCaminhoesDisponivel(id_motorista);
		} else {
			for(i in data){
				var id_caminhao = data[i].id_caminhao;
				$("#id_caminhao_constante").val(id_caminhao);
			}
			montarListaCacambaPendentes();
		}
	});
}

function montarListaCaminhoesDisponivel(id_motorista){
	var montarListaCaminhaos = "";
	$.ajax({
		type: 'GET',
		url: urlWebService+"CaminhaoWS/listarDisponivel"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			montarListaCaminhaos += "<div class='col-md-12' class='text-center'>";
			montarListaCaminhaos += "<br>Nenhum caminhão disponível";
			montarListaCaminhaos += "<br>Verifique se algum motorista deixou de sair do caminhão, e tente novamente";
			montarListaCaminhaos += "</div>";
		} else {
			montarListaCaminhaos += "<div class='col-md-12'>";

			montarListaCaminhaos += "<table>";
			montarListaCaminhaos += "<tr>";

			montarListaCaminhaos += "<td>Descrição</td>";
			montarListaCaminhaos += "<td></td>";

			montarListaCaminhaos += "</tr>";

			for(i in data){
				montarListaCaminhaos += "<tr>";

				montarListaCaminhaos += "<td>"+data[i].descricao+"</td>";
				montarListaCaminhaos += "<td>"
				montarListaCaminhaos += "<button class='btn' onclick='selecionarCaminhao("+data[i].id_caminhao+","+id_motorista+")'>";

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

function montarListaCacambaPendentes(){
	chamaLocalizacao = true;
	var montarListaCacamba = "";
	var corDaLinha = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"CacambaWS/listarCarreto/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			montarListaCacamba += "<div class='col-md-12' class='text-center' style='background-color: #fff;'>";
			montarListaCacamba += "<br>Nenhuma caçamba pendente";
			montarListaCacamba += "</div>";
		} else {
			montarListaCacamba += "<div class='col-md-12' style='background-color: #fff;'>";

			montarListaCacamba += "<table class='table'>";
			montarListaCacamba += "<tr>";

			montarListaCacamba += "<td>Título</td>";
			montarListaCacamba += "<td></td>";

			montarListaCacamba += "</tr>";

			for(i in data){
				if (data[i].situacao == 1) 	{ corDaLinha = "#428bca"; }
				else 						{ corDaLinha = "#5cb85c"; }

				montarListaCacamba += "<tr bgcolor='"+corDaLinha+"'>";

				montarListaCacamba += "<td style='color:#fff;'>"+data[i].titulo+"</td>";
				montarListaCacamba += "<td align='right'>"
				montarListaCacamba += "<button class='btn' onclick='selecionarCaminhao("+data[i].id_cacamba+")'>";

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
		}
		$("#listaPagina").html(montarListaCacamba);

		setInterval(function(){
			if (chamaLocalizacao) {
				document.getElementById("buttonChecarLocalização").click();
			}
		}, 3000);
		
	});
}


