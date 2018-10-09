
var app = angular.module('myApp',['ngRoute']);

setarRotas();

function setarRotas(){
app.config(function($routeProvider)
{
	$routeProvider

	.when('/home', {
		templateUrl : 'app/views/home.htm',
	})

	
	// Tabela: cards
	.when('/cards', {
		templateUrl : 'app/views/cards.htm',
	})
	.when('/adicionar_cards', {
		templateUrl : 'app/views/adicionar_cards.htm',
	})
	.when('/editar_cards', {
		templateUrl : 'app/views/editar_cards.php?id='+document.getElementById("editar").value,
	})

	
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

	
	// Tabela: destaque
	.when('/destaque', {
		templateUrl : 'app/views/destaque.htm',
	})
	.when('/adicionar_destaque', {
		templateUrl : 'app/views/adicionar_destaque.htm',
	})
	.when('/editar_destaque', {
		templateUrl : 'app/views/editar_destaque.htm',
	})

	
	// Tabela: endereco_site
	.when('/endereco_site', {
		templateUrl : 'app/views/endereco_site.htm',
	})
	.when('/adicionar_endereco_site', {
		templateUrl : 'app/views/adicionar_endereco_site.htm',
	})
	.when('/editar_endereco_site', {
		templateUrl : 'app/views/editar_endereco_site.htm',
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

	
	// Tabela: loja
	.when('/loja', {
		templateUrl : 'app/views/loja.htm',
	})
	.when('/adicionar_loja', {
		templateUrl : 'app/views/adicionar_loja.htm',
	})
	.when('/editar_loja', {
		templateUrl : 'app/views/editar_loja.htm',
	})

	
	// Tabela: slide_show
	.when('/slide_show', {
		templateUrl : 'app/views/slide_show.htm',
	})
	.when('/adicionar_slide_show', {
		templateUrl : 'app/views/adicionar_slide_show.htm',
	})
	.when('/editar_slide_show', {
		templateUrl : 'app/views/editar_slide_show.htm',
	})

	

	// Upload de Imagem
	.when('/upload_result', {
		templateUrl : 'app/views/upload_result.php',
	})

	.when('/upload_imagem', {
		templateUrl : 'app/views/upload_imagem.htm',
	})
	






	/*************************************************************************************************************/
	/* Grades */
	/*************************************************************************************************************/


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


	// .otherwise ({ redirectTo: '/home' });
});
}