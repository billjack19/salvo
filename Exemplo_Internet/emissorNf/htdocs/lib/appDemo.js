$(function(){//# atributo id elemento se . é a classe
	$("#configuraIni").on("click", function(){
		$.ajax({
			url: "configurarINI.php",
			success: function(arquivoINI){
				$("#idXML").val(arquivoINI)
			}
		})
	})

	$("#loadConfig").on("click",function(){		
		var conteudoINI = $("#idXML").val()		
		var nomeCertificado = $("#nomeCertificado").val()
		$.ajax({
			method : "post",
			url : "saveINI.php",
			data : {conteudoINI : conteudoINI, nomeCertificado : nomeCertificado},
			success: function(conteudo){
				$("#idXML").val("INI configurado com sucesso! Prossiga...")
				$("#nomeCertificado").val(conteudo)
			}
		})
	})

	$("#consultaStatus").on("click",function(){
		$.ajax({
			url: "consultaStatus.php", 
			success: function(data){
				$("#idXML").val(data)//pega o resultado do data e coloca no val				
			}
		})
	})

	$("#gerarXMLDataSet").on("click",function(){
		$.ajax({
			url : "gerarDataSet.php",
			success: function(dataSet){
				console.log(dataSet)
				dataSet = JSON.parse(dataSet)
				$("#idXML").val(dataSet.xml)
				$("#chaveNfe").val(dataSet.chaveNFe)
			}
		})
	})	

	$("#assinarNota").on("click",function(){
		var xml = $("#idXML").val()
		$.ajax({
			method : "post",
			url : "assinarNota.php",
			data : {xml: xml},
			success: function(xmlAssinado){
				$("#idXML").val(xmlAssinado)
			}
		})
	})	

	$("#enviarNota").on("click", function(){
		var xmlRet = $("#idXML").val()
		$.ajax({
			method : "post",
			url : "enviarNota.php",
			data : {xmlRet: xmlRet},			
			success: function(xmlRetorno){
				xmlRetorno = JSON.parse(xmlRetorno)
				$("#nroRecibo").val(xmlRetorno.nroRec.nRec)				
				$("#idXML").val(xmlRetorno.xml)
			}
		})
	})

	$("#auditarXML").on("click", function(){
		var xmlNFe = $("#idXML").val()
		$.ajax({
			method : "post",
			url : "auditar.php",
			data : {xmlNFe : xmlNFe},
			success: function(retornoAuditor){
				$("#idXML").val(retornoAuditor)
			}
		})
	})

	$("#consultarNFe").on("click", function(){
		var chaveNota = $("#chaveNfe").val()
		$.ajax({
			method : "post",
			url : "consultarNFe.php",
			data : {chaveNota: chaveNota},
			success : function(retornoConsulta){
				$("#idXML").val(retornoConsulta)
			}
		})
	})

	$("#consultarRecibo").on("click", function(){
		var reciboNota = $("#nroRecibo").val()
		$.ajax({
			method : "post",
			url : "consultaRecibo.php",
			data : {reciboNota : reciboNota},
			success : function(retConsRecibo){
				$("#idXML").val(retConsRecibo)
			}
		})
	})

	$("#gerarPDF").on("click", function(){
		var chaveNota = $("#chaveNfe").val()
		$.ajax({
			method : "post",
			url : "gerarPDF.php",
			data : {chaveNota : chaveNota},			
			success : function(retPDF){	
				$("#idXML").val(retPDF)				
				location.href="http://192.168.240.131/baixar.php?chaveNFe="+chaveNota
			},
			error : function(result){
				$("#idXML").val(result)
			}
		})
	})

	$("#ConvDataSet").on("click", function(){
		var xmlNFe = $("#idXML").val()		
		$.ajax({
			method : "post",
			url : "converterXMLToDataSet.php",
			data : {xmlNFe : xmlNFe},
			success : function(result){				
				console.log(result)
				$("#idXML").val(result)
			},
			error : function(result){
				$("#idXML").val(result)
			}
		})
	})	

	$("#enviarEmail").on("click", function(){		
		var dadosEmail = {		
				 "ChaveNota" : $("#chaveNota").val(),
				 "SMTP": $("#servidorSmtp").val(),
				 "Remetente": $("#emailRemetente").val(),
				 "Destinatario": $("#emailDestinatario").val(),
				 "Usuario": $("#emailUsuario").val(),
				 "Senha": $("#emailPassword").val(),
				 "ChaveNota": $("#chaveNota").val(),
				 "Autenticacao": $("#EmailAutenticacao").is(":checked"),
				 "EmailHTML": $("#emailHtml").is(":checked"),
				 "Cancelamento": $("#EmailCancelamento").is(":checked"),
				 "Assunto": $("#AssuntoEmail").val(),
				 "Mensagem": $("#mensagemEmail").val(),
				 "Porta" : $("#emailPorta").val(),
				 "TimeOut" : $("#emailTimeOut").val()					
		}		
		$.ajax({
			dataType : "json",
			method : "post",
			url : "enviaEmail.php",
			data: {dadosEmail : dadosEmail},
			success : function(result){			
				alert(result.responseText)
				$("#mensagemEmail").val(result.responseText)				
			},
			error : function(result){
				alert(result.responseText)				
				$("#mensagemEmail").val("Erro ao enviar Email, tente novamente...")	
			}
		})
	})
})