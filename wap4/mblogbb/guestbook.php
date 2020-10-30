{% from 'func.twig' import login,get,add %}
{% from 'paging.twig' import paging %}
{% from 'bbcode.twig' import bbcode %}
{% set login = login()|trim %}
{% set user = get_data('user_'~login)[0].data|json_decode %}
<div class="phdr"><b>Phòng Chat</b></div>
{% set s = '<a href="/pages/smileys/index.php">[Smile]</a>' %}
{% if get('user_'~login,'block') == 'yes' %}
<div class="phdr"><b>Thông Báo</b></div>
<div class="rmenu"> Tài khoản của bạn đã bị khóa, vui lòng liên hệ với BQT để tìm hiểu lý do và ân xá để lấy lại. BQT xin trân trọng thông báo!</div>
{% else %}
{% if login %}
<div class="user">Nếu xảy ra lỗi khi Chat, hãy vui lòng <a href="/ ">Refresh</a> lại trang<span style="text-align:right"></span></div>
<div class="list1">
<textarea type="text" name="msg" id="msg"></textarea><br />
<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value=" Chat "/> {{s|raw}}
</div>
{% else %}
<div class="rmenu">Hãy <a href="/login.php"><b>đăng nhập</b></a> để cùng thảo luận với <b style="color:red">diễn đàn</b> !</div>
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
{% if data|length >= '250' or (user.level=='right9s' and get_get('act')=='clear') %}
<div class="rmenu">BOT tự động xóa nội dung Chatbox. Phòng chat trống !</div>
{% set key = 'chat' %}
{% for i in 1..get_data_count(key) %}
{{ delete_data_by_id(key,get_data(key)|last.id) }}
{% endfor %}
{% set comment = {"name":"bot","time":"now"|date('U'), "comment":"Đã làm sạch chatbox !" } %}
{% set status = save_data( "chat", comment|json_encode ) %}
 <script>window.location.href='/'</script>
{% endif %}
{% endif %}
<div id="result"> 
<div class="list1">Loading...</div>
</div> 