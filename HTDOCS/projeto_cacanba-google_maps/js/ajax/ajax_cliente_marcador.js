function listarCliente(){
	var filtro = document.getElementById("filtro_cliente").checked;
	if (filtro) {

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
		var bool_ativo = "";

		$.ajax({
			url:'controllers/funcoes_clienteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_cliente': true,
				'cnpj': $("#identificador").data("cnpj")
			}
		}).done( function(data){
			if (data == "") {} 
			else {
				var vetor = data.split("[]");
				var subvetor = [];
				for (var i = 0; i < vetor.length; i++) {
					subvetor = vetor[i].split(",");

					id_cliente = 		subvetor[0];
					razao_social = 		subvetor[1];
					endereco_cliente = 	subvetor[2];
					numero_cliente = 	subvetor[3];
					bairro_cliente = 	subvetor[4];
					cidade_cliente = 	subvetor[5];
					uf_cliente = 		subvetor[6];
					cep_cliente = 		subvetor[7];
					latidude_cliente = 	subvetor[8];
					longitude_cliente = subvetor[9];
					bool_ativo = 		subvetor[10];

					if (bool_ativo == 1) {
						adicionarClientes(latidude_cliente , longitude_cliente, razao_social, id_cliente);
					}
				}
			}
		});
	}
}


function atualizaCliente(){
	removerClientes();
	Clientes = [];
	listarCliente();
}