function scrollToTop(){verticalOffset="undefined"!=typeof verticalOffset?verticalOffset:0,element=$("body"),offset=element.offset(),offsetTop=offset.top,$("html, body").animate({scrollTop:offsetTop},600,"linear")}function rcentbytag(e){1==rcstyle&&document.write('<div class="blog-reanime">'),1==pvstyle&&document.write('<div class="blog-pv row">'),1==blogstyle&&document.write('<div class="blog-blg row">');for(var t=0;t<numposts;t++){var l,i=e.feed.entry[t],r=i.title.$t,n=i.author[0].name.$t;i.id.$t,i.content?i.content.$t:i.summary.$t.replace(/<br *\/?>|[\s]+/gi," ").replace(/<.*?>|[<>]/g,"");if(t==e.feed.entry.length)break;for(var o=0;o<i.link.length;o++){if("replies"==i.link[o].rel&&"text/html"==i.link[o].type)var d=(i.link[o].title,i.link[o].href);if("alternate"==i.link[o].rel){l=i.link[o].href;break}}var m;try{1==rcstyle&&(m=i.media$thumbnail.url.replace(/\/s\d+(\-c)?\//,"/s82-c/")),1==pvstyle&&(m=i.media$thumbnail.url.replace(/\/s\d+(\-c)?\//,"/s250-c/")),1==blogstyle&&(m=i.media$thumbnail.url.replace(/\/s\d+(\-c)?\//,"/s215-c/"))}catch(p){s=i.content.$t,a=s.indexOf("<img"),b=s.indexOf('src="',a),c=s.indexOf('"',b+5),y=s.substr(b+5,c-b-5),m=-1!=a&&-1!=b&&-1!=c&&""!=y?y:"https://i.imgur.com/EfbqD9l.png"}var u=i.published.$t,f=u.substring(0,4),h=u.substring(5,7),g=u.substring(8,10),v=new Array;v[1]="Jan",v[2]="Feb",v[3]="Mar",v[4]="Apr",v[5]="May",v[6]="Jun",v[7]="Jul",v[8]="Aug",v[9]="Sep",v[10]="Oct",v[11]="Nov",v[12]="Dec";var w="",$=0;if(w='<span class="showdates">'+w+g+" "+v[parseInt(h,10)]+" "+f+"</span>",$=1,1==rcstyle&&(document.write('<div class="reanime-post cl">'),document.write('<a class="reanime-thumb" href="'+l+'" target ="_blank" title="'+r+'"><img width="82" alt="'+r+'" title="'+r+'" src="'+m+'" height="82"/></a>'),document.write('<h2 class="reanime-title" itemprop="headline"><a href="'+l+'" target ="_blank" title="'+r+'" rel="nofollow">'+r+"</a></h2>"),document.write('<div class="reanim-footer"><span class="reanime-date"><i class="fa fa-calendar"></i>'+w+"</span></div>"),document.write("</div>")),1==pvstyle&&(document.write('<div class="pv-post col-md-3 col-sm-6 col-xs-6 col-mb-6">'),document.write('<a class="pv-thumb" href="'+l+'" target ="_blank" title="'+r+'"><img width="200" alt="'+r+'" title="'+r+'" src="'+m+'" height="200"/></a>'),document.write('<h2 class="pv-title" itemprop="headline"><a href="'+l+'" target ="_blank" title="'+r+'" rel="nofollow">'+r+"</a></h2>"),document.write("</div>")),1==blogstyle){if(document.write('<div class="blg-post col-md-12 col-sm-12 col-xs-12 col-mb-12">'),document.write('<a class="blg-thumb" href="'+l+'" target ="_blank" title="'+r+'"><img width="115" alt="'+r+'" title="'+r+'" src="'+m+'" height="115"/></a>'),document.write('<h2 class="blg-title" itemprop="headline"><a href="'+l+'" target ="_blank" title="'+r+'" rel="nofollow">'+r+"</a></h2>"),document.write('<div class="blg-header"><span class="blg-auth"><i class="fa fa-user"></i> '+n+'</span><span class="blg-date"><i class="fa fa-calendar"></i> '+w+"</span></div>"),document.write('<span class="blg-snippet">'),"content"in i)var y=i.content.$t;else if("summary"in i)var y=i.summary.$t;else var y="";var f=/<\S[^>]*>/g;if(y=y.replace(f,""))if(y.length<summary_chars)document.write(y);else{y=y.substring(0,summary_chars);var d=y.lastIndexOf(" ");y=y.substring(0,d),document.write(y+" ")}document.write("</span>"),document.write("</div>")}t!=numposts-1&&document.write("")}document.write("</div>")}$(function(){$(document).on("scroll",function(){$(window).scrollTop()>100?$(".usagilabs_top").addClass("show"):$(".usagilabs_top").removeClass("show")}),$(".usagilabs_top").on("click",scrollToTop);var e=/(episode [0-9]+|capitulo [0-9]+|capítulo [0-9]+|folge [0-9]+|episod [0-9]+|episodio [0-9]+|episódio [0-9]+)/im;$(".eps").html(function(t,a){return a.replace(e,"<b class='eps'>$1</b>")});var t=/(subtitle indonesia)/i,a=/\(([^)]+)\)/;$(".eps").html(function(e,s){return s.replace(t,"").replace(a,"").replace("[","").replace("]","")});var s=window.location.href;$("nav a").each(function(){this.href===s&&$(this).addClass("active")})});
