<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo wp_get_document_title();?></title>
	<?php $ispost = is_single(); if($ispost):?>
<meta name="keywords" content="<?php $res = get_the_tags(); if(null != $res){$w =''; foreach($res as $r){ $w .= $r->name . ',';} echo substr($w,0,strlen($w)-1);}else{the_title();} ?>">
<?php 
	if ( !post_password_required() ) {
		echo '	<meta name="description" content="' . get_seo_description() . '">';
	}
?>	
	<?php endif?>
	<?php if(!$ispost){
		echo '	<meta name="keywords" content="' .get_pony('website_keyword') . '">';
		echo '	<meta name="description" content="' .get_pony('website_desc') . '">';
	}?>
	<link href="<?php echo get_template_directory_uri(); ?>/css/vs2015.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/animate.min.css" rel="stylesheet">
	<?php wp_head(); ?>
	<style>
		:root {
			--main-text-color:<?php echo get_pony('main_color','#28a745'); ?>;
			--text-size:14px;
		}
	</style>
</head>
<body>

	<div style='margin-bottom:70px'>
		
	</div>

	<!-- Hander menu part -->
	<nav class="hader-nav navbar fixed-top navbar-expand-sm navbar-light bg-light navbar-dark bg-dark">
		<div class="container">
		<?php $logo= get_pony('website_logo'); ?>
		<?php if($logo):?>
			<img width='120px' height='40px' src="<?php echo $logo ?>" alt="logo">
		<?php endif?>
		<?php if(!$logo):?>
			<a class="navbar-brand" href="#"><?php bloginfo('title'); ?></a>
		<?php endif?>
			
			<div style='background-color:#343a40' class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">	
				<ul class="navbar-nav mr-auto">
					<?php 
						wp_nav_menu( [
							'container'  => '',//去掉最外层div
							'theme_location'  => 'main_menu',//导航别名
							'items_wrap'  => '%3$s',//去掉UL
							'walker'   => new Header_Nav_Menu()
						 ] );
					?>
			
				</ul>
				<form class="form-inline my-2 my-lg-0" method="get" action="/">
					<input value='<?php echo get_search_query();?>' class="form-control mr-sm-2" name='s' type="search" placeholder="输入内容" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
				</form>
			</div>
		</div>
	</nav>