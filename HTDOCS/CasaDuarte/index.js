var arrayRegioes = [];
var iconeBairro = "img/bairro.png";
var iconeRegiao = "img/region.png";

function carregarContatos(){
	/* dataRequi */
	/* console.log(dataRequi); */
	// hostWebService = "192.168.100.15";
	hostWebService = "localhost";
	portaImgService = "8088";

	var waypts = [];
	var rotas = []; /* Fundamental para tracar as rotas */
	var indiceCor = 0;

	$.ajax({
		type: 'GET',
		url: urlWebService+"ViagemSimplesWs/listarOtimizadoCliente"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		/* console.log(data); */
		for(i in data){
			if (data[i].endEntrega.length > 0) {
				waypts = [];
				for (var j = 0; j < data[i].endEntrega.length; j++) {
					waypts.push({
						location: data[i].endEntrega[j].endEntrega, 
						stopover: true
					});
				}

				indiceCor = arrayDeCores.length <= i ? arrayDeCores.length - 1 : i;

				rotas.push({
					origem: data[i].endInicial,
					destino: data[i].endFinal,
					entregas: waypts,
					entregasDetalhe: data[i].endEntrega,
					rotaDetalhe: data[i],
					cor: arrayDeCores[indiceCor]
				});
			}
		}
		tracarRotas(rotas);
		carregarRegioes();
		atualizarWeb();
	});
}



function atualizarWeb(){
	$.ajax({
		type: 'GET',
		url: urlWebService+"WebUpdateWs/listar"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		console.log("atualizarWeb: ");
		console.log(data);
	})
}



function carregarRegioes(){
	/* var cityCircle = null; */
	/* var Marker = null; */
	var arrayLatLng, latitude, longitude;
	var tabelaRegioes = "<table class='table'>";
	
	/* Variveis para configuração de bairro */
	/*var arrayBairros = null;
	var objMapBairro = null;
	var objMapBairroMarker = null;
	var arrayLatLng_bairro = [];
	var contentString, infowindow;
	var conteudoBairrosPorRegiao = "<h3 id=\"nomeRegiaoDescricaoBairro\"></h3>";
	conteudoBairrosPorRegiao += "<button class=\"btn btn-primary btn-block\" onclick=\"voltarMenuRegiao()\">";
	conteudoBairrosPorRegiao += "	<i class=\"fa fa-arrow-left\"></i>&nbsp;&nbsp;Voltar";
	conteudoBairrosPorRegiao += "</button><br>";
	$("#bairrosPorRegioes").html(conteudoBairrosPorRegiao);*/

	$.ajax({
		type: 'GET',
		url: urlWebService+"RegiaoWs/listar"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		for (i in data){
			arrayLatLng = data[i].lat_lng.split(",");

			/* Objeto Bairro sendo distribuido */
			/*arrayBairros = [];
			for (var j = 0; j < data[j].bairros.length; j++) {
				if (data[i].bairros[j] != undefined) {
					arrayLatLng_bairro = data[i].bairros[j].latLng.split(",");
					latitude = parseFloat(arrayLatLng_bairro[0]);
					longitude = parseFloat(arrayLatLng_bairro[1]);

					objMapBairro =  new google.maps.Circle({
						strokeColor: 'black',
						strokeOpacity: 0.2,
						strokeWeight: 2,
						fillColor: 'lightgreen',
						fillOpacity: 0.35,
						map: map,
						center: {lat: latitude,lng: longitude},
						radius: data[i].bairros[j].raio,
						codigo: data[i].bairros[j].codigo
					});

					contentString = retornarJanelaInfo(data[i].bairros[j].descricao);
					infowindow = new google.maps.InfoWindow({
						content: contentString
					});

					objMapBairroMarker = new google.maps.Marker({
						position: {lat: latitude, lng: longitude},
						map: map,
						icon: iconeBairro,
						title: data[i].bairros[j].descricao,
						evento: infowindow,
						codigo: data[i].bairros[j].codigo
					});

					arrayBairros.push({regiao: objMapBairro, ponto: objMapBairroMarker});
				}
			}*/


			latitude = parseFloat(arrayLatLng[0]);
			longitude = parseFloat(arrayLatLng[1]);

			var cityCircle = new google.maps.Circle({
				strokeColor: 'black',
				strokeOpacity: 0.2,
				strokeWeight: 2,
				fillColor: 'lightblue',
				fillOpacity: 0.35,
				map: map,
				center: {lat: latitude,lng: longitude},
				radius: data[i].raio,
				codigo: data[i].codigo
			});
			/* Caracteristicas do evento */
			contentString = retornarJanelaInfo(data[i].descricao);
			infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			var Marker = new google.maps.Marker({
				position: {lat: latitude, lng: longitude},
				map: map,
				icon: iconeRegiao,
				title: data[i].descricao,
				evento: infowindow,
				codigo: data[i].codigo,
				/*bairros: arrayBairros */
			});
			

			tabelaRegioes += desenharLinhaRegiao(data[i].descricao, arrayRegioes.length, data[i].codigo);
			/* Adição da região ao marcador */
			

			/* Passando do Javascrpit para HTML as configurações de bairro */
			/*$("#bairrosPorRegioes").html(
				$("#bairrosPorRegioes").html() + desenharBairros(data[i].bairros, data[i].codigo, data[i].descricao)
			);*/

			arrayRegioes.push({regiao: cityCircle, ponto: Marker});
			setarRegioesMapa(map, false);
		}
		tabelaRegioes += "</table>";

		$("#regioesDemostrativo").html(tabelaRegioes);
	});
}


