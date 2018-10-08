
<?php

session_start();


if($_POST['grade'] == 'orcamento_item-orcamento'){
	$_SESSION['orcamento_item-orcamento'] = $_POST['id'];
}

else if($_POST['grade'] == 'item-grupo'){
	$_SESSION['item-grupo'] = $_POST['id'];
}


if(!empty($_POST['zerarGrades'])){ 
	$_SESSION['orcamento_item-orcamento'] = 0;
	$_SESSION['item-grupo'] = 0;
}

?>