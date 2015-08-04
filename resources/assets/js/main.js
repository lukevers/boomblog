$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        minHeight: 200,
        maxHeight: null,
        onImageUpload: function(files, editor, welEditable) {
            var data = new FormData();
            data.append('file', files[0]);
            $.ajax({
                type: 'POST',
                url: '/dashboard/uploadimage',
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                data: data,
                success: function(filepath) {
                    console.log(filepath);
                    $('#summernote').summernote("insertImage", filepath);
                },
            });
        },
    });

    $('#save-draft').bind('click', function(e) {
        e.preventDefault();
        $that = $(this);
        $that.saved_value = $that.val();
        $that.val('Saving...');
        $.ajax({
            type: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                title: $('#title').val(),
                meta_description: $('#meta_description').val(),
                body: $('.note-editable').html(),
            }
        }).success(function(res) {
            $that.val('Saved!');
            if (res !== 'success') {
                window.location.href = '/dashboard/posts/' + res;
            }
        }).always(function(res) {
            setTimeout(function() {
                $that.val($that.saved_value);
            }, 1000);
        });
    });

    $('#preview').bind('click', function(e) {
        e.preventDefault();
    });

    $('#publish').bind('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'PATCH',
            data: {
                _token: $('input[name="_token"]').val(),
                publish: 'now',
            }
        }).success(function(res) {
            // the variable res should be a link to the published post
            window.location.href = res;
        });
    });
});
