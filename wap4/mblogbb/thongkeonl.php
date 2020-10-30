{% from 'func.twig' import get,add,up,login,del,account %}
{% set on=get('show_online')|trim %}
{% set online = {} %}
{% set member=get_data_count('id_users') %}
{% for v in on|split('@') %}
{% if loop.last==false %}
{% if get('user_'~v|trim,'on')|trim > "now"|date("U")-300 %}
{% set list_on %}<a href="/account/{{v|trim}}">{{account(v|trim)}}</a>{% endset %}
{% set online=online|merge({(v|trim):list_on}) %}
{% else %}
{{del('show_online',v|trim,'up')}}
{% endif %}
{% endif %}
{% endfor %}
<div class="mainblok">
<div class="phdr"><i class="fa fa-signal"></i> <b>Đang Online</b></div>
<div class="listonl">Hiện tại có <b>{{get('online_total')|split('@')|length}}</b> người đang trực tuyến: <b>{{online|length}}</b> thành viên{% if (get('online_total')|split('@')|length-online|length) != '0' %}, <b>{{get('online_total')|split('@')|length-online|length}}</b> khách
{% endif %}
<br/>
Thành viên online: {{online|sort|join(', ')|raw}}</div>
</div>
</div>