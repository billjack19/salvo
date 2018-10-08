<?php

$id_projeto = $_POST['id_projeto'];
$pasta = $_POST['pasta'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}




include_once ("../Classe/funcoes.php");



/***************************************************************************************************************/
/** UpLord de Imagem *******************************************************************************************/
/***************************************************************************************************************/
$arquivo = $_FILES['arquivo']['name'];
//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../'.$pasta.'/';
//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024*1024*100; //5mb
//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif', 'ico');
//Renomeiar
// $_UP['renomeia'] = false;
//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if($_FILES['arquivo']['error'] != 0){
	die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; //Para a execução do script
}
//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if(array_search($extensao, $_UP['extensoes'])=== false){}
//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){}
//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else{
	// Define o nome do arquivo
	// $nomeOriginalArray = explode('.', $_FILES['arquivo']['name']);
	// $nomeArquivoOriginal = "";
	// for ($i = 0; $i < sizeof($nomeOriginalArray) - 1; $i++) { 
	// 	if ($i < (sizeof($nomeOriginalArray) - 1)) {
	// 		$nomeArquivoOriginal .= $nomeOriginalArray[$i];
	// 	}
	// }
	// $nome_final = $nomeArquivoOriginal . "_" . $projetoNome . "." . $extensao;
	$nome_final = $_FILES['arquivo']['name'];
	$img_fundo_nome = $nome_final;
	//Verificar se é possivel mover o arquivo para a pasta escolhida
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)){
		$img_fundo_nome = $nome_final;
		// 
		$img_fundo = "app/img/".$nome_final;
	}else{
		$img_fundo = "";
	}
}


$tabela = "";
$coluna = "";
switch ($pasta) {
	case 'Img_Fundo_Login':
		$tabela = "imagem_fundo";
		$coluna = "descricao_imagem_fundo";
		break;
	case 'Img_icon':
		$tabela = "imagem_icone";
		$coluna = "descricao_imagem_icone";
		break;	
	case 'Img_logo':
		$tabela = "imagem_logo";
		$coluna = "descricao_imagem_logo";
		break;
}

if ($tabela != "") {
	$sql = "INSERT INTO $tabela ( $coluna ) VALUES ('$img_fundo_nome');";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
}


// header("Location: ../projeto.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="submete()">
	<?php include "../Componetes/menu2.php"; ?>
	<center>
		<h1>uploard</h1>
	</center>
	<!-- <form action="../projeto.php" method="POST">
		<input type="text" name="projeto_id" value="<?php echo $id_projeto; ?>">
		<button type="submit" id="submeter">Voltar</button>
	</form>
	<script type="text/javascript">
		function submete(){
			document.getELementById("submeter").click();
		}
	</script> -->
</body>
</html>
