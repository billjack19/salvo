$(document).ready(function($) {

	// Evento Submit do formulário
	$('#formulario').submit(function() {

		// Captura os dados do formulário
		var formulario = document.getElementById('formulario');

		// Instância o FormData passando como parâmetro o formulário
		var formData = new FormData(formulario);
		console.log(formData);
		// Envia O FormData através da requisição AJAX
		$.ajax({
			url: "mail/contact_me.php",
			type: "POST",
			data: formData,
			dataType: 'json',
			processData: false,  
			contentType: false,
		}).done( function(data){
			console.log("data (ajax_contract_me): "+data);
		});

		return false;
	});


	// Carrega a imagem selecionada no elemento <img>
	$("input[type=file]").on("change", function(){
		var resultado = "";
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return;

		if (/^image/.test( files[0].type)){
			var reader = new FileReader();
			reader.readAsDataURL(files[0]);

			reader.onload = function(){
				resultado = end(this.result.split("."));
				if (resultado != "pdf") $("#arquivo").val("");
				
				// switch(resultado){
				// 	case "jpg":
				// 	case "png":
				// 	case "bmp":
				// 	case "gif":
				// 	case "ico":
				// 		$("#imagem").attr('src', this.result); break;
				// }
				// if (
				// 	resultado == "jpg" || 
				// 	resultado == "png" || 
				// 	resultado == "bmp" || 
				// 	resultado == "gif" || 
				// 	resultado == "ico"
				// ) {
				//		$("#imagem").attr('src', this.result);
				// }
			}
		}
	});

});


function end(array){
	var retorno = "";
	for (var i = array.length - 1; i >= 0; i--) { retorno = array[i]; i = -1; }
	return retorno;
}






// $(function() {

	// $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
	// 	preventSubmit: true,
	// 	submitError: function($form, event, errors) {
	// 		// additional error messages or events
	// 	},
	// 	submitSuccess: function($form, event) {
	// 		event.preventDefault(); // prevent default submit behaviour
	// 		// get values from FORM
	// 		var formData = new FormData($("#contactForm"))	;
	// 		var name = $("input#name").val();
	// 		var email = $("input#email").val();
	// 		var phone = $("input#phone").val();
	// 		var message = $("textarea#message").val();
	// 		var arquivo = $("input#arquivo").val();
	// 		var firstName = name; // For Success/Failure Message
	// 		// Check for white space in name for Success/Fail message
	// 		if (firstName.indexOf(' ') >= 0) {
	// 			firstName = name.split(' ').slice(0, -1).join(' ');
	// 		}
	// 		$this = $("#sendMessageButton");
	// 		$this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
	// 		$.ajax({
	// 			url: "././mail/contact_me.php",
	// 			type: "POST",
	// 			data: {
	// 				formData
	// 			},
	// 			cache: false,
	// 			success: function() {
	// 				// Success message
	// 				$('#success').html("<div class='alert alert-success'>");
	// 				$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
	// 					.append("</button>");
	// 				$('#success > .alert-success')
	// 					.append("<strong>Sua mensagem foi enviada. </strong>");
	// 				$('#success > .alert-success')
	// 					.append('</div>');
	// 				//clear all fields
	// 				$('#contactForm').trigger("reset");
	// 			},
	// 			error: function() {
	// 				// Fail message
	// 				$('#success').html("<div class='alert alert-danger'>");
	// 				$('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
	// 					.append("</button>");
	// 				$('#success > .alert-danger').append($("<strong>").text("Desculpe " + firstName + ", mas o servidor de E-mail não responde. Por Favor tente mais tarde!"));
	// 				$('#success > .alert-danger').append('</div>');
	// 				//clear all fields
	// 				$('#contactForm').trigger("reset");
	// 			},
	// 			complete: function() {
	// 				setTimeout(function() {
	// 					$this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
	// 				}, 1000);
	// 			}
	// 		}).done( function(data){
	// 			console.log("data (ajax_contract_me): "+data);
	// 		});
	// 	},
	// 	filter: function() {
	// 		return $(this).is(":visible");
	// 	},
	// });
	// Carrega a imagem selecionada no elemento <img>
	

	// $("input[type=file]").on("change", function(){
	//		var files = !!this.files ? this.files : [];
	//		if (!files.length || !window.FileReader) return;

	//		if (/^image/.test( files[0].type)){
	//			var reader = new FileReader();
	//			reader.readAsDataURL(files[0]);

	//			reader.onload = function(){
	//				$("#imagem").attr('src', this.result);
	//			}
	//		}
	//	});


	// Evento Submit do formulário
// 	$('#contactForm').submit(function() {

// 		// Captura os dados do formulário
// 		var formulario = document.getElementById('contactForm');

// 		// Instância o FormData passando como parâmetro o formulário
// 		var formData = new FormData(formulario);

// 		// Envia O FormData através da requisição AJAX
// 		$.ajax({
// 			url: "././mail/contact_me.php",
// 			type: "POST",
// 			data: formData,
// 			dataType: 'json',
// 			processData: false,
// 			contentType: false,
// 			success: function(retorno){
// 				// Success message
// 				$('#success').html("<div class='alert alert-success'>");
// 				$('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
// 					.append("</button>");
// 				$('#success > .alert-success')
// 					.append("<strong>Sua mensagem foi enviada. </strong>");
// 				$('#success > .alert-success')
// 					.append('</div>');
// 				//clear all fields
// 				$('#contactForm').trigger("reset");
// 			}
// 		}).done( function(data){
// 			console.log("data (ajax_contract_me): "+data);
// 		});

// 		return false;
// 	});

// 	$("a[data-toggle=\"tab\"]").click(function(e) {
// 		e.preventDefault();
// 		$(this).tab("show");
// 	});
// });

// /*When clicking on Full hide fail/success boxes */
// $('#name').focus(function() {
// 	$('#success').html('');
// });
