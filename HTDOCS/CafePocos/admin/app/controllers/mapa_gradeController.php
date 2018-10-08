
<?php

session_start();


if($_POST['grade'] == 'cards-configurar_site'){
	$_SESSION['cards-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'destaque_grupo-configurar_site'){
	$_SESSION['destaque_grupo-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'slide_show-configurar_site'){
	$_SESSION['slide_show-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'loja-configurar_site'){
	$_SESSION['loja-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'endereco_site-configurar_site'){
	$_SESSION['endereco_site-configurar_site'] = $_POST['id'];
}

else if($_POST['grade'] == 'adicional_site-saiba_mais'){
	$_SESSION['adicional_site-saiba_mais'] = $_POST['id'];
}

else if($_POST['grade'] == 'teste_grade-teste'){
	$_SESSION['teste_grade-teste'] = $_POST['id'];
}


?>