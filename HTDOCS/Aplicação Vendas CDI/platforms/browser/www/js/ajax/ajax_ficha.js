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
			montarListaPedido += "<div class='text-left' style='margin-top: 15px;'>";
			montarListaPedido += "	<button onclick='setStatus(\"inicial\");n_editar();montarMenuPrincipal();' class='btn btn-block btn-info' title='Voltar'>";
			montarListaPedido += "		<i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;";
			montarListaPedido += "		Voltar";
			montarListaPedido += "	</button>";
			montarListaPedido += "</div>";


			montarListaPedido += "<h3 class='text-center'>";
			montarListaPedido += "O número da ficha contêm um pedido não finalizado";
			montarListaPedido += "</h3>";
			montarListaPedido += "<table class='table'><tr>";
			montarListaPedido += "<td align='left' style='padding-top:1px;padding-bottom:1px;'>";

			montarListaPedido += "<button class='btn btn-warning' ";
			montarListaPedido += "data-toggle='modal' data-target='#modalFichaPedido' onclick='setStatus(\"ficha2\");'>";
			montarListaPedido += "<i class='fa fa-search' aria-hidden='true'></i>&nbsp;";
			montarListaPedido += "Ficha";
			montarListaPedido += "</button>";

			montarListaPedido += "</td></tr></table>";

			
			montarListaPedido += "<table class='table' style='margin-top:-15px;'>";
			montarListaPedido += "<tr bgcolor='white'>";
			montarListaPedido += "<td>Ficha</td>";
			montarListaPedido += "<td>Documento</td>";
			montarListaPedido += "<td>Razão Social</td>";
			montarListaPedido += "<td>Emissão</td>";
			montarListaPedido += "</tr>";
			
			for(i in data){
				emissaoPerc = data[i].emissao;
				emissaoPerc = emissaoPerc.replace(" 00:00:00.0", "");
				emissaoPerc = formatarData(emissaoPerc);				

				montarListaPedido += "<tr>";

				montarListaPedido += "<td>"+data[i].ficha+"</td>";
				montarListaPedido += "<td>"+data[i].documento+"</td>";
				montarListaPedido += "<td>"+data[i].razaoSocial+"</td>";
				montarListaPedido += "<td>"+emissaoPerc+"</td>";
			}
			
			montarListaPedido += "</tr>";
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