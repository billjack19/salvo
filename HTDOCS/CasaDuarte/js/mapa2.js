
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var rotasCordenadas_Global = [];
var arrayIndiceMarcador = [];
var arrayIndeceSetados = [];
var MarcadoreEntregas = []; /* É um array global para armazenar os ponto de referencia */
var MarcadorePendente = [];
var corConfirmacao = "green";
var corPendente = "yellow";

var arrayDeCores = [
	{ cor: 'blue'	, traducao: "Azul"		}, 
	/* { cor: 'green'	, traducao: "Verde"		}, */
	{ cor: 'purple'	, traducao: "Roxo"		},
	{ cor: 'orange'	, traducao: "Laranja"	},
	{ cor: 'red'	, traducao: "Vermelha"	},
	{ cor: 'brown'	, traducao: "Marron"	},
	{ cor: 'gray'	, traducao: "Cinza"		}
];
var NumeroMaximoDePacotes = 10;
var corRotaUsada;
var selectDeSelecaoDeCarga = [];

var arrayRegioes = [];
var iconeBairro = "img/bairro.png";
var iconeRegiao = "img/region.png";

/* Metodo de retorno do google api equivalente ao initmap */
function initialize() {	
	document.getElementById("mapa").style.height = $(document).height()+"px";
	directionsDisplay = new google.maps.DirectionsRenderer();
	var latlng = new google.maps.LatLng(-21.788592788284546,-46.55911445617676);
	var options = {
		zoom: 14,
		center: latlng,
		rotateControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	};
	map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(map);
	carregarContatos(); /* pegarData() */
}



var numDefinitivoDeAlgumaCoisa = 0;
var tempoDelay = 1000;


var indiceGeralRotas_Global = 0;

function tracarRotas(){
	/* verifica se já percorreu todas as rotas */
	if (indiceGeralRotas_Global < rotas_Global.length) {
		/* monta um objeto com os pontos de referencia no caso as entragas */

		var request = {
			origin: rotas_Global[indiceGeralRotas_Global].endInicial,
			destination: rotas_Global[indiceGeralRotas_Global].endFinal,
			waypoints: rotas_Global[indiceGeralRotas_Global].entregas,
			optimizeWaypoints: true,
			travelMode: google.maps.TravelMode.DRIVING
		};

		/* faz a requiisção ao servidor da Google para tracar as rotas ou seja buscar as cordenadas */
		directionsService.route(request, function(result, status) {/* retorno da função */
			/* verifica se conseguiu tracar a rota */
			if (status == google.maps.DirectionsStatus.OK) {

				var arrayPontosEntregas = result.request.waypoints; /* para objeto do google */
				var localizacao = []; /* para o objeto do web service */
				var igualEntregas = false;
				// var indiceDaRota_p_Result = 0;
				var diferencaDescontoLat = 0;
				var diferencaDescontoLng = 0;
				var entregasDetalhe = rotas_Global[indiceGeralRotas_Global].endEntrega;
				var arrayIndeceSetados = [];
				

				/* percorrer as entregas */
				for (var i = 0; i < entregasDetalhe.length; i++) {
					for (var j = 0; j < arrayPontosEntregas.length; j++) {
						if (arrayIndeceSetados.indexOf(i) == -1) {
							localizacao = entregasDetalhe[i].endEntregaItem.split(",");

							/* tira diferença entre a latitude do Google com a da entraga */
							diferencaDescontoLat = localizacao[0] - arrayPontosEntregas[j].location.location.lat();
							diferencaDescontoLng = localizacao[1] - arrayPontosEntregas[j].location.location.lng();

							/* verificação para obteer resultado positivo */
							diferencaDescontoLat = diferencaDescontoLat < 0 ? diferencaDescontoLat * -1 : diferencaDescontoLat;
							diferencaDescontoLng = diferencaDescontoLng < 0 ? diferencaDescontoLat * -1 : diferencaDescontoLng;

							if (diferencaDescontoLat <  0.00000001 && diferencaDescontoLng <  0.00000001) { 
								entregasDetalhe[i].indicePosicao = j;
								arrayIndeceSetados.push(i);
								j = entregasDetalhe.length;
							}
						}
					}
				}
				rotas_Global[indiceGeralRotas_Global].objMap = result;
				tratandoResultado();
				numDefinitivoDeAlgumaCoisa++;
			} else console.log("Erro: não conseguiu traçar a rota desejaa");
		});
	} else setarSelectDeRotas();
}


