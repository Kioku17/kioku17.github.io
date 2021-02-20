{% use '_templates' %}
{% import '_functions' as func %}
{% import '_functions_blog' as blog %}
{% from 'function.twig' import add,mi_add,slug,time,description %}
{% import '_avatar' as avatar %}
{% from 'func.twig' import mi_get,mi_up,k_del,get,html_decode %}
{% set url = get_uri_segments() %}

{% if get_data_count("blog")==0 or get_data_count("forum")==0 or get_data_count("token")==0 or get_data_count("library")==0 %}

{{block('header')}}
{{block('main')}}
{#<div id="left">
{{blog.main('10','show_category_1')}}
</div>
<div id="right">
{{blog.main('5','show_category_2')}}
</div>
<div style="clear:both"></div>#}
{{block('footer')}}

{% else %}

<!DOCTYPE html>
<html>
    <head>
        <title>Instal Source Code Blog Zin3X.ML</title>
        <meta name="viewport" content="width=device-width" />
        <style>
         body {font-family:"Verdana";font-weight:normal;font-size: .7em;color:black;} 
         p {font-family:"Verdana";font-weight:normal;color:black;margin-top: -5px}
         b {font-family:"Verdana";font-weight:bold;color:black;margin-top: -5px}
         H1 { font-family:"Verdana";font-weight:normal;font-size:18pt;color:red }
         H2 { font-family:"Verdana";font-weight:normal;font-size:14pt;color:maroon }
         pre {font-family:"Consolas","Lucida Console",Monospace;font-size:11pt;margin:0;padding:0.5em;line-height:14pt}
         .marker {font-weight: bold; color: black;text-decoration: none;}
         .version {color: gray;}
         .error {margin-bottom: 10px;}
         .expandable { text-decoration:underline; font-weight:bold; color:navy; cursor:pointer; }
         @media screen and (max-width: 639px) {
          pre { width: 440px; overflow: auto; white-space: pre-wrap; word-wrap: break-word; }
         }
         @media screen and (max-width: 479px) {
          pre { width: 280px; }
         }
        </style>
    </head>

    <body bgcolor="white">

            <span><H1>Install Source Code<hr width=100% size=1 color=silver></H1>

            <h2> <i>The source code has been successfully installed!</i> </h2></span>

            <font face="Arial, Helvetica, Geneva, SunSans-Regular, sans-serif ">

            Basic data is initialized in customer data. Please check the following data, whether it exists: <ul><li>blog</li><li>token</li><li>library</li><li>forum</li></ul>
            <br><br>
            </font>
      
{% if get_data_count("blog")==0 %}
{{save_data("blog",{"domain":current_url|split('/').2,"file":0,"sitemap":0}|json_encode)}}
{% endif %}
{% if get_data_count("token")==0 %}
{{save_data("token",{"token-botchat":"botchat"}|json_encode)}}
{% endif %}
{% if get_data_count("library")==0 %}
{{save_data("library","[]")}}
{% endif %}
{% if get_data_count("forum")==0 %}
{{save_data("forum",{"account":0,"postforum":0,"new_mem":"null","time_reg":123456,"mail":0}|json_encode)}}
{% endif %}

<p style="text-align:center">
          <a href="{{current_url|split('/').0~"//"~current_url|split('/').2}}">Click here to return to the homepage</a>
     </p>
    </body>
</html>

{% endif %}