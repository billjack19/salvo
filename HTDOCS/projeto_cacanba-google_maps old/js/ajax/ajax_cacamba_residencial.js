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
			$.toast({
				text: "Erro ao adicionar Caçamba!", 
				heading: 'Aviso', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: toast_position,
				extAlign: toast_extAlign,
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			$.toast({
				text: "Caçamba adicionado com sucesso!", 
				heading: 'Nota', 
				icon: 'success', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: toast_position,
				extAlign: toast_extAlign,
				loader: true,
				loaderBg: '#44f'
			});
		}		
	});
}