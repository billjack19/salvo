<?php

ini_set('max_execution_time', 300);

$img_fundo = $_POST['img_fundo'];
$cor_fundo = $_POST['cor_fundo'];
$id_projeto = $_POST['id_projeto'];
$img_icone = $_POST['img_icone'];


$passWord = 0;
$config_senha_login = "'\$senhaPost'";
if (!empty($_POST['passWord'])) {
	$passWord = 1;
	$config_senha_login = "PASSWORD('\$senhaPost')";
}

$tabela = $_POST['tabela'];
$login_campo = $_POST['login_campo'];
$senha_campo = $_POST['senha_campo'];

date_default_timezone_set("America/Sao_Paulo");
$descricao_config_login = date("d/m/Y h:i:s");
$imagem_fundo_id = "(SELECT id_imagem_fundo FROM imagem_fundo WHERE descricao_imagem_fundo = '$img_fundo' LIMIT 1)";
$imagem_icone_id = "(SELECT id_imagem_icone FROM imagem_icone WHERE descricao_imagem_icone = '$img_icone' LIMIT 1)";
$tabela_login_config_login = $tabela;
$login_config_login = $login_campo; 
$senha_config_login = $senha_campo;
$cor_fundo_config_login = $cor_fundo;
$projetos_id = $id_projeto;


include "Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();

$sql = "SELECT COUNT(*) AS num_total FROM config_login WHERE projetos_id = $id_projeto LIMIT 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	if ($dados[0] == 0) {
		$sql = "INSERT INTO config_login (
					descricao_config_login, 
					imagem_fundo_id, 
					imagem_icone_id, 
					tabela_login_config_login, 
					login_config_login, 
					senha_config_login, 
					cor_fundo_config_login,
					password_config_login, 
					projetos_id
				) VALUES (
					'$descricao_config_login',
					 $imagem_fundo_id,
					 $imagem_icone_id,
					'$tabela_login_config_login',
					'$login_config_login',
					'$senha_config_login',
					'$cor_fundo_config_login',
					'$passWord',
					 $projetos_id
				);";
	} else {
		$sql = "UPDATE config_login SET
					descricao_config_login = '$descricao_config_login',
					imagem_fundo_id = $imagem_fundo_id,
					imagem_icone_id = $imagem_icone_id,
					tabela_login_config_login = '$tabela_login_config_login',
					login_config_login = '$login_config_login',
					senha_config_login = '$senha_config_login',
					cor_fundo_config_login = '$cor_fundo_config_login',
					password_config_login = '$passWord'
				WHERE projetos_id = $projetos_id;";
	}
}


$stmt = $pdo->prepare($sql);
$stmt->execute();


$sql = "SELECT * FROM projetos WHERE id_projeto = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$projetoNome = $dados['nome'];
	$hostConexao = $dados['host'];
	$userConexao = $dados['user'];
	$pwsConexao = $dados['pws'];
	$nameDbConexao = $dados['bancoDados'];
}


include_once ("Classe/funcoes.php");



$tela_login = "<?php 
ob_start();
session_start();
\$nomeProjeto = \"".formatarNomeHeadTable2($projetoNome)."\";
\$corFundoDivLogin = \"$cor_fundo\";
\$imgFundo = \"app/img/$img_fundo\";

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo \$nomeProjeto;?> : Login</title>
	<meta charset=\"utf-8\">
	<link rel='shortcut icon' href=\"app/img/$img_icone\" />
	<?php include \"app/componetes/biblioteca.php\"; ?>
</head>
<body>
	<center>
		<form action=\"app/controllers/login.php\" method=\"POST\">
			<div class=\"divLogin\">
				<div class=\"subMenuLogin\">
					<h1>Projeto: <?php echo \$nomeProjeto; ?></h1>
					<!-- <h2>Tela de Login</h2> -->
					<span style=\"font-size: 100px;\"><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i></span>
					<br>
					<label><b>Usuário</b></label>
					<br>
					<input type=\"text\" accesskey=\"i\" name=\"login\" id=\"login\" class=\"form-control\" required>
					<br><br>
					<label><b>Senha</b></label>
					<br>
					<input type=\"password\" name=\"senha\" class=\"form-control\" align=\"center\" required>
					<br><br>
					<button type=\"submit\" class=\"btn btn-block btn-primary\">Entrar</button><br><br>
				</div>
				<div class=\"rodapeDiv\">
					<b>Developer: Jack Biller</b>
				</div>
			</div>
		</form>
	</center>
