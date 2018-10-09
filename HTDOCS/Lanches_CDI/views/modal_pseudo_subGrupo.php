<!-- ********************************************************************************************************************** -->
<!-- Janala Pseudo Modal SubGrupo -->
<!-- ********************************************************************************************************************** -->
<div class="blocoComplementoItem text-center" id="modalSubGrupo" style="display: none;">
	<div class="col-xs-12" >
		<h1 id="modalSubGrupoDescricao">Lanches</h1>
	</div>
	<div style="position: absolute; margin-left: 80%; margin-top: -80px;">
		<button onclick="document.getElementById('modalSubGrupo').style.display='none'" class="btn btn-default">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</button>
	</div>
	<div id="tabelaSubGrupoModal" class="blocoTabelaComplementoSubGrupo"></div>
</div>

<style type="text/css">
	.blocoTabelaComplementoSubGrupo{
		bottom: 0px;
		margin-top: -25px;
		margin-left: 1%;
		height: 380px;
		width: 100%;
		/*border-style: solid;*/
		overflow: auto;
	}
</style>