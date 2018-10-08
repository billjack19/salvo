function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)

    if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
    }
}
function formatarNumero(mascara, documento){
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i);
	var er = /[^0,1,2,3,4,5,6,7,8,9,-,.]/;
	er.lastIndex = 0;
	var campo = documento;

	if (er.test(campo.value)){
		campo.value = campo.value.substring(0, campo.value.length-1);
	}
	if (texto.substring(0,1) != saida){
		documento.value += texto.substring(0,1);
	}
}

function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}

function id( el ){
	return document.getElementById( el );
}
function somenteNumeros(num) {
	var er = /[^0-9.]/;
	er.lastIndex = 0;
	var campo = num;
	if (er.test(campo.value)) {
		campo.value = "";
	}
}
   
// $('#cep').blur(function(){
//     /* Configura a requisição AJAX */
//     $.ajax({
//         url : '../../_request/consultar_cep.php', /* URL que será chamada */ 
//         type : 'POST', /* Tipo da requisição */ 
//         data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
//         dataType: 'json', /* Tipo de transmissão */
//         beforeSend: function () {
//         //Aqui adicionas o loader
//         $("#carregando").html("<img src='images/imagem_gif_carregando.gif'>");
// 	    },
// 	    complete: function(){
// 	        $("#carregando").toggle();
// 	    },
// 	    success: function(data){
// 		    if(data.sucesso == 1){
// 	            $('#endereco').val(data.endereco);
// 	            $('#bairro').val(data.bairro);
// 	            $('#cidade').val(data.cidade);
// 	            $('#estado').val(data.estado);
	                     
// 	            $('#estado');
// 	            $('#numero_end').prop("disabled", false);
// 	            $('#numero_end').focus();
// 	            $('#complemento_end').prop("disabled", false);
// 	        }
// 	    }
//     });   
//     return false;    
// });


