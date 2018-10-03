export bib from './biblioteca';


var element = bib.create({type: 'span', html: 'Hello Word'});
// var br = bib.create({type: 'br'});
// var br2 = bib.create({type: 'br'});
var button = bib.create({type: 'button', html: 'Click me', onclick: function(){ alert('Você clicou!') }});
var center = bib.create({type: 'center'});
bib.append([center], document.body);
bib.append([element, bib.br(), bib.br(), bib.br(), button], center);