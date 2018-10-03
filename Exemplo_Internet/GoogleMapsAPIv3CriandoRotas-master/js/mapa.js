
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

var MarcadoreEntregas = []; // É um array global para armazenar os ponto de referencia
var rotas = []; // Fundamental para tracar as rotas
var waypts = []; // Pontos de entregas setados como parametro rotas
var arrayDeCores = ['blue', 'green', 'red', 'purple', 'orange', 'gray'];
var NumeroMaximoDePacotes = 10;
var corRotaUsada;

//  Metodo de retorno do google api equivalente ao initmap
function initialize() {	
	directionsDisplay = new google.maps.DirectionsRenderer();
	var latlng = new google.maps.LatLng(-21.788592788284546,-46.55911445617676);
	var options = {
		zoom: 14,
		center: latlng,
		rotateControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		/*styles: [
			{elementType: 'geometry', stylers: [{color: '#242f3e'}]},
			{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
			{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
			{
				featureType: 'administrative.locality',
				elementType: 'labels.text.fill',
				stylers: [{color: '#d59563'}]
			},
			{
				featureType: 'poi',
				elementType: 'labels.text.fill',
				stylers: [{color: '#d59563'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'geometry',
				stylers: [{color: '#263c3f'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'labels.text.fill',
				stylers: [{color: '#6b9a76'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry',
				stylers: [{color: '#38414e'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry.stroke',
				stylers: [{color: '#212a37'}]
			},
			{
				featureType: 'road',
				elementType: 'labels.text.fill',
				stylers: [{color: '#9ca5b3'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry',
				stylers: [{color: '#746855'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry.stroke',
				stylers: [{color: '#1f2835'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'labels.text.fill',
				stylers: [{color: '#f3d19c'}]
			},
			{
				featureType: 'transit',
				elementType: 'geometry',
				stylers: [{color: '#2f3948'}]
			},
			{
				featureType: 'transit.station',
				elementType: 'labels.text.fill',
				stylers: [{color: '#d59563'}]
			},
			{
				featureType: 'water',
				elementType: 'geometry',
				stylers: [{color: '#17263c'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.fill',
				stylers: [{color: '#515c6d'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.stroke',
				stylers: [{color: '#17263c'}]
			}
		]*/
	};

	map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(map);
	/* directionsDisplay.setPanel(document.getElementById("trajeto-texto")); */

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function (position) {

			pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.setCenter(pontoPadrao);

			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({
				"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
			},
			function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					$("#txtEnderecoPartida").val(results[0].formatted_address);
				}
			});
		});
	}
}
initialize();

/* Tentativa de desenho no mapa */
/* var cityCircle = new google.maps.Circle({
	strokeColor: 'black',
	strokeOpacity: 0.2,
	strokeWeight: 2,
	fillColor: 'lightblue',
	fillOpacity: 0.35,
	map: map,
	center: {lat: -21.810827062319106,lng: -46.53087615966797},
	radius: 150
}); */
/* var Marker = new google.maps.Marker({
	position: {lat: latitude, lng: longitude},
	map: map,
	icon: img, //"img/gray/pacote_gray_1.png",//pacoteImg
	title: titulo,
});
MarcadoreEntregas.push(Marker); */
/* A tentativa foi bem sucedita kkkkkkkkkkkkkkk */



// pontos de referencia no caso da aplicação são ponto de locais de entrega
waypts = [];
waypts.push({
	location: "-21.780204231287797,-46.56462907791138", // rua ceara 149 poços de caldas minas gerais
	stopover: true
});
waypts.push({
	location: "-21.78215695584276,-46.56658172607422", // rua assis figueiredo 45 poços de caldas minas gerais
	stopover: true
});
setarRota({
	origem: $("#txtEnderecoPartida").val(), 
	destino:$("#txtEnderecoChegada").val(), 
	entregas: waypts,
	placa: "Placa: AAA-9999"
});


waypts = [];
waypts.push({
	location: "-21.801752468555826,-46.56855717301369", 
	stopover: true
});
waypts.push({
	location: "-21.795093084212976,-46.555917263031006", 
	stopover: true
});
setarRota({
	origem: $("#txtEnderecoPartida").val(), 
	destino:$("#txtEnderecoChegada").val(), 
	entregas: waypts,
	placa: "Placa: BBB-9999"
});



waypts = [];
waypts.push({
	location: "-21.81144961216114,-46.501664221286774", 
	stopover: true
});
setarRota({
	origem: $("#txtEnderecoPartida").val(), 
	destino: $("#txtEnderecoChegada").val(), 
	entregas: waypts,
	placa: "Placa: CCC-9999"
});
// var cordenadas = [];
function setarRota(rota){
	rotas.push(rota);
}


