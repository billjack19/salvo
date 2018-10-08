
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#cliente").val() == "")) campoFocus = "cliente";
	else if(validation($("#data_atualizacao").val() == "")) campoFocus = "data_atualizacao";


	else {
		$.ajax({
			url:'app/controllers/cadastro_posicao_cafeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
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
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#cliente").val("");
				$("#fazenda").val("");
				$("#cidade").val("");
				$("#insc_est").val("");
				$("#safra").val("");
				$("#lote").val("");
				$("#lote_cliente").val("");
				$("#entrada").val("");
				$("#nfe_fiscal").val("");
				$("#padrao").val("");
				$("#preparo").val("");
				$("#kilos").val("");
				$("#sacas").val("");
				$("#per_umi").val("");
				$("#per_imp").val("");
				$("#per_cat").val("");
				$("#per_def").val("");
				$("#cert").val("");
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
