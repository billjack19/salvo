
<?php

session_start();


if($_POST['grade'] == 'cards-configurar_site'){
	$_SESSION['cards-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'destaque_grupo-configurar_site'){
	$_SESSION['destaque_grupo-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'endereco_site-configurar_site'){
	$_SESSION['endereco_site-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'slide_show-configurar_site'){
	$_SESSION['slide_show-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'loja-configurar_site'){
	$_SESSION['loja-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'orcamento-cliente_site'){
	$_SESSION['orcamento-cliente_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'item_orcamento-orcamento'){
	$_SESSION['item_orcamento-orcamento'] = $_POST['id'];
}

else if($_POST['grade'] == 'topicos_loja-loja'){
	$_SESSION['topicos_loja-loja'] = $_POST['id'];
}

else if($_POST['grade'] == 'adicional_site-saiba_mais'){
	$_SESSION['adicional_site-saiba_mais'] = $_POST['id'];
}

else if($_POST['grade'] == 'topicos_cards-cards'){
	$_SESSION['topicos_cards-cards'] = $_POST['id'];
}


if(!empty($_POST['zerarGrades'])){ 
	$_SESSION['cards-configurar_site'] = 0;
	$_SESSION['destaque_grupo-configurar_site'] = 0;
	$_SESSION['endereco_site-configurar_site'] = 0;
	$_SESSION['slide_show-configurar_site'] = 0;
	$_SESSION['loja-configurar_site'] = 0;
	$_SESSION['orcamento-cliente_site'] = 0;
	$_SESSION['item_orcamento-orcamento'] = 0;
	$_SESSION['topicos_loja-loja'] = 0;
	$_SESSION['adicional_site-saiba_mais'] = 0;
	$_SESSION['topicos_cards-cards'] = 0;
}

?>