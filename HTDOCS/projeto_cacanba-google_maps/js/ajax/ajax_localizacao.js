// var cacamba_vermelha = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
var cacamba_vermelha = "img/cacamba_vermelha.png";
var cacamba_verde = "img/cacamba_verde.png";
var cacamba_temp = "img/cacamba_temp.png";
var truck = "img/truck.png";
var clienteIcon = "img/cliente.png";

// tirar camimnhao arrya depois de fazer outra aplicação
var caminhaoArray = [];

var Markers = [];
var Caminhaos = [];
var Clientes = [];
var map = "";
var editarCacamba = "";


function initMap() {
	// Create a map object and specify the DOM element for display.
	map = new google.maps.Map(document.getElementById('map'), {
		// (-21.791066481181826, -46.56498469848634)
		// center: {lat: -21.799966481181826, lng: -46.56498469848634},
		center: {lat: 3.0, lng: 20.00},
    	// mapTypeId: 'terrain',
		zoom: 3
	});

	map.addListener('click', function(event) {
		alert(event.latLng);
	});

	// Marker =  new google.maps.Marker({
	// 	position: {lat: -21.801517634953733, lng: -46.568141682073474},
	// 	map: map,
	// 	icon: cacamba_verde,
	// 	title:"Minha Casa"
	// });
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
			icon: icone,
		    title: titulo,
		    query: 'teste'
		});

		
		// Marker.addListener('click', toggleBounce);
		

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



function temporalizadorAtualiza(){
	setInterval(function(){ 
		atualizaPosicaoCaminhao();
		atualizaCacamba();
	}, 10000);
	listarRegiaoCombo();
	// listarSubRegiaoCombo();
}




// remover marcadores do mapa / filtro
function removerMarcadores(){
	for (var i = 0; i < Markers.length; i++) {
		Markers[i].setMap(null);
	}
}

function remorverMarcadoresEspacifico(icone, chamar){
	if (chamar) listarCacamba();

	for (var i = 0; i < Markers.length; i++) {
		if (Markers[i].icon = icone) {
			Markers[i].setMap(null);
		}
	}
}

function removerCaminhaos(){
	for (var i = 0; i < Caminhaos.length; i++) {
		Caminhaos[i].setMap(null);
	}
}

function removerClientes(){
	for (var i = 0; i < Clientes.length; i++) {
		Clientes[i].setMap(null);
	}
}





function chamarConfirmarCacamba(id, elemento, titulo){
	$("#modalIdCacambaCanfirma").val(id);
	editarCacamba = elemento;
	$("#modalTituloConfirma").html(titulo);
	// $("#modalTituloConfirma").val(titulo);
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
	var id = $("#modalIdCacambaCanfirma").val();
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
				atualizaSituacaoCacamba(2, id);
				editarCacamba.setIcon(cacamba_vermelha);
				editarCacamba = "";
				document.getElementById("fecharModalComfirmaCacamba").click();

				jk_toasth('info', "Pedido confirmado!");
			}
		}
	});
}


function recolherPedidoCacamba(){
	var id = $("#modalIdCacambaRecolher").val();
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
				atualizaSituacaoCacamba(3, id);

				editarCacamba.setIcon(cacamba_verde);
				editarCacamba = "";
				document.getElementById("fecharModalRecolherCacamba").click();

				jk_toasth('info', "Pedido confirmado!");
			}
		}
	});
}


function excluirPedidoCacamba(){
	var id = $("#modalIdCacambaCanfirma").val();
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
				atualizaSituacaoCacamba(0, id);

				editarCacamba.setMap(null);
				editarCacamba = "";
				document.getElementById("fecharModalComfirmaCacamba").click();

				jk_toasth('error', "Pedido excluido!");
			}
		}
	});
}



function finalizarPedidoCacamba(){
	var id = $("#modalIdCacambaFinalizar").val();
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
				atualizaSituacaoCacamba(4, id);

				editarCacamba.setMap(null);
				editarCacamba = "";
				document.getElementById("fecharModalFinalizarCacamba").click();

				jk_toasth('success', "Pedido finalizado!");
			}
		}
	});
}



// buscar o endereço pesquisando pelo cep

