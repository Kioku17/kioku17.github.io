function sunsign() {
   document.form1.date.selectedIndex;
   document.form1.month.selectedIndex;
   document.form1.sign.value;
   if (document.form1.month.selectedIndex == 1 && document.form1.date.selectedIndex <=19) {document.form1.sign.value = "Capricorn - Ma Kết";}
   if (document.form1.month.selectedIndex == 1 && document.form1.date.selectedIndex >=20) {document.form1.sign.value = "Aquarius - Bảo Bình";}
   if (document.form1.month.selectedIndex == 2 && document.form1.date.selectedIndex <=18) {document.form1.sign.value = "Aquarius - Bảo Bình";}
   if (document.form1.month.selectedIndex == 2 && document.form1.date.selectedIndex >=19) {document.form1.sign.value = "Pisces - Song Ngư";}
   if (document.form1.month.selectedIndex == 3 && document.form1.date.selectedIndex <=20) {document.form1.sign.value = "Pisces - Song Ngư";}
   if (document.form1.month.selectedIndex == 3 && document.form1.date.selectedIndex >=21) {document.form1.sign.value = "Aries - Bạch Dương";}
   if (document.form1.month.selectedIndex == 4 && document.form1.date.selectedIndex <=20) {document.form1.sign.value = "Aries - Bạch Dương";}
   if (document.form1.month.selectedIndex == 4 && document.form1.date.selectedIndex >=21) {document.form1.sign.value = "Taurus - Kim Ngưu";}
   if (document.form1.month.selectedIndex == 5 && document.form1.date.selectedIndex <=20) {document.form1.sign.value = "Taurus - Kim Ngưu";}
   if (document.form1.month.selectedIndex == 5 && document.form1.date.selectedIndex >=21) {document.form1.sign.value = "Gemini - Song Tử";}
   if (document.form1.month.selectedIndex == 6 && document.form1.date.selectedIndex <=20) {document.form1.sign.value = "Gemini - Song Tử";}
   if (document.form1.month.selectedIndex == 6 && document.form1.date.selectedIndex >=21) {document.form1.sign.value = "Cancer - Cự Giải";}
   if (document.form1.month.selectedIndex == 7 && document.form1.date.selectedIndex <=21) {document.form1.sign.value = "Cancer - Cự Giải";}
   if (document.form1.month.selectedIndex == 7 && document.form1.date.selectedIndex >=22) {document.form1.sign.value = "LEO - Sư Tử";}
   if (document.form1.month.selectedIndex == 8 && document.form1.date.selectedIndex <=21) {document.form1.sign.value = "LEO - Sư Tử";}
   if (document.form1.month.selectedIndex == 8 && document.form1.date.selectedIndex >=22) {document.form1.sign.value = "Virgo - Xử Nữ";}
   if (document.form1.month.selectedIndex == 9 && document.form1.date.selectedIndex <=21) {document.form1.sign.value = "Virgo - Xử Nữ";}
   if (document.form1.month.selectedIndex == 9 && document.form1.date.selectedIndex >=22) {document.form1.sign.value = "Libra - Thiên Bình";}
   if (document.form1.month.selectedIndex == 10 && document.form1.date.selectedIndex <=21) {document.form1.sign.value = "Libra - Thiên Bình";}
   if (document.form1.month.selectedIndex == 10 && document.form1.date.selectedIndex >=22) {document.form1.sign.value = "Scorpio - Bò Cạp";}
   if (document.form1.month.selectedIndex == 11 && document.form1.date.selectedIndex <=21) {document.form1.sign.value = "Scorpio - Bò Cạp";}
   if (document.form1.month.selectedIndex == 11 && document.form1.date.selectedIndex >=22) {document.form1.sign.value = "Sagittarius - Nhân Mã";}
   if (document.form1.month.selectedIndex == 12 && document.form1.date.selectedIndex <=20) {document.form1.sign.value = "Sagittarius - Nhân Mã";}
   if (document.form1.month.selectedIndex == 12 && document.form1.date.selectedIndex >=21) {document.form1.sign.value = "Capricorn - Ma Kết";}
   if (document.form1.month.selectedIndex == "x" || document.form1.date.selectedIndex == "y") return;
 }
function validate() {
   if (document.form1.month.selectedIndex == 2 && document.form1.date.selectedIndex > 29) {alert("Chỉ có tối đa là 29 ngày vào tháng Hai."); return false;}
   if (document.form1.month.selectedIndex == 4 && document.form1.date.selectedIndex == 31) {alert("Chỉ có 30 ngày trong tháng Tư."); return false;}
   if (document.form1.month.selectedIndex == 6 && document.form1.date.selectedIndex == 31) {alert("Chỉ có 30 ngày trong tháng Sáu."); return false;}
   if (document.form1.month.selectedIndex == 9 && document.form1.date.selectedIndex == 31) {alert("Chỉ có 30 ngày trong tháng Chín."); return false;}
   if (document.form1.month.selectedIndex == 11 && document.form1.date.selectedIndex == 31) {alert("Chỉ có 30 ngày trong tháng mười một."); return false;}
else{
return true;
}
 }