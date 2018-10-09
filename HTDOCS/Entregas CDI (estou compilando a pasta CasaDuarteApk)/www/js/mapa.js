
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var rotasCordenadas = [];
var arrayIndiceMarcador = [];
var MarcadoreEntregas = []; /* É um array global para armazenar os ponto de referencia */

var arrayDeCores = [
	// { cor: 'blue'	, traducao: "Azul"		}, 
	// { cor: 'green'	, traducao: "Verde"		},
	// { cor: 'red'	, traducao: "Vermelha"	},
	// { cor: 'purple'	, traducao: "Roxo"		},
	// { cor: 'orange'	, traducao: "Laranja"	},
	{ cor: 'gray'	, traducao: "Cinza"		}
];
var NumeroMaximoDePacotes = 10;
var corRotaUsada;
var selectDeSelecaoDeCarga = [];

/* Metodo de retorno do google api equivalente ao initmap */
function initialize(positionCenter) {	
	var tamanhoTelaRender = $(document).height() * 0.65;
	document.getElementById("mapa").style.height = tamanhoTelaRender+"px";
	directionsDisplay = new google.maps.DirectionsRenderer();
	// var latlng = new google.maps.LatLng(-21.788592788284546,-46.55911445617676);
	var options = {
		zoom: 14,
		center: positionCenter, // latlng,
		rotateControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	};
	map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(null);
	directionsDisplay.setMap(map);
	// carregarContatos();
}
// initialize();


var numDefinitivoDeAlgumaCoisa = 0;
var tempoDelay = 1000;
function tracarRotas(rota){
	var request = null;
	// $("#locaisDeEntregaDemostrativo").html("");
	// $("#selectOpcaoDeRotas").html("");
		
	request = {
		origin: rota.origem,
		destination: rota.destino,
		waypoints: rota.entregas,
		optimizeWaypoints: true,
		travelMode: google.maps.TravelMode.DRIVING
	};
	directionsService.route(request, function(result, status) {
		if (status == google.maps.DirectionsStatus.OK) {

			/* var arrayPontosEntregas = []; // para objeto do google
			var localizacao = []; // para o objeto do web service
			var igualEntregas = false;
			var indiceDaRota_p_Result = 0;*/
			/*for (var j = 0; j < rotas.length; j++) {
				arrayPontosEntregas = result.request.waypoints;
				igualEntregas = false;
				if (arrayPontosEntregas.length == rotas[j].entregasDetalhe.length) {
					for (var k = 0; k < rotas[j].entregasDetalhe.length; k++) {
						localizacao = rotas[j].entregasDetalhe[k].endEntrega.split(",");
						if (
							localizacao[0] == arrayPontosEntregas[k].location.location.lat() && 
							localizacao[1] == arrayPontosEntregas[k].location.location.lng()
						) { igualEntregas = true; }
						else { igualEntregas = false; k = rotas[j].entregasDetalhe.length; }
					}
					if (igualEntregas) {
						indiceDaRota_p_Result = j;
						j = rotas.length;
					}
				}
			}*/

			tratandoResultado(
				result, 
				rota.cor,
				rota.rotaDetalhe,
				rota.entregasDetalhe
			);
			numDefinitivoDeAlgumaCoisa++;
		} /* else alert("Erro: não conseguiu localizar seu endereço"); */
		
		setTimeout( function () {
			var selectOpcaoDeRotas = "<select id='selectDeSelecaoDeRotas' class=\"form-control\" onchange=\"alertaValor(this.value)\">";
			for (var i = 0; i < selectDeSelecaoDeCarga.length; i++) {
				selectOpcaoDeRotas += selectDeSelecaoDeCarga[i];
			}
			selectOpcaoDeRotas += "</select>";
			// $("#selectOpcaoDeRotas").htmlF(selectOpcaoDeRotas);
			setarTodasRotas();
		}, 2500);
	});
}


