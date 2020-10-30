{% from 'func.twig' import get,add,up,login,account %}
{% from 'bbcode.twig' import bbcode %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% from 'bot' import bot %}
{% from 'bot-thay-phan' import thayphan %}
{% from 'bot-chat' import botchat %}
{% set login = login()|trim %}
{% set uid = get_data('user_'~login)[0].data|json_decode %}
{% if get_post( 'msg' ) %}
{% set comment = {"name" :login,"time":"now"|date('U'), "comment": get_post( 'msg' ) } %}
{% set status = save_data( "chat", comment|json_encode ) %}
{% if get('cms_setting','chatbox') == '2' %}
<script language="javascript" type="text/javascript">
window.location.href="?post={{"now"|date('U')}}";
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=?post={{"now"|date('U')}}">
{% endif %}
{# chống spam space #}
{% if get_post('msg')|trim != ' ' %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+2) }}
{# kết thúc #}
{{bot(get_post('msg'),'bot')}}
{{thayphan(get_post('msg'),login)}}
{{botchat(get_post('msg'),login)}}
{% endif %}
{% endif %}
{% set data=[] %}
{% set play='yes' %}
{% for i in 1..100 %}
{% if play=='yes' %}
{% set data2=get_data( 'chat',100,i) %}
{% endif %}
{% if data2 %}
{% set data=data2|reverse|merge(data) %}
{% else %}
{% set play='no' %}
{% set data2='' %}
{% endif %}
{% endfor %}
{% set total=data|length %}
{% set per = '10' %}
 {% set page_max=total//per %}
{% if total//per != total/per %}
{% set page_max=total//per+1 %}
{% endif %}
 {% set url=get_get('page') %}
{% set p=url|default('1') %}
{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*per-per %}
{% from 'time.twig' import ago %}
{% set entries= data|slice(st,10) %}
{% set data='' %}
{% if total == 0 %}
<div class="rmenu">Chưa có nội dung nào</div>
{% endif %}
 {% if uid.css == 'mobile' %}<div class="chatbox-container"><div class="chatbox-wrapper">{% endif %}
{% for tiax in entries %}
{% set entry = tiax.data|json_decode %}
{% set user='user_'~entry.name %}
{% set nd = entry.comment %}
{% set on=get(user,'on')|trim %}
{% set time = entry.time %}
 {% if uid.css == 'mobile' %}<div class="chatb story_{{loop.index}}">{% else %}<div class="list1">{% endif %}{% if entry.name %}
<span name="online">{% if on < ('now'|date('U')-300) %}<i class="fa fa-toggle-off" style="color: #868686;"></i>{% else %}<font color="green"><i class="fa fa-toggle-on" style="color:#5bc55a"></i></font>{% endif %}</span> <a href="/account/{{entry.name}}">{{account(entry.name)}}</a>{% else %}<b>{{entry.nick}}</b>{% endif %}{% if login and uid.css == 'mobile' %}{% else %}:{% endif %} {% if login and uid.css == 'mobile' %}<font color="gray">({{ago(time)}})</font>{% endif %}{% if login and uid.css == 'mobile' %}<br/>{% endif %} {% if get(user,'block') == 'yes' %}<font color="gray">nội dung bị ẩn</font>{% else %}{{bbcode(nd|raw)}} {% if login and uid.css == 'mobile' %}{% else %}<font color="gray">({{ago(time)}})</font>{% endif %}{% endif %}
</div>
{% endfor %}
 {% if uid.css == 'mobile' %}
</div></div>
{% endif %}