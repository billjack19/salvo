
-- Dados da tabela objetivos
-- Gerando em: 02/08/2018 13:30:19
-- Pelo Gerador JK-19

TRUNCATE `objetivos`;

-- Dados da tabela: 
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 1, 'Gráficos por valor', 'Vou determinar que uma tabela com campo de valor numérico possa renderizar gráfico a partir de seu histórico<br><br>
Pre requisitos: tabela de logs com trigers pre programadas', '2018-01-31 13:21:33', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 2, 'Foto pela webcam do pc', 'Cadastrar nome de fotos tiradas pela webcam do pc e ser capas de tirar e armazena-la no servidor', '2018-01-31 13:22:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 3, 'Interfase SO', 'Objetivo de deixar um rodapé fixo na tela com um batão capaz de pesquisar qualquer coisa no sistema e ti levando ao acesso a ela sem precisar de mouse, somente no teclado<br>
Além de ícones na pagina principal do sistemas cadastrados pelo próprio usuário', '2018-01-31 13:25:36', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 4, 'Tabela de log', 'tem como finalidade registrar informação anterior a da atualizada', '2018-02-07 08:22:06', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 5, 'Responsividade de tabela', 'deixar as tabelas mais flexíveis na tela em que esta sendo projetada', '2018-03-22 17:43:55', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 6, 'Tabela Cabeçario', 'Tem por objetivo definir algumas pre configurações nos heads de relatórios', '2018-01-31 13:28:06', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 7, 'Movimentação de arquivo', 'O sistema conseguira manipular arquivos do servidor de maneira mais fácil e intuitiva
<br><br>
Em andamento<br>
Falta fazer para arquivos de vídeo, áudio e texto', '2018-02-07 08:23:57', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 8, 'Multiplos Uploads', 'A ideia é poder fazer mais de um upload por vez', '2018-01-31 13:29:41', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 9, 'Preenchimento automatico de campos', 'O sistema através de uma data poderá preencher automaticamente um campo', '2018-03-22 17:42:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 10, 'Logica de negócio', 'O sistema será capaz de executar operações entre campos da tabela e preenche outro campo com o resultado', '2018-02-05 09:48:20', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 11, 'Filtro no cabeçalho da tabela', 'Clicando no cabeçalho ele ordenará os registros de acordo com o cabeçalho, se tiver com seta pra cima ordenará em ordem decrescente e com a seta para baixo ordenará em ordem crescente', '2018-01-31 13:53:09', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 12, 'Mascaras', 'Setar mascaras nos campos', '2018-01-31 14:01:47', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 13, 'Busca por busca', 'Tem um campo e pelo valor desse campo você limita valor de outro campo', '2018-02-15 17:51:55', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 14, 'numerador de registros', 'coluna de numero numerando registro por registro', '2018-01-31 15:16:08', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 15, 'Notificação', 'avisar registros cadastrados recentemente ou registros proximo de uma determinada data', '2018-04-14 08:12:38', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 16, 'Limitar campo numerico', 'Bug para corrigir, nos campos de tipo \'number\' pode-se digitar a quantidade de números que quiser', '2018-02-07 08:48:57', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 17, 'Campo Único por Substituição', 'Definir um campo único por substituição quer dizer que os valores dessas coluna não podem se repetir, porém quando cadastrado se houver este valor o mesmo será substituído pelo valor que esta no registro alterando ou por um outro valor novo se for cadastro', '2018-02-07 08:15:46', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 18, 'Logica de negócio 2', 'O sistema será capaz de realizar cálculos entre datas, como diferença em dias entre duas datas ou uma data com acrecemo ou decréscimo de dias', '2018-02-07 08:20:31', 1, 0);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 19, 'Paginação', 'As tabelas serem limitas a um número de registro por vez', '2018-02-07 13:09:39', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 20, 'Visualização de Registro', 'Icone para mostrar num modal os dados desse registro com grades se tiver', '2018-02-07 13:12:02', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 21, 'Criptografia', 'Selecionar campos que antes de serem salvos passarem por um criptografia hardcoud', '2018-03-22 17:54:38', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 22, 'Registro de Monitoramento', 'É uma simulação de tempo real sobre um registro
<br>
Por exemplo: Uma consulta de medico a um paciente. No caso o medico teria em sua mesa um sistema onde ele abriria a ficha desse paciente e já teria todos os dados desse paciente, podendo lançar novos dados', '2018-02-19 10:12:34', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 23, 'Chat Suporte', 'Tem um chat interno para tirar duvidas de funcionalidades', '2018-07-27 08:24:48', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 24, 'Tirar Duvidas', 'Projeto independente para tirar duvidas no caso é um sistema de perguntas e respostas que será integrado na forma de lista dinamicamente nos sistemas
<br><br>
Com a exemplo pode ter uma área para demostração de comandos e teclas de atalho
tambem', '2018-07-27 08:28:40', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 25, 'Ocultar arquivos inativos', 'Opção para ocultar arquivos inativos.
<br>
Palavra chave: FILTRO', '2018-07-27 08:30:38', 1, 1);
INSERT INTO objetivos ( `id_objetivos`, `titulo_objetivos`, `descricao_objetivos`, `data_atualizacao_objetivos`, `usuario_id`, `bool_ativo_objetivos`) VALUES ( 26, 'Melhoria na forma de requisição', 'A requisição deve retornar um texto na sintaxe de um objeto JSON pela função toJson() em PHP', '2018-07-27 08:33:34', 1, 1);