function desenharLinhaRegiao(descricao, indeceRegiao, codigoRegiao){
	var conteudo = "<tr id='linha_"+indeceRegiao+"' bgcolor='#5cb85c'>";
	conteudo += 	"<td onclick='delimitarRegioes("+indeceRegiao+")'>";
	conteudo += 		"<img src='"+iconeRegiao+"'>";
	conteudo += 	"</td>";
	conteudo += 	"<td onclick='delimitarRegioes("+indeceRegiao+")'>";
	conteudo += 		descricao;
	conteudo += 		"<input type='hidden' value='"+indeceRegiao+"' name='valorRegiao'>";
	conteudo += 		"<input type='checkbox' class='hidden' id='check_"+indeceRegiao+"' checked>";
	conteudo += 	"</td>";
	conteudo += 	"<td onclick='delimitarRegioes("+indeceRegiao+")' id='iconeRegiao_"+indeceRegiao+"'>";
	conteudo += 		"&nbsp;<i class='fa fa-check'></i>&nbsp;";
	conteudo += 	"</td>";

	/* Botão para listar os bairros correspondentes */
	/*conteudo += 	"<td width='20%'>";
	conteudo += 		"<button class='btn btn-block' onclick='listarBairrosRegiao("+codigoRegiao+",\""+descricao+"\")' title='Listar Bairros' style='color: #337ab7;'>";
	conteudo += 			"<i class='fa fa-list'></i>";
	conteudo += 		"</button>";
	conteudo += 	"</td>";*/
	conteudo += "</tr>";

	return conteudo;
}




function delimitarRegioes(indice){
	if(document.getElementById("check_"+indice).checked){
		document.getElementById("check_"+indice).checked = false;
	} else {
		document.getElementById("check_"+indice).checked = true;
	}
	redefinirCor();
}

function redefinirCor(){
	var regioes = document.getElementsByName("valorRegiao");
	for (var i = 0; i < regioes.length; i++) {
		if (document.getElementById("check_"+regioes[i].value).checked) {
			document.getElementById("iconeRegiao_"+regioes[i].value).innerHTML = "<i class='fa fa-check'></i>";
			document.getElementById("linha_"+regioes[i].value).style.backgroundColor = "#5cb85c";
		} else {
			document.getElementById("iconeRegiao_"+regioes[i].value).innerHTML = "<i class='fa fa-times'></i>";
			document.getElementById("linha_"+regioes[i].value).style.backgroundColor = "#d9534f";
		}
	}
	setarRegioesMapa(map, true);
	/* cores: d9534f , 5cb85c , 428bca */
}


