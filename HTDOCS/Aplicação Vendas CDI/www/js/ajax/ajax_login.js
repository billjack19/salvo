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
				var cabecario_text_html = "<div class='col-md-12' style='margin-top:10px;'>"
										+ 	"<table class='table' style='margin-bottom: -20px;'>"
										+		"<tr>"
										+			"<td colspan='2'>"
										+ 				"<h4 style='margin-bottom:1px;margin-top:1px;'>"
										+	 				arrayJson[i].identificador+":"+arrayJson[i].nome
										+				"</h4>"
										// + 	"<input type='text' value='' class='form-control' disabled>"
										+ 			"</td>"
										+		"</tr>"
										+		"<tr>"
										+			"<td width='50%'>"
										// + 			"<h4>Data</h4>"
										+ 				"<input type='date' id='dataPedido' value='"+dataAtual+"' style='height: 50px;' "
										+					"class='form-control' onclick='montarListaPedsito()'>"
										+ 			"</td>"
										+			"<td width='50%'>"
										+ 				"<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>"
										+ 					"Listar"
										+ 				"</button>"
										// + 			"</div>"
										+ 			"</td>"
										+		"</tr>"
										+	"</table>";
										// + "<hr>";
				var botaoVoltarFixo = "<button class='btn btn-info' onclick='logoff();'>";
				botaoVoltarFixo += '<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;';
				botaoVoltarFixo += "Sair";
				botaoVoltarFixo += "</button>";

				var botaoFichaFixo = "<button class='btn btn-warning' ";
				botaoFichaFixo += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha1\")'>";
				botaoFichaFixo += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
				botaoFichaFixo += "Ficha";
				botaoFichaFixo += "</button>";
			}
			$("#vendedor").val(vendedor);
			$("#hiddenUsuario").html(nomeHiddenUsuario);
			$("#cabecarioPrincipal").html(cabecario_text_html);
			$("#botaoVoltarFixo").html(botaoVoltarFixo);
			$("#botaoPesquisarFicha").html(botaoFichaFixo);
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