<?php
session_start();


if (!empty($_POST['projeto_id'])) {
	$id_projeto = $_POST['projeto_id'];
	$_SESSION['projeto_id'] = $id_projeto;
} else {
	$id_projeto = $_SESSION['projeto_id'];
}


include "../Classe/conexaoLocal.php";

$conn = new ConexaoLocal();
$conn->conectar();
$pdo = $conn->Connect();


$modelo_cores_menu_id = "";
$icone_cadastro_config_principa = "";
$tabelas_cadastro_config_principa = "";
$logoLg_config_principa = "";
$logoSm_config_principa = "";
$checkUpload = "";

$sql = "SELECT * FROM config_principal WHERE projetos_id = $id_projeto;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$modelo_cores_menu_id = $dados['modelo_cores_menu_id'];
	$icone_cadastro_config_principa = $dados['icone_cadastro_config_principa'];
	$tabelas_cadastro_config_principa = $dados['tabelas_cadastro_config_principa'];
	$logoLg_config_principa = $dados['logoLg_config_principa'];
	$logoSm_config_principa = $dados['logoSm_config_principa'];
	$bool_upload_config_principa = $dados['bool_upload_config_principa'];
}

if ($bool_upload_config_principa == 1) {
	$checkUpload = "<input type=\"checkbox\" id=\"bool_upload_config_principa\" checked>";
} else {
	$checkUpload = "<input type=\"checkbox\" id=\"bool_upload_config_principa\">";
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



$sql = "SELECT * FROM `modelo_cores_menu`";
$verifica = $pdo->query($sql);
$databases = "<select id='modelo_cores_menu' onchange='mostrarCorPrincipal(this.value)' required>";
foreach ($verifica as $dados) {
	if ($modelo_cores_menu_id == $dados[0]) {
		$databases .= "<option value='".$dados[0]."+".$dados[1]."' selected>".$dados[1]."</option>";	
	} else {
		$databases .= "<option value='".$dados[0]."+".$dados[1]."'>".$dados[1]."</option>";
	}
}
$databases .= "</select>";


$sql = "SELECT * FROM icones;";
$verifica = $pdo->query($sql);
// $cont = 0;
$iconesModal = "";
// $selctImgemFundo = "<select id='icone' onchange='mostrarIcone(this.value)'>";
// $imagemStada = "";

foreach ($verifica as $dados) {

	$iconesModal .= "
		<div class='col-md-2 col-sx-3 text-center' onclick=\"pequisaIconeId(".$dados[0].")\">
			<h1 style='font-size: 25px;'>".$dados[2]."</h1>
			".$dados[1]." - tipo(".$dados[3].")
		</div>
		";

	// if ($cont == 0) {
	// 	$icone_cadastro_config_principa = $icone_cadastro_config_principa == "" ? $dados[2] : $icone_cadastro_config_principa;
	// 	$cont++;
	// 	$imagemStada = $dados[1];
	// }
	// if ($icone_cadastro_config_principa == $dados[2]) {
	// 	$selctImgemFundo .= "<option value=\"".$dados[2]."\" selected>".$dados[1]."</option>"; // ".$dados[0]."+
	// } else {
	// 	$selctImgemFundo .= "<option value=\"".$dados[2]."\">".$dados[1]."</option>"; // ".$dados[0]."+
	// }
}
// $selctImgemFundo .= "</select>";





$contImgLogo = 0;
$sql = "SELECT * FROM imagem_logo;";
$verifica = $pdo->query($sql);
$cont = 0;
$selctLogoLg = "<select id='logoLg' onchange='mostrarImage(this.value, \"Lg\")'>";
$imgLogoSm = "";
$imgLogoLg = "";
$selctLogoSm = "<select id='logoSm' onchange='mostrarImage(this.value, \"Sm\")'>";

$imagemStada = "";

foreach ($verifica as $dados) {
	if ($contImgLogo == 0) {
		$imgLogoLg = "<img src='../Img_logo/".$dados[1]."' height='150px'>";
		$imgLogoSm = "<img src='../Img_logo/".$dados[1]."' height='150px'>";
		$contImgLogo++;
	}

	if ($logoLg_config_principa == $dados[1]) {
		$selctLogoLg .= "<option value=\"".$dados[1]."\" selected>".$dados[1]."</option>"; // ".$dados[0]."+
		$imgLogoLg = "<img src='../Img_logo/".$dados[1]."' height='150px'>";
	} else {
		$selctLogoLg .= "<option value=\"".$dados[1]."\">".$dados[1]."</option>"; // ".$dados[0]."+
	}


	if ($logoSm_config_principa == $dados[1]) {
		$selctLogoSm .= "<option value=\"".$dados[1]."\" selected>".$dados[1]."</option>"; // ".$dados[0]."+
		$imgLogoSm = "<img src='../Img_logo/".$dados[1]."' height='150px'>";
	} else {
		$selctLogoSm .= "<option value=\"".$dados[1]."\">".$dados[1]."</option>"; // ".$dados[0]."+
	}
}
$selctLogoLg .= "</select>";
$selctLogoSm .= "</select>";



$tabelas_cadastro_config_principa = explode("+", $tabelas_cadastro_config_principa);





$tabelasPadrao = array();
$sql = "SELECT descricao_tabela_padrao FROM tabela_padrao WHERE bool_ativo_tabela_padrao = 1;";
$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	array_push($tabelasPadrao, $dados[0]);
}




