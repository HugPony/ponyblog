<?php get_header();?>
<?php if(has_post_thumbnail()):?>
	<img class='d-none' src='<?php the_post_thumbnail_url(); ?>' alt='<?php the_title(); ?>'>
<?php endif?>

<input type='hidden' value='<?php echo admin_url(); ?>' id='admin-url'/>

<div id="showImg" class="show-img" >
	<img id="showImgSrc" src="">
</div>
	<div class="container">
		<nav class="col-lg-12 text-size pony-box" aria-label="breadcrumb" >
			<ol class="breadcrumb bai">
				<li class="breadcrumb-item active" aria-current="page">页面位置：</li>
				<li  class="breadcrumb-item"><a target="_blank" href="/">首页</a></li>
				<li class="breadcrumb-item"><?php the_category(","); ?></li>
				<li class="breadcrumb-item active" aria-current="page"> 正文</li>
			</ol>
		</nav>
		<div class='d-flex'>
			<div class='col-lg-8 col-md-12'>
				<div aria-label="breadcrumb " class='text-size pony-box' >
					<ol  class="breadcrumb bai">
						<div class='flex-center width-full'>
							<li class="breadcrumb-item active" aria-current="page">信息：</li>
							<div class='text-size-mini flex-1'>
								<span class="card-text">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
										<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
									<span> 
									<?php
										if ( !post_password_required() ) {
											setPostViews(get_the_ID()); 
											echo getPostViews(get_the_ID());
										}else{
											echo getPostViews(get_the_ID());
										}
									?></span>
								</span>
								&nbsp;&nbsp;
								<span class="card-text" >
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
									</svg>
									<?php echo getLikeNum(get_the_ID()); ?>
								</span>
								&nbsp;&nbsp;
								<span class="card-text" >
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
										<path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
									</svg>
									<?php echo get_comments_number(); ?>
								</span>
							</div>
							<span class='d-none d-sm-block text-size-mini float-right'>发布于：<?php the_time('yy-m-d H:i');?></span>
						</div>
					</ol>
				</div>
				<div class='bai pony-box yuan text-size padding20 margin-bottom-20'>
					<div >
						<p class='flex-1 pony-title'><?php the_title();?></p>
						<div class='post-content'>
						<?php while( have_posts() ): the_post(); ?>
	    			            <?php the_content();?>
	    		                <?php endwhile; ?>
						</div>	
					</div>
					<span class='d-sm-none text-size-mini float-right'>发布于：<?php the_time('yy-m-d H:i');?></span>
					<div class='d-sm-none height-30'></div>
					<div class="d-flex margin-top-30">
						<?php if ( !post_password_required() ):?>
						<div  class='flex-1'>
							<button id='like-post' type="button" class="btn btn-outline-success flex-center <?php echo !get_pony('show_zan')?'d-none':''; ?>" >
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
								</svg>&nbsp;
								<span><?php echo getLikeNum(get_the_ID()); ?></span>&nbsp; 赞</button>
						</div>
						<div>
							<button id="no-like" type="button" class="btn btn-outline-danger flex-center <?php echo !get_pony('show_cai')?'d-none':''; ?>" > 
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28v1c.563 0 .901.272 1.066.56.086.15.121.3.121.416 0 .12-.035.165-.04.17l-.354.353.353.354c.202.202.407.512.505.805.104.312.043.44-.005.488l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.415-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.353.352.373.714.267 1.021-.122.35-.396.593-.571.651-.653.218-1.447.224-2.11.164a8.907 8.907 0 0 1-1.094-.17l-.014-.004H9.62a.5.5 0 0 0-.595.643 8.34 8.34 0 0 1 .145 4.725c-.03.112-.128.215-.288.255l-.262.066c-.306.076-.642-.156-.667-.519-.075-1.081-.239-2.15-.482-2.85-.174-.502-.603-1.267-1.238-1.977C5.597 8.926 4.715 8.23 3.62 7.93 3.226 7.823 3 7.534 3 7.28V3.279c0-.26.22-.515.553-.55 1.293-.138 1.936-.53 2.491-.869l.04-.024c.27-.165.495-.296.776-.393.277-.096.63-.163 1.14-.163h3.5v-1H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
								</svg>&nbsp;
								<span><?php echo getNoLikeNum(get_the_ID()); ?></span> &nbsp;踩</button>
						</div>
						<?php endif?>
					</div>
				</div>

				<div aria-label="breadcrumb text-size pony-box"  >
					<ol id="my_tag" class="breadcrumb bai">
						<li class="breadcrumb-item active" aria-current="page">文章标签：</li>
						<?php the_tags('',',',''); ?>
					</ol>
				</div>
				<div id="banquan" aria-label="breadcrumb" class='text-size pony-box' >
					<ol class="breadcrumb bai">
						<li class="breadcrumb-item active" aria-current="page">版权信息：此文章是原创，如需转载请标注出处！</li>
					</ol>
				</div>
				<div class="my-card radius">
					<div class="d-flex my-card-head">
						<div class="my-icon"></div>
						<span>相关推荐</span>
					</div>
					<div class="text-color pony-margin-top">
						<?php $postList = get_posts( [
							'numberposts'=> '5',
							'category'=> the_category_ID(false),
							'exclude'=> get_the_ID(),
							'orderby'=>'rand'
						]); 
						if(!$postList){
							echo '暂无';
						}
						foreach($postList as $ps):
						?>
						<div class="d-flex top-bottom-10">
							<a target="_blank" class="width-full my-a text-size" href="<?php the_permalink($ps); ?>" title="<?php the_title(); ?>">
							<div class='flex-center'>
							<svg width="18px" height="18px" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
							</svg>
							<span class='pony-card-text'><?php echo $ps->post_title ?>  </span>
							<span class='text-size-mini'><?php echo date("Y-m-d",strtotime($ps ->post_date)); ?></span>
							</div>
							
							</a>
						</div>
						<?php endforeach; ?>

					</div>
				</div>
				<div class="my-card radius links">
					<div class="d-flex my-card-head">
						<div class="my-icon"></div>
						<span>最新评论</span>
					</div>
					<div class="text-color pony-margin-top" >
						<?php 
							comments_template(); 
						?>
					</div>
				</div>
			</div>
			<?php get_sidebar();?>
		</div>
		
	</div>
	
	<br>
<?php get_footer();?>