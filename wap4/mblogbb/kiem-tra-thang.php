{% use('_blocks') %}
{% set title = 'Kiểm trang tháng có bao nhiêu ngày !' %}
{{block('head')}}
<div class="mainblok"><div class="phdr">Kiểm trang tháng có bao nhiêu ngày !</div>
{% set thang = get_post('thang') %}
{% if request_method()|lower=='post' %}
{% if thang=='1' or thang=='3' or thang=='5' or thang=='7' or thang=='8' or thang=='10' or thang=='12' %}
{% set ketqua = 'Tháng '~thang~' có 31 ngày' %}
{% elseif thang=='4' or thang=='9' or thang=='6' or thang=='11' %}
{% set ketqua = 'Tháng '~thang~' có 30 ngày' %}
{% elseif thang == '2' %}
{% set ketqua = 'Tháng '~thang~' có 28 hoặc 29 ngày tùy theo năm nhuận hay không nhuận :))' %}
{% else %}
{% set ketqua = 'Bạn chưa nhập tháng cần tra' %}
{% endif %}
<div class="list1">{{ketqua }}</div>
{% endif %}
<div class="list1">
<form method="post" action="">
	<p>Nhập tháng muốn kiểm tra (1-12): <input name="thang" type="number"></p>
    <p><input name="submit" type="submit"> <a href="/kiem-tra-thang.php">Làm mới</a></p>
</form>
</div>
</div>
{{block('end')}}