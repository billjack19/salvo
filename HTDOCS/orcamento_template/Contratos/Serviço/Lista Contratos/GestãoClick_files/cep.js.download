$(document).ready(function(){

        $('#NotasFiscalDestCEP').live('keyup',function(){
        if($(this).val().length == 9){
            logradouro = $('#NotasFiscalDestXLgr');
            bairro = $('#NotasFiscalDestXBairro');
            cidade = $('#NotasFiscalDestCidadeId');
            cidadeC = $('#NotasFiscalDestCMun');
            cidadeN = $('#NotasFiscalDestXMun');
            estado = $('#NotasFiscalDestUF');

            $.get(
    			'https://viacep.com.br/ws/'+$(this).val()+'/json/',function(retorno){
    			      retorno.cidade = retorno.localidade;
    			      retorno.estado = retorno.uf;
                      logradouro.val(retorno.logradouro);
                      bairro.val(retorno.bairro);
                      if(retorno.cidade != '' && retorno.estado != ''){
                          $.post(
                  			'/cidades/buscaCidade',{'estado':retorno.estado, cidade:retorno.cidade},
                  			function(data){
                  			    if(data){
                      			    data = JSON.parse(data);
                                      cidade.tokenInput('clear');
                                      cidade.tokenInput('add', {id: data.id, nome:retorno.cidade+' ('+retorno.estado+')', codigo:data.codigo, codigo_siafi:data.codigo_siafi, cidade:retorno.cidade, estado:retorno.estado, codigo_estado:data.codigo_estado, timezone:data.timezone, utc_normal:data.utc_normal, utc_verao:data.utc_verao});
                                      cidadeC.val(data.codigo);
                                      cidadeN.val(data.nome);
                                      estado.val(data.estado);
                  			    }
                  			}
                  		);
                    }
    			}
    		);
        }
    });


    $('.cep').live('keyup',function(){
        if($(this).val().length == 9){
            logradouro = $(this).parent().parent().find('.logradouro');
            bairro = $(this).parent().parent().find('.bairro');
            cidade = $(this).parent().parent().find('.cidade');
            $.get(
    			'https://viacep.com.br/ws/'+$(this).val()+'/json/',function(retorno){
                      retorno.cidade = retorno.localidade;
                      retorno.estado = retorno.uf;
                      logradouro.val(retorno.logradouro);
                      bairro.val(retorno.bairro);
                      if(retorno.cidade != '' && retorno.estado != ''){
                          $.post('/cidades/buscaCidade',{'estado':retorno.estado, cidade:retorno.cidade},
                  			function(data){
                  			    if(data){
                      			    data = JSON.parse(data);
                                    cidade.tokenInput('clear');
                                    cidade.tokenInput('add', {id: data.id, nome:retorno.cidade+' ('+retorno.estado+')', codigo:data.codigo, codigo_siafi:data.codigo_siafi, cidade:retorno.cidade, codigo_estado:data.codigo_estado, estado:retorno.estado, timezone:data.timezone, utc_normal:data.utc_normal, utc_verao:data.utc_verao});
                  			    }
                  			}
                  		);
                    }
    			}
    		);
        }
    });
});