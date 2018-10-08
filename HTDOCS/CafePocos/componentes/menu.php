
<!-- Inputs globais -->
<input type="hidden" id="cliente_site_id" value="<?php echo $usuario; ?>">

<nav class="navbar fixed-top navbar-expand-lg corPrincipalFundo fixed-top" style="color: white;">
	<!-- navbar-dark bg-dark -->
	<div class="container" style="color: white;">
		<a class="navbar-brand" href="index.php" style="color: white;">

			<!-- CXonfiguraçã imagem  da logo no menu -->
			<?php echo $logoPagina; ?>
			<!-- <img src="img/logo/Logotipo_branca.png" height="60px;"> -->
		</a>
		<a class="navbar-brand" href="index.php" style="color: white;">
			&nbsp;&nbsp;
			<span style="font-size: 40px;" class="w3-hide-small"><?php echo $tituo_menu; ?></span>
			<span style="font-size: 25px;" class="w3-hide-medium w3-hide-large"><?php echo $tituo_menu; ?></span>

		</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
				<h'.$numHMenuTelefone.' id=\''.$idTelefoneH.'\'>'
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
					<a class="nav-link" href="sobre.php" style="color: white;">
						&nbsp;Sobre Nós&nbsp;
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contato.php" style="color: white;">
						&nbsp;Contato&nbsp;
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
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
						&nbsp;<?php echo $nomeUsusario; ?>&nbsp;
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
						<?php if ($logado) { ?>
						<!-- <a class="dropdown-item" href="#" onclick="mostrarConteudoOrcamento('linkAddOrcamento');chamar_jk_comboDataList(0,'');">Criar Orçamento</a> -->
						<a class="dropdown-item" href="#" onclick="document.getElementById('selecionarRelatorio').style.display='block';">
							Emitir Relatório
							<!-- (Posição do Café) -->
						</a>
						<a class="dropdown-item" href="#" onclick="document.getElementById('trocar_senha_modal').style.display='block'"">
							Trocar Senha
						</a>
						<a class="dropdown-item" href="#" onclick="document.getElementById('btnDeslogar').click();">Sair</a>
						<?php } else { ?>
						<a class="dropdown-item" href="#" onclick="document.getElementById('login_cliente').style.display='block'">
							Logar
						</a>
						<!-- <a class="dropdown-item" href="#" onclick="chamarModalCadastreSe();">
							Cadastrar-se
						</a> -->
						<script type="text/javascript">
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
						</script>
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>
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
	</div>
</nav>

<form action="controllers/login.php" method="POST">
	<input type="hidden" name="deslogar" value="true">
	<input type="submit" style="display: none;" type="submit" id="btnDeslogar">
	<!-- <button class="hidden"></button> -->
</form>





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
	// function abrirModalOrcamento(idItem, descricaoItem){
	// 	$("#item_id").val(idItem);
	// 	$("#descricao_item").val(descricaoItem);
	// 	mostrarConteudoOrcamento("linkAddItemOrcamento");
	// 	chamar_jk_comboDataList(idItem, descricaoItem);
	// }

	// function fecharModalOrcamento(){
	// 	document.getElementById('orcamento').style.display='none';
	// 	chamar_jk_comboDataList(0,"");
	// }

	// function cadastrarOrcamento(){
	// 	if ($("#descricao_orcamento").val() != "") {
	// 		$.ajax({
	// 			url:'controllers/cadastro_orcamentoController.php',
	// 			type: 'POST',
	// 			dataType: 'text',
	// 			data: {
	// 				'descricao_orcamento': $("#descricao_orcamento").val(),
	// 				'cliente_site_id': $("#cliente_site_id").val(),
	// 				'data_lanc_orcamento': 1,
	// 				'bool_ativo_orcamento': 1
	// 			}
	// 		}).done( function(data){
	// 			alert("Orçamento cadastrado com sucesso!");
	// 			$("#descricao_orcamento").val("");
	// 			chamar_jk_comboDataList(0,"");
	// 		});
	// 	} else alert("Preencha todos os daods");
	// }

	// function cadastrarItemOrcamento(){
	// 	if ($("#orcamento_id").val() != "" && $("#quantidade_item_orcamento").val() != "") {
	// 		$.ajax({
	// 			url:'controllers/cadastro_item_orcamentoController.php',
	// 			type: 'POST',
	// 			dataType: 'text',
	// 			data: {
	// 				'data_lanc_item_orcamento': 1,
	// 				'orcamento_id': $("#orcamento_id").val(),
	// 				'item_id': $("#item_id").val(),
	// 				'quantidade_item_orcamento': $("#quantidade_item_orcamento").val(),
	// 				'total_item_orcamento': null,
	// 				'bool_ativo_item_orcamento': 1
	// 			}
	// 		}).done( function(data){
	// 			console.log(data);
	// 			$("#quantidade_item_orcamento").val("");
	// 			alert("Item adicionado com sucesso");
	// 			chamar_jk_comboDataList(0,"");
	// 		});
	// 	} else alert("Preencha todos os daods");
	// }

	// function listarItensOrcamentoVal(){
	// 	var idOrcamento = $("#orcamento_itens_lista").val();
	// 	if (idOrcamento != "") listarItensOrcamento(idOrcamento);
	// }


	// function listarItensOrcamento(idOrcamento){
	// 	console.log("listarItensOrcamento");
	// 	var id_item_orcamento = "";
	// 	var data_lanc_item_orcamento = "";
	// 	var orcamento_id = "";
	// 	var item_id = "";
	// 	var quantidade_item_orcamento = "";
	// 	var total_item_orcamento = "";
	// 	var bool_ativo_item_orcamento = "";
	// 	var id_orcamento = "";
	// 	var descricao_orcamento = "";
	// 	var cliente_site_id = "";
	// 	var data_lanc_orcamento = "";
	// 	var bool_ativo_orcamento = "";
	// 	var id_item = "";
	// 	var descricao_item = "";
	// 	var descricao_site_item = "";
	// 	var unidade_medida_item = "";
	// 	var imagem_item = "";
	// 	var grupo_id = "";
	// 	var usuario_id = "";
	// 	var bool_ativo_item = "";

	// 	var telaCadastroItem_orcamento = "";
	// 	var totalDosTotas = 0;
	// 	$.ajax({
	// 		url:'controllers/funcoes_item_orcamentoController.php',
	// 		type: 'POST',
	// 		dataType: 'text',
	// 		data: {
	// 			'pequisa_item_orcamento_grade': true,
	// 			'tabela': "orcamento",
	// 			'id': idOrcamento
	// 		}
	// 	}).done( function(data){
	// 		console.log(data);
	// 		var vetor = data.split("[]");
	// 		var subvetor = vetor[0].split(",");
	// 		if (subvetor[1] == undefined) {
	// 			telaCadastroItem_orcamento += "<h3>Nenhum registro encontrado!</h3>";
	// 		} else {
	// 			telaCadastroItem_orcamento += "<br>";

	// 			telaCadastroItem_orcamento += 	"<table class='table'>";
	// 			telaCadastroItem_orcamento += 	"<tr>";
	// 			telaCadastroItem_orcamento += 		"<td>Descrição do Item</td>";
	// 			telaCadastroItem_orcamento += 		"<td>Quantidade</td>";
	// 			telaCadastroItem_orcamento += 		"<td align='right'>Total</td>";
	// 			telaCadastroItem_orcamento += 		"<td align='right'>Remover Item</td>";
	// 			telaCadastroItem_orcamento += 	"</tr>";

	// 			for (var i = 0; i < vetor.length; i++) {
	// 				subvetor = vetor[i].split(",");

	// 				id_item_orcamento = subvetor[0];
	// 				data_lanc_item_orcamento = subvetor[1];
	// 				orcamento_id = subvetor[2];
	// 				item_id = subvetor[3];
	// 				quantidade_item_orcamento = subvetor[4];
	// 				total_item_orcamento = subvetor[5];
	// 				bool_ativo_item_orcamento = subvetor[6];
	// 				id_orcamento = subvetor[7];
	// 				descricao_orcamento = subvetor[8];
	// 				cliente_site_id = subvetor[9];
	// 				data_lanc_orcamento = subvetor[10];
	// 				bool_ativo_orcamento = subvetor[11];
	// 				id_item = subvetor[12];
	// 				descricao_item = subvetor[13];
	// 				descricao_site_item = subvetor[14];
	// 				unidade_medida_item = subvetor[15];
	// 				imagem_item = subvetor[16];
	// 				grupo_id = subvetor[17];
	// 				usuario_id = subvetor[18];
	// 				bool_ativo_item = subvetor[19];

	// 				if (bool_ativo_item_orcamento == 1) {

	// 					totalDosTotas = parseInt(total_item_orcamento) + parseInt(totalDosTotas);

	// 					quantidade_item_orcamento = formatarValorParaDecimal(quantidade_item_orcamento);
	// 					total_item_orcamento = total_item_orcamento == 0 ? "Aguardando Valor" : formataValorParaImprimir(total_item_orcamento);

	// 					telaCadastroItem_orcamento += 	"<tr>";
	// 					telaCadastroItem_orcamento += 		"<td>"+descricao_item+"</td>";
	// 					telaCadastroItem_orcamento += 		"<td>"+quantidade_item_orcamento+"</td>";
	// 					telaCadastroItem_orcamento += 		"<td align='right'>"+total_item_orcamento+"</td>";
	// 					telaCadastroItem_orcamento += 		"<td align='right'>";
	// 					telaCadastroItem_orcamento += 			"<a href='#' style='color: #f00;' data-id='"+id_item_orcamento+"' onclick=\"excluir(this , 'item_orcamento', "+idOrcamento+")\">";
	// 					telaCadastroItem_orcamento += 				"<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
	// 					telaCadastroItem_orcamento +=  			"</a>";
	// 					telaCadastroItem_orcamento +=  		"</td>";
	// 					telaCadastroItem_orcamento += 	"</tr>";
	// 				}
	// 			}

	// 			totalDosTotas = totalDosTotas == 0 ? "Sem Total" : formataValorParaImprimir(totalDosTotas);
	// 			telaCadastroItem_orcamento += "<tr><td colspan='3' align='right'><b>Total:</b> "+totalDosTotas+"</td><td></td></tr>";
	// 			telaCadastroItem_orcamento += "</table>";
	// 		}			
	// 		$("#listaItensDoOrcamento").html(telaCadastroItem_orcamento);
	// 	});
	// }

	// function listarOrcamentoCrud(){
	// 	var id_orcamento = "";
	// 	var descricao_orcamento = "";
	// 	var cliente_site_id = "";
	// 	var data_lanc_orcamento = "";
	// 	var bool_ativo_orcamento = "";

	// 	var telaCadastroOrcamento = "";
	// 	$.ajax({
	// 		url:'controllers/funcoes_orcamentoController.php',
	// 		type: 'POST',
	// 		dataType: 'text',
	// 		data: {
	// 			'pequisa_orcamento_grade': true,
	// 			'tabela': "cliente_site",
	// 			'id': $("#cliente_site_id").val()
	// 		}
	// 	}).done( function(data){
	// 		var vetor = data.split("[]");
	// 		var subvetor = vetor[0].split(",");
	// 		if (subvetor[1] == undefined) {
	// 			telaCadastroOrcamento += "<h3>Nenhum registro encontrado!</h3>";
	// 		} else {
	// 			telaCadastroOrcamento += "<br>";

	// 			telaCadastroOrcamento += "<table class='table'>";
	// 			telaCadastroOrcamento += "<tr>";
	// 			telaCadastroOrcamento += "<td>Editar</td>";
	// 			telaCadastroOrcamento += "<td>Descricao</td>";
	// 			telaCadastroOrcamento += "</tr>";

	// 			// var vetor = data.split("[]");
	// 			// var subvetor = [];
	// 			for (var i = 0; i < vetor.length; i++) {
	// 				subvetor = vetor[i].split(",");

	// 				id_orcamento = subvetor[0];
	// 				descricao_orcamento = subvetor[1];
	// 				cliente_site_id = subvetor[2];
	// 				data_lanc_orcamento = subvetor[3];
	// 				bool_ativo_orcamento = subvetor[4];

	// 				telaCadastroOrcamento += "<tr>";
					
	// 				telaCadastroOrcamento +="<td align='center'>";
	// 				telaCadastroOrcamento +=	"<a href='#' style='color: #f0ad4e;' onclick='chamarMoldalEditarOrcamento("+id_orcamento+", \""+descricao_orcamento+"\")'>";
	// 				telaCadastroOrcamento +=	 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
	// 				telaCadastroOrcamento +=	"</a>";
	// 				telaCadastroOrcamento +="</td>";

	// 				telaCadastroOrcamento += "<td>"+descricao_orcamento+"</td>";
	// 				telaCadastroOrcamento += "</tr>";
	// 			}
	// 			telaCadastroOrcamento += "</table>";
	// 		}
	// 		$("#listaOrcamentoCadastradosCrud").html(telaCadastroOrcamento);
	// 	});
	// }


	// function chamarMoldalEditarOrcamento(id, descricao){
	// 	$("#descricaoOrcamentoAltera").val(descricao);
	// 	$("#idOrcamentoAltera").val(id);
	// 	document.getElementById('alterarOrcamento').style.display='block';
	// }


	// function altualizarOrcamento(){
	// 	if ($("#descricaoOrcamentoAltera").val() != "") {
	// 		$.ajax({
	// 			url:'controllers/atualiza_orcamentoController.php',
	// 			type: 'POST',
	// 			dataType: 'text',
	// 			data: {
	// 				'descricao_orcamento': $("#descricaoOrcamentoAltera").val(),
	// 				'cliente_site_id': $("#cliente_site_id").val(),
	// 				'data_lanc_orcamento': 1,
	// 				'bool_ativo_orcamento': 1,
	// 				'id_orcamento': $("#idOrcamentoAltera").val()
	// 			}
	// 		}).done( function(data){
	// 			// console.log("altualizarOrcamento (data): "+data);
	// 			alert("Alterado com sucesso!");
	// 			listarOrcamentoCrud();
	// 			document.getElementById('alterarOrcamento').style.display='none';
	// 		});	
	// 	}
	// 	else alert("Preencha todos os dados!");
	// }


	// function mostrarConteudoOrcamento(param){
	// 	document.getElementById('orcamento').style.display='block';
	// 	if (param == "linkAddOrcamento") {
	// 		document.getElementById('cliarOrcamentoDiv').style.display='block';
	// 		document.getElementById('adicionarOracamentoDiv').style.display='none';
	// 		document.getElementById('StatusOrcamentoDiv').style.display='none';

	// 		document.getElementById('linkAddOrcamento').className = "nav-link active";
	// 		document.getElementById('linkAddItemOrcamento').className = "nav-link";
	// 		document.getElementById('linkStatusOrcamento').className = "nav-link";
	// 	} else 
	// 	if (param == "linkAddItemOrcamento") {
	// 		document.getElementById('cliarOrcamentoDiv').style.display='none';
	// 		document.getElementById('adicionarOracamentoDiv').style.display='block';
	// 		document.getElementById('StatusOrcamentoDiv').style.display='none';

	// 		document.getElementById('linkAddOrcamento').className = "nav-link";
	// 		document.getElementById('linkAddItemOrcamento').className = "nav-link active";
	// 		document.getElementById('linkStatusOrcamento').className = "nav-link";
	// 	} else 
	// 	if (param == "linkStatusOrcamento") {
	// 		chamar_jk_comboDataList(0,"");
	// 		document.getElementById('cliarOrcamentoDiv').style.display='none';
	// 		document.getElementById('adicionarOracamentoDiv').style.display='none';
	// 		document.getElementById('StatusOrcamentoDiv').style.display='block';

	// 		document.getElementById('linkAddOrcamento').className = "nav-link";
	// 		document.getElementById('linkAddItemOrcamento').className = "nav-link";
	// 		document.getElementById('linkStatusOrcamento').className = "nav-link active";
	// 	}
	// 	$("#listaItensDoOrcamento").html("<h3>Nenhum registro encontrado!</h3>");
	// 	listarOrcamentoCrud();
	// }

	// function chamar_jk_comboDataList(idItem, descricaoItem){
	// 	jk_comboDataList(
	// 		"Orcamento", "funcoes_orcamentoController", 
	// 		{
	// 			'pequisa_orcamento_grade': true,
	// 			'tabela': "cliente_site",
	// 			'id': $("#cliente_site_id").val()
	// 		}, "orcamento_id", 
	// 		[ "1","2","3","4","5" ], 
	// 		0, [1], "", "orcamentoDiv", "", 4
	// 	);
	// 	jk_comboDataList(
	// 		"Orcamento", "funcoes_orcamentoController", 
	// 		{
	// 			'pequisa_orcamento_grade': true,
	// 			'tabela': "cliente_site",
	// 			'id': $("#cliente_site_id").val()
	// 		}, "orcamento_itens_lista", 
	// 		[ "1","2","3","4","5" ], 
	// 		0, [1], "", "listaOrcamneto", "listarItensOrcamento(this.value)", 4
	// 	);
	// 	if (idItem == 0) {
	// 		jk_comboDataList(
	// 			"Item", "funcoes_itemController", 
	// 			{
	// 				'pequisa_item': true
	// 			}, "item_id", 
	// 			[ "1","2","3","4","5","6","7","8" ], 
	// 			0, [1], "", "comboItemDiv", "", 7
	// 		);
	// 	} else {
	// 		jk_comboVlrPreDataList(
	// 			"Item", "funcoes_itemController", 
	// 			{
	// 				'pequisa_item': true
	// 			}, "item_id", 
	// 			[ "1","2","3","4","5","6","7","8" ], 
	// 			0, [1], "", "comboItemDiv", "", 7, idItem, descricaoItem
	// 		);
	// 	}
	// }
</script>


