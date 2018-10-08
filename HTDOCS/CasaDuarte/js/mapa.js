
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var rotasCordenadas = [];
var arrayIndiceMarcador = [];
var arrayIndeceSetados = [];
var MarcadoreEntregas = []; /* É um array global para armazenar os ponto de referencia */
var MarcadorePendente = [];
var corConfirmacao = "green";
var corPendente = "yellow";

var arrayDeCores = [
	{ cor: 'blue'	, traducao: "Azul"		}, 
	/* { cor: 'green'	, traducao: "Verde"		}, */
	{ cor: 'red'	, traducao: "Vermelha"	},
	{ cor: 'purple'	, traducao: "Roxo"		},
	{ cor: 'orange'	, traducao: "Laranja"	},
	{ cor: 'gray'	, traducao: "Cinza"		}
];
var NumeroMaximoDePacotes = 10;
var corRotaUsada;
var selectDeSelecaoDeCarga = [];

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
function tracarRotas(rotas){
	var request = null;
	$("#locaisDeEntregaDemostrativo").html("");
	$("#selectOpcaoDeRotas").html("");
	setarMacadoresPendetes();
	
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
				/* console.log(result);
				 console.log(rotas); */

				var arrayPontosEntregas = []; /* para objeto do google */
				var localizacao = []; /* para o objeto do web service */
				var igualEntregas = false;
				var indiceDaRota_p_Result = 0;
				var diferencaDescontoLat = 0;
				var diferencaDescontoLng = 0;


				for (var j = 0; j < rotas.length; j++) {
					arrayPontosEntregas = result.request.waypoints;

					igualEntregas = false;
					/* verifica se o numero de enteregas é igual */
					if (arrayPontosEntregas.length == rotas[j].entregasDetalhe.length) {

						/* percorre as entregas */
						for (var k = 0; k < rotas[j].entregasDetalhe.length; k++) {

							if (arrayIndeceSetados.indexOf(j) == -1) {
								localizacao = rotas[j].entregasDetalhe[k].endEntregaItem.split(",");
								diferencaDescontoLat = localizacao[0] - arrayPontosEntregas[k].location.location.lat();
								diferencaDescontoLng = localizacao[1] - arrayPontosEntregas[k].location.location.lng();
								diferencaDescontoLat = diferencaDescontoLat < 0 ? diferencaDescontoLat * -1 : diferencaDescontoLat;
								diferencaDescontoLng = diferencaDescontoLng < 0 ? diferencaDescontoLat * -1 : diferencaDescontoLng;
								/* não tem como os endereço serem iguais porque o google não retorna os endereços iguais */
								/* um possivel solução foi verificar por aproximidade */
								if (diferencaDescontoLat < 0.00000001 && diferencaDescontoLng < 0.00000001) { 
									igualEntregas = true; 
								}
								else { igualEntregas = false; k = rotas[j].entregasDetalhe.length; }
							}
						}
						if (igualEntregas) {

							indiceDaRota_p_Result = j;
							j = rotas.length;
						}
					}
				}

				arrayIndeceSetados.push(indiceDaRota_p_Result);

				tratandoResultado(
					result, 
					rotas[indiceDaRota_p_Result].cor,
					rotas[indiceDaRota_p_Result].rotaDetalhe,
					rotas[indiceDaRota_p_Result].entregasDetalhe
				);
				numDefinitivoDeAlgumaCoisa++;
			} /* else alert("Erro: não conseguiu localizar seu endereço"); */

			if (numDefinitivoDeAlgumaCoisa == rotas.length) {
				var selectOpcaoDeRotas = "<select id='selectDeSelecaoDeRotas' class=\"form-control\" onchange=\"alertaValor(this.value)\">";
				for (var i = 0; i < selectDeSelecaoDeCarga.length; i++) {
					selectOpcaoDeRotas += selectDeSelecaoDeCarga[i];
				}
				selectOpcaoDeRotas += "</select>";
				$("#selectOpcaoDeRotas").html(selectOpcaoDeRotas);
				setarTodasRotas();
			}
		});
	}
}


