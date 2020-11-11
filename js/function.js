//load code highlight 
hljs.initHighlightingOnLoad();
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

});
