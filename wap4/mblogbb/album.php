{% use '_blocks' %}
{% set title='Upload ảnh' %}
{{ block('head') }}
<div class="mainblok">
<div class="phdr"><a href="/">Trang chủ</a> » <a href="/album">Upload Ảnh</a> » <b>Upload</b></div>
 {% from 'func.twig' import get,up,add,level,login %}
 {% from 'bbcode.twig' import bbcode %} 
 {% from 'paging.twig' import paging %} 
 {% from 'time.twig' import ago %} 
 {% set login=login()|trim %}
{% if login %}
 {% set u=get_get('u')|trim %}
{% if u %}
<div class="list1"><b><font color="red">Ảnh tải lên thành công</font></b><br /><center><img src="{{u}}" alt="anh" width="90%"/></center>
<br/>
Link:<br/>
<textarea>{{u}}</textarea>
BBcode:<br/>
<textarea>[img]{{u}}[/img]</textarea>
<br/>hoặc<br/>
<textarea>[src]{{u}}[/src]</textarea>
</div>
<div class="rmenu"><a href="/album/{{login}}">Quay lại</a></div>
{{up('album_'~login,'img_'~u~'_'~login~'_'~"now"|date('U'),'up')}}
{{up('album','img_'~u~'_'~login~'_'~"now"|date('U'),'up')}}
{% else %}
<div class="list1">
<form action="http://hostingbb.gq/imgur.php" enctype="multipart/form-data" method="POST">
<center><input name="img" type="file"/><br/>
<b><input type="submit" name="submit" value="   Upload   "/></b></center>
</form>
</div>
{% endif %}
{% else %}
<div class="rmenu">Vui lòng đăng nhập để thực hiện chức năng</div>
{% endif %}
</div>
{{ block('end') }}