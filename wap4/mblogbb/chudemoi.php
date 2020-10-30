{% from 'func.twig' import add,up,login,paging,get,rwurl %}
{% from 'bbcode.twig' import bbcode %}
{% use '_blocks' %}
{% set login = login()|trim %}
{% set title='Viết bài mới' %}
{{block('head')}}
{% if get('user_'~login,'block') == 'yes' %}
<div class="mainblok">
<div class="phdr"><b>Thông Báo</b></div>
<div class="rmenu"> Tài khoản của bạn đã bị khóa, vui lòng liên hệ với BQT để tìm hiểu lý do và ân xá để lấy lại. BQT xin trân trọng thông báo!</div>
</div>
{% else %}
{% set id = get_post('id') %}
<div class="mainblok">
{% if login and get('user_'~login,'top') == 'yes' %}
{% if get('list_category')|split('@')|length-1 > 0 %}
{% if request_method()|lower == "post" %}
{% set ten = get_post('ten') %}
{% set nd = get_post('nd') %}
{% set img = get_post('img') %}
{% set show = get_post('show') %}
{% set idbv = get('info','forum')|trim+1 %}
{% set baiviet = get('info','baiviet')|trim+1 %}
{% set ok = get_post('ok') %}
{% if ok %}
{% if ten|length < '3' or ten|length > '100' %}
<div class="rmenu"> Tên bài viết phải không được ngắn hơn 3 và dài hơn 100 kí tự </div>
{% elseif nd|length < '3' or nd|length > '16000' %}
<div class="rmenu"> Nội dung không được ngắn hơn 3 và dài hơn 16000 kí tự</div>
{% else %}
{% if img %}
{% set nd1 = {"ten":ten,"img":img,"id":id,"idbv":idbv,"total":"1","first":login,"time":"now"|date("U")}|json_encode %}
{% else %}
{% set nd1 = {"ten":ten,"id":id,"idbv":idbv,"total":"1","first":login,"time":"now"|date("U")}|json_encode %}
{% endif %}
{% set nd2 = {"nick":login,"idbv":idbv,"total":"1","nd":nd,"time":"now"|date("U")}|json_encode %}
{{up('forum_'~idbv~'_info',nd1)}}
{{up('forum_'~idbv~'_1',nd2)}}
{{up('forum_'~idbv~'_show','1','up')}}
{{up('show_forum',idbv,'up')}}
{{up('show_category_'~id,idbv,'up')}}
{{add('category_'~id,'total',get('category_'~id,'total')|trim+1)}}
{{add('info','forum',idbv)}}
{{add('info','baiviet',baiviet)}}
{{add('user_'~login,'chude',get('user_'~login,'chude')|trim+1)}}
{{add('user_'~login,'cmt',get('user_'~login,'cmt')|trim+1)}}
<div class="list1">Post bài thành công! <a href="/threads/{{idbv}}/{{rwurl(ten)}}.html">Xem bài đăng >></a></div>
{{ add('user_'~login,'xu',get('user_'~login,'xu')|trim+random(50)) }}
{% set comment = {"name":"bot","time":"now"|date('U'), "comment":"[src]http://mblogbb.viwap.com/images/post.png[/src] [b]"~get('user_'~login,'nick')~"[/b] vừa viết [url=http://m.blogbb.gq/threads/"~idbv~"/"~rwurl(ten)~".html]một chủ đề mới[/url]. Chúng ta cùng thảo luận nào!"} %}
{% set save = save_data( "event", comment|json_encode ) %}
{% endif %}
{% endif %}
{% endif %}
<div class="phdr"><b>Viết bài</b></div>
<div class="list1"><b>Tiêu đề: {% if show %}{{ten}}{% else %}(Kí tự nhiều nhất 100 ){% endif %}</b></div>
{% if show %}
<div class="list1">{{bbcode(nd)}}</div>
{% endif %}
<div class="list1"><form action="" method="post"><input type="text" name="ten" value="{% if show %}{{ten}}{% endif %}">
<br />
{% set data = get('list_category')|split('@') %}
Chuyên mục:
<br />
<select name="id">{% for i in data|reverse %}{% if loop.first == false %}<option value="{{i|trim}}">{{get('category_'~i|trim,'ten')}}</option>{% endif %}{% endfor %}</select>
<br /><b>Bài viết</b><br />
<textarea rows="10" name="nd">{% if show %}{{nd}}{% endif %}</textarea>
<br />Avatar:
<br />
<input type="text"
name="img"><br />
<input type="submit" name="ok" value="Lưu lại"> <input type="submit" name="show" value="Xem trước"></form></div>
{% else %}
<div class="phdr">Viết bài mới</div>
<div class="list1">Chưa có chuyên mục nào vui lòng tạo chuyên mục để đăng bài. <a href="/panel">Cick</a></div>
{% endif %}
{% elseif login and get('user_'~login,'top') == 'no' %}
<div class="phdr">Viết bài mới</div>
<div class="rmenu"> Bạn chưa được quyền tạo chủ đề mới, vui lòng <a href="/user">check vào đây</a> để chỉnh sửa thông tin cá nhân!</div>
{% else %}
<div class="rmenu">Vui lòng đăng nhập để viết bài!</div>
{% endif %}
</div>
{% endif %}
{{block('end')}}