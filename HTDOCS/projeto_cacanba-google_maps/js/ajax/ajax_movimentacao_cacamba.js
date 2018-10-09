function chamarTelaMovimentacao(){
	chamarTelaOperacao();

	var id_movimentacao_cacamba = "";
	var cacamba_id = "";
	var local_entrega_id = "";
	var situacao = "";
	var titulo = "";
	var valor_total = "";
	var emissao = "";
	var entrega = "";
	var retirada = "";
	var periodo = "";
	var confirma_carreto = "";
	var observacao = "";
	var flag_entrega = "";
	var flag_recolhe = "";
	var flag_pagto = "";

	var descricao_cacamba = "";

	var endereco = "";
	var numero = "";
	var complemento = "";
	var bairro = "";
	var cidade = "";
	var uf = "";
	var cep = "";
	var cliente_id = "";
	var latitude = "";
	var longitude = "";
	var bool_ativo = "";

	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var endereco_principal = "";

	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCliente = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var cor_linha = "#fff";
	var img_situacao = "";
	var disabilitarExcluir = "disabled";
	var disabilitarSituacao = "disabled";
	var disabiletarQuitar = "disabled";

	$.ajax({
		url:'controllers/funcoes_movimentacaoController.php',
		type: 'POST',
		dataType: 'text',
		data: {
			'pequisa_movimentacao': true,
			'cnpj': $("#identificador").data("cnpj")
		}
	}).done( function(data){
		telaCadastroCliente += jk_cabecarioListagem("Movimentação de Caçamba", "comboBuscaMovimentacao", 
			  jk_button("", "success", "", "a", "telaAdicionarMovimentacao(0);", jk_icon("plus")+"&nbsp;Adicionar Movimentação")
			+ "&nbsp;&nbsp;"
			+ jk_button("", "primary", "", "v", "chamarTelePrincipal();", jk_icon("arrow-left")+"&nbsp;Voltar ao Mapa")
		);

		telaCadastroCliente += "<br>";

		telaCadastroCliente += "<div class='col-md-12'>";

		if (data == "") {
			telaCadastroCliente += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliente += "<br>";

			telaCadastroCliente += "<div class='bloco2'>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				id_movimentacao_cacamba = subvetor[0];
				cacamba_id = subvetor[1];
				local_entrega_id = subvetor[2];
				situacao = subvetor[3];
				titulo = subvetor[4];
				valor_total = subvetor[5];
				emissao = subvetor[6];
				entrega = subvetor[7];
				retirada = subvetor[8];
				periodo = subvetor[9];
				confirma_carreto = subvetor[10];
				observacao = subvetor[11];
				flag_entrega = subvetor[12];
				flag_recolhe = subvetor[13];
				flag_pagto = subvetor[14];

				descricao_cacamba = subvetor[15];

				endereco = subvetor[16];
				numero = subvetor[17];
				complemento = subvetor[18];
				bairro = subvetor[19];
				cidade = subvetor[20];
				uf = subvetor[21];
				cep = subvetor[22];
				cliente_id = subvetor[23];
				latitude = subvetor[24];
				longitude = subvetor[25];
				bool_ativo = subvetor[26];

				razao_social = subvetor[27];
				tipo = subvetor[28];
				inscricao_federal = subvetor[29];
				endereco_principal = subvetor[30];

				valor_total = formataValorParaImprimir(valor_total);

				if (situacao == 4 && flag_pagto == 1) {
					situacaoDiretaMovimentacao(id_movimentacao_cacamba, situacao, cacamba_id);
					situacao = parseInt(situacao) + 1;
				}

				situacao = flag_pagto == 0 ? situacao :
							 situacao <= 3 ? situacao : situacao + 1

				cor_linha = situacao == 1 ? "#aaaaaa" :
							situacao == 2 ? "#428bca" :
							situacao == 3 ? "#f0ad4e" :
							situacao == 4 ? "#d9534f" : "#5cb85c";

				img_situacao = 	situacao == 1 ? cacamba_vermelha :
								situacao == 2 ? cacamba_verde :
								situacao == 3 ? cacamba_vermelha :
								situacao == 4 ? cacamba_temp : cacamba_temp;

				disabilitarExcluir = situacao == 1  ? "" : "disabled";
				disabilitarSituacao = situacao < 4  ? "" : "disabled";
				disabiletarQuitar = flag_pagto == 0 ? "" : "disabled";

				tabela_cliente += jk_tr("' bgcolor='"+cor_linha+"","",
					  jk_td("left", id_movimentacao_cacamba)
					+ jk_td("left", emissao)
					+ jk_td("left", razao_social)
					// + jk_td("left", inscricao_federal)
					// + jk_td("left", telefone)
					// + jk_td("left", email)
					+ jk_td("left", endereco+", "+numero)
					+ jk_td("left", bairro)
					+ jk_td("left", cidade+", "+uf)
					+ jk_td("left", descricao_cacamba)
					+ jk_td("left", valor_total)
					+ jk_td("left",  
						jk_buttonComplemento("", "", "", "", "telaAdicionarMovimentacao("+id_movimentacao_cacamba+");", 
							jk_icon("pencil"), "style='color:#f0ad4e;' ")
					)
					+ jk_td("left",  
						jk_buttonComplemento("", "", "", "", "situacaoMovimentacao("+id_movimentacao_cacamba+", "+situacao+", "+cacamba_id+");", 
							jk_img(img_situacao, "100%", "auto"), disabilitarSituacao)
					)
					+ jk_td("left",  
						jk_buttonComplemento("", "", "", "", "excluirMovimentacao("+id_movimentacao_cacamba+", "+cacamba_id+");", 
							jk_icon("times"), "style='color:red' "+disabilitarExcluir)
					)
					 + jk_td("center",  
						jk_buttonComplemento("", "", "", "", "chamarLinkTelaComprovante("+id_movimentacao_cacamba+");", 
							jk_icon("print"), "style='color:blue;'")
					)
					+ jk_td("center",  
						jk_buttonComplemento("", "", "", "", "quitarMovimentacao("+id_movimentacao_cacamba+");", 
							jk_icon("money"), "style='color:#5cb85c;' "+disabiletarQuitar)
					)
				);
			}
			telaCadastroCliente += jk_table("table", "0",
				jk_tr("","",
					  jk_td("left", "Pedido")
					+ jk_td("left", "Emissão")
					+ jk_td("left", "Cliente")
					+ jk_td("left", "Endereço")
					+ jk_td("left", "Bairro")
					+ jk_td("left", "Cidade/UF")
					+ jk_td("left", "Caçamba")
					+ jk_td("left", "Valor")
					+ jk_td("left", "Editar")
					+ jk_td("left", "Situação")
					+ jk_td("left", "Excluir")
					+ jk_td("left", "Comprovate")
					+ jk_td("left", "Quitar")
				) + tabela_cliente
			);
			telaCadastroCliente += jk_table("' style='margin-left:15px;'", "0",
				jk_tr("","",
					  jk_td("left", jk_div("", "legenda", "style='background-color: #aaaaaa;'", ""))
					+ jk_td("left", "&nbsp;&nbsp;Temporaria&nbsp;&nbsp;&nbsp;")
					+ jk_td("left", jk_div("", "legenda", "style='background-color: #428bca;'", ""))
					+ jk_td("left", "&nbsp;&nbsp;Ocupada&nbsp;&nbsp;&nbsp;")
					+ jk_td("left", jk_div("", "legenda", "style='background-color: #f0ad4e;'", ""))
					+ jk_td("left", "&nbsp;&nbsp;Retirar&nbsp;&nbsp;&nbsp;")
					+ jk_td("left", jk_div("", "legenda", "style='background-color: #d9534f;'", ""))
					+ jk_td("left", "&nbsp;&nbsp;Falta Pagamento&nbsp;&nbsp;&nbsp;")
					+ jk_td("left", jk_div("", "legenda", "style='background-color: #5cb85c;'", ""))
					+ jk_td("left", "&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;")
				)
			);
			telaCadastroCliente += "</div>";	
		}
		telaCadastroCliente += "</div>";
		$("#areaOperacao").html(telaCadastroCliente);
		montarComboBuscaMovimentacao();
	});
}

