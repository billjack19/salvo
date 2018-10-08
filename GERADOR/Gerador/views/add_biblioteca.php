<?php
session_start();

$id_projeto = $_SESSION['projeto_id'];

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

$files1 = scandir("../bibliotecas");

$tabelaVivlioteca = "<table>";

for ($i=0; $i < count($files1); $i++) { 
	if ($files1[$i] != "." && $files1[$i] != "..") {
		$tabelaVivlioteca .= "<tr>";
		$tabelaVivlioteca .= 	"<td>";
		$tabelaVivlioteca .= 		$files1[$i];
		$tabelaVivlioteca .= 	"</td>";
		$tabelaVivlioteca .= 	"<td>";
		$tabelaVivlioteca .= 		"<button ";
		$tabelaVivlioteca .=		  "onclick='adicionarBiblioteca(\"".$projetoNome."\", \"".$files1[$i]."\")'";
		$tabelaVivlioteca .=		">";
		$tabelaVivlioteca .=			"Adicionar";
		$tabelaVivlioteca .=		"</button>";
		$tabelaVivlioteca .= 	"</td>";
		$tabelaVivlioteca .= "</tr>";
	}
}
$tabelaVivlioteca .= "</table>";

// $sql = "SELECT * FROM imagem_fundo;";
// $verifica = $pdo->query($sql);
// $cont = 0;
// $selctImgemFundo = "<select name='img_fundo' onchange='definirImagem(this.value)'>";
// $imagemStada = "";


// foreach ($verifica as $dados) {
// 	if ($cont == 0) {
// 		$cont++;
// 		$imagemStada = $dados[1];
// 	}
// 	$selctImgemFundo .= "<option value='".$dados[1]."'>".$dados[1]."</option>";
// }
// $selctImgemFundo .= "</select>";


// include "../Classe/conexao.php";

// $conn = new Conexao();
// $conn->set($hostConexao, 'db_host');
// $conn->set($userConexao, 'db_usuario');
// $conn->set($pwsConexao, 'db_senha');
// $conn->set($nameDbConexao, 'db_nome');
// $conn->conectar();

// $pdo = $conn->Connect(); 

// $sql = "SHOW TABLES";
// $verifica = $pdo->query($sql);

// $tabelaDeTabelas = "<datalist id=\"tabelasList\">";
// foreach ($verifica as $dados) {
// 	// echo "<br>".$dados[0];
// 	// $tabelaDeTabelas .
// 	$tabelaDeTabelas .= "<option value='".$dados[0]."'>";
// }
// $tabelaDeTabelas .= "</datalist>";



?>
<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Biblioteca</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
			<h1>Adicionar Biblioteca</h1>
			<br>
			<input type="text" id="nomeProjeto" value="<?php echo $projetoNome; ?>">
			<br>
			<label>Id do Projeto</label>
			<input type="text" name="id_projeto" value="<?php echo $id_projeto; ?>"><br><br>
			<?php echo $tabelaVivlioteca; ?>
		<script type="text/javascript">
			function adicionarBiblioteca(prjeto, biblioteca){
				$.ajax({
					url:'../Componetes/adicionarBiblioteca.php',
					type: 'POST',
					dataType: 'html',
					data: {
						'nomeProjeto': prjeto,
						'biblioteca': biblioteca
					}
				}).done( function(data){
					alert("data: " + data);
				});
			}
		</script>
	</center>
</body>
</html>