const $ = require("jquery");

export default {
	id: function(id){ return document.getElementById(id); },
	append: function(el, dist){ for (var i = 0; i < el.length; i++) dist.appendChild(el[i]); },
	create: function(opcoes){
		opcoes = $.extend({}, { type: 'div' }, opcoes);
		var el = document.createElement(opcoes.type);
		if(opcoes.html 		!= undefined && opcoes.html 	!= '') el.innerHTML = opcoes.html;
		if(opcoes.onclick 	!= undefined && opcoes.onclick 	!= '') el.onclick 	= opcoes.onclick;
		return el;
	},
	br: function(){ return document.createElement('br'); }
}
