

<div class="col-xs-7" style="margin-left: -25px;margin-right: -6px;">
	<div class="col-xs-12">
		<div class="col-xs-12" style="margin-top: 15px;">
			<div id="item">
				<div class="col-xs-2">
					<span style="font-size: 25px;">Item:</span>
				</div>
				<div class="col-xs-10">
					<div class="input-group"><!-- style='width:100%' -->
						<div id="listaItensPorGrupo">
							<input type="text" id="itemAoProduto" class="form-control" value="Nenhum grupo selecionado!" disabled>
						</div>
						<span class="input-group-addon" style="padding: 0px;">
							<button onclick='montarListaItensTodos();' style="padding-top: 0px;padding-bottom: 0px;" class="btn">
								<i class='fa fa-search'></i>
							</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-4" style="margin-top: 20px;margin-bottom: 20px;">
			<!-- <button class="btn btn-block btn-primary" onclick="montarListaItensTodos();"> -->
			<!-- document.getElementById('modalAdicionarItemConfig').style.display='block' -->
				<!-- Todos os Itens -->
			<!-- </button> -->
		</div>

		<div class="col-xs-2" style="margin-top: 20px;margin-bottom: 20px;">
			<span style="font-size: 25px">Código:</span>
		</div>

		<div class="col-xs-6" style="margin-top: 20px;margin-bottom: 20px;">
			<!-- Codigo Item -->
			<div class="input-group"><!-- style='width:100%' -->
				<input type="text" id="codigoProduto" class="form-control" onfocus="document.getElementById('tecladoNumerioCodigo').style.display='block'" onkeyup="if(this.value!='')this.value= removerCaracter(this.value);">
				<span class="input-group-addon" style="padding: 0px;">
					<script type="text/javascript">
						function selecioneItemCodigoSId(){
							var itemCodigo = $("#codigoProduto").val();
							selecioneItemCodigo(itemCodigo);
						}
					</script>
					<button id="buttonPesquisaCodigoItem" onclick='selecioneItemCodigoSId();' style="padding-top: 0px;padding-bottom: 0px;" class="btn">
						<i class='fa fa-location-arrow'></i>
					</button>
				</span>
			</div>
		</div>

		<style type="text/css">
			.blocoTabelaComplementoGrupo{
				bottom: 0px;
				margin-top: -35px;
				margin-left: 1%;
				height: 550px;
				width: 100%;
				overflow: auto;
				/*border-style: solid;*/
			}
		</style>

		<div class="col-xs-12 blocoTabelaComplementoGrupo" id="gruposListaDiv"></div>
	</div>
</div>







<div id="tecladoNumerioCodigo" class="posicaoTecladoCodigo" style="display: none;"></div>
<script type="text/javascript">
	gerarTecladoNumericoCodigo();
	function gerarTecladoNumericoCodigo(){
		var teclado = "<table class='table'>";
		var num = 1;
		for (var i = 0; i < 3; i++) {
			teclado += "<tr>";
			for (var j =  0; j < 3; j++) {
				teclado += 	"<td align=\"center\">";
				teclado += 		"<button class=\"btn btn-block\" onclick=\"operacaoTecladoNumCodigo('"+num+"')\">";
				teclado +=			num;
				teclado +=		"</button>";
				teclado += 	"</td>";
				num++; /* num = num + 1 || num += 1 */
			}
			teclado += "</tr>";
		}
		teclado += 	"<tr>";
		teclado += 		"<td align=\"center\">";
		teclado += 			"<button id='apagarTextoFinaliza' class=\"btn btn-block\" onclick=\"operacaoTecladoNumCodigo('<')\">";
		teclado += 				"<i class=\"fa fa-arrow-left\"></i>";
		teclado += 			"</button>";
		teclado += 		"</td>";
		teclado += 		"<td align=\"center\">";
		teclado += 			"<button class=\"btn btn-block\" onclick=\"operacaoTecladoNumCodigo('0')\">";
		teclado +=				"0";
		teclado +=			"</button>";
		teclado += 		"</td>";
		teclado += 		"<td align=\"center\">";
		teclado += 			"<button class=\"btn btn-block\" onclick=\"concluirCodigoItem();\">";
		teclado +=				"<i class=\"fa fa-times\"></i>";
		teclado +=			"</button>";
		teclado += 		"</td>";
		teclado += 	"</tr>";
		teclado += "</table>";
		document.getElementById("tecladoNumerioCodigo").innerHTML = teclado;
	}

	function operacaoTecladoNumCodigo(valor){
		if (valor == "<") {
			valor = $("#codigoProduto").val();
			valor = valor.substring(0, valor.length - 1);
		} else {
			valor = $("#codigoProduto").val() + valor;
		}
		$("#codigoProduto").val(valor);
	}
	
	function concluirCodigoItem(){
		document.getElementById('tecladoNumerioCodigo').style.display = 'none';
	}

</script>
<style type="text/css">
	.posicaoTecladoCodigo{
		position: absolute;
		width: 23%;
		margin-top: 130px;
		margin-left: 28%;
		background-color: white;
	}
</style>

