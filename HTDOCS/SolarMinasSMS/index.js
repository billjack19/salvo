function carregarContatos(){
	var carregando = "<div class='text-center'>";
	carregando += "<br><br><br><h2>Carregando&nbsp;&nbsp;&nbsp;<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></h2>";
	carregando += "</div>";
	$("#conteudo").html(carregando);

	$.ajax({
		url:'configIp.php',
		type: 'POST',
		dataType: 'text',
		data: { 'retornaIp': true }
	}).done( function(data){
		/* console.log(data); */
		var resultado = data.substring(2, data.length);
		var arrayData = resultado.split("+");
		/* console.log(arrayData); */
		hostWebService = arrayData[0];
		portaImgService = arrayData[1];
		/* caminhoWebService = "/LanchesCDI_MySQL/webresources/";/* LanchesCDI */
		urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
		parametrosWebService = "?tagmode=any&jsoncallback=?";
		/* adicionarIpDireto(hostWebService, portaImgService); */
		/* console.log(urlWebService); */
		var resultado = "";
		var arrayTelefones = [];
		var selectTelefones = "";

		$.ajax({
			type: 'GET',
			url: urlWebService+"EnvioSmsWs/listarEnviosSms"+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			/* console.log(data); */
			
			if (data.length == 0) {
				resultado += "<br><h2>Nenhum registro encontrado!</h2>";
			} else {
				resultado += "<table class='table'>";
				resultado += 	"<tr>";
				resultado += 		"<td width='5%'><b></b></td>";
				resultado += 		"<td><b>Pedido</b></td>";
				resultado += 		"<td><b>Nome</b></td>";
				resultado += 		"<td><b>Telefone</b></td>";
				resultado += 		"<td><b>Mansagem</b></td>";
				resultado += 		"<td><b>Enviar</b></td>";
				resultado += 		"<td><b>Cancelar</b></td>";
				resultado += 	"</tr>";

				for(i in data){
					selectTelefones = "<select class='form-control' id='telefone"+data[i].id+"'>";
					arrayTelefones = data[i].telefones.split("+");
					for (var j = 0; j < arrayTelefones.length; j++) {
						if (arrayTelefones[j] != "") {
							selectTelefones += "<option value='"+arrayTelefones[j]+"'>"+arrayTelefones[j]+"<option>";
						}
					}
					selectTelefones += "</select>";

					resultado += "<tr id='linha"+data[i].id+"' class='linhaSelecionada'>";
					resultado += 	"<td>";
					resultado += 		"<input	type='checkbox' class='form-control' onclick='selecaoLinha()' id='check"+data[i].id+"' name='selecaoLinha'>";
					resultado += 		"<input	type='hidden' value='"+data[i].id+"' name='valorLinha'>";
					resultado += 	"</td>";
					resultado += 	"<td>"+data[i].documento+"</td>";
					resultado += 	"<td id='cliente"+data[i].id+"'>"+data[i].razaoSocial+"</td>";
					resultado += 	"<td>"+selectTelefones+"</td>";
					resultado += 	"<td id='mensagem"+data[i].id+"'>Falta Mandar Mensagem para SMS!</td>";
					resultado += 	"<td>";
					resultado += 		"<button class='btn btn-primary' onclick='confirmaEnvio(\""+data[i].id+"\")'>";
					resultado += 			"<i class='fa fa-envelope'></i>&nbsp;&nbsp;&nbsp;Enviar";
					resultado += 		"</button>";
					resultado += 	"</td>";
					resultado += 	"<td>";
					resultado += 		"<button class='btn btn-danger' onclick='confirmaCancelamento(\""+data[i].id+"\")'>";
					resultado += 			"<i class='fa fa-times'></i>&nbsp;&nbsp;&nbsp;Cancelar";
					resultado += 		"</button>";
					resultado += 	"</td>";
					resultado += "</tr>";
				}
				resultado += "</table>";
			}
			$("#conteudo").html(resultado);
		});
	});
}



function selecaoLinha(){
	var arrayCheck = document.getElementsByName("selecaoLinha");
	var temSelecionado = false;
	for (var i = 0; i < arrayCheck.length; i++) {
		if(arrayCheck[i].checked){
			temSelecionado = true;
			i = arrayCheck.length;
		}
	}
	if (temSelecionado) {
		document.getElementById("rodapeEnviarTodos").style.display = "block";
	} else {
		document.getElementById("rodapeEnviarTodos").style.display = "none";
	}
}





