// media-form.js

$(document).ready(function() {
    app = {
        isNewRecord: g_isNewRecord,
        baseMediaUrl: g_baseMediaUrl,
        imageThumbsDir: g_imageThumbsDir
    }

    // initialize dropzone on no-image div
    $('#div-no-image').dropzone({
        url: '/media/upload.html',
        paramName: 'file',
        maxFileSize: 2,
        acceptedFiles: '.jpg, .png, .gif',
    });
    
    // set dropzone div, image div
    if (app.isNewRecord) {
        $('#div-no-image').show();
        $('#div-with-image').hide();
    } else {
        $('#div-no-image').hide();
        $('#div-with-image').show();
    }

})
