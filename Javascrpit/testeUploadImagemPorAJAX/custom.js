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
		   url: "action.php",
		   type: "POST",
		   data: formData,
		   dataType: 'json',
		   processData: false,  
		   contentType: false,
		   success: function(retorno){
	   			if (retorno.status == '1'){
	   				$('.mensagem').html(retorno.mensagem);
	   			}else{
	   				$('.mensagem').html(retorno.mensagem)
	   			}
	   			$('.card-panel').removeClass('hide');
	   	   }
		});

		return false;
	});


	// Carrega a imagem selecionada no elemento <img>
	$("input[type=file]").on("change", function(){
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;

        console.log(files[0].type);

        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onload = function(){
                $("#imagem").attr('src', this.result);
            }
        }
    });

});