var numDefinitivoDeAlgumaCoisa = 0;
$("form").submit(function(event) {
	event.preventDefault();
	/*var enderecoPartida = $("#txtEnderecoPartida").val();
	var enderecoChegada = $("#txtEnderecoChegada").val();*/
	var request = null;
	$("#trajeto_descritivo").html("");
	$("#trajeto_descritivo2").html("");
	// var referencia = $("#referencia").val();
	for (var indice = 0; indice < rotas.length; indice++) {
		request = {
			origin: rotas[indice].origem,
			destination: rotas[indice].destino,
			waypoints: rotas[indice].entregas,
			optimizeWaypoints: true,
			travelMode: google.maps.TravelMode.DRIVING
		};
		directionsService.route(request, function(result, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				/*if (render != 0) {
					window.print();
				}
				render++;*/
				console.log(result);
				console.log(numDefinitivoDeAlgumaCoisa);
				tratandoResultado(
					result, 
					arrayDeCores[numDefinitivoDeAlgumaCoisa], 
					rotas[numDefinitivoDeAlgumaCoisa].placa
				);
				numDefinitivoDeAlgumaCoisa++;
			} else {
				alert("Erro: não conseguiu localizar seu endereço");
			}
		});
	}
});


function tratandoResultado(objMap, cor, placa){
	var cordenadas = [];
	var pedido = objMap.request; // retorna o que foi pedido (origem, destino e pontos de referencias)
	var pontosEntrega = pedido.waypoints; // retorna um array de pontos de referencias
	
	var origen = pedido.origin.location;// cordenadas da origem (lat, lng)
	adicionarMarcador(origen.lat(), origen.lng(), "img/loja.png", "Casa Duarte ;)");
	var destino = pedido.destination.location; // cordenadas do destino (lat, lng)
	adicionarMarcador(destino.lat(), destino.lng(), "img/loja.png", "Casa Duarte ;)");
	
	var rotas = objMap.routes; // retonar o objeto de rotas
	var paradas = rotas[0].legs; // retorna um array de paradas
	var cordenasRota = rotas[0].overview_path; // retorna as cordenadas da rota que ele traça

	var localizacao = {}; // está sendo usado de idece para referenciar um objeto de duas funções (lat() e lng())
	var latitude = 0; // serve de indice para ler a latitude de um ponto de referencia
	var longitude = 0; // serve de indice para ler a longitue de um ponto de referencia
	var imagem = ""; // serve de indice para saber qual imagem deve ser setada no marcador do mapa
	var numImagemReference = 0; // serve para referir a imagem

	// var locaisDeEntrega = []; // indice para setar os locais de entrega
	// var trajetos = []; // guarda um array de trajetos de cada ponto de parada no trajeto
	
	var locaisDeEntregasPer = []; // Configuração para escrever os locais de entrega no mapa
	var locaisDeEntregaIndice = null; // Indice de Apoio para matriz acima que de gardar o nome do local e a imagem

	for (var i = 0; i < paradas.length; i++) {
		if (i != paradas.length - 1) {
			numImagemReference++; // referir a imagemque começa contagem apartir do 1 e não do 0
			
			latitude = paradas[i].end_location.lat(); 
			longitude = paradas[i].end_location.lng();

			if (numImagemReference == pontosEntrega.length || numImagemReference > NumeroMaximoDePacotes) {
				imagem = "img/"+cor+"/pacote_"+cor+"_f.png";
			} else {
				imagem = "img/"+cor+"/pacote_"+cor+"_"+numImagemReference+".png";
			}

			adicionarMarcador(latitude, longitude, imagem, paradas[i].end_address);
			locaisDeEntregaIndice = {nome: paradas[i].end_address, imagem: imagem};
			locaisDeEntregasPer.push(locaisDeEntregaIndice);
		}
		/* for (var j = 0; j < paradas[i].steps.length; j++) {
			trajetos.push(paradas[i].steps[j]);
		}*/
	}

	for (var i = 0; i < cordenasRota.length; i++) {
		cordenadas.push({lat: cordenasRota[i].lat(), lng: cordenasRota[i].lng()});
	}

	setarRotas(cordenadas, cor);
	setarMovimentoCaminhao(cordenadas, placa, cor);
	setarMarcadoresNoMapa();
	descreverLocaisEnterga(locaisDeEntregasPer);
	// descreverTrajeto(trajetos);
}

function adicionarMarcador(latitude, longitude, img, titulo){
	var Marker = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img, //"img/gray/pacote_gray_1.png",//pacoteImg
		title: titulo,
	});
	MarcadoreEntregas.push(Marker);
}

function setarMarcadoresNoMapa(){
	for (var i = 0; i < MarcadoreEntregas.length; i++) {
		MarcadoreEntregas[i].setMap(map);
	}
}


function setarRotas(cordenadas, cor){
	var bermudaTriangle = new google.maps.Polygon({
		paths: cordenadas,
		strokeColor: cor,
		strokeOpacity: 0.9,
		strokeWeight: 5,
		fillColor: '#aaaaaa',
		fillOpacity: 0
	});
	bermudaTriangle.setMap(map);
}



