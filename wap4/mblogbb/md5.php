{% use('_blocks') %}
{% set title = 'Mã hóa MD5' %}
{{block('head')}}
<div class="mainblok">
<div class="phdr"><b>{{title}}</b></div>
<div class="rmenu">Nhập kí tự bất kì vào đây và hệ thống sẽ tự mã hóa cho bạn!</div>
<div class="list1">
<script src="/js/MD5.js"></script> 
Kí tự:<br/>
<input type="text" id="id" oninput="f()">
<article></article>
<script> 
function f(){ 
var id = document.getElementById("id"); 
document.querySelector("article").innerHTML = md5(id.value); 
} 
</script>
</div>
</div>
{{block('end')}}