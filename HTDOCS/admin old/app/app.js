
var app = angular.module('myApp',['ngRoute']);

app.config(function($routeProvider)
{
	$routeProvider

	.when('/home', {
		templateUrl : 'app/views/home.htm',
	})

	
	// Tabela: cliente_site
	.when('/cliente_site', {
		templateUrl : 'app/views/cliente_site.htm',
	})
	.when('/adicionar_cliente_site', {
		templateUrl : 'app/views/adicionar_cliente_site.htm',
	})
	.when('/editar_cliente_site', {
		templateUrl : 'app/views/editar_cliente_site.htm',
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

	
	
	.when('/upload_result', {
		templateUrl : 'app/views/upload_result.htm',
	})


	.otherwise ({ redirectTo: '/home' });
});