function telaAdicionarMovimentacao(id){
	var id_movimentacao_cacamba = "";
	var cacamba_id = "";
	var local_entrega_id = "";
	var situacao = "";
	var titulo = "";
	var valor_total = "";
	var emissao = "";
	var entrega = "";
	var retirada = "";
	var periodo = "";
	var confirma_carreto = "";
	var observacao = "";
	var flag_entrega = "";
	var flag_recolhe = "";
	var flag_pagto = "";

	var descricao_cacamba = "";

	var endereco = "";
	var numero = "";
	var complemento = "";
	var bairro = "";
	var cidade = "";
	var uf = "";
	var cep = "";
	var cliente_id = "";
	var latitude = "";
	var longitude = "";
	var bool_ativo = "";

	var razao_social = "";
	var tipo = "";
	var inscricao_federal = "";
	var endereco_cliente = "";


	chamarTelaOperacao();
	var telaAdicionaCliente = "";
	if (id == 0) {
		telaAdicionaCliente += jk_cabecarioFormulario("Cadastrar Movimentação", "v", "chamarTelaMovimentacao();");
	} else {
		telaAdicionaCliente += jk_cabecarioFormulario("Editar Movimanteção", "v", "chamarTelaMovimentacao();");
	}

	telaAdicionaCliente += "<div class='form-group bloco'>";

	telaAdicionaCliente += jk_romDiv(
			  jk_div("", "col-md-6", "", 
				jk_label("Caçamba", 1) + jk_div("comboCacambaMov", "", "", "")
			)
			+ jk_div("", "col-md-6", "", 
				jk_div("conteudoPedido", "", "", "")
			)
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
			jk_div("", "col-md-6", "", 
				jk_label("Cliente", 1) + jk_div("comboClienteMov", "", "", "")
			) + 
			jk_div("", "col-md-6", "", 
				jk_label("Local de Entrega", 1) + jk_div("comboLocalEntregaMov", "", "", 
					jk_inputSimples("", "Selecione Cliente", 1)
				)
			)
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
		  jk_campoNumFormulario("6", 	"Valor Total",	1, "",	"valor_total_cadastro")
		+ jk_campoFormulario("6", 		"Observação", 	0, "",	"observacao_cadastro")
	);
	telaAdicionaCliente += "<br>";
	telaAdicionaCliente += jk_romDiv(
		  jk_campoNumFormulario("4", 		"Periodo",				1, 1,			"periodo_cadastro\' onkeyup=\'calcDataPeridoLocacao()")
		+ jk_campoDataFormulario("4", 		"Data de Entrega", 		1, pegarData(),	"entrega_cadastro\' onchange=\'calcDataPeridoLocacao()")
		+ jk_campoDataFormulario("4", 		"Data de Retirada", 	1, "",			"retira_cadastro\' disabled=\'true")
	);
	telaAdicionaCliente += "<br><br>";
	telaAdicionaCliente += "	<div class='col-md-12 text-center'>";
	telaAdicionaCliente += "		<div class='form-item'>";
	telaAdicionaCliente += jk_button("", "info", "", "", "chamarTelaMovimentacao();", jk_icon("arrow-left")+"&nbsp;Voltar para Movimentação de Caçamaba");
	telaAdicionaCliente += "&nbsp;";
	if (id != 0) {
		telaAdicionaCliente += jk_button("", "success", "", "s", "operacaoMovimentação("+id+");", jk_icon("floppy-o")+"&nbsp;Atualizar");
		telaAdicionaCliente += jk_button("", "primary", "", "", "chamarLinkTelaComprovante("+id+");", jk_icon("print")+"&nbsp;Imprimir");
	} else {
		telaAdicionaCliente += jk_button("", "success", "", "s", "operacaoMovimentação(0);", jk_icon("floppy-o")+"&nbsp;Gravar");
		telaAdicionaCliente += "<br><br>";
	}
	telaAdicionaCliente += "		</div>";
	telaAdicionaCliente += "	</div>";

	telaAdicionaCliente += "</div>";

	$("#areaOperacao").html(telaAdicionaCliente);
	if (id == 0) {
		montarComboCacambaMovimentacao(0, "");
		montarComboClienteMovimentacao(0, "");
	} else {
		$.ajax({
			url:'controllers/funcoes_movimentacaoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'pequisa_movimentacao_id': true,
				'id': id
			}
		}).done( function(data){
			var vetor = data.split(",");

			id_movimentacao_cacamba = vetor[0];
			cacamba_id = vetor[1];
			local_entrega_id = vetor[2];
			situacao = vetor[3];
			titulo = vetor[4];
			valor_total = vetor[5];
			emissao = vetor[6];
			entrega = vetor[7];
			retirada = vetor[8];
			periodo = vetor[9];
			confirma_carreto = vetor[10];
			observacao = vetor[11];
			flag_entrega = vetor[12];
			flag_recolhe = vetor[13];
			flag_pagto = vetor[14];

			descricao_cacamba = vetor[15];

			endereco = vetor[16];
			numero = vetor[17];
			complemento = vetor[18];
			bairro = vetor[19];
			cidade = vetor[20];
			uf = vetor[21];
			cep = vetor[22];
			cliente_id = vetor[23];
			latitude = vetor[24];
			longitude = vetor[25];
			bool_ativo = vetor[26];

			razao_social = vetor[27];
			tipo = vetor[28];
			inscricao_federal = vetor[29];
			endereco_cliente = vetor[30];

			montarComboCacambaMovimentacao(cacamba_id, descricao_cacamba);
			montarComboClienteMovimentacao(cliente_id, razao_social);
			montarComboLocalEntregaLocalEntrega(cliente_id, local_entrega_id, endereco+", "+numero);

			$("#observacao_cadastro").val(observacao);
			$("#valor_total_cadastro").val(valor_total);
			$("#entrega_cadastro").val(entrega);
			$("#retira_cadastro").val(retirada);
			$("#periodo_cadastro").val(periodo);
			$("#conteudoPedido").html("<h3><b>Pedido:</b> "+id_movimentacao_cacamba+"</h3>");

			if (flag_pagto == 1) { document.getElementById("valor_total_cadastro").disabled = true; }
			if (situacao != 1) { document.getElementById("entrega_cadastro").disabled = true; }
			if (situacao  > 3) { document.getElementById("periodo_cadastro").disabled = true; }
		});
	}
	calcDataPeridoLocacao();
}

