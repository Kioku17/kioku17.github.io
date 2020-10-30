{% use '_blocks' %}
{{ block( 'head' ) }}
{% set url = get_uri_segments() %}
{% if get_data_count('id_users')|trim <= 5 %}
{# đăng ký #}
{% from 'func.twig' import rwurl,auto,up %}
{% if get_get('act')=='faq' %}
<div class="mainblok">
<div class="phdr"><b>Giới thiệu</b></div>
<div class="list1" style="background-color:#e9ccd2;">
<b style="color:red">M.BLOGBB.GQ</b> là diễn đàn giải trí dành cho các thành viên, tại đây bạn thoải mái giao lưu, kết bạn, nhắn tin và đăng chủ đề, mua bán và nhiều tiện ích khác!
</div>
</div>
<div class="mainblok">
<div class="phdr"><b>Quy Định Sử Dụng</b></div>
<div class="list1"><p><b>1) CẤM:</b><br/><br/><b>1.1</b> Đăng tin quảng cáo.<br/><b>1.2</b> Đăng nội dung liên quan đến vấn đề phân biệt sắc tộc, tôn giáo, quốc gia.<br/><b>1.3</b> Không đăng nội dung thô tục, khiêu dâm, quấy rối tình dục, vu khống, đe dọa người khác.<br/><b>1.4</b> Không được đăng nội dung xúc phạm một chủ thể cụ thể, đặc biệt là thành viên trong diễn đàn.<br/><b>1.5</b> Cố tình giả mạo thành viên khác với bất kỳ mục đích nào.<br/><b>1.6</b> Đăng bài cùng một nội dung nhiều lần trong một hay nhiều chủ đề khác nhau.<br/><b>1.7</b> Đăng lại bài viết hoặc tạo lại chủ đề đã bị xóa bởi Ban quản trị.<br/><b>1.8</b> Đăng bài có nội dung không liên quan đến tiêu đề.<br/><br/><b>2) TUYỆT ĐỐI CẤM:</b><br/><br/><b>2.1</b> Tạo chủ đề than phiền về thành viên hoặc cách hoạt động của điều hành viên. Hãy sử dụng tin nhắn riêng cho vấn đề này<br/><b>2.2</b> Đăng ký nick chứa ký tự gây khó chịu cho người khác<br/><br/><b>3) KHÔNG CHẤP NHẬN:</b><br/><br/><b>3.1</b> Trích dẫn nội dung quá dài hoặc trích dẫn lại một bài đăng chứa một trích dẫn khác.<br/><b>3.2</b> Bài viết tin chỉ chứa liên kết đến các trang web khác. <br/><b>3.3</b> Đăng bài bằng ngôn ngữ không sử dụng chữ cái latin (a-z).<br/><b>3.4</b> Đăng bài không có mục đích: chỉ có biểu tượng vui hoặc bài như "Ok", "Có ai không?",... <br/><br/>Quy định trên đây có thể thay đổi bất kỳ lúc nào.<br />Quy định này áp dụng cho tất cả các thành viên và Ban quản trị, thành viên vi phạm nhiều lần sẽ bị ban, vi phạm nặng có thể dẫn đến xóa bỏ tài khoản vĩnh viễn.</p></div>
<div class="rmenu" align="center">
Click <a href="/{{url[0]}}">đăng ký</a> nếu bạn đã đọc, hiểu rõ và sẽ chấp hành những quy định trên của cộng đồng !</div>
</div>
{% else %}
<div class="mainblok">
<div class="phdr"><b><i class="fa fa-pencil-square-o"></i> Đăng Ký</b></div>
{% set id=get_data_count('id_users') %}
{# kiểm tra và lưu tài khoản #}
{% set user = get_post('user') %}
{% set pass = get_post('pass') %} 
{% set repass = get_post('repass') %} 
{% set gt = get_post('gt') %}
{% set registration %}
<div class="list1"> 
<form method="post" action="" class="ten_form">Tên tài khoản:<br/><input type="text" name="user" value="" required><br/>Mật khẩu:<br/> <input type="password"  name="pass" value="" required><br/>Nhập lại mật khẩu:<br/> <input type="password" name="repass" value="" required><br/>
<font color="red">Không sử dụng mật khẩu trùng với bất kì tài khoản của diễn đàn, blog nào!</font>
<br />
Bạn là:<br /> <select name="gt"><option value="boy">Boy</option> <option value="girl">Girl</option>
<option value="gay">Không xác định</option>
</select></div>
<div class="list1">
<input type="submit" name="submit" value="Đăng Ký"></form></div>
</div>
{% endset %}
{% if request_method()|lower == "post" %}
{% if user and pass and repass and gt %} 
{% if ("now"|date("U") < get_data_by_id('stop_user',get_data('stop_user')|last.id).data) %}   
<div class="rmenu"> Xin lỗi vì sự cố này, bạn có thể tiếp tục đăng ký tài khoản sau {{ get_data_by_id('stop_user',get_data('stop_user')|last.id).data - "now"|date("U") }} giây</div></div>
{% elseif pass!=repass %}
<div class="rmenu">Mật khẩu xác nhận không đúng.</div>
{% else %}
{% if get_data_count('user_'~rwurl(user))>0 %} 
 <div class="rmenu"> Tài khoản đã tồn tại.</div>
{{registration}}
{% elseif user|length>30 %}
<div class="rmenu">Tài khoản không dài quá 30 ký tự</div>
{{registration}}
{% else %} 
{% if user matches '/^[a-zA-Z0-9\\-\\_]+[a-zA-Z0-9\\-\\_]$/' %} 
<div class="list1">
<b><big>Dữ liệu thông tin của bạn:</big></b>
<br/><br/>
<b>Tài khoản:</b> {{user}} <br/>
<b>Mật khẩu:</b> {{pass}} <br/>
<b>Giới tính:</b> {% if gt=='boy' %}Boy{% elseif gt=='girl' %}Girl{% endif %}
<br/>
<a href="/login.php" id="nutlike">Đăng nhập</a> <a href="/index.php">Trang chủ</a></div>
</div>
{% if rwurl(user) == 'admin' or rwurl(user) == 'bot' %}
{% else %}
{% set comment = {"name":"bot","time":"now"|date('U'), "comment":"Chào mừng @"~rwurl(user)~" vừa gia nhập diễn đàn :)) ! Hãy lưu lại trang này và giới thiệu với bạn bè nhé :yaoming:"} %}
{% set save = save_data( "chat", comment|json_encode ) %}
{% endif %}
{{up('ip_history_'~user,'ip_'~ip()~'_'~"now"|date('U'),'up')}}
{% set save=save_data('id_users',''~rwurl(user)~'') %}
{% set auto=auto()|trim %}
{% set data={"nick":user,"pass":pass,"auto":auto,"id":(id+1),"gt":gt,"avt":"/images/"~gt~"-avatar.png","level":"right0s","icon":"","xu":"2000","db":"100","tamtrang":"I L0v3 viỆt Nam","cmt":"0","like":"0","top":"no","act":"act","reg":"now"|date("U")} %}
{% set save=save_data( "user_"~rwurl(user),data|json_encode) %}
{% set save=save_data('auto_'~auto,''~rwurl(user)~'') %}
{{set_cookie('auto',auto)}}
{% if get_data_count('stop_user')==0 %}   
{% set save = save_data('stop_user', '12345') %}   
{% else %}   
{% set id = get_data('stop_user')|last.id %}   
{{ update_data_by_id('stop_user',id,("now"|date("U") + 600)) }}
{% endif %}   
{% else %}
 <div class="rmenu">Tài khoản không được chứa ký tự đặc biệt.</div>
{{registration}}
{% endif %} 
{% endif %}
{% endif %}
{% else %}
<div class="rmenu"> Vui lòng điền đầy đủ thông tin.</div>
{{registration}}
{% endif %}
{% else %}
{{registration}}
{% endif %}
{# kết thúc đăng ký #}
{% endif %}
{% else %}
{# cảnh báo #}
<div class="mainblok">
<div class="phdr"><b><i class="fa fa-pencil-square-o"></i> Tạm Thời Đóng Cửa Đăng Ký</b></div>
<div class="rmenu">Cuộc vui nào cũng đến lúc phải dừng lại. Cảm ơn các bạn đã ủng hộ diễn đàn trong thời gian vừa qua.
<br/> Nếu bạn nào có nhu cầu đăng ký nick trên diễn đàn, hãy liên hệ với BQT.
<br/>Cảm ơn đã đến với M.BlogBB.GQ!
</div>
</div>
{% endif %}
{{ block('end') }} 