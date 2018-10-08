<?php

$classeName = $nomeTabela."DAO";
$classeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));


$parametros_I = "";
$parametros_U = "";

$colunasCadastro = "";
$parametrosCadatro = "";
$parametrosAtualiza = "";
$prefixo = "";

$virgulaParamentros = "";

$colunas = explode(",/,",$colunas);
$arrayColunas = [];


$descricaoNotificacao = "";
$descricaoNotificacaoAtualizacao = "";
$usuarioAtuador = "";
$nomeUsado = "";
$comcatenacaoDescricacaoNotificacao = "";


for ($i=0; $i < count($colunas); $i++) { 
	$arrayColunas = explode("+", $colunas[$i]);
	$prefixo = explode("_", $arrayColunas[0]);
	$sufixo = $prefixo[sizeof($prefixo) - 1];
	$prefixo = $prefixo[0];
	$nomeUsado = $arrayColunas[0];
	

	if ($arrayColunas[1] != "CURRENT_TIMESTAMP" && $arrayColunas[1] != "CURRENT_TIMESTAMP(1)") {
		$virgulaParamentros = $i != (count($colunas) - 1) ? ", " : "";


		// Configuração do Úsuario atuador para registrar notificação
		if ($arrayColunas[0] == TAB_LOGIN."_id") {
			$usuarioAtuador = "\$usuarioAtuador = \$entidade".$classeEntidade."->get('".$arrayColunas[0]."');";
		}

		
		$comcatenacaoDescricacaoNotificacao = $descricaoNotificacao == "" ? "" : ".";

		
		// Configuração da descrição que será escrita na notificação
		if ($sufixo == "id") {

			// Descrição para cadastro
			$descricaoNotificacao .= "
		\$descricaoNotificacao ".$comcatenacaoDescricacaoNotificacao."= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", str_replace("_id", "", $nomeUsado)))." => /%/SELECT * FROM ".str_replace("_id", "", $nomeUsado)." WHERE id_".str_replace("_id", "", $nomeUsado)." = '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'/%/<br>';";



			// Descrição para Atualização
			$descricaoNotificacaoAtualizacao .= "
			if (\$dados['".$arrayColunas[0]."'] != \$entidade".$classeEntidade."->get('".$arrayColunas[0]."')) {
				\$descricaoNotificacao .= '<b style=\"color: red\">".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", str_replace("_id", "", $nomeUsado))).": /%/SELECT * FROM ".str_replace("_id", "", $nomeUsado)." WHERE id_".str_replace("_id", "", $nomeUsado)." = '.\$dados['".$arrayColunas[0]."'].'/%/ => /%/SELECT * FROM ".str_replace("_id", "", $nomeUsado)." WHERE id_".str_replace("_id", "", $nomeUsado)." = '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'/%/</b><br>';
				\$controleAteracao++;
			}
			else {
				\$descricaoNotificacao .= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", str_replace("_id", "", $nomeUsado)))." => /%/SELECT * FROM ".str_replace("_id", "", $nomeUsado)." WHERE id_".str_replace("_id", "", $nomeUsado)." = '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'/%/<br>';
			}";
		}

		else if ($prefixo == "bool") {
			$nomeUsado = str_replace("bool_", "", $arrayColunas[0]);
			
			// Descrição para Cadastro
			$descricaoNotificacao .= "
		\$descricaoBool = \$entidade".$classeEntidade."->get('".$arrayColunas[0]."') == 1 ? \"Sim\" : \"Não\";
		\$descricaoNotificacao ".$comcatenacaoDescricacaoNotificacao."= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.\$descricaoBool.'<br>';";



			// Descrição para atualização
			$descricaoNotificacaoAtualizacao .= "
			if (\$dados['".$arrayColunas[0]."'] != \$entidade".$classeEntidade."->get('".$arrayColunas[0]."')) {
				\$descricaoBool = \$entidade".$classeEntidade."->get('".$arrayColunas[0]."') == 1 ? \"Sim\" : \"Não\";
				\$descricaoBool2 = \$dados['".$arrayColunas[0]."'] == 1 ? \"Sim\" : \"Não\";
				\$descricaoNotificacao .= '<b style=\"color: red\">".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado)).": '.\$descricaoBool2.' => '.\$descricaoBool.'</b><br>';
				\$controleAteracao++;
			}
			else {
				\$descricaoBool = \$entidade".$classeEntidade."->get('".$arrayColunas[0]."') == 1 ? \"Sim\" : \"Não\";
				\$descricaoNotificacao .= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.\$descricaoBool.'<br>';
			}";
		}

		else if($arrayColunas[2] == "date" || $arrayColunas[2] == "datetime"){

			// Descrição para cadastro
			$descricaoNotificacao .= "
		\$descricaoNotificacao ".$comcatenacaoDescricacaoNotificacao."= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.formataData(\$entidade".$classeEntidade."->get('".$arrayColunas[0]."')).'<br>';";



			// Descrição para Atualização
			$descricaoNotificacaoAtualizacao .= "
			if (\$dados['".$arrayColunas[0]."'] != \$entidade".$classeEntidade."->get('".$arrayColunas[0]."')) {
				\$descricaoNotificacao .= '<b style=\"color: red\">".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado)).": '.formataData(\$dados['".$arrayColunas[0]."']).' => '.formataData(\$entidade".$classeEntidade."->get('".$arrayColunas[0]."')).'</b><br>';
				\$controleAteracao++;
			}
			else {
				\$descricaoNotificacao .= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'<br>';
			}";

		}

		else {

			// Descrição para cadastro
			$descricaoNotificacao .= "
		\$descricaoNotificacao ".$comcatenacaoDescricacaoNotificacao."= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'<br>';";



			// Descrição para Atualização
			$descricaoNotificacaoAtualizacao .= "
			if (\$dados['".$arrayColunas[0]."'] != \$entidade".$classeEntidade."->get('".$arrayColunas[0]."')) {
				\$descricaoNotificacao .= '<b style=\"color: red\">".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado)).": '.\$dados['".$arrayColunas[0]."'].' => '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'</b><br>';
				\$controleAteracao++;
			}
			else {
				\$descricaoNotificacao .= '".formatarNomeHeadTable2(str_replace('_'.$nomeTabela, "", $nomeUsado))." => '.\$entidade".$classeEntidade."->get('".$arrayColunas[0]."').'<br>';
			}";
		}



		$colunasCadastro .= $arrayColunas[0].$virgulaParamentros;
		if ($prefixo == "senha") {
			$parametros_I .= "
				':".$arrayColunas[0]."'=>\$entidade".$classeEntidade."->get('".$arrayColunas[0]."')".$virgulaParamentros;
			
			$parametrosCadatro .= "PASSWORD(:".$arrayColunas[0].")".$virgulaParamentros;
		}
		else {
			$parametros_I .= "
				':".$arrayColunas[0]."'=>\$entidade".$classeEntidade."->get('".$arrayColunas[0]."')".$virgulaParamentros;
			$parametros_U .= "
				':".$arrayColunas[0]."'=>\$entidade".$classeEntidade."->get('".$arrayColunas[0]."')".$virgulaParamentros;
			
			$parametrosCadatro .= ":".$arrayColunas[0].$virgulaParamentros;
			$parametrosAtualiza .= $arrayColunas[0]." = :".$arrayColunas[0].$virgulaParamentros;
		}
	}
}