function setarSelectDeRotas(){
	// if (numDefinitivoDeAlgumaCoisa == rotas_Global.length) {
	var selectOpcaoDeRotas = "<select id='selectDeSelecaoDeRotas' class=\"form-control\" onchange=\"alertaValor(this.value)\">";
	for (var i = 0; i < selectDeSelecaoDeCarga.length; i++) {
		selectOpcaoDeRotas += selectDeSelecaoDeCarga[i];
	}
	selectOpcaoDeRotas += "</select>";
	$("#selectOpcaoDeRotas").html(selectOpcaoDeRotas);
	setarTodasRotas();
	setarMarcadoresNoMapa(); /* ?????? */
	// }
}



function tratandoResultado(){ // objMap, corObject, rotaDetalhe){/*cor, /*, numeroDeRotas */
	var objetoEntrega = rotas_Global[indiceGeralRotas_Global].endEntrega;

	arrayIndiceMarcador.push([]);

	var pedido = rotas_Global[indiceGeralRotas_Global].objMap.request; /* retorna o que foi pedido (origem, destino e pontos de referencias) */
	var pontosEntrega = pedido.waypoints; /* retorna um array de pontos de referencias */
	/* cordenadas da origem (lat, lng) */
	adicionarMarcadorSimples(pedido.origin.location.lat(), pedido.origin.location.lng(), "img/loja.png", "Casa Duarte ;)");
	/* cordenadas do destino (lat, lng) */
	adicionarMarcadorSimples(pedido.destination.location.lat(), pedido.destination.location.lng(), "img/loja.png", "Casa Duarte ;)"); 

	// var rotas = objMap.routes; /* retonar o objeto de rotas */
	var paradas = rotas_Global[indiceGeralRotas_Global].objMap.routes[0].legs; /* retorna um array de paradas */
	var cordenadas = [];
	var cordenasRota = rotas_Global[indiceGeralRotas_Global].objMap.routes[0].overview_path; /* retorna as cordenadas da rota que ele traça */


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

	/* Verificação de proximidade de endereço para saber se esta é o pacote correto e da confiabilidade dos dados */
	var arrayEndEntrega_paramentro = [];
	var oldProximo = 0, newProximo;
	var indiceRealEnterga = 0;


	for (var i = 0; i < paradas.length; i++) {
		rotas_Global[indiceGeralRotas_Global].distancia += parseFloat(paradas[i].distance.value);
		rotas_Global[indiceGeralRotas_Global].duracao += parseFloat(paradas[i].duration.value);

		if (i != paradas.length - 1) {
			numImagemReference++; /* referir a imagemque começa contagem apartir do 1 e não do 0 */
			
			latitude = paradas[i].end_location.lat(); 
			longitude = paradas[i].end_location.lng();

			indiceImagemReference = numImagemReference;
			if (numImagemReference == pontosEntrega.length || numImagemReference > NumeroMaximoDePacotes) {
				indiceImagemReference = "f";
			}


			for (var j = 0; j < objetoEntrega.length; j++) {
				arrayEndEntrega_paramentro = objetoEntrega[j].endEntregaItem.split(",");

				newProximo = latitude - arrayEndEntrega_paramentro[0];
				if(newProximo < 0) newProximo *= (-1);

				if (j == 0) {
					oldProximo = latitude - arrayEndEntrega_paramentro[0];
					if (oldProximo < 0) oldProximo *= (-1);
					indiceRealEnterga = j;
				} else if (oldProximo > newProximo) {
					oldProximo = latitude - arrayEndEntrega_paramentro[0];
					if (oldProximo < 0) oldProximo *= (-1);
					indiceRealEnterga = j;
				}
			}


			corReference = objetoEntrega[indiceRealEnterga].bool_entrega == 1 ? corConfirmacao : rotas_Global[indiceGeralRotas_Global].corObject.cor;

			arrayCodigos.push({
				pedido: objetoEntrega[indiceRealEnterga].pedido,
				entrega: rotas_Global[indiceGeralRotas_Global].codigo,
				codigo: objetoEntrega[indiceRealEnterga].pedido /* objetoEntrega[indiceRealEnterga].codigo[0] */
			});
			

			imagem = "img/"+corReference+"/pacote_"+corReference+"_"+indiceImagemReference+".png";

			rotas_Global[indiceGeralRotas_Global].latitude = latitude;
			rotas_Global[indiceGeralRotas_Global].longitude = longitude;
			rotas_Global[indiceGeralRotas_Global].img = imagem;
			// rotas_Global[indiceGeralRotas_Global].titulo = objetoEntrega[indiceRealEnterga].descEndEndrega;
			rotas_Global[indiceGeralRotas_Global].objetoEntrega = objetoEntrega[indiceRealEnterga];
			rotas_Global[indiceGeralRotas_Global].indiceRota = rotasCordenadas_Global.length

			arrayIndiceMarcador[arrayIndiceMarcador.length - 1].push( adicionarMarcador(rotas_Global[indiceGeralRotas_Global]) );

			locaisDeEntregaIndice = {
				nome: /* paradas[i].end_address */ objetoEntrega[indiceRealEnterga].descEndEndrega, 
				imagem: imagem,
				indiceImagem: indiceImagemReference, 
				pedido: objetoEntrega[indiceRealEnterga].pedido,
				codigo: objetoEntrega[indiceRealEnterga].pedido,
				itens: objetoEntrega[indiceRealEnterga].itens, /* objetoEntrega[indiceRealEnterga].codigo[0] */
				cliente: objetoEntrega[indiceRealEnterga].cliente
			};
			locaisDeEntregasPer.push(locaisDeEntregaIndice);
		}
	}

	for (var i = 0; i < cordenasRota.length; i++) {
		cordenadas.push({lat: cordenasRota[i].lat(), lng: cordenasRota[i].lng()});
	}

	/* console.log(options.corObject); */
	setarMovimentoCaminhao(cordenadas, rotas_Global[indiceGeralRotas_Global]);
	descreverLocaisEnterga(locaisDeEntregasPer, rotas_Global[indiceGeralRotas_Global], rotasCordenadas_Global.length);
	rotasCordenadas_Global.push(setarRotas(cordenadas, rotas_Global[indiceGeralRotas_Global]));
	atualizarPacotes(arrayCodigos); /* Função em lup para saber se o pedido ja foi confirmado ou não */

	indiceGeralRotas_Global++;
	tracarRotas();
	/* if (rotasCordenadas_Global.length == numeroDeRotas) setarTodasRotas(); */
}


