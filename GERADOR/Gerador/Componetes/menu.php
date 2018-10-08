<style>
body {
	font-family: "Lato", sans-serif;
}

.sidenav {
	height: 100%;
	width: 0;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #111;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top: 60px;
}

.sidenav a {
	padding: 4px 4px 4px 16px;
	text-decoration: none;
	font-size: 20px;
	color: #818181;
	display: block;
	transition: 0.3s;
}

.sidenav a:hover {
	color: #f1f1f1;
}

.sidenav .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Voltar a pagina Principal</a>
  <a href="views/Operacoes_Banco.php">Operações no Banco</a>
  <a href="views/CRUD_table_personalizado.php">Formulario Para CRUD table</a>
  <a href="views/Criar_Apartir_do_Padrao.php">Criar Apartir do Padrao/</a>
  <a href="views/Uploard_de_Imagem.php">Uploard de Imagem</a>
  <!-- <a href="views/Uploard_de_Imagem_icone.php">Uploard de Imagem icone</a> -->
  <a href="views/add_biblioteca.php">Adicionar Biblioteca</a>
  <a href="views/Criar_Tela_de_Login_(index.php).php">Criar Tela de Login</a>
  <a href="views/Criar_tela_Principal.php">Criar tela Principal</a>
  <a href="views/Configurar_grade.php">Configurar Grade</a>
  <a href="views/Configurar_relatorio.php">Configurar Relatório</a>
  <a href="views/Configurar_logica_negocio.php">Configurar Lógica de Negócio</a>
  <a href="views/Configurar_grade_combo.php">Configurar Grade Combo</a>
  <a href="views/PadraoTabelaExe.php">Padrão Tabela Exe</a>
  <a href="views/BackupProjeto.php">Backup Projeto</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Operações</span>

<script>
function openNav() {
	document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}
</script>
	 
