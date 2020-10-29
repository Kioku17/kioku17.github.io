---
layout: post
title: Đâu là một số kết quả trái với mong đợi trong lý thuyết trò chơi?
img: >-
  https://res.cloudinary.com/dwnxk3qfs/image/upload/c_fill,f_auto,h_150,q_auto,w_150/v1583909212/88944789_3087251724659765_769552942809219072_n_eea11w.jpg
categories: Bookmark
paginate: false
---
\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

[Nguồn](https://www.quora.com/What-are-some-counterintuitive-results-in-game-theory-1/answer/%E0%A4%AC%E0%A4%BF%E0%A4%AE%E0%A4%B2-%E0%A4%9A%E0%A4%82%E0%A4%A6%E0%A5%8D%E0%A4%B0-%E0%A4%B8%E0%A4%BF%E0%A4%A8%E0%A5%8D%E0%A4%B9%E0%A4%BE-Bimal-Chandra-Sinha)

\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\__

A:[Bimal Chandra Sinha (बिमल चंद्र सिन्हा)](https://www.quora.com/profile/%E0%A4%AC%E0%A4%BF%E0%A4%AE%E0%A4%B2-%E0%A4%9A%E0%A4%82%E0%A4%A6%E0%A5%8D%E0%A4%B0-%E0%A4%B8%E0%A4%BF%E0%A4%A8%E0%A5%8D%E0%A4%B9%E0%A4%BE-Bimal-Chandra-Sinha), Knows ABCD of Game Theory...

Đây là câu chuyện ưa thích của tôi:

“**Khi số nhân chứng tăng lên, thì xác suất Kitty còn sống sẽ giảm xuống.**”

Cơ mà Kitty là ai vậy?

Câu chuyện này là có thật đấy nhá:

> Tháng 3 năm 1964, Kitty Genovese (nữ, 29 tuổi) đã bị sát hại một cách dã man tại New York. Theo báo chí đưa tin, có 36 người đã chứng kiến vụ sát hại kéo dài nửa tiếng đồng hồ này nhưng không một ai phản ứng lại trước lời cầu cứu của cô hay gọi điện cho cảnh sát cả.
>
> Harlan Ellison, một tác giả viết sách khoa học viễn tưởng, đã gọi những người chứng kiến vụ án này là “36 đứa mặt l`” và viết rằng họ “chỉ đứng nhìn" Genovese “bị đâm dao cho đến chết ngay trước mặt mà chẳng mảy may làm gì.”

Nếu coi sự kiện này là một bài toán thì chúng ta sẽ được:

> Giả sử có n nhân chứng, đây chính là số người chơi.
>
> Giả sử nếu có một ai đó đi báo án thì mỗi người chơi sẽ nhận được lợi ích g. Để báo án thì phải bỏ ra một cái giá là c. Như vậy thì phần thưởng của một người chơi bất kì sẽ là:

* g nếu người khác đi báo án,
* g - c nếu chính người này đi báo án,
* 0 nếu không có ai đi báo án.

> Giả sử g > c > 0.

Áp dụng mô hình lý thuyết trò chơi chiến lược hỗn hợp đối xứng:

> Giả sử xác suất mà người chơi thứ i KHÔNG đi báo án là p. Chúng ta sẽ tìm trong cân bằng Nash tất cả những xác suất bằng nhau này và đặt chung là p.

Dành cho những ai chưa biết cân bằng Nash là gì:

> Điểm Cân bằng Nash của trò chơi là tập hợp n hành động (mỗi hành động tương ứng với mỗi người chơi), mà ở đó, không người chơi nào có thể làm tốt hơn người khác nếu tự ý đơn phương thay đổi hành động. Ở đây, chúng ta hiểu giá trị cân bằng Nash của p là xác suất một nhân chứng không đi báo án.

Tiếp tục tính toán, chúng ta có:

> Chúng ta sẽ tính phần thưởng kì vọng của người chơi thứ i nếu đi báo án và nếu không đi báo án.
>
> Nếu đi báo án: phần thưởng = **g - c.**
>
> Nếu không đi báo án: phần thưởng = 0 x Xác suất không ai đi báo án + g x Xác suất có người đi báo án = **g x \[1 - p^(n -1)]**
>
> Cân bằng Nash xuất hiện khi:
>
> g - c = g x \[1 - p^(n - 1)]
>
> \=> **p = (c/g)^\[1/(n - 1)]**

Cố định giá trị c và g, và hãy xem chuyện gì sẽ xảy ra khi thay đổi n.

p = (c/g)^\[1/(n - 1)] sẽ tăng khi n tăng.

tức là càng có nhiều nhân chứng thì khả năng mỗi người trong số đó đi báo án là sẽ giảm.

Hoặc: Càng có nhiều nhân chứng thì việc đi trình báo cảnh sát sẽ ít có khả năng xảy ra hơn.

Hay “**Khi số nhân chứng tăng lên, thì xác suất Kitty còn sống sẽ giảm xuống.**”