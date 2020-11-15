


<?php get_header();?>

<div class="container d-flex">
	
	<div class="my-main col-lg-8 col-md-12 ">
		<div class="my-card radius">
			<div class="d-flex my-card-head">
				<div class="my-icon"></div>
				<span>“<?php echo get_search_query();?>”的搜索结果</span>
			</div>
			<div class="text-color pony-margin-top"  >
	
				<?php if ( have_posts()) : ?>
					<?php while (have_posts()) :the_post();?>
					<!-- has_post_thumbnail() the_post_thumbnail_url -->
						<?php if(!has_post_thumbnail()):?>
							<div class="card text-size post-card" url='<?php the_permalink(); ?>'>
								<h6 class='text-no-line hei'><?php the_title(); ?></h6>	
								<p class='text-one-one-line'><?php echo get_seo_description(300); ?></p>
								<div class="d-flex text-size-mini">
									<div style="flex: 1;">
										<span class="card-text">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
												<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
											</svg>
											<?php echo getPostViews(get_the_ID()); ?>阅读
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
									
									<span class="card-text"><?php the_time('yy-m-d H:i');?></span>
								</div>
							</div>
						<?php endif ?>
						<?php if(has_post_thumbnail()):?>
							<div class="card text-size margin-bottom-10 post-card2" url='<?php the_permalink(); ?>' >
								<div class="d-flex">
									<div>
										<img class='post-card-img' src="<?php the_post_thumbnail_url(); ?>" height="100px" width="160px" alt="<?php the_title(); ?>">
									</div>
									<div class='width-full padding10'>
										<div class='width-full height-55'>
											<h6 class='hei text-three-line'><?php the_title(); ?></h6>
										</div>
										<div class='post-card-time'>
											<span class="card-text text-size-mini"><?php the_time('yy-m-d H:i');?></span>
										</div>
									</div>
								</div>
							</div>
						<?php endif ?>
					<?php endwhile; ?>
				<?php endif; ?>			
				<?php if ( !have_posts()) {echo '没有找到相关内容';}?>
			
				<div class='comment-page'>
					<div>
						<?php echo paginate_links([
							'next_text' => '>',
							'prev_text' => '<' 
						
						]); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>

</div>

<br>

<?php get_footer();?>
