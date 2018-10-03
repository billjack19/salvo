<?php
require 'conexao.php';
$conexao = conexao::getInstance();

$sql = 'SELECT id, nome, escudo FROM times ORDER BY id DESC';
$stm = $conexao->prepare($sql);
$stm->execute();
$times = $stm->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Times de Futebol</title>
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
	</head>
<body>
      <div class="container">
      		<div class="row">
	      		<h1>Cadastro de Times</h1>
	      		<a href="cadastrar.php" class="waves-effect waves-light btn right"><i class="material-icons left">add</i> Adicionar</a>
	      	</div>	
      		<?php if(!empty($times)):?>
	        	<table class="striped">
		        <thead>
		          <tr>
		              <th>ESCUDO</th>
		              <th>NOME</th>
		              <th>AÇÃO</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php foreach($times as $time):?>
			          <tr>
			            <td><img src="img/<?= $time->escudo ?>" height='80' width='80'></td>
			            <td><?= $time->nome ?></td>
			            <td>
			            	<a href="editar.php?id=<?=$time->id?>" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i> Editar</a>
			            </td>
			          </tr>
			      <?php endforeach; ?>    
		        </tbody>
		      </table>
		    <?php else: ?>
		    	<div class="row">
					<div class="card-panel teal lighten-5">
	      				NÃO EXISTEM TIMES CADASTRADOS!
	      			</div>
		    	</div>
			<?php endif; ?>  
      </div>

	  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>