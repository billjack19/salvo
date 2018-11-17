<?php


class questionario extends PadraoObjeto{
	var $id;
	var $pergunta;
	var $alternativas;
}

class alternativa extends PadraoObjeto{
	var $id_alternativas;
	var $pergunta_id;
	var $descricao;
	var $ck_correto;
}

?>
