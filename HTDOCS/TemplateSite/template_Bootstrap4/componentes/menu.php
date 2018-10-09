

<nav class="navbar fixed-top navbar-expand-lg corPrincipalFundo fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.php" style="color: <?php echo $contraCorPagina; ?>;">
			<!-- CXonfiguraçã imagem  da logo no menu -->
			<?php echo $logoPagina; ?>
			<!-- <img src="img/logo/Logotipo_branca.png" height="60px;"> -->
			&nbsp;&nbsp;
			<?php echo $titulo; ?>
		</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="color: <?php echo $contraCorPagina; ?>; font-size: 30px;padding-right: 15px;padding-left: 15px;">
			<!-- <span class="navbar-toggler-icon" style="color: white;"></span> -->
			<i class="fa fa-bars" aria-hidden="true"></i>
		</button>
		<!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> -->
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="services.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Portfolio
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
						<a class="dropdown-item" href="portfolio-1-col.php">1 Column Portfolio</a>
						<a class="dropdown-item" href="portfolio-2-col.php">2 Column Portfolio</a>
						<a class="dropdown-item" href="portfolio-3-col.php">3 Column Portfolio</a>
						<a class="dropdown-item" href="portfolio-4-col.php">4 Column Portfolio</a>
						<a class="dropdown-item" href="portfolio-item.php">Single Portfolio Item</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Blog
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
						<a class="dropdown-item" href="blog-home-1.php">Blog Home 1</a>
						<a class="dropdown-item" href="blog-home-2.php">Blog Home 2</a>
						<a class="dropdown-item" href="blog-post.php">Blog Post</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Other Pages
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
						<a class="dropdown-item" href="full-width.php">Full Width Page</a>
						<a class="dropdown-item" href="sidebar.php">Sidebar Page</a>
						<a class="dropdown-item" href="faq.php">FAQ</a>
						<a class="dropdown-item" href="404.php">404</a>
						<a class="dropdown-item" href="pricing.php">Pricing Table</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>