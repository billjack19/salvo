var bancoDeDados;

function criarBancoDeDados(){
	bancoDeDados =  openDatabase("VendasCDI", "1.0", "Testar SQL para logar sozinho", 200000);
	// console.log(bancoDeDados);
	if(!bancoDeDados){
		alert('deu pau!');
	}


	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("CREATE TABLE IF NOT EXISTS USUARIO (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, identificacao TEXT, senha TEXT, data TEXT)",null,null);
		tx.executeSql ("CREATE TABLE IF NOT EXISTS IP (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, ip TEXT)",null,null);
	});

	bancoDeDados.transaction (function (tx) {
		tx.executeSql ('SELECT * FROM IP', [], function (tx, results) {
			var len = results.rows.length, i;
			var ip = "";
			var dataAtualLogar = pegarData();
			msg = "<p> Registros encontrados:" + len + "</ p>";
			for (i = 0; i <len; i ++) {
				// console.log(results.rows.item(i).ip);
				ip = results.rows.item(i).ip;
			}
			if (ip != "") {
				hostWebService = ip;
				hostServeImage = ip;
				$("#modalIpConfig").val(ip);
				urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
			} else {
				removerIp();
			}
		}, null);

		tx.executeSql ('SELECT * FROM USUARIO', [], function (tx, results) {
			var len = results.rows.length, i;
			var identificador = "";
			var senha = "";
			var dataLogada = "";
			var dataAtualLogar = pegarData();
			msg = "<p> Registros encontrados:" + len + "</ p>";
			for (i = 0; i <len; i ++) {
				// console.log(results.rows.item(i).identificacao);
				identificador = results.rows.item(i).identificacao;
				senha = results.rows.item(i).senha;
				dataLogada = results.rows.item(i).data;
			}
			if (dataLogada == dataAtualLogar) {
				logarSistema(identificador, senha);	
			} else {
				removerLogin(false);
			}
		}, null);

	});
}

function adicionarLogin(identificador, senha){
	// console.log("identificador: "+identificador)
	// console.log("senha: "+senha);
	var dataAtualSalvar = pegarData();
	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("DELETE FROM USUARIO");
		tx.executeSql ("INSERT INTO USUARIO (identificacao, senha, data) VALUES (?,?,?)",[identificador,senha,dataAtualSalvar],null,null);
	});
}


function adicionarIp(){
	var modalChaveConfig = $("#modalChaveConfig").val();
	var modalUsuarioConfig = $("#modalUsuarioConfig").val();
	// console.log("modalUsuarioConfig: "+modalUsuarioConfig);

	if ((modalUsuarioConfig == "ADM" || modalUsuarioConfig == "Adm" || modalUsuarioConfig == "adm") && modalChaveConfig == "2017") {
		var ip = $("#modalIpConfig").val();
		// console.log("ip: "+ip);

		if (ip == "") {
			$.toast({
				text: "Erro preencha o campo IP!", 
				heading: 'Falha', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});
		} else {
			bancoDeDados.transaction (function (tx) {
				tx.executeSql ("DELETE FROM IP");
				tx.executeSql ("INSERT INTO IP (ip) VALUES (?)",[ip],null,null);
			});
			hostWebService = ip;
			hostServeImage = ip;
			urlWebService = "http://"+hostWebService+portaWebService+caminhoWebService;
			setarIpCampoConfig();
			// $('#modalIpConfig').val(ip);
			document.getElementById("fecharModalIpBottun").click();
		}
	} else {
		$.toast({
			text: "Erro Usuário ou/e Senha inválidos!", 
			heading: 'Falha', 
			icon: 'error', 
			showHideTransition: 'slide', 
			allowToastClose: true, 
			hideAfter: 2500, 
			stack: 5, 
			position: 'top-right',
			extAlign: 'right',
			loader: true,
			loaderBg: '#44f'
		});
	}
	
}

function removerLogin(reload){
	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("DELETE FROM USUARIO",[], 
		function(tx,results){
			if (reload) {
				location.reload();
			}
			console.error("Table Dropped");
		},
		function(tx,error){
			console.error("Error: " + error.message);
		});
	});
	
}

function removerIp(){
	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("DELETE FROM IP");
	});
}
/*

db.transaction (function (tx) {
   tx.executeSql ('SELECT * FROM LOGS', [], function (tx, results) {
   var len = results.rows.length, i;
   msg = "<p> Registros encontrados:" + len + "</ p>";
   for (i = 0; i <len; i ++) {
	  console.log(results.rows.item(i) .log);
   }
}, null);
});

*/