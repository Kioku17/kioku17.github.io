{% use('_blocks') %}
{% set title="Máy tính phép toán !" %}
{% from 'func.twig' import get,add,up,login,account %}
{{block('head')}}
<div class="mainblok"><div class="phdr"><b>Máy tính phép toán !</b></div>
{% set so1 = get_post('so1') %}
{% set so2 = get_post('so2') %}
{% set toantu = get_post('toantu') %}
{% if request_method()|lower == "post" %}
{% if not so1 or not so2 %}
{% set ketqua='Bạn chưa nhập số' %}
{% else %}
{% if toantu=='+' %}
{% set ketqua=so1+so2 %}
{% elseif toantu=='-' %}
{% set ketqua=so1-so2 %}
{% elseif toantu=='x' %}
{% set ketqua=so1*so2 %}
{% elseif toantu=='/' %}
{% set ketqua=so1/so2 %}
{% endif %}
{% endif %}
<div class="list1">
{% if not so1 or not so2 %}
{% else %}{{so1}} {{toantu}} {{so2}} = {% endif %}<b>{{ketqua}}</b>
</div>
{% endif %}
<div class="list1">
<form method="post" action="">
	<p>Số 1: <input name="so1" type="number"></p>
    <p>Phép toán: <select name="toantu">
    <option value = "+">Cộng</option>
    <option value = "-">Trừ</option>
    <option value = "x">Nhân</option>
    <option value = "/">Chia</option>            
    </select></p>    
	<p>Số 2: <input name="so2" type="number"></p>  
	<p><input name="submit" type="submit" value="Tính"> <a href="/maytinh.php">Làm mới</a></p>     
</form>
</div>
</div>
{{block('end')}}