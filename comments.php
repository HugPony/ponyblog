<?php
	if ( post_password_required() ) {
		echo '输入密码才能查看';
		return;
	}
	if(!comments_open()){
		echo '评论已关闭';
		return;
	}
?>
<?php 
	if(have_comments()){
		wp_list_comments(
			array(
				'type'      => 'comment',
				'callback'  => 'pony_comment'
			)
		);
	}else{
		echo '暂无评论';
	}
	?>

	<div class='comment-page'>
		<div>
			<?php paginate_comments_links([
				'next_text' => '>',
				'prev_text' => '<' 
			
			]); ?>
		</div>
	</div>
	<hr>

	<form id='form-c' class='text-size' action='/wp-comments-post.php' method='post'>


  <div id='pony-comment' class="form-group ">
		<label id='comment-text' for="exampleFormControlTextarea1">评论一下</label></label>
		<button id='no-comment' type="button" class="btn btn-secondary btn-sm">取消回复</button>
    <textarea name='comment' maxlength='1000' placeholder="发表下你的看法。禁止消极言论以及广告" class="form-control text-size" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
	<div class='comment-padding-bottom'>
	<?php if( !is_user_logged_in()): ?>
		<input maxlength='10' type="text" class="comment-input col-sm-12 col-md-3 form-control text-size" name='author' id="name-c" placeholder="昵称（必填）">
		<input maxlength='20'type="email" class="comment-input col-sm-12 col-md-3 form-control text-size" name='email' id="email-c" placeholder="邮箱（必填）">
		<input maxlength='20' type="text" class="comment-input col-sm-12 col-md-3 form-control text-size" id="" placeholder="您的网站">
	<?php endif?>
		
		<input type='hidden' value='0' id='comment-parent'name='comment_parent'/>
		<input type='hidden' value='<?php echo get_the_ID(); ?>' id='comment-post' name='comment_post_ID'/>
		
		<button type='submit' class="btn btn-success text-size; float-right" >发表评论</button>

	</div>
</form>