<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'ponyblog';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {



	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );


		

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( '常规设置', 'theme-textdomain' ),
		'type' => 'heading'
	);

	// Multicheck Array
	$multicheck_array = array(
		'zan' => __( '不显示文章点赞按钮', 'theme-textdomain' ),
		'cai' => __( '不显示文章踩按钮', 'theme-textdomain' ),
		'links' => __( '不显示友情链接', 'theme-textdomain' )
	);



	$options[] = array(
		'name' => __( '网站关键词', 'theme-textdomain' ),
		'desc' => __( '请输入关键词（Keyword）利于SEO爬虫获取', 'theme-textdomain' ),
		'id' => 'website_keyword',
		'placeholder' => '请输入以逗号分割',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '网站备案号', 'theme-textdomain' ),
		'id' => 'website_beian_num',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '网站备案链接', 'theme-textdomain' ),
		'id' => 'website_beian_url',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '版权信息', 'theme-textdomain' ),
		'id' => 'website_copyright',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( '网站描述', 'theme-textdomain' ),
		'desc' => __( '用于网站底部描述和SEO描述', 'theme-textdomain' ),
		'id' => 'website_desc',
		'std' => '',
		'type' => 'textarea'
	);




	$options[] = array(
		'name' => __( '网站LOGO', 'theme-textdomain' ),
		'desc' => __( '如果不设置LOGO默认显示标题 建议120x40 大小', 'theme-textdomain' ),
		'id' => 'website_logo',
		'type' => 'upload'
	);



	$options[] = array(
		'name' => __( '主题色', 'theme-textdomain' ),
		'desc' => __( '网站主题色调', 'theme-textdomain' ),
		'id' => 'main_color',
		'std' => '#28a745',
		'type' => 'color'
	);


	$options[] = [
		'name' => '其他设置',
		'desc' => '显示文章点赞按钮',
		'id' => 'show_zan',
		'std' => '1',
		'type' => 'checkbox'
	];

	$options[] = [
		'name' => '',
		'desc' => '显示文章踩按钮',
		'id' => 'show_cai',
		'std' => '1',
		'type' => 'checkbox'
	];
	$options[] = [
		'name' => '',
		'desc' => '显示友情链接',
		'id' => 'show_links',
		'std' => '1',
		'type' => 'checkbox'
	];

	$options[] = array(
		'name' => __( '统计代码添加', 'theme-textdomain' ),
		'id' => 'website_tj',
		'std' => '',
		'type' => 'textarea'
	);




	return $options;
}