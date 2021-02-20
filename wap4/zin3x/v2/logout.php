{% import '_functions' as func %}
{% set signin = func.signin()|trim %}
{% set title = 'Đăng xuất | Cà Phê Đắng' %}
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=yes">
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="width" />
<title>{{title}}</title>
</head>
<body>
{% if signin %}
{{delete_cookie('token')}}
<script language="javascript" type="text/javascript"> 
window.location.href="/index.php"; 
</script> 
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/index.php">
{% endif %}
</body>
</html>
