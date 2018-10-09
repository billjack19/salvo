
<div class="col-xs-5 text-center" id="talaPedidos" style="border-left-style: solid;height: 85%;">

	<div class="bloco" id="pedidoConteudo" >

		<div class="btnBusca col-xs-5 tamanhoDivCabecarrioPedido">
			<input type="date" id="dataPedidos" class="form-control" style="margin-bottom: 15px;" onchange="montarListaPedido($('#filial').val());">
			<script type="text/javascript">
				$("#dataPedidos").val(pegarData());
			</script>
			<input type="number" class="form-control" id="pesquisaPedido" placeholder="Pesquisa..." onkeyup="montarListaPedido($('#filial').val());" onfocus="mostrarTecladoNum();">
		</div>
		<br><br><br><br>
		<div class="col-xs-5" style="padding-left: 0px;padding-right: 50px;margin-left: 0px;">
			<table class="table" style="position: fixed;width: 40%;">
				<tr bgcolor="white">
					<td style="width: 20%"><b>Pedido</b></td>
					<td style="width: 30%"><b>Cliente</b></td>
					<td style="width: 20%"><b>Valor</b></td>
					<td style="width: 15%">
						<!-- <b>Editar</b> -->
					</td>
					<!-- <td style="width: 15%"> -->
						<!-- <b>Concluir</b> -->
					<!-- </td> -->
				</tr>
			</table>
		</div>
		<br><br>

		<div id="conteudoPedidosTabela">
			<h4>Carregando&nbsp;&nbsp;&nbsp;<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></h4>
			<!-- <table class="table"></table>	 -->
		</div>
		
		<br><br>

		<!-- Legenda -->
		<div class="rodapeLegenda" style="width: 40%; background-color: white;" >
			<div class="col-xs-12">
				<table class="table" style="padding: 0px;">
					<tr>
						<td style="padding: 0px;">
							<b>Concluido</b>
						</td>
						<td style="padding: 0px;">
							<span class="legenda" style="background-color: #5cb85c">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
						</td>
						<td style="padding: 0px;">
							<b>Em aberto</b>
						</td>
						<td style="padding: 0px;">
							<span class="legenda" style="background-color: #428bca">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
						</td>
					</tr>
					<tr>
						<td style="padding: 0px;">
							<b>Cancelado</b>
						</td>
						<td style="padding: 0px;">
							<span class="legenda" style="background-color: #f0ad4e">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
						</td>
						<td style="padding: 0px;">
							<b>Não Finalizado</b>
						</td>
						<td style="padding: 0px;">
							<span class="legenda" style="background-color: #d9534f">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</span>
						</td>
					</tr>
				</table>


				<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				

				<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				<!-- &nbsp;&nbsp;&nbsp;&nbsp;
				<span class="legenda" style="background-color: #428bca">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</span>

				&nbsp;&nbsp;&nbsp;&nbsp; -->
				
				<!-- &nbsp;&nbsp;<b>Teste</b>&nbsp;&nbsp;
				<span class="legenda" style="background-color: #5bc0de">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</span> -->
				<!-- &nbsp;&nbsp;<b>Não Finalizado</b>&nbsp;&nbsp; -->
				
			</div>
			<!-- <div class="col-xs-2">
				<a >
					<img src="img/calculadora.png" height="50px;">
				</a>
			</div> -->
		</div>
	</div>
</div>

<style type="text/css">
	.tamanhoDivCabecarrioPedido{
		padding-left: 0px;
		padding-right: 50px;
		margin-left: 0px;
		margin-right: 15px;
	}
	.rodapeLegenda {
		font-size: 20px;
		padding-top: 10px;
		position: fixed;
		height: 72px;
		bottom: 0px;
		width: 100%;
	}
	.bloco{
		bottom: 0px;
		height: 98%;
		overflow: auto;
	}
	.btnBusca{
		/*width: 35%;*/
		position: fixed;
		background-color: white;
		padding-left: 2%;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-right: 3%;
	}
</style>