var bancoDeDados;

function criarBancoDeDados(){
	bancoDeDados =  openDatabase("Cacamba", "1.0", "Testar SQL para logar sozinho", 200000);
	console.log(bancoDeDados);
	if(!bancoDeDados){
		alert('deu pau!');
	}


	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("CREATE TABLE IF NOT EXISTS USUARIO (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, identificacao TEXT, senha TEXT, data TEXT)",null,null);
	});

	bancoDeDados.transaction (function (tx) {
		tx.executeSql ('SELECT * FROM USUARIO', [], function (tx, results) {
			var len = results.rows.length, i;
			var identificador = "";
			var senha = "";
			var dataLogada = "";
			var dataAtualLogar = pegarData();
			msg = "<p> Registros encontrados:" + len + "</ p>";
			for (i = 0; i <len; i ++) {
				console.log(results.rows.item(i).identificacao);
				identificador = results.rows.item(i).identificacao;
				senha = results.rows.item(i).senha;
				dataLogada = results.rows.item(i).data;
			}
			if (dataLogada == dataAtualLogar) {
				logarSistema(identificador, senha);	
			} else {
				removerLogin();
			}
		}, null);
	});
}

function adicionarLogin(identificador, senha){
	console.log("identificador: "+identificador)
	console.log("senha: "+senha);
	var dataAtualSalvar = pegarData();
	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("DELETE FROM USUARIO");
		// tx.executeSql ("ALTER TABLE USUARIO AUTO_INCREMENT = 1");
		tx.executeSql ("INSERT INTO USUARIO (identificacao, senha, data) VALUES (?,?,?)",[identificador,senha,dataAtualSalvar],null,null);
	});
}

function removerLogin(){
	bancoDeDados.transaction (function (tx) {
		tx.executeSql ("DELETE FROM USUARIO");
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