function calcDataPeridoLocacao(){
	var valor = $("#periodo_cadastro").val();
	if (valor != "") {
		if (valor >= 0) {
			var dataInicial = moment($("#entrega_cadastro").val());
			if (dataInicial.diff(pegarData(), 'days', true) >= 0) {
				dataInicial = dataInicial.add(valor, 'd').format('YYYY-MM-DD');
				$("#retira_cadastro").val(dataInicial);	
			} else {
				$("#entrega_cadastro").val(pegarData());
				jk_toasth('error', 'Não é permitido data anterior á data atual!');
				calcDataPeridoLocacao();
			}
		} else {
			$("#periodo_cadastro").val(1);
			calcDataPeridoLocacao();
		}
	}
}

function operacaoMovimentação(id){
	var cacamba_id = $("#cacambaInputListMov").val();
	var local_entrega_id = $("#localEntregaCInputListMov").val();
	var valor_total = $('#valor_total_cadastro').val();
	var observacao =  $("#observacao_cadastro").val();
	var entrega = $("#entrega_cadastro").val();
	var retirada = $("#retira_cadastro").val();
	var periodo = $("#periodo_cadastro").val();

	var titulo = "Caçamba: "+$("#cacambaInputListMov-flexdatalist").val();
	titulo += "\nCliente: "+$("#clienteInputListMov-flexdatalist").val();
	titulo += "\nLocal de Entrega: "+$("#localEntregaCInputListMov-flexdatalist").val();
	titulo += "\nValor Total: "+formataValorParaImprimir(valor_total);
	titulo += "\nObservação: "+observacao;

	var dataHora = pegaDataHoraForm();
	dataHora = dataHora.replace(":", "-");
	dataHora = dataHora.replace(":", "-");

	if (
			cacamba_id == "" 
		|| 	local_entrega_id == ""
		|| 	valor_total == "" 
		|| 	entrega == ""
		|| 	retirada == ""
		|| 	periodo == ""
	) jk_toasth('error', "Por favor! Preencha todos os dados!");
	
	else {
		var dadosArray = [
			"cacamba_id:"+cacamba_id+":n",
			"local_entrega_id:"+local_entrega_id+":n",
			"situacao:"+1+":n",
			"titulo:"+titulo+":s",
			"valor_total:"+valor_total+":n",
			"emissao:"+dataHora+":s",
			"entrega:"+entrega+":s",
			"retirada:"+retirada+":s",
			"periodo:"+periodo+":n",
			"confirma_carreto:"+0+":n",
			"observacao:"+observacao+":s",
			"flag_entrega:"+0+":n",
			"flag_recolhe:"+0+":n",
			"flag_pagto:"+0+":n",
			"cnpj_user:"+$("#identificador").data("cnpj")+":s"
		];
		var arquivoPHP = "movimentacaoController";
		var descricaoCalback = "Cadastrado";
		if (id != 0) {
			dadosArray.push("id:"+id+":n");
			arquivoPHP = "editar_movimentacaoController";
			descricaoCalback = "Atualizado";
		}
		dadosArray = converterArrayParaJson(dadosArray);
		dadosArray.emissao = dadosArray.emissao.replace("-", ":");
		dadosArray.emissao = dadosArray.emissao.replace("-", ":");
		$.ajax({
			url:'controllers/'+arquivoPHP+'.php',
			type: 'POST',
			dataType: 'html',
			data: dadosArray
		}).done( function(data){
			if (data != 0) {
				diponibilidadeCacamba(cacamba_id, 0);
				jk_toasth('success', descricaoCalback+" com sucesso!");
				chamarTelaMovimentacao();
				chamarLinkTelaComprovante(data);
			}else {
				jk_toasth('error', descricaoCalback+" falhou!");
			}
		});
	}
}