/* var eventoDoMomento = null; */
function setarRegioesMapa(map, verificar){
	/* O paramentro verifica serve saber se dever verificar o campo checkbox se ta ou não selecionado */
	for (var i = 0; i < arrayRegioes.length; i++) {
		if (verificar) {
			if (document.getElementById("check_"+i).checked) {
				arrayRegioes[i].regiao.setMap(map);
				arrayRegioes[i].ponto.setMap(map);
				arrayRegioes[i].ponto.addListener('click', function() {
					/* this.evento.close(map, this);
					this.aberto = false; */
					this.evento.open(map, this);
					/*this.aberto = true;*/
				});
			} else {
				arrayRegioes[i].regiao.setMap(null);
				arrayRegioes[i].ponto.setMap(null);
			}
			/* Setar bairro ou des-setar bairro do mapa baseado na configuração do usuário */
			/*for (var j = 0; j < arrayRegioes[i].ponto.bairros.length; j++) {
				if (document.getElementById("check_Bairro_"+arrayRegioes[i].ponto.bairros[j].ponto.codigo).checked) {
					arrayRegioes[i].ponto.bairros[j].regiao.setMap(map);
					arrayRegioes[i].ponto.bairros[j].ponto.setMap(map);
					arrayRegioes[i].ponto.bairros[j].ponto.addListener('click', function() {
						this.evento.open(map, this);
					});
				} else {
					arrayRegioes[i].ponto.bairros[j].regiao.setMap(null);
					arrayRegioes[i].ponto.bairros[j].ponto.setMap(null);
				}
			}*/
		} else {
			arrayRegioes[i].regiao.setMap(map);
			arrayRegioes[i].ponto.setMap(map);
			arrayRegioes[i].ponto.addListener('click', function() {
				/* this.evento.close(map, this);
				this.aberto = false; */
				this.evento.open(map, this);
				this.aberto = true;
			});
			/* Setar bairro no mapa sem verificar se esta com o checkbox marcado */
			/*for (var j = 0; j < arrayRegioes[i].ponto.bairros.length; j++) {
				arrayRegioes[i].ponto.bairros[j].regiao.setMap(map);
				arrayRegioes[i].ponto.bairros[j].ponto.setMap(map);
				arrayRegioes[i].ponto.bairros[j].ponto.addListener('click', function() {
					this.evento.open(map, this);
				});
			}*/
		}
	}
}


function setarRotaExclusiva(cor){
	for (var i = 0; i < rotasCordenadas.length; i++) {
		rotasCordenadas[i].setMap(null);
		caminhaos[i].setarMapa = false;
		caminhaos[i].caminhao.setMap(null);
		for (var j = 0; j < arrayIndiceMarcador[i].length; j++) {
			MarcadoreEntregas[arrayIndiceMarcador[i][j]].Marker.setMap(null);
			MarcadoreEntregas[arrayIndiceMarcador[i][j]].setarMapa = false;
		}
	}
	var indece = document.getElementById("rota_"+cor).value;
	rotasCordenadas[indece].setMap(map);
	caminhaos[indece].setarMapa = true;
	caminhaos[indece].caminhao.setMap(map);
	for (var j = 0; j < arrayIndiceMarcador[indece].length; j++) {
		MarcadoreEntregas[arrayIndiceMarcador[indece][j]].Marker.setMap(map);
		MarcadoreEntregas[arrayIndiceMarcador[indece][j]].setarMapa = true;
	}
}


