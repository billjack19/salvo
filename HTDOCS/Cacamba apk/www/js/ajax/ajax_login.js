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
			'autenticarMotorista': true,
			'usuario': identificador,
			'senha': senha
		}
	}).done( function(data){
		console.log("Login data: "+data);
		if (data == "") {
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
			var vetor = data.split("[]");
			var subvetor = [];
			console.log("vetor.length: "+vetor.length);
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");
				var id_motorista_param = subvetor[0];

				var nomeHiddenUsuario = "<input type='hidden' value='"+subvetor[1]+"' id='identificador' data-razaosocial='"+subvetor[3]+"'>"

				// var cabecario_text_html = "<br><h2 class='text-center'>Página Principal</h2>";
				var cabecario_text_html = "<div class='col-md-12' style='margin-top:10px;'>";
				cabecario_text_html += "<table class='table' style='margin-bottom: -20px;'><tr><td colspan='2'>"
				
				cabecario_text_html += "<h4 style='margin-bottom:1px;margin-top:1px;'>"+subvetor[1]+":"+subvetor[3]+"</h4>";
				// cabecario_text_html += "<input type='text' value='' class='form-control' disabled>";
				
				cabecario_text_html += "</td><tr></tr><td width='50%'>";
				
				// cabecario_text_html += "<h4>Data</h4>";
				// cabecario_text_html += "<input type='date' id='dataPedido' value='"+dataAtual+"' style='height: 50px;' class='form-control' onclick='montarListaPedsito()'>";
				
				// cabecario_text_html += "</td><td width='50%'>";
				
				// cabecario_text_html += "<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>";
				// cabecario_text_html += "Listar";
				// cabecario_text_html += "</button>";
				// cabecario_text_html += "</div>";

				cabecario_text_html += "</td></tr></table>";
				// cabecario_text_html += "<hr>";
				var botaoVoltarFixo = "<button class='btn btn-info' onclick='logoff();'>";
				botaoVoltarFixo += '<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;';
				botaoVoltarFixo += "Sair";
				botaoVoltarFixo += "</button>";
			}
			$("#editar").val(id_motorista_param);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#cabecarioPrincipal").html(cabecario_text_html);
			$("#botaoVoltarFixo").html(botaoVoltarFixo);
			// $("#botaoPesquisarFicha").html(botaoFichaFixo);

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

			montarListaCaminhaoVerifica(id_motorista_param);

			
			// document.getElementById("buttonChecarLocalização").style.opacity = "1";
			// subirPagina();
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
				removerLogin();
				location.reload();
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