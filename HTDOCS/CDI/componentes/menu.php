
<!-- Inputs globais -->
<input type="hidden" id="cliente_site_id" value="<?php echo $usuario; ?>">

<nav class="navbar fixed-top navbar-expand-lg corPrincipalFundo fixed-top" style="color: white; border-bottom-style: solid; border-width: 2px;border-color: <?php echo $corTexto; ?>;">
	<!-- navbar-dark bg-dark -->
	<div class="container">
		<!-- CXonfiguraçã imagem  da logo no menu -->
		<span class="w3-hide-small">
			<a class="navbar-brand" href="index.php" style="color: <?php echo $corTexto; ?>;">
				<?php echo $logoPagina; ?></span>
			</a>
		<span class="w3-hide-large w3-hide-medium">
			<a class="navbar-brand" href="index.php" style="color: <?php echo $corTexto; ?>;">
				<?php echo $logoPaginaSm; ?>
			</a>
		</span>

		<a class="navbar-brand" href="index.php" style="color: <?php echo $corTexto; ?>;">
			&nbsp;&nbsp;
			<span style="font-size: 40px;" class="w3-hide-small"><?php echo $tituo_menu; ?></span>
			<span style="font-size: 25px;" class="w3-hide-medium w3-hide-large"><?php echo $tituo_menu; ?></span>
		</a>
		&nbsp;&nbsp;
		<?php
		$stringTelefoneMenu = "";
		$configCelular = "";
		$numHMenuTelefone = "1";
		$idTelefoneH = "telfoneMenuPrincipal";
		$spancoPo = "&nbsp;&nbsp;&nbsp;";

		$sql = "	SELECT celular_endereco_site,  telefone_endereco_site
					FROM endereco_site 
					WHERE bool_ativo_endereco_site = 1
					AND configurar_site_id = $id_configurar_site
					ORDER BY id_endereco_site DESC LIMIT 1;";

		$verifica = $pdo->query($sql);
		foreach ($verifica as $dados) {
			$configCelular = $dados['celular_endereco_site'] != "" ? "<br><i class=\"fa fa-whatsapp\" aria-hidden=\"true\"></i>$spancoPo".$dados['celular_endereco_site'] : "";
			// $numHMenuTelefone = $dados['celular_endereco_site'] != "" ? "3" : "1";
			$idTelefoneH = $dados['celular_endereco_site'] != "" ? "celularMenuPrincipal" : "telfoneMenuPrincipal";

			$stringTelefoneMenu .= $spancoPo.'
				<h'.$numHMenuTelefone.' id=\''.$idTelefoneH.'\' style="color: '.$corTexto.';">'
					.'<i class="fa fa-phone" aria-hidden="true"></i>'.$spancoPo.$dados['telefone_endereco_site']
					.$configCelular
				.'</h'.$numHMenuTelefone.'>';
		}

		echo $stringTelefoneMenu;
		
		?>

		<!-- Icone responsivo -->
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #b4b4b4; color: white; font-size: 30px;padding-right: 15px;padding-left: 15px;">
			<!-- <span class="navbar-toggler-icon" style="color: white;"></span> -->
			<i class="fa fa-bars" aria-hidden="true"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="sobre.php" style="color: <?php echo $corTexto; ?>;">
						&nbsp;Sobre Nós&nbsp;
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contato.php" style="color: <?php echo $corTexto; ?>;">
						&nbsp;Contato&nbsp;
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="portfolio.php" style="color: <?php echo $corTexto; ?>;">
						&nbsp;Portfolio&nbsp;
					</a>
				</li>
				<li class="nav-item" id='clienteLogado'>
					<a class="nav-link" href="#" onclick="abrirModalLoginCliente()" style="color: <?php echo $corTexto; ?>;">
						&nbsp;Área do Cliente&nbsp;
					</a>
				</li>
				<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
						&nbsp;Produtos&nbsp;
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
						&nbsp;<?php echo $linkMenu; ?>&nbsp;
					</div>
				</li> -->
				<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
						&nbsp;<?php echo $nomeUsusario; ?>&nbsp;
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio"> -->
						<?php if ($logado) { ?>
						<!-- <a class="dropdown-item" href="#" onclick="mostrarConteudoOrcamento('linkAddOrcamento');chamar_jk_comboDataList(0,'');">Criar Orçamento</a> -->
						<!-- <a class="dropdown-item" href="#" onclick="document.getElementById('selecionarRelatorio').style.display='block';"> -->
							<!-- Emitir Relatório -->
							<!-- (Posição do Café) -->
						</a>
						<!-- <a class="dropdown-item" href="#" onclick="document.getElementById('trocar_senha_modal').style.display='block'""> -->
							<!-- Trocar Senha -->
						<!-- </a> -->
						<!-- <a class="dropdown-item" href="#" onclick="document.getElementById('btnDeslogar').click();">Sair</a> -->
						<?php } else { ?>
						<!-- <a class="dropdown-item" href="#" onclick="document.getElementById('login_cliente').style.display='block'"> -->
							<!-- Logar -->
						<!-- </a> -->
						<!-- <a class="dropdown-item" href="#" onclick="chamarModalCadastreSe();">
							Cadastrar-se
						</a> -->
						<!-- <script type="text/javascript">
							function chamarModalCadastreSe(){
								document.getElementById('cadastrar_se').style.display = 'block';
								jk_comboDataList(
									"Estado", "funcoes_estadoController", 
									{
										'pequisa_estado': true
									}, "estado_id", 
									[ "1","2","3","4" ], 
									0, [1], "", "estadoDiv", "", 3
								);
							}
						</script> -->
						<?php } ?>
					<!-- </div> -->
				<!-- </li> -->
			</ul>
		</div>
	</div>
	
	
