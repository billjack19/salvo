<ul class="menubarra">
		<li>
			<a href="../principal/administrador.php">
				<i class="fa fa-home" aria-hidden="true"></i>&nbsp;
		Home
			</a>
		</li>
		<li>
			<a href="../notificacao/notificacao.php">
				<i class="fa fa-bell" aria-hidden="true"></i>&nbsp;
		Notificação
				<!-- <span class="badge badgeEstilo"> -->
				<span id="numeroNotificacao" class="label label-danger badgeEstilo">
					<?php
						include "../../_request/processaPesquisaBadges.php";
					?>
				</span>
			</a>
			<!-- class para alterar com de fundo numNot-->
		</li>
		<li><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
	Emprestimo
			<ul class="submenu-1">
				<li>
					<a href="../emprestimo/emprestimoLivro.php">
						<i class="fa fa-book" aria-hidden="true"></i>&nbsp;
				Livro
					</a>
				</li>
				<li>
					<a href="../emprestimo/agendaKit.php">
						<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
				Equipamento
					</a>
				</li>
			</ul>
		</li>
		<li><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;
	Cadastrar
			<ul class="submenu-1">
				<li>
					<a href="../cadastro/cadastro_aluno.php">
						<i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
				Aluno
					</a>
				</li>
				<li>
					<a href= "../cadastro/cadastro_funcionario.php">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;
				Funcionario
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_livros.php">
						<i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;
				Livro
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_equipamento.php";>
						<i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
				Equipamento
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_produto.php";>
						<i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;
				Produto
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_item.php">
						<i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;
				Item ao Kit
					</a>
				</li>
			</ul>
		</li>
		<li><i class="fa fa-refresh "></i>&nbsp;
	Atualiza
			<ul class="submenu-1">
				<li>
					<a href="../cadastro/cadastro_aluno.php">
						<i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;
				Aluno
					</a>
				</li>
				<li>
					<a href= "../cadastro/cadastro_funcionario.php">
						<i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;
				Funcionario
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_livros.php">
						<i class="fa fa-address-book" aria-hidden="true"></i>&nbsp;
				Livro
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_equipamento.php";>
						<i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
				Equipamento
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_produto.php";>
						<i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;
				Produto
					</a>
				</li>
				<li>
					<a href="../cadastro/cadastro_item.php">
						<i class="fa fa-tasks" aria-hidden="true"></i>&nbsp;
				Item ao Kit
					</a>
				</li>
			</ul>
		</li>
		<li><i class="fa fa-gamepad" aria-hidden="true"></i>&nbsp;
	Jogos
			<ul class="submenu-1">
				<li>
					<a href="../jogos/tetris.php">
						<i class="fa fa-heart-o" aria-hidden="true"></i>&nbsp;
				Tetris
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-ship" aria-hidden="true"></i>&nbsp;
				Batalha Naval
					</a>
				</li>
			</ul>
		</li>
		<li><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
	Ajuda
		<ul class="submenu-1">
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Cadastro
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Empréstimo
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Agendamento
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Consultas
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Atualizações
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Notificações
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Login
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;
				Servidor
					</a>
				</li>
			</ul>
		<li><i class="fa fa-times" aria-hidden="true"></i>&nbsp;
	Sair
			<ul class="submenu-1">
				<li>
					<a href="../../index.php" target="_blank" onclick="window.close();">
						<i class="fa fa-share" aria-hidden="true"></i>&nbsp;&nbsp;
				Login Out
					</a>
				</li>
			</ul>
		</li>
	</ul>
	<br><br>
	<center><h1>Biblioteca</h1></center>
	<h2 class="infoAqui"><center>Administrador</center></h2>
</div>