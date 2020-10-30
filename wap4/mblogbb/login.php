{% use '_blocks' %}
 {{ block( 'head' ) }} 
 {% from 'func.twig' import rwurl,get,add,auto,up %}
 {% set url=get_uri_segments() %}
<div class="mainblok">
 <div class="phdr"><b>Đăng Nhập</b></div>
 {# kiểm tra và lưu tài khoản #}
{% set user = get_post('user') %}
{% set pass = get_post('pass') %}
{% if request_method()|lower == "post" %} 
{% if user and pass %}
{% if get_data_count('user_'~rwurl(user))==0 %}
<div class="list1">Tài khoản không tồn tại.</div>
{% else %}
{% if get('user_'~rwurl(user),'pass')!=pass %}
 <div class="list1">Mật khẩu không đúng hoặc chưa xác minh không phải là robot.</div>
{% else %}
 <div class="rmenu">Đăng nhập thành công.</div>
{% if get_post('auto')=='auto' %}
{% set auto=auto()|trim %}
{{ delete_data_by_id('auto_'~get('user_'~rwurl(user),'auto')|trim,get_data('auto_'~get('user_'~rwurl(user),'auto')|trim)|last.id) }}
 {% set save=save_data('auto_'~auto,''~rwurl(user)~'') %}
{{up('ip_history_'~user,'ip_'~ip()~'_'~"now"|date('U'),'up')}}
{{ add('user_'~rwurl(user),'auto',auto) }}
{{ set_cookie('auto',auto) }}
{% else %}
{{ set_cookie('auto',get('user_'~rwurl(user),'auto')|trim) }} 
{% endif %}
{{up('ip_history_'~user,'ip_'~ip()~'_'~"now"|date('U'),'up')}}
<script>window.location.href='/'</script>
{% endif %}
{% endif %}
{% else %}
<div class="rmenu"> Vui lòng điền đầy đủ thông tin.</div>
   {% endif %}
{% endif %}
 <div class="list1"> 
<form method="post" action="">Tên tài khoản:<br/><input type="text" name="user" autofocus><br/>Mật khẩu:<br/> <input type="password"  name="pass" autofocus><br/> <input type="checkbox" name="auto" value="auto">   Đăng xuất khỏi thiết bị khác?<br />
<input type="submit" name="submit" value="Đăng Nhập"></form></div>
{% set checkpass = get('bot','pass') %} 
</div>
 {{ block( 'end' ) }} 