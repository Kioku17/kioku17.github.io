{% use '_templates' %}
{% import '_functions' as func %}
{% import '_functions_blog' as blog %}
{% from 'function.twig' import add,mi_add,slug,time,description %}
{% import '_avatar' as avatar %}
{% from 'func.twig' import mi_get,mi_up,k_del,get,html_decode %}
{% set url = get_uri_segments() %}
{% if get_get('url')!='' and (current_url|split('/').2)!=(get_get('url')|split('/').2) %}
{{block('header')}}
<h1 class="title-movies">Liên kết ngoài</h1>
<div class="result-post">
<font style="font-weight:700;font-size:20px">CHÚ Ý</font><br/>Bạn sẽ rời khỏi trang web của chúng tôi và đi đến một liên kết ngoài:<br/><font style="font-weight:700;font-size:16px;color:red">{{get_get('url')}}</font><br/>Chúng tôi không chịu trách nhiệm về nội dung của trang web bạn sắp vào
</div>
<div class="result-post"><a href="{{get_get('url')}}"><button style="display:inline-block;background:#E3E8EA;color:#333;padding:2px 35px;margin-left:0;margin-right:0;border-radius:2px;box-shadow:0 2px 4px 0 rgba(0,0,0,.5);background-image:linear-gradient(to bottom,#e0e0e0,#b7b7b7);line-height:1.42857143;font-size:14px">Đồng ý</button></a> <a href="/index.php">[ Quay lại trang chủ ]</a></div>
{{block('footer')}}
{% elseif get_get('url')!='' and (current_url|split('/').2)==(get_get('url')|split('/').2) %}
<script language="javascript" type="text/javascript"> 
window.location.href="{{get_get('url')}}"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL={{get_get('url')}}">
{% else %}
{% include '_404' %}
{% endif %}