var numTotalAreas = 0;


$(document).ready(function(){
	listaAreasAcesso();
});



function gravarRegistro(){
	var areas  = document.getElementsByName("areas");
	var areasSelecionadas = "";
	var contColunas = 0;
	for (var i = 0; i < areas.length; i++) {
		if (document.getElementById("check_"+areas[i].value).checked) {
			areasSelecionadas += contColunas == 0 ? areas[i].value : "+"+areas[i].value;
			contColunas++;
		}
	}

	var campoFocus = "";
		 if($("#descricao_nivel_acesso").val() == "") campoFocus = "descricao_nivel_acesso";
	else if(contColunas == numTotalAreas) toast.danger("Não pode cadastrar com todas as areas selecionadas!");
	else if(contColunas == 0) toast.danger("Não pode cadastrar com nenhuma area selecionada!");


	else {
		$.ajax({
			url:'app/controllers/funcoes_nivel_acessoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'adicionar_nivel_acesso': true,
				'descricao_nivel_acesso': $("#descricao_nivel_acesso").val(),
				'area_nivel_acesso': areasSelecionadas,
				'usuario_id': $("#usuario_id").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_nivel_acesso").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}

function validation(valor){
	if (valor == "") 	return false;
	else 				return true;
}




function listaAreasAcesso(){
	$.ajax({
		url:'app/controllers/funcoes_nivel_acessoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_nivel_acesso_id': true }
	}).done( function(data){
		formatarAreasAcesso(JSON.parse(data));
	});
}

function formatarAreasAcesso(area_nivel_acesso){
	numTotalAreas = 0;

	var tabelaColunas = "<h2>Areas de Acesso</h2>";
	var ctrlClass = "";
	var ctrlIcon = "";
	

	tabelaColunas +=	"<style>";
	tabelaColunas +=		".area_acesso_card{";
	tabelaColunas +=			"border-style: solid;";
	tabelaColunas +=			"border-color: lightgray;";
	tabelaColunas +=			"border-radius: 10px;";
	tabelaColunas +=			"box-shadow: 5px 5px 5px #eee;";
	tabelaColunas +=			"margin-top: 5px;";
	tabelaColunas +=			"margin-bottom: 5px;";
	tabelaColunas +=			"margin-left: 1px;";
	tabelaColunas +=			"margin-right: 1px;";
	tabelaColunas +=		"}";
	tabelaColunas +=	"</style>";
	
	for (i in area_nivel_acesso){
		tabelaColunas += 	"<div class='col-md-3 col-sm-4 col-xs-4 text-center'>";
		tabelaColunas += 	"<div class='area_acesso_card col-xs-11'>";
		tabelaColunas += 		"<h4 style='margin-bottom: -10px;margin-top: 5px;'>"+area_nivel_acesso[i].descritivo+"</h4><br>";


		ctrlClass = area_nivel_acesso[i].list == 1 ? "success" : "danger";
		ctrlIcon = area_nivel_acesso[i].list == 1 ? "check" : "times";
		tabelaColunas +=		"<div id='btn_area_l_"+area_nivel_acesso[i].area+"'>";
		tabelaColunas += 		"<button style='margin-bottom: 10px' class='btn btn-"+ctrlClass+" btn-block' onclick='definirAreaAcesso(\""+area_nivel_acesso[i].area+"\", \"l\", 0)'>";
		tabelaColunas += 			"<i class='fa fa-"+ctrlIcon+"'></i>&nbsp;&nbsp;Listar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		tabelaColunas += 		"</button>";
		tabelaColunas +=		"</div>";


		ctrlClass = area_nivel_acesso[i].list == 1 ? "success" : "danger";
		ctrlIcon = area_nivel_acesso[i].list == 1 ? "check" : "times";
		tabelaColunas +=		"<div id='btn_area_i_"+area_nivel_acesso[i].area+"'>";
		tabelaColunas += 		"<button style='margin-bottom: 10px' class='btn btn-"+ctrlClass+" btn-block' onclick='definirAreaAcesso(\""+area_nivel_acesso[i].area+"\", \"i\", 0)>";
		tabelaColunas += 			"<i class='fa fa-"+ctrlIcon+"'></i>&nbsp;&nbsp;Inserir&nbsp;&nbsp;&nbsp;&nbsp;";
		tabelaColunas += 		"</button>";
		tabelaColunas +=		"</div>";


		ctrlClass = area_nivel_acesso[i].list == 1 ? "success" : "danger";
		ctrlIcon = area_nivel_acesso[i].list == 1 ? "check" : "times";
		tabelaColunas +=		"<div id='btn_area_u_"+area_nivel_acesso[i].area+"'>";
		tabelaColunas += 		"<button style='margin-bottom: 10px' class='btn btn-"+ctrlClass+" btn-block' onclick='definirAreaAcesso(\""+area_nivel_acesso[i].area+"\", \"u\", 0)>";
		tabelaColunas += 			"<i class='fa fa-"+ctrlIcon+"'></i>&nbsp;&nbsp;Atualizar";
		tabelaColunas += 		"</button>";
		tabelaColunas +=		"</div>";

		tabelaColunas += 	"</div>";
		tabelaColunas += 	"</div>";
		numTotalAreas++;
	}
	
	tabelaColunas = numTotalAreas != 0 ? tabelaColunas : "Carregando Áreas...";

	$("#conteudoAreas_acesso").html(tabelaColunas);
}

function selecionarColuna(coluna){
	if (document.getElementById("check_"+coluna).checked) {
		document.getElementById("check_"+coluna).checked = false;
		document.getElementById("icone_"+coluna).innerHTML = "<i class='fa fa-times'></i>";
		document.getElementById("linha_"+coluna).style.backgroundColor = "#f0ad4e";
	} else {
		document.getElementById("check_"+coluna).checked = true;
		document.getElementById("icone_"+coluna).innerHTML = "<i class='fa fa-check'></i>";
		document.getElementById("linha_"+coluna).style.backgroundColor = "#5cb85c";
	}
}

function definirAreaAcesso(area, tipo, status){
	var ctrlClass = status == 1 ? "success" : "danger";
	var ctrlIcon = status == 1 ? "check" : "times";
	status = status == 1 ? 0 : 1;
	var resultado =		"<button style='margin-bottom: 10px' class='btn btn-"+ctrlClass+" btn-block' onclick='definirAreaAcesso(\""+area+"\", \""+tipo+"\", "+status+")>";
		resultado += 		"<i class='fa fa-"+ctrlIcon+"'></i>&nbsp;&nbsp;Atualizar";
		resultado += 	"</button>";
	document.getElementById("btn_area_"+tipo+"_"+area).innerHTML = resultado;
}