/* Serve para setar os pontos de origem e entrega */
function adicionarMarcadorSimples(latitude, longitude, img, titulo){
	/*var contentString = retornarJanelaInfo(titulo);*/
	var MarcadorSimples = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img,
		title: titulo,
		aberto: false
	});
	/*var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	MarcadorSimples.addListener('click', function() {
		if(this.aberto){
			infowindow.close(map, this);
			this.aberto = false;
		}
		else {
			infowindow.open(map, this);
			this.aberto = true;
		}
	}*/
	MarcadorSimples.setMap(map);
}


function adicionarMarcador(options){ // latitude, longitude, img, titulo, objetoEntrega, rotaDetalhe, indiceRota){
	/* var contentString = retornarJanelaInfo(titulo); */
	var Marker = new google.maps.Marker({
		position: {lat: options.latitude, lng: options.longitude},
		map: map,
		icon: options.img, /* img/gray/pacote_gray_1.png", || pacoteImg, */
		title: options.objetoEntrega.descEndEndrega,
		aberto: false,
		codigo: options.objetoEntrega.codigo[0],
		pedido: options.objetoEntrega.pedido,
		cliente: options.objetoEntrega.cliente,
		itens: options.objetoEntrega.itens,
		placa: options.caminhao.placa,
		motorista: options.motorista.nome
	});
	/* var infowindow = new google.maps.InfoWindow({
		content: contentString
	}); */
	Marker.addListener('click', function() {
		var gradeItens = "";

		gradeItens += "<table class='table'>";
		gradeItens += 	"<tr>";
		gradeItens += 		"<td align='center'><b>Codigo</b></td>";
		gradeItens += 		"<td><b>Descrição</b></td>";
		gradeItens += 		"<td align='center'><b>Qtd.</b></td>";
		gradeItens += 		"<td align='center'><b>Uni.</b></td>";
		gradeItens += 	"</tr>";

		var totalQdt = 0;
		for (var i = 0; i < this.itens.length; i++) {
			totalQdt += this.itens[i].quantidade;
			gradeItens += 	"<tr>";
			gradeItens += 		"<td align='center'>"+this.itens[i].codigo+"</td>";
			gradeItens += 		"<td>"+this.itens[i].descricao+"</td>";
			gradeItens += 		"<td align='center'>"+this.itens[i].quantidade+"</td>";
			gradeItens += 		"<td align='center'>"+this.itens[i].unidade+"</td>";
			gradeItens += 	"</tr>";
		}
		gradeItens += 	"<tr>";
		gradeItens += 		"<td align='center'></td>";
		gradeItens += 		"<td align='center'></td>";
		gradeItens += 		"<td align='center'>"+totalQdt+"</td>";
		gradeItens += 		"<td align='center'></td>";
		gradeItens += 	"</tr>";
		gradeItens += "</table>";

		$("#gradeItensPedido").html(gradeItens);
		$("#modalPedidoVisualizaPedido").html(this.pedido);
		$("#modalPedidoVisualizaCliente").html(this.cliente.nome);
		var listaTelfone = "";
		for (var i = this.cliente.telefone.length - 1; i >= 0; i--) {
			listaTelfone += this.cliente.telefone[i]+"<br>";
		}
		$("#modalPedidoVisualizaTelefone").html(listaTelfone);
		$("#modalPedidoVisualizaEndereco").html(this.title);
		$("#modalPedidoVisualizaPlaca").html(this.placa);
		$("#modalPedidoVisualizaMotorista").html(this.motorista);
		$("#modalPedidoVisualiza").modal('show');
		  /*
		  *  if(this.aberto){ infowindow.close(map, this); this.aberto = false; }
		 *   else { infowindow.open(map, this); this.aberto = true; }
		*/
	});
	MarcadoreEntregas.push({Marker: Marker, setarMapa: true, indiceRota: options.indiceRota});
	return MarcadoreEntregas.length - 1;
}


