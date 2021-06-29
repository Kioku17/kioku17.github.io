$(window).load(function() {	
	$('.spinner').fadeOut(0);
	$('#body').css({overflow:'visible'})
})
$(document).ready(function() {
	//返回顶部
	$(window).scroll(function(){
		if ($(this).scrollTop() > 200){
		$('#goTop').stop().animate({bottom: '70px'},300);
		}else{
		$('#goTop').stop().animate({bottom: '-40px'},300);
		}
	});
	$('#goTop').click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop: 0},500);
	});
	//移动端滑块特效
	 $(document.body).on('appear', '.type-post', function(e, $affected) {
        // add class called 鈥渁ppeared鈥� for each appeared element
        $(this).addClass("appeared");
      });
      $('.type-post').appear({force_process: true});
	//移动端搜索
	$('.searchicon').toggle(
			function(){
				$('.mb-search').animate({height:'50px'},200);
			},
			function(){
				$('.mb-search').animate({height:'0px'},200);
			}
	);
	//边栏固定
 	var $sidebar = $("#fixed"),    
 		$fixside = $('.fixsidebar'),
	 $window = $(window),    
	 offset = $sidebar.offset(),    
	 widths=$sidebar.width();
	 if($window.width() > 768){
		$window.scroll(function() {    
		if ($window.scrollTop() > offset.top) {  
				$fixside.addClass('fix').css("width",widths); 
				$fixside.stop().animate({top:'70px'});
			} else {    
				$fixside.stop().animate({top:'-400px'});
			$fixside.removeClass('fix'); 

		 	}    
		});    
	}
});  		