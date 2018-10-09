function statusLotesLista(contrato){
	if (!document.getElementById("check_"+contrato).checked) {
		document.getElementById("linha_"+contrato).className = "w3-green";
		document.getElementById("compoIcon_"+contrato).innerHTML = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
	} else {
		document.getElementById("linha_"+contrato).className = "w3-red";
		document.getElementById("compoIcon_"+contrato).innerHTML = "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
	}
	document.getElementById("check_"+contrato).click();
}

function listarDuplicatas(){
	$("#divTabelaDup").html("<center><h2>Carregando...</h2></center>");
	var checboxs = document.getElementsByName("loteValue");
	var contrato = " AND (";
	var contContrato = 0
	for (var i = 0; i < checboxs.length; i++) {
		if (!document.getElementById("check_"+checboxs[i].value).checked) {
			contrato += contContrato == 0 ?       "Lanc_VendasLote.Documento = '"+checboxs[i].value+"'"
										  : " OR  Lanc_VendasLote.Documento = '"+checboxs[i].value+"'";
			contContrato++;
		}
	}
	contrato += ")";
	if (contContrato == 0) contrato = "";

	if (
		document.getElementById("pagoCheck").checked 	||
		document.getElementById("atrazoCheck").checked 	||
		document.getElementById("pagarCheck").checked
	) {
		var filtros = document.getElementsByName("filtroCondPag");
		var contFiltro = 0;
		for (var i = 0; i < filtros.length; i++) {
			if (filtros[i].checked) {
				contFiltro++;
				if (contFiltro == 1) {
					switch(i){
						case 0 : contrato += " AND (cpritens_dup.DATA_PAGAMENTO <> '0000-00-00 00:00:00'"; break;
						case 1 : contrato += " AND ((cpritens_dup.DATA_PAGAMENTO = '0000-00-00 00:00:00') AND DATEDIFF(cpritens_dup.VENCIMENTO,CASE WHEN replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) IS NULL THEN CURDATE() ELSE replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) END) < 0"; break;
						case 2 : contrato += " AND ((cpritens_dup.DATA_PAGAMENTO = '0000-00-00 00:00:00') AND DATEDIFF(cpritens_dup.VENCIMENTO,CASE WHEN replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) IS NULL THEN CURDATE() ELSE replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) END) >= 0"; break;
					}
				} else {
					switch(i){
						case 0 : contrato += " OR cpritens_dup.DATA_PAGAMENTO <> '0000-00-00 00:00:00'"; break;
						case 1 : contrato += " OR (cpritens_dup.DATA_PAGAMENTO = '0000-00-00 00:00:00') AND DATEDIFF(cpritens_dup.VENCIMENTO,CASE WHEN replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) IS NULL THEN CURDATE() ELSE replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) END) < 0"; break;
						case 2 : contrato += " OR (cpritens_dup.DATA_PAGAMENTO = '0000-00-00 00:00:00') AND DATEDIFF(cpritens_dup.VENCIMENTO,CASE WHEN replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) IS NULL THEN CURDATE() ELSE replace(cpritens_dup.DATA_PAGAMENTO, '0000-00-00 00:00:00', null) END) >= 0"; break;
					}
				}
			}
		}
		contrato += ")";
	}

	console.log("contrato: "+contrato);
	$.ajax({
		url:'controllers/funcoes_duplicatasController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'contrato': contrato,
			'cliente': $("#clienteVal").val()
		}
	}).done( function(data){
		$("#divTabelaDup").html(data);
	});
}

function listarDuplicatasFiltro(tipo){
	if (document.getElementById(tipo + "Check").checked) {
		document.getElementById(tipo + "DivId").innerHTML = "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
		document.getElementById(tipo + "Check").checked = false;
	} else {
		document.getElementById(tipo + "DivId").innerHTML = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
		document.getElementById(tipo + "Check").checked = true;
	}
}


function modalImposto(Codigo, NumLote, Nome){
	document.getElementById('modalImpostoLoteamento').value = Codigo;
	document.getElementById('modalImpostoNumLote').value = NumLote;
	document.getElementById('modalImpostoLoteamentoNome').value = Nome;

	document.getElementById("imposto").style.display="block";
	document.getElementById("modalImpostoAno").focus();
	document.getElementById("modalImpostoAno").value = "";
	document.getElementById("carregandoDemostrativo").innerHTML = "";
}

