function adicionarCacambaClienteSQL(){
	var titulo = "";
	var id = $("#clienteInputList").val();

	if (id != 0 && id != "") {		
		var id_cliente = "";
		var razao_social = "";
		var endereco_cliente = "";
		var numero_cliente = "";
		var bairro_cliente = "";
		var cidade_cliente = "";
		var uf_cliente = "";
		var cep_cliente = "";
		var latidude_cliente = "";
		var longitude_cliente = "";
		var telaCadastroCliente = "";
		var bool_ativo = "";

		$.ajax({
			url:'controllers/funcoes_clienteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_cliente_id': true,
				'id': id
			}
		}).done( function(data){
			var vetor = data.split(",");

			id_cliente = 		vetor[0];
			razao_social = 		vetor[1];
			endereco_cliente = 	vetor[2];
			numero_cliente = 	vetor[3];
			bairro_cliente = 	vetor[4];
			cidade_cliente = 	vetor[5];
			uf_cliente = 		vetor[6];
			cep_cliente = 		vetor[7];
			latidude_cliente = 	vetor[8];
			longitude_cliente = vetor[9];
			bool_ativo = 		vetor[10];

			titulo += "Razão Social: "+razao_social+"\n";
			titulo += "Endereço: "+endereco_cliente+"\n";
			titulo += "Nº: "+numero_cliente+"\n";
			titulo += "Bairro: "+bairro_cliente+"\n";
			titulo += "Cidade: "+cidade_cliente+"\n";
			titulo += "UF: "+uf_cliente+"\n";
			titulo += "CEP: "+cep_cliente;

			$.ajax({
				url:'controllers/cacambaClienteController.php',
				type: 'POST',
				dataType: 'text',
				data: {
					'id_consumidor': id_cliente,
					'titulo': titulo,
					'latidude': latidude_cliente,
					'logitude': longitude_cliente
				}
			}).done( function(data){
				console.log("retorno do adicionarCacambaSQL: "+data);
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
					atualizaCacamba();
					document.getElementById("fecharModalCacambaCliente").click();
				}		
			});
		});
	}	
}