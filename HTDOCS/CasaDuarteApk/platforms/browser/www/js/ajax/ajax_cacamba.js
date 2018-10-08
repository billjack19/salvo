function listarCacamba(){
	var latitude = "";
	var logitude = "";
	var titulo = "";
	var situacao = 0;
	var id_cacamba = 0;

	$.ajax({
		type: 'GET',
		url: urlWebService+"CacambaWS/listar/"+parametrosWebService,
		contentType: "application/json",
		jsonpCallback: "localJsonpCallback"
	}).done( function(data){
		if (data.length == 0) {
			$.toast({
				text: "Nenhum registro de Caçambas encontrado no servidor!", 
				heading: 'Aviso', 
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
		} else {
			for(i in data){
				id_cacamba = data[i].id_cacamba
				latitude = data[i].latitude;
				logitude = data[i].longitude;
				titulo = data[i].titulo;
				situacao = data[i].situacao;

				adicionarMarcador(latitude , logitude, titulo, situacao, id_cacamba);
			}
		}
	});
}

