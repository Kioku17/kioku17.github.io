---
layout: post
title:  "Share code weblog Cafedang cho Wap4"
rwurl: "share-code-weblog-cafedang-cho-wap4"
date:   2020-10-30 09:05:30
categories: Mã nguồn
comments: 1
---
Chẳng là trước đây, Tròm vẫn còn xây dựng weblog trên nền tảng Wap4. 

Wap4 chắc không còn xa lạ với các bạn, đây là một web builder nước ngoài hỗ trợ twig và hệ thống custom data (lưu trữ dữ liệu). Và hiện tại, Tròm vẫn sử dụng wap4 để xây dựng web chat, công cụ tiện ích, cũng như 1 diễn đàn nhỏ. Và bộ code này, tròm viết cho 1 weblog, nhưng lạ đời thay, nó thực sự không phải 1 weblog cá nhân đơn thuần, "hắn" là weblog cộng đồng. Thôi không miên man, lằng nhằng nữa, mình xin giới thiệu một vài nét về bộ code này:

Code được xây dựng dựa trên func gốc của wap4, func tiaxgame và mrducz95. Chức năng gồm:

- Đăng nhập, đăng ký, đăng xuất, tường nhà

- Hệ thống thư viện

- Tin tức, phòng chat, timeline (cùi bắp)

- Hệ thống giải trí và công cụ tiện ích

- Tùy chọn giao diện cho thành viên: chế độ sáng và chế độ ban đêm (không hiển thị với màn hình máy tính bàn hoặc thiết bị có màn hình rộng hơn 750px)

> Đây là demo: [Valeric.viwap.com](http://valeric.viwap.com) (nói không phải mê tín chứ demo dẹo rồi)

Còn đây là code, các bạn import các file có dạng "CFĐ: tên file" từ trang này: [GPlay.viwap.com](http://gplay.viwap.com)

Sau đó là import file "chat_module_bot" ở file nén. File này mình để riêng vì một số lý do của GPlay.

Sau đó các bạn tìm tất cả các file có <strong>https://m.cafedang.xyz</strong> sửa thành <strong>https://cafedang.xyz</strong>.

Như phía trên mình đã đề cập là code, và cách import chúng, còn đây là bản zip, các bạn cũng có thể download (tải xuống) bản này để upload lên web nhé.

> Tải xuống -> Giải nén -> Đăng nhập wap4 -> Chọn website -> Upload

> [Download-update-14102020.zip](https://cafedang.xyz/wap4/cafedang/download-update-14102020.zip)

Cuối cùng, đừng quên chạy <strong>web/install</strong> để khởi tạo những entry gốc nhé.

Chúc các bạn mạnh khỏe và thành công!