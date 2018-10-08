$('#formLogin').submit(function(e){
	var msmErroLogin = "<span color:'red'>*</span>&nbsp;Se tiver demorando muito para logar verifique sua conecção com a rede,";
	msmErroLogin += " se o servidor está ligado e funcionado corretamente e se o endereço ip está correto!";
	$("#msmErrorLogin").val(msmErroLogin)
	e.preventDefault();
	var identificador = $("#login").val();
	var senha = $("#password").val();
	var dataLogada = pegarData();
	var conteudoArquivoTxt = identificador+","+senha+","+dataLogada;
	// console.log("conteudoArquivoTxt: "+conteudoArquivoTxt);

	logarSistema(identificador , senha);
	adicionarLogin(identificador , senha);
	// $.ajax({
	// 	type: 'GET',
	// 	url: "http://"+hostWebService+"/VendasCDI/alteraArquivo.php?arquivo=json/"+arquivoTXT+".txt&conteudo="+conteudoArquivoTxt,
	// 	contentType: "application/json",
	// 	jsonpCallback: "localJsonpCallback"
	// }).done( function(data){
	// 	// console.log(data);
	// });
});

function logarSistema(identificador , senha){
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
				position: 'top-right',
				extAlign: 'right',
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
				cabecario_text_html += "<input type='date' id='dataPedido' value='"+dataAtual+"' style='height: 50px;' class='form-control' onclick='montarListaPedsito()'>";
				
				cabecario_text_html += "</td><td width='50%'>";
				
				cabecario_text_html += "<button id='buttonAdicionaPedido' class='btn btn-primary btn-block' onclick='montarListaPedsito()'>";
				cabecario_text_html += "Listar";
				cabecario_text_html += "</button>";
				cabecario_text_html += "</div>";

				cabecario_text_html += "</td></tr></table>";
				// cabecario_text_html += "<hr>";
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
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});
			// document.getElementById("rodapeDiv").style.opacity = "1";
			subirPagina();
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
				// $.ajax({
				// 	type: 'GET',
				// 	url: "http://"+hostWebService+"/VendasCDI/alteraArquivo.php?arquivo=json/"+arquivoTXT+".txt&conteudo=0",
				// 	contentType: "application/json",
				// 	jsonpCallback: "localJsonpCallback"
				// }).done( function(data){
					// console.log(data);

				// if (data == "Arquivo atualizado.") {
				
				// }					
				// });
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