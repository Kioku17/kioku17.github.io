function getLocation() {
    $.getJSON("https://ipinfo.io/", onLocationGot);
  }
 
  function onLocationGot(info) {
    let position = info.loc.split(",");
    var lat = position[0];
    var lon = position[1];
          //Khoi tao Map
          function initialize() {
            //Khai bao cac thuoc tinh
            var mapProp = {
              //Tam ban do, quy dinh boi kinh do va vi do
              center:new google.maps.LatLng(51.508742, -0.120850),
              //set default zoom cua ban do khi duoc load
              zoom:5,
              //Dinh nghia type
              mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            //Truyen tham so cho cac thuoc tinh Map cho the div chua Map
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
          }
          google.maps.event.addDomListener(window, 'load', initialize);
  }
});
