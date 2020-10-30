{% import 'template' as tpl %}
{% set cookies = get_cookies() %} 
{% set total=cookies['total_images']|default(0)|trim %}
{{tpl.head('Upload Images')}}
<center>
<p>Nếu không thể upload ảnh, vui lòng reload trang !</p>
<div id="wp_content" class="clearfix">
<div class="forumtxt">
    <div class="dropzone">
<div class="info"></div>
 <script type="text/javascript" src="/js/imgur.js"></script>
    <script type="text/javascript" src="/js/upload.js"></script>
</div></div>
{%  if get_get('act')=='save' and get_get('img')!=null %}
Lưu thành công
{{set_cookie('total_images',cookies['total_images']|trim+1)}}
{{set_cookie('upload_images',cookies['upload_images']|trim~'_'~get_get('img'))}}
<script language="javascript" type="text/javascript"> 
window.location.href="/upload.php"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/upload.php">
{%  elseif get_get('act')=='delete' %}
Đã làm sạch
{{delete_cookie('total_images')}}
{{delete_cookie('upload_images')}}
<script language="javascript" type="text/javascript"> 
window.location.href="/upload.php"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/upload.php">
{% endif %}
{% if cookies['upload_images']!=null and total>=1 %}
<p>Ảnh đã lưu ({{total}}) <a href="?act=delete">[ Làm sạch ]</a></p>
{% endif %}
{% if cookies['upload_images']!=null and total>=1 and total <= 10 %}
{% for i in total..1 %}
<div class="b1 p2"><img width="240px" src="{{cookies['upload_images']|split('_')[i]|trim}}"></div><div class="b1 p2"><b>Link Image : </b><input type="text" value="{{cookies['upload_images']|split('_')[i]|trim}}"></div><div class="b1 p2"><b>BBCode : </b><input type="text" value="[img]{{cookies['upload_images']|split('_')[i]|trim}}[/img]"></div>
<br/>
{% endfor %}
{% elseif cookies['upload_images']!=null and total>=11 %}
{% for i in total..(total-5) %}
<div class="b1 p2"><img width="240px" src="{{cookies['upload_images']|split('_')[i]|trim}}"></div><div class="b1 p2"><b>Link Image : </b><input type="text" value="{{cookies['upload_images']|split('_')[i]|trim}}"></div><div class="b1 p2"><b>BBCode : </b><input type="text" value="[img]{{cookies['upload_images']|split('_')[i]|trim}}[/img]"></div>
<br/>
{% endfor %}
{% endif %}
</div>
</center>
{{tpl.end}}