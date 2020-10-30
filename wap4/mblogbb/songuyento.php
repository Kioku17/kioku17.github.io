{% use('_blocks') %}
{% set title = 'Kiểm tra số nguyên tố!' %}
{{block('head')}}
<div class="mainblok"><div class="phdr">Kiểm tra số nguyên tố !</div>
{% set sochon = get_post('sochon') %}
{% if request_method()|lower == "post" %}
{% if not sochon %}
{% set ketqua = 'Bạn chưa chọn số!' %}
{% else %}
{% if sochon == '0' or sochon == '1' %}
{% set ketqua = 'Số '~sochon~' là số nguyên tố' %}
{% else %}
{% set i='2' %}
{% if sochon%i=='0' %}
{% set pheptinh = sochon/i %}
{% set ketqua = 'Số '~sochon~' chia hết cho 2 bằng '~pheptinh~' => Số '~sochon~' không phải số nguyên tố' %}
{% else %}
{% set ketqua = 'Số '~sochon~' là số nguyên tố' %}
{% endif %}
{% endif %}
{% endif %}
<div class="list1">{{ketqua}}</div>
{% endif %}
<div class="list1">
<form method="post" action="">
    <p>Chọn số: <input name="sochon" type="number"></p>
    <p><input name="submit" type="submit"></p>
</form>
</div>
</div>
{{block('end')}}