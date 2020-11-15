//load code highlight 
hljs.initHighlightingOnLoad();
$('#no-comment').hide()
$('#banquan').hide()
$(function () {
	
	$(document).on("click","#top",function () {
			$('html,body').animate({scrollTop:0},500)
	});
	
	document.getElementById("top").style.display = "none";
	window.onscroll = function () {
		if (document.documentElement.scrollTop + document.body.scrollTop > 100) {
				document.getElementById("top").style.display = "block";
		}
		else {
				document.getElementById("top").style.display = "none";
		}
	}


	$('.hader-nav').find('a').each(function () {
		if (this.href == document.location.href) {
				$(this).parent().addClass('active');
		}
	});


	//show big image
	$(".post-content img").click(function(){
		document.getElementById('showImg').style.display = "flex"
		$("#showImg").show()
		$("#showImgSrc").attr('src',$(this)[0].src);
	});
	$("#showImg").click(function(){
		$("#showImg").hide()
	});
	$("#showImgSrc").click(function(){
		
		$("#showImg").hide()
	});


	$("#my_tag a").each(function(){
		if($(this).text() == '原创'){
			$("#banquan").show();
		}
	});

	$('.to-comment').click(function(){
		$('#no-comment').show()
		var num = $(this).parent().parent().attr('id').split('-')[1];
		$('#comment-parent').val(num);
		$('#comment-text').text('正在回复：'+$("#name-"+num).text())
		
	});

	$("#no-comment").click(function(){
		$("#no-comment").hide();
		$('#comment-parent').val('0');
		$('#comment-text').text('评论一下')
	});
	$('#submit-comment').click(function(){
		var name = $("#name-c").val();
		var e = $("#email-c").val();
		if(name.length < 1){
			alert("请输入名字");
		}else if(e.length < 1 || e.indexOf('@') == -1 || e.indexOf('.') ==  -1){
			alert("请输入邮箱");
		}else{
			$("#form-c").submit();
		}

	});

	$("#like-post").click(function(){
		var pid = $("#comment-post").val();
		var v = localStorage.getItem('like-'+pid,pid);
		if(v == null || v == undefined || v == ''){
			localStorage.setItem('like-'+pid,pid);
			var n = $("#like-post span").text();
			n ++;
			$("#like-post span").text(n);
			var url = $("#admin-url").val();
			$.post(url + "admin-ajax.php",{post_id:pid,action:'like',like:1},function(res){
			})
		}else{
			alert('您已经点过了')
		}
		
	});

	$("#no-like").click(function(){
		var pid = $("#comment-post").val();
		var v = localStorage.getItem('like-'+pid,pid);
		if(v == null || v == undefined || v == ''){
			localStorage.setItem('like-'+pid,pid);
			var n = $("#no-like span").text();
			n ++;
			$("#no-like span").text(n);
			var url = $("#admin-url").val();
			$.post(url + "admin-ajax.php",{post_id:pid,action:'like',like:0},function(res){
			})
		}else{
			alert('您已经点过了')
		}
		
	});

	$(".post-card").click(function(){
		var url = $(this).attr("url");
		window.open(url,'_blank');     
	});

	$(".post-card2").click(function(){
		var url = $(this).attr("url");
		window.open(url,'_blank');     
	});


	$(".links-button").click(function(){
		var url = $(this).attr("url");
		window.open(url,'_blank');     
	});

	$(".tag-cloud-link").each(function(){
		$(this).attr("target","_blank");
	});

	$(".post-card-index").click(function(){
		var url = $(this).attr("url");
		window.open(url,'_blank');     
	});
	
});
