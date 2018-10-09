$('#formLogin').submit(function(e){        
	e.preventDefault();
	var identificador = $("#login").val();
	var senha = $("#password").val();
	var cnpj = $("#cnpj_login").val();

	$.ajax({
		url:'controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'autenticarUsuario': true,
			'usuario': identificador,
			'senha': senha,
			'cnpj': cnpj
		}
	}).done( function(data){
	// $.ajax({
	// 	type: 'GET',
	// 	url: urlWebService+"UsuarioWs/autencicar/"+identificador+"/"+senha+parametrosWebService,
	// 	contentType: "application/json",
	// 	jsonpCallback: "localJsonpCallback"
	// }).done( function(data){
		if (data == "") {
			$.toast({
				text: "Login ou senha incorretos!", 
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
		} else {
			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				// Configuração de data
				// var dataAtual = pegarData();
				var nomeHiddenUsuario = "<input type='hidden' value='"+subvetor[1]+"' id='identificador' data-razaosocial='"+subvetor[3]+"' data-cnpj='"+subvetor[4]+"'>"
				// var cabecario_text_html = "<div class='col-md-12' style='margin-top:10px;'>";
				// cabecario_text_html += "<table class='table' style='margin-bottom: -20px;'><tr><td colspan='2'>"
				var cabecario_text_html = "<h4 class='textoLog' style='margin-bottom:1px;margin-top:1px;'>"+subvetor[3]+"</h4>";

				var imagemLogoEmpresa = "<img src='empresa/"+subvetor[5]+"' width='100%'>"
				
				// cabecario_text_html += "<input type='text' value='' class='form-control' disabled>";
				// cabecario_text_html += "</td><tr></tr><td width='50%'>";
				// // cabecario_text_html += "<h4>Data</h4>";
				// cabecario_text_html += "<input type='date' id='dataPedido' value='"+dataAtual+"' style='height: 50px;' class='form-control' onclick='montarListaPedsito()'>";
				// cabecario_text_html += "</td><td width='50%'>";
				// cabecario_text_html += "<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>";
				// cabecario_text_html += "Listar";
				// cabecario_text_html += "</button>";
				// cabecario_text_html += "</div>";
				// cabecario_text_html += "</td></tr></table>";
			}

			$("#logoEmpresaLogada").html(imagemLogoEmpresa);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#usuarioLagadoView").html(cabecario_text_html);
			$("#usuarioLagadoView2").html(cabecario_text_html);

			document.getElementById("loginUsuario").className = "hidden";
			document.getElementById("divBotoesOperacoes").className = "text-right";

			// Setar Atributo Global
			document.getElementById("buttonCliente").accessKey = "c";
			document.getElementById("buttonCaminhao").accessKey = "t";
			document.getElementById("buttonMotorista").accessKey = "m";
			document.getElementById("buttonAtualizar").accessKey = "u";
			document.getElementById("buttonCacambaResidencial").accessKey = "r";
			document.getElementById("buttonCacambaCliente").accessKey = "g";
			document.getElementById("buttonCacambaCadastro").accessKey = "q";


			document.getElementById("linha_cliente").accessKey = "1";
			document.getElementById("linha_cacamba_cinza").accessKey = "2";
			document.getElementById("linha_cacamba_vermelha").accessKey = "3";
			document.getElementById("linha_cacamba_verde").accessKey = "4";
			document.getElementById("linha_caminhao").accessKey = "5";

			document.getElementById("buttonBuscaSubRegiao").accessKey = "k";
			document.getElementById("buttonMostraSubRegiao").accessKey = "n";

			// document.getElementById("regiaoInputList").accessKey = "h";
			// document.getElementById("subRegiaoInputList").accessKey = "j";

			listarCacamba();
			listarCaminhao();
			listarCliente();

			temporalizadorAtualiza();
			
			// if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			// }
			



			// document.getElementById("cabecarioFiltro").className = "cabecarioFiltro";
			// document.getElementById("conteudoMapa").className = "";

			// $("#botaoVoltarFixo").html(botaoVoltarFixo);
			// $("#botaoPesquisarFicha").html(botaoFichaFixo);
			// montarListaPedsito();

			// Mensagem de sucesso da autenticação
			$.toast({
				text: "Você está logado!", 
				heading: 'Nota', 
				icon: 'info', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: toast_position,
				extAlign: toast_extAlign,
				loader: true,
				loaderBg: '#44f'
			});
			// document.getElementById("rodapeDiv").style.opacity = "1";
			subirPagina();
		}
	});
	return false;
});

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
				location.reload();
			}
		}
	});	
}

function showPosition(position) {
	map.setCenter({lat: position.coords.latitude, lng: position.coords.longitude});
	map.setZoom(14);
}