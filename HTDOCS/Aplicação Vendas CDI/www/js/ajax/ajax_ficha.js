function motarviewConsultarFicha(){
	var ficha = $("#modalCampoFichaPedido").val();
	var dataAtual = pegarData();
	var montarListaPedido = "";
	$("#fichaPesquisa").val(ficha);
	$.ajax({
		type: 'GET',
		url: urlWebService+"PedidoWS/listarFichaAnteriorId/"+ficha+"/"+dataAtual+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			$.ajax({
				type: 'GET',
				url: urlWebService+"PedidoWS/listarFicha/"+ficha+"/"+dataAtual+parametrosWebService,
				contentType: "application/json",
				jsonpCallback: "localJsonpCallback"
			}).done( function(data){
				if (data.length == 0) {
					montarViewAdicionaPedido();
				} else {
					for(i in data){
						editarId(data[i].idLancPedido);
						montarListaItem(data[i].idLancPedido);
					}
				}
				document.getElementById("fecharModalFichaPedido").click();
				setStatus('pagina2');
			});
		} else {
			botaVoltarMenuPrincipal();			
			// montarListaPedido += "<div class='text-left' style='margin-top: 15px;'>";
			// montarListaPedido += "	<button onclick='setStatus(\"inicial\");n_editar();montarMenuPrincipal();' class='btn btn-block btn-info' title='Voltar'>";
			// montarListaPedido += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			// montarListaPedido += "		Voltar";
			// montarListaPedido += "	</button>";
			// montarListaPedido += "</div>";
			montarListaPedido += 	"<h3 class='text-center'>"
								+ 		"O número da ficha contêm um pedido não finalizado"
								+ 	"</h3>"
								+ 	"<table class='table'>"
								+		"<tr>"
								+ 			"<td align='left' style='padding-top:1px;padding-bottom:1px;'>"
								// + 			"<button class='btn btn-warning' "
								// + 					"data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha2\");'>"
								// + 				"<i class='fa fa-search' aria-hidden='true'></i>&nbsp;"
								// + 				"Ficha"
								// + 			"</button>"
								+ 			"</td>"
								+		"</tr>"
								+	"</table>"
								+ 	"<table class='table' style='margin-top:-15px;'>"
								+ 		"<tr bgcolor='white'>"
								+ 			"<td>Ficha</td>"
								+ 			"<td>Documento</td>"
								+ 			"<td>Razão Social</td>"
								+ 			"<td>Emissão</td>"
								+ 		"</tr>";
			for(i in data){
				emissaoPerc = data[i].emissao;
				emissaoPerc = emissaoPerc.replace(" 00:00:00.0", "");
				emissaoPerc = formatarData(emissaoPerc);				
				montarListaPedido += 	"<tr>"
									+ 		"<td>" + data[i].ficha 			+ "</td>"
									+ 		"<td>" + data[i].documento 		+ "</td>"
									+ 		"<td>" + data[i].razaoSocial 	+ "</td>"
									+ 		"<td>" + emissaoPerc 			+ "</td>"
									+ 	"</tr>";
			}
			montarListaPedido += "</table>";
			$("#cabecarioPrincipal").html(montarListaPedido);
			$("#listaPagina").html("<br><br><br><br><br><br><br>");
			document.getElementById("fecharModalFichaPedido").click();
			setStatus('pagina2');
		}
	});
}

function limparCamposModalFichaPedido(){
	$("#modalCampoFichaPedido").val("");
}