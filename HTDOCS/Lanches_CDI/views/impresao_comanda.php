
<div id="tela_impressao" style="display: none;">
	
	<div id="tela_comanda">
		<div style="width: 500px;">
			<center>Comanda</center>
			<table width="100%">
				<tr>
					<td width="50%">
						<div id="dateTimeEmissaoComanda"></div>
					</td>
					<td>
						<div style="text-align: right;"><b>Pedido:</b> <span id="pedidoImpressaoComanda"></span></div>
					</td>
				</tr>
			</table>
		</div>
		<div style="width: 500px" id="conteudoComandaImpressao"></div>
	</div>
</div>
<script type="text/javascript">
	function imprimirTelaImpressao(){
		console.log("imprimir");
		var documento = $("#documentoGeral").val();
		var filial = $("#filial").val();

		$.ajax({
			type: 'GET',
			url: urlWebService+"ImprimirWS/imprimirSenha/"+filial+"/"+documento+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			if (data == "1") toastGeral("success", "Senha impressa com sucesso!");
		});

		$.ajax({
			type: 'GET',
			url: urlWebService+"ImprimirWS/imprimirComanda/"+filial+"/"+documento+parametrosWebService,
			contentType: "application/json",
			jsonpCallback: "localJsonpCallback"
		}).done( function(data){
			if (data == "1") toastGeral("success", "Comanda impressa com sucesso!");
		});
		/* console.log(documento);
		if (documento != "0") {
			var pedidoArray = document.getElementsByName("itemPedidoArray");
			var padidoArrayExcecao = document.getElementsByName("itemPadidoArrayExcecao");
			var padidoArrayPreparo = document.getElementsByName("itemPadidoArrayPreparo");
			var padidoArrayAdicional = document.getElementsByName("itemPadidoArrayAdicional");
			var padidoArrayAdicionalSPreco = document.getElementsByName("itemPadidoArrayAdicionalSPreco");
			var qtdItemPedidoArray = document.getElementsByName("qtdItemPedidoArray");

			// var teste = "teste";
			var conteudoItensImpressao = 	"<table  style='font-size: 15px;width: 100%' border='1'>";
			conteudoItensImpressao += 			"<tr>";
			conteudoItensImpressao += 				"<td align='center'><b>Qtd</b></td>";
			conteudoItensImpressao += 				"<td align='center'>";
			conteudoItensImpressao += 					"<b>Item</b>";
			conteudoItensImpressao += 				"</td>";
			conteudoItensImpressao += 			"</tr>";

			for (var i = 0; i < pedidoArray.length; i++) {
				conteudoItensImpressao += 		"<tr>";
				conteudoItensImpressao += 			"<td align='center' style='padding-right: 7px;'>";
				conteudoItensImpressao += 				qtdItemPedidoArray[i].innerHTML;
				conteudoItensImpressao += 			"</td>";
				conteudoItensImpressao += 			"<td style='padding-left: 7px;'>";
				conteudoItensImpressao += 				pedidoArray[i].innerHTML;
				conteudoItensImpressao += 				padidoArrayExcecao[i].innerHTML;
				conteudoItensImpressao += 				padidoArrayPreparo[i].innerHTML;
				conteudoItensImpressao += 				padidoArrayAdicionalSPreco[i].innerHTML;
				conteudoItensImpressao += 			"</td>";
				conteudoItensImpressao += 		"</tr>";
			}
			conteudoItensImpressao += 		"</table>";

			var dataEmissao = pegarDataHora();
			dataEmissao = formatarData(dataEmissao.substring(0, 10))+dataEmissao.substring(10, dataEmissao.length);
			$("#dateTimeEmissaoComanda").html(dataEmissao);
			$("#conteudoComandaImpressao").html(conteudoItensImpressao);
			$("#pedidoImpressaoComanda").html($("#numPedidoItens_numero").val());

			document.getElementById("tela_impressao").style.display = "block";
			window.print();
			document.getElementById("tela_impressao").style.display = "none";
		}
		else toastGeral("error", "Não tem nenhum documento selecinado!");*/
	}
</script>

<style type="text/css">
	@media print {
		body * {
			visibility: hidden;
		}
		#tela_impressao, #tela_impressao * {
			visibility: visible;

		}
		#tela_impressao {
			display: block;
			position: absolute;
			left: 0;
			top: 0;

		}
		/*@page { margin: 0.5cm } */

		/* First page, 10 cm margin on top */
		@page :first {
		  margin-top: 0.2cm;
		  margin-bottom: 0.2cm;
		}

		/* Left pages, a wider margin on the left */
		/*@page :left {
		  margin-left: 0.6cm;
		  margin-right: 0.5cm;
		}

		@page :right {
		  margin-left: 0.5cm;
		  margin-right: 0.6cm;
		}*/
	} 
</style>