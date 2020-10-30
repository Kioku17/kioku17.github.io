{% from 'func.twig' import get,add,login%}
{% set login = login()|trim %}
{% set status = get_post('status') %}
{% set avatar = get_post('avatar') %}
{% set anhbia = get_post('anhbia') %}
{% set sex = get_post('sex') %}
{% set theme = get_post('theme') %}
{% set topic = get_post('topic') %}
{% set fullname = get_post('fullname') %}
{% set pass = get_post('pass') %}
{% set newpass = get_post('newpass') %}
{% set repass = get_post('repass') %}
{% set day = get_post('day') %}
{% set month = get_post('month') %}
{% set year = get_post('year') %}
{% set fullday = day~'/'~month~'/'~year %}
{% set ns = get(user,'ns')|split('/') %}
{% set mk = get(user,'pass') %}
{% set avt = get(user,'avt') %}
{% set abia = get(user,'abia') %}
{% set gt = get(user,'gt') %}
{% set css = get(user,'css') %}
{% set top = get(user,'top') %}
{% set tt = get(user,'status') %}
{% set ten = get(user,'fullname') %}
{% set days = get(user,'ns') %}
{% set nick = get(user,'nick') %}
{% set nck = get_post('nick') %}
<div class="phdr"><b>Cập nhật hồ sơ</b></div>
{% if request_method()|lower == 'post' %}
{% if status <= 50 and status != tt or avatar and avatar != avt or sex and sex != gt or fullname and fullname != ten or pass == mk and newpass == repass and repass != mk or day and month and year and fullday != days or nck != nick or topic != top or theme != css or abia != anhbia %}
<div class="rmenu">Cập nhật thành công</div>
{% endif %}
{% if nck %}
{% if nck != nick %}
{{add(user,'nick',nck)}}
{% endif %}
{% endif %}
{% if pass and newpass and repass %}
 {% if pass != mk %}
<div class="rmenu">Mật khẩu cũ sai</div>
{% elseif newpass != repass %}
<div class="rmenu">Mật khẩu mới và mật khẩu nhập lại không khớp</div>
{% else %}
{% if repass != mk %}
{{add(user,'pass',repass)}}
{% endif %}
{% endif %}
{% elseif pass or newpass or repass %}
<div class="rmenu">Vui lòng điền đầy đủ thông tin mật khẩu</div>
{% endif %}
{% if status %}
{% if status and status|length <=150 %}
{% if status != tt %}
{{add(user,'status',status)}}
{% endif %}
{% else %}
<div class="rmenu">Xin lỗi!Độ dài tâm trạng không hợp lệ.</div>
{% endif %}
{% endif %}
{% if day and month and year %}
{% if fullday != days %}
{{add(user,'ns',fullday)}}
{% endif %}
{% elseif day or month or year %}
<div class="rmenu">Vui lòng điền đầy đủ ngày, tháng, năm sinh</div>
{% endif %}
{% if avatar %}
{% if avatar != avt %}
{{add(user,'avt',avatar)}}
{% endif %}
{% endif %}
{% if anhbia %}
{% if anhbia != abia %}
{{add(user,'abia',anhbia)}}
{% endif %}
{% endif %}
{% if sex %}
{% if sex != gt %}
{{add(user,'gt',sex)}}
{% endif %}
{% endif %}
{% if theme %}
{% if theme != css %}
{{add(user,'css',theme)}}
<script language="javascript" type="text/javascript">
window.location.href="/";
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/">
{% endif %}
{% endif %}
{% if topic %}
{% if topic != top %}
{{add(user,'top',topic)}}
{% endif %}
{% endif %}
{% if fullname %}
{% if fullname != ten %}
{{add(user,'fullname',fullname)}}
{% endif %}
{% endif %}
{% endif %}
<form method="post" action="">
<div class="list1">
<b>Thông tin cá nhân</b>
<br />
Chữ ký (3 - 150 kí tự)
<br />
<input type="text" name="status" value="{{status|default(tt)}}">
<br />
Ảnh đại diện:
<br />
<input type="text" name="avatar" value="{{avatar|default(avt)}}">
<br />
Ảnh bìa:
<br />
<input type="text" name="anhbia" value="{{anhbia|default(abia)}}">
<br />
Giới tính:
<br />
<input type="radio" name="sex" value="boy" {% if gt == 'boy' %}checked="checked" {% endif %}/> Con trai<br />
<input type="radio" name="sex" value="girl" {% if gt == 'girl' %}checked="checked" {% endif %}/> Con gái<br />
<input type="radio" name="sex" value="girl" {% if gt == 'gay' %}checked="checked" {% endif %}/> Không xác định
<br />
Theme:
<br />
<input type="radio" name="theme" value="default" {% if css == 'default' %}checked="checked" {% endif %}/> Default<br />
<input type="radio" name="theme" value="mobile" {% if css == 'mobile' %}checked="checked" {% endif %}/> Mobile
<br />
Viết bài:
<br />
<input type="radio" name="topic" value="yes" {% if top == 'yes' %}checked="checked" {% endif %}/> Bật<br />
<input type="radio" name="topic" value="no" {% if top == 'no' %}checked="checked" {% endif %}/> Tắt
<br />
Họ và tên:
<br />
<input type="text" name="fullname" value="{{fullname|default(ten)}}">
<br />
{% if get('user_'~login,'level') == 'right9s' %}
Tên hiển thị:
<br />
<input type="text" name="nick" value="{{nck|default(nick)}}">
<br />
{% endif %}
Ngày sinh:
<br />
<input type="number" name="day" size="2" maxlength="2" value="{{day|default(ns[0])}}" style="width: 40px"> . <input type="number" name="month" size="2" maxlength="2" value="{{month|default(ns[1])}}" style="width: 40px"> . <input type="number" name="year" size="2" maxlength="4" value="{{year|default(ns[2])}}" style="width: 40px">
</div>
<div class="list1">
<b>Thay đổi mật khẩu</b>
<br />
Nhập mật khẩu cũ:
<br />
<input type="password" name="pass">
<br />
Nhập mật khẩu mới:
<br />
<input type="password" name="newpass">
<br />
Nhập lại mật khẩu mới:
<br />
<input type="password" name="repass">
<br />
<input type="submit" value="Lưu lại">
</div>
</form>
</div>