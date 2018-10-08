
var app = angular.module('myApp',['ngRoute']);

app.config(function($routeProvider)
{
	$routeProvider

	.when('/home', {
		templateUrl : 'app/views/home.htm',
	})




	/*************************************************************************************************************/
	/* Tabelas da Aplicação */
	/*************************************************************************************************************/
	// Tabela: configurar_site
	.when('/configurar_site', {
		templateUrl : 'app/views/configurar_site.htm',
	})
	.when('/adicionar_configurar_site', {
		templateUrl : 'app/views/adicionar_configurar_site.htm',
	})
	.when('/editar_configurar_site', {
		templateUrl : 'app/views/editar_configurar_site.htm',
	})

	
	// Tabela: contato
	.when('/contato', {
		templateUrl : 'app/views/contato.htm',
	})
	.when('/adicionar_contato', {
		templateUrl : 'app/views/adicionar_contato.htm',
	})
	.when('/editar_contato', {
		templateUrl : 'app/views/editar_contato.htm',
	})

	
	// Tabela: empresa
	.when('/empresa', {
		templateUrl : 'app/views/empresa.htm',
	})
	.when('/adicionar_empresa', {
		templateUrl : 'app/views/adicionar_empresa.htm',
	})
	.when('/editar_empresa', {
		templateUrl : 'app/views/editar_empresa.htm',
	})

	
	// Tabela: estado
	.when('/estado', {
		templateUrl : 'app/views/estado.htm',
	})
	.when('/adicionar_estado', {
		templateUrl : 'app/views/adicionar_estado.htm',
	})
	.when('/editar_estado', {
		templateUrl : 'app/views/editar_estado.htm',
	})

	
	// Tabela: links_uteis
	.when('/links_uteis', {
		templateUrl : 'app/views/links_uteis.htm',
	})
	.when('/adicionar_links_uteis', {
		templateUrl : 'app/views/adicionar_links_uteis.htm',
	})
	.when('/editar_links_uteis', {
		templateUrl : 'app/views/editar_links_uteis.htm',
	})

	
	// Tabela: quem_somos
	.when('/quem_somos', {
		templateUrl : 'app/views/quem_somos.htm',
	})
	.when('/adicionar_quem_somos', {
		templateUrl : 'app/views/adicionar_quem_somos.htm',
	})
	.when('/editar_quem_somos', {
		templateUrl : 'app/views/editar_quem_somos.htm',
	})

	
	// Tabela: saiba_mais
	.when('/saiba_mais', {
		templateUrl : 'app/views/saiba_mais.htm',
	})
	.when('/adicionar_saiba_mais', {
		templateUrl : 'app/views/adicionar_saiba_mais.htm',
	})
	.when('/editar_saiba_mais', {
		templateUrl : 'app/views/editar_saiba_mais.htm',
	})

	
	// Tabela: videos
	.when('/videos', {
		templateUrl : 'app/views/videos.htm',
	})
	.when('/adicionar_videos', {
		templateUrl : 'app/views/adicionar_videos.htm',
	})
	.when('/editar_videos', {
		templateUrl : 'app/views/editar_videos.htm',
	})

	




	/*************************************************************************************************************/
	/* Perfil */
	/*************************************************************************************************************/
	.when('/perfil_editar', {
		templateUrl : 'app/views/perfil_editar.htm',
	})

	.when('/perfil_trocar_senha', {
		templateUrl : 'app/views/perfil_trocar_senha.htm',
	})





	/*************************************************************************************************************/
	/* Usuario */
	/*************************************************************************************************************/
	.when('/usuario_lista', {
		templateUrl : 'app/views/usuario_lista.htm',
	})

	.when('/usuario_adiciona', {
		templateUrl : 'app/views/usuario_adiciona.htm',
	})

	.when('/usuario_edita', {
		templateUrl : 'app/views/usuario_edita.htm',
	})

	.when('/usuario_nivel_acesso', {
		templateUrl : 'app/views/usuario_nivel_acesso.htm',
	})

	.when('/usuario_nivel_acesso_adicionar', {
		templateUrl : 'app/views/usuario_nivel_acesso_adicionar.htm',
	})

	.when('/usuario_nivel_acesso_editar', {
		templateUrl : 'app/views/usuario_nivel_acesso_editar.htm',
	})

	.when('/acesso_bloqueado', {
		templateUrl : 'app/views/acesso_bloqueado.htm',
	})




	
	/*************************************************************************************************************/
	/* Upload */
	/*************************************************************************************************************/
	// Resultado do Upload
	.when('/upload_result', {
		templateUrl : 'app/views/upload_result.php',
	})

	// Upload de Imagem	
	.when('/upload_imagem', {
		templateUrl : 'app/views/upload_imagem.htm',
	})

	.when('/upload_imagem_view', {
		templateUrl : 'app/views/upload_imagem_view.htm',
	})


	// Upload de Video
	.when('/upload_video', {
		templateUrl : 'app/views/upload_video.htm',
	})

	.when('/upload_video_view', {
		templateUrl : 'app/views/upload_video_view.htm',
	})


	// Upload de Audio
	.when('/upload_audio', {
		templateUrl : 'app/views/upload_audio.htm',
	})

	.when('/upload_audio_view', {
		templateUrl : 'app/views/upload_audio_view.htm',
	})


	// Upload de Arquivo de Texto
	.when('/upload_texto', {
		templateUrl : 'app/views/upload_texto.htm',
	})

	.when('/upload_texto_view', {
		templateUrl : 'app/views/upload_texto_view.htm',
	})




	/*************************************************************************************************************/
	/* Maps */
	/*************************************************************************************************************/
	// Consultar Latitude e Longitude
	.when('/maps_Lat_Lng', {
		templateUrl : 'app/views/maps_Lat_Lng.htm',
	})





	/*************************************************************************************************************/
	/* Arquivos */
	/*************************************************************************************************************/
	// Movimentação de Arquivo (Imagem)
	.when('/mov_img', {
		templateUrl : 'app/views/mov_img.htm',
	})





	/*************************************************************************************************************/
	/* Relatórios */
	/*************************************************************************************************************/
	// Crud Relatório
	.when('/pdf_emiti', {
		templateUrl : 'app/views/pdf_emiti.htm',
	})

	.when('/pdf_lista', {
		templateUrl : 'app/views/pdf_lista.htm',
	})

	.when('/pdf_adiciona', {
		templateUrl : 'app/views/pdf_adiciona.htm',
	})

	.when('/pdf_edita', {
		templateUrl : 'app/views/pdf_edita.htm',
	})






	/*************************************************************************************************************/
	/* Grades */
	/*************************************************************************************************************/


	// Grades: cards-configurar_site
	.when('/grade_cards-configurar_site', {
		templateUrl : 'app/views/grade_cards-configurar_site.htm',
	})
	.when('/adicionar_grade_cards-configurar_site', {
		templateUrl : 'app/views/adicionar_grade_cards-configurar_site.htm',
	})
	.when('/editar_grade_cards-configurar_site', {
		templateUrl : 'app/views/editar_grade_cards-configurar_site.htm',
	})


	// Grades: destaque_grupo-configurar_site
	.when('/grade_destaque_grupo-configurar_site', {
		templateUrl : 'app/views/grade_destaque_grupo-configurar_site.htm',
	})
	.when('/adicionar_grade_destaque_grupo-configurar_site', {
		templateUrl : 'app/views/adicionar_grade_destaque_grupo-configurar_site.htm',
	})
	.when('/editar_grade_destaque_grupo-configurar_site', {
		templateUrl : 'app/views/editar_grade_destaque_grupo-configurar_site.htm',
	})


	// Grades: endereco_site-configurar_site
	.when('/grade_endereco_site-configurar_site', {
		templateUrl : 'app/views/grade_endereco_site-configurar_site.htm',
	})
	.when('/adicionar_grade_endereco_site-configurar_site', {
		templateUrl : 'app/views/adicionar_grade_endereco_site-configurar_site.htm',
	})
	.when('/editar_grade_endereco_site-configurar_site', {
		templateUrl : 'app/views/editar_grade_endereco_site-configurar_site.htm',
	})


	// Grades: slide_show-configurar_site
	.when('/grade_slide_show-configurar_site', {
		templateUrl : 'app/views/grade_slide_show-configurar_site.htm',
	})
	.when('/adicionar_grade_slide_show-configurar_site', {
		templateUrl : 'app/views/adicionar_grade_slide_show-configurar_site.htm',
	})
	.when('/editar_grade_slide_show-configurar_site', {
		templateUrl : 'app/views/editar_grade_slide_show-configurar_site.htm',
	})


	// Grades: loja-configurar_site
	.when('/grade_loja-configurar_site', {
		templateUrl : 'app/views/grade_loja-configurar_site.htm',
	})
	.when('/adicionar_grade_loja-configurar_site', {
		templateUrl : 'app/views/adicionar_grade_loja-configurar_site.htm',
	})
	.when('/editar_grade_loja-configurar_site', {
		templateUrl : 'app/views/editar_grade_loja-configurar_site.htm',
	})


	// Grades: orcamento-cliente_site
	.when('/grade_orcamento-cliente_site', {
		templateUrl : 'app/views/grade_orcamento-cliente_site.htm',
	})
	.when('/adicionar_grade_orcamento-cliente_site', {
		templateUrl : 'app/views/adicionar_grade_orcamento-cliente_site.htm',
	})
	.when('/editar_grade_orcamento-cliente_site', {
		templateUrl : 'app/views/editar_grade_orcamento-cliente_site.htm',
	})


	// Grades: item_orcamento-orcamento
	.when('/grade_item_orcamento-orcamento', {
		templateUrl : 'app/views/grade_item_orcamento-orcamento.htm',
	})
	.when('/adicionar_grade_item_orcamento-orcamento', {
		templateUrl : 'app/views/adicionar_grade_item_orcamento-orcamento.htm',
	})
	.when('/editar_grade_item_orcamento-orcamento', {
		templateUrl : 'app/views/editar_grade_item_orcamento-orcamento.htm',
	})


	// Grades: topicos_loja-loja
	.when('/grade_topicos_loja-loja', {
		templateUrl : 'app/views/grade_topicos_loja-loja.htm',
	})
	.when('/adicionar_grade_topicos_loja-loja', {
		templateUrl : 'app/views/adicionar_grade_topicos_loja-loja.htm',
	})
	.when('/editar_grade_topicos_loja-loja', {
		templateUrl : 'app/views/editar_grade_topicos_loja-loja.htm',
	})


	// Grades: adicional_site-saiba_mais
	.when('/grade_adicional_site-saiba_mais', {
		templateUrl : 'app/views/grade_adicional_site-saiba_mais.htm',
	})
	.when('/adicionar_grade_adicional_site-saiba_mais', {
		templateUrl : 'app/views/adicionar_grade_adicional_site-saiba_mais.htm',
	})
	.when('/editar_grade_adicional_site-saiba_mais', {
		templateUrl : 'app/views/editar_grade_adicional_site-saiba_mais.htm',
	})


	// Grades: topicos_cards-cards
	.when('/grade_topicos_cards-cards', {
		templateUrl : 'app/views/grade_topicos_cards-cards.htm',
	})
	.when('/adicionar_grade_topicos_cards-cards', {
		templateUrl : 'app/views/adicionar_grade_topicos_cards-cards.htm',
	})
	.when('/editar_grade_topicos_cards-cards', {
		templateUrl : 'app/views/editar_grade_topicos_cards-cards.htm',
	})


	.otherwise ({ redirectTo: '/home' });
});
