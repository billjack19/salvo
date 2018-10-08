// Validação de dados do Itens ao Kit
function validacao(){
	if(document.form.nome.value == ''){
		alert("Selecione o nome a receber o item!");
		document.form.nome.focus();
		return false;
	}
}