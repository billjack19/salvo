<?php include "componentes/cabecarioConfig.php"; 

// session_start();

$id_grupo = $_POST['grupo'];


// include "classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect();

$itensLista = "";
$unidade_medida = "";
$contItens = 0;
$descricaoGrupo = "";

$sql = "	SELECT descricao_grupo
			FROM grupo 
			WHERE id_grupo = $id_grupo";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) $descricaoGrupo = $dados['descricao_grupo'];


$complemtoBtn = $logado ? "" : "disabled";


$sql = "	SELECT *
			FROM item 
			WHERE grupo_id = $id_grupo
			AND bool_ativo_item = 1
			ORDER BY descricao_item;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
		$contItens++;
		$unidade_medida = $dados['unidade_medida_item'] == "" ? "" : "<b>Unidade de Medida:</b> ".$dados['unidade_medida_item'];

		$itensLista .= "
		<div class=\"col-lg-3 col-md-4 col-sm-6 portfolio-item\">
			<div class=\"card h-100\">
				<a href=\"#\">
					<img class=\"card-img-top\" src=\"".$caminhoImg.$dados['imagem_item']."\" alt=\"\"> <!-- 700x400 -->
				</a>
				<div class=\"card-body\">
					<h4 class=\"card-title\">
						<a href=\"#\">".$dados['descricao_item']."</a>
					</h4>
					<p class=\"card-text\">".$dados['descricao_site_item']."</p>
					$unidade_medida
				</div>
				<div class=\"card-footer text-right\">
					<button class=\"btn\" onclick='abrirModalOrcamento(".$dados['id_item'].", \"".$dados['descricao_item']."\")' $complemtoBtn>
						<i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Adicionar
					</button>
				</div>
			</div>
		</div>";
}

$itensLista = $contItens == 0 ? "<h3>&nbsp;&nbsp;&nbsp;Nenhum Item Cadastrado neste Grupo</h3><br><br><br><br><br><br><br><br><br><br><br><br><br>" : $itensLista;

?>
<!DOCTYPE html>
<html lang="en">
	<?php include "componentes/cabecarioPagina.php"; ?>
	<body>
		<?php include "componentes/menu.php"; ?>

		<!-- Page Content -->
		<div class="container">

			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"><?php echo $descricaoGrupo; ?> <!-- <small>Subheading</small> -->
			</h1>

			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Principal</a>
				</li>
				<li class="breadcrumb-item active"><?php echo $descricaoGrupo; ?></li>
			</ol>

			<div class="row" id="itens">

				<?php echo $itensLista; ?>

			</div>

			<!-- Pagination -->
			<!-- <ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link active" href="#">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul> -->

		</div>
		<!-- /.container -->

		<?php include "componentes/rodape.php";?>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<script src="lb/jquery-flexdatalist/jquery.flexdatalist.min.js"></script>
	</body>
</html>
