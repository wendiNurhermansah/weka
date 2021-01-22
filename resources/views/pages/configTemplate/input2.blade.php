<div class="form-group m-0">
    <label for="" class="col-form-label s-12 col-md-4">Logo Auth</label>
    <input type="file" name="logo_auth" id="file2" class="input-file2" onchange="tampilkanPreview2(this,'preview2')">
    <label for="file2" class="btn-tertiary js-labelFile2 col-md-8">
        <i class="icon icon-image mr-2 m-b-1"></i>
        <span id="changeText2" class="js-fileName2">Browse Image</span>
    </label>
    <img id="result2" class="d-none" width="150">
    <hr>
    <img width="150" class="rounded img-fluid m-l-240 mt-1 mb-1" id="preview2" alt=""/>
</div>
<script>
    (function () {
        'use strict';
        $('.input-file2').each(function () {
            var $input = $(this),
                $label = $input.next('.js-labelFile2'),
                labelVal = $label.html();

            $input.on('change', function (element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName2').html(fileName) : $label
                    .removeClass('has-file').html(labelVal);
            });
        });
    })();

    function tampilkanPreview2(gambar, idpreview) {
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element) {
                    return function (e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                $.confirm({
                    title: '',
                    content: 'Tipe file tidak boleh! haruf format gambar (png, jpg)',
                    icon: 'icon icon-close',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: "ok!",
                            btnClass: 'btn-primary',
                            keys: ['enter'],
                            action: add()
                        }
                    }
                });
            }
        }
    }
</script>