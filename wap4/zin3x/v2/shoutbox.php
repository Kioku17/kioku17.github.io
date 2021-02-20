{% use '_templates' %}
{% import '_functions' as func %}
{% import '_functions_blog' as blog %}
{% from 'function.twig' import add,mi_add,slug,time,description %}
{% import '_avatar' as avatar %}
{% from 'func.twig' import mi_get,mi_up,k_del,get,html_decode %}
{% set url = get_uri_segments() %}
{% set title = (current_url|split('/').2)|upper~' | Chat Sex Online, Tâm Sự Đêm Khuya' %}
{% set signin = func.signin()|trim %}
{{block('header')}}
{% if get_data_count('guestbook')==0 %}
{% for i in 1..20 %}
{% set save=save_data('chat_'~i,{"name" :"zin3x","time":'now'|date('U'),"comment":"Ai nớp diu chịch chịch"}|json_encode) %}
{% endfor %}
{% set save=save_data('guestbook',' 20 @  19 @  18 @  17 @  16 @  15 @  14 @  13 @  12 @  11 @  10 @  9 @  8 @  7 @  6 @  5 @  4 @  3 @  2 @  1 @ ') %}
{% endif %}
<h1 class="title-movies">Chat Sex</h1>
{% set form %}<form method="post">
<div class="list-login"><center>Vui lòng hoàn thành thông tin sau.</center><table width="100%"><tr><td width="40%" align="right">Tên của bạn</td><td><input type="text" name="name"></td></tr><tr><td width="40%" align="right">Giới tính</td><td><input type="number" name="sex"><br/>Nam ghi <b>0</b>, Nữ ghi <b>1</b></td></tr></table></div><div align="center"><input type="submit" value="Xác minh" name="submit"></div>
</form>{% endset %}
{% if signin %}
{% set name = signin %}
{% else %}
{% set name = get_cookie('nickname') %}
{% endif %}
{% if name=='' %}
{% if request_method()|lower == "post" %} 
{% if get_post('name')!='' %}
{{set_cookie('nickname',get_post('name'))}}
{% if get_post('sex') in 0..1 %}
{{set_cookie('sex',get_post('sex'))}}
{% endif %}
{% endif %}
{% if get_post('name')=='' %}
{{form}}
{% else %}
<div class="list-login" style="font-size:20px;text-align:center">
{{'Xác minh thành công'|upper}}<br/><a href="/shoutbox.php">[ Tham Gia Cuộc Trò Chuyện ]</a>
</div>
{% endif %}
{% else %}
{{form}}
{% endif %}
{% else %}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.7.0/jquery.validate.min.js"></script>
<script type="text/javascript">var chatbox="../shoutbox.data.php",loadcontent='<div class="result-post">Đang tải dữ liệu <i class="fa fa-hourglass-half"></i></div>';$(document).ready(function(){$("#idChat").html(loadcontent),$.get(chatbox,function(t){$("#idChat").html(t).hide().slideDown("slow")}),reload_chat=setInterval(function(){$.get(chatbox,function(t){$("#idChat").html(t)})},4e3);var e=$("#form"),i=$("#submit"),o=$("#alert"),a=$("#postText");e.on("submit",function(t){if(t.preventDefault(),""==a)return o.show(),o.text("Bạn chưa nhập nội dung !!!"),$("#postText").focus(),!1;$.ajax({url:"../shoutbox.data.php",type:"POST",timeout:7e3,dataType:"html",data:e.serialize(),beforeSend:function(){o.fadeOut(),i.html('Đang gửi <i class="fa fa-hourglass-half"></i>')},success:function(t){$.get(chatbox,function(t){$("#idChat").html(t).hide().slideDown("slow")}),e.trigger("reset"),$("#postText").focus(),$("#postText").val(""),i.html('<i class="fa fa-check"></i> Chat')},error:function(t){console.log(t)}})})});</script>
{% set token = random(100000) %}
<div class="room"><div class="menu-room"><table width="100%" border="0"><tr><td width="80%"> <form id="form" action="" method="POST" name="form">{% include 'toolbar' %}<textarea type= "text" id="postText" name="msg"></textarea><a id="upload" class="sub3"><i class="fa fa-upload" aria-hidden="true"></i></a><a class="sub3" href="javascript:show_hide('sm');"><i class="fa fa-smile-o" aria-hidden="true"></i></a><a class="sub3" href="/shoutbox.php"><i class="fa fa-refresh" aria-hidden="true"></i></a><button name="submit" type="submit" id="submit" style="display:inline-block;background:#E3E8EA;color:#333;padding:2px 35px;margin-left:0;margin-right:0;border-radius:2px;box-shadow:0 2px 4px 0 rgba(0,0,0,.5);background-image:linear-gradient(to bottom,#e0e0e0,#b7b7b7);line-height:1.42857143;font-size:14px">Chat</button><input type="hidden" name="token" value="{{token}}"/></form></div></td></tr></table></div><input style="display:none" type="file" id="f" accept="image/*"><div id="sm" style="display:none">{% for i in 1..48 %}<a href="javascript:tag(':ami{{i}}', ':'); show_hide('sm');"><img src="https://moleys.github.io/assets/images/ami{{i}}.png" width="50px" /></a>{% endfor %}</div></div>
<div id="alert"></div>
<div id="postText"></div>
<div id="idChat"></div>
<script src="https://cafedang.xyz/assets/js/api.imgur.js"></script>
<script>
document.querySelector("#upload").onclick = function() {
document.querySelector("#f").click();}
imgur("#f",{loading : function(load) {document.querySelector("#upload").innerHTML = '<i class="fa fa-upload" aria-hidden="true"></i> '+load},
loaded : function(link,size,type,time) {
var input = $("textarea").val();
$("textarea").val(input+" [img]"+link+"[/img] ");
$("#upload").html('<i class="fa fa-upload" aria-hidden="true"></i>');}})
</script>
<script language="JavaScript" type="text/javascript">function tag(e,t){if(document.selection)document.form.msg.focus(),document.form.document.selection.createRange().text=e+document.form.document.selection.createRange().text+t;else if(null!=document.forms.form.elements.msg.selectionStart){var n=document.forms.form.elements.msg,o=n.value,s=n.selectionStart,l=n.selectionEnd-n.selectionStart;n.value=o.substr(0,s)+e+o.substr(s,l)+t+o.substr(s+l)}else document.form.msg.value+=e+t}function show_hide(e){obj=document.getElementById(e),"none"==obj.style.display?obj.style.display="block":obj.style.display="none"}</script>
{% endif %}
{{block('footer')}}