/*function adicionarMarcador(latitude, longitude, img, titulo, codigo){
	var contentString = retornarJanelaInfo(titulo);

	var Marker = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img, 
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
	});
	MarcadoreEntregas.push({Marker: Marker, setarMapa: true});
	return MarcadoreEntregas.length - 1;
}*/


function setarMarcadoresNoMapa(){
	for (var i = 0; i < MarcadoreEntregas.length; i++) {
		/*console.log("setarMarcadoresNoMapa: ")
		console.log("MarcadoreEntregas[i].indiceRota: ");
		console.log(MarcadoreEntregas[i].indiceRota);
		console.log("rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota]:");
		if(rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota] != undefined){
			console.log(rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota]);
			console.log("rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota].hora_saida:");
			console.log(rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota].hora_saida);
		}*/

		if (
			rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota] 			!= undefined 	&& 
			rotasCordenadas_Global[MarcadoreEntregas[i].indiceRota].hora_saida == "0"
		) {
			if (!document.getElementById("checkHora_Saida").checked) {
				MarcadoreEntregas[i].Marker.setMap(map);
				MarcadoreEntregas[i].setarMapa = true;
			} else {
				MarcadoreEntregas[i].Marker.setMap(null);
				MarcadoreEntregas[i].setarMapa = false;
			}
		} else {
			MarcadoreEntregas[i].Marker.setMap(map);
			MarcadoreEntregas[i].setarMapa = true;
		}
	}
}


/* Desernha a rota no mapa colorindo a rua com a cor designada */
function setarRotas(cordenadas, rotaDetalhe){
	var rota = new google.maps.Polygon({
		paths: cordenadas,
		strokeColor: rotaDetalhe.corObject.cor,
		strokeOpacity: 0.9,
		strokeWeight: 5,
		fillColor: '#aaaaaa',
		fillOpacity: 0,
		hora_saida: rotaDetalhe.hora_saida
	});
	return rota;
}

