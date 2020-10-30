{% from 'func.twig' import login %}
{% set login = login()|trim %}
{% use '_blocks' %}
{{block('head')}}
<div class="mainblok">
<div class="phdr"><b>Lịch</b></div>
<div class="menu">
<script language="JavaScript" src="/js/am_lich.js" type="text/javascript"></script> 
<script language="JavaScript">showVietCal();</script> <style type="text/css">.calen p {margin:5px 0 5px 0;}</style> <center> <script language="JavaScript"> setOutputSize("small"),document.writeln(printSelectedMonth()); </script> <form action="#amlich" name="SelectMonth"> Tháng <select name="month"><option value="1" />1<option value="2" />2<option value="3" />3<option value="4" />4<option value="5" />5<option value="6" />6<option value="7" />7<option value="8" />8<option value="9" />9<option value="10" />10<option value="11" />11<option value="12" />12</select> &nbsp;<input onclick="javascript:viewMonth(parseInt(month.value), parseInt(year.value));" type="button" value=" Xem " /><br /> Năm&nbsp; <input name="year" size="4" value="2015" /></form> </center> <script type="text/javascript"> function viewMonth(a,b){window.location=window.location.pathname+"?yy="+b+"&mm="+a}function viewYear(a){var b="currentyear.html?yy="+a;window.open(b,"win2702","menubar=yes,scrollbars=yes,resizable=yes")}document.SelectMonth.month.value=currentMonth,document.SelectMonth.year.value=currentYear; </script></div>
</div>
{{block('end')}}