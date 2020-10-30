var chatbox = '/chat.php';
var loadcontent = '<div class="list1"> Đang tải dữ liệu <i class="fa fa-spinner fa-spin"></i> </div>';
$(document).ready(function() {
    $("#idChat").html(loadcontent);

    $.get(chatbox, function (html) {
        $("#idChat").html(html).hide().slideDown("slow");
    });

	reload_chat = setInterval(function() {
		$.get(chatbox, function (html) {
			$("#idChat").html(html);
		});
	}, 7000);
	var form = $('#form'); // contact form
	var submit = $('#submit');	// submit button
	var alert = $('#alert'); // alert div for show alert message
	var text = $('#postText');

	// form submit event
	form.on('submit', function(e) {
		e.preventDefault(); // prevent default form submit
		// sending ajax request through jQuery
		if (text == '') {
			alert.show();
			alert.text(' Bạn chưa nhập nội dung !!! ');
			$('#postText').focus();
			return false;
		}
		$.ajax({
			url: '/chat.php', // form action url
			type: 'post', // form submit method get/post
			timeout: 5000,
			dataType: 'html', // request type html/json/xml
			data: form.serialize(), // serialize form data 
			beforeSend: function() {
				alert.fadeOut();
				submit.html(' Đang gửi <i class="fa fa-spinner fa-spin"></i> '); // change submit button text
			},
			success: function(data) {
				$.get(chatbox, function (html) {
					$("#idChat").html(html).hide().slideDown("slow");
				});
				form.trigger('reset'); // reset form
				$('#postText').focus();
				$('#postText').val('');
				submit.html(' <i class="fa fa-check"></i> Chat '); // reset submit button text
			},
			error: function(e) {
				console.log(e)
			}
		});
	});
});