function setarRegistroCaminhao(placa, motorista, telefone){
	var conteudoTelefone = "";
	for (var i = 0; i < telefone.length; i++) {
		conteudoTelefone += "<li>" + telefone[i] + "</li>";
	}

	var conteudo = "";
	conteudo += "<div class=\"col-xs-4 col-md-2\">";
	conteudo += 	"<img src=\"img/caminhao/icon.png\" width=\"100%\">";
	conteudo += "</div>";
	conteudo += "<div class=\"col-xs-4 col-md-2\">";
	conteudo += 	"<img src=\"img/motorista/icon.png\" width=\"100%\">";
	conteudo += "</div>";
	conteudo += "<div class=\"col-xs-4 col-md-8\">";
	conteudo +=		"<table class=\"table\">";
	conteudo += 		"<tr>";
	conteudo += 			"<td>";
	conteudo += 				"<b>Caminhao: </b>";
	conteudo += 			"</td>";
	conteudo += 			"<td>";
	conteudo += 				placa;
	conteudo += 			"</td>";
	conteudo += 		"</tr>";
	conteudo += 		"<tr>";
	conteudo += 			"<td>";
	conteudo += 				"<b>Motorista: </b>";
	conteudo += 			"</td>";
	conteudo += 			"<td>";
	conteudo += 				motorista;
	conteudo += 			"</td>";
	conteudo += 		"</tr>";
	conteudo += 		"<tr>";
	conteudo += 			"<td>";
	conteudo += 				"<b>Telefone: </b>";
	conteudo += 			"</td>";
	conteudo += 			"<td>";
	conteudo += 				conteudoTelefone; /* "9999-9999" */;
	conteudo += 			"</td>";
	conteudo += 		"</tr>";
	conteudo += 	"</table>";
	conteudo += "</div>";

	$("#conteudoInfGeralCaminhao").html(conteudo);
}

function imprimiMapa(){
	/* Salva status */
	var divImagensLogos = document.getElementById("divImagensLogos").style.display;
	var voltarConteudoRotas = document.getElementById("voltarConteudoRotas").style.display;
	var conteudoRotas = document.getElementById("conteudoRotas").style.display;
	var voltarConteudoRegiao = document.getElementById("voltarConteudoRegiao").style.display;
	var conteudoRegiao = document.getElementById("conteudoRegiao").style.display;

	/* Trar pendentes do mapa */
	var pendentes = document.getElementById("checkPedidoPedente").checked;
	if (pendentes) document.getElementById("checkPedidoPedente").click();

	/* Tira os caminhoes do mapa */
	for (var i = 0; i < rotasCordenadas.length; i++) {
		caminhaos[i].caminhao.setMap(null);
	}

	/* Tirar as regiões do mapa */
	/*  */


	/* Oculta tudo */
	document.getElementById("divImagensLogos").style.display = "none";
	document.getElementById("voltarConteudoRotas").style.display = "none";
	document.getElementById("conteudoRotas").style.display = "none";
	document.getElementById("voltarConteudoRegiao").style.display = "none";
	document.getElementById("conteudoRegiao").style.display = "none";
	

	document.title = document.getElementById("placa_"+$("#selectDeSelecaoDeRotas").val()).value;

	/* Manda Imprimir */
	window.print();


	document.title = "Casa Duarte - Entregas";


	/* Retorna tudo na sua condição inicial */
	document.getElementById("divImagensLogos").style.display = divImagensLogos;
	document.getElementById("voltarConteudoRotas").style.display = voltarConteudoRotas;
	document.getElementById("conteudoRotas").style.display = conteudoRotas;
	document.getElementById("voltarConteudoRegiao").style.display = voltarConteudoRegiao;
	document.getElementById("conteudoRegiao").style.display = conteudoRegiao;
	/* Retorna pendentes ao map0a se estiver selecionado */
	if (pendentes) document.getElementById("checkPedidoPedente").click();
	
	/* Seta os caminhão no mapa denovo se eles estavam no mapa */
	for (var i = 0; i < rotasCordenadas.length; i++) {
		if (caminhaos[i].setarMapa) caminhaos[i].caminhao.setMap(map);
	}

	/* Setar região no mapa */
	/* for (var i = 0; i < arrayRegioes.length; i++) {
		if (document.getElementById("check_"+i).checked) {
			arrayRegioes[i].regiao.setMap(map);
			arrayRegioes[i].ponto.setMap(map);
			arrayRegioes[i].ponto.addListener('click', function() {
				this.evento.open(map, this);
			});
		}
	} */
}


