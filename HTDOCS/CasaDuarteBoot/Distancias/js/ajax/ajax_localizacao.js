// var cacamba_vermelha = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
var cacamba_vermelha = "img/cacamba_vermelha.png";
var cacamba_verde = "img/cacamba_verde.png";
var cacamba_temp = "img/cacamba_temp.png";
var truck = "img/truck.png";

// tirar camimnhao arrya depois de fazer outra aplicação
var caminhaoArray = [];

var Markers = [];
var Caminhaos = [];
var map = "";
var editarCacamba = "";


function initMap() {
	// Create a map object and specify the DOM element for display.
	map = new google.maps.Map(document.getElementById('map'), {
		// (-21.791066481181826, -46.56498469848634)
		center: {lat: -21.799966481181826, lng: -46.56498469848634},
    	// mapTypeId: 'terrain',
		zoom: 14
	});

	// map.addListener('click', function(event) {
	// 	alert(event.latLng);
	// });

	// Marker =  new google.maps.Marker({
	// 	position: {lat: -21.801517634953733, lng: -46.568141682073474},
	// 	map: map,
	// 	icon: cacamba_verde,
	// 	title:"Minha Casa"
	// });
	listarCacamba();
	listarCaminhao();
}



// Funções para caçamba
function adicionarMarcador(latitude , logitude, titulo, situacao, id_camcaba){
	var posicao = new google.maps.LatLng(latitude,logitude);
	var icone = "";
	var controle = true;

	if (situacao == 1) {
		icone = cacamba_temp;
	} else if(situacao == 2) {
		icone = cacamba_vermelha;
	} else if (situacao == 3) {
		icone = cacamba_verde;
	} else {
		controle = false;
	}

	if (controle) {
		var Marker = new google.maps.Marker({
		    position:  posicao,
		    map: map,
		    draggable: false,
			animation: google.maps.Animation.DROP,
			icon: icone,
		    title: titulo
		});
		

		Marker.addListener('dblclick', function(event) {
          alert("id_camcaba: "+id_camcaba);
        });

        Marker.addListener('click', function(event) {
        	if (Marker.icon == cacamba_temp) {
        		chamarConfirmarCacamba(id_camcaba, Marker, titulo);
        	} else if (Marker.icon == cacamba_vermelha) {
        		chamarRecolherCacamba(id_camcaba, Marker, titulo);
        	} else {
        		chamarFinalizarCacamba(id_camcaba, Marker, titulo);
        	}
        });

		Markers.push(Marker);
		adicionarMarcadorMapa();
	}
}


// Adicionar marcadores no mapa Caçamba e Caminhão
function adicionarMarcadorMapa() {
	for (var i = 0; i < Markers.length; i++) {
		Markers[i].setMap(map);
	}
}

function adicionarCaminhaoMapa() {
	for (var i = 0; i < Caminhaos.length; i++) {
		Caminhaos[i].setMap(map);
	}
}







// remover marcadores do mapa / filtro
function removerMarcadores(){
	for (var i = 0; i < Markers.length; i++) {
		Markers[i].setMap(null);
	}
}

function remorverMarcadoresEspacifico(icone, chamar){
	if (chamar) { 
		listarCacamba();
		for (var i = 0; i < Markers.length; i++) {
			if (Markers[i].icon = icone) {
				Markers[i].setMap(null);
			}
		}
	} else {
		for (var i = 0; i < Markers.length; i++) {
			if (Markers[i].icon = icone) {
				Markers[i].setMap(null);
			}
		}
	}		
}

function removerCaminhaos(){
	for (var i = 0; i < Caminhaos.length; i++) {
		Caminhaos[i].setMap(null);
	}
}





function chamarConfirmarCacamba(id, elemento, titulo){
	$("#modalIdCacambaCanfirma").val(id);
	editarCacamba = elemento;
	$("#modalTituloConfirma").val(titulo);
	document.getElementById("confirmarCacambaButton").click();
}


function chamarRecolherCacamba(id, elemento, titulo){
	$("#modalIdCacambaRecolher").val(id);
	editarCacamba = elemento;
	$("#modalTituloRecolher").val(titulo);
	document.getElementById("recolherCacambaButton").click();
}


function chamarFinalizarCacamba(id, elemento, titulo){
	$("#modalIdCacambaFinalizar").val(id);
	editarCacamba = elemento;
	$("#modalTituloFinalizar").val(titulo);
	document.getElementById("finalizarCacambaButton").click();
}



function canfirmarPedidoCacamba(){
	bootbox.confirm({
		title: "Tem certeza que deseja confirmar pedido?",
		message: "Ao aperta o botão \"Sim\" você irá confirmar que a caçamba foi entregue",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				// ajxax para alterar situaação

				editarCacamba.setIcon(cacamba_vermelha);
				editarCacamba = "";
				document.getElementById("fecharModalComfirmaCacamba").click();

				$.toast({
					text: "Pedido confirmado!", 
					heading: 'Nota', 
					icon: 'info', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'top-right',
					extAlign: 'right',
					loader: true,
					loaderBg: '#44f'
				});
			}
		}
	});
}


