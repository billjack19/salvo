<?php

include "../Classe/funcoes.php";

$nomeTabela = $_POST['nomeTabela'];
$id_tabela = $_POST['id_tabela'];
$colunas = $_POST['colunas'];
$colunasCadastroPost = $_POST['colunasCadastroPost'];
$projetoNome = $_POST['projetoNome'];


$classeName = $nomeTabela."DAO";
$classeEntidade = letraMaiuscula(substr($nomeTabela, 0, 1)).substr($nomeTabela, 1, strlen($nomeTabela));


$parametros = "";
$parametrosCadastro = "";
$colunasCadastro = "";
$parametrosCadatro = "";
$parametrosAtualiza = "";

$virgulaParamentros = "";

$colunas = explode(",",$colunas);
for ($i=0; $i < count($colunas); $i++) { 
	$virgulaParamentros = $i != (count($colunas) - 1) ? ", " : "";
	
	$parametros .= "
				':".$colunas[$i]."'=>\$entidade".$classeEntidade."->get('".$colunas[$i]."')".$virgulaParamentros;

	$parametrosAtualiza .= $colunas[$i]." = ':".$colunas[$i]."'".$virgulaParamentros;
}


$colunasCadastroPost = explode(",",$colunasCadastroPost);
for ($i=0; $i < count($colunasCadastroPost); $i++) { 
	$virgulaParamentros = $i != (count($colunasCadastroPost) - 1) ? ", " : "";

	$parametrosCadastro .= "
				':".$colunasCadastroPost[$i]."'=>\$entidade".$classeEntidade."->get('".$colunasCadastroPost[$i]."')".$virgulaParamentros;

	$colunasCadastro .= $colunasCadastroPost[$i].$virgulaParamentros;
	$parametrosCadatro .= "':".$colunasCadastroPost[$i]."'".$virgulaParamentros;
}



$classeDAO = "
<?php 
require_once \"../classe/conexao.php\";

class $classeName{
	function __construct(){
		\$this->conn = new Conexao();
		\$this->pdo = \$this->conn->Connect();
	}
	function cadastra$classeEntidade($classeEntidade \$entidade$classeEntidade){
		try{
			\$param = array($parametrosCadastro
			);
			
			\$stmt = \$this->pdo->prepare(\"INSERT INTO $nomeTabela ($colunasCadastro) VALUES ($parametrosCadatro);\"
			);
			return \$stmt->execute(\$param);
		}catch(PDOException \$ex){
			return \"Erro ao cadastrar $classeEntidade \".\$ex->getMessage();
		}
	}
	function atualiza$classeEntidade($classeEntidade \$entidade$classeEntidade, \$id){
		try{
			\$param = array($parametros
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

echo criarArquivo("../../GeradorProjetos/$projetoNome/app/classe/dao/$classeName.php", $classeDAO);


?>