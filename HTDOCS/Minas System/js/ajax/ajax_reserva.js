function solicitacaoReserva(){
	var Loteamento  = $("#id_loteamento_reserva").val();
	var NumLote = $("#id_lote_reserva").val();
	var Corretor = $("#id_corretor_reservar").val();
	var DataReserva = pegarData();
	var HoraReserva = pegaHora();
	var ObservacaoReseva = $("#observacao_Reserva").val();

	var latitude = "";
	var logitude = "";
	var titulo = "";
	var situacao = 0;
	var id_caminhao = 0;
	var inputsCaminhaos = "";

	if (ObservacaoReseva != "") {
		$.ajax({
			url:'controllers/reservaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'Loteamento': Loteamento,
				'NumLote': NumLote,
				'Corretor': Corretor,
				'DataReserva': DataReserva,
				'HoraReserva': HoraReserva,
				'ObservacaoReseva': ObservacaoReseva
			}
		}).done( function(data){
			if (data != 1) { jk_toasth("error", "Erro ao tentar solicitar reserva!", 2500); } 
			else { 
				jk_toasth("success", "Solicitação enviada com sucesso!", 2500);
				document.getElementById('reservar_lote').style.display='none';
				location.reload();
			}
		});
	} else {
		jk_toasth("error", "Preencha todos os campos!", 2500);
		document.getElementById('observacao_Reserva').focus();
	}
}

function setarIdLoteamento(id){
	$("#id_lote_p_reserva").val(id);
	document.getElementById("submit_p_reserva").click();
}

function excluirReserva(id){
	if (confirm("Deseja cancelar solicitação de reserva!")) {
		$.ajax({
			url:'controllers/funcoes_lotesController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'cancelar_reserva': true,
				'id': id
			}
		}).done( function(data){
			if (data != 1) { jk_toasth("error", "Erro ao tentar cancelar reserva!", 2500); } 
			else { 
				jk_toasth("success", "Reserva cancelada com sucesso!", 2500);
				location.reload();
			}
		});
	}
}