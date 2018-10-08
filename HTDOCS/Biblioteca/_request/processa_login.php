<?php
session_start();
require_once "../_class/Conexao2.php";


if (isset($_POST['logar'])) {

	//pegar dados do formulario
	$usuario = (trim($_POST['usuario']));
	$senha = (trim($_POST['senha']));

	if (!empty($usuario) AND !empty($senha)) {
		$conn = new Conexao();
		$pdo = $conn->Connect();

		$paran = array(
			':usuario'=>$usuario = ($_POST['usuario']),
			':senha'=>$senha = ($_POST['senha']),
			':nivel'=>$nivel = ($_POST['nivel'])
		);


		$sql = "SELECT * FROM cadastro WHERE LOGIN_CADASTRO = :usuario AND SENHA_CADASTRO = :senha AND ID_NIVEL_ACESSO = :nivel limit 1";
		
		$verifica = $pdo->prepare($sql);
		$verifica->execute($paran);

		if ($verifica->rowCount() != 0) {
			switch ($nivel) {
				case 2:
					$_SESSION["login"] = 2;
					$_SESSION["nome"] = $usuario;
					$_SESSION["frase"] = rand(1,78);
					header("Location: ../_views/principal/bibliotecaria.php");
					break;
				
				case 1:
					$_SESSION["login"] = 1;
					$_SESSION["nome"] = $usuario;
					$_SESSION["frase"] = rand(1,78);
					header("Location: ../_views/principal/administrador.php");
					break;
			}
		}
		else{
			echo "Login ou senha incorretos!";
		}
	}
	else{
		echo "Todos os campos devem ser preenchidos!";
	}
}

?>