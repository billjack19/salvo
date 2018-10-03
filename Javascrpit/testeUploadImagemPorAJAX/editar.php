<?php
require 'conexao.php';
$conexao = conexao::getInstance();

$id = (isset($_GET['id'])) ? $_GET['id'] : '';

$sql = 'SELECT id, nome, escudo FROM times WHERE id=:id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$time = $stm->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Edição</title>
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
	</head>
<body>
      <div class="container">
      		<h1>Editar Time</h1>
      		<div class="card-panel hide">
		         <span class="blue-grey-text text-darken-4 mensagem"></span>
		    </div>
      		<form action="" id='formulario'>
      			<input type="hidden" name="acao" value="editar">
      			<input type="hidden" name="escudo_atual" value="<?=$time->escudo?>">
      			<input type="hidden" name="id" value="<?=$time->id?>">

      			<div class="row">
				    <div class="input-field center-align col s4">
			           <img src="img/<?=$time->escudo?>" id='imagem' height="200" class="z-depth-2">
			        </div>
				    <div class="file-field input-field col s8">
				      <div class="btn">
				        <span>Alterar Imagem</span>
				        <input type="file" name="imagem">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path" type="text" placeholder="Escudo do Time">
				      </div>
				    </div> 
				    <div class="input-field center-align col s8"> 
			            <input id="nome" name="nome" type="text" required value="<?=$time->nome?>">
			            <label>Nome do Time</label>
			        </div>    
		      		<a href="index.php" class="waves-effect red btn"><i class="material-icons left">backspace</i> Voltar</a>
		      		<button type="submit" id='gravar' class="waves-effect waves-light btn">
		      			<i class="material-icons left">send</i> Gravar
		      		</button>
			    </div>  
			</form>
      </div>

	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>