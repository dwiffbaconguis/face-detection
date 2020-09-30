$(function () {
    $(".custom-file-input").on("change", function () {
        $files = $(this).prop('files');
        $(".custom-file-label").text('')
        $.each($files, function (key, value) {
            var fileName = value.name;
            $(".custom-file-label")
                .addClass("selected")
                .append(fileName);
        });
    });

    var multiImgPreview = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#photo').on('change', function () {
        multiImgPreview(this, 'div.imgPreview');
    });
})
