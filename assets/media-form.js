// media-form.js

$(document).ready(function() {
    app = {
        isNewRecord: g_isNewRecord,
        baseMediaUrl: g_baseMediaUrl,
        imageThumbsDir: g_imageThumbsDir
    }

    // set some dropzone options
    Dropzone.options.fileUploadForm = {
        url: '/media/upload.html',
        paramName: 'file',
        maxFilesize: 2,
        acceptedFiles: '.jpg, .png, .gif',
    };

    // set dropzone div, image div
    if (app.isNewRecord) {
        $('#div-no-image').addClass('dropzone');
        $('#div-no-image').show();
        $('#div-with-image').hide();
    } else {
        $('#div-no-image').hide();
        $('#div-with-image').show();
    }

})
