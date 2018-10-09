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
		if (data == "") {
			jk_toasth('error', "Login ou senha incorretos!");
		} else {
			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				var nomeHiddenUsuario = "<input type='hidden' value='"+subvetor[1]+"' id='identificador' data-razaosocial='"+subvetor[3]+"' data-cnpj='"+subvetor[4]+"'>"
				var cabecario_text_html = "<h4 class='textoLog' style='margin-bottom:1px;margin-top:1px;'>"+subvetor[3]+"</h4>";
				var imagemLogoEmpresa = "<img src='empresa/"+subvetor[5]+"' width='100%'>"
			}

			$("#cabecarioPrincipal").html("");
			$("#loginUsuario").html("");
			$("#logoEmpresaLogada").html(imagemLogoEmpresa);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#usuarioLagadoView").html(cabecario_text_html);
			$("#usuarioLagadoView2").html(cabecario_text_html);

			document.getElementById("loginUsuario").className = "hidden";
			document.getElementById("divBotoesOperacoes").className = "text-right";

			menuPrincipal();

			document.getElementById("buttonBuscaSubRegiao").accessKey = "k";
			document.getElementById("buttonMostraSubRegiao").accessKey = "n";

			listarCacamba();
			listarCaminhao();
			listarCliente();

			temporalizadorAtualiza();

			navigator.geolocation.getCurrentPosition(showPosition);

			// Mensagem de sucesso da autenticação
			jk_toasth('info', "Você está logado!");
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