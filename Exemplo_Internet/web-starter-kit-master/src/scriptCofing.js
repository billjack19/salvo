/* Cofiguração */
function carregarComboSupermercado(){

}


function mudarPagina(elemento, idDiv){
	var elementosMenu = document.getElementsByName("itemMenu");
	var elementosMenuDiv = document.getElementsByName("itemMenuDiv");
	for (var i = 0; i < elementosMenu.length; i++) {
		elementosMenu[i].className = "";
		elementosMenuDiv[i].className = "hidden";
	}
	elemento.className = "active";
	$("#"+idDiv)[0].className = "";
}