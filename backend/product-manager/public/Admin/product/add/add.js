    $(function() {
        $(".select2_tags").select2({
            tags: true,
            tokenSeparators: [',', ' '],
            theme: 'classic'
        });
        $(".select2_category").select2({
            placeholder: "Chọn danh mục sản phẩm",
            allowClear: true

        });


    })