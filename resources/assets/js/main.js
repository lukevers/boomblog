$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        minHeight: 200,
        maxHeight: null,
    });

    $('#submit').bind('click', function(e) {
        $('#body').html($('.note-editable').html());
    });
});
