function trocaFotoProduto(selTag){
	var x = selTag.options[selTag.selectedIndex].text;
	var imagem = document.getElementById('fotoInterfase');
	var equipamento = document.getElementById('select_equipamento').value;

	if (equipamento == 'Kit 1') {
		if (x != '') {
		imagem.src='../../_imagens/produtos/kit1/'+x+'.jpg';
		// alert(x);
		}
		else imagem.src='../../_imagens/produtos/fundo.jpg';
	}

	else if (equipamento == 'Kit 2') {
		if (x != '') {
		imagem.src='../../_imagens/produtos/kit2/'+x+'.jpg';
		// alert(x);
		}
		else imagem.src='../../_imagens/produtos/fundo.jpg';
	}
	else imagem.src='../../_imagens/produtos/fundo.jpg';
}

function voltaImagem(documento){
	var x = documento.options[documento.selectedIndex].text;
	if (x == 'Kit 1') {
		document.getElementById('fotoInterfase').src='../../_imagens/produtos/kit.jpg';
		document.getElementById('select_produto').disabled = false;
		document.getElementById('select_produto').value = '';
	}
	else if (x == 'Kit 2') {
		document.getElementById('fotoInterfase').src='../../_imagens/produtos/kit.jpg';
		document.getElementById('select_produto').disabled = false;
		document.getElementById('select_produto').value = '';
	}
	else if (x == 'Sala de Video') {
		document.getElementById('fotoInterfase').src='../../_imagens/produtos/sala_de_video/sala de vdeo.jpg';
		document.getElementById('select_produto').disabled = true;
		document.getElementById('select_produto').value = '';
	}
	else {
		document.getElementById('fotoInterfase').src='../../_imagens/produtos/fundo.jpg';
		document.getElementById('select_produto').disabled = true;
		document.getElementById('select_produto').value = '';
	}
}
