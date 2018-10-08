// IP do Web Service
var hostWebService = "192.168.100.9";
hostWebService = "localhost";

// IP das Imagens do servidor
var hostServeImage = "192.168.100.9";
hostServeImage = "localhost";

var portaWebService = ":8080";
var portaImgService = "8088";
var caminhoWebService = "/MigracaoCDI/webresources/";
var urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
var parametrosWebService = "?tagmode=any&jsoncallback=?";

var sql = "";


var contTabelas = 0;
var contTabelaAtual = 0;
var contTabelaAtualR = 0;

var arrayTabelas = [];
var arrayColunas = [];

function chamarSetarConexao(){
	var id = $("#registro_id").val();

	var ServerName = document.getElementById("ServerName"+id).value;
	ServerName.replace(/\\/g, '\\\\\\');
	var Port_Number = document.getElementById("Port_Number"+id).value;

	var nameDadabaseMigration = $("#nameDadabaseMigration").val();
	arrayDadabaseMigration = nameDadabaseMigration.split("+");
	nameDadabaseMigration = arrayDadabaseMigration[1];
	var basedados_id = arrayDadabaseMigration[0];

	console.log("id: "+id);
	console.log("ServerName: "+ServerName);
	console.log("Port_Number: "+Port_Number);
	console.log("nameDadabaseMigration: "+nameDadabaseMigration);


	var dataAtual = new Date();

	var dia = dataAtual.getDate();
	dia = verificaDezena(dia);
	var mes = dataAtual.getMonth();
	mes = parseInt(mes) + 1;
	mes = verificaDezena(mes);
	var ano = dataAtual.getFullYear();
	var hora = dataAtual.getHours();
	hora = verificaDezena(hora);
	var minuto = dataAtual.getMinutes();
	minuto = verificaDezena(minuto);
	var segundo = dataAtual.getSeconds();
	segundo = verificaDezena(segundo);

	dataAtual = dia + "/" + mes + "/" + ano + " " + hora + ":" + minuto + ":" + segundo;

	$.ajax({
		url:'app/controllers/setarConfigConexao.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'ServerName': ServerName,
			'Port_Number': Port_Number,
			'nameDadabaseMigration': nameDadabaseMigration,
			'descricao_status': dataAtual,
			'basedados_id': basedados_id,
			'id_status': 1
		}
	}).done( function(data){
		console.log("data");
		console.log(data);
		console.log(dataAtual);
		document.getElementById("descricao_status_span").innerHTML = dataAtual;
	});

}


function carregarEstrutura(){
	sql = "";
	var ListaTabelas = "<table>";
	$("#carregando").html("Carregando...");

	var tabela = "";

	var descTabelas = "";
	var descColunas = "";


	$.ajax({
		type: 'GET',
		url: urlWebService+"MigracaoWS/listarTabelas"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			alert("Nenhuma tabela encontrada");
		} else {
			for(i in data){
				$("#carregando").html("Carregando Tabelas...");
				tabela = data[i].descricao;
				arrayTabelas.push(tabela);
				complementoTabelaColuna(tabela);

				ListaTabelas += "<tr>";
				ListaTabelas += "	<td>"+tabela+"</td>";
				ListaTabelas += "	<td><button onclick='carregarRegistro(\""+tabela+"\", "+contTabelas+")'>Selecionar</button></td>";
				ListaTabelas += "	<td><span id='descRegistro_"+tabela+"'></span></td>";
				ListaTabelas += "</tr>";
				contTabelas++;
			}
			$("#carregando").html("Carregou Todas as Tabelas!<br>Carregando Colunas...");
		}
		ListaTabelas += "</table>";
		$("#listaTabelas").html(ListaTabelas);
	});
}


function complementoTabelaColuna(tabela){
	var coluna = "";

	var NOT_NULL = "";
	var DEFAULT_NULL = "";
	var TIPO = "";

	var tipoDefinito = "";

	var colunasString = "";

	var contColuna = "";
	$.ajax({
		type: 'GET',
		url: urlWebService+"MigracaoWS/listarColunas/"+tabela+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data2){
		contTabelaAtual++;
		$("#colunaAtual").html(contTabelaAtual+" / "+contTabelas);

		if (data2.length == 0) {
			console.log("Nemnhuma coluna encontrada nesta tabela: "+tabela);
		} else {
			colunasString = "";
			sql += "DROP TABLE IF EXISTS `"+tabela+"`;"
			sql += "\nCREATE TABLE "+tabela+" ("
			for(j in data2){
				// $("#carregando").html("Carregando...");
				$("#descTabelas").html("Tabela Atual: "+tabela);
				if (data2[j].is_null == "NO") {
					NOT_NULL = "NOT NULL";
					DEFAULT_NULL = "";
				} else {
					NOT_NULL = "";
					DEFAULT_NULL = "DEFAULT NULL";
				}


				// verificação de tipo
				switch (data2[j].tipo) {
					case "money": 				TIPO = "float"; break;
					case "smalldatetime": 		TIPO = "datetime"; break;
					case "image": 				TIPO = "varchar"; break;
					case "ntext": 				TIPO = "text"; break;
					case "nvarchar": 			TIPO = "varchar"; break;
					case "bit": 				TIPO = "int(1)"; break;
					case "nchar": 				TIPO = "char"; break;
					case "uniqueidentifier": 	TIPO = "varchar(500)"; break;
					default :					TIPO = data2[j].tipo;
				}


				if (data2[j].tamanho == 0) {
					tipoDefinito = TIPO;
				} else {
					if (data2[j].tamanho > 255 && TIPO == "char") {
						// tipoDefinito = "varchar("+data2[j].tamanho+")";
						tipoDefinito = "text";
					} else {
						tipoDefinito = TIPO+"("+data2[j].tamanho+")";
					}
				}

				if (contColuna == 0) {
					sql += "\n	`"+data2[j].descricao+"` "+tipoDefinito+" "+NOT_NULL+"  "+DEFAULT_NULL+"";
					colunasString += ""+data2[j].descricao;
				} else {
					sql += ", \n	`"+data2[j].descricao+"` "+tipoDefinito+" "+NOT_NULL+"  "+DEFAULT_NULL+"";
					colunasString += ", "+data2[j].descricao;
				}
				contColuna++;
			}
			arrayColunas.push(colunasString);
			sql += "\n) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n\n\n";
			if (contTabelaAtual == contTabelas) {
				$("#carregando").html("Carregado com Sucesso!");
			}
		}
	});
}




