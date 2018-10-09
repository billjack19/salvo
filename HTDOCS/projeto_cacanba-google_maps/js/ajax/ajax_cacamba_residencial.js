function adicionarCacambaSQL(latidude, logitude){
	var endereco = $("#modalEnderecoEndereco").val();
	var numero = $("#modalNumeroEndereco").val();
	var bairro = $("#modalBairroEndereco").val();
	var cidade = $("#modalCidadeEndereco").val();
	var uf = $("#comboUfModalEndereco").val();
	var cep = $("#modalCEPEndereco").val();
	var titulo = "";

	titulo += "Título: "+$("#modalTituloEndereco").val()+"\n";
	titulo += "Endereço: "+endereco+"\n";
	titulo += "Nº: "+numero+"\n";
	titulo += "Bairro: "+bairro+"\n";
	titulo += "Cidade: "+cidade+"\n";
	titulo += "UF: "+uf+"\n";
	titulo += "CEP: "+cep;


	$.ajax({
		url:'controllers/cacambaResidencialController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'endereco': endereco,
			'numero': numero,
			'bairro': bairro,
			'cidade': cidade,
			'uf': uf,
			'cep': cep,
			'titulo': titulo,
			'latidude': latidude,
			'logitude': logitude
		}
	}).done( function(data){
		// console.log("retorno do adicionarCacambaSQL: "+data);
		if (data == 0) {
			jk_toasth('error', "Erro ao adicionar Caçamba!");
		} else {
			jk_toasth('success', "Caçamba adicionado com sucesso!");
		}		
	});
}