function setarTodasRotas(){
	setarMarcadoresNoMapa();
	for (var i = 0; i < rotasCordenadas_Global.length; i++) {

		// console.log("rotasCordenadas_Global[i]: ");
		// console.log(rotasCordenadas_Global[i]);
		
		if (rotasCordenadas_Global[i].hora_saida == "0") {
			if (!document.getElementById("checkHora_Saida").checked) {
				rotasCordenadas_Global[i].setMap(map);
				caminhaos[i].setarMapa = true;
				caminhaos[i].caminhao.setMap(map);
			} else {
				rotasCordenadas_Global[i].setMap(null);
				caminhaos[i].setarMapa = false;
				caminhaos[i].caminhao.setMap(null);
			}
		} else {
			rotasCordenadas_Global[i].setMap(map);
			caminhaos[i].setarMapa = true;
			caminhaos[i].caminhao.setMap(map);
		}
		
	}
}


var caminhaos = [];
var setarCaminhaoMapa = true;
function setarMovimentoCaminhao(cordenadas, rotaDetalhe){ 
	/* console.log(rotaDetalhe); */
	var cor = rotaDetalhe.corObject.cor;
	var indeceDeRota = 1;
	var placa = rotaDetalhe.caminhao.placa;
	var caminhao = new google.maps.Marker({
		position: {lat: parseFloat(rotaDetalhe.caminhao.latitude), lng: parseFloat(rotaDetalhe.caminhao.longitude)},
		map: map,
		icon: "img/"+cor+"/truck_"+cor+"_LD.png", /*pacoteImg, || caminhaoImg, */
		title: rotaDetalhe.caminhao.placa,
		motorista: rotaDetalhe.motorista.nome
	});
	/*
	 * Desmenbrando o array caminhaos
	 * Suas Posições são imcrementadas em objtos json com os seguintes atributos:
		 - caminhao: é o objeto do Google setado no mapa
		 - setarMapa: é uma boleana que diz se o caminhao deve ser, ou não, setado no mapa
		 - codigo: é para identificação do caminhão (será usado como parametro para requisitar sua geolocalização)
	*/
	caminhaos.push({
		caminhao: caminhao, 
		setarMapa: true, 
		codigo: rotaDetalhe.caminhao.codigo, 
		oldLng: 0, newLng: 0,
		motorista: rotaDetalhe.motorista.nome,
		telefone: rotaDetalhe.motorista.telefone
	});
	caminhao.setMap(map);
	var numeroIndeceDefinitivo = caminhaos.length - 1;

	setarCaminhaoMapa = true;
	setTimeout(function(){
		setInterval(function(){
			if (setarCaminhaoMapa && caminhaos[numeroIndeceDefinitivo].setarMapa) {
				if (indeceDeRota == cordenadas.length) indeceDeRota = 1;
				var motorista = caminhaos[numeroIndeceDefinitivo].motorista;
				var telefone = caminhaos[numeroIndeceDefinitivo].telefone;
				var codigo = caminhaos[numeroIndeceDefinitivo].codigo;
				caminhaos[numeroIndeceDefinitivo].newLng = cordenadas[indeceDeRota].lng;
				if (caminhaos[numeroIndeceDefinitivo].oldLng > caminhaos[numeroIndeceDefinitivo].newLng) {
					var ladoCaminhao = "LE";
				} else {
					var ladoCaminhao = "LD";
				}
				caminhaos[numeroIndeceDefinitivo].oldLng = cordenadas[indeceDeRota].lng;

				caminhaos[numeroIndeceDefinitivo].caminhao.setMap(null);
				/* console.log('codigo caminhao: '+codigo); */
				$.ajax({
					type: 'GET',
					url: urlWebService+"CaminhaoWs/pesquisa/"+codigo+parametrosWebService,
					contentType: "application/json",
					jsonpCallback: "localJsonpCallback"
				}).done( function(data){
					caminhaos[numeroIndeceDefinitivo].caminhao = new google.maps.Marker({
						position: {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude)},
						map: map,
						icon: "img/"+cor+"/truck_"+cor+"_"+ladoCaminhao+".png", /*pacoteImg, || caminhaoImg, */
						title: placa,
						motorista: motorista,
						telefone: telefone
					});
					caminhaos[numeroIndeceDefinitivo].caminhao.addListener('click', function() {
						document.getElementById("visualizacaoCaminhaoInfo").style.display = "block";
						setarRegistroCaminhao(this.title, this.motorista, this.telefone);
					});
					caminhaos[numeroIndeceDefinitivo].caminhao.setMap(map);
					indeceDeRota++;
				});
			}
		}, 10000)
	}, 1000);
}