function liberarLink(){
	var loteamenato = document.getElementById('modalImpostoLoteamento').value;
	var lote = document.getElementById('modalImpostoNumLote').value;
	var ano = document.getElementById('modalImpostoAno').value;

	if (ano.length == 4) {
		ano = parseInt(ano);
		/*$.ajax({
			url:'pdf/imposto.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'ano': ano,
				'loteamenato': loteamenato,
				'lote': lote
			}
		}).done( function(data){ console.log(data) });*/
		// window.open('pdf/imposto.php?4ff9fc6e4e5d5f590c4f2134a8cc96d1=5853b9959a741978fa386d2d71083f81&ano='+ano+'&5ecc4aa302d527a68a6538d72190310d=7a886adb7a7ae725415ff055ebb8a019&loteamenato='+loteamenato+'&71181486a480eb672f9f8e329a7c68af=caf9b6b99962bf5c2264824231d7a40c&lote='+lote+'&cacf6cc1890fc2972ae48f990db3ff3a=f1aa3cffcc247ad7f86dac8157b41230', '_blank');
	} else {
		jk_toasth("error", "Verifique a data digitada: Não pode ser nula e nem ter menos de 4 caracteres!", 10000);
		document.getElementById("modalImpostoAno").focus();
	}
}



function sortTable(n, id) {
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.getElementById("id");
	switching = true;
	//Set the sorting direction to ascending:
	dir = "asc"; 
	/*Make a loop that will continue until
	no switching has been done:*/
	while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.getElementsByTagName("TR");
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i < (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[n];
			y = rows[i + 1].getElementsByTagName("TD")[n];
			/*check if the two rows should switch place,
			based on the direction, asc or desc:*/
			if (dir == "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					//if so, mark as a switch and break the loop:
					shouldSwitch= true;
					break;
				}
			} else if (dir == "desc") {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
					//if so, mark as a switch and break the loop:
					shouldSwitch= true;
					break;
				}
			}
		}
		if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			//Each time a switch is done, increase this count by 1:
			switchcount ++;      
		} else {
			/*If no switching has been done AND the direction is "asc",
			set the direction to "desc" and run the while loop again.*/
			if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			}
		}
	}
}
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById("myBtn").style.display = "block";
	} else {
		document.getElementById("myBtn").style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");


function zoomImage(img){
	
}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
	modal.style.display = "none";
}

// ZOOM IMAGEM
//$("#img").elevateZoom({zoomWindowPosition: 1, scrollZoom : true});
$("#imgMap").elevateZoom({zoomWindowPosition: 11, scrollZoom : true});

//GOOGLE MAPS
var latitude = document.getElementById("Latitude");
var longitude =  document.getElementById("Longitude");

function myMap() {
	myCenter=new google.maps.LatLng(latitude.value, longitude.value);
	var mapOptions= {
		center:myCenter,
		zoom:17, scrollwheel: true, draggable: true,
		mapTypeId:google.maps.MapTypeId.HYBRID
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

	var marker = new google.maps.Marker({
		position: myCenter,
	});
	marker.setMap(map);
}

function chamarGradeInteressados(id, numLote){
	var DataReserva = "";
	var HoraReserva = "";
	var ObservacaoReseva = "";
	var nome = "";
	$("#listaInterresados").html("<i class=\"fa fa-spinner fa-spin fa-1x fa-fw\"></i> Carregando...");

	var jk_config = "";
	var cont = 0;

	$.ajax({
		url:'controllers/funcoes_lotesController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_interesados': true,
			'id': id,
			'numLote': numLote
		}
	}).done( function(data){
		if (data != "") {
			jk_config += "<table class=\"w3-table-all w3-centered w3-responsive\" id=\"myTable\">";
			jk_config += "		<tr class=\"cdi-vermelho-brothers\">";
			jk_config += "			<th>Ordem</th>";
			jk_config += "			<th>Data</th>";
			jk_config += "			<th>Corretor</th>";
			jk_config += "			<th>Observação</th>";
			jk_config += "		</tr>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				cont += 1;
				subvetor = vetor[i].split(",");

				DataReserva = 		subvetor[0];
				HoraReserva = 		subvetor[1];
				ObservacaoReseva = 	subvetor[2];
				nome = 				subvetor[3];

				DataReserva = DataReserva.substring(0, 10);
				DataReserva = formatarData(DataReserva);


				jk_config += "	<tr>";
				jk_config += "		<td>"+cont+"</td>";
				jk_config += "		<td>"+DataReserva+" "+HoraReserva+"</td>";
				jk_config += "		<td>"+nome+"</td>";
				jk_config += "		<td>"+ObservacaoReseva+"</td>";
				jk_config += "	</tr>";
			}
			jk_config += "</table>";
		} else {
			jk_config += "<h4>Nenhum interessado</h4>";
		}
		$("#listaInterresados").html(jk_config);
	});
}