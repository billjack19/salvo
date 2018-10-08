function gerarController(){
	var id_tabela = "";
	var colunas = "";
	var filtroArray = "";
	var contColunas = 0;

	var chaves = document.getElementsByName("chavePri");
	var colunasArray = document.getElementsByName("colunasTabela");
	var nomeTabela = document.getElementById("nomeTabela").innerHTML;
	var projetoNome = document.getElementById("nomeProjeto").innerHTML;

	for (var i = 0; i < chaves.length; i++) {
		// console.log("chaves[i].value: "+colunasArray[i].innerHTML);
		if (chaves[i].checked) {
			id_tabela = colunasArray[i].innerHTML;
			i = chaves.length;
		}
	}


	for (var i = 0; i < colunasArray.length; i++) {
		// if (colunasArray[i].innerHTML != id_tabela) {
			contColunas++;
			if (contColunas == 1) {
				colunas += colunasArray[i].innerHTML;	
			} else {
				colunas += ","+colunasArray[i].innerHTML;
			}
		// }
	}
	// var colunasCadastroPost = colunas;


	var obj = {
			"id_tabela": id_tabela,
			"colunas": colunas,
			"nomeTabela": nomeTabela,
			"projetoNome": projetoNome
		};
	console.log("obj");
	console.log(obj);

	$.ajax({
		url:'Componetes/funcoes_Controller.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'nomeTabela': nomeTabela,
			'id_tabela': id_tabela,
			'colunas': colunas,
			'filtroArray': filtroArray,
			'projetoNome': projetoNome
		}
	}).done( function(data){
		console.log("data: "+data);
	});
}