setarPrimeiroClasse = true;
function descreverLocaisEnterga(array, rotaDetalhe, numeroDaRota){
	var cor = rotaDetalhe.corObject;
	var duracao = 0, dividir = true, indiceUnidade = 0, unidades = ['segundos', 'minutos', 'horas'];
	var classeDiv = "hidden";
	var distancia = rotaDetalhe.distancia%1000==0 ? rotaDetalhe.distancia/1000 : rotaDetalhe.distancia/1000+1;
	var totalQuantidade = 0;
	var listaTelfone = "";
	/* var hora_saidaAux = ""; */

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
		$("#pacoteCorDemostrativo").html("<img src=\"img/"+cor.cor+"/pacote_"+cor.cor+".png\">");
		setarPrimeiroClasse = false;
	}


	var infoRota  = "<div id='localInfo_"+numeroDaRota+"' name='locais_demostrativo' class='"+classeDiv+"'>";
		infoRota += 		"<input type='hidden' value='"+rotaDetalhe.caminhao.placa+"' id='placa_"+numeroDaRota+"'>"
		infoRota += 		"<b>Placa: </b>"+rotaDetalhe.caminhao.placa.replace(" - ", "<br>")+"<br>";
		infoRota += 		"<b>Distância: </b>"+distancia+"<br>";
		infoRota += 		"<b>Duração: </b>"+duracao+"<br>";
		infoRota += 		"<b>Peso: </b>"+rotaDetalhe.pesoTotal+"<br>";
		
		if(rotaDetalhe.hora_saida != "0") {
			infoRota += 		"<b>Hora de Saída: </b>"+rotaDetalhe.hora_saida+"<br>";
		}

		infoRota += "</div>";

	var tabela  = 	"<div id='local_"+numeroDaRota+"' name='locais_demostrativo' class='"+classeDiv+"'>";
		
		tabela += 		"<input type='hidden' id='rota_"+numeroDaRota+"' value='"+numeroDaRota+"'>";
		tabela += 		"<input type='hidden' id='rota_cor"+numeroDaRota+"' value='"+cor.cor+"'>";
		tabela += 		"<table class=\"table\" style='margin-top:5px'>";

	for (var i = 0; i < array.length; i++) {
		totalQuantidade = 0;
		listaTelfone = "";
		for (var j = 0; j < array[i].cliente.telefone.length; j++) {
			listaTelfone += array[i].cliente.telefone[j];
		}
		tabela += 			"<tr onclick='abrirTabelaItens(\""+array[i].codigo+"\")'>";
		tabela += 				"<td width='10%'>";
		tabela += 					"<img id='imagem_pacote_"+array[i].codigo+"' src='"+array[i].imagem+"' width='100%'>";
		tabela += 					"<input type='hidden' id='marcador_indice_"+array[i].codigo+"' value='"+array[i].indiceImagem+"'>";
		tabela += 					"<input type='hidden' id='marcador_cor_"+array[i].codigo+"' value='"+cor.cor+"'>";
		tabela += 				"</td>";
		tabela += 				"<td style='font-size: 13px;'>";
		tabela += 					"<b>"+array[i].pedido+"</b>: "+array[i].nome;
		tabela += 				"</td>";
		tabela += 				"<td id='iconInterativoPedido_"+array[i].codigo+"'>";
		tabela +=					"<i class='fa fa-plus'></i>";
		tabela +=				"</td>";
		tabela += 			"</tr>";
		tabela +=			"<tr class='hidden' id='subTabelaItens"+array[i].codigo+"' name='subTabelaPedido'>";
		tabela +=				"<td colspan='3'>";
		tabela += 					"<table class='table'>";
		tabela += 						"<tr>";
		tabela +=							"<td width='20%' style=\"border-right-style: solid;\"><b>Cliente</b></td>";
		tabela +=							"<td>"+array[i].cliente.nome+"</td>";
		tabela += 						"</tr>";
		tabela += 						"<tr>";
		tabela +=							"<td width='20%' style=\"border-right-style: solid;\"><b>Telefone(s)</b></td>";
		tabela +=							"<td>"+listaTelfone+"</td>";
		tabela += 						"</tr>";
		tabela += 					"</table>";
		tabela +=					"<table class='table'>";
		tabela +=						"<tr>";
		tabela +=							"<td style='font-size:13px'><b>Codigo</b></td>";
		tabela +=							"<td style='font-size:13px'><b>Descrição</b></td>";
		tabela +=							"<td style='font-size:13px'><b>Qtd</b></td>";
		tabela +=							"<td style='font-size:13px'><b>Uni</b></td>";
		tabela +=						"</tr>";
		for (var j = 0; j < array[i].itens.length; j++) {
			totalQuantidade += array[i].itens[j].quantidade;
			tabela +=					"<tr>";
			tabela +=						"<td style='font-size:13px'>" + array[i].itens[j].codigo	 + "</td>";
			tabela +=						"<td style='font-size:13px'>" + array[i].itens[j].descricao	 + "</td>";
			tabela +=						"<td style='font-size:13px'>" + array[i].itens[j].quantidade + "</td>";
			tabela +=						"<td style='font-size:13px'>" + array[i].itens[j].unidade	 + "</td>";
			tabela +=					"</tr>";
		}
		tabela += 						"<tr>";
		tabela += 							"<td style='font-size:13px'></td>";
		tabela += 							"<td style='font-size:13px' align='right'><b>Total: </b></td>";
		tabela += 							"<td style='font-size:13px'>"+totalQuantidade+"</td>";
		tabela += 							"<td style='font-size:13px'></td>";
		tabela += 						"</tr>"
		tabela +=					"</table>";
		tabela +=				"</td>";
		tabela +=			"</tr>";
	}
		tabela += 		"</table>";
		tabela += 		"<div>";
		if (rotaDetalhe.observacao != "0") {
			tabela += 			"<span style='font-size 50px;color:red'><i class='fa fa-asterisk'></i></span>";
			tabela += 			" &nbsp;<b>OBSERVAÇÃO: </b>&nbsp;&nbsp;"+rotaDetalhe.observacao;
		}
		tabela += 		"</div>";
		tabela += 	"</div>";

	selectDeSelecaoDeCarga.push("<option value=\"" + numeroDaRota + "\">Rota "+cor.traducao+"</option>");
	$("#locaisDeEntregaDemostrativo").html($("#locaisDeEntregaDemostrativo").html()+tabela);
	$("#infoRotaDemostrativo").html($("#infoRotaDemostrativo").html()+infoRota);
}

