# Lập trình ứng dụng di động và lập trình react-native
## 1. Lập trình di động
### I. Khái niệm lập trình di động
Lập trình cho các thiết bị di động có thể hiểu đơn giản và khái quát như sau:

Trước hết thế nào là lập trình và lập trình là gì thì có thể hiểu đơn giàn là thiết bị máy móc (Devices) không tự biết phải làm gì đề phục vụ một nhu cầu nào đó của con người. Nó chỉ có thể làm những gì được định sẵn với khả năng thực hiện nhanh và chính xác hơn con người (Keeper sẽ nói về AI - Artificial Intelligence sau, AI = Trí tuệ nhân tạo; khái niệm giúp máy móc thiết bị tự quyết định và tự đưa ra giải pháp tùy tình huống mà không cần con người vạch sẵn).

Vì vậy nếu muốn thiết bị cho ra kết quả của phép nhân từ 2 con số thì người lập trình phải viết 1 đoạn code cung cấp cho thiét bị 2 variables(biến số) represents (đại diện) cho 2 con số muốn tính toán(Calculate) và cách thức (Method) để cho ra kết quả phép nhân. Thiết bị khi đó không cần biết 2 con số là gì mà nó chỉ biết khi người sử dụng nhập 2 con số và click Enter thì nó chỉ việc lấy 2 số này và áp dụng công thức đã được lập trình viên định sẵn và trả về kết quả. Như vậy nếu chỉ có công thức nhân mà không có công thức cộng trừ hay chia thì nó chỉ có thể cho ra kết quả nhân. Do đó muốn nó cho ra kết quả cộng trừ hay chia thì người lập trình buộc phải cung cấp thêm cho nó công thức công trừ hay chia.

Lập trình cho các thiết bị di động như Mobile Phones, Portable Devices, Mobility Devices...Được gọi là lập trình di động.

Tùy thuộc vào khả năng, tính chất của từng loại mobile devices mà có những cách lập trình, ngôn ngữ, môi trường khác nhau. Hiện tại phổ biến nhất vẫn là Java MIDP/CLDC technology.

Ngôn ngữ để sử dụng lập trình cho những thiết bị di động hỗ trợ MIDP/CLDC được gọi là Java J2ME(Java 2 Micro Edition) và nó khác với J2SE , J2EE ... ở chỗ nó chỉ có những API và cơ chế tương thích với MIDP/CLDC và vì thế mới chạy được trên thiét bị hỗ trợ MIDP/CLDC.
Bên cạnh đó còn có Android SDK (Java Dalvik), iPhone SDK (iPhone OS) là những Software Development Kit dùng đề phát triển phần mềm cho các thiết bị chạy hệ điều hành Android hay iPhone OS.

Với loại này thì syntax, API, library và môi trường hoàn toàn khác với J2ME, và muốn lập trình cho Android hay iPhone OS... thì bắt buộc phải xem tài liệu về nó chứ không thể đem source code của J2ME rồi bắt chạy trên Android hay iPhone và ngược lại.

Mỗi chủng loại có những tools và material khác nhau nhưng programming concept thì không khác nhau. Tất cả đều vẫn phải sử dụng những thuật toán(Algorithm) như: 

if satisfy this condition, do something, else, do something else

Các vòng loop như:

while this condition is still true, keep doing something until this condition is false

Programming concept thì như nhau nhưng khác nhau về câu lệnh(syntax) và library vì mỗi chủng loại khác nhau sẽ có những loại tài nguyên khác nhau giống như Window và Mac có giao diện khác nhau vì nó có library khác nhau do đó không thể sử dụng Window library mà cho ra giao diện của Mac.

## 2. Lập trình react-native
### I. Khái niệm lập trình react-native
React Native là các đoạn code đã được viết sẵn (framework) do công ty công nghệ Facebook phát triển. Các lập trình viên React Native là người sử dụng những framework này để phát triển nên các hệ thống, nền tảng ứng dụng trên các hệ điều hành như IOS và Android. Ngôn ngữ lập trình được sử dụng nhiều nhất là Javascript.

Sự ra đời của React Native đã giải quyết được bài toán về hiệu năng và sự phức tạp khi trước đó người ta phải dùng nhiều loại ngôn ngữ native cho mỗi nền tảng di động. Chính vì thế lập trình React Native sẽ giúp tiết kiệm được phần lớn thời gian và công sức khi thiết kế và xây dựng nên một ứng dụng đa nền tảng. Javascript phù hợp với rất nhiều nền tảng khác nhau. 

