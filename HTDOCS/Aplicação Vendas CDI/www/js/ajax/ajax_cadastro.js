$('#formCadastro').submit(function(e){        
	e.preventDefault();
	nome = $("#nome").val();
	login = $("#login").val();
	senha = $("#password").val();
	confg_password = $("#confg_password").val();

	if (senha == confg_password) {
		user = { "nome": nome, "login": login, "senha": senha}
		$.ajax({
			type: 'POST',
			cache: false,
			url: urlWebService+"jogador/inserir",
			dataType: "json",
			contentType: "application/json; charset=utf-8",
			data: JSON.stringify(user)
		}).done( function(data){
			if (data) {
				$.toast({
					text: "Cadastrado com sucesso!", 
					heading: 'Nota', 
					icon: 'success', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'bottom-left',
					extAlign: 'left',
					loader: true,
					loaderBg: '#44f'
				});
				$("#nome").val("");
				$("#login").val("");
				$("#password").val("");
				$("#confg_password").val("");
				listaJogador();
			} else {
				$.toast({
					text: "Falha ao cadastrar!", 
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
			}
		});
	} else {
		$.toast({
			text: "Senha incorreta!", 
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
	}
	return false;
});

function listarJogadoresEditar(){
	var jogadoresListados ="";

	for (var i = arrayJogadores.length - 1; i >= 0; i--) {
		jogadoresListados += "<table class='table'>"
						+ 		"<tr>"
						+			"<td>"
						+ 				$("#nomeJogador"+arrayJogadores[i]).html()
						+ 			"</td>"
						+			"<td class='text-right'>"
						+				"<a href='#!editar_cadastro' data-id='"+arrayJogadores[i]+"' onclick='editar(this)'>"
						+ 					"<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>"
						+ 				"</a>"
						+ 			"</td>"
						+ 		"</tr>"
						+	"</table>";
	}
	document.getElementById("jogadoresEditar").innerHTML = jogadoresListados;
}

$('#formEditarCadastro').submit(function(e){
	e.preventDefault();
	id = $("#editar").val();
	nome = $("#nome").val();
	user = {"id": id , "nome": nome}
	$.ajax({
		type: 'PUT',
		cache: false,
		url: urlWebService+"jogador/atualizar",
		dataType: "json",
		contentType: "application/json; charset=utf-8",
		data: JSON.stringify(user)
	}).done( function(data){
		if (data) {
			$.toast({
				text: "Alterado com sucesso!", 
				heading: 'Nota', 
				icon: 'success', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'bottom-left',
				extAlign: 'left',
				loader: true,
				loaderBg: '#44f'
			});
			listaJogador();
		} else {
			$.toast({
				text: "Falha ao alterar!", 
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
		}
	});
	return false;
});