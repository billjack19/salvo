// Validação de dados do Itens ao Kit
function validacao(){
	if(document.form.adicionar_produto_desc.value == ''){
		alert("Por favor preencha o campo descrição do Produto!");
		document.form.adicionar_produto_desc.focus();
		return false;
	}
}