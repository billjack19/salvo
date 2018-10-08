
$(document).ready(function(){
	var id_usuario = "";
	var nome_usuario = "";
	var login_usuario = "";
	var senha_usuario = "";
	var bool_ativo_usuario = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});


	$.ajax({
		url:'app/controllers/funcoes_usuarioController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_usuario_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_usuario = vetor[0];
		
		nome_usuario = vetor[1];
		login_usuario = vetor[2];
		senha_usuario = vetor[3];
		bool_ativo_usuario = vetor[4];
		
		$("#nome_usuario").val(nome_usuario);
		$("#login_usuario").val(login_usuario);
		$("#senha_usuario").val(senha_usuario);
		$("#bool_ativo_usuario").val(bool_ativo_usuario);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/atualiza_usuarioController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_usuario': $("#editar").val(),
				'nome_usuario': $("#nome_usuario").val(),
				'login_usuario': $("#login_usuario").val(),
				'senha_usuario': $("#senha_usuario").val(),
				'bool_ativo_usuario': $("#bool_ativo_usuario").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Atualizar!");
			else 								toast.success("Atualizado com sucesso!");
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}

function validation(valor){
	if (valor == "") 	return false;
	else 				return true;
}
