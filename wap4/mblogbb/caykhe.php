{% from 'func.twig' import get,add,up,login %}
{% import 'func.twig' as m %}
{% from 'funcfarm.twig' import status,timer,nangsuat %}
{% set time = "now"|date('U') %}
{% use('_blocks') %}
{% set login = login()|trim %}
{% set user = 'user_'~login %}
{% set nick_user = get(user,'nick') %}
{% set leve_user = get(user,'level') %}
{% set xu = get(user,'xu') %}
{% set title = 'Cây khế của '~nick_user %}
{{block('head')}}
{% if login %}
{% set sft_max_level = 13 %}
{% set sft_time = 28800 %} {# 8 hours #}
{% set sft_time_per_level = 600 %}
{% set sft_level = farm.levelkhe|default('1')|trim %}
{% set sft_time = sft_time - (sft_level - 1) * sft_time_per_level %}
<link rel="stylesheet" href="http://wap4.ga/assets/farm/style.css" />
{% if sft_time < 7200 %} {% set sft_time = 7200 %} {% endif %}
{% set sft_timer = farm.timekhe + sft_time >= "now"|date('U') ? farm.timekhe + sft_time - "now"|date('U') : 0 %}
{# farm khế #}
  <div class="phdr"><a href="/farm">Nông trại</a> | {{act ? '<a href="thuhoachkhe.html">Cây khế</a>' : 'Cây khế' }}</div><div class="farm">
<div class="center star_fruit_tree_2">
  <div>
    <img src="http://wap4.ga/assets/farm/star_fruit_tree{{sft_timer ? '' : '_1'}}.png" />
  </div>
  <span class="textbox ib bold">Cây khế Lv{{sft_level}} {{sft_level < sft_max_level and sft_timer and act != 'upgrade' ? ' - <a href="?act=upgrade">Tăng</a>':''}}</strong></span></div>
<div class="controls">
{% if sft_timer %}
	{% if act == 'upgrade' %}
		{% if sft_level < sft_max_level %}
			{# nâng cấp #}
		{% else %}
			<div class="textbox">Cây khế đã đạt cấp tối đa!</div>
		{% endif %}
  {% else %}
	<div class="textbox">Sản lượng: {{sft_product}}<br/>
      Còn {{timer(sft_timer, 2)}} mới có thể thu hoạch</div>
			{{sft_level < sft_max_level ? '<div class="textbox">Cây khế level càng cao phát triển càng nhanh. Khi khế đang phát triển mới có thể tiến hành nâng cấp!<br/>Nâng cấp VIP cũng tăng tốc độ sinh trưởng của khế</div>' : ''}}
	{% endif %}
                                       
{% else %}
{% set key = 'farm_id_'~login %}
{{m.uplist(key,'list_kho',31,'up')}}
  {{add(key,'timekhe',time|trim)}}
{{add(key,'thu_31',get(key,'thu_31')|trim + sft_product|trim)}}
	<div class="textbox">Thu hoạch thành công! Bạn nhận {{sft_product}} quả khế vào kho!<br/>
  <a href="?act=upgrade">Nâng cấp</a> cây khế để tăng sản lượng và giảm thời gian sinh trưởng!</div>
                                         {% endif %}  
</div></div>
{% endif %}
{{block('end')}}