<?php

	add_filter( 'show_admin_bar', '__return_false' );

	function pony_theme_support(){
		// preview image
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'main_menu'=> '主导航'
		));
	}

	add_action('after_setup_theme','pony_theme_support');

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
		return $count . '';
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
	
	function get_most_viewed_format($mode = '', $limit = 10, $show_date = 0, $term_id = 0, $beforetitle= '(', $aftertitle = ')', $beforedate= '(', $afterdate = ')', $beforecount= '(', $aftercount = ')') {   
		global $wpdb, $post;   
		$output = '';   
		$mode = ($mode == '') ? 'post' : $mode;   
		$type_sql = ($mode != 'both') ? "AND post_type='$mode'" : '';   
		$term_sql = (is_array($term_id)) ? "AND $wpdb->term_taxonomy.term_id IN (" . join(',', $term_id) . ')' : ($term_id != 0 ? "AND $wpdb->term_taxonomy.term_id = $term_id" : '');   
		$term_sql.= $term_id ? " AND $wpdb->term_taxonomy.taxonomy != 'link_category'" : '';   
		$inr_join = $term_id ? "INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)" : '';   
		// database query   
		$most_viewed = $wpdb->get_results("SELECT ID, post_title, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON ($wpdb->posts.ID = $wpdb->postmeta.post_id) $inr_join WHERE post_status = 'publish' AND post_password = '' $term_sql $type_sql AND meta_key = 'views' GROUP BY ID ORDER BY views DESC LIMIT $limit");   
		if ($most_viewed) {   
		 foreach ($most_viewed as $viewed) {   
			$post_ID    = $viewed->ID;   
			$post_views = number_format($viewed->views); 
			
			$post_title = esc_attr($viewed->post_title);   
			$get_permalink = esc_attr(get_permalink($post_ID));   
			echo $get_permalink;  
			$output .= "
	$beforetitle$post_title$aftertitle";   
			if ($show_date) {   
				$posted = date(get_option('date_format'), strtotime($viewed->post_date));   
				$output .= "$beforedate $posted $afterdate";   
			}   
			$output .= "$beforecount $post_views $aftercount";   
		 }   
		} else {   
		 $output = "
	N/An";   
		}   
		echo $output;   
	} 

