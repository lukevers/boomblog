$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        minHeight: 200,
        maxHeight: null,
    });

    $('#save-draft').bind('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                title: $('#title').val(),
                meta_description: $('#meta_description').val(),
                body: $('.note-editable').html(),
            }
        }).success(function(res) {
            if (res !== 'success') {
                window.location.href = '/dashboard/posts/' + res;
            }
        });
    });

    $('#preview').bind('click', function(e) {
        e.preventDefault();
    });

    $('#publish').bind('click', function(e) {
        e.preventDefault();
    });
});
