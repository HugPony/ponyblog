<?php get_header();?>
	<div class="container d-flex">
		<div class="my-main col-lg-8 col-md-12 ">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				<?php 
						$locations = get_nav_menu_locations();
						$list = wp_get_nav_menu_items ($locations['banner_menu'] );
						$indx2 = 0;
						foreach($list as $link):
					?>
					<li data-target="#carouselExampleIndicators" data-slide-to="	<?php echo $indx2 ;?>" class="<?php echo $indx2 == 0?'active':''; ?>"></li>
					<?php $indx2 = $indx2 + 1;?>
				<?php endforeach?>
				</ol>
				<div class="carousel-inner radius">
					<?php 
						$indx = 0;
						foreach($list as $link):
					?>
					<div class="carousel-item <?php echo $indx == 0?'active':''; ?>">
						<a target="_blank" href="<?php echo $link->url; ?>"><img src="<?php $post =  get_post($link->object_id); echo the_post_thumbnail_url(); ?>" class="d-block w-100" alt="<?php echo $link->title; ?>"></a>
					</div>
						<?php $indx = $indx + 1;?>
						<?php endforeach?>

					
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<?php 
				$locations = get_nav_menu_locations();
				$list = wp_get_nav_menu_items ($locations['main_data'] );
				foreach($list as $data):
			?>
			<div class="my-card radius">
				<div class="d-flex my-card-head">
					<div class="my-icon"></div>
					<div class='d-flex width-full'>
						<span class='flex-1'><?php echo $data->title; ?></span>
						<a target="_blank" class='text-size hei' href="<?php echo get_category_link($data->object_id); ?>">查看更多 ></a>
					</div>
				</div>
				<div class="text-color my-card-home">
					<div class="row">
					<?php $r = get_most_viewed_format(4,$data->object_id); 
						foreach($r as $p):?>
							
						<?php $post = get_post($p['id']); $have = has_post_thumbnail(); ?>
						
						<?php if(!$have):?>
						<div class="col-md-6 margin-bottom-10">
							<div class="card text-size post-card-index" url='<?php the_permalink(); ?>' >
								<div class="card-body text-center">
									<h6 class="card-title"><?php echo $p['title']; ?></h6>
								</div>
								<div class=" padding5 d-flex text-size-mini">
									<div class='flex-1'>
										<span class="card-text">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
												<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
											</svg>
											<?php echo $p['views']; ?>阅读
										</span>
										&nbsp;&nbsp;
										<span class="card-text" >
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
												<path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
											</svg>
												<?php echo get_comments_number(); ?>评论
										</span>
									</div>
									
									<span class="card-text"><?php the_time('yy-m-d');?></span>
								</div>
							</div>
						</div>
						<?php endif ?>
						<?php if($have):?>
						<div class="col-md-6 margin-bottom-10 post-card-index yuan height-100" url='<?php the_permalink(); ?>'>
							<div class="card text-size">
								<div class="d-flex">
									<div>
										<img src="<?php the_post_thumbnail_url(); ?>" height="100px" width="160px" alt="">
									</div>
									<div class='padding10 width-full'>
										<div class="flex-center height-55 width-full">
											<h6 class='text-three-line'> <?php the_title();?> </h6>
										</div>
										<div class='post-card-time'>
											<span class="card-text text-size-mini"><?php the_time('yy-m-d');?></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<?php endif ?>
						<?php endforeach; ?>
						
						
					</div>
				</div>
			</div>
			<?php endforeach?>
		
			<div class="my-card radius links <?php echo !get_pony('show_links')?'d-none':''; ?>">
				<div class="d-flex my-card-head">
					<div class="my-icon"></div>
					<span>友情链接</span>
				</div>
				<div class="text-color pony-margin-top">
					<?php 
						$locations = get_nav_menu_locations();
						$list = wp_get_nav_menu_items ($locations['links_menu'] );
						foreach($list as $link):
					?>
						<button type="button" url='<?php echo $link->url; ?>' class="links-button btn btn-secondary btn-sm"><?php echo $link->title; ?></button>
					<?php endforeach?>
				</div>
			</div>

		</div>
		<?php get_sidebar(); ?>
		
	</div>
	<br>
<?php get_footer();?>