function excluirMovimentacao(id, cacamba_id){
	bootbox.confirm({
		title: "Tem certeza que deseja excluir movimentação?",
		message: "Ao aperta o botão \"Sim\" você irá excluir este registro do sistema!",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				$.ajax({
					url:'controllers/funcoes_movimentacaoController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						"excluir_movimentacao": true,
						"id": id
					}
				}).done( function(data){
					if (data != 0) {
						jk_toasth('info', "Movimentação excliuda com sucesso!");
						diponibilidadeCacamba(cacamba_id, 1);
						chamarTelaMovimentacao();
					}else {
						jk_toasth('error', "Erro ao tentar excluir movimentação!");
					}
				});
			}
		}
	});
}

function situacaoMovimentacao(id, situacao, cacamba_id){
	bootbox.confirm({
		title: "Tem certeza que deseja alterar a situação da movimentação?",
		message: "Ao aperta o botão \"Sim\" você irá alterar a situação!",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				situacaoDiretaMovimentacao(id, situacao, cacamba_id);
				jk_toasth('success', "Movimentação alterada com sucesso!");
			}
		}
	});
}

function situacaoDiretaMovimentacao(id, situacao, cacamba_id){
	situacao = parseInt(situacao) + 1;
	$.ajax({
		url:'controllers/funcoes_movimentacaoController.php',
		type: 'POST',
		dataType: 'html',
		data: {
			"situacao_movimentacao": true,
			"id": id,
			"situacao": situacao
		}
	}).done( function(data){
		// console.log(data);
		if (data != 0) {
			if (situacao > 3) {
				diponibilidadeCacamba(cacamba_id, 1);
			}
			chamarTelaMovimentacao();
		}else {
			jk_toasth('error', "Erro ao tentar alterar movimentação!");
		}
	});
}

