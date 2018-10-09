function formContato(){
	var jk_config = jk_div("' style='margin-top:64px", "w3-half", "",
		jk_p(
			  jk_icon("map-marker fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;Rua Itabira, 59 - Jd. Estados, Po&ccedil;os de Caldas - MG - CEP:  37701-030"
		) + jk_p(
			  jk_icon("phone fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;Telefone: +55 35 3721-5667"
		) + jk_p(
			  jk_icon("whatsapp fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;WhatsApp: +55 35 9-8871-3321"
		) + jk_p(
			  jk_icon("envelope fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;E-mail: construtorabrothers@hotmail.com"
		) + jk_p(
			  jk_icon("envelope fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;E-mail: financeiroformat@hotmail.com"
		) + jk_p(
			  jk_icon("envelope fa-fw w3-xxlarge w3-margin-right cdi-text-vermelho-brothers")
			+ "&nbsp;E-mail: acaempreendimentos@outlook.com"
		) + "<br>" + jk_form("", "POST", "", 
			  jk_p( jk_inputCompleto("", "Nome", 		"text", 	"w3-input w3-border cdi-text-vermelho-brothers", "", "Nome", 		0, 1, 500))
			+ jk_p( jk_inputCompleto("", "Email", 		"email",	"w3-input w3-border cdi-text-vermelho-brothers", "", "E-mail", 		0, 1, 500))
			+ jk_p( jk_inputCompleto("", "Telefone", 	"tel", 		"w3-input w3-border cdi-text-vermelho-brothers", "", "Telefone", 	0, 1, 500))
			+ jk_p( jk_inputCompleto("", "Assunto", 	"text", 	"w3-input w3-border cdi-text-vermelho-brothers", "", "Assunto", 	0, 1, 500))
			+ jk_p( jk_inputCompleto("", "Mensagem", 	"text", 	"w3-input w3-border cdi-text-vermelho-brothers", "", "Mensagem", 	0, 1, 4000))
			+ jk_inputCompleto("SendMail", "SendMail", 	"hidden", 	"", "SendMail", "",	0, 1, "")
			+ jk_button("' type='submit", "", "w3-button cdi-vermelho-brothers", "", "", jk_icon("paper-plane")+"&nbsp;ENVIAR MENSAGEM")
		)
	);
	$("#conteudoContato").html(jk_config);
}