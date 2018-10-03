<!DOCTYPE html>
<html>
	<head>
	  <title>Cadastro</title>
	  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/> -->
	</head>
<body>
      <div class="container">
      		<h1>Cadastrar Time</h1>
      		<div class="card-panel hide">
		         <span class="blue-text text-darken-2 mensagem"></span>
		    </div>
      		<form action="" id='formulario'>
      			<input type="hidden" name="acao" value="incluir">
      			<div class="row">
					<div class="input-field center-align col s4">
					   <img src="img/padrao.gif" id='imagem' height="200" class="z-depth-2">
					</div>
					<div class="file-field input-field col s8">
					  <div class="btn">
					    <span>Imagem</span>
					    <input type="file" name="imagem">
					  </div>
					  <div class="file-path-wrapper">
					    <input class="file-path" type="text" placeholder="Escudo do Time" required>
					  </div>
					</div> 
					<div class="input-field center-align col s8"> 
					    <input id="nome" name="nome" type="text" required>
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
	  <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
	  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>