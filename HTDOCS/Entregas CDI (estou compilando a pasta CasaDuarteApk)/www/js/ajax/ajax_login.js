$('#formLogin').submit(function(e){        
	e.preventDefault();
	var identificador = $("#login").val();
	var senha = $("#password").val();
	adicionarLogin(identificador, senha);
	logarSistema(identificador, senha);
});

function logarSistema(identificador, senha){

	// document.getElementById("buttonChecarLocalização").click();
	$.ajax({
		url: urlWebService+'funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'autentica': true,
			'login': identificador,
			'senha': senha
		}
	}).done( function(data){
		// console.log("Login data: "+data.substring(2, data.length));
		if (data.substring(2, data.length) == "0") {
			$.toast({
				text: "Login ou senha incorretos!", 
				heading: 'Falha', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			var vetor = data.split("/,/");
			var objData = JSON.parse(vetor[1]);
			console.log(objData);

			var nomeMotorista = objData.motorista.nome;
			$("#botaoVoltarFixo").html("<h3 style='margin-top: 0px;margin-bottom:0px;'>"+nomeMotorista+"</h3>");

			var nomeHiddenUsuario = "<input type='hidden' value='"+objData.motorista.codigo+"' id='identificador' data-razaosocial='"+objData.motorista.nome+"'>";

			var botaoVoltarFixo = "<button class='btn btn-info' onclick='logoff();'>";
			botaoVoltarFixo += '<i class="fa fa-sign-out-alt" aria-hidden="true"></i>&nbsp;&nbsp;';
			botaoVoltarFixo += "Sair";
			botaoVoltarFixo += "</button>";

			$("#editar").val(id_motorista_param);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#cabecarioPrincipal").html(vetor[0]);
			$("#botaoSairCaminhao").html(botaoVoltarFixo);

			// Mensagem de sucesso da autenticação
			$.toast({
				text: "Você está logado!", 
				heading: 'Nota', 
				icon: 'info', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});
			$("#id_caminhao_constante").val(objData.caminhao.codigo);

			var id_motorista_param = objData.motorista.codigo;

			var latlng = new google.maps.LatLng(parseFloat(objData.caminhao.latitude),parseFloat(objData.caminhao.longitude));
			initialize(latlng);

			waypts = [];
			for (var j = 0; j < objData.endEntrega.length; j++) {
				waypts.push({
					location: objData.endEntrega[j].endEntrega, 
					stopover: true
				});
			}

			var rota = {
				origem: objData.endInicial,
				destino: objData.endFinal,
				entregas: waypts,
				entregasDetalhe: objData.endEntrega,
				rotaDetalhe: objData,
				cor: arrayDeCores[0]
			};

			tracarRotas(rota);
		}
	});
	return false;
}

function logoff(){
	bootbox.confirm({
		title: "Tem certeza que deseja sair da aplicação?",
		message: "Você será direcionado para tela de login!",
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
				removerLogin(true);
			}
		}
	});	
}





function abrirPaginaEntregas(){
	// console.log("abrirPaginaEntregas");
	var tamanhoTelaRender = $(document).height() * 0.65;
	document.getElementById("paginaEntrega").style.height = tamanhoTelaRender+"px";
	document.getElementById("paginaEntrega").style.display = "block";

	var botao = "<button class='btn btn-dafault' onclick='abrirPaginaMapa()'>";
	botao += "<i class='fa fa-map'></i>&nbsp;&nbsp;Mapa";
	botao += "</button>";

	$("#botaoCantoSuperior").html(botao);
}


function abrirPaginaMapa(){
	// console.log("abrirPaginaEntregas");
	// var tamanhoTelaRender = $(document).height() * 0.65;
	// document.getElementById("paginaEntrega").style.height = tamanhoTelaRender+"px";
	document.getElementById("paginaEntrega").style.display = "none";

	var botao = "<button class='btn btn-dafault' onclick='abrirPaginaEntregas()'>";
	botao += "<i class='fa fa-box'></i>&nbsp;&nbsp;Entregas";
	botao += "</button>";

	$("#botaoCantoSuperior").html(botao);
}


function confirmaPedido(codigoEntrega){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar entrega?",
		message: "Se você apertar o botão 'sim' estará dizendo que está entrega está confirmada!",
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
					url: urlWebService+'funcoesController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'confirmaEnterga': true,
						'id': codigoEntrega
					}
				}).done( function(data){
					if (data == 1 || data == "1") {
						toastGeral("success", "A entrega foi confirmada!");

						var indiceImagem = document.getElementById("marcador_indice_"+codigoEntrega).value;
						var imagem = "img/green/pacote_green_"+indiceImagem+".png";

						document.getElementById("imagem_pacote_"+codigoEntrega).src = imagem;
						document.getElementById("buttonCofCan_"+codigoEntrega).innerHTML = retornaBotao("times", codigoEntrega);
						
						atualizarPacotes();
					} else {
						toastGeral("error", "Error ao confirmar entrega!");
					}
				});
			}
		}
	});
}


function cancelarPedido(codigoEntrega){
	bootbox.confirm({
		title: "Tem certeza que deseja cancelar a confirmação da entrega?",
		message: "Se você apertar o botão 'sim' estará dizendo que está entrega não está confirmada!",
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
					url: urlWebService+'funcoesController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'cancelarEnterga': true,
						'id': codigoEntrega
					}
				}).done( function(data){
					if (data == 1 || data == "1") {
						toastGeral("error", "Foi cancelada a confirmação da entrega!");

						var indiceImagem = document.getElementById("marcador_indice_"+codigoEntrega).value;
						var imagem = "img/"+arrayDeCores[0].cor+"/pacote_"+arrayDeCores[0].cor+"_"+indiceImagem+".png";

						document.getElementById("imagem_pacote_"+codigoEntrega).src = imagem;
						document.getElementById("buttonCofCan_"+codigoEntrega).innerHTML = retornaBotao("check", codigoEntrega);

						atualizarPacotes();
					} else {
						toastGeral("error", "Error ao confirmar entrega!");
					}
				});
			}
		}
	});
}

// 

// function deslogar(){
// 	html = "<button type=\"button\" class=\"btn btn-info btn-block\" data-toggle=\"modal\" data-target=\"#modalLogin\">";
//     html += "Login</button>"
//     html += "<input type=\"hidden\" name=\"id_usuario\" value=\"0\" id=\"id_usuario\">";
// 	document.getElementById("usuarioLogado").innerHTML = html;
// 	n_editar();
// 	$("#clique_me").click();
// 	if (document.getElementById('clique_me_2').checked) {
// 		$("#clique_me_2").click();
// 	}
// }