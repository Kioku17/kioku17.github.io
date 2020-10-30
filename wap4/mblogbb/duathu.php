{% from 'func.twig' import get,add,up,login %}
{% set title = 'Khu giải trí | Đua thú vui nhộn' %}
{% set login = login()|trim %}
{% use '_blocks' %}
{% set ketqua = get_post('ketqua') %}
{% set thu = get_post('thu') %}
{% set tien = get_post('tien') %}
{% set tienxu = get('user_'~login,'xu') %}
{{block('head')}}
<div class="mainblok">
{% if not login %}
 <div class="rmenu">Bạn phải đăng nhập để chơi game này nhé !</div>
{% else %}
 <div class="phdr"><b>Khu Giải Trí</b> » Đua Pet</div>
{# Mod đua thú twig by khanhirg #}
{% if request_method()|lower == "post" %}
{% set kq = random(['1','2','3','4','5','6','7']) %}
{% set kqt %}{% if kq == 1 %}Thánh nhím{% elseif kq == 2 %}Rồng huyền thoại{% elseif kq == 3 %}Rắn săn mồi{% elseif kq == 4 %}Mini tototo{% elseif kq == 5 %}Con bướm xinh{% elseif kq == 6 %}Người ngoài hành tinh{% elseif kq == 7 %}Khủng long phun lửa{% endif %}{% endset %}
{% if tien < 0 %}
<div class="list-me">Lỗi! số tiền bạn đặt không hợp lệ</div>
{% elseif thu < 1 or thu > 7 %}
<div class="list-me">Lỗi! Thú bạn đặt không phù hợp</div>
{% elseif tien > 9 and tien < 2001 and tienxu >= '500' %}
{% if thu == kq %}
{% set loichuc = 'Xin chúc mừng! thú của bạn đã chiến thắng, bạn nhận được '~tien*5~' xu' %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+tien*5) }}
{% else %}
{% set loichuc = 'Xin chia buồn! Thú của bạn vì yếu sinh lý nên đã không thể chiến thắng' %}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim-tien) }}
{% endif %}
{% else %}
<div class="rmenu">Số tiền đặt cược không hợp lệ, bạn chỉ có thể đặt cược từ <b>10</b> đến <b>2000</b> xu và trong tài sản của bạn có ít nhất <b>500</b> xu</div>
{% endif %}
<div class="kg"></div><div class="buico"></div><div class="dd">
<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/1.gif"></marquee>

<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/2.gif"></marquee>

<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/3.gif"></marquee>

<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/4.gif"></marquee>

<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/5.gif"></marquee>

<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/6.gif"></marquee>
<marquee behavior="slide" direction="right" scrollamount="random1"><img src="/images/7.gif"></marquee>
{% if tien > 9 and tien < 2001 and tienxu >= '500' %}
<hr>KQ:<br/>
<marquee behavior="slide" direction="right" scrollamount="random{{kq}}"><img src="/images/{{kq}}.gif"></marquee>
{% endif %}
</div><div class="buico"></div>
<div class="list-me"><font color="red">{{loichuc}}</font><br/><a href="/duathu.php"><font color="blue">Tiếp tục</font></a></div></div>
{% if tien > 9 and tien < 2001 and tienxu >= '500' %}
{% set comment = {"name":"bot","time":"now"|date('U'), "comment":"[red][PET][/red] Thú đã win trong sự kiện đua thú lần này là [b] "~kqt~" [/b]"} %}
{% set save = save_data( "event", comment|json_encode ) %}
{% endif %}
{% else %}
<div class="rmenu">Win ăn <b>5</b>, thua mất <b>1</b>. Quá đã!!</div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/1.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Thánh nhím</h3><br>
<span class="quotes">Bạn có biết tml Rammus trong LOL không? Con nó đây này.</span></td></tr></tbody></table></div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/2.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Rồng huyền thoại</h3><br>
<span class="quotes">Sải cánh rất rộng, một sinh vật huyền thoại, ừ thì huyền thoại nhưng liệu bạn có tin được không.</span></td></tr></tbody></table></div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/3.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Rắn săn mồi</h3><br>
<span class="quotes">WTF?! Nó đã ở đây... Sinh vật không chân duy nhất tham gia cuộc đua, hãy tin tưởng nó theo cách của bạn.</span></td></tr></tbody></table></div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/4.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Mini Totoro</h3><br>
<span class="quotes">Các thím đã xem phim này rồi chứ, nó chạy rất nhanh phải không nào? Nhưng totoro bé thế này thì không biết có làm nên trò trống gì không đây.</span></td></tr></tbody></table></div><div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/5.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Con bướm xinh</h3><br>
<span class="quotes">Dành cho những người yêu thích "BƯỚM"</span></td></tr></tbody></table></div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/6.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Người ngoài hành tinh</h3><br>
<span class="quotes">Nhanh hay chậm? Hỏi nó mới biết, người ta gọi đây là từ trên trời rơi xuống đây mà!</span></td></tr></tbody></table></div>
<div class="list-me">
<table cellpadding="0" cellspacing="0" width="100%" border="0" style="table-layout:fixed;word-wrap: break-word;"><tbody><tr><td style="vertical-align: top;width:45px;"><img src="/images/7.gif" height="60" width="60" alt="*"></td><td><h3 style="font-size:12px">Khủng long phun lửa</h3><br>
<span class="quotes">Tùy vào liều lượng chén ớt của nó để đi tìm nguồn nước uống phù hợp.</span></td></tr></tbody></table></div>
{% if tienxu >= '500' %}
<div class="phdr">Đặt cược</div><div class="list-me">
<form action="?ketqua" method="post">
<select name="thu"><option value="1">Thánh nhím</option><option value="2">Rồng huyền thoại</option><option value="3">Rắn thợ săn</option><option value="4">Mini totoro</option><option value="5">Con bướm xinh</option><option value="6">Người ngoài hành tinh</option><option value="7">Khủng long phun nửa</option></select><br/>
Tiền đặt: <br/><input type="text" name="tien"/><br/>
<input type="submit" name="ketqua" value="Xem kết quả"/></form></div>
{% else %}
<div class="rmenu">Bạn phải có ít nhất <b>500 xu</b> để tham gia sự kiện này!</div>
{% endif %}
{% endif %}
{# Mod đua thú twig by khanhirg #}
{% endif %}
</div>
{{block('end')}}
