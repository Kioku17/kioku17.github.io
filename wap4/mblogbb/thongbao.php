{% from 'func.twig' import add,login,up,get,del %}
{% from 'time.twig' import ago %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% from 'thongbao.php' import tb %}
{% set login = login()|trim %}
{% macro tb(act) %}
{% from 'func.twig' import add,login,up,get,del %}
{% from 'time.twig' import ago %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% set login = login()|trim %}
{% set per = '10' %}
{% set data = get('tb_'~act~'_'~login)|split('@') %}
{% set total=data|length-1 %}
{% set page_max=total//per %}
{% if total//per != total/per %}
{% set page_max=total//per+1 %}
{% endif %}
{% set p=get_get('p')|default(1) %}
{% if p matches '/[a-zA-z]|%/' or p<1 %}
{% set p=1 %}
{% endif %}
{% if p>page_max %}
{% set p=page_max %}
{% endif %}
{% set st=p*per-per %}
{% if total == '0' %}
<div class="list1">Chưa có thông báo nào</div>
{% else %}
{% for t in data|slice(0,total)|slice(st,per) %}
{% set t6 = t|split('-')[6]|trim %}
{% set t5 = t|split('-')[5]|trim %}
{% set t4 = t|split('-')[4]|trim %}
{% set t3 = t|split('-')[3]|trim %}
{% set t2 = t|split('-')[2]|trim %}
{% set t1 = t|split('-')[1]|trim %}
{% set t0 = t|split('-')[0]|trim %}
{% set time = get(t0~'_'~t1~'_'~t2,'time')|trim %}
{% set nd = get(t0~'_'~t1~'_'~t2,'nd') %}
{% set view = get('mail_'~t|trim,'view') %}
{% if act == 'chua_xem' %}<div class="list3">{% else %}<div class="list1">{% endif %}<div>{% if act == 'chua_xem' %}<b>{% endif %}{% if t1 == 'post' or t1 == 'cmt' %}<img src="/images/say.png">{% elseif t1 == 'tinnhiem' %}<img src="/images/tn.png">{% elseif t1 == 'like' %}<img src="/images/like.png">{% endif %} <a href="/{% if t1 == 'cmt' or t1 == 'like' or t1 == 'tinnhiem' %}threads/{{t2}}{% else %}account/{{t5}}{% endif %}" class="gray"><span class="{{get('user_'~t4,'level')}}">{{get('user_'~t4,'nick')}}</span> {% if t1 == 'post' %}đã đăng lên tường của {% elseif t1 == 'cmt' %}đã bình luận về 1 bài viết  có mặt {% elseif t1 == 'like' %}đã thích bài viết của {% elseif t1 == 'tinnhiem' %} đã cộng 1 điểm tín nhiệm cho {% endif %}{% if from != login %}<span class="{{get('user_'~t5,'level')}}">bạn</span>{% else %}của bạn.{% endif %}</a>{% if act == 'chua_xem' %}</b>{% endif %} <i class="gray">({{ago(t6)}})</i></div>
</div>
{% if act == 'chua_xem' %}
{{up('tb_da_xem_'~login,t0~'-'~t1~'-'~t2~'-'~t3~'-'~t4~'-'~t5~'-'~t6,'up')}}
{{del('tb_chua_xem_'~login,t0~'-'~t1~'-'~t2~'-'~t3~'-'~t4~'-'~t5~'-'~t6,'up')}}
{% endif %}
{% endfor %}
{% endif %}
{{paging(url[1]~'?p',p,page_max)}}
{% endmacro %}
{% if login %}
{% set act = get_get('act') %}
<div class="phdr"><a href="/">Trang chủ</a> » <b>Thông báo của bạn</b></div>
{% if act == 'chua_xem' %}
{{tb('chua_xem')}}
{% else %}
{{tb('da_xem')}}
{% set thongbao = get('tb_da_xem_'~login)|split('@') %}
{% set totaltb = thongbao|length-1 %}
<div class="phdr">Tổng số: {{totaltb|default(0)}}</div>
{% if totaltb >= '5' %}
{% if get_get('want') == 'delete' %}
{% if totaltb >= '5' %}
<div class="rmenu">Xoá thành công! Hoạt động trống.</div>
{% set key = 'tb_da_xem_'~login %}
{% for i in 1..get_data_count(key) %}
{{ delete_data_by_id(key,get_data(key)|last.id) }}
{% endfor %}
 <script>window.location.href='/users/thongbao.php'</script>
{% endif %}
{% endif %}
<div class="rmenu">» <a href="?want=delete"><font color="red">Xóa tất cả thông báo</font></a></div>{% endif %}
{% endif %}
{% else %}
{% include '_404' %}
{% endif %}