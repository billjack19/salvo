
$(document).ready(function(){
	var id_posicao_cafe = "";
	var cliente = "";
	var fazenda = "";
	var cidade = "";
	var insc_est = "";
	var safra = "";
	var lote = "";
	var lote_cliente = "";
	var entrada = "";
	var nfe_fiscal = "";
	var padrao = "";
	var preparo = "";
	var kilos = "";
	var sacas = "";
	var per_umi = "";
	var per_imp = "";
	var per_cat = "";
	var per_def = "";
	var cert = "";
	var data_atualizacao = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});


	$.ajax({
		url:'app/controllers/funcoes_posicao_cafeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_posicao_cafe_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_posicao_cafe = vetor[0];
		
		cliente = vetor[1];
		fazenda = vetor[2];
		cidade = vetor[3];
		insc_est = vetor[4];
		safra = vetor[5];
		lote = vetor[6];
		lote_cliente = vetor[7];
		entrada = vetor[8];
		nfe_fiscal = vetor[9];
		padrao = vetor[10];
		preparo = vetor[11];
		kilos = vetor[12];
		sacas = vetor[13];
		per_umi = vetor[14];
		per_imp = vetor[15];
		per_cat = vetor[16];
		per_def = vetor[17];
		cert = vetor[18];
		data_atualizacao = vetor[19];
		
		$("#cliente").val(cliente);
		$("#fazenda").val(fazenda);
		$("#cidade").val(cidade);
		$("#insc_est").val(insc_est);
		$("#safra").val(safra);
		$("#lote").val(lote);
		$("#lote_cliente").val(lote_cliente);
		$("#entrada").val(entrada);
		$("#nfe_fiscal").val(nfe_fiscal);
		$("#padrao").val(padrao);
		$("#preparo").val(preparo);
		$("#kilos").val(kilos);
		$("#sacas").val(sacas);
		$("#per_umi").val(per_umi);
		$("#per_imp").val(per_imp);
		$("#per_cat").val(per_cat);
		$("#per_def").val(per_def);
		$("#cert").val(cert);
		$("#data_atualizacao").val(data_atualizacao);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#cliente").val() == "")) campoFocus = "cliente";
	else if(validation($("#data_atualizacao").val() == "")) campoFocus = "data_atualizacao";


	else {
		$.ajax({
			url:'app/controllers/atualiza_posicao_cafeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_posicao_cafe': $("#editar").val(),
				'cliente': $("#cliente").val(),
				'fazenda': $("#fazenda").val(),
				'cidade': $("#cidade").val(),
				'insc_est': $("#insc_est").val(),
				'safra': $("#safra").val(),
				'lote': $("#lote").val(),
				'lote_cliente': $("#lote_cliente").val(),
				'entrada': $("#entrada").val(),
				'nfe_fiscal': $("#nfe_fiscal").val(),
				'padrao': $("#padrao").val(),
				'preparo': $("#preparo").val(),
				'kilos': $("#kilos").val(),
				'sacas': $("#sacas").val(),
				'per_umi': $("#per_umi").val(),
				'per_imp': $("#per_imp").val(),
				'per_cat': $("#per_cat").val(),
				'per_def': $("#per_def").val(),
				'cert': $("#cert").val(),
				'data_atualizacao': $("#data_atualizacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Atualizar!");
			else 								toast.success("Atualizado com sucesso!");
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
