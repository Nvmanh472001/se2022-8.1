$(function() {

    $(".select2_order").select2({
        placeholder: "Đơn hàng mới",
        allowClear: false,

    });


})
$(function() {
    $(document).on("change", ".select_status_order", function(e) {
        e.preventDefault();
        let url = $(this).data("action");
        let data = {
            stt: $(this).val()
        };
        let dataStatus = $(this).val();

        $("#progressbar").html('');
        switch ($(this).val()) {
            case '1':

                $(".optionsOrder0").prop('hidden', 'hidden');
                $("#progressbar").append(
                    '<li class="step0 active " id="step1">Xác nhận</li>' +
                    '<li class="step0  text-center" id="step2">Giao hàng</li>' +
                    '<li class="step0  text-muted text-right" id="step3">Nhận hàng</li>'

                );
                break;
            case '2':
                $(".optionsOrder0").prop('hidden', 'hidden');
                $(".optionsOrder1").prop('hidden', 'hidden');
                $("#progressbar").append(
                    '<li class="step0 active " id="step1">Xác nhận</li>' +
                    '<li class="step0 active text-center" id="step2">Giao hàng</li>' +
                    '<li class="step0  text-muted text-right" id="step3">Nhận hàng</li>'
                );
                break;
            case '3':
                $(".optionsOrder0").prop('hidden', 'hidden');
                $(".optionsOrder1").prop('hidden', 'hidden');
                $(".optionsOrder2").prop('hidden', 'hidden');
                $("#progressbar").append(
                    '<li class="step0 active " id="step1">Xác nhận</li>' +
                    '<li class="step0 active  text-center" id="step2">Giao hàng</li>' +
                    '<li class="step0 active text-muted text-right" id="step3">Nhận hàng</li>'
                );
                $(".select_status_order").prop('disabled', 'disabled');
                // code block
                break;
            case '4':
                $(".select_status_order").prop('disabled', 'disabled');
                $("#progressbar").append(
                    '<h3 class="text-center" style="color:red; text-align:center !important; font-size:">Đơn hàng đã bị hủy</h3>'
                );

                break;
            case '0':
                $("#progressbar").append(
                    '<li class="step0  " id="step1">Xác nhận</li>' +
                    '<li class="step0  text-center" id="step2">Giao hàng</li>' +
                    '<li class="step0  text-muted text-right" id="step3">Nhận hàng</li>'
                );
                break;
            default:

        }

        $.get(url, data, res => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Thành công!",
                text: "Cập nhật trạng thái đơn hàng thành công !",
                showConfirmButton: false,
                timer: 1500,
            });
        });

    });

});