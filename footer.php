<div  id="top" class="text-center animated fadeInUpBig" style="cursor:pointer;line-height: 40px; width: 40px;height: 40px; position: fixed;bottom: 10px;right: 10px; background-color: #fff;border-radius: 50%;box-shadow: 0 0 22px -7px #000;">
		<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
		</svg>
	</div>
	<footer class="bg-dark" style="color:#fff; padding: 30px;" >
		<div class="container">
			<div class="d-flex text-size">
				<div style="flex:1">
					<p><?php bloginfo('title'); ?></p>
					<span><?php echo get_pony('website_desc'); ?></span>
				</div>
				<div style="flex:1">
					<p>其他功能</p>
					<div>
					<?php 
						$locations = get_nav_menu_locations();
						$list = wp_get_nav_menu_items ($locations['foot_menu'] );
						foreach($list as $link):
					?>
						<a target="_blank" href="<?php echo $link->url; ?>"><?php echo $link->title; ?></a>
					<?php endforeach?>
					</div>
				</div>
			</div>
			<br>
			<div class="text-size text-center" >
				<span><?php echo get_pony('website_copyright'); ?> <a href="<?php echo get_pony('website_beian_url'); ?>"><?php echo get_pony('website_beian_num'); ?></a> </span><br>
				<span> Theme by <a href="https://github.com/HugPony/ponyblog">pony</a></span>
			</div>
		</div>
	</footer>

</body>
</html>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/highlight.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/function.js"></script>
<script>
	<?php echo get_pony('website_tj'); ?>
</script>