<?php include("instanciaComponente.php");


        $assinaturaEmail = '<table>' .
                           '<br/><br/>' .
                           '<tr>' .
                           '<td style="font-family:arial; font-size:11px; text-align:center" valign="top">' .
                           '<a href="http://www.tecnospeed.com.br/" target="_blank">' .
                           '<img src="http://www.tecnospeed.com.br/img/logo.jpg" border="0" />' .
                           '</a>' .
                           '<br/>' .
                           '<strong>Funcionario / Setor Funcionario</strong><br/>' .
                           '<strong>funcionario@empresa.com.br</strong> <br/><br/>' .
                           '<strong>Empresa LTDA</strong><br/>' .
                           '<strong>(99) 99 99 9999 / 9999 999 99999</strong><br/>' .
                           '<strong>Avenida Empresa, 999, Sala 999</strong><br/>' .
                           '<strong>Cidade, Estado </strong><br/>' .
                           '<strong><a href="http://www.tecnospeed.com.br/" target="_blank">Portal TecnoSpeed TI</a></strong><br/>' .
                           '<strong>Facebook </strong> <a href="https://www.facebook.com/tecnospeed/" target="_blank">Clique Aqui</a><br/>' .
                           '</td>' .
                           '<br/>' .
                           '</tr>' .
                           '</table>' ;

	try{
		$jsonEmail = $_REQUEST["dadosEmail"];
		$spdNFe->EmailServidor 		= $jsonEmail['SMTP'];					
                $spdNFe->EmailPorta 		= (int)$jsonEmail['Porta'];
                $spdNFe->EmailTimeOut 		= (int)$jsonEmail['TimeOut'];
                $spdNFe->EmailRemetente 	= $jsonEmail['Remetente'];
                $spdNFe->EmailDestinatario 	= $jsonEmail['Destinatario'];
                $spdNFe->EmailAssunto 		= $jsonEmail['Assunto'];
                $spdNFe->EmailMensagem 		= $jsonEmail['Mensagem'].$assinaturaEmail.'<br/><br/>'."Enviado pela demonstracao de PHP com o componente NF-e.";
                $spdNFe->EmailUsuario 		= $jsonEmail['Usuario'];
                $spdNFe->EmailSenha 		= $jsonEmail['Senha'];
        
                if ($jsonEmail['Autenticacao'] = "true"){
                	$spdNFe->EmailAutenticacao = true;
                }else{
                	$spdNFe->EmailAutenticacao = false;
                }
                if ($jsonEmail['EmailHTML'] = "true"){
                	$spdNFe->EmailConteudoHtml = true;	
                }else{
                        	$spdNFe->EmailConteudoHtml = false;
                }        
                $spdNFe->EnviarNotaDestinatario(str_replace("-nfe.xml","",$jsonEmail['ChaveNota']),"","");        
                echo "E-mail enviado à: ".$jsonEmail['Destinatario']." com sucesso!";
	}catch(Exception $e){
	       echo $e;
	}
unset($spdNFe); //Destroi a instancia da NFeX.dll
unset($spdNFeDataSets); //Destroi a instancia daNfeDataSetX.dll
?>