function tratandoResultado(objMap, cor, rotaDetalhe, objetoEntrega){//cor, //, numeroDeRotas
	var cordenadas = [];
	arrayIndiceMarcador.push([]);
	var pedido = objMap.request; /* retorna o que foi pedido (origem, destino e pontos de referencias) */
	var pontosEntrega = pedido.waypoints; /* retorna um array de pontos de referencias */
	
	var origen = pedido.origin.location; /* cordenadas da origem (lat, lng) */
	adicionarMarcador(origen.lat(), origen.lng(), "img/loja.png", "Casa Duarte ;)");
	var destino = pedido.destination.location; /* cordenadas do destino (lat, lng) */
	adicionarMarcador(destino.lat(), destino.lng(), "img/loja.png", "Casa Duarte ;)");
	
	var rotas = objMap.routes; /* retonar o objeto de rotas */
	var paradas = rotas[0].legs; /* retorna um array de paradas */
	var cordenasRota = rotas[0].overview_path; /* retorna as cordenadas da rota que ele traça */

	var localizacao = {}; /* está sendo usado de idece para referenciar um objeto de duas funções (lat() e lng()) */
	var latitude = 0; /* serve de indice para ler a latitude de um ponto de referencia */
	var longitude = 0; /* serve de indice para ler a longitue de um ponto de referencia */
	var imagem = ""; /* serve de indice para saber qual imagem deve ser setada no marcador do mapa */
	var numImagemReference = 0; /* serve para referir a imagem */
	var indiceImagemReference = "";
	var corReference = "";
	
	var locaisDeEntregasPer = []; /* Configuração para escrever os locais de entrega no mapa */
	var locaisDeEntregaIndice = null; /* Indice de Apoio para matriz acima que de gardar o nome do local e a imagem */
	var arrayCodigos = [];


	for (var i = 0; i < paradas.length; i++) {
		rotaDetalhe.distancia += parseFloat(paradas[i].distance.value);
		rotaDetalhe.duracao += parseFloat(paradas[i].duration.value);

		if (i != paradas.length - 1) {
			numImagemReference++; /* referir a imagemque começa contagem apartir do 1 e não do 0 */
			
			latitude = paradas[i].end_location.lat(); 
			longitude = paradas[i].end_location.lng();

			indiceImagemReference = numImagemReference;
			if (numImagemReference == pontosEntrega.length || numImagemReference > NumeroMaximoDePacotes) {
				indiceImagemReference = "f";
			}


			if (objetoEntrega[locaisDeEntregasPer.length].bool_entrega == 1) {
				corReference = "green";
			} else {
				arrayCodigos.push(objetoEntrega[locaisDeEntregasPer.length].codigo);
				corReference = cor.cor;
			}
			
			imagem = "img/"+corReference+"/pacote_"+corReference+"_"+indiceImagemReference+".png";


			arrayIndiceMarcador[arrayIndiceMarcador.length - 1].push(adicionarMarcador(
					latitude, longitude, 
					imagem, paradas[i].end_address, 
					objetoEntrega[locaisDeEntregasPer.length].codigo)
			);

			locaisDeEntregaIndice = {
				nome: paradas[i].end_address, 
				imagem: imagem,
				indiceImagem: indiceImagemReference, 
				pedido: objetoEntrega[locaisDeEntregasPer.length].pedido,
				codigo: objetoEntrega[locaisDeEntregasPer.length].codigo,
				bool_entrega: objetoEntrega[locaisDeEntregasPer.length].bool_entrega
			};
			locaisDeEntregasPer.push(locaisDeEntregaIndice);
		}
	}

	for (var i = 0; i < cordenasRota.length; i++) {
		cordenadas.push({lat: cordenasRota[i].lat(), lng: cordenasRota[i].lng()});
	}

	setarMovimentoCaminhao(cordenadas, rotaDetalhe, cor.cor);
	setarMarcadoresNoMapa();
	descreverLocaisEnterga(locaisDeEntregasPer, rotaDetalhe, cor, rotasCordenadas.length);
	// atualizarPacotes(arrayCodigos);
	rotasCordenadas.push(setarRotas(cordenadas, cor.cor));
	// if (rotasCordenadas.length == numeroDeRotas) setarTodasRotas();
}

function adicionarMarcador(latitude, longitude, img, titulo, codigo){
	var contentString = retornarJanelaInfo(titulo);

	var Marker = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img, /* img/gray/pacote_gray_1.png", || pacoteImg, */
		title: titulo,
		aberto: false,
		codigo: codigo
	});
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	Marker.addListener('click', function() {
		if(this.aberto){
			infowindow.close(map, this);
			this.aberto = false;
		} else {
			infowindow.open(map, this);
			this.aberto = true;
		}
		/*this.icon = "img/green/pacote_green_f.png";
		this.setMap(null);
		this.setMap(map);*/
	});
	MarcadoreEntregas.push({Marker: Marker, setarMapa: true});
	return MarcadoreEntregas.length - 1;
}