</nav>
<form action="controllers/login.php" method="POST">
	<input type="hidden" name="deslogar" value="true">
	<input type="submit" style="display: none;" type="submit" id="btnDeslogar">
	<!-- <button class="hidden"></button> -->
</form>




<form action="item.php" method="POST">
	<?php  if (!empty($_POST['grupo']) && $_POST['grupo'] != "") { $grupo_idForm = $_POST['grupo']; ?>
		<input type="hidden" name="grupo" id="id_grupoSelect" value="<?php echo $grupo_idForm; ?>">
	<?php } else { ?>
		<input type="hidden" name="grupo" id="id_grupoSelect">	
	<?php } ?>
	<div >
		<button class="hidden" type="submit" id="submeterGrupo" style="opacity: 0;"></button>
	</div>
</form>
<script type="text/javascript">
	function setarIdGrupo(id){
		$("#id_grupoSelect").val(id);
		document.getElementById('submeterGrupo').click();
	}
</script>



<div id="selecionarRelatorio" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<div class="w3-container">
			<span onclick="document.getElementById('selecionarRelatorio').style.display='none'" class="w3-button w3-display-topright">
				&times;
			</span>
			<br><h2 class="corPrincipalText">Relatórios</h2>
			<li>
				<a href="#" onclick="emitirPosicao('posicaoCafe')">
					Emitir Relatório de Posição do café
				</a>
			</li>
			<br><br>
		</div>
	</div>
</div>


<form action="relatorio.php" method="POST">
	<input type="hidden" name="tipoRelatorio" id="setarTipoRelatorio">
	<button style="display: none;" type="submit" id="submeterRelatorio"></button>
</form>

<script type="text/javascript">
	function emitirPosicao(tipo){
		$("#setarTipoRelatorio").val(tipo);
		document.getElementById("submeterRelatorio").click();
	}
</script>



<?php include "componentes/modalLogin.php"; ?>
<?php include "componentes/modalCadastre_se.php"; ?>


<script type="text/javascript">
	function abrirModalLoginCliente(){
		document.getElementById("login_cliente").style.display = "block";
	}
</script>