function deselecionarTodasRegioes(){
	var regioes = document.getElementsByName("valorRegiao");
	/* var arrayCodigosRegioesMarcadas = []; */
	for (var j = 0; j < regioes.length; j++) {
		if ( document.getElementById("check_"+regioes[j].value).checked ) {
			delimitarRegioes(regioes[j].value);
			/* arrayCodigosRegioesMarcadas.push(regioes[j].value); */
		}
	}
}

function selecionarTodasRegioes(){
	var regioes = document.getElementsByName("valorRegiao");
	/* var arrayCodigosRegioesMarcadas = []; */
	for (var j = 0; j < regioes.length; j++) {
		if ( !document.getElementById("check_"+regioes[j].value).checked ) {
			delimitarRegioes(regioes[j].value);
			/* arrayCodigosRegioesMarcadas.push(regioes[j].value); */
		}
	}
}




function chmarRotasComformeData(data){
	console.log("chmarRotasComformeData");
	var dataVerif = moment(pegarData(), 'YYYY-MM-DD');
	var dataRequi = moment(data, 'YYYY-MM-DD');

	console.log(dataRequi.diff(dataVerif, 'days'));

	if (
		dataRequi.diff(dataVerif, 'days') == 0 ||
		dataRequi.diff(dataVerif, 'days') == 1 ||
		dataRequi.diff(dataVerif, 'days') == 2
	) {
		desetarTudo();
		carregarContatos(data);
	} else {
		alert("Data invalida! Por favor entre com uma a data de hoje, amanhã ou depois de amanhã");
		setarDataFiltroRota();
	}
}


function desetarTudo(){
	setarCaminhaoMapa = false;
	for (var i = 0; i < MarcadoreEntregas.length; i++) {
		MarcadoreEntregas[i].Marker.setMap(null);
	}

	for (var i = caminhaos.length - 1; i >= 0; i--) {
		caminhaos[i].caminhao.setMap(null);
		rotasCordenadas[i].setMap(null);
	}

	MarcadoreEntregas = [];
	caminhaos = [];
	rotasCordenadas = [];
}









function setarMacadoresPendetes(){
	var imagem = "img/"+corPendente+"/pacote_"+corPendente+"_p.png";
	var latitude = 0;
	var longitude = 0;
	MarcadorePendente = [];
	$.ajax({
		type: 'GET',
		url: urlWebService+"ViagemSimplesWs/listarPendentes"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		console.log("setarMacadoresPendetes: ");
		console.log(data);
		for (var i = 0; i < data.length; i++) {
			latitude = parseFloat(data[i].endEntregaItem.split(",")[0]);
			longitude = parseFloat(data[i].endEntregaItem.split(",")[1]);

			adicionarMarcadorPendente(
				latitude, longitude, 
				imagem, /*paradas[i].end_address*/ data[i].descEndEndrega, 
				data[i]/*.codigo */
			);
		}
		setarTodosMarcadoresPendentes();
	});
}