function carregarRegistro(tabela, indice){
	indice = parseInt(indice) - 1;
	$("#carregando").html("Carregando Registros...");
	var descricao = "";
	var descricaoCompleta = "";
	var contRegistroAtuais = "";
	var mandarTabela = "";
	document.getElementById("descRegistro_"+tabela).innerHTML = "Carregando...";

	var registroSql = "";

	$.ajax({
		type: 'GET',
		url: urlWebService+"MigracaoWS/listarRegistros/"+tabela+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data2){
		contTabelaAtualR++;
		$("#colunaAtual").html(contTabelaAtualR+" / "+contTabelas);

		if (data2.length == 0) {
			console.log("Nemnhuma registro encontrado nesta tabela: "+tabela);
			registroSql = "-- Nenhum registro encontrado netqa tabela: "+tabela;
			salvarRegistro(registroSql, tabela, "w");
		} else {
			registroSql = "\nTRUNCATE "+tabela+";"; // 	("+arrayColunas[indice]+") \n
			salvarRegistro(registroSql, tabela, "w");
			for(k in data2){
				

				descricao = data2[k].descricao;
				descricao = descricao.split("[/]");

				for (var l = 0; l < descricao.length; l++) {
					descricao[l] = descricao[l].replace("\"", "''");// 1
					descricao[l] = descricao[l].replace("\"", "''");// 2
					descricao[l] = descricao[l].replace("\"", "''");// 3
					descricao[l] = descricao[l].replace("\"", "''");// 4
					descricao[l] = descricao[l].replace("\"", "''");// 5
					descricao[l] = descricao[l].replace("\"", "''");// 6
					descricao[l] = descricao[l].replace("\"", "''");// 7
					descricao[l] = descricao[l].replace("\"", "''");// 8
					descricao[l] = descricao[l].replace("\"", "''");// 9
					descricao[l] = descricao[l].replace("\"", "''");// 10
					if (l == 0) {
						descricaoCompleta = "\nINSERT INTO "+tabela+" VALUES (\""+descricao[l]+"\"";
						mandarTabela = tabela;
					} else {
						descricaoCompleta += ", \""+descricao[l]+"\"";
					}
				}

				// if (contRegistroAtuais == 0) {
					registroSql = descricaoCompleta+");";
					salvarRegistro(registroSql, mandarTabela, "a");
				// } else {
					// registroSql = ", "+descricaoCompleta+")";
					// salvarRegistro();
				// }
				// contRegistroAtuais++;
			}
			// salvarRegistro();
		}
		document.getElementById("descRegistro_"+tabela).innerHTML = "OK";
		if (contTabelaAtualR == contTabelas) {
			$("#carregando").html("Carregado com Sucesso!");
		}
	});

			
	// 	}
	// }
}

function gerarEstrutura(){
	var arrayDB = $("#nameDadabaseMigration").val();
	arrayDB = arrayDB.split("+");
	$.ajax({
		url:'app/controllers/criarSQL.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'arquivo': arrayDB[1],
			'sql': sql
		}
	}).done( function(data){
		console.log("data");
		console.log(data);
	});
}

function salvarRegistro(registroSql, tabela, operacao){
	var arrayDB = $("#nameDadabaseMigration").val();
	arrayDB = arrayDB.split("+");
	$.ajax({
		url:'app/controllers/criarSQL_Registros.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'arquivo': arrayDB[1],
			'sql': registroSql,
			'tabela': tabela,
			'op': operacao
		}
	}).done( function(data){
		console.log("data");
		console.log(data);
	});
}

function verificaDezena(valor){
	return valor < 10 ? "0" + valor : valor;
}

/* AJAX TIPOS -- 
$.ajax({
	url:'Componetes/cadastro_Controller.php',
	type: 'POST',
	dataType: 'html',
	data: {
		'nomeTabela': nomeTabela,
		'id_tabela': id_tabela,
		'colunas': colunas,
		'projetoNome': projetoNome
	}
}).done( function(data){});



var lancPedidoIdObject = { 
		"filial": filial, 
		"documento": documento, 
		"sequencia": sequecia,
		"item": item,
		"quantidade": quantidade, 
		"valorUnitario": valorUnitario, 
		"valorTotal": valorTotal,
		"grupoItem" : grupo,
		"subGrupoItem": subGrupo,
		"unidadeMedida": unidadeMedida,
		"adicionalProduto": complemeto
	};
$.ajax({
	type: 'POST',
	cache: false,
	url: urlWebService+"ItemWs/inserir",
	dataType: "json",
	contentType: "application/json; charset=utf-8",
	data: JSON.stringify(lancPedidoIdObject)
}).done( function(data){});





$.ajax({
	type: 'GET',
	url: urlWebService+"ItemWs/retornaSeguencia/"+filial+"/"+documento+parametrosWebService,
	contentType: "application/json",
	jsonpCallback: "localJsonpCallback"
}).done( function(data){});

*/