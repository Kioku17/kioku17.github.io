---
layout: post
title: Cài đặt Flutter trên Linux
img: >-
  https://res.cloudinary.com/dwnxk3qfs/image/upload/c_fill,f_auto,h_150,q_auto,w_150/v1583393931/flutter-logo-sharing_xjsium.png
categories: Viết
paginate: false
---
**Flutter** is *Google’s UI* toolkit for building beautiful, natively compiled applications for *mobile*, *web*, and *desktop* from a single codebase.

Bài viết này hướng dẫn cài **Flutter** trên **Linux** (**Ubuntu**) từ việc cài đặt thực tế của mình.

*Bài viết này IDE là **Android Studio** xong bạn cũng có thể dùng **Visual Studio Code**.*

## 1. Cài **Genymotion** - giả lập máy ảo android

Cài **Vitual Box** (Cần thiết để cài Genymotion)

Mở **Terminal** chạy

```
sudo apt update
sudo apt install virtualbox
```

Tải file bin **Genymotion** <https://www.genymotion.com/fun-zone/> (cần đăng ký tài khoản)

Mở **Terminal** chạy các dòng lệnh sau để cài **Genymotion**

```
ls -l ~/Downloads/
chmod +x ~/Downloads/genymotion-3.0.4-linux_x64.bin
sudo ~/Downloads/genymotion-3.0.4-linux_x64.bin
```

*Sửa genymotion-3.0.4-linux_x64.bin cho đúng tên file bin của mình*

## 2. Thiết lập môi trường **Flutter**

Mở **Terminal** chạy

```
sudo apt install git
git clone https://github.com/flutter/flutter.git
export PATH="$PATH:`pwd`/flutter/bin"
```

Mở trình quản lý file duyệt đến *Home* bật hiện file ẩn, mở **.bashrc** thêm vào dưới file:

```
export PATH="$PATH:/home/USERNAME/flutter/bin"
```

Sửa **USERNAME** lại thành tên account của mình.

Mở **Terminal** chạy 

```
flutter doctor
```

## 3. **Android Studio**

Mở **Ubuntu Software** cài **Android Studio**

Cài xong tại **Android Studio** thêm plugin **flutter, dart, genymotion.**

Khởi động lại **Android Studio** tạo **flutter project**, môi trường flutter duyệt đến **home/flutter** xong vào **settings** tìm **genymotion** thì điền đường dẫn đến **android sdk:**

*/home/**USERNAME**/Android/Sdk*

![](https://i.imgur.com/GOefUpw.png)

Mở **Terminal** chạy 

```
flutter doctor --android-licenses
```

(Chon Yes hết)

Thiết lập những thứ chưa xong (như chứng chỉ)

Mở **Genymotion** đăng nhập tài khoản ở phần thiết bị thì tùy chọn (*mình chọn Custom phone android 8*)

![](https://i.imgur.com/hnjEpeA.png)

Vào **settings** của **Genymotion**

![](https://i.imgur.com/ed1EKvi.png)

Chọn **ADB** rồi **Use custom** dẫn đến: */opt/genymobile/genymotion*

Khởi đọng lại rồi chạy máy ảo

Xong, mở **Android Studio** lên code.

![](https://i.imgur.com/l963aqO.jpg)
