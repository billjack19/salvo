$(document).ready(function(){
    $('.buscar-cnpj').live('click',function(){
        if($('.cnpj').val().length == 18){
            cnpj = $('.cnpj').val().replace(/[^0-9]/g,'');
            $.ajax({
                url: 'https://www.receitaws.com.br/v1/cnpj/'+cnpj,
                dataType: 'jsonp',
                jsonp: 'callback',
                jsonpCallback: 'jsonp_callback',
                 beforeSend: function() {
                     $('.cnpj').addClass('carregando-validate');
                 },
                 complete: function(){
                     $('.cnpj').removeClass('carregando-validate');
                 },
                success: function (retorno, status) {
                    if(retorno.status == 'OK'){
                        $('.razao-social').val(retorno['nome']);
                        $('.nome-fantasia').val(retorno['fantasia']);
                        $('.email').val(retorno['email']);
                        $('.telefone-comercial').val(retorno['telefone']);

                        if(!$('.cep').first().length){
                            $('#AdicionarEndereco').click();
                        }

                        $('.cep').first().val(retorno['cep'].replace('.', ''));
                        $('.logradouro').first().val(retorno['logradouro']);
                        $('.numero').first().val(retorno['numero']);
                        $('.complemento').first().val(retorno['complemento']);
                        $('.bairro').first().val(retorno['bairro']);
                        cidade = $('.cidade').first();
                        $.post('/cidades/buscaCidade',{'estado':retorno['uf'], cidade:retorno['municipio']},
                  			function(data){
                  			    if(data){
                      			    data = JSON.parse(data);
                                    cidade.tokenInput('clear');
                                    cidade.tokenInput('add', {id: data.id, nome:data.nome+' ('+data.estado+')', codigo:data.codigo, cidade:data.nome, codigo_estado:data.codigo_estado, estado:data.estado, timezone:data.timezone, utc_normal:data.utc_normal, utc_verao:data.utc_verao});
                  			    }
                  			}
                  		);

                        if($('.cnae').length){
                            cnae = retorno['atividade_principal'];
                            cnae = cnae[0]['code'];
                            if(cnae){
                                cnae = cnae.replace(/[^0-9]/g,'');
                                campoCnae = $('.cnae').first();
                                $.get('/cnae/buscaCnae',{'q':cnae},
                          			function(retornoCnae){
                          			    if(retornoCnae){
                              			    retornoCnae = JSON.parse(retornoCnae);
                              			    retornoCnae = retornoCnae[0];
                                            campoCnae.tokenInput('clear');
                                            campoCnae.tokenInput('add', {id: retornoCnae.id, descricao:retornoCnae.descricao, codigo:retornoCnae.codigo});
                          			    }
                          			}
                          		);
                            }
                        }
                    }else{
                        bootbox.error('O número do CNPJ não é válido!');
                    }
                },
                error: function (xOptions, textStatus) {
                    bootbox.error('Ocorreu um erro durante a consulta, tente mais tarde!');
                }
            });
        }
    });
});