include "../Classe/conexao.php";

$conn = new Conexao();
$conn->set($hostConexao, 'db_host');
$conn->set($userConexao, 'db_usuario');
$conn->set($pwsConexao, 'db_senha');
$conn->set($nameDbConexao, 'db_nome');

/*echo "<br>".$conn->get('db_host');
echo "<br>".$conn->get('db_usuario');
echo "<br>".$conn->get('db_senha');
echo "<br>".$conn->get('db_nome');
echo "<br>";*/


$conn->conectar();
$pdo = $conn->Connect(); 


$sql = "SHOW TABLES";
$verifica = $pdo->query($sql);
$checkedTabela = "";

$tabelaDeTabelas = "<table>";
foreach ($verifica as $dados) {

	$checkedTabela = "";
	if (!in_array($dados[0], $tabelasPadrao)) {
		if (in_array($dados[0], $tabelas_cadastro_config_principa)) {
			$i = sizeof($tabelas_cadastro_config_principa);
			$checkedTabela = "checked";
		}
		$tabelaDeTabelas .= '
	<tr onclick="selecionaTable(\''.$dados[0].'\')">
		<td>'.$dados[0].'</td>
		<td>
			<input type=\'checkbox\' id=\'check_'.$dados[0].'\' '.$checkedTabela.' disabled>
			<input type=\'hidden\' name=\'arrayTabelas\' value="'.$dados[0].'" disabled>
		</td>
	</tr>';

	}
}
$tabelaDeTabelas .= "</table>";



?>

<!DOCTYPE html>
<html>
<head>
	<title>Criar tela Principal</title>

	<link href="../Modelo_Principal/app/css/icons.css" rel="stylesheet" />
	<link href="../Modelo_Principal/app/css/bootstrap.css" rel="stylesheet" />
	<link href="../Modelo_Principal/app/css/plugins.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "../Componetes/menu2.php"; ?>
	<center>
	<h1><?php echo $projetoNome; ?></h1>
	<!-- <form action="crud2.php" method="POST"> -->
		<label>Nome do projeto</label><br>
		<input type="text" id="nomeProjeto" value="<?php echo $projetoNome ?>" disabled><br>
		<input type="hidden" id="id_projeto" value="<?php echo $id_projeto; ?>">

		<table style="width: 60%">
			<tr>
				<td>
					<h2>Padrão de Cores do Menu</h2>
					<?php echo $databases; ?>
					<input type="color" id="mostrarCorPri" disabled>
					<div id="paletaDeCores"></div>
					<!-- <br> -->
					
				</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>
					<h2>Icone Cadastro</h2>
					<button class="btn-default btn" data-toggle='modal' data-target='#iconesModal'>
						Selecionar
					</button>&nbsp;
					<span id="viewIcone" style="font-size: 30px;">
						<?php echo $icone_cadastro_config_principa; ?>
					</span>
				</td>
			</tr>
		</table>
		<table style="width: 90%">
			<tr>
				<td>
					<!-- <?php // echo $selctImgemFundo; ?> -->
					<h2>Faz Upload?</h2>
					<?php echo $checkUpload; ?>
					<!-- <br> -->
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td width="50%">
					<h2>Logo Lg</h2>
					<?php echo $selctLogoLg; ?>
					<div id="viewLogoLg"><?php echo $imgLogoLg; ?></div>
				</td>
				<td width="50%">
					<h2>Logo Sm</h2>
					<?php echo $selctLogoSm; ?>
					<div id="viewLogoSm"><?php echo $imgLogoSm; ?></div>
				</td>
			</tr>
		</table>
		<br>
		<h2>Tabelas de Cadastro</h2>
		<?php echo $tabelaDeTabelas; ?><br>
		
		<button onclick="gerarEstrutura()">Gerar Projeto</button>	


		<div class="modal fade" id="iconesModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onclick="setStatus('pagina3');limparCamposModalItem();"  id="fecharModalBottun" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Selecionar Icones:</h4>
					</div>
					<div class="modal-body">
						<input type="text" class="form-control" id="buscaIcon">
						<br>
						<button class="btn btn-default btn-block" onclick="filtroIcones()">Pesquisar</button>
						<div id="iconesPreViewModal">
							<?php echo $iconesModal; ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" id="fecharModalComfirmaCacamba" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	
	<!-- </form> -->
	<br><br>
	<a href="http://localhost/GeradorProjetos/<?php echo $projetoNome; ?>/index.php" target="black">Visualizar Projeto</a>

