let body = document.getElementById("body");
let pin = document.createElement('span');
let thoigian = document.createElement('span');

body.appendChild(pin);
body.appendChild(thoigian);
setInterval(function(){
navigator.getBattery().then(function(battery) {
var batterylevel = battery.level*100;
var batterycharging = battery.charging ? "Đang cắm sạc" : "Chưa cắm sạc";
var date = new Date();
var hr = date.getHours();
var min = date.getMinutes();
var sec = date.getSeconds();
var ms = Math.round(date.getMilliseconds()/10);
if(hr < 10){
hr = '0'+hr
}

if(min < 10){
min = '0'+min
}

if(sec < 10){
sec = '0'+sec
}
pin.innerHTML = "Pin : "+batterylevel+"%<br> "+batterycharging+".";
thoigian.innerHTML = '<br>Time : ' + hr+' : '+min+' : '+sec;

});
}, 10);

// Kiểm tra phần trăm pin viết bởi nguyentuanh0938666521
