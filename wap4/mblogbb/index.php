{% use '_blocks' %}
{% from 'func.twig' import get,del,rwurl,login,level,account,add %}
{% from 'func_show_fr.twig' import forum_mini,forum_cmtn,forum_ghim %}
{% set login = login()|trim %}
{% set user='user_'~login %}
{% set dd=get_get('dd') %}
{{block('head')}}
{% if get(user,'block') == 'yes' %}
<div class="mainblok">
<div class="phdr"><b>Thông Báo</b></div>
<div class="rmenu"> Tài khoản của bạn đã bị khóa, vui lòng liên hệ với BQT để tìm hiểu lý do và ân xá để lấy lại. BQT xin trân trọng thông báo!</div>
</div>
{% else %}
<div id="left">
{% if login and get('user_'~login,'css') == 'mobile' %}
{% else %}
{% include 'news' %}
{% endif %}
{% if login %}
<div class="mainblok">
<div class="phdr"><i class="fa fa-music"></i> <b>Nghe Nhạc</b> </div>
<div class="list1">
<center><i class="fa fa-volume-up"></i> Bài hát: <font color="darkviolet"><b> Tìm lại 10 nghìn</b></font><br><audio loop="true" src="http://traxanhblog.gq/mp3/Timlai10k-mr-rose.mp3" controls="controls" style="width:100%">Trình duyệt của bạn không được hỗ trợ trình phát nhạc!</audio></center>
</div>
</div>
{% endif %}
{% if login %}
<div class="mainblok">
{# {% if login %} #}
{% include 'guestbook.php' %}
{# {% else %}
{% include '_gioi_thieu' %}
{% endif %} #}
</div>
{% endif %}
</div>
<div id="right">
<div class="mainblok">
<div class="phdr"><b>Chủ đề VIP</b></div>
{{forum_ghim()}}
</div>
{% if login and get('user_'~login,'css') == 'mobile' %}
{% include 'news' %}
{% endif %}
{% set album = get('album')|split('@') %}
{% set category = get('list_category')|split('@') %}
{% set forum = get('show_forum')|split('@') %}
<div class="mainblok">
<div class="phdr"><b>Diễn Đàn</b>{% if login and get('user_'~login,'css') == 'mobile' %}{% if dd %} / {% endif %}{% if dd=='cat' %}Chuyên mục{% elseif dd=='hoatdong' %}Hoạt động gần đây{% endif %}{% endif %} {% if login %}<span style="float:right"><a href="http://{{get('cms_setting','url')}}/chudemoi.php">Viết bài</a></span>{% endif %}</div>
{% if login and get('user_'~login,'css') == 'mobile' %}
<div class="newsx">{% if dd == '' or not dd %}<b>Thảo luận</b>{% else %}<a href="/main.php">Thảo luận</a>{% endif %} | {% if dd != 'cat' or not dd %}<a href="?dd=cat">Chuyên mục</a>{% else %}<b>Chuyên mục</b>{% endif %} | {% if dd != 'hoatdong' or not dd %}<a href="?dd=hoatdong">Hoạt động gần đây</a>{% else %}<b>Hoạt động gần đây</b>{% endif %}</div>
{% endif %}
{% if login and get('user_'~login,'css') == 'mobile' %}
{% if dd=='' %}
{{forum_mini()}}
{% elseif dd=='hoatdong' %}
{% include 'hoat-dong-gan-day' %}
{% elseif dd=='cat' %}
{% for i in category|reverse %}
{% set ten = get('category_'~i|trim,'ten') %}
{% if loop.first==false %}
<div class="list1">
<img src="/images/cat.gif" title="{{ten}}"> <a href="/forums/{{i|trim}}">{{ten}}</a>
</div>
{% endif %}
{% endfor %}
{% endif %}
{% else %}
{# <div class="note"><b>Bình luận gần đây</b></div>
{{forum_cmtn()}}
<div class="note"><b>Thảo luận mới</b></div> #}
{{forum_mini()}}
{% endif %}
</div>

{% if login and get('user_'~login,'css') == 'mobile' %}
{% else %}
<div class="mainblok">
{% if category|length-1 > 0 %}
<div class="phdr"><i class="fa fa-folder-o"></i> <b>Chuyên Mục Chính</b></div>
{% endif %}
{% for i in category|reverse %}
{% set ten = get('category_'~i|trim,'ten') %}
{% if loop.first==false %}
<div class="list1">
<img src="/images/cat.gif" title="{{ten}}"> <a href="/forums/{{i|trim}}">{{ten}}</a>
</div>
{% endif %}
{% endfor %}
</div>
{% endif %}
</div>
<div id="left">
{% if login and get('user_'~login,'css') != 'mobile' %}
<div class="mainblok">
{% include 'hoat-dong-gan-day' %}
</div>
{% endif %}
{% if login and get('user_'~login,'css') == 'mobile' %}
{% else %}
<div class="mainblok">
<div class="phdr"><b>Tiện ích</b></div>
<div class="list1">» <a href="/mini?game=avatar"> Lấy ảnh nhân vật game <b>Avatar</b></a></div>
<div class="list1">» <a href="/mini?game=ninjaschool"> Lấy ảnh nhân vật game <b>Ninja School</b></a></div>
<div class="list1">» <a href="/bank?act=rut-gon-link"> Rút gọn URL</a></div>
<div class="list1">» <a href="/mini?tool=chupanh"> Chụp ảnh màn hình <b>wap/web</b></a></div>
<div class="rmenu" align="center"><a href="/mini" id="nutlike">Xem thêm »</a></div>
</div>
{% endif %}
{% set on=get('show_online')|trim %}
{% set online = {} %}
{% set member=get_data_count('id_users') %}
{% for v in on|split('@') %}
{% if loop.last==false %}
{% if get('user_'~v|trim,'on')|trim > "now"|date("U")-300 %}
{% set list_on %}<a href="/account/{{v|trim}}">{{account(v|trim)}}</a>{% endset %}
{% set online=online|merge({(v|trim):list_on}) %}
{% else %}
{{del('show_online',v|trim,'up')}}
{% endif %}
{% endif %}
{% endfor %}
{% set data = [] %}
{% for i in 1..100 %}{% set data=get_data('id_users',100,i)|merge(data) %}{% endfor %}
{% set listxu %}{% for i in data %}{% set user = i.data %}{% set xu = get('user_'~user,'xu')|trim %}{{xu}}#{% endfor %}{% endset %}
{% set total2=listxu|split('#')|length-1 %}
{% set nick = data[total2-1].data %}
<div class="mainblok">
<div class="phdr"><i class="fa fa-bar-chart-o"></i> <b>Thống Kê</b>
</div>
<div class="list1"><i class="fa fa-book"></i> Số chủ đề: <b>{{forum|length-1}}</b></div>
<div class="list1"><i class="fa fa-pencil"></i> Số bài viết: <b>{{get('info','baiviet')}}</b></div>
<div class="list1"><i class="fa fa-photo"></i> Số ảnh đã upload: <b>{{album|length-1}}</b></div>
<div class="list1"><i class="fa fa-users"></i> Thành viên: <a href="/users"><b>{{member}}</b></a></div>
<div class="list1"><i class="fa fa-user-plus"></i> Chào mừng thành viên mới: <a href="/account/{{nick}}">{{account(nick)}}</a>
</div>
{% if login %}
<div class="list1"><a href="/pages/rank.php" title="BXH"><span style="color:green; font-weight:bold;"> <i class="fa fa-area-chart"></i> Bảng xếp hạng</span></a></div><div class="list1"><i class="fa fa-support"></i> <a href="/pages/faq.php" title="FAQ">BBcode, Smileys, FAQ</a></div>
{% endif %}
</div>
<div id="thongke">
{% if login and login not in on|split('@') %}{{func.up('show_online',login,'up')}}{%endif %}
<div class="mainblok">
<div class="phdr"><i class="fa fa-signal"></i> <b>Đang Online</b></div>
<div class="listonl">
Hiện tại có <b>{{get('online_total')|split('@')|length}}</b> người đang trực tuyến: <b>{{online|length}}</b> thành viên{% if (get('online_total')|split('@')|length-online|length) != '0' %}, <b>{{get('online_total')|split('@')|length-online|length}}</b> khách
{% endif %}
<br/>
Thành viên online: {{online|sort|join(', ')|raw}}</div>
</div>
</div>
</div>
{% endif %}
{{block('end')}}