</center>



<script type="text/javascript">
	function setarTabela(tabela){
		document.getElementById('tabela').value = tabela;
	}

	function definirImagem(imgem){
		document.getElementById("imagemFundoModelo").src = "Img_Fundo_Login/"+imgem;
	}
	function mostrarCorPrincipal(cor){
		cor = cor.split("+");
		document.getElementById("mostrarCorPri").value = "#"+cor[1];
	}
	// function mostrarIcone(icone){
	// 	// icone = icone.split("+");
	// 	document.getElementById("viewIcone").innerHTML = icone;	// [1]
	// }

	function selecionaTable(tabela){
		if (document.getElementById("check_"+tabela).checked) {
			document.getElementById("check_"+tabela).checked = false;
		} else {
			document.getElementById("check_"+tabela).checked = true;
		}
	}


	function mostrarImage(img, tipo){
		document.getElementById("viewLogo"+tipo).innerHTML = "<img src='../Img_logo/"+img+"' height='150px'>";
	}


	function gerarEstrutura(){
		var bool_upload = 0;
		var modeloCorMenu = $("#modelo_cores_menu").val();
		// console.log("modeloCorMenu: "+modeloCorMenu);
		modeloCorMenu = modeloCorMenu.split("+");

		if (document.getElementById("bool_upload_config_principa").checked) bool_upload = 1;


		var tabelas = document.getElementsByName("arrayTabelas");
		var arrayTabelasSelecionadas = "";
		var contTabelas = 0;
		for (var i = 0; i < tabelas.length; i++) {
			if (document.getElementById("check_"+tabelas[i].value).checked) {
				if (contTabelas == 0 ) 	arrayTabelasSelecionadas  = 	  tabelas[i].value;	
				else 					arrayTabelasSelecionadas += "+" + tabelas[i].value;
				contTabelas++;
			}
		}


		//  Verificcação Console
		console.log("nomeProjeto: "+$("#nomeProjeto").val());
		console.log("modeloCorMenu: "+modeloCorMenu[0]);
		console.log("icone: "+document.getElementById("viewIcone").innerHTML);
		console.log("tabelas: "+arrayTabelasSelecionadas);
		console.log("bool_upload: "+bool_upload);
		console.log("id_projeto: "+$("#id_projeto").val());

		

		$.ajax({
			url:'../Pagina_principal/paginaPrincipal.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'nomeProjeto': $("#nomeProjeto").val(),
				'modeloCorMenu': modeloCorMenu[0],
				'icone': document.getElementById("viewIcone").innerHTML,
				'tabelas': arrayTabelasSelecionadas,
				'logoLg': $("#logoLg").val(),
				'logoSm': $("#logoSm").val(),
				'bool_upload': bool_upload,
				'id_projeto': $("#id_projeto").val()
			}
		}).done( function(data){
			alert("data: " + data);
			console.log(data);
		});
	}


	function filtroIcones(){
		var textoPesquisa = $("#buscaIcon").val();
		$.ajax({
			url:'pesquisaIcones.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'pesuisa': true,
				'textoPesquisa': textoPesquisa
			}
		}).done( function(data){
			$("#iconesPreViewModal").html(data);
		});
	}


	function pequisaIconeId(id){
		$.ajax({
			url:'pesquisaIcones.php',
			type: 'POST',
			dataType: 'html',
			data: {
				'retornaicone': true,
				'id': id
			}
		}).done( function(data){
			document.getElementById("viewIcone").innerHTML = data;
			$('#iconesModal').modal('hide');
		});
	}

	
</script>
</body>
</html>