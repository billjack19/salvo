$('#formLogin').submit(function(e){        
	e.preventDefault();
	var identificador = $("#login").val();
	var senha = $("#password").val();

	$.ajax({
		type: 'GET',
		url: urlWebService+"UsuarioWs/autencicar/"+identificador+"/"+senha+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		var arrayJson = JSON.parse(data);
		if (arrayJson.length == 0) {
			$.toast({
				text: "Login ou senha incorretos!", 
				heading: 'Falha', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'bottom-left',
				extAlign: 'left',
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			for(i in arrayJson){
				var vendedor = arrayJson[i].vendedor;

				// Configuração de data
				var dataAtual = pegarData();

				// Montando o texto html a ser preenchido no cabaçario principal

				var nomeHiddenUsuario = "<input type='hidden' value='"+arrayJson[i].identificador+"' id='identificador' data-razaosocial='"+arrayJson[i].nome+"'>"

				// var cabecario_text_html = "<br><h2 class='text-center'>Página Principal</h2>";
				var cabecario_text_html = "<div class='col-md-12' style='margin-top:10px;'>";
				cabecario_text_html += "<table class='table' style='margin-bottom: -20px;'><tr><td colspan='2'>"
				
				cabecario_text_html += "<h4 style='margin-bottom:1px;margin-top:1px;'>"+arrayJson[i].identificador+":"+arrayJson[i].nome+"</h4>";
				// cabecario_text_html += "<input type='text' value='' class='form-control' disabled>";
				
				cabecario_text_html += "</td><tr></tr><td width='50%'>";
				
				// cabecario_text_html += "<h4>Data</h4>";
				cabecario_text_html += "<input type='date' id='dataPedido' value='"+dataAtual+"' class='form-control' onclick='montarListaPedsito()'>";
				
				cabecario_text_html += "</td><td width='50%'>";
				
				cabecario_text_html += "<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>";
				cabecario_text_html += "Listar";
				cabecario_text_html += "</button>";
				cabecario_text_html += "</div>";

				cabecario_text_html += "</td></tr></table>";
				// cabecario_text_html += "<hr>";
			}

			$("#vendedor").val(vendedor);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#cabecarioPrincipal").html(cabecario_text_html);
			montarListaPedsito();

			// Mensagem de sucesso da autenticação
			$.toast({
				text: "Você está logado!", 
				heading: 'Nota', 
				icon: 'info', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'bottom-left',
				extAlign: 'left',
				loader: true,
				loaderBg: '#44f'
			});
			// document.getElementById("rodapeDiv").style.opacity = "1";
			subirPagina();
		}
	});
	return false;
});

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