// Validação de dados do Livro
function validacao(){
	if(document.form.nome.value == ''){
		alert("O campo nome do livro não foi preenchido");
		document.form.nome.focus();
		return false;
	}
	if (document.form.codigo.value == '') {
		alert("Por favor peencha o campo do codigo do livro!");
		document.form.codigo.focus();
		return false;
	}	
	if (document.form.tema.value == '') {
		alert("Selecione o tema do livro!");
		document.form.tema.focus();
		return false;	
	}
	if (document.form.autor.value == '') {
		alert("Por favor peencha o campo do autor!");
		document.form.autor.focus();
		return false;
	}
	if (document.form.isbn.value.length < 17) {
		alert("Por favor peencha o isbn corretamente!");
		document.form.isbn.focus();
		return false;
	}
	if (document.form.tema.value == 'Didático' && document.form.ano.value == 'null') {
		alert("Selecione o ano!");
		document.form.ano.focus();
		return false;
	}
	if (document.form.tema.value == 'Didático' && document.form.materias.value == 'null') {
		alert("Selecione a matéria do livro!");
		document.form.materias.focus();
		return false;	
	}
	if (document.form.tema.value == 'Dicionario' && document.form.idioma.value == '') {
		alert("Selecione o idioma do dicionario!");
		document.form.idioma.focus();
		return false;
	}
	if (document.form.prazo.value == '') {
		alert("Por favor coloque o prazo do livro!");
		document.form.prazo.focus();
		return false;
	}
}