function recolherPedidoCacamba(){
	bootbox.confirm({
		title: "Tem certeza que deseja mandar recolher caçamba?",
		message: "Ao aperta o botão \"Sim\" você irá confirmar pedido de recolhimento da caçamba",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				// ajxax para alterar situaação

				editarCacamba.setIcon(cacamba_verde);
				editarCacamba = "";
				document.getElementById("fecharModalRecolherCacamba").click();

				$.toast({
					text: "Pedido confirmado!", 
					heading: 'Nota', 
					icon: 'info', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'top-right',
					extAlign: 'right',
					loader: true,
					loaderBg: '#44f'
				});
			}
		}
	});
}


function excluirPedidoCacamba(){
	bootbox.confirm({
		title: "Tem certeza que deseja excluir pedido?",
		message: "Ao aperta o botão \"Sim\" você irá excluir o pedido da caçamba",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				// ajxax para excliur pedido

				editarCacamba.setMap(null);
				editarCacamba = "";
				document.getElementById("fecharModalComfirmaCacamba").click();

				$.toast({
					text: "Pedido excluido!", 
					heading: 'Nota', 
					icon: 'error', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'top-right',
					extAlign: 'right',
					loader: true,
					loaderBg: '#44f'
				});
			}
		}
	});
}



function finalizarPedidoCacamba(){
	bootbox.confirm({
		title: "Tem certeza que deseja finalizar pedido?",
		message: "Ao aperta o botão \"Sim\" você irá finalizar o pedido da caçamba",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				// ajxax para excliur pedido

				editarCacamba.setMap(null);
				editarCacamba = "";
				document.getElementById("fecharModalFinalizarCacamba").click();

				$.toast({
					text: "Pedido finalizado!", 
					heading: 'Nota', 
					icon: 'success', 
					showHideTransition: 'slide', 
					allowToastClose: true, 
					hideAfter: 2500, 
					stack: 5, 
					position: 'top-right',
					extAlign: 'right',
					loader: true,
					loaderBg: '#44f'
				});
			}
		}
	});
}


















// Funções para caminhão

function adicionarCaminhao(latitude , logitude, titulo){
	var posicao = new google.maps.LatLng(latitude,logitude);


	var Caminhao = new google.maps.Marker({
	    position:  posicao,
	    map: map,
	    draggable: false,
		icon: truck,
	    title: titulo
	});
	// Marker.addListener('click', toggleBounce);
	Caminhao.addListener('click', function(event) {
          alert(event.latLng);
        });

	Caminhao.setMap(map);

	Caminhaos.push(Caminhao);
	adicionarCaminhaoMapa();

}

function localCaminhao(){
	alert(Caminhao.position);
}

function modalSolucao(situacao, id){		
	alert( Marker.position );
}




function marcadorPorEndereço(){
	var endereco = $("#modalEnderecoEndereco").val();
	endereco = formatarEndereco(endereco);
	var num = $("#modalNumeroEndereco").val();
	var cidade = $("#modalCidadeEndereco").val();
	cidade = formatarCidade(cidade);
	var cep = $("#modalCEPEndereco").val();
	var titulo = $("#modalTituloEndereco").val();

	var logitude = 0;
	var latitude = 0;
	var geometry = 0;


	$.ajax({
		type: 'GET',
		url: urlGoogleMaps+"?address="+endereco+","+num+","+cidade+","+cep+chaveGoogleMaps,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		// console.log(data);

		if(data.status == "OK"){
			// console.log("sucesso!");
			for (var i = 0; i < data.results.length; i++) {
				geometry = data.results[i].geometry;
				for(i in geometry){
					if ( geometry[i].lat != undefined && geometry[i].lng != undefined) {
						latitude = geometry[i].lat;
						logitude = geometry[i].lng;
					}
				}
			}

			adicionarMarcador(latitude , logitude , titulo, 1, 0);

			$("#modalEnderecoEndereco").val("");
			$("#modalNumeroEndereco").val("");
			$("#modalCidadeEndereco").val("");
			$("#modalCEPEndereco").val("");
			$("#modalTituloEndereco").val("");

			document.getElementById("fecharModalBottun").click();

			$.toast({
				text: "Marcador adicionado com sucesso!", 
				heading: 'Nota', 
				icon: 'success', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});

		} else {
			$.toast({
				text: "Verifique se os dados foram preenchidos corretamente!", 
				heading: 'Erro ao adicinar marcador', 
				icon: 'error', 
				showHideTransition: 'slide', 
				allowToastClose: true, 
				hideAfter: 2500, 
				stack: 5, 
				position: 'top-right',
				extAlign: 'right',
				loader: true,
				loaderBg: '#44f'
			});
		}
	});
}




function formatarCidade(cidade){
	cidade = cidade.replace(" ", "+");

	return cidade;
}

function formatarEndereco(endereco){
	endereco = endereco.replace("rua ", "");
	endereco = endereco.replace("av ", "");
	endereco = endereco.replace("avenida ", "");
	endereco = endereco.replace("tr ", "");
	endereco = endereco.replace("travessa ", "");
	

	// tem que ser o último
	endereco = endereco.replace(" ", "+");
	return endereco;
}

$('#modalAdicinarMarcador').on('shown.bs.modal', function () {
    $('#modalEnderecoEndereco').focus();
});