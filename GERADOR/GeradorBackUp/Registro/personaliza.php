<?php

require_once "app/classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$descricao_status = "";
$id_baseDados = 0;
$Id_SQL = 0;


$sql = "	SELECT s.descricao_status, bd.descricao_baseDados, se.Id_SQL 
			FROM status s 
			INNER JOIN basedados bd ON s.basedados_id = bd.id_baseDados 
			INNER JOIN regitros se ON bd.regitros_id = se.Id_SQL";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricao_status = $dados['descricao_status'];
	$descricao_baseDados = $dados['descricao_baseDados'];
	$Id_SQL = $dados['Id_SQL'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Personalizado</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<?php include "app/componentes/header.php" ?>

	<center>
		<h1>Personalizado</h1>
		<input type="text" id="nomeBD" value="<?php echo $descricao_baseDados; ?>" disabled><br><br>
		<div id="carregando"></div>
		<div id="colunaAtual"></div>
		<div id="descTabelas"></div>
		<div id="listaTabelas"></div><br>
		<button onclick="trazerColunas()">Verificar</button>
		<button onclick="carregarColunas()">Carregar Estrutura</button>
		<button onclick="selecionarTodos()">Selecionar Todos</button>
		<button onclick="deselecionarTodos()">Deselecionar Todos</button>
		<button onclick="limparDivLord()">Limpar</button>
		<div id="colunasTable"></div>
	</center>
<script type="text/javascript">
	// IP do Web Service
	var hostWebService = "192.168.100.9";

	// IP das Imagens do servidor
	var hostServeImage = "192.168.100.9";

	var portaWebService = ":8080";
	var portaImgService = "8088";
	var caminhoWebService = "/MigracaoCDI/webresources/";
	var urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
	var parametrosWebService = "?tagmode=any&jsoncallback=?";

	var numRegistros = 0;
	var numRegistrosLord = 0;


	function limpar(){
		$("#carregando").html("");
		$("#colunaAtual").html("");
		$("#descTabelas").html("");
	}
	carregarEstrutura();
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
				var inputTabelas =  "Tabelas: <input type=\"text\" name=\"tabela\" id=\"tabela\" list=\"tabelasList\" required>";
				inputTabelas += "<datalist id=\"tabelasList\">";
					
				for(i in data){
					$("#carregando").html("Carregando Tabelas...");
					tabela = data[i].descricao;
					inputTabelas += "<option value='"+tabela+"'>";
				}
				inputTabelas += "</datalist>";
				// $("#carregando").html("Carregou Todas as Tabelas!<br>Carregando Colunas...");
				$("#carregando").html("");
				$("#listaTabelas").html(inputTabelas);
			}
		});
	}

	function trazerColunas(){
		var tabela = $("#tabela").val();
		var coluna = "";
		var NOT_NULL = "";
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

			if (data2.length == 0) {
				console.log("Nemnhuma coluna encontrada nesta tabela: "+tabela);
			} else {
				colunasString = "<h2>Colunas</h2><table border='1' class='table'>";

				colunasString += "<tr>";
				colunasString += "<td>Descricao</td>";
				// colunasString += "<td>Descricao SQL</td>";
				colunasString += "<td align='center'>Selecionar</td>";
				colunasString += "<td align='center'>Chave</td>";
				colunasString += "</tr>";
				// sql += "DROP TABLE IF EXISTS `"+tabela+"`;"
				// sql += "\nCREATE TABLE "+tabela+" ("
				for(j in data2){
					$("#carregando").html("Carregando...");
					// $("#descTabelas").html("Tabela Atual: "+tabela);
					if (data2[j].is_null == "NO") 	NOT_NULL = "NOT NULL";
					else 							NOT_NULL = "DEFAULT NULL";
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
							tipoDefinito = "text";
						} else {
							tipoDefinito = TIPO+"("+data2[j].tamanho+")";
						}
					}
					colunasString += "<tr style='background-color: #f0ad4e;color: #fff;'>";

					colunasString += "<td align='left' id='linhaDescColuna_"+data2[j].descricao+"' ";
					colunasString += 	"onclick='mudaStatus(\""+data2[j].descricao+"\")'";
					colunasString += ">";
					colunasString += 	"<div id='divDescColuna_"+data2[j].descricao+"'>";
					colunasString += 		data2[j].descricao;
					colunasString += 	"</div>";
					colunasString += "</td>";

					colunasString += "<td align='left' class='hidden' id='linhaDesc_"+data2[j].descricao+"' ";
					colunasString += 	"onclick='mudaStatus(\""+data2[j].descricao+"\")'";
					colunasString += ">";
					colunasString += 	"<div id='estruturaColuna_"+data2[j].descricao+"'>";
					colunasString += 		"`"+data2[j].descricao+"` "+tipoDefinito+" "+NOT_NULL;
					colunasString += 	"</div>";
					colunasString += "</td>";

					colunasString += "<td align='center' id='linhaCheck_"+data2[j].descricao+"' ";
					colunasString += 	"onclick='mudaStatus(\""+data2[j].descricao+"\")'";
					colunasString += ">";
					colunasString += 	"<input type='checkbox' id='check_"+data2[j].descricao+"' disabled>";
					colunasString += 	"<input type='hidden' name='colunasTableValue' value='"+data2[j].descricao+"'>";
					colunasString += "</td>";

					colunasString += "<td  align='center' id='linhaCheckP_"+data2[j].descricao+"' ";
					colunasString += 	"onclick='mudaChave(\""+data2[j].descricao+"\")'";
					colunasString += ">";
					colunasString += 	"<input type='checkbox' id='checkP_"+data2[j].descricao+"' disabled>";
					colunasString += "</td>";
				}
				colunasString += "</table>";
				// sql += "\n) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n\n\n";
				$("#carregando").html("");
				$("#colunasTable").html(colunasString);
			}
		});
	}

	function mudaStatus(descricao){
		if (document.getElementById("check_"+descricao).checked) {
			document.getElementById("check_"+descricao).checked = false;
			// document.getElementById("linha"+tipo+"_"+item).style.backgroundColor = "#f0ad4e";
			document.getElementById("linhaDesc_"+descricao).style.backgroundColor = "#f0ad4e";
			document.getElementById("linhaCheck_"+descricao).style.backgroundColor = "#f0ad4e";
			document.getElementById("linhaDescColuna_"+descricao).style.backgroundColor = "#f0ad4e";
		} else {
			document.getElementById("check_"+descricao).checked = true;
			document.getElementById("linhaDesc_"+descricao).style.backgroundColor = "#5cb85c";
			document.getElementById("linhaCheck_"+descricao).style.backgroundColor = "#5cb85c";
			document.getElementById("linhaDescColuna_"+descricao).style.backgroundColor = "#5cb85c";
		}
	}

	function mudaChave(descricao){
		if (document.getElementById("checkP_"+descricao).checked) {
			document.getElementById("checkP_"+descricao).checked = false;
			document.getElementById("linhaCheckP_"+descricao).style.backgroundColor = "#f0ad4e";
		} else {
			document.getElementById("checkP_"+descricao).checked = true;
			document.getElementById("linhaCheckP_"+descricao).style.backgroundColor = "#5cb85c";
		}
	}

	function selecionarTodos(){
		var colunas = document.getElementsByName("colunasTableValue");
		var coluna = "";
		for (var i = 0; i < colunas.length; i++) {
			coluna = colunas[i].value;
			document.getElementById("check_"+coluna).checked = true;
			document.getElementById("linhaDesc_"+coluna).style.backgroundColor = "#5cb85c";
			document.getElementById("linhaCheck_"+coluna).style.backgroundColor = "#5cb85c";
			document.getElementById("linhaDescColuna_"+coluna).style.backgroundColor = "#5cb85c";
		}
	}

	function deselecionarTodos(){
		var colunas = document.getElementsByName("colunasTableValue");
		var coluna = "";
		for (var i = 0; i < colunas.length; i++) {
			coluna = colunas[i].value;
			document.getElementById("check_"+coluna).checked = false;
			document.getElementById("linhaDesc_"+coluna).style.backgroundColor = "#f0ad4e";
			document.getElementById("linhaCheck_"+coluna).style.backgroundColor = "#f0ad4e";
			document.getElementById("linhaDescColuna_"+coluna).style.backgroundColor = "#f0ad4e";
		}	
	}

	function carregarColunas(){
		$("#carregando").html("Carregando...");
		numRegistrosLord = 0;
		numRegistros = 0;

		var tabela = $("#tabela").val();
		var nomeBD = $("#nomeBD").val();
		var operacao = "w";

		var registroSql = "";
		var colunas = document.getElementsByName("colunasTableValue");
		var coluna = "";
		var colunasSelecionadas = "";
		var colunasChaves = "";
		var estruturaTable = "";
		var contColunas = 0;
		var contColunasChaves = 0;
		var arrayDB = $("#nomeBD").val();

		estruturaTable += "\nDROP TABLE IF EXISTS `"+tabela+"`;";
		estruturaTable += "\nCREATE TABLE "+tabela+" (";
		for (var i = 0; i < colunas.length; i++) {
			coluna = colunas[i].value;
			if (document.getElementById("check_"+coluna).checked) {
				contColunas++;
				if (contColunas == 1) {
					colunasSelecionadas = coluna;
					estruturaTable += "\n	"+document.getElementById("estruturaColuna_"+coluna).innerHTML;
				} else {
					colunasSelecionadas += ","+coluna;
					estruturaTable += ",\n	"+document.getElementById("estruturaColuna_"+coluna).innerHTML;
				}
			}
			if (document.getElementById("checkP_"+coluna).checked) {
				contColunasChaves++;
				if (contColunasChaves == 1) {
					colunasChaves = "`"+coluna+"`";
					// colunasChaves = coluna;
				} else {
					colunasChaves += ", `"+coluna+"`";
					// colunasChaves += ", "+coluna;
				}
			}
		}

		colunasChaves = contColunasChaves == 0 ? "" : ",\n	PRIMARY KEY ("+colunasChaves+")";

		estruturaTable += colunasChaves+"\n) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n\n\n";
		
		$.ajax({
			url:'app/controllers/criarSQL_Estrutura.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'arquivo': nomeBD,
				'sql': estruturaTable,
				'tabela': tabela,
				'op': operacao
			}
		}).done( function(data){
			console.log(data);
			if (data == "1") {
				$("#colunaAtual").html(urlWebService+"MigracaoWS/listarRegistrosPersonalizado/"+tabela+"/"+colunasSelecionadas);
				$.ajax({
					type: 'GET',
					url: urlWebService+"MigracaoWS/listarRegistrosPersonalizado/"+tabela+"/"+colunasSelecionadas+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data2){
					if (data2.length == 0) {
						console.log("Nemnhuma registro encontrado nesta tabela: "+tabela);
						registroSql = "-- Nenhum registro encontrado netqa tabela: "+tabela;
						salvarRegistro(registroSql, tabela, "w");
					} else {
						// numRegistros++;
						registroSql  = "\nUSE "+arrayDB+";";
						registroSql += "\n\nTRUNCATE "+tabela+";"; // 	("+arrayColunas[indice]+") \n
						salvarRegistro(registroSql, tabela, "w");
						for(k in data2){
							descricao = data2[k].descricao;
							registroSql = descricao;
							salvarRegistro(registroSql, tabela, "a");
						}
					}
				});
			}
		});
	}

	function salvarRegistro(registroSql, tabela, operacao){
		var arrayDB = $("#nomeBD").val();
		numRegistros++;
		$.ajax({
			url:'app/controllers/criarSQL_RegistrosPersonalizado.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'arquivo': arrayDB,
				'sql': registroSql,
				'tabela': tabela,
				'op': operacao
			}
		}).done( function(data){
			numRegistrosLord++;
			$("#descTabelas").html(numRegistrosLord+"/"+numRegistros);
			console.log("data");
			console.log(data);
			if (numRegistrosLord == numRegistros) {
				$("#carregando").html("Carregado");
			}
		});
	}

	function limparDivLord(){
		$("#carregando").html("");
		$("#descTabelas").html("");
	}
</script>
</body>
</html>