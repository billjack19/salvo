var jk_arrayIdLotes = [];

function listarLotes(){
	var Codigo = "";
	var Nome = "";
	var AreaTotal = "";
	var AreaLoteada = "";
	var CIDADE = "";
	var Estado = "";
	var QtdeLotes = "";
	var QtdeLotesDisp = "";
	var VALOR_DE = "";
	var VALOR_ATE = "";
	var DescricaoParaSite = "";

	var jk_config = "";
	var jk_configCard = "";
	var jk_configBolinha = "";
	var jk_configSlide = "";
	var jk_configImg = "";
	jk_arrayIdLotes = [];
	var active = "";
	var contLinha = 0;
	var cont = 0;

	$.ajax({
		url:'controllers/funcoes_lotesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_lotes': true
		}
	}).done( function(data){
		if (data == "") {  } 
		else {
			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",,,");

				Codigo = 			subvetor[0];
				Nome = 				subvetor[1];
				AreaTotal = 		subvetor[2];
				AreaLoteada = 		subvetor[3];
				CIDADE = 			subvetor[4];
				Estado = 			subvetor[5];
				QtdeLotes = 		subvetor[6];
				QtdeLotesDisp = 	subvetor[7];
				VALOR_DE = 			subvetor[8];
				VALOR_ATE = 		subvetor[9];
				DescricaoParaSite = subvetor[10];

				jk_arrayIdLotes.push(Codigo);

				if (i == 0) { active = "active" }
				else { active = "" }

				if (verificaUrl("site_arquivos/loteamentos/"+Codigo+".jpg")) {
					jk_configImg = "<img class=\"cdi-image\" id=\"img"+Codigo+"\" onClick=\"ImgModal(img1)\" src=\"site_arquivos/loteamentos/"+Codigo+".jpg\" alt=\"/site_arquivos/"+Codigo+".jpg\" title=\""+Nome+"\">";
					jk_configImgCard = "<img src=\"site_arquivos/SlideShow/"+Codigo+".jpg\" width=\"100%\">";
				} else {
					jk_configImg = "<img class=\"cdi-image\" id=\"img"+Codigo+"\" onClick=\"ImgModal(img1)\" src=\"site_arquivos/loteamentos/0.jpg\" alt=\"/site_arquivos/"+Codigo+".jpg\" title=\""+Nome+"\">";
					jk_configImgCard = "<img src=\"site_arquivos/SlideShow/0.jpg\" width=\"100%\">";
				}
				jk_configBolinha += "<li data-target=\"#myCarousel\"style='height: 25px; width: 25px;margin-right: 30px;border-radius: 25px;' id='linhaSlide"+i+"' data-slide-to=\""+i+"\" class=\""+active+"\"></li>"

				jk_configCard += 	"<div class=\"item "+active+"\">";
				jk_configCard += 	"	<div class=\"carousel\" onclick=\"setarProxPagina()\">";
				jk_configCard += 			jk_configImgCard
				jk_configCard += 	"		<div class=\"carousel-caption\" style='margin-top: -50px;'>";
				jk_configCard += 	"			<h1 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-small w3-hide-medium'><b>"+Nome+"</b></h1>";
				jk_configCard +=	"			<h3 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-small w3-hide-medium'><b>"+DescricaoParaSite+"</b></h3>";
				jk_configCard += 	"			<h2 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-large w3-hide-small'><b>"+Nome+"</b></h2>";
				jk_configCard +=	"			<h4 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-large w3-hide-small'><b>"+DescricaoParaSite+"</b></h4>";
				jk_configCard += 	"			<h4 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-large w3-hide-medium'><b>"+Nome+"</b></h4>";
				jk_configCard +=	"			<h5 style='text-shadow: 3px 3px 1px #000;' class='w3-hide-large w3-hide-medium'><b>"+DescricaoParaSite+"</b></h5>";
				jk_configCard += 	"		</div>";
				jk_configCard += 	"	</div>";
				jk_configCard += 	"</div>";


				// if (contLinha == 0) {
					// jk_config += "<div class=\"row\">";
					jk_config += "	<div class=\"col-md-6 col-lg-3 col-sm-12\">";
					jk_config += "	<form action='loteamento.php' method='POST'>";
					jk_config += "		<button type='submit' style='background-color: Transparent;' name='id_lote' value='"+Codigo+"' title=\""+Nome+"\" class='btn'>";
					jk_config += "			<div class=\"list clearfix list-one listLoteamento\">";
					jk_config += "				<a href=\"#\" class=\"release\">";
					jk_config += "					<span class=\"tag\">Disponível</span>";
					jk_config += 						jk_configImg;
					jk_config += "					<span class=\"name cdi-vermelho-brothers classeDas\">";
					jk_config += "						<span class=\"aux\">"+Nome+"</span>";
					jk_config += "					</span>";
					jk_config += "				</a>";
					jk_config += "			</div>";
					jk_config += "		</button>";
					jk_config += "	</form>";
					jk_config += "	</div>";
					// contLinha = 2;
				// }
				// else if (contLinha == 1) {
				// 	jk_config += "</div>";
				// 	jk_config += "<br>";
				// 	jk_config += "<div class=\"row\">";
				// 	jk_config += "	<div class=\"col-md-4 col-md-offset-1\">";
				// 	jk_config += "	<form action='loteamento.php' method='POST'>";
				// 	jk_config += "		<button type='submit' style='background-color: Transparent;' name='id_lote' value='"+Codigo+"' title=\""+Nome+"\" class='btn'>";
				// 	jk_config += "			<div class=\"list clearfix list-one\">";
				// 	jk_config += "				<a href=\"#\" class=\"release\">";
				// 	jk_config += "					<span class=\"tag\">Disponível</span>";
				// 	jk_config += 						jk_configImg;
				// 	jk_config += "					<span class=\"name cdi-vermelho-brothers classeDas\">";
				// 	jk_config += "						<span class=\"aux\">"+Nome+"</span>";
				// 	jk_config += "					</span>";
				// 	jk_config += "				</a>";
				// 	jk_config += "			</div>";
				// 	jk_config += "		</button>";
				// 	jk_config += "	</form>";
				// 	jk_config += "	</div>";
				// 	contLinha = 2;
				// }
				// else {
				// 	jk_config += "	<div class=\"col-md-4 col-md-offset-2\">";
				// 	jk_config += "	<form action='loteamento.php' method='POST'>";
				// 	jk_config += "		<button type='submit' style='background-color: Transparent;' name='id_lote' value='"+Codigo+"' title=\""+Nome+"\" class='btn'>";
				// 	jk_config += "			<div class=\"list clearfix list-one\">";
				// 	jk_config += "				<a href=\"#\" class=\"release\">";
				// 	jk_config += "					<span class=\"tag\">Disponível</span>";
				// 	jk_config += 						jk_configImg;
				// 	jk_config += "					<span class=\"name cdi-vermelho-brothers classeDas\">";
				// 	jk_config += "						<span class=\"aux\">"+Nome+"</span>";
				// 	jk_config += "					</span>";
				// 	jk_config += "				</a>";
				// 	jk_config += "			</div>";
				// 	jk_config += "		</button>";
				// 	jk_config += "	</form>";
				// 	jk_config += "	</div>";
				// 	contLinha = 1;
				// }
				cont++;
				if (cont == vetor.length) {
					jk_config += "</div>";
				}
			}
			jk_configSlide += 	"<div class=\"container-fluid\" style=\"margin-left: -50px;margin-right: -50px;\"> ";
			jk_configSlide += 	"  <div id=\"myCarousel\" class=\"carousel carousel-fade slide\">";
			jk_configSlide += 	"    <ol class=\"carousel-indicators\">";
			jk_configSlide += 	    	jk_configBolinha;
			jk_configSlide += 	"    </ol>";
			jk_configSlide += 	"    <div class=\"carousel-inner\">";
			jk_configSlide += 	    	jk_configCard;
			jk_configSlide += 	"    </div>";
			jk_configSlide += 	"    <!-- Left and right controls -->";
			jk_configSlide += 	"    <a class=\"left\" style='' href=\"#myCarousel\" data-slide=\"prev\">";
			jk_configSlide += 	"      <span class=\"glyphicon glyphicon-chevron-left\"></span>";
			jk_configSlide += 	"      <span class=\"sr-only\">Previous</span>";
			jk_configSlide += 	"    </a>";
			jk_configSlide += 	"    <a class=\"right\" href=\"#myCarousel\" data-slide=\"next\">";
			jk_configSlide += 	"      <span class=\"glyphicon glyphicon-chevron-right\"></span>";
			jk_configSlide += 	"      <span class=\"sr-only\">Next</span>";
			jk_configSlide += 	"    </a>";
			jk_configSlide += 	"  </div>";
			jk_configSlide += 	"</div>";
			jk_configSlide += 	"<form action=\"loteamento.php\" method=\"POST\">";
			jk_configSlide += 	"	<button type=\"submit\" class=\"hidden\" id=\"loteButton\"></button>";
			jk_configSlide += 	"	<input type=\"hidden\" name=\"id_lote\" id=\"id_lote\">";
			jk_configSlide += 	"</form>";
			//  carousel-control

			$("#conteudoLotes").html(jk_config);
			$("#conteudoSlide").html(jk_configSlide);
			ativarSlide();
		}
	});
}

function setarProxPagina(){
	$('.carousel').carousel('pause');
	for (var i = jk_arrayIdLotes.length - 1; i >= 0; i--) {
		if (document.getElementById("linhaSlide"+i).className == "active") {
			$("#id_lote").val(jk_arrayIdLotes[i]);
		}
	}
	document.getElementById("loteButton").click();
}