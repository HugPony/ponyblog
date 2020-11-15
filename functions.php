<?php

	add_filter( 'show_admin_bar', '__return_false' );

	if (!function_exists('optionsframework_init')){
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri().'/inc/');
		require_once dirname(__FILE__).'/inc/options-framework.php';
	}
	
	add_action( 'init', 'pony_theme_support' );
	function pony_theme_support(){
		// preview image
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'main_menu'=> '主导航',
			'banner_menu'=> '轮播图(请选择带 特色图片 的文章)',
			'main_data'=> '首页展示数据（请选择 分类目录 将会展示该分类下的数据）',
			'links_menu'=> '友情链接',
			'foot_menu'=> '底部导航'
		));
	}

	

	/**
	* hander menu
	*/
	class Header_Nav_Menu extends Walker_Nav_Menu{

		//child menu start
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<div class=\"dropdown-menu\">\n";
		}
		//child menu end 
		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent</div>\n";
		}
		
		// li start
		public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			if ($depth == 0){
				if ($args -> walker -> has_children == 1){
					$output .= "\n
					<li class='nav-item dropdown'>
						<a href='" . $object -> url . "' class='nav-link dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' title='" . $object -> description . "'>
							
							<span class='nav-link-inner--text'>" . $object -> title . "</span>
						</a>";
				}else{
					$output .= "\n
					<li class='nav-item'>
						<a href='" . $object -> url . "' class='nav-link' target='" . $object -> target . "' title='" . $object -> description . "'>
								
							<span class='nav-link-inner--text'>" . $object -> title . "</span>
						</a>";
				}
			}else if ($depth == 1){
				$output .= "<a href='" . $object -> url . "' class='dropdown-item' target='" . $object -> target . "' title='" . $object -> description . "'>" . $object -> title . "</a>";
			}
		}
		//li end
		public function end_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			if ($depth == 0){
				$output .= "\n</li>";
			}
		}

	}

	function getPostViews($postID){
		$count = get_post_meta($postID,'views', true);
		if($count==''){
			delete_post_meta($postID,'views');
			add_post_meta($postID,'views', '0');
			return '0';
		}
		return getNum($count);
	}

	function getNum($num){
		if($num < 1000){
				return $num;
		} else if($num >=1000 && $num < 10000){
				return round($num/1000,1).'k';
		} else if ($num >= 10000) {
				return round($num/10000,2).'w';
		}
	}

	function setPostViews($postID) {
		$count = get_post_meta($postID,'views', true);
		//echo $count;
		if($count==''){
			$count = 0;
			delete_post_meta($postID,'views');
			add_post_meta($postID,'views', '0');
		}else{
			$count++;
			update_post_meta($postID,'views', $count);
		}
	}

	function get_most_viewed_format($limit = 10,$term_id = 0) {   
		global $wpdb, $post;   
		$mode = 'post';
		$type_sql = ($mode != 'both') ? "AND post_type='$mode'" : '';
		$term_sql = (is_array($term_id)) ? "AND $wpdb->term_taxonomy.term_id IN (" . join(',', $term_id) . ')' : ($term_id != 0 ? "AND $wpdb->term_taxonomy.term_id = $term_id" : '');   
		$term_sql.= $term_id ? " AND $wpdb->term_taxonomy.taxonomy != 'link_category'" : '';   
		$inr_join = $term_id ? "INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)" : '';        
		// database query   
		$most_viewed = $wpdb->get_results("SELECT ID, post_title, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id) $inr_join WHERE post_status = 'publish' AND post_password = '' $term_sql $type_sql AND meta_key = 'views' GROUP BY ID ORDER BY views DESC LIMIT $limit");   
		$result = [];
		$num = 0;
		if ($most_viewed) {   
		 foreach ($most_viewed as $viewed) {
			$post_ID    = $viewed->ID;   
			$post_title = esc_attr($viewed->post_title);   
			$get_permalink = esc_attr(get_permalink($post_ID)); 
			$temp = [
				'title' => $post_title,
				'views' => getNum($viewed->views),
				'link' => $get_permalink,
				'id' =>$post_ID
			];
			$result[$num] = $temp;
			$num ++;
		 }   
		}
		return $result;
	} 


	function pony_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		
		?>
			<div id='comment-<?php comment_ID(); ?>' class='flex-center text-size;margin-bottom:20px'>
							<div style='flex:1' class='d-flex'>
								<img src="https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=3790034832,2705828409&fm=26&gp=0.jpg" style='box-shadow: 0 0 22px 1px rgba(149,148,147,0.3);border-radius:50%;width:50px;height:50px;' alt="">
								<div style='margin-left:10px'>
									<strong id='name-<?php comment_ID(); ?>'><?php echo get_comment_author(); ?></strong> 
									<?php if (user_can($comment -> user_id , "update_core")){
										echo '<span class="badge badge-success">作者</span>';}
									?>
									<?php if ($comment -> comment_approved == 0){
										echo '<span class="badge badge-warning">待审核</span>';}
									?>
									<span class="badge badge-secondary" data-time="<?php echo get_comment_time('U', true);?>"><?php echo human_time_diff(get_comment_time('U') , current_time('timestamp')) . __("前");?></span>

									<p> <?php echo htmlentities($comment -> comment_content); ?></p>
								</div>
							</div>
							<div>
								<a class='to-comment' href="#pony-comment"><span class="badge badge-info" style='margin-left:5px'>回复</span></a>
							</div>
						</div>	
										
	<?php 
	}


	function like($post_id){
		$pid = $_POST['post_id'];
		$like = $_POST['like'];
		$key = 'likes';
		if($like == 0){
			$key = 'no-likes';
		}
		if(empty($_COOKIE['like_'.$pid])){
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
			setcookie('like_'.$pid,$pid,$expire,'/',$domain,false);
			
			$count = get_post_meta($pid,$key, true);
			if($count==''){
				delete_post_meta($pid,$key);
				add_post_meta($pid,$key, 1);
			}else{
				$count++;
				update_post_meta($pid,$key, $count);
			}
			echo 1;
		}else{
			echo 0;
		}
    die();
	}
	add_action('wp_ajax_like', 'like');
	add_action('wp_ajax_nopriv_like', 'like');

	function getLikeNum($postID){
		$count = get_post_meta($postID,'likes', true);
		if($count==''){
			return '0';
		}
		return getNum($count);
	}
	function getNoLikeNum($postID){
		$count = get_post_meta($postID,'no-likes', true);
		if($count==''){
			return '0';
		}
		return getNum($count);
	}

//页面 Description Meta
function get_seo_description($num = 150){
	global $post;
	if(post_password_required()){
		return '该文章受密码保护';
	}
	if (get_the_excerpt() != ""){
		return 	htmlspecialchars(mb_substr(str_replace("\n", '', strip_tags($post -> post_content)), 0, $num)) . "...";
	}
}