function buscaPorCep(){
	var cep = $("#modalCEPEndereco").val();
	cep = cep.replace("_", "");

	var numCep = cep.length;
	var iconeCarrega = "<i class='fa fa-spinner fa-pulse fa-fw'></i>";
	var iconeVoltar = $("#carregarCep").html();

	if (numCep == 9) {
		document.getElementById("modalCEPEndereco").disabled = true;
		$("#carregarCep").html(iconeCarrega);
		var url = "https://viacep.com.br/ws/"+cep+"/json/";

		$.ajax({
			type: 'GET',
			cache: false,
			url: url,
			dataType: "json",
			contentType: "application/json; charset=utf-8"
			// data: JSON.stringify(user)
		}).done( function(data){

			// console.log(data);

			if (data.erro) {
				jk_toasth('error', "Erro ao tentar encontrar o CEP!");
				$("#carregarCep").html(iconeVoltar);

				$("#modalEnderecoEndereco").val("");
				$("#modalBairroEndereco").val("");
				$("#modalCidadeEndereco").val("");
				$("#comboUfModalEndereco").val("");
				$('#modalCEPEndereco').val("");

				document.getElementById("modalCEPEndereco").disabled = false;
				$('#modalCEPEndereco').focus();
			} else {
				var logradouro = data.logradouro;
				var bairro = data.bairro;
				var localidade = data.localidade;
				var uf = data.uf;

				$("#modalEnderecoEndereco").val(logradouro);
				$("#modalBairroEndereco").val(bairro);
				$("#modalCidadeEndereco").val(localidade);
				$("#comboUfModalEndereco").val(uf);
				$("#carregarCep").html(iconeVoltar);
				$('#modalNumeroEndereco').focus();
				document.getElementById("modalCEPEndereco").disabled = false;
			}
		});
	}
}







function atualizaSituacaoCacamba(situacao, id){
	if (situacao == 0) {
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'deletar_cacamba': true,
				'id': id
			}
		}).done( function(data){
			// console.log(data);
			if (data == 0 || data == "0") {
				jk_toasth('error', "Falha ao tentar excluir Caçamba!");
			} else {
				atualizaCacamba();
			}
		});
	} else {
		$.ajax({
			url:'controllers/funcoesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'atualizar_situacao': true,
				'situacao': situacao,
				'id': id
			}
		}).done( function(data){
			// console.log(data);
			if (data == 0 || data == "0") {
				jk_toasth('error', "Falha ao tentar atualizar a situação da Caçamba!");
			} else {
				atualizaCacamba();
				// console.log("Sucesso");
			}
		});
	}
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




// Funções para cliente
function adicionarClientes(latitude , logitude, titulo){
	var posicao = new google.maps.LatLng(latitude,logitude);

	var Cliente = new google.maps.Marker({
		position:  posicao,
		map: map,
		draggable: false,
		icon: clienteIcon,
		title: titulo
	});
	Cliente.addListener('click', function(event) {
		alert(event.latLng);
	});

	Cliente.setMap(map);

	Clientes.push(Cliente);
	adicionarCaminhaoMapa();

}




//  Caçamaba residencial
function marcadorPorEndereço(){
	var endereco = $("#modalEnderecoEndereco").val();
	endereco = formatarEndereco(endereco);
	var num = $("#modalNumeroEndereco").val();
	// var cidade =  $("#cidadeInputList-flexdatalist").val();
	var cidade =  $("#modalCidadeEndereco").val();
	cidade = formatarCidade(cidade);
	var cep = $("#modalCEPEndereco").val();
	var titulo = $("#modalTituloEndereco").val();

	var logitude = 0;
	var latitude = 0;
	var geometry = 0;

	if (cep == "" || titulo == "" || num == "" || endereco == "" || cidade == "") {
		jk_toasth('error', "Por favor! Preencha todos os dados!");
	} else {
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

				adicionarCacambaSQL(latitude, logitude);
				adicionarMarcador(latitude , logitude , titulo, 1, 0);

				$("#modalEnderecoEndereco").val("");
				$("#modalNumeroEndereco").val("");
				$("#modalCidadeEndereco").val("");
				$("#modalCEPEndereco").val("");
				$("#modalTituloEndereco").val("");
				$("#modalBairroEndereco").val("");
				$("#comboUfModalEndereco").val("");

				document.getElementById("fecharModalBottun").click();

			} else {
				jk_toasth('error', "Verifique se os dados foram preenchidos corretamente!");
			}
		});
	}
}




function formatarCidade(cidade){
	cidade = cidade.replace(" ", "+");

	return cidade;
}

function formatarEndereco(endereco){
	endereco = endereco.replace("rua ", "");
	endereco = endereco.replace("Rua ", "");
	endereco = endereco.replace("av ", "");
	endereco = endereco.replace("av ", "");
	endereco = endereco.replace("avenida ", "");
	endereco = endereco.replace("Avenida ", "");
	endereco = endereco.replace("tr ", "");
	endereco = endereco.replace("Tr ", "");
	endereco = endereco.replace("travessa ", "");
	endereco = endereco.replace("Travessa ", "");
	endereco = endereco.replace("praça ", "");
	endereco = endereco.replace("Praça ", "");
	

	// tem que ser o último
	endereco = endereco.replace(" ", "+");
	return endereco;
}


$('#modalAdicinarMarcador').on('shown.bs.modal', function () {
    $('#modalTituloEndereco').focus();
});