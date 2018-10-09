
var data_Global = "";

function chamarTelaDeMenu(data){
	data_Global = data;

	$("#cabecarioOpcao").html(
		 	"<div class=\"text-center\">"
		+		"<h2 class=\"text-center\">Orçamento CDI</h2>"
		+ 	"</div>"
	);

	var conteudo = "";

	conteudo += "<div class=\"col-xs-12\">"
			 + 		"<div class=\"col-xs-5 iconPrincipal\" onclick='montarTelaPrincipal(\""+data_Global+"\")'><br>"
			 + 			"<span class=\"fontIcon\"><i class=\"fa fa-shopping-cart\"></i></span><br>"
			 + 			"<h3>Orçamentos</h3>"
			 + 		"</div>"
			 + 		"<div class=\"col-xs-5 iconPrincipal\" onclick='montarTelaConsultaPreco()'><br>"
			 + 			"<span class=\"fontIcon\"><i class=\"fa fa-search\"></i></span><br>"
			 + 			"<h3>Consultar Preço</h3>"
			 + 		"</div>"
			 + 	"</div>";
	$("#conteudoView").html(conteudo);

	botaoFixoEsquerda("menu");
	botaoFixoDireita("menu");
}




function montarTelaConsultaPreco(){
	console.log("montarTelaConsultaPreco");
	$("#cabecarioOpcao").html(
		 	"<div class=\"text-center\">"
		+		"<h2 class=\"text-center\">Consultar Preço</h2>"
		+ 	"</div>"
	);

	var conteudo = "";
	conteudo = retornaTelaAdicionaItem(false);

	$("#conteudoView").html(conteudo);
	document.getElementById("conteudoAdicionaPedidoItem").className = "";
	motarComboListItem('itemComboDatalist');

	botaoFixoEsquerda("preco");
	botaoFixoDireita("preco");
}