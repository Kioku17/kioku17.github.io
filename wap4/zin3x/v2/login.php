{% use '_templates' %}
{% import '_functions' as func %}
{% set url = get_uri_segments() %}
{% set signin = func.signin()|trim %}
{% set run = get_data('forum')[0].data|json_decode %}
{% set title = (current_url|split('/').2)|upper~' | Đăng Nhập' %}
{% if signin %}
<script language="javascript" type="text/javascript"> 
window.location.href="/manager"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/manager">
{% else %}
{{block('header')}}
{% set user=get_post('user') %}
{% set pass=get_post('pass') %}
<h1 class="title-movies">Đăng Nhập</h1>
<div class="body_sub">
{% if request_method()|lower == "post" %} 
{% if user and pass %}
{% if get_data_count('user_'~func.rwurl(user))==0 %}
<p><font color="red">Tài khoản không tồn tại.</font></p>
{% else %}
{% if func.get('user_'~func.rwurl(user),'pass')!=func.ma_hoa(pass)|trim %}
<p><font color="red">Mật khẩu không đúng.</font></p>
{% else %}
<p><font color="green">Đăng nhập thành công.</fon></p>
{{ set_cookie('token',func.get('user_'~func.rwurl(user),'token')|trim) }} 
<script language="javascript" type="text/javascript"> 
window.location.href="/"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/">
{% endif %}
{% endif %}
{% else %}
<p><font color="red">Vui lòng điền đầy đủ thông tin!</font></p>
   {% endif %}
{% endif %}
<form method="post" action="">
<center>
<p>Tài khoản:<input class="form-control" type="text" name="user" placeholder="Nhập tài khoản" autofocus></p>
<p>Mậy khẩu:<input class="form-control" type="password"  name="pass" placeholder="Nhập mật khẩu" autofocus></p>
</center>
<p><center><b style="color:red">*</b> Sử dụng tài khoản Zin3X để đăng nhập. Hãy <a href="/registration.php">Đăng ký</a> nếu chưa có tài khoản!</center></p>
<p><center><input class="btn btn-primary" type="submit" name="submit" value="Đăng nhập"></center></p>
</form>
</div>
{#{% set checkpass = func.get('bot','pass') %}#}
{{block('footer')}}
{% endif %}