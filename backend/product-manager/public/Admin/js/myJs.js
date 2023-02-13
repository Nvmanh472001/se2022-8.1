$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
//Tạo thông báo tự động mất sau 3s 
$(document).ready(function() {

    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 1500);

});

//Tạo nút hiển thị mật khẩu 



//Role

// Tao action xoa mềm

function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Mục này sẽ được chuyển vào thùng rác, bạn có thể khôi phục tại đó!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                        )
                    }

                },
                error: function() {
                    if (data.code == 500) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Xóa không thành công!',
                            'Đã xả ra lỗi, vui lòng thử lại.',
                            'fail'
                        )
                    }
                }
            });


        }
    })

}

$(function() {
    $(document).on('click', '.action_delete', actionDelete);
});

// Tạo action khôi phục user đã xóa mềm

function actionRestore(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn có muốn khôi phục?',
        text: "",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã khôi phục!',
                            'Bạn đã khôi phục thành công.',
                            'success'
                        )
                    }

                },
                error: function(data) {
                    if (data.code == 500) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Khôi phục không thành công!',
                            'Đã xả ra lỗi, vui lòng thử lại.',
                            'fail'
                        )
                    }
                }
            });


        }
    })

}

$(function() {
    $(document).on('click', '.action_restore', actionRestore);
});

//Action xoa user khoi database


function actionDeleteForcus(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                        )
                    }

                },
                error: function(data) {
                    if (data.code == 500) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Xóa không thành công!',
                            'Đã xả ra lỗi, vui lòng thử lại.',
                            'fail'
                        )
                    }
                }
            });


        }
    })

}

$(function() {
    $(document).on('click', '.action_deleteForcus', actionDeleteForcus);
});

//Action Xóa Category 

function actionDeleteCate(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);

    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa, sản phẩm thuộc danh mục sẽ bị xóa?',
        text: "Bạn sẽ không thể hoàn tác!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                        )
                    }

                },
                error: function(data) {
                    if (data.code == 500) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Xóa không thành công!',
                            'Đã xả ra lỗi, vui lòng thử lại.',
                            'fail'
                        )
                    }
                }
            });


        }
    })

}

$(function() {
    $(document).on('click', '.action_deleteCate', actionDeleteCate);
});



//    Check Role
$(function() {
    $('.checkbox_wrapper').on('click', function() {
        $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    });

    $('.checkall').on('click', function() {
        $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));

    });
});


//
$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});