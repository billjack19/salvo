<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$descricao_config_login = "Sem Registro";
$imagem_fundo_id = 0;
$imagem_icone_id = 0;
$tabela_login_config_login = "";
$login_config_login = "";
$senha_config_login = "";
$cor_fundo_config_login = "";
$password_config_login = "";
$projeto_id = $id_projeto;

$sql = "SELECT * FROM config_login WHERE projetos_id = $id_projeto LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricao_config_login = 		$dados['descricao_config_login'];
	$imagem_fundo_id = 				$dados['imagem_fundo_id'];
	$imagem_icone_id = 				$dados['imagem_icone_id'];
	$tabela_login_config_login = 	$dados['tabela_login_config_login'];
	$login_config_login = 			$dados['login_config_login'];
	$senha_config_login = 			$dados['senha_config_login'];
	$cor_fundo_config_login = 		$dados['cor_fundo_config_login'];
	$password_config_login = 		$dados['password_config_login'];
	$projeto_id = 					$dados['projetos_id'];
}



$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}


$sql = "SELECT * FROM imagem_fundo;";
$verifica = $pdo->query($sql);
$cont = 0;
$selectImgemFundo = "<select name='img_fundo' onchange='definirImagem(this.value, \"imagemFundoModelo\", \"Img_Fundo_Login\")'>";
$imagemStada = "";


foreach ($verifica as $dados) {
	if ($imagem_fundo_id == 0) {
		if ($cont == 0) {
			$cont++;
			$imagemStada1 = $dados[1];
			$selectImgemFundo .= "<option value='".$dados[1]."' selected>".$dados[1]."</option>";
		} else {
			$selectImgemFundo .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
		}
	} else{
		if ($imagem_fundo_id == $dados[0]) {
			$imagemStada1 = $dados[1];
			$selectImgemFundo .= "<option value='".$dados[1]."' selected>".$dados[1]."</option>";
		} else {
			$selectImgemFundo .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
		}
	}
}
$selectImgemFundo .= "</select>";


$sql = "SELECT * FROM imagem_icone;";
$verifica = $pdo->query($sql);
$cont = 0;
$selectImgemIcone = "<select name='img_icone' onchange='definirImagem(this.value, \"imagemIconeModelo\", \"Img_icon\")'>";
$imagemStada = "";


foreach ($verifica as $dados) {
	if ($imagem_icone_id == 0) {
		if ($cont == 0) {
			$cont++;
			$imagemStada2 = $dados[1];
			$selectImgemIcone .= "<option value='".$dados[1]."' selected>".$dados[1]."</option>";
		} else {
			$selectImgemIcone .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
		}
	} else{
		if ($imagem_icone_id == $dados[0]) {
			$imagemStada2 = $dados[1];
			$selectImgemIcone .= "<option value='".$dados[1]."' selected>".$dados[1]."</option>";
		} else {
			$selectImgemIcone .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
		}
	}
}
$selectImgemIcone .= "</select>";



include "../Classe/funcoes.php";
include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');
$conn->conectar();

$pdo = $conn->Connect(); 

$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);

$tabelaDeTabelas = "<datalist id=\"tabelasList\">";
foreach ($verifica as $dados) {
	$tabelaDeTabelas .= "<option value='".$dados[0]."'>";
}
$tabelaDeTabelas .= "</datalist>";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Criar Tela de Login (index.php)</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<form action="../tela_login.php" method="POST" enctype="multipart/form-data">
		<h1>Criar Tela de Login (index.php)</h1>
		<h2>Escolha imagem, E cor de fundo</h2>
		<h2>Atualizacao: <?php echo $descricao_config_login; ?></h2>
		<table width="100%">
			<tr>
				<td width="50%">
					<label>Imgem de fundo</label>
					<?php echo $selectImgemFundo; ?><br>
					<img src="../Img_Fundo_Login/<?php echo $imagemStada1;?>" width="50%" id="imagemFundoModelo">
				</td>
				<td width="50%">
					<label>Imgem icone</label>
					<?php echo $selectImgemIcone; ?><br>
					<img src="../Img_icon/<?php echo $imagemStada2;?>" width="20%" id="imagemIconeModelo">
				</td>
			</tr>
		</table>
		<br>
		<label>Tabela login</label>
		<input type="text" name="tabela" id="tabela" value="<?php echo $tabela_login_config_login; ?>" list="tabelasList" onfocus="this.value = '';" required>
		<button onclick="trazerCampoLogin()" type="button">Verifica</button>
		<?php echo $tabelaDeTabelas; ?>
		<br>

		<?php if ($password_config_login == 1) { ?>
			É PassaWord: <input type="checkbox" name="passWord" checked>
		<?php } else {	?>
			É PassaWord: <input type="checkbox" name="passWord">
		<?php } ?>
		
		<br><br>
		<div id="camposLogin"></div>
		<br>
		<label>Cor fundo</label>
		<input type="color" name="cor_fundo" value="<?php echo $cor_fundo_config_login; ?>"><br>
		<label>Id do Projeto</label>
		<input type="text" name="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
		<button type="submit">Criar</button>
	</form>
	<script type="text/javascript">
		function setarTabela(tabela){
			document.getElementById('tabela').value = tabela;
		}

		function definirImagem(imgem, idElement, pastaImg){
			document.getElementById(idElement).src = "../"+pastaImg+"/"+imgem;
		}
		function trazerCampoLogin(){
			var tabela = document.getElementById("tabela").value;
			$.ajax({
				url:'../Componetes/listaColuna.php',
				type: 'POST',
				dataType: 'text',
				data: { 'tabela': tabela }
			}).done( function(data){
				$("#camposLogin").html(data);
			});
		}
	</script>
	<?php if ($tabela_login_config_login != "") { ?>
		<script type="text/javascript"> trazerCampoLogin(); </script>
	<?php }	?>
</body>
</html>