---
layout: post
title: Download File Và Torrent Vào Google Drive Bằng Cách Dùng Google Colab
img: >-
  https://res.cloudinary.com/dwnxk3qfs/image/upload/c_fill,f_auto,h_150,q_auto,w_150/v1577960324/wsrpbyw_owxmxf.jpg
slug: download-file-va-torrent-vao-google-drive-bang-cach-dung-google-colab
categories: Bookmark
---
[Google Colab](https://colab.research.google.com/notebooks/welcome.ipynb)

Đăng nhập vào Google Colab và tạo Python3 notebook mới. ![https://i.imgur.com/Ry4ZwAm.png](https://i.imgur.com/Ry4ZwAm.png) ![https://i.imgur.com/A6kKkp6.png](https://i.imgur.com/A6kKkp6.png)

Bật chế độ GPU (Nếu file muốn download lớn) Chọn Edit > Notebook settings hoặc Runtime>Change runtime type và chọn GPU as Hardware accelerator.
![https://i.imgur.com/3elgyBL.png](https://i.imgur.com/3elgyBL.png) Tiếp theo ta cần mount Google Drive để file có thể lưu vào Google Drive

```
from google.colab import drive 
drive.mount('/content/gdrive') 
```

Sau đó, ta sẽ thấy một đường link. Hãy nhấp vào nó và cho phép truy cập. Copy mã xuất hiện và paste vào ô, rồi nhấn enter.  ![https://i.imgur.com/EmvZjH3.png](https://i.imgur.com/EmvZjH3.png) ![https://i.imgur.com/BPqDMWF.png](https://i.imgur.com/BPqDMWF.png) ![https://i.imgur.com/zMTstVk.png](https://i.imgur.com/zMTstVk.png) ![https://i.imgur.com/R48arg8.png](https://i.imgur.com/R48arg8.png) Để download thì chạy đoạn code này:

```
import requests 
file_url = "http://1.droppdf.com/files/5iHzx/automate-the-boring-stuff-with-python-2015-.pdf"
r = requests.get(file_url, stream = True) 
with open("/content/gdrive/My Drive/python.pdf", "wb") as file: 
	for block in r.iter_content(chunk_size = 1024): 
		if block: 
			file.write(block) 
```

**Download Torrent File**

Ở đây ta sử dụng https://github.com/FKLC/Torrent-To-Google-Drive-Downloader Và tác giả của notebook này khuyên không nên dùng nó vì chống lại chính sách của Google Colab =)))
Để sử dụng truy cập: <https://colab.research.google.com/github/FKLC/Torrent-To-Google-Drive-Downloader/blob/master/Torrent_To_Google_Drive_Downloader.ipynb>

Sưu tầm và tổng hợp~ Chủ yếu là từ bài này:  <https://www.geeksforgeeks.org/download-anything-to-google-drive-using-google-colab/>
