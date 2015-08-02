$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        minHeight: 200,
        maxHeight: null,
    });

    $('#save-draft').bind('click', function(e) {
        e.preventDefault();
        $that = $(this);
        $that.val('Saving Draft...');
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
                $that.val('Save Draft');
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
