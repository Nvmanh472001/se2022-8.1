<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 350px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
                0px 0px 0px 5px #ecf0f3,
                8px 8px 15px #a7aaa7,
                -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #03A9F4;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #039BE5;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4;
        }

        .wrapper a:hover {
            color: #039BE5;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }

        a,
        a:hover {
            color: #333
        }
    </style>
    <title>Login</title>
</head>

<body>
    @include('sweetalert::alert')

    <div class="wrapper">
        <div class="logo">
            <img src="https://image.shutterstock.com/image-vector/shop-logo-good-260nw-1290022027.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Rest Password
        </div>

        <form method="post" action = "{{ route('resetpasswordApi') }}" class="p-2 mt-2">
            @csrf

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input required style="font-size: 13px;" type="email" name="email" id="email"
                    placeholder="Nhập email đã đăng kí...">
            </div>
            <button data-url="{{ route('resetpasswordApi') }}"  type="submit" name='submit'
                class="btn mt-3 resetPassword">Xác nhận</button>
        </form>
        <div class="text-center fs-6">

            <a href="{{ url('/admins') }}">Đăng nhập</a>
        </div>

        @if (session('msg'))
            <div style="font-size:12px;" class='alert alert-danger'>
                {!! session('msg') !!}
            </div>
        @endif
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="Admin/js/myJs.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="{{ asset('vendors/sweetarlert/sweetarlert.js') }}"></script>

<script>
    $(function() {
        $(document).on("click", ".resetPassword", function(e) {
            e.preventDefault();
            // let url = $(this).data("action");
            var url = $(this).attr('data-url');
            var emails = document.getElementById("email");
            let data = {
                email:  emails.value
            };
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!emails.value == "") {
                if (!filter.test(emails.value)) {
                    Swal.fire({

                        icon: "error",
                        title: "Đã xảy ra lỗi!",
                        text: "Email chưa đúng định dạng.",
                        showConfirmButton: false,
                        timer: 1000,
                    });
                    return false;
                }
            } else {

                Swal.fire({

                    icon: "error",
                    title: "Đã xảy ra lỗi!",
                    text: "Vui lòng nhập email cần khôi phục.",
                    showConfirmButton: false,
                    timer: 1000,
                });
                return false;
            }
            $.post(url, data
            , res => {
                Swal.fire({
                    icon: "success",
                    title: "Thành công!",
                    text: "Chúng tôi đã gửi cho bạn đường link xác nhận mật khẩu mới.",
                    showConfirmButton: false,
                    timer: 4000,
                });
            }
            );



        });

    });
</script>

</html>
