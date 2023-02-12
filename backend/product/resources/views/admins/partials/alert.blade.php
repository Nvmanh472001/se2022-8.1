@if (session('msg'))
    <div style="" class='alert alert-success'>
        {{ session('msg') }}
        
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
       <span>Vui lòng kiểm tra lại dữ liệu nhập vào !</span>
    </div>
@endif