function setarMarcadoresNoMapa(){
	for (var i = 0; i < MarcadoreEntregas.length; i++) {
		MarcadoreEntregas[i].Marker.setMap(null);
		MarcadoreEntregas[i].Marker.setMap(map);
	}
}


function setarRotas(cordenadas, cor){
	var rota = new google.maps.Polygon({
		paths: cordenadas,
		strokeColor: cor,
		strokeOpacity: 0.9,
		strokeWeight: 5,
		fillColor: '#aaaaaa',
		fillOpacity: 0
	});
	return rota;
}

function setarTodasRotas(){
	setarMarcadoresNoMapa();
	for (var i = 0; i < rotasCordenadas.length; i++) {
		rotasCordenadas[i].setMap(null);
		rotasCordenadas[i].setMap(map);
		/* caminhaos[i].setarMapa = true;
		caminhaos[i].caminhao.setMap(null);
		caminhaos[i].caminhao.setMap(map); */
	}
}


// var caminhaos = [];
var caminhao =  null;
var setarCaminhaoMapa = true;
function setarMovimentoCaminhao(cordenadas, rotaDetalhe, cor){
	var indeceDeRota = 1;
	var placa = rotaDetalhe.caminhao.placa;
	// var 
	caminhao = new google.maps.Marker({
		position: {lat: parseFloat(rotaDetalhe.caminhao.latitude), lng: parseFloat(rotaDetalhe.caminhao.longitude)},
		map: map,
		icon: "img/"+cor+"/truck_"+cor+"_LD.png", /*pacoteImg, || caminhaoImg, */
		title: rotaDetalhe.caminhao.placa,
		motorista: rotaDetalhe.motorista
	});
	/*
	 * Desmenbrando o array caminhaos
	 * Suas Posições são imcrementadas em objtos json com os seguintes atributos:
		 - caminhao: é o objeto do Google setado no mapa
		 - setarMapa: é uma boleana que diz se o caminhao deve ser, ou não, setado no mapa
		 - codigo: é para identificação do caminhão (será usado como parametro para requisitar sua geolocalização)
	*/
	/* caminhaos.push({
		caminhao: caminhao, 
		setarMapa: true, 
		codigo: rotaDetalhe.caminhao.codigo, 
		oldLng: 0, newLng: 0,
		motorista: rotaDetalhe.motorista
	}); */
	caminhao.setMap(null);
	caminhao.setMap(map);
	// var numeroIndeceDefinitivo = caminhaos.length - 1;
}

setarPrimeiroClasse = true;
function descreverLocaisEnterga(array, rotaDetalhe, cor, numeroDaRota){
	var duracao = 0, dividir = true, indiceUnidade = 0, unidades = ['segundos', 'minutos', 'horas'];
	var classeDiv = "hidden";
	var distancia = rotaDetalhe.distancia%1000==0 ? rotaDetalhe.distancia/1000 : rotaDetalhe.distancia/1000+1;

	/* Calculo de temo da rota estimada	*/
	do {
		duracao = rotaDetalhe.duracao%60==0 ? rotaDetalhe.duracao/60 : rotaDetalhe.duracao/60+1;
		indiceUnidade++;
		dividir = indiceUnidade == unidades.length - 1 ? false : true;
	} while (duracao > 60 && dividir);

	distancia = distancia.toFixed(1).replace(".", ",")+"Km";
	duracao = parseInt(duracao) + " " + unidades[indiceUnidade];

	if (setarPrimeiroClasse) {
		classeDiv = "descritivoRota";
		// $("#pacoteCorDemostrativo").html("<img src=\"img/"+cor.cor+"/pacote_"+cor.cor+".png\">");
		setarPrimeiroClasse = false;
	}

	var tabela  = 	"<div id='local_"+cor.cor+"' name='locais_demostrativo' class='"+classeDiv+"'>";
		// tabela += 		"<h4><b>Placa: </b>"+rotaDetalhe.caminhao.placa+"</h4>";
		tabela += 		"<h4><b>Distâcia: </b>"+distancia+"</h4>";
		tabela += 		"<h4><b>Duração: </b>"+duracao+"</h4>";
		tabela += 		"<input type='hidden' id='rota_"+cor.cor+"' value='"+numeroDaRota+"'>";
		tabela += 		"<table class=\"table\">";
		tabela += 			"<tr>";
		tabela += 				"<td><b>Icone</b></td>";
		tabela += 				"<td><b>Endereço</b></td>";
		tabela += 				"<td><b>Confirmar</b></td>";
		tabela += 			"</tr>";

	for (var i = 0; i < array.length; i++) {
		tabela += 			"<tr>";
		tabela += 				"<td width='15%'>";
		tabela += 					"<img id='imagem_pacote_"+array[i].codigo+"' src='"+array[i].imagem+"' width='100%'>";
		tabela += 				"</td>";
		tabela += 				"<td>";
		tabela += 					"<input type='hidden' id='marcador_indice_"+array[i].codigo+"' value='"+array[i].indiceImagem+"'>";
		tabela += 					"<b>"+array[i].pedido+"</b>: "+array[i].nome;
		tabela += 				"</td>";
		tabela += 				"<td id='buttonCofCan_"+array[i].codigo+"'>";

		tabela += array[i].bool_entrega == 0 ? retornaBotao("check", array[i].codigo) : retornaBotao("times", array[i].codigo);

		tabela += 				"</td>";
		tabela += 			"</tr>";
	}
		tabela += 		"</table>";
		tabela += 	"</div>";

	selectDeSelecaoDeCarga.push("<option value=\""+cor.cor+"\">Rota "+cor.traducao+"</option>");
	$("#paginaEntrega").html(tabela);

	localizarumavez();
	// $("#locaisDeEntregaDemostrativo").html($("#locaisDeEntregaDemostrativo").html()+tabela);
}

