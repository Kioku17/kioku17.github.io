---
layout: post
title:  "Tôi và chiếc thuyền"
rwurl: "Share code weblog Cafedang cho Wap4"
date:   2020-10-30 09:05:30 +0700
categories: Source_Code
comments: 1
---
Chẳng là trước đây, Tròm vẫn còn xây dựng weblog trên nền tảng Wap4. Wap4 chắc không còn xa lạ với các bạn, đây là một web builder nước ngoài hỗ trợ twig và hệ thống custom data (lưu trữ dữ liệu). Và hiện tại, Tròm vẫn sử dụng wap4 để xây dựng web chat, công cụ tiện ích, cũng như 1 diễn đàn nhỏ. Và bộ code này, tròm viết cho 1 weblog, nhưng lạ đời thay, nó thực sự không phải 1 weblog cá nhân đơn thuần, "hắn" là weblog cộng đồng. Thôi không miên man, lằng nhằng nữa, mình xin giới thiệu một vài nét về bộ code này:

Code được xây dựng dựa trên func gốc của wap4, func tiaxgame và mrducz95. Chức năng gồm:

- Đăng nhập, đăng ký, đăng xuất, tường nhà

- Hệ thống thư viện

- Tin tức, phòng chat, timeline (cùi bắp)

- Hệ thống giải trí và công cụ tiện ích

> Đây là demo: http://valeric.viwap.com (nói không phải mê tín chứ demo ngẻo rồi)

Còn đây là code, các bạn import các file có dạng "CFĐ: tên file" từ trang này: http://gplay.viwap.com

Sau đó là import file này "chat_module_bot". File này mình để riêng vì một số lý do của GPlay.