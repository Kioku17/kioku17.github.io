{% use '_templates' %}
{% from 'func.twig' import mi_get,mi_up,k_del,get,html_decode %}
{% from 'function.twig' import add,mi_add,slug,time,description %}
{% import '_functions' as func %}
{% set url = get_uri_segments() %}
{% set data = mi_get('show_blog')|split(' @ ')|reverse  %}
{% set domain = current_url|split('/').0~"//"~current_url|split('/').2 %}
{% if get_get('key') and not get_get('author') %}
{% set data1 %}{% for i in data %}{% set key = get_get('key') %}
{% if key|length>'0' and key|lower in get('blog_'~i|trim,'title')|trim|lower or key|length>'0' and key|lower in get('blog_'~i|trim,'content')|trim|lower or key|length>'0' and key|lower in get('blog_'~i|trim,'tags')|trim|lower %}{% if loop.last==false %}{{i|trim}}.{% endif %}{% endif %}{% endfor %}{% endset %}
{% elseif get_get('author') and not get_get('key') %}
{% set data1 %}{% for i in data %}{% set key = '[author]'~get_get('author')~'[/author]' %}
{% if key|length>'0' and key|lower in get('blog_'~i|trim,'title')|trim|lower or key|length>'0' and key|lower in get('blog_'~i|trim,'content')|trim|lower %}{% if loop.last==false %}{{i|trim}}.{% endif %}{% endif %}{% endfor %}{% endset %}
{% endif %}
{% set count = data1|split('.')|length-1 %}
{% if get_get('key')!='' and not get_get('author') %}
{% set title = 'Kết quả tìm kiếm "'~get_get('key')~'" ' %}
{% elseif get_get('author')!='' and not get_get('key') %}
{% set title = 'Tác giả: '~get_get('author')~' ' %}
{% else %}
{% set title = 'Tìm kiếm' %}
{% endif %}
{% set data=data1|split('.') %}
 {% set total=data|length-1 %} 
{% set per = '10' %}
 {% set page_max=total//per %}
{% if total//per != total/per %}
{% set page_max=total//per+1 %}
{% endif %}
{% set p=get_get('p')|default('1') %} 
{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*per-per %}
{% set description %}{% for id in data|slice(0,total)|slice(st,per) %}
{% set blog = 'blog_'~id|trim %}{% set title2 = get(blog,'title') %}{% set pre = title2|split('[')[1]|split(']')[0] %}{% if pre!='' %}{{title2|replace({(pre):'','[':'',']':''})}}{% else %}{{title2}}{% endif %}, {% endfor %}{% endset %}
{% set description = description|slice(0,250)|trim %}
{{block('header')}}
<h1 class="title-movies">{% if get_get('key')!='' and not get_get('author') %}{{get_get('key')}}{% elseif get_get('author')!='' and not get_get('key') %}{{get_get('author')}}{% else %}Tìm Kiếm{% endif %}</h1>
{% if get_get('key')=='' %}
<div class="list-login" style="text-align: center;"><form action="" method="get"><input type="text" id="search-input" name="{% if get_get('author') and not get_get('key') %}author{% else %}key{% endif %}" value="{% if get_get('author') and not get_get('key') %}{{get_get('author')}}{% else %}{{get_get('key')}}{% endif %}" placeholder="Nhập {% if get_get('author') and not get_get('key') %}tên tác giả{% else %}từ khóa{% endif %} cần tìm..."><input type="submit" value="Tìm"></form></div>
<div id="results-container"></div>
{% endif %}
{% if count > '0' %}
<div align="center">Có {{count}} kết quả được tìm thấy</div>
{% else %}
{% if get_get('key')|length > 0 %}
<div align="center">Không tìm thấy bài viết nào phù hợp với từ khóa, hãy thử với một từ khóa khác!</div>
{% endif %}
{% endif %} 
{% for id in data|slice(0,total)|slice(st,per) %}
{% set blog = 'blog_'~id|trim %}
{% set title = get(blog,'title') %}
{% set slug = get(blog,'slug') %}
<div class="result-search"><i class="fa fa-rss" aria-hidden="true"></i> <a href="/watch/{{id|trim}}-{{slug}}">{{func.pre(title)}}</a></div>
{% endfor %}
{% if page_max>per %}
{% set page_max=per %} 
 {% endif %} 
 {{func.paging(url|join('/')~'?key='~get_get('key')~'&p',p,page_max)}}
{{block('footer')}}