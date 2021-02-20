{% import '_functions' as func %}
{% from '_functions' import get,ago,bbcode %}
{% import '_avatar' as avatar %}
{% set login = func.signin()|trim %}
{% set name = login %}
{% set ubot = get_data('user_apple')[0].data|json_decode %}
{% set id = func.get('guestbook')|split('@')[19]|trim %}
{% if login %}
{% set name = login %}
{% else %}
{% set name = get_cookie('nickname')|default('Khách') %}
{% endif %}
{% set msg = get_post('msg')|slice(0,5000) %}
{% set now = "now"|date("U") %}
{% if msg != '' and msg != '\r\n' and msg!=null and msg|length <= '5000' %}
{% set comment = {"name" :name,"time":now,"comment":msg} %}
{{func.add('chat_'~id,'name',name)}}
{{func.add('chat_'~id,'time',now)}}
{{func.add('chat_'~id,'comment',msg)}} 
{{func.up('guestbook',id,'up')}}
{% endif %}
{% set data= func.get('guestbook')|trim|split('@') %}
{% set total=data|length-1 %} 
 {% set page_max=total//10 %}
{% if total//10 != total/10 %}
{% set page_max=total//10+1 %}
{% endif %}
 {% set url=get_uri_segments() %}
{% set p=url[1]|default(1) %} 

{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*10-10 %}
{% for id in data|slice(0,total)|slice(st,10) %}
{% set entry = get_data('chat_'~id|trim)[0].data|json_decode %}
{% set user='user_'~entry.name %}
{% set info=get_data(user)[0].data|json_decode %}
{% set nd = entry.comment %}
{% set time = entry.time %}
{% set jun = now-time %}
{% if jun > 1 %}
{% if time|date('d','Asia/Ho_Chi_Minh') == 'now'|date('d','Asia/Ho_Chi_Minh') %}
{% set agos = ago(time) %}
{% else %}
{% set agos = time|date("H:i, d/m/Y","Asia/Ho_Chi_Minh")|replace({(now|date("d/m/Y","Asia/Ho_Chi_Minh")):'Hôm nay'}) %}
{% endif %}
{% else %}
{% set agos = 'vừa xong' %}
{% endif %}
{% if entry.name %}
<div class="result-post">{{avatar.mau_nick(entry.name,info.right)}}: {{bbcode(nd|raw)}} <font color="gray">({{agos}})</font> {% if entry.name!=name %}<a href="javascript:tag('[quote]{{id|trim}}[/quote] ', '')">[Trả lời]</a>{% endif %}</div>
{% endif %} 
{% endfor %}