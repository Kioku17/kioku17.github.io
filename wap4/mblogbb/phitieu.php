{% use '_blocks' %}   
   {% set title='Khu giải trí | Phi tiêu' %}   
 {% from 'func.twig' import rwurl,up,get,add,login %}
   {{ block('head') }}   
   {% set login=login()|trim %}
<div class="mainblok">
  <div class="phdr"><b>Khu Giải Trí</b> » Phi tiêu</div>
{% if login %}
{% set cuoc = get_post('muccuoc') %}
{% set chon = get_post('chon') %}
{% set act= get_get('act') %}
{% set xu=get('user_'~login,'xu') %}
{% set nick=get('user_'~login,'nick') %}
{% set ketqua=random(0..6) %}
{% set rand1 = random(9..12) %}
{% set rand2 = random(2..15) %}
{% set rand3 = random(11..14) %}
 {% if request_method()|lower == "post" %}
{% set tiencuoc %}{{cuoc >=200 and cuoc <= 500}}{% endset %}
<div class="list1">
{% if tiencuoc %}
<center><img src="/images/phitieu{{ketqua}}.gif"></center>
{% endif %}
{%if ketqua=='0' and tiencuoc%}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim-cuoc-2000) }}
{%elseif ketqua=='1' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+rand1) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{%elseif ketqua=='2' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+rand2) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{%elseif ketqua=='3' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+rand3) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{%elseif ketqua=='4' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+8) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{%elseif ketqua=='5' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+17) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{%elseif ketqua=='6' and tiencuoc%}
{{ add('user_'~login,'db',get('user_'~login,'db')|trim+1) }}
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+cuoc) }}
{% elseif not tiencuoc %}
Số tiền cược không hợp lệ!
{%endif%}
{% if tiencuoc %}
{% if ketqua >= '1' and ketqua <= '6' and tiencuoc %}Thầy Phán: Thầy xin chúc mừng con! Con đã ném trúng vị trí {% if ketqua == '1' %} giữa số 9 và số 12{% elseif ketqua == '2' %} giữa số 2 và số 15{% elseif ketqua == '3' %} giữa số 11 và số 14{% elseif ketqua == '4' %} số 8{% elseif ketqua == '5' %} số 17{% elseif ketqua == '6' %} số 1 {% endif %}, con được tặng <b>{{cuoc}}</b> xu vào tài khoản và <b>{% if ketqua == '1' %}{{rand1}}{% elseif ketqua == '2' %}{{rand2}}{% elseif ketqua == '3' %}{{rand3}}{% elseif ketqua == '4' %} 8{% elseif ketqua == '5' %}17{% elseif ketqua == '6' %}1{% endif %}</b> điểm exp.
{% elseif ketqua == '0' %}Thầy Phán: Xin chia buồn :(( con ném tiêu bị hụt rồi. Tiếp tục để gỡ lại nào!
{% endif %}
{% endif %}</div>
<div class="list1">» <a href="/phitieu.php">Quay lại</a></div>
{% else %}
<div class="list1">
Số tiền của bạn: <b style="color:red">{{xu}} xu</b>
<br/>
Điểm EXP: <b style="color:blue">{{get('user_'~login,'db')}}</b>
<hr/> Cùng nhau kiếm điểm exp qua game phi tiêu, bà con mại zo mại zo :))
<center><form action="" method="post">
<img src="/images/phitieu0.gif">
<br><br></center><b>Nhập số tiền cược:</b> Tối thiểu là 200 xu, tối đa là 500 xu
<br><input type="text" name="muccuoc" maxlength="5"><br><input type="submit" name="submit" value="Đồng ý"></form>
</div>
{% endif %}
<div class="phdr"><b>Luật chơi »</b></div><div class="list1">
Luật chơi rất đơn giản:
<br/>- Khi bạn ném phi tiêu, trúng mục tiêu nào thì nhận exp với số điểm tương ứng của mục tiêu và được cộng thêm xu theo mức cược.
<br/><i>- Ví dụ: Bạn đặt 500 xu, khi phi tiêu trúng số 8 thì bạn sẽ nhận được 500 xu và 8 điểm exp</i>
<br/>- Nếu bạn không ném trúng mục tiêu thì bạn sẽ bị trừ xu theo mức cược và 2000 xu để thầy phán tặng cho diễn đàn m.blogbb.gq.
</div>
{% else %}
<div class="rmenu">Vui lòng đăng nhập để chơi game</div>
{% endif %}
</div>
 {{ block('end') }}