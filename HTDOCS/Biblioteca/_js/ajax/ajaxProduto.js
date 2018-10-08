$(function(){
    $('.form').submit(function(e){
        e.preventDefault();
        //if carragar
        $.ajax({
            url:'../../_request/processaCadastroProduto.php',
            type: 'POST',
            dataType: 'html',
            data: $('.form').serialize(),
            success: function(data){
                alert('Produto cadastrado com sucesso.');
                $('#produto').val('');
            }
        });
        return false;
    });
});
// var res = str.replace("old text", "new text");
// toastr.success
// serialize()
// var nome = $('#nome').val();
// var res = nome.replace("+", "_");