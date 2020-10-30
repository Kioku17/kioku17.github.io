{% if get_cookie('theme')=='default' %}
{{set_cookie('theme','default')}}
{% else %}
{{set_cookie('theme','mobile')}}
{% endif %}
<script language="javascript" type="text/javascript"> 
window.location.href="/main.php"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/main.php">