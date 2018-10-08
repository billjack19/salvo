
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
	// Tabela: grupo
	.when('/grupo', {
		templateUrl : 'app/views/grupo.htm',
	})
	.when('/adicionar_grupo', {
		templateUrl : 'app/views/adicionar_grupo.htm',
	})
	.when('/editar_grupo', {
		templateUrl : 'app/views/editar_grupo.htm',
	})

	
	// Tabela: item
	.when('/item', {
		templateUrl : 'app/views/item.htm',
	})
	.when('/adicionar_item', {
		templateUrl : 'app/views/adicionar_item.htm',
	})
	.when('/editar_item', {
		templateUrl : 'app/views/editar_item.htm',
	})

	
	// Tabela: lanc_preco
	.when('/lanc_preco', {
		templateUrl : 'app/views/lanc_preco.htm',
	})
	.when('/adicionar_lanc_preco', {
		templateUrl : 'app/views/adicionar_lanc_preco.htm',
	})
	.when('/editar_lanc_preco', {
		templateUrl : 'app/views/editar_lanc_preco.htm',
	})

	
	// Tabela: marca
	.when('/marca', {
		templateUrl : 'app/views/marca.htm',
	})
	.when('/adicionar_marca', {
		templateUrl : 'app/views/adicionar_marca.htm',
	})
	.when('/editar_marca', {
		templateUrl : 'app/views/editar_marca.htm',
	})

	
	// Tabela: orcamento
	.when('/orcamento', {
		templateUrl : 'app/views/orcamento.htm',
	})
	.when('/adicionar_orcamento', {
		templateUrl : 'app/views/adicionar_orcamento.htm',
	})
	.when('/editar_orcamento', {
		templateUrl : 'app/views/editar_orcamento.htm',
	})

	
	// Tabela: supermercado
	.when('/supermercado', {
		templateUrl : 'app/views/supermercado.htm',
	})
	.when('/adicionar_supermercado', {
		templateUrl : 'app/views/adicionar_supermercado.htm',
	})
	.when('/editar_supermercado', {
		templateUrl : 'app/views/editar_supermercado.htm',
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
	/* Notificações */
	/*************************************************************************************************************/
	.when('/notif_lista', {
		templateUrl : 'app/views/notif_lista.htm',
	})

	.when('/notif_lista_config', {
		templateUrl : 'app/views/notif_lista_config.htm',
	})

	.when('/notif_adicionar_notificacoes', {
		templateUrl : 'app/views/notif_adicionar_notificacoes.htm',
	})

	.when('/notif_editar_notificacoes', {
		templateUrl : 'app/views/notif_editar_notificacoes.htm',
	})





	/*************************************************************************************************************/
	/* Grades */
	/*************************************************************************************************************/


	// Grades: orcamento_item-orcamento
	.when('/grade_orcamento_item-orcamento', {
		templateUrl : 'app/views/grade_orcamento_item-orcamento.htm',
	})
	.when('/adicionar_grade_orcamento_item-orcamento', {
		templateUrl : 'app/views/adicionar_grade_orcamento_item-orcamento.htm',
	})
	.when('/editar_grade_orcamento_item-orcamento', {
		templateUrl : 'app/views/editar_grade_orcamento_item-orcamento.htm',
	})


	// Grades: item-grupo
	.when('/grade_item-grupo', {
		templateUrl : 'app/views/grade_item-grupo.htm',
	})
	.when('/adicionar_grade_item-grupo', {
		templateUrl : 'app/views/adicionar_grade_item-grupo.htm',
	})
	.when('/editar_grade_item-grupo', {
		templateUrl : 'app/views/editar_grade_item-grupo.htm',
	})





	.otherwise ({ redirectTo: '/home' });
});