function diponibilidadeCacamba(id, disponivel){
	$.ajax({
		url:'controllers/funcoes_cacambaController.php',
		type: 'POST',
		dataType: 'html',
		data: {
			"diponivel_cacamba": true,
			"id": id,
			"diponivel": disponivel
		}
	}).done( function(data){ /*console.log(data)*/ });
}

function quitarMovimentacao(id){
	bootbox.confirm({
		title: "Tem certeza que deseja quitar movimentação?",
		message: "Ao aperta o botão \"Sim\" você irá alterar a condição de pagamento!",
		buttons: {
			confirm: {
				label: 'Sim',
				className: 'btn-success'
			},
			cancel: {
				label: 'Não',
				className: 'btn-danger'
			}
		},
		callback: function (result) {
			if (result) {
				$.ajax({
					url:'controllers/funcoes_movimentacaoController.php',
					type: 'POST',
					dataType: 'html',
					data: {
						"quitar_movimentacao": true,
						"id": id
					}
				}).done( function(data){
					// console.log(data);
					if (data != 0) {
						jk_toasth('success', "Movimentação alterada com sucesso!");
						chamarTelaMovimentacao();
					}else {
						jk_toasth('error', "Erro ao tentar alterar movimentação!");
					}
				});
			}
		}
	});
}



