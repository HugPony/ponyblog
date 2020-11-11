<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo wp_get_document_title();?></title>
	<link href="<?php echo get_template_directory_uri(); ?>/css/vs2015.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css" rel="stylesheet">
	<?php wp_head(); ?>
	
</head>
<body>

	<div style='margin-bottom:70px'>
		
	</div>

	<!-- Hander menu part -->
	<nav class="hader-nav navbar fixed-top navbar-expand-sm navbar-light bg-light navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#"><?php bloginfo('title'); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">	
				<ul class="navbar-nav mr-auto">
					<?php 
						wp_nav_menu( array(
							'container'  => '',//去掉最外层div
							'theme_location'  => 'main_menu',//导航别名
							'items_wrap'  => '%3$s',//去掉UL
							'walker'   => new Header_Nav_Menu()
						) );
					?>
			
				</ul>
				<form class="form-inline my-2 my-lg-0" method="get" action="<?php esc_url(home_url('')); ?>">
					<input class="form-control mr-sm-2" name='s' type="search" placeholder="输入内容" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
				</form>
			</div>
		</div>
	</nav>