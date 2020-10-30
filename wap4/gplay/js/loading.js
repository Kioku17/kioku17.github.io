$('body').on('click', 'a#load', function (e){
		e.preventDefault();
		var link = this.href;
		$("body").append('<div class="loading-wrapper"> <span class="loading-icon"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> </span></div>');
		$.get(link,"", function(data_html){
			var title = data_html.split('<title>')[1].split('</title>')[0];
			var body = data_html.split('<body>')[1].split('</body>')[0];
			$("title").html(title);
			$("body").html(body);
			window.history.pushState("","", link+"#load");
			 $('body').animate({scrollTop:0},300);
		});
	});