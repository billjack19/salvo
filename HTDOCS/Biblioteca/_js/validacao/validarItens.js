// Validação de dados do Itens ao Kit
function validacao(){
	if(document.form.select_equipamento.value == ''){
		alert("Selecione o equipamento a receber o item!");
		document.form.select_equipamento.focus();
		return false;
	}
	if (document.form.select_produto.value == '') {
		alert("Selecione o produto a ser adicionado!");
		document.form.select_produto.focus();
		return false;
	}	
	if (document.form.quantidade.value == '') {
		alert("Por favor peencha o campo com quantidade!");
		document.form.quantidade.focus();
		return false;	
	}
}