function tratandoResultado(objMap, corObject, rotaDetalhe, objetoEntrega){/*cor, /*, numeroDeRotas */
	console.log("corObject: ");
	console.log(corObject);

	/* console.log(rotaDetalhe); */
	var cordenadas = [];
	arrayIndiceMarcador.push([]);
	var pedido = objMap.request; /* retorna o que foi pedido (origem, destino e pontos de referencias) */
	var pontosEntrega = pedido.waypoints; /* retorna um array de pontos de referencias */

	var origen = pedido.origin.location; /* cordenadas da origem (lat, lng) */
	adicionarMarcadorSimples(origen.lat(), origen.lng(), "img/loja.png", "Casa Duarte ;)");
	var destino = pedido.destination.location; /* cordenadas do destino (lat, lng) */
	adicionarMarcadorSimples(destino.lat(), destino.lng(), "img/loja.png", "Casa Duarte ;)");

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

	/* Verificação de proximidade de endereço para saber se esta é o pacote correto e da confiabilidade dos dados */
	var arrayEndEntrega_paramentro = [];
	var oldProximo = 0, newProximo;
	var indiceRealEnterga = 0;


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


			for (var j = 0; j < objetoEntrega.length; j++) {
				arrayEndEntrega_paramentro = objetoEntrega[j].endEntrega.split(",");

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


			/* if () { */
			corReference = objetoEntrega[indiceRealEnterga].bool_entrega == 1 ? corConfirmacao : corObject.cor;
			/* } else {
				corReference = ;
			} */
			arrayCodigos.push({
				pedido: objetoEntrega[indiceRealEnterga].pedido,
				entrega: rotaDetalhe.codigo,
				codigo: objetoEntrega[indiceRealEnterga].pedido /* objetoEntrega[indiceRealEnterga].codigo[0] */
			});
			

			imagem = "img/"+corReference+"/pacote_"+corReference+"_"+indiceImagemReference+".png";


			/* console.log(objetoEntrega[indiceRealEnterga]); */
			arrayIndiceMarcador[arrayIndiceMarcador.length - 1].push(
				adicionarMarcador(
					latitude, longitude, 
					imagem, /*paradas[i].end_address*/ objetoEntrega[indiceRealEnterga].descEndEndrega, 
					objetoEntrega[indiceRealEnterga]/*.codigo */,rotaDetalhe, rotasCordenadas.length
				)
			);

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

	/* console.log(corObject); */
	setarMovimentoCaminhao(cordenadas, rotaDetalhe, corObject.cor);
	setarMarcadoresNoMapa();
	descreverLocaisEnterga(locaisDeEntregasPer, rotaDetalhe, corObject, rotasCordenadas.length);
	atualizarPacotes(arrayCodigos);
	rotasCordenadas.push(setarRotas(cordenadas, corObject.cor, rotaDetalhe));
	/* if (rotasCordenadas.length == numeroDeRotas) setarTodasRotas(); */
}

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

function adicionarMarcador(latitude, longitude, img, titulo, objetoEntrega, rotaDetalhe, indiceRota){
	/* var contentString = retornarJanelaInfo(titulo); */

	var Marker = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img, /* img/gray/pacote_gray_1.png", || pacoteImg, */
		title: titulo,
		aberto: false,
		codigo: objetoEntrega.codigo[0],
		pedido: objetoEntrega.pedido,
		cliente: objetoEntrega.cliente,
		itens: objetoEntrega.itens,
		placa: rotaDetalhe.caminhao.placa,
		motorista: rotaDetalhe.motorista.nome
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
	MarcadoreEntregas.push({Marker: Marker, setarMapa: true, indiceRota: indiceRota});
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
		console.log("rotasCordenadas[MarcadoreEntregas[i].indiceRota]:");
		if(rotasCordenadas[MarcadoreEntregas[i].indiceRota] != undefined){
			console.log(rotasCordenadas[MarcadoreEntregas[i].indiceRota]);
			console.log("rotasCordenadas[MarcadoreEntregas[i].indiceRota].hora_saida:");
			console.log(rotasCordenadas[MarcadoreEntregas[i].indiceRota].hora_saida);
		}*/

		if (
			rotasCordenadas[MarcadoreEntregas[i].indiceRota] 			!= undefined 	&& 
			rotasCordenadas[MarcadoreEntregas[i].indiceRota].hora_saida == "0"
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


function setarRotas(cordenadas, cor, rotaDetalhe){
	var rota = new google.maps.Polygon({
		paths: cordenadas,
		strokeColor: cor,
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
	for (var i = 0; i < rotasCordenadas.length; i++) {

		// console.log("rotasCordenadas[i]: ");
		// console.log(rotasCordenadas[i]);
		
		if (rotasCordenadas[i].hora_saida == "0") {
			if (!document.getElementById("checkHora_Saida").checked) {
				rotasCordenadas[i].setMap(map);
				caminhaos[i].setarMapa = true;
				caminhaos[i].caminhao.setMap(map);
			} else {
				rotasCordenadas[i].setMap(null);
				caminhaos[i].setarMapa = false;
				caminhaos[i].caminhao.setMap(null);
			}
		} else {
			rotasCordenadas[i].setMap(map);
			caminhaos[i].setarMapa = true;
			caminhaos[i].caminhao.setMap(map);
		}
		
	}
}


var caminhaos = [];
var setarCaminhaoMapa = true;
function setarMovimentoCaminhao(cordenadas, rotaDetalhe, cor){
	/* console.log(rotaDetalhe); */
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
function descreverLocaisEnterga(array, rotaDetalhe, cor, numeroDaRota){
	console.log("descreverLocaisEnterga: ");
	console.log(rotaDetalhe);
	console.log(array);
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


	var infoRota  = "<div id='localInfo_"+cor.cor+"' name='locais_demostrativo' class='"+classeDiv+"'>";
		infoRota += 		"<input type='hidden' value='"+rotaDetalhe.caminhao.placa+"' id='placa_"+cor.cor+"'>"
		infoRota += 		"<b>Placa: </b>"+rotaDetalhe.caminhao.placa.replace(" - ", "<br>")+"<br>";
		infoRota += 		"<b>Distância: </b>"+distancia+"<br>";
		infoRota += 		"<b>Duração: </b>"+duracao+"<br>";
		infoRota += 		"<b>Peso: </b>"+rotaDetalhe.pesoTotal+"<br>";
		
		if(rotaDetalhe.hora_saida != "0") {
			infoRota += 		"<b>Hora de Saída: </b>"+rotaDetalhe.hora_saida+"<br>";
		}

		infoRota += "</div>";

	var tabela  = 	"<div id='local_"+cor.cor+"' name='locais_demostrativo' class='"+classeDiv+"'>";
		
		tabela += 		"<input type='hidden' id='rota_"+cor.cor+"' value='"+numeroDaRota+"'>";
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
			tabela +=						"<td style='font-size:13px'>"+array[i].itens[j].codigo+"</td>";
			tabela +=						"<td style='font-size:13px'>"+array[i].itens[j].descricao+"</td>";
			tabela +=						"<td style='font-size:13px'>"+array[i].itens[j].quantidade+"</td>";
			tabela +=						"<td style='font-size:13px'>"+array[i].itens[j].unidade+"</td>";
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

	selectDeSelecaoDeCarga.push("<option value=\""+cor.cor+"\">Rota "+cor.traducao+"</option>");
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
				/*console.log("atualizarPacotes: ");
				console.log(data);*/
				if (data.bool_entrega == 1) {
					setarCorMacador(data, corConfirmacao);
				} else {
					/*console.log(data.item);*/
					setarCorMacador(data, document.getElementById("marcador_cor_"+data.item).value);
				}
			});
		}
	}, 20000);
}


function setarCorMacador(data,  cor){
	var indiceImagemReference = "";
	var imagemSetada = "";
	for (var j = 0; j < MarcadoreEntregas.length; j++) {
		if (data.item == MarcadoreEntregas[j].Marker.codigo) {
			indiceImagemReference = document.getElementById("marcador_indice_"+data.codigo[0]).value;
			imagemSetada = "img/"+cor+"/pacote_"+cor+"_"+indiceImagemReference+".png";
			document.getElementById("imagem_pacote_"+data.codigo[0]).src = imagemSetada;
			MarcadoreEntregas[j].Marker.icon = imagemSetada;
			MarcadoreEntregas[j].Marker.setMap(null);
			if (MarcadoreEntregas[j].setarMapa == true) {
				MarcadoreEntregas[j].Marker.setMap(map);
			}
			j = MarcadoreEntregas.length;
			/* for (var k = 0; k < arrayCodigos.length; k++) */
				/* if(arrayCodigos[k] == data.codigo) arrayCodigos.splice(k, 1); */
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