// alert('oi');
// console.log('oi');
    $('#formCadastroAluno').submit(function(e){        
        e.preventDefault();
        $.ajax({
            url:'../../_request/processaCadastroAluno.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'matricula':        $('#matricula').val(),
                'nome':             $('#nome').val(),
                'email':            $('#email').val(),
                'cpf':              $('#cpf').val(),
                'rg':               $('#rg').val(),
                'sexo':             $('#sexo').val(),
                'data_nascimento':  $('#data_nascimento').val(),
                'turno':            $('#turno').val(),
                'telefone':         $('#telefone').val(),
                'ano':              $('#ano').val(),
                'turma':            $('#turma').val(),
                'sala':             $('#sala').val()
             }
        }).done( function(data){
                alert('Aluno cadastrado com sucesso.');
                $('#matricula').val('');
                $('#nome').val('');
                $('#email').val('');
                $('#cpf').val('');
                $('#rg').val('');
                $('#sexo').val('');
                $('#data_nascimento').val('');
                $('#turno').val('');
                $('#telefone').val('');
                $('#ano').val('');
                $('#turma').val('');
                $('#sala').val('');
            });
        return false;        
    });

// data: {
//  'nome': $('#nome').val(),
//  'matricula': $('#matricula').val(),
//  'data_nascimento': $('#data_nascimento').val(),
//  'cpf': $('#cpf').val(),
//  'rg': $('#rg').val(),
//  'sexo': $('#sexo').val(),
//  'email': $('#email').val(),
//  'telefone': $('#telefone').val(),
//  'turno': $('#turno').val(),
//  'ano': $('#ano').val(),
//  'sala': $('#sala').val(),
//  'turma': $('#turma').val()
// }