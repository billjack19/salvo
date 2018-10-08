


<!-- Navbar (sit on top) -->
<div class="w3-top corPrincipalText" style="height: 55px;max-height: 55px;min-height: 55px;">
	<div class="w3-bar w3-white w3-wide w3-padding w3-card">
		<div class="w3-hide-large">
			<a href="javascript:void(0)" class="w3-bar-item w3-button" style="font-size: 10px;" onclick="w3_open()">
				<i class="fa fa-2x fa-bars"></i> <!-- ☰ -->
			</a>
		</div>
		<div class="w3-hide-small w3-hide-medium">
			<a href="javascript:void(0)" class="w3-bar-item w3-button" style="font-size: 15px;" onclick="w3_open()">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-2x fa-bars"></i> <!-- ☰ -->
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</a>
		</div>


		<div class="w3-hide-large">
			<a href="#home" class="w3-bar-item w3-button" style="padding: 0px 0px 0px 0px;">
				<?php echo $linkPrincipalSmall; ?>
			</a>
		</div>
		<div class="w3-hide-small w3-hide-medium">
			<a href="#home" class="w3-bar-item w3-button" style="padding: 0px 0px 0px 0px;">
				<?php echo $linkPrincipal; ?>
			</a>
		</div>


		<div class="w3-right w3-hide-large w3-hide-medium">
			<a href="#<?php echo $linkTelefone; ?>" class="w3-bar-item w3-button" style="font-size: 15px;">
				<i class="fa fa-phone"></i> <?php echo $telefone; ?>
			</a>
		</div>
		<div class="w3-hide-small">
			<a href="#<?php echo $linkTelefone; ?>" class="w3-bar-item w3-button" style="font-size: 20px;">
				&nbsp;&nbsp;&nbsp;
				<i class="fa fa-phone"></i> <?php echo $telefone; ?>
				&nbsp;&nbsp;&nbsp;
			</a>
		</div>

		<div class="w3-right w3-hide-small w3-hide-medium">
			<a href="#<?php echo $linkTitulo1; ?>" class="w3-bar-item w3-button">
				<?php echo $titulo1; ?>
			</a>
			<a href="#<?php echo $linkTitulo2; ?>" class="w3-bar-item w3-button">
				<?php echo $titulo2; ?>
			</a>
			<a href="#<?php echo $linkTitulo3; ?>" class="w3-bar-item w3-button">
				<?php echo $titulo3; ?>
			</a>
		</div>
		<div class="w3-right w3-hide-medium w3-hide-large">

		</div>
	</div>
</div>

<?php 

$linkMenu = "";
$descricaoSubGrupo = "";
$ID_grupo_estoque = "";
$ID_sub_grupo_estoque = "";

$sql = "	SELECT *
			FROM grupo 
			ORDER BY descricao_grupo;";

$verifica = $pdo->query($sql);
foreach ($verifica as $dados) {
	$descricaoSubGrupo = $dados["descricao_grupo"];
	$ID_grupo_estoque = $dados['id_grupo'];
	// $ID_sub_grupo_estoque = $dados['SUB_GRUPO'];

	$linkMenu .= "	<a href=\"itens.php?grupo=$ID_grupo_estoque\" class=\"w3-bar-item w3-button w3-animate-zoom\">
						$descricaoSubGrupo
					</a>";

}

?>



<!-- ******************************************************************************************************************* -->
<!-- BARRA LATERAL QUANDO TELA PEQUENA -->
<!-- ******************************************************************************************************************* -->
<div class="w3-sidebar w3-bar-block w3-border-right menulateraal" id="mySidebar">
	<button onclick="w3_close()" class="w3-bar-item w3-large">Fechar &times;</button>

	<?php echo $linkMenu; ?>

</div>



<style type="text/css">
	.menulateraal{
		display:none;
		width: 300px;
		position: fixed;
		margin-top: 0px;
		margin-left: 0px;
	}
</style>



<script type="text/javascript">
	function w3_open() {
		var mySidebar = document.getElementById("mySidebar");
		if (mySidebar.style.display === 'block') {
			mySidebar.style.display = 'none';
		} else {
			mySidebar.style.display = 'block';
		}
	}

	// Close the sidebar with the close button
	function w3_close() {
		var mySidebar = document.getElementById("mySidebar");
		mySidebar.style.display = "none";
	}
</script>