function retornaBotao(tipo, codigo){
	var resultado = "";
	if (tipo == "check") {
		resultado += "<butto class='btn btn-success btn-block' onclick='confirmaPedido("+codigo+")'>";
		resultado += 	"<i class='fa fa-check'></i>&nbsp;&nbsp;Confirmar"
		resultado += "</button>";
	} else {
		resultado += "<butto class='btn btn-success btn-block' disabled>";
		resultado += 	"<i class='fa fa-check'></i>&nbsp;&nbsp;Confirmar"
		resultado += "</button>";
		/*resultado += "<butto class='btn btn-danger btn-block' onclick='cancelarPedido("+codigo+")'>";
		resultado += 	"<i class='fa fa-check'></i>&nbsp;&nbsp;Cancelar"
		resultado += "</button>";*/
	}
	return resultado;
}


function retornarJanelaInfo(titulo){
	var conteudo = '' +
		'<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<div id="bodyContent">'+
				titulo +
			'</div>'+
		'</div>';

	return conteudo;
}


function atualizarPacotes(){
	for (var i = 0; i < MarcadoreEntregas.length; i++) {
		if (MarcadoreEntregas[i].Marker.codigo != undefined) {
			$.ajax({
				url: urlWebService+'funcoesController.php',
				type: 'POST',
				dataType: 'text',
				data: {
					'pasquesaPacote': true,
					'id': MarcadoreEntregas[i].Marker.codigo
				}
			}).done( function(data){
				var objData = JSON.parse(data);
				var arrayLocalizacao = objData.endEntrega.split(",");
				var indiceImagem = document.getElementById("marcador_indice_"+objData.codigo).value;
				
				var corPacote = objData.bool_entrega == 0 ? arrayDeCores[0].cor : "green";
				var imagemIcone = "img/"+corPacote+"/pacote_"+corPacote+"_"+indiceImagem+".png";

				for (var j = 0; j < MarcadoreEntregas.length; j++) {
					if (objData.codigo == MarcadoreEntregas[j].Marker.codigo) {
						MarcadoreEntregas[j].Marker.icon = imagemIcone;
						MarcadoreEntregas[j].Marker.setMap(null);
						MarcadoreEntregas[j].Marker.setMap(map);
					}
				}
			});
		}
	}
}





/* Diferenca entre posições do google map */
/*var Marker = new google.maps.Marker({
	position: {lat: -21.780303860735405, lng: -46.53958797454834},
	map: map,
	title: "top-right",
});

var Marker = new google.maps.Marker({
	position: {lat: -21.780423415981158 , lng: -46.57323360443115},
	map: map,
	title: "top-left",
});

var Marker = new google.maps.Marker({
	position: {lat: -21.799272045943304, lng: -46.57701015472412},
	map: map,
	title: "bottun-left",
});

var Marker = new google.maps.Marker({
	position: {lat: -21.79616398590259, lng: -46.54186248779297},
	map: map,
	title: "bottun-right",
});*/