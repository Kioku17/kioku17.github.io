{% set logout=get_post('logout') %}
{% if request_method()|lower == "post" %}
{% if logout %}
{{ delete_cookie('auto') }}
{% use '_blocks' %}
<script>window.location.href='/'</script>
 {{ block('end') }}
{% endif %}
{% else %}
{% use '_blocks' %}
{{ block('head') }}
<div class="mainblok">
 <div class="phdr">Đăng Xuất</div>
 <div class="list1">Xác nhận thoát.</div> 
<div class="list1">Bạn muốn đăng xuất.!?<br/>
<form method="post" action=""><input type="submit" name="logout" value="Đồng ý" /> <a href="/">Về trang chủ</a></form></div>
</div>
{{ block('end') }} 
{% endif %}