$classeDAO = "<?php 
ob_start();
require_once \"../classe/conexao.php\";
require_once \"../controllers/funcoes_notificacoesControllerAcao.php\";

class $classeName{
	function __construct(){
		\$this->conn = new Conexao();
		\$this->pdo = \$this->conn->Connect();
	}


	function cadastra$classeEntidade($classeEntidade \$entidade$classeEntidade, \$area){

		// Configuração de notificação
		/* \$area = '$nomeTabela'; */
		$usuarioAtuador $descricaoNotificacao
		\$tipo_alteracao_notificacoes = 'i';
		registrarNotificacao(\$area, \$descricaoNotificacao, \$usuarioAtuador, \$tipo_alteracao_notificacoes, \$this->pdo);

		// Tentar gravar um novo registro
		try{
			\$param = array($parametros_I
			);
			
			\$stmt = \$this->pdo->prepare(\"INSERT INTO $nomeTabela ($colunasCadastro) VALUES ($parametrosCadatro);\"
			);
			return \$stmt->execute(\$param);
		}catch(PDOException \$ex){
			return \"Erro ao cadastrar $classeEntidade \".\$ex->getMessage();
		}
	}


	function atualiza$classeEntidade($classeEntidade \$entidade$classeEntidade, \$id, \$area){

		// Configuração de notificação
		/* \$area = '$nomeTabela'; */
		\$descricaoNotificacao = \"\";
		\$controleAteracao = 0;
		$usuarioAtuador 
		\$sql = \"SELECT * FROM $nomeTabela WHERE id_$nomeTabela = \".\$id;
		\$verifica = \$this->pdo->query(\$sql);
		foreach (\$verifica as \$dados){ $descricaoNotificacaoAtualizacao
		}
		\$tipo_alteracao_notificacoes = 'u';
		if(\$descricaoNotificacao != \"\" && \$controleAteracao != 0){
			registrarNotificacao(\$area, \$descricaoNotificacao, \$usuarioAtuador, \$tipo_alteracao_notificacoes, \$this->pdo);
		}

		// Tenta atualizar um registro exitente
		try{
			\$param = array($parametros_U
			);

			\$stmt = \$this->pdo->prepare(\"UPDATE $nomeTabela SET $parametrosAtualiza WHERE $id_tabela = \".\$id.\";\"
			);
			return \$stmt->execute(\$param);
		}catch(PDOException \$ex){
			return \"Erro ao atualizar $classeEntidade \".\$ex->getMessage();
		}
	}
}
?>";

?>