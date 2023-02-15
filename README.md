# RNShop 🛒

---

Ứng dụng mua sắm đồ nội thất trên nền tảng React Native. Ứng dụng đáp ứng được các yêu cầu cơ bản của một ứng dụng mua sắm như:

- Đăng nhập, đăng ký
- Xem danh sách sản phẩm
- Xem chi tiết sản phẩm
- Thêm sản phẩm vào giỏ hàng
- Xem danh sách sản phẩm trong giỏ hàng
- Xóa sản phẩm khỏi giỏ hàng
- Thanh toán giỏ hàng
- Xem danh sách đơn hàng
- Xem chi tiết đơn hàng
- Xem lịch sử đơn hàng
- Nhận thông báo từ ứng dụng
- Đăng xuất

## Cài đặt

Clone project [RNShop](https://github.com/Nvmanh472001/se2022-8)

Kiểm tra thiết bị đã được kết nối hay chưa (Đối với máy ảo android hoặc debug (android) trên máy tính)

```bash
adb devices
```

Cài đặt các thư viện cần thiết

```bash
npm install
```

Cài đặt các thư viện cần thiết cho Android

```bash
cd android
gradlew clean
```

Cài đặt các thư viện cần thiết cho iOS

```bash
cd ios
pod install
```

Chạy ứng dụng

```bash
npm run android
```

```bash
npm run ios
```

## Công nghệ sử dụng

- [React Native](https://reactnative.dev/)
  React Native là một framework mã nguồn mở dùng để xây dựng ứng dụng di động cho các hệ điều hành Android, iOS, Windows, macOS, Web, v.v. React Native sử dụng JavaScript để viết mã, nên các lập trình viên có kinh nghiệm với JavaScript có thể dễ dàng học React Native. React Native cũng có thể sử dụng để xây dựng ứng dụng web, vì vậy bạn có thể sử dụng React Native để xây dựng ứng dụng di động và web với cùng một mã nguồn.
- [React Navigation](https://reactnavigation.org/)
  React Navigation là một thư viện mã nguồn mở dùng để xây dựng các ứng dụng di động có nhiều màn hình. React Navigation cung cấp các tính năng như: chuyển màn hình, chuyển màn hình với tham số, chuyển màn hình với animation, chuyển màn hình với nhiều cách khác nhau, v.v.
- [Redux](https://redux.js.org/)
  Redux là một thư viện mã nguồn mở dùng để quản lý trạng thái của ứng dụng. Redux cung cấp các tính năng như: quản lý trạng thái ứng dụng, quản lý trạng thái của các component, quản lý trạng thái của các màn hình, v.v.

## Mô tả chức năng

- Furniture: Chứa thông tin về các sản phẩm nội thất. Các sản phẩm được phân ra các mục như: Chair, Sofas, Beds, Lamps. Các Best offers được hiển thị tại đây để người dùng có thể dễ dàng tìm thấy sản phẩm được lựa chọn nhiều.
- Search: Chứa các sản phẩm được tìm kiếm theo từ khóa.
- Whishlist: Chứa các sản phẩm được lưu vào danh sách yêu thích.
- Notifications: Chứa các thông báo được gửi từ ứng dụng.
- Profile: Chứa thông tin của người dùng. Người dùng có thể chỉnh sửa thông tin cá nhân, đổi mật khẩu, xem lịch sử đơn hàng, đăng xuất.
- Trong giao diện mỗi sản phẩm, người dùng có thể xem chi tiết sản phẩm, thêm sản phẩm vào giỏ hàng, thêm sản phẩm vào danh sách yêu thích.
- Giao diện mua hàng: Người dùng có thể xem danh sách sản phẩm trong giỏ hàng, xóa sản phẩm khỏi giỏ hàng, lựa chọn màu sắc, kích cỡ, thay đổi số lượng sản phẩm trong giỏ hàng, thực hiện thanh toán.
- Giao diện thanh toán: Người dùng có thể xem thông tin đơn hàng, lựa chọn phương thức thanh toán, địa chỉ giao hàng, thực hiện thanh toán. Sau khi thanh toán thành công, người dùng sẽ được chuyển đến màn hình xem lịch sử đơn hàng.

## Các thành viên

- Nguyễn Văn Mạnh - 19000359
- Trần Đức Việt - 19000379
- Trần Đình Đại - 19000334
- Phạm Văn Tĩnh - 19000368

## Update
