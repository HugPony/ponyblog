<div class="my-main2  col-md-4 d-none d-lg-block">
			<div class="my-card radius">
				<div class="d-flex my-card-head">
					<div class="my-icon"></div>
					<span>热门文章</span>
				</div>
				<div class="text-color pony-margin-top">
					<?php $r = get_most_viewed_format(15,0); 
						foreach($r as $p):?>
						<div class="d-flex top-bottom-10">
							<a target="_blank" class="width-full my-a text-size" href="<?php echo $p['link']; ?>" title="<?php echo $p['title']; ?>">
								<div class=' flex-center'>
									<svg width="18px" height="18px" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
									</svg>
									<span class='pony-card-text'><?php echo $p['title']; ?>  </span>
									<span class='text-size-mini'><?php echo $p['views']; ?> 阅读</span>
								</div>
							</a>
						</div>
					 <?php endforeach; ?>
				</div>
			</div>
			
			<div class="my-card radius">
				<div class="d-flex my-card-head">
					<div class="my-icon"></div>
					<span>最新发布</span>
				</div>
				<div class="text-color pony-margin-top" >
					<?php $posts = get_posts( [
						'numberposts'=> '10'
						]); 
						foreach($posts as $post):?>

						<div class="d-flex top-bottom-10">
							<a target="_blank" class="width-full my-a text-size" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class='flex-center' >
									<svg width="18px" height="18px" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
									</svg>
									<span class='pony-card-text'><?php the_title(); ?>  </span>
									<span class='text-size-mini'><?php the_time('yy-m-d');?></span>
								</div>
							</a>
						</div>
					<?php endforeach; ?>

				</div>
			</div>

			<div class="my-card radius">
				<div class="d-flex my-card-head">
					<div class="my-icon"></div>
					<span>文章标签</span>
				</div>
				<div class="text-color pony-margin-top">
					<?php
						wp_tag_cloud([
							'number' => '50',
							'order' => 'RAND'
						]);
						
					?>

				</div>
			</div>

		</div>