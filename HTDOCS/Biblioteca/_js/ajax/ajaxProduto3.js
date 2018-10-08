$('#form').submit(function(e){
    e.preventDefault();
    $.post(
        "../_request/processaCadastroProduto.php",
        "produto="+$('#produto').val(),
        function(data){
            if (data == '') {
            	toastr.error('erro ao cadastrar');
            	var login = document.getElementById('login').value;
				var nome = document.getElementById('nome').value;
				var frase = document.getElementById('frase').value;
				var url = "?login="+login;
				url += "&nome="+nome;
				url += "&frase="+frase;
				window.location = url;
        		// alert('Produto cadastrado com sucesso.');
            }
            else{
        		toastr.success('cadastrado com sucesso');
            	var login = document.getElementById('login').value;
				var nome = document.getElementById('nome').value;
				var frase = document.getElementById('frase').value;
				var url = "?login="+login;
				url += "&nome="+nome;
				url += "&frase="+frase;
				window.location = url;
        		// alert('Produto cadastrado com sucesso.');           		
        	}
       	}
    );
});
// var res = str.replace("old text", "new text");
// toastr.success
// serialize()
// var nome = $('#nome').val();
// var res = nome.replace("+", "_");