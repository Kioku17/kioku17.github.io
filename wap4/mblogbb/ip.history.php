{% from 'func.twig' import add,login,up,get,del %}
{% from 'time.twig' import ago %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% set login = login()|trim %}
{% set url=get_uri_segments() %}
{% macro history() %}
{% from 'func.twig' import add,login,up,get,del %}
{% from 'time.twig' import ago %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% set login = login()|trim %}
{% set url=get_uri_segments() %}
{% set per = '10' %}
{% set mip = get('ip_history_'~login) %}
{% set data = mip|split('@') %}
{% set total=data|length-1 %}
{% set page_max=total//per %}
{% if total//per != total/per %}
{% set page_max=total//per+1 %}
{% set p=get_get('p')|default(1) %}
{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*per-per %}
{% if total == '0' %}
<div class="rmenu">Chưa cập nhật lịch sử ip của bạn. Vui lòng đăng xuất -> đăng nhập lại để cập nhật!</div>
{% else %}
<div class="phdr"><a href="/account">Hồ sơ</a> | <b>IP History</b></div>
{% for t in data|slice(0,total)|slice(st,per) %}
{% set timeup = t|split('_')[2]|trim %}
{% set iip = t|split('_')[1]|trim %}
{% set default = t|split('_')[0]|trim %}
<div class="list1">- 
<a href="?whois_ip={{iip}}">{{iip}}</a> <i class="gray">{{ago(timeup)}}</i>
</div>
{% endfor %}
{% endif %}
</div>
{{paging('?p',p,page_max)}}
{% endif %}
{% endmacro %}