**Ưu điểm**

    - Không phải dùng nhiều native nhờ đó đơn giản hóa quá trình xây dựng nền tảng

    - Rút ngắn thời gian khi phát triển ứng dụng

    - Tối thiểu hoá chi phí cho doanh nghiệp

    - Khả năng tái sử dụng code lên đến 80%

    - Mang đến trải nghiệm người dùng chất lượng hơn

    - Không đòi hỏi kiến thức nền quá chuyên sâu, bất kỳ ai đam mê IT cũng có thể học lập trình React Native

**Nhược điểm**

    - Mới chỉ hỗ trợ trên 2 nền tảng phổ biến nhất là IOS và Android

    - Hiệu năng sẽ không bằng những ứng dụng thuần native code

    - Độ bảo mật còn hạn chế

    - Không hoàn toàn free, một số thư viện cần trả phí để có thể trải nghiệm

    - Một vài module có khả năng tùy biến thấp, không thực sự tốt

### II. Chức năng, cơ chế hoạt động và thư viện
#### 2.1 Cơ chế hoạt động của React-native
Framework này được hoạt động dựa trên việc tích hợp hai thread với nhau. Đó chính là Main Thread và JS Thread với hai vai trò riêng biệt:

 - Main Thread: luồng Main Thread đảm nhiệm vai trò cập nhật giao diện người dùng (UI) và xử lý tương tác người dùng.

 - JS Thread: đảm bảo hệ thống hoạt động hiệu quả thông qua việc thực thi và xử lý code Javascript.

Nhìn chung, nguyên lý hoạt động của React Native gần tương tự với React có điều React Native không sử dụng thao tác với DOM và HTML. Thay vào đó, React Native chạy một quá trình xử lý nền với nền tảng gốc. Kết nối Main Thread và JS Thread thông qua một Bridge (cầu nối).

Như vậy 2 luồng này sẽ duy trì giao tiếp nhưng không hề phụ thuộc nhau.

#### 2.2 Các thư viện thường dùng trong React-native
**FireBase** : 

    - Firebase là một dịch vụ lưu trữ cơ sở dữ liệu thời gian thực hoạt động trên nền tảng đám mây được cung cấp bởi Google nhằm giúp các lập trình phát triển nhanh các ứng dụng bằng cách đơn giản hóa các thao tác với cơ sở dữ liệu.

**Redux** :

    - Redux js là một thư viện Javascript giúp tạo ra thành một lớp quản lý trạng thái của ứng dụng.

    - Redux được xây dựng dựa trên nền tảng tư tưởng của ngôn ngữ Elm và kiến trúc Flux do Facebook giới thiệu.

    - Do vậy Redux thường là bộ đôi kết hợp hoàn hảo với React.

**Flow** :

    - Đây là trình kiểm tra kiểu tĩnh cho JavaScript, được tạo bởi Facebook, xác định các vấn đề trong khi mã hóa. Thư viện nhằm mục đích cải thiện độ chính xác và tốc độ mã hóa. Flow giúp phát triển các ứng dụng lớn, ngăn chặn các xung đột khi nhiều người đang làm việc trên một projecyt.

**React Navigation** :

    - Thư viện này giúp các nhà phát triển dễ dàng thiết lập navigation trong ứng dụng. Nó có một công cụ điều hướng dễ sử dụng dựa trên JavaScript. Thư viện React Navigation hoàn toàn có thể tùy chỉnh và mở rộng.

**Axios** :

    - Axios là một client HTTP nhẹ dành cho JavaScript, được xây dựng để gửi các yêu cầu HTTP không đồng bộ đến các điểm cuối REST và thực hiện các hoạt động CRUD. Tóm lại, điều đó có nghĩa là, bạn có thể sử dụng các hàm không đồng bộ và chờ các hàm để viết mã không đồng bộ dễ đọc hơn.

**...**


## 3. So sánh react-native với các nền tảng khác
### I. So sánh react-native với native app
#### 1.1 Lợi ích của React Native so với ứng dụng native:
+ Tái sử dụng 
+ Phát triển ứng dụng hiệu quả 
+ Khả năng tương thích với các ứng dụng của bên thứ ba
+ Giao diện người dùng (UI) đầy đủ chức năng 