function retornarJanelaInfo(titulo){
	var conteudo = 	''
				 + 	'<div id="content">'
				 + 		'<div id="siteNotice">'
				 + 		'</div>'
				 + 		'<div id="bodyContent">'
				 + 			titulo
				 + 		'</div>'
				 + 	'</div>';
	return conteudo;
}


function atualizarPacotes(arrayCodigos){
	setInterval( function(){
		var parametros = "";
		for (var i = 0; i < arrayCodigos.length; i++) {
			parametros = arrayCodigos[i].pedido+"/"+arrayCodigos[i].entrega+"/"+arrayCodigos[i].codigo;
			$.ajax({
				type: 'GET',
				url: urlWebService+"ViagemSimplesItemWs/pesquisa/"+parametros+parametrosWebService,
				contentType: "application/json",
				jsonpCallback: "localJsonpCallback"
			}).done( function(data){
				/* console.log(data); */
				if (data.bool_entrega == 1) data.cor = corConfirmacao;
				else 						data.cor = document.getElementById("marcador_cor_"+data.item).value;
				setarCorMacador(data);
			});
		}
	}, 20000);
}


function setarCorMacador(option){
	var indiceImagemReference = "";
	var imagemSetada = "";
	for (var j = 0; j < MarcadoreEntregas.length; j++) {
		if (option.item == MarcadoreEntregas[j].Marker.codigo) {
			indiceImagemReference = document.getElementById("marcador_indice_"+option.codigo[0]).value;
			imagemSetada = "img/"+data.cor+"/pacote_"+data.cor+"_"+indiceImagemReference+".png";
			document.getElementById("imagem_pacote_"+option.codigo[0]).src = imagemSetada;
			MarcadoreEntregas[j].Marker.icon = imagemSetada;
			MarcadoreEntregas[j].Marker.setMap(null);
			if (MarcadoreEntregas[j].setarMapa == true) {
				MarcadoreEntregas[j].Marker.setMap(map);
			}
			j = MarcadoreEntregas.length;
			/* for (var k = 0; k < arrayCodigos.length; k++) */
				/* if(arrayCodigos[k] == option.codigo) arrayCodigos.splice(k, 1); */
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