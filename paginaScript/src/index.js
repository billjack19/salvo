const $ = require("jquery");

import _ from 'lodash';
import bib from './biblioteca';


$.ajax({
	url: "http://localhost:8088/intranet_linux/ping.php",
	type: 'GET',
	error: function(){
		alert("Sem conexão com o servidor!");
	}
}).done( function(data){
	alert("Conextado com o servidor.\nTeste AJAX sucesso!");
});



var element = bib.create({type: 'span', html: 'Hello Word'});
var button = bib.create({type: 'button', html: 'Click me', onclick: function(){ alert('Você clicou!') }});
var center = bib.create({type: 'center'});
bib.append([center], document.body);
bib.append([element, bib.br(), bib.br(), bib.br(), button], center);