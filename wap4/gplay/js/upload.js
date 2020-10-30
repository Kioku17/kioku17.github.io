var feedback = function(res) {
    if (res.success === true) {
        var get_link = res.data.link.replace(/^http:\/\//i, 'https://');
        document.querySelector('.status').classList.add('bg-success');
        document.querySelector('.status').innerHTML =
            '<div><b>Link Image :</b> ' + '<br><input class="image-url" value=\"' + get_link + '\"/>' + '</div><b><div>BBcode :</b> ' + '<br><input class="image-url" value=\"[img]' + get_link + '\[/img]"/></div><div align="center"><img alt="Imgur-Upload" src=\"' + get_link + '\"/></div><div><a href="?act=save&img=' + get_link + '\"><button class="btn btn-primary">Tạm lưu trữ</button></a></div>';
    }
};

new Imgur({
    clientid: '8794845961af2d3', //You can change this ClientID
    callback: feedback
});