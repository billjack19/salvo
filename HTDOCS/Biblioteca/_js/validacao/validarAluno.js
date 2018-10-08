// Validação de dados do Aluno
function validacao(){

	if(document.form.nome.value == ''){
		alert("O campo nome do aluno não foi preenchido");
		document.form.nome.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else if (document.form.matricula.value == '') {
		alert("Por favor peencha o campo da matricula do aluno!");
		document.form.matricula.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}	
	else if (document.form.data_nascimento.value == 'Send') {
		alert("Por favor insira a data de nascimento do aluno!");
		document.form.data_nascimento.focus();
		document.getElementById('aceita').value = 'n';
		return false;	
	}
	else if (document.form.sexo.value == '1') {
		alert("Selecione o sexo!");
		document.form.sexo.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else if (document.form.turno.value == '') {
		alert("Selecione o turno!");
		document.form.turno.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else if (document.form.ano.value == 'null') {
		alert("Selecione o ano!");
		document.form.ano.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else if (document.form.sala.value == 'null') {
		alert("Selecione o sala!");
		document.form.sala.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else if (document.form.turma.value == '') {
		alert("Por favor preencha a turma do aluno!");
		document.form.turma.focus();
		document.getElementById('aceita').value = 'n';
		return false;	
	}
	else if (document.form.telefone.value == '') {
		alert("Por favor coloque o telefone do aluno!");
		document.form.telefone.focus();
		document.getElementById('aceita').value = 'n';
		return false;
	}
	else document.getElementById('aceita').value = 's';
	// if (document.form.cpf.value.length < 14) {
	// 	document.form.cpf.value = '';
	// }
	// if (document.form.rg.value.length < 10) {
	// 	document.form.rg.value = '';
	// }
	// if (document.form.email.value == '') {
	// 	document.form.email.value = '';
	// }
	// if (document.form.email.value.indexOF('@')==-1) {
	// 	document.form.email.value = '';
	// }
	// if (document.form.email.value.indexOF('.')==-1) {
	// 	document.form.email.value = '';
	// }
}