Ưu điểm: Nó có một loạt các khả năng để chia sẻ mã giữa các nền tảng khác nhau, điều này hoàn toàn làm cho nó phù hợp nhất cho kinh doanh. Các công ty phát triển ứng dụng Android đang kiếm được lợi nhuận đáng kể với nó.
+ Nó hỗ trợ chia sẻ codebase.
+ Nó là một khung phát triển ứng dụng di động nhanh hơn.
+ Chi phí phát triển ít hơn; do đó nếu bạn eo hẹp về ngân sách, thì đó là một lựa chọn tốt.

Nhược điểm:
+ Phải mất một thời gian dài để gỡ lỗi.
+ Hiệu suất có thể đặt ra câu hỏi vì một số tính năng được phát triển trong các ứng dụng gốc.
+ Nó không hoàn toàn được đo lường tài sản kỹ thuật và những thay đổi nhanh chóng trong các phiên bản của nó cũng đang xảy ra.

#### 1.2 Lợi ích của việc phát triển ứng dụng Native
+ Ứng dụng nhanh và đáng tin cậy
+ Trải nghiệm người dùng tốt nhất (UX) 
+ Bảo mật cao nhất 
+ Hiệu suất ứng dụng tốt hơn
+ Thiết kế bản địa 
+ Tích hợp đầy đủ thiết bị
+ Cộng đồng nhà phát triển khổng lồ 

Ưu điểm:
+ Cung cấp hiệu suất cao và phản ứng nhanh hơn đối với các thiết bị chuyên dụng.
+ Nó có phạm vi tối đa hướng tới một mạng cộng đồng rộng lớn hơn để giải quyết.
+ Khả năng tương thích của phát triển ứng dụng gốc với phần cứng cũng như chức năng phần mềm làm cho hiệu suất của nó vượt trội.
+ Gỡ lỗi là dễ dàng, và nó cũng có ít lỗi hơn.

Nhược điểm:
+ Nó có hai cơ sở mã khác nhau và bạn sẽ phải thuê một nhà phát triển ứng dụng cho cả hai nền tảng HĐH.
+ Một cách tương đối, nó cần có thời gian và nguồn lực đáng kể để phát triển.

### II. So sánh react-native với cross-platform khác (flutter)
#### 2.1 Flutter
Ưu điểm:
+ Mạnh về animation, performance app rất cao.
+ Giao tiếp gần như trực tiếp với native
+ Static language nhưng với syntax hiện đại, compiler linh động giữa AOT (for archive, build prod) và JIT (for development, hot reload)
+ Có thể chạy được giả lập mobile ngay trên web, tiện cho development. Các metric measure performance được hỗ trợ sẵn giúp developer kiểm soát tốt performance của app.
+ Có thể dùng để build các bundle/framework gắn và app native để tăng performance.

Nhược điểm
+ Bộ render UI được team author gần như viết lại, không liên quan tới UI có sẵn của Framework native, dẫn đến memory sử dụng khá nhiều.
+ Phải học thêm ngôn ngữ DART, bloc pattern, DART Streaming
+ Dù đã release 1.0 chính thức, tuy nhiên còn khá mới. Một số plugin rất quan trọng như Google Map vẫn còn đang phát triển, chưa stable.
+ Là con cưng của Google, tuy nhiên hãng dính nhìu phốt với thói quen “quăng con giữa chợ” nên cần cân nhắc.

#### 2.2 React-Native
Ưu điểm
+ Thiên về development/hotfix nhanh (hot reload, bundle injection)
+ Sử dụng JS (quen thuộc với nhiều developer) và có thể share business logic codebase với frontend (js).
+ Back bởi Facebook, họ dùng cho product của họ hàng ngày nên developer hưởng lợi khá nhiều từ đây.
+ Hiện tại đã rất nhiều thư viện, gần như đã rất đầy đủ cho các nhu cầu app thông dụng.

Nhược điểm
+ Giao tiếp với native thông qua các bridge, dễ bị bottleneck nếu không được kiểm soát tốt.
+ Dùng JS nên mang theo các đặc điểm của JS: rất dễ làm nhưng cũng dễ sai, dẫn tới khó maintain về sau.
+ HIệu năng animation là điểm yếu của RN, muốn làm tốt phải làm từ native, tầng js chỉ call vào, setup views. Tuy nhiên với các interactive animation thì rất đau khổ.
+ Không thích hợp cho các app cần năng lực tính toán cao (hash, crypto, etc).