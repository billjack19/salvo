// Validação de dados do Funcionario
function validacao(){

	if(document.form.nome.value == ''){
		alert("O campo nome do funcionario não foi preenchido");
		document.form.nome.focus();
		return false;
	}
	if (document.form.cargo.value == '') {
		alert("Por favor insira o cargo do funcionario!");
		document.form.cargo.focus();
		return false;
	}
	if (document.form.sexo.value == '1') {
		alert("Selecione o sexo!");
		document.form.sexo.focus();
		return false;
	}
	if (document.form.cpf.value.length < 14) {
		alert("Por favor preencha o campo cpf do funcionario corretamente!");
		document.form.cpf.focus();
		return false;
	}
	if (document.form.data_nascimento.value == 'Send') {
		alert("Por favor insira a data de nascimento do funcionario!");
		document.form.data_nascimento.focus();
		return false;	
	}
	if (document.form.telefone.value == '') {
		alert("Por favor coloque o telefone do aluno!");
		document.form.telefone.focus();
		return false;
	}
	if (document.form.turno.value == '') {
		alert("Selecione o turno!");
		document.form.turno.focus();
		return false;
	}
	if (document.form.masp.value == '') {
		alert("Por favor peencha o campo masp do funcionario!");
		document.form.masp.focus();
		return false;
	}
	if (document.form.cep.value.length < 9) {
		alert("Por favor preencha o campo cep do funcionario corretamente!!");
		document.form.cep.focus();
		return false;
	}
	if (document.form.bairro.value == '') {
		alert("Por favor peencha o campo bairro do funcionario!");
		document.form.bairro.focus();
		return false;
	}
	if (document.form.cidade.value == '') {
		alert("Por favor peencha o campo cidade do funcionario!");
		document.form.cidade.focus();
		return false;	
	}
	if (document.form.estado.value == '') {
		alert("Por favor peencha o campo uf do funcionario!");
		document.form.estado.focus();
		return false;	
	}
	if (document.form.endereco.value == '') {
		alert("Por favor peencha o campo endereco do funcionario!");
		document.form.endereco.focus();
		return false;	
	}
	if (document.form.numero_end.value == '') {
		alert("Por favor peencha o campo numero do funcionario!");
		document.form.numero_end.focus();
		return false;	
	}
	
	if (document.form.complemento_end.value == '') {
		document.form.complemento_end.value = '';
	}
	if (document.form.rg.value.length < 10) {
		document.form.rg.value = '';
	}
	if (document.form.email.value == '') {
		document.form.email.value = '';
	}
	if (document.form.email.value.indexOF('@')==-1) {
		document.form.email.value = '';
	}
	if (document.form.email.value.indexOF('.')==-1) {
		document.form.email.value = '';
	}
}