function adicionarMarcadorPendente(latitude, longitude, img, titulo, objetoEntrega){
	/* var contentString = retornarJanelaInfo(titulo); */

	var Pendente = new google.maps.Marker({
		position: {lat: latitude, lng: longitude},
		map: map,
		icon: img, /* img/gray/pacote_gray_1.png", || pacoteImg, */
		title: titulo,
		aberto: false,
		codigo: objetoEntrega.codigo[0],
		pedido: objetoEntrega.pedido,
		cliente: objetoEntrega.cliente,
		itens: objetoEntrega.itens
	});
	/* var infowindow = new google.maps.InfoWindow({
		content: contentString
	}); */
	Pendente.addListener('click', function() {
		var gradeItens = "";

		gradeItens += "<table class='table'>";
		gradeItens += 	"<tr>";
		gradeItens += 		"<td align='center'><b>Codigo</b></td>";
		gradeItens += 		"<td><b>Descrição</b></td>";
		gradeItens += 		"<td align='center'><b>Qtd.</b></td>";
		gradeItens += 		"<td align='center'><b>Uni.</b></td>";
		gradeItens += 	"</tr>";

		for (var i = 0; i < this.itens.length; i++) {
			gradeItens += 	"<tr>";
			gradeItens += 		"<td align='center'>"+this.itens[i].codigo+"</td>";
			gradeItens += 		"<td>"+this.itens[i].descricao+"</td>";
			gradeItens += 		"<td align='center'>"+this.itens[i].quantidade+"</td>";
			gradeItens += 		"<td align='center'>"+this.itens[i].unidade+"</td>";
			gradeItens += 	"</tr>";
		}
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
		$("#modalPedidoVisualiza").modal('show');
		  /*
		  *  if(this.aberto){ infowindow.close(map, this); this.aberto = false; }
		 *   else { infowindow.open(map, this); this.aberto = true; }
		*/
	});
	MarcadorePendente.push({Pendente: Pendente, setarMapa: true});
	return MarcadorePendente.length - 1;
}


function setarTodosMarcadoresPendentes(){
	for (var i = 0; i < MarcadorePendente.length; i++) {
		MarcadorePendente[i].Pendente.setMap(map);
		MarcadorePendente[i].setarMapa = true;
	}
}


function DES_setarTodosMarcadoresPendentes(){
	for (var i = 0; i < MarcadorePendente.length; i++) {
		MarcadorePendente[i].Pendente.setMap(null);
		MarcadorePendente[i].setarMapa = false;
	}
}

/* Funções para bairro NÃO APAGAR */
/*function desenharBairros(bairros, codigoZona, descricaoZona){
	var conteudo = "";

		conteudo += "<div id='bairrosZona_"+codigoZona+"' class='regioesDemostrativo' name='divBairros' style='display:none;'>";
		conteudo += 	"<table class='table'>";
	for (var i = 0; i < bairros.length; i++) {
		conteudo += 		"<tr onclick='delimitarBairros("+bairros[i].codigo+")' id='linha_Bairro_"+bairros[i].codigo+"' bgcolor='#5cb85c'>";
		conteudo += 			"<td>";
		conteudo += 				"<img src='"+iconeBairro+"'>";
		conteudo += 			"</td>";
		conteudo += 			"<td>";
		conteudo += 				bairros[i].descricao;
		conteudo += 				"<input type='hidden' value='"+bairros[i].codigo+"' name='valorBairro'>";
		conteudo += 				"<input type='checkbox' class='hidden' id='check_Bairro_"+bairros[i].codigo+"' checked>";
		conteudo += 			"</td>";
		conteudo += 			"<td id='iconeBairro_"+bairros[i].codigo+"'>";
		conteudo += 				"&nbsp;<i class='fa fa-check'></i>&nbsp;";
		conteudo += 			"</td>";
		conteudo += 		"</tr>";
	}
		conteudo += 	"</table>";
		conteudo += "</div>";

	return conteudo;
}*/


/*function delimitarBairros(indice){
	if(document.getElementById("check_Bairro_"+indice).checked){
		document.getElementById("check_Bairro_"+indice).checked = false;
	} else {
		document.getElementById("check_Bairro_"+indice).checked = true;
	}
	redefinirCorBairro();
}


function redefinirCorBairro(){
	var bairros = document.getElementsByName("valorBairro");
	for (var i = 0; i < bairros.length; i++) {
		if (document.getElementById("check_Bairro_"+bairros[i].value).checked) {
			document.getElementById("iconeBairro_"+bairros[i].value).innerHTML = "<i class='fa fa-check'></i>";
			document.getElementById("linha_Bairro_"+bairros[i].value).style.backgroundColor = "#5cb85c";
		} else {
			document.getElementById("iconeBairro_"+bairros[i].value).innerHTML = "<i class='fa fa-times'></i>";
			document.getElementById("linha_Bairro_"+bairros[i].value).style.backgroundColor = "#d9534f";
		}
	}
	setarRegioesMapa(map, true);
}*/