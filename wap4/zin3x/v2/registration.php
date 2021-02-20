{% use '_templates' %}
{% import '_functions' as func %}
{% from 'function.twig' import mi_add %}
{% from 'func.twig' import get,mi_get,html_decode %}
{% set url = get_uri_segments() %}
{% set signin = func.signin()|trim %}
{% set run = get_data('forum')[0].data|json_decode %}
{% set title = (current_url|split('/').2)|upper~' | Đăng ký tài khoản' %}
{% if signin %}
<script language="javascript" type="text/javascript"> 
window.location.href="/manager"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/manager">
{% else %}
{% if run.account <= '5' %}
{{block('header')}}
<h1 class="title-movies">Đăng Ký</h1>
<div class="body_sub">
{# kiểm tra và lưu tài khoản #}
{% set user = get_post('user') %}
{% set pass = get_post('pass') %} 
{% set repass = get_post('repass') %} 
{% set mbv = get_post('captcha') %}
{% set captcha = get_cookie('captcha')|lower %}
{% set token=func.token()|trim %}
{% set registration %}
<p>{{block('mem')}}</p>
<form method="post" action="">
<table width="100%"><tr><td style="width:50%;text-align:right">Tài khoản:<br/>(Min.3 - Max.15)</td><td><input class="form-control" type="text" name="user" value="" required></td></tr><tr><td style="width:50%;text-align:right">Mật khẩu:</td><td><input class="form-control" type="password"  name="pass" value="" required></td></tr><tr><td style="width:50%;text-align:right">Nhập lại mật khẩu:</td><td><input class="form-control" type="password" name="repass" value="" required></td></tr><tr><td style="width:50%;text-align:right">Mã xác nhận:<br/>[ <b>{{captcha}}</b> ]</td><td><input class="form-control" type="number" name="captcha" value="" required></td></tr></table>
<p><center><input class="btn btn-primary" type="submit" name="submit" value="Đăng ký"></center></p></form>
{% endset %}
{% if request_method()|lower == "post" %}
{% if user and pass and repass and mbv %} 
{% if ("now"|date("U") < run.time_reg )%}   
<p><font color="red">Xin lỗi vì sự cố này, bạn có thể tiếp tục đăng ký tài khoản sau {{run.time_reg - "now"|date("U")}} giây</font></p>
{% elseif pass!=repass %}
<p><font color="red">Mật khẩu xác nhận không đúng.</font></p>
{% elseif captcha!=mbv %}
<p><font color="red">Mã xác nhận không đúng.</font></p>
{% else %}
{% if get_data_count('user_'~func.rwurl(user))>0 %} 
<p><font color="red">Tài khoản đã tồn tại.</font></p>
{{registration}}
{% elseif user|length<3 or user|length>15 %}
<p><font color="red">Tài khoản không dài quá 15 kí tự, tối thiểu 3 kí tự</font></p>
{{registration}}
{% elseif user=='bot' %}
<p><font color="red">Bạn không thể đăng ký sử dụng tài khoản này !</font></p>
{{registration}}
{% else %} 
{% if user matches '/^[a-zA-Z0-9\\-\\_]+[a-zA-Z0-9\\-\\_]$/' %} 
{# xác minh người máy #}
{% set data={"id":run.account|trim+1,"name":user,"nick":user,"pass":func.ma_hoa(pass)|trim,"right":"0","vnd":"0","token":token,"reg":"now"|date("U")} %}
{% set status = save_data("user_"~func.rwurl(user),data|json_encode) %}
<div style="border-style: dotted;margin:4px 3px 3px 3px;padding:4px">
<p><b><big>Dữ liệu thông tin:</big></b></p>
<p><b>Tài khoản:</b> {{user}} </p>
<p><b>Mật khẩu:</b> {{pass}} </p>
<p><a href="/login.php"><button class="btn btn-primary">Đăng Nhập</button></a> | <a href="/manager">Bảng Quản Trị</a></p>
</div>
{% set old_token = html_decode(get('token'))|replace({'”':'"'}) %}
{% set new_token = old_token|json_decode|merge({(token):(user)}) %}
{{mi_add('token',(new_token))}}
{#{{func.add('token',token,user)}}#}
{{func.add('forum','new_mem',user)}}
{{func.add('forum','time_reg',"now"|date("U")+50)}}
{{func.add('forum','account',run.account|trim+1)}}
{{func.up('member',func.rwurl(user),'up')}}
{{set_cookie('token',token)}}
{{set_cookie('captcha',random(1000..9999))|lower}}
{% else %}
<p><font color="red">Tài khoản không được chứa ký tự đặc biệt.</font></p>
{{registration}}
{% endif %} 



{% endif %}
{% endif %}
{% else %}
<p><font color="red">Vui lòng điền đầy đủ thông tin và xác minh Tôi không phải là người máy!</font></p>
{{registration}}
{% endif %}
{% else %}
{{registration}}
{% endif %}
</div>
{{block('footer')}}
{% else %}
{% include '_404' %}
{% endif %}
{% endif %}