</body>
<style type=\"text/css\">
	body{
		<?php if (\$imgFundo != \"\") { ?>
			background-image: url(\"<?php echo \$imgFundo; ?>\");	
		<?php } ?>

		background-size: 100% auto;
		background-repeat: no-repeat;
	}
	.divLogin{
		margin-top: 4%;
		width: 40%;
		box-shadow: 10px 10px 5px #ccc;
		border-radius: 10px;
		background-color: <?php echo \$corFundoDivLogin; ?>;
		opacity: 0.92;
		padding-top: 15px;
		padding-bottom: 25px;
	}
	.subMenuLogin{
		width: 75%;
	}
	.subMenuLogin label{
		font-size: 25px;
	}
	.subMenuLogin input{
		font-size: 25px;
		text-align: center;

	}
	.rodapeDiv{
		text-align: right;
		padding-right: 15px;
		padding-top: 10px;
	}
</style>
<script type=\"text/javascript\">
	document.getElementById(\"login\").focus();
</script>
</html>
<?php

if (!empty(\$_SESSION['loginInvalido']) && \$_SESSION['loginInvalido']) {
	\$_SESSION['loginInvalido'] = false;
?>

	<script type=\"text/javascript\">
		alert(\"Login Invalido\");
		document.getElementById(\"msmErroLogin\").innerHTML = \"Login Inválido\";
	</script>
<?php
	}
?>
";



$controllerLogar = "<?php
ob_start();
session_start();
require_once \"../classe/conexao.php\";

\$tabela = \"$tabela\";
\$login_campo = \"$login_campo\";
\$senha_campo = \"$senha_campo\";

\$telaLogada = \"index\";

if (!empty(\$_POST['login']) && !empty(\$_POST['senha'])) {
	\$loginPost = tratarString(\$_POST['login']);
	\$senhaPost = tratarString(\$_POST['senha']);
	echo \$senhaPost . \" - \" . \$loginPost;
	\$contLogin = 0;
	
	\$conn = new Conexao();
	\$pdo = \$conn->Connect();
	\$sql = \"SELECT *
			FROM \$tabela 
			WHERE \$login_campo = '\$loginPost' 
			AND \$senha_campo = $config_senha_login
			AND bool_ativo_\$tabela = 1;\";
	\$verifica = \$pdo->query(\$sql);
	foreach (\$verifica as \$dados) {
		echo \"logado\";
		\$_SESSION['login'] = \$dados['id_usuario'];
		\$_SESSION['nome'] = \$dados['nome_usuario'];
		\$logado = true;
		\$classeUser = \"w3-container text-right cdi-text-vermelho-brothers\";
		\$contLogin++;
	}

	if (\$contLogin == 0) {
		\$_SESSION['loginInvalido'] = true;
		header(\"Location: ../../index.php\");
	} else {
		header(\"Location: ../../principal.php\");
	}

	// if (\$_POST['telaLogada'] == \"loteamento\") {
		// \$_SESSION['id_lote'] = \$_POST['id_lote'];
	// }
	// \$telaLogada = \$_POST['telaLogada'];
}

if (!empty(\$_POST['deslogar'])) {
	session_destroy();
	// header(\"Location: ../../index.php\");
}

function tratarString(\$texto){
	\$texto = str_replace(\"\\\\\", \"\\\\\\\\\", \$texto);
	\$texto = str_replace(\"\\\"\", \"\\\\\\\"\", \$texto);
	\$texto = str_replace(\"'\", \"\\\\'\", \$texto);

	\$texto = str_replace(\"=\", \"\", \$texto);

	return \$texto;
}


?>

";

copiarArquivo("Img_Fundo_Login/", "../GeradorProjetos/$projetoNome/app/img/", "$img_fundo");
copiarArquivo("Img_icon/", "../GeradorProjetos/$projetoNome/app/img/", "$img_icone");

criarArquivo("../GeradorProjetos/$projetoNome/app/controllers/login.php", $controllerLogar);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<?php echo criarArquivo("../GeradorProjetos/$projetoNome/index.php", $tela_login); ?>
		<br>
		<form action="projeto.php" method="POST">
			<input type="hidden" name="projeto_id" value="<?php echo $id_projeto; ?>">
			<button type="submit">Voltar ao Projeto</button>
		</form>
	</center>
</body>
</html>