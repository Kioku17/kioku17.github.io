<script type="text/javascript">
            function tag(text1, text2) {
              if ((document.selection)) {
                document.form.text.focus();
                document.form.document.selection.createRange().text = text1+document.form.document.selection.createRange().text+text2;
              } else if(document.forms['form'].elements['text'].selectionStart!=undefined) {
                var element = document.forms['form'].elements['text'];
                var str = element.value;
                var start = element.selectionStart;
                var length = element.selectionEnd - element.selectionStart;
                element.value = str.substr(0, start) + text1 + str.substr(start, length) + text2 + str.substr(start + length);
              } else {
                document.form.text.value += text1+text2;
              }
            }
            function show_hide(elem) {
              obj = document.getElementById(elem);
              if( obj.style.display == "none" ) {
                obj.style.display = "block";
              } else {
                obj.style.display = "none";
              }
            }
            </script>
            <div><a href="javascript:tag('[b]', '[/b]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/bold.gif" alt="b" title="Bold" border="0"/></a>
            <a href="javascript:tag('[i]', '[/i]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/italics.gif" alt="i" title="Italic" border="0"/></a>
            <a href="javascript:tag('[u]', '[/u]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/underline.gif" alt="u" title="Underline" border="0"/></a>
            <a href="javascript:tag('[s]', '[/s]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/strike.gif" alt="s" title="Strike" border="0"/></a>
            <a href="javascript:tag('[*]', '[/*]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/list.gif" alt="s" title="Danh sách dấu đầu dòng" border="0"/></a>
            <a href="javascript:tag('[spoiler=]', '[/spoiler]');" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/sp.gif" alt="spoiler" title="Spoiler" border="0"/></a>
            <a href="javascript:tag('[quote]', '[/quote]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/quote.gif" alt="quote" title="Quote" border="0"/></a>
            <a href="javascript:tag('[url=]', '[/url]')" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/link.gif" alt="url" title="URL" border="0"/></a>
            <a href="javascript:show_hide('code');" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/code.gif" title="Code" border="0"/></a>
            <a href="javascript:show_hide('color');" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/color.gif" title="Màu nền" border="0"/></a>
            <a href="javascript:show_hide('bg');" tabindex="-1"><img src="http://w.vsite.tk/assets/images/bbcode/color_bg.gif" title="Văn bản màu" border="0"/></a></div>
                <div id="code" class="codepopup" style="display:none;"><a href="javascript:tag('[code=php]', '[/code]'); show_hide('code');" tabindex="-1">PHP</a><a href="javascript:tag('[code=css]', '[/code]'); show_hide('code');" tabindex="-1">CSS</a><a href="javascript:tag('[code=js]', '[/code]'); show_hide('code');" tabindex="-1">JS</a><a href="javascript:tag('[code=html]', '[/code]'); show_hide('code');" tabindex="-1">HTML</a><a href="javascript:tag('[code=sql]', '[/code]'); show_hide('code');" tabindex="-1">SQL</a><a href="javascript:tag('[code=xml]', '[/code]'); show_hide('code');" tabindex="-1">XML</a><a href="javascript:tag('[code=twig]', '[/code]'); show_hide('code');" tabindex="-1">TWIG</a></div><div id="color" class="bbpopup" style="display:none;"><a href="javascript:tag('[color=#ffffff]', '[/color]'); show_hide('color');" style="background-color:#ffffff;" tabindex="-1"></a><a href="javascript:tag('[color=#bcbcbc]', '[/color]'); show_hide('color');" style="background-color:#bcbcbc;" tabindex="-1"></a><a href="javascript:tag('[color=#708090]', '[/color]'); show_hide('color');" style="background-color:#708090;" tabindex="-1"></a><a href="javascript:tag('[color=#6c6c6c]', '[/color]'); show_hide('color');" style="background-color:#6c6c6c;" tabindex="-1"></a><a href="javascript:tag('[color=#454545]', '[/color]'); show_hide('color');" style="background-color:#454545;" tabindex="-1"></a><a href="javascript:tag('[color=#fcc9c9]', '[/color]'); show_hide('color');" style="background-color:#fcc9c9;" tabindex="-1"></a><a href="javascript:tag('[color=#fe8c8c]', '[/color]'); show_hide('color');" style="background-color:#fe8c8c;" tabindex="-1"></a><a href="javascript:tag('[color=#fe5e5e]', '[/color]'); show_hide('color');" style="background-color:#fe5e5e;" tabindex="-1"></a><a href="javascript:tag('[color=#fd5b36]', '[/color]'); show_hide('color');" style="background-color:#fd5b36;" tabindex="-1"></a><a href="javascript:tag('[color=#f82e00]', '[/color]'); show_hide('color');" style="background-color:#f82e00;" tabindex="-1"></a><a href="javascript:tag('[color=#ffe1c6]', '[/color]'); show_hide('color');" style="background-color:#ffe1c6;" tabindex="-1"></a><a href="javascript:tag('[color=#ffc998]', '[/color]'); show_hide('color');" style="background-color:#ffc998;" tabindex="-1"></a><a href="javascript:tag('[color=#fcad66]', '[/color]'); show_hide('color');" style="background-color:#fcad66;" tabindex="-1"></a><a href="javascript:tag('[color=#ff9331]', '[/color]'); show_hide('color');" style="background-color:#ff9331;" tabindex="-1"></a><a href="javascript:tag('[color=#ff810f]', '[/color]'); show_hide('color');" style="background-color:#ff810f;" tabindex="-1"></a><a href="javascript:tag('[color=#d8ffe0]', '[/color]'); show_hide('color');" style="background-color:#d8ffe0;" tabindex="-1"></a><a href="javascript:tag('[color=#92f9a7]', '[/color]'); show_hide('color');" style="background-color:#92f9a7;" tabindex="-1"></a><a href="javascript:tag('[color=#34ff5d]', '[/color]'); show_hide('color');" style="background-color:#34ff5d;" tabindex="-1"></a><a href="javascript:tag('[color=#b2fb82]', '[/color]'); show_hide('color');" style="background-color:#b2fb82;" tabindex="-1"></a><a href="javascript:tag('[color=#89f641]', '[/color]'); show_hide('color');" style="background-color:#89f641;" tabindex="-1"></a><a href="javascript:tag('[color=#b7e9ec]', '[/color]'); show_hide('color');" style="background-color:#b7e9ec;" tabindex="-1"></a><a href="javascript:tag('[color=#56e5ed]', '[/color]'); show_hide('color');" style="background-color:#56e5ed;" tabindex="-1"></a><a href="javascript:tag('[color=#21cad3]', '[/color]'); show_hide('color');" style="background-color:#21cad3;" tabindex="-1"></a><a href="javascript:tag('[color=#03939b]', '[/color]'); show_hide('color');" style="background-color:#03939b;" tabindex="-1"></a><a href="javascript:tag('[color=#039b80]', '[/color]'); show_hide('color');" style="background-color:#039b80;" tabindex="-1"></a><a href="javascript:tag('[color=#cac8e9]', '[/color]'); show_hide('color');" style="background-color:#cac8e9;" tabindex="-1"></a><a href="javascript:tag('[color=#9690ea]', '[/color]'); show_hide('color');" style="background-color:#9690ea;" tabindex="-1"></a><a href="javascript:tag('[color=#6a60ec]', '[/color]'); show_hide('color');" style="background-color:#6a60ec;" tabindex="-1"></a><a href="javascript:tag('[color=#4866e7]', '[/color]'); show_hide('color');" style="background-color:#4866e7;" tabindex="-1"></a><a href="javascript:tag('[color=#173bd3]', '[/color]'); show_hide('color');" style="background-color:#173bd3;" tabindex="-1"></a><a href="javascript:tag('[color=#f3cafb]', '[/color]'); show_hide('color');" style="background-color:#f3cafb;" tabindex="-1"></a><a href="javascript:tag('[color=#e287f4]', '[/color]'); show_hide('color');" style="background-color:#e287f4;" tabindex="-1"></a><a href="javascript:tag('[color=#c238dd]', '[/color]'); show_hide('color');" style="background-color:#c238dd;" tabindex="-1"></a><a href="javascript:tag('[color=#a476af]', '[/color]'); show_hide('color');" style="background-color:#a476af;" tabindex="-1"></a><a href="javascript:tag('[color=#b53dd2]', '[/color]'); show_hide('color');" style="background-color:#b53dd2;" tabindex="-1"></a></div><div id="bg" class="bbpopup" style="display:none"><a href="javascript:tag('[bg=#ffffff]', '[/bg]'); show_hide('bg');" style="background-color:#ffffff;" tabindex="-1"></a><a href="javascript:tag('[bg=#bcbcbc]', '[/bg]'); show_hide('bg');" style="background-color:#bcbcbc;" tabindex="-1"></a><a href="javascript:tag('[bg=#708090]', '[/bg]'); show_hide('bg');" style="background-color:#708090;" tabindex="-1"></a><a href="javascript:tag('[bg=#6c6c6c]', '[/bg]'); show_hide('bg');" style="background-color:#6c6c6c;" tabindex="-1"></a><a href="javascript:tag('[bg=#454545]', '[/bg]'); show_hide('bg');" style="background-color:#454545;" tabindex="-1"></a><a href="javascript:tag('[bg=#fcc9c9]', '[/bg]'); show_hide('bg');" style="background-color:#fcc9c9;" tabindex="-1"></a><a href="javascript:tag('[bg=#fe8c8c]', '[/bg]'); show_hide('bg');" style="background-color:#fe8c8c;" tabindex="-1"></a><a href="javascript:tag('[bg=#fe5e5e]', '[/bg]'); show_hide('bg');" style="background-color:#fe5e5e;" tabindex="-1"></a><a href="javascript:tag('[bg=#fd5b36]', '[/bg]'); show_hide('bg');" style="background-color:#fd5b36;" tabindex="-1"></a><a href="javascript:tag('[bg=#f82e00]', '[/bg]'); show_hide('bg');" style="background-color:#f82e00;" tabindex="-1"></a><a href="javascript:tag('[bg=#ffe1c6]', '[/bg]'); show_hide('bg');" style="background-color:#ffe1c6;" tabindex="-1"></a><a href="javascript:tag('[bg=#ffc998]', '[/bg]'); show_hide('bg');" style="background-color:#ffc998;" tabindex="-1"></a><a href="javascript:tag('[bg=#fcad66]', '[/bg]'); show_hide('bg');" style="background-color:#fcad66;" tabindex="-1"></a><a href="javascript:tag('[bg=#ff9331]', '[/bg]'); show_hide('bg');" style="background-color:#ff9331;" tabindex="-1"></a><a href="javascript:tag('[bg=#ff810f]', '[/bg]'); show_hide('bg');" style="background-color:#ff810f;" tabindex="-1"></a><a href="javascript:tag('[bg=#d8ffe0]', '[/bg]'); show_hide('bg');" style="background-color:#d8ffe0;" tabindex="-1"></a><a href="javascript:tag('[bg=#92f9a7]', '[/bg]'); show_hide('bg');" style="background-color:#92f9a7;" tabindex="-1"></a><a href="javascript:tag('[bg=#34ff5d]', '[/bg]'); show_hide('bg');" style="background-color:#34ff5d;" tabindex="-1"></a><a href="javascript:tag('[bg=#b2fb82]', '[/bg]'); show_hide('bg');" style="background-color:#b2fb82;" tabindex="-1"></a><a href="javascript:tag('[bg=#89f641]', '[/bg]'); show_hide('bg');" style="background-color:#89f641;" tabindex="-1"></a><a href="javascript:tag('[bg=#b7e9ec]', '[/bg]'); show_hide('bg');" style="background-color:#b7e9ec;" tabindex="-1"></a><a href="javascript:tag('[bg=#56e5ed]', '[/bg]'); show_hide('bg');" style="background-color:#56e5ed;" tabindex="-1"></a><a href="javascript:tag('[bg=#21cad3]', '[/bg]'); show_hide('bg');" style="background-color:#21cad3;" tabindex="-1"></a><a href="javascript:tag('[bg=#03939b]', '[/bg]'); show_hide('bg');" style="background-color:#03939b;" tabindex="-1"></a><a href="javascript:tag('[bg=#039b80]', '[/bg]'); show_hide('bg');" style="background-color:#039b80;" tabindex="-1"></a><a href="javascript:tag('[bg=#cac8e9]', '[/bg]'); show_hide('bg');" style="background-color:#cac8e9;" tabindex="-1"></a><a href="javascript:tag('[bg=#9690ea]', '[/bg]'); show_hide('bg');" style="background-color:#9690ea;" tabindex="-1"></a><a href="javascript:tag('[bg=#6a60ec]', '[/bg]'); show_hide('bg');" style="background-color:#6a60ec;" tabindex="-1"></a><a href="javascript:tag('[bg=#4866e7]', '[/bg]'); show_hide('bg');" style="background-color:#4866e7;" tabindex="-1"></a><a href="javascript:tag('[bg=#173bd3]', '[/bg]'); show_hide('bg');" style="background-color:#173bd3;" tabindex="-1"></a><a href="javascript:tag('[bg=#f3cafb]', '[/bg]'); show_hide('bg');" style="background-color:#f3cafb;" tabindex="-1"></a><a href="javascript:tag('[bg=#e287f4]', '[/bg]'); show_hide('bg');" style="background-color:#e287f4;" tabindex="-1"></a><a href="javascript:tag('[bg=#c238dd]', '[/bg]'); show_hide('bg');" style="background-color:#c238dd;" tabindex="-1"></a><a href="javascript:tag('[bg=#a476af]', '[/bg]'); show_hide('bg');" style="background-color:#a476af;" tabindex="-1"></a><a href="javascript:tag('[bg=#b53dd2]', '[/bg]'); show_hide('bg');" style="background-color:#b53dd2;" tabindex="-1"></a></div>