var caminhaos = [];
var setarCaminhaoMapa = true;
function setarMovimentoCaminhao(cordenadas, placa, cor){
	var indeceDeRota = 1;
	var caminhao = new google.maps.Marker({
		position: cordenadas[0],
		map: map,
		icon: "img/"+cor+"/truck_"+cor+".png", //pacoteImg, //caminhaoImg,
		title: placa,
	});
	caminhaos.push({caminhao: caminhao});
	caminhao.setMap(map);
	var numeroIndeceDefinitivo = caminhaos.length - 1;

	setTimeout(function(){
		setInterval(function(){
			if (setarCaminhaoMapa) {
				if (indeceDeRota == cordenadas.length - 1) {
					indeceDeRota = 0;
				}
				caminhaos[numeroIndeceDefinitivo].caminhao.setMap(null);
				caminhaos[numeroIndeceDefinitivo].caminhao = new google.maps.Marker({
					position: cordenadas[indeceDeRota],
					map: map,
					icon: "img/"+cor+"/truck_"+cor+".png", //pacoteImg, //caminhaoImg,
					title: placa,
				});
				caminhaos[numeroIndeceDefinitivo].caminhao.setMap(map);
				indeceDeRota++;
			}
		}, 1000)
	}, 1000 );
}

function descreverLocaisEnterga(array){
	var tabela = "<div class='col-xs-4'>";

	for (var i = 0; i < array.length; i++) {
		tabela += 		"<table class='table'>";
		tabela += 			"<tr>";
		tabela += 				"<td width='20%'>";
		tabela += 					"<img src='"+array[i].imagem+"' width='100%'>";
		tabela += 				"</td>";
		tabela += 				"<td>";
		tabela += 					array[i].nome;
		tabela += 				"</td>";
		tabela += 			"</tr>";
		tabela += 		"</table>";
	}
	tabela += 	"</div>";

	$("#trajeto_descritivo").html($("#trajeto_descritivo").html()+tabela);
}





















/************************************************************************************************************/
/** Função de Teste */
/************************************************************************************************************/
function marcadores(){
	var Marker;

	/*Marker = new google.maps.Marker({
		position: {lat: -21.801517634953733, lng: -46.568141682073474},
		map: map,
	
		icon: pacoteImg,
		title:"Minha Casa",
	
	});
	Marker.setMap(map);*/


	Marker = new google.maps.Marker({
		position: {lat: -21.78215695584276, lng: -46.56658172607422},
		map: map,
	
		icon: "img/gray/pacote_gray_1.png",//pacoteImg
		title:"Minha Casa",
	
	});


	Marker.setMap(map);
	Marker = new google.maps.Marker({
		position: {lat: -21.780204231287797, lng: -46.56462907791138},
		map: map,
	
		icon: "img/gray/pacote_gray_f.png", // pacoteImg,
		title:"Minha Casa",
	
	});
	Marker.setMap(map);

	Marker = new google.maps.Marker({
		position: {lat: -21.791617634953733, lng: -46.558241682073474},
		map: map,
		/*draggable: false,*/
		icon: caminhaoImg,
		title:"Minha Casa",
		/*query: 'teste'*/
	});
	Marker.setMap(map);
}

/*function descreverTrajeto(objTrajeto){
	var trajeto = "<table class='table'>"; // descreve o trajeto a ser percorrido
	var trajeto2 = "<table class='table'>"; // descreve o trajeto a ser percorrido
	var icone = "";

	for (var i = 0; i < objTrajeto.length; i++) {
		icone = definirIcone(objTrajeto[i].maneuver);
		if ( i < (objTrajeto.length - 1) / 2 ) {
			trajeto += 	"<tr>";
			trajeto += 		"<td>";
			trajeto += 			icone != "" ? "<i class='fa fa-"+icone+"'></i>" : "";
			trajeto += 		"</td>";
			trajeto += 		"<td>";
			trajeto += 			objTrajeto[i].instructions;
			trajeto += 		"</td>";
			trajeto += 	"</tr>";
		}
		else {
			trajeto2 += "<tr>";
			trajeto2 += 	"<td>";
			trajeto2 += 		icone != "" ? "<i class='fa fa-"+icone+"'></i>" : "";
			trajeto2 += 	"</td>";
			trajeto2 += 	"<td>";
			trajeto2 += 		objTrajeto[i].instructions;
			trajeto2 += 	"</td>";
			trajeto2 += "</tr>";
		}
	}

	trajeto += "</table>";
	trajeto2 += "</table>";
	$("#trajeto_descritivo").html(trajeto);
	$("#trajeto_descritivo2").html(trajeto2);
}*/


function definirIcone(descricao){
	switch(descricao){
		case "turn-right": descricao = "arrow-right"; break;
		case "straight": descricao = "arrow-up"; break;
		case "turn-left": descricao = "arrow-right"; break;
		default: descricao = "";
	}
	return descricao;
}