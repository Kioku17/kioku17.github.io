{% import 'template' as tpl %}
{% import 'functions' as func %}
{{tpl.head('GPlay')}}
{% set signin=func.signin()|trim %}
{% set run = get_data('notepad')[0].data|json_decode %}
{% if signin %}
{% set name = get_post('name') %}
{% set doc = get_post('doc') %}
{% if request_method()|lower == "post" %}
<div class="f">
{% if name|length > '200' or name|length < '3' %}
Độ dài tên bản lưu không hợp lệ.<br/>Tối thiểu: 3 kí tự<br/> Tối đa: 200 kí tự<br/><a href="/">Quay lại</a>
{% elseif doc|length > '16000' or doc|length < '5' %}
Độ dài nội dung bản lưu không hợp lệ.<br/>Tối thiểu: 5 kí tự<br/> Tối đa: 16000 kí tự<br/><a href="/">Quay lại</a>
{% else %}
{% set file = {"name":name,"doc":doc} %}
{% set save = save_data( "file_"~(run.file|trim+1), file|json_encode ) %}
{{func.up('list_file',run.file|trim+1,'up')}}
<script language="javascript" type="text/javascript"> 
window.location.href="/"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/">
{{func.add('notepad','file',run.file|trim+1)}}
{% endif %}
</div>
{% endif %}
<div class="alert alert-info max-width"><div class="form-group">
<form method="post"><div class="f">Tên bản lưu (Max.200)</div><input name="name" class="list-group-item"><div class="f">Nội dung (Max.16000)</div><textarea name="doc" class="list-group-item"></textarea><br><input class="btn btn-primary" type="submit" value="Lưu"></form>
</div>
</div>
{% endif %}
<div class="t"></div>
{% if run.file|trim >= 1 %}
{% set data=func.get('list_file')|trim|split('@') %}
{% set total=data|length-1 %} 
{% set page_max=total//10 %}
{% if total//10 != total/10 %}
{% set page_max=total//10+1 %}
{% endif %}
{% set url=get_uri_segments() %}
{% set p=get_get('p')|default(1) %}
{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*10-10 %}
{% for i in data|slice(0,total)|slice(st,10) %}
{% set i = i|trim %}
{% set info = get_data('file_'~i)[0].data|json_decode %}
{% if info.name and info.doc %}
<div class="list-group"><div class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-comment"></span> <a href="/file/{{func.rwurl(info.name)|trim}}.{{i}}" id="load">{{info.name|raw}}</a></div>
<textarea class="list-group-item" rows="5">{{info.doc}}</textarea>
</div>
{% endif %}
{% endfor %}
{{func.paging('?p',p,page_max)}}
{% else %}
<p><font color="red">Thư viện lưu trữ rỗng !</font></p>
{% endif %}
{{tpl.end}}