function enviarSelecionados(){
	var arrayCheck = document.getElementsByName("selecaoLinha");
	var arrayValores = document.getElementsByName("valorLinha");
	var destino = "";
	var mensagem = "";
	var idSelecionado = "";
	
	var enviados = 0;
	var falhas = 0;

	bootbox.confirm({
		title: "Tem certeza que deseja enviar o(s) SMS selecionado(s)?",
		message: "Ao aperta o botão \"Sim\" você irá enviar o(s) SMS selecionado(s)!",
		buttons: {
			confirm: { label: 'Sim', className: 'btn-success' },
			cancel:  { label: 'Não', className: 'btn-danger'  }
		},
		callback: function (result) {
			if (result) {
				for (var i = 0; i < arrayCheck.length; i++) {
					if(arrayCheck[i].checked){
						idSelecionado = arrayValores[i].value;
						destino = document.getElementById("telefone"+idSelecionado).value;
						mensagem = document.getElementById("mensagem"+idSelecionado).innerHTML;
						if (destino != "" && mensagem != "") {
							enviaSms(idSelecionado, destino, mensagem);
							enviados++;
						} else {
							falhas++;
						}
					}
				}
				jk_toasth("info", "Mensagem enviadas: "+enviados+"\nMensagens com não enviadas: "+falhas, 5000);
			}
		}
	});
}



function confirmaEnvio(id){
	var destino = document.getElementById("telefone"+id).value;
	var cliente = document.getElementById("cliente"+id).innerHTML;
	var mensagem = document.getElementById("mensagem"+id).innerHTML;

	if (destino != "" && mensagem != "") {
		bootbox.confirm({
			title: "Tem certeza que deseja enviar SMS?",
			message: "Ao aperta o botão \"Sim\" você irá enviar um SMS para "+cliente,
			buttons: {
				confirm: { label: 'Sim', className: 'btn-success' },
				cancel: { label: 'Não', className: 'btn-danger' }
			},
			callback: function (result) {
				if (result) {
					enviaSms(id, destino, mensagem);
					jk_toasth("success", "Mensagem enviada!", 5000);
				}
			}
		});
	} else { jk_toasth("error", "Selecione um número!", 5000); }
}


function enviaSms(id, destino, mensagem){
	$.ajax({
		url:'send.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'mensagem': mensagem,
			'destino': destino
		}
	}).done( function(data){
		$.ajax({
			type: 'GET',
			url: urlWebService+"EnvioSmsWs/atualizarCK/"+id+"/1"+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			$("#linha"+id).remove();
			selecaoLinha();
		});
	});
}







function cancelarSelecionados(){
	var arrayCheck = document.getElementsByName("selecaoLinha");
	var arrayValores = document.getElementsByName("valorLinha");
	var destino = "";
	var mensagem = "";
	var idSelecionado = "";
	
	var cancaladas = 0;

	bootbox.confirm({
		title: "Tem certeza que deseja cancelar os SMS selecionados?",
		message: "Ao aperta o botão \"Sim\" você irá cancelar o(s) SMS selecionado(s)!",
		buttons: {
			confirm: { label: 'Sim', className: 'btn-success' },
			cancel:  { label: 'Não', className: 'btn-danger'  }
		},
		callback: function (result) {
			if (result) {
				for (var i = 0; i < arrayCheck.length; i++) {
					if(arrayCheck[i].checked){
						idSelecionado = arrayValores[i].value;
						cancelarSms(idSelecionado);
						cancaladas++;
					}
				}
				jk_toasth("info", "Foram cancelada(s) "+cancaladas+" mensagem(s)!", 5000);
			}
		}
	});
}



function confirmaCancelamento(id){
	var cliente = document.getElementById("cliente"+id).innerHTML;

	bootbox.confirm({
		title: "Tem certeza que deseja cancelar SMS?",
		message: "Ao aperta o botão \"Sim\" você irá cancelar o SMS para "+cliente,
		buttons: {
			confirm: { label: 'Sim', className: 'btn-success' },
			cancel: { label: 'Não', className: 'btn-danger' }
		},
		callback: function (result) {
			if (result) {
				cancelarSms(id);
				jk_toasth("info", "Mensagem cancelada!", 5000);
			}
		}
	});
}


function cancelarSms(id){
	$.ajax({
		type: 'GET',
		url: urlWebService+"EnvioSmsWs/atualizarCK/"+id+"/2"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		$("#linha"+id).remove();
		selecaoLinha();
	});
}