function chamarLinkTelaComprovante(id){
	$.ajax({
		url:'controllers/funcoesController.php',
		type: 'POST',
		dataType: 'html',
		data: {
			'flagImspressoMov': true,
			'id': id
		}
	}).done( function(data){
		// console.log("editar: data = "+data);
		if (data == 1) {
			window.open('http://localhost/projeto_cacanba-google_maps/dompdf_gerar/comprovate.php?id='+id, '_blank');
		} else {
			jk_toasth('error', "Falha ao tentar imprimir!");
		}
	});
	
}


function montarComboBuscaMovimentacao(){
	jk_comboDataList(
		"Movimentação de Caçamba", "funcoes_movimentacaoController", 
		{
			'pequisa_movimentacao': true,
			'cnpj': $("#identificador").data("cnpj")
		}, "movimentacaoInputList", 
		[ "1","2","3","4","5" ],
		0, [0], "b", "comboBuscaMovimentacao", "telaAdicionarMovimentacao(this.value);", 0
	);
}

function montarComboCacambaMovimentacao(param, descricao){
	if (param == 0) {
		jk_comboDataList(
				"Sem Caçamba", "funcoes_cacambaController", 
				{
					'pequisa_cacamba_disponivel': true,
					'cnpj': $("#identificador").data("cnpj")
				}, "cacambaInputListMov", 
				[ "1","2" ],
				0, [1], "i", "comboCacambaMov", "", 0
			);
	} else {
		jk_comboVlrPreDataList(
				"Caçamba", "funcoes_cacambaController", 
				{
					'pequisa_cacamba_disponivel': true,
					'cnpj': $("#identificador").data("cnpj")
				}, "cacambaInputListMov", 
				[ "1","2" ],
				0, [1], "i", "comboCacambaMov", "", 0, param, descricao
			);
	}
	
	$('#movimentacaoInputList-flexdatalist').focus();
}

function montarComboClienteMovimentacao(param, descricao){
	if (param == 0) {
		jk_comboDataList(
				"Cliente", "funcoes_clienteController", 
				{
					'pequisa_cliente': true,
					'cnpj': $("#identificador").data("cnpj")
				}, "clienteInputListMov", 
				[ "1","2","3","4","5" ],
				0, [1], "", "comboClienteMov", "montarComboLocalEntregaLocalEntrega(this.value, 0, \"\");", 4
			);
	} else {
		jk_comboVlrPreDataList(
				"Cliente", "funcoes_clienteController", 
				{
					'pequisa_cliente': true,
					'cnpj': $("#identificador").data("cnpj")
				}, "clienteInputListMov", 
				[ "1","2","3","4","5" ],
				0, [1], "", "comboClienteMov", "montarComboLocalEntregaLocalEntrega(this.value, 0, \"\");", 4, param, descricao
			);
	}
	
}

function montarComboLocalEntregaLocalEntrega(id_cliente, param, descricao){
	if (id_cliente != 0) {
		if (param == 0) {
			jk_comboDataList(
				"Local de Entrega", "funcoes_localEntregaController", 
				{
					'pequisa_local_entrega': true,
					'id_cliente': id_cliente
				}, "localEntregaCInputListMov", 
				[ "1","2","3","4","5","6","7","8","9","10","11","12" ],
				0, [1,2], "", "comboLocalEntregaMov", "", 11
			);
		} else {
			jk_comboVlrPreDataList(
				"Local de Entrega", "funcoes_localEntregaController", 
				{
					'pequisa_local_entrega': true,
					'id_cliente': id_cliente
				}, "localEntregaCInputListMov", 
				[ "1","2","3","4","5","6","7","8","9","10","11","12" ],
				0, [1,2], "", "comboLocalEntregaMov", "", 11, param, descricao
			);
		}
		
	} else {
		$("#comboLocalEntregaMov").html(jk_inputSimples("", "Selecione Cliente", 1));
	}
}