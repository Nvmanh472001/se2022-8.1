function myFunction() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("myInputs");
    if (x.type === "password" && y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
$(function() {

    $(".select2_role").select2({
        placeholder: "Chọn vai trò",
        allowClear: true,
        theme: 'classic'
    });


})