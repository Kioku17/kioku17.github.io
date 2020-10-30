{% from 'func.twig' import login,get,add,up %}
{% set login = login()|trim %}
{% set user = 'user_'~login %}
{% set vip = get(user,'icon') %}
{% set rank = get(user,'icon2') %}
{% set nhanqua = "now"|date('d','Asia/Ho_Chi_Minh') %}
{% set baodanh = get(user,'date_nhan_qua')|default(0) %}
{% use '_blocks' %}
{% set title = 'Hộp quà may mắn' %}
{% if login %}
{{block('head')}}
<link rel="stylesheet" href="/theme/farm.css" />
<div class="mainblok"><div class="phdr"><b>Hộp quà may mắn &raquo;</b></div>
<div class="farm">
<div class="center star_fruit_tree_2">
  <div align="center">
    <img src="/images/laibuon.gif" />
  </div>
  </div></div>
<div class="list1"><b>Lưu ý:</b> Mỗi ngày bạn chỉ có thể nhận quà một lần!
<br/>Giá trị phần quà như sau:
<br/>- Thành viên thường: 2000 xu
<br/>- Thành viên <span style="color:red; font-weight:bold;">[PRO]</span>, <span style="color:red; font-weight:bold;">[RANK]</span>: 5000 xu
<br/>- Thành viên <span style="color:red; font-weight:bold;">[VIP]</span>: 8000 xu
<br/>
{% if baodanh == '0' %}
{{add(user,'date_nhan_qua',nhanqua)}}
{% elseif baodanh == nhanqua %}
<br/>
<b>Bạn đã nhận quà hôm nay rồi. Vui lòng chờ đến ngày mai để nhận tiếp !!!</b>
{% elseif baodanh != '0' %}
{% if request_method()|lower == "post" %} 
{{add(user,'date_nhan_qua',nhanqua)}}
{% if vip == 'vip1' or vip == 'vip2' or vip == 'vip3' or rank == 'vip1' or rank == 'vip2' or rank == 'vip3' %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+8000) }}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+10) }}
{% elseif rank == 'pro' or rank == 'badao' or vip == 'pro' or rank == 'badao' %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+5000) }}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+7) }}
{% else %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+2000) }}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+5) }}
{% endif %}
<br/>
<b>Bạn nhận được <font color="red">{% if vip == 'vip1' or vip == 'vip2' or vip == 'vip3' %}8000 xu và 10 điểm exp{% elseif rank == 'pro' or rank == 'badao' %}5000 và 7 điểm exp{% else %}2000 xu và 5 điểm exp{% endif %} </font> cho việc báo danh ngày hôm nay !</b>
{% else %}
<form method="post" action="">
<input type="submit" name="submit" value=" Nhận quà ">
{% endif %}
{% endif %}
</div></div>
{{block('end')}}
{% endif %}