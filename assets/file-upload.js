// handle file uploads

$(document).ready(function() {

    app = {
        imgTagId: g_imgTagId,
        mediaOriginalFileId: g_mediaOriginalFileId,
        mediaFileId: g_mediaFileId,
        mediaHeightId: g_mediaHeightId,
        mediaWidthId: g_mediaWidthId,
        image: null
    };

    // set some dropzone options
    Dropzone.options.fileUploadForm = {
        paramName: "image",
        maxFilesize: 2,
        acceptedFiles: '.jpg, .png, .gif',
        //createImageThumbnails: true,
        init: function() {
            this.on('success', function(file, data) {
                // convert to json
                var data = jQuery.parseJSON(data);
                if (data.bError) {
                    var sErrors = '';
                    $.each(data.aErrors, function(key, aErrors) {
                        sErrors += "\n"+key+": ";
                        $.each(aErrors, function(key, sMsg) {
                            sErrors += ' '+sMsg;
                        });
                    });
                    alert("An error occurred during the file upload:\n\n"+data.sMessage+sErrors);
                } else {
                    // set media.original_file tag
                    $('#'+app.mediaOriginalFileId).val(data.original_file);
                    // set media.file tag
                    $('#'+app.mediaFileId).val(data.file);
                    // set media height, width
                    $('#'+app.mediaHeightId).val(data.cropped_height);
                    $('#'+app.mediaWidthId).val(data.cropped_width);
                    // set image tage src attribute
                    $('#'+app.imgTagId).attr('src', data.thumb_url);
                    // show image div, hide dropzone div
                    $('#div-with-image').show();
                    $('#div-no-image').hide();
                    // close dialog
                    $("#file-upload-dialog").dialog('close');
                }
            });
            this.on('thumbnail', function(file, dataUrl) {
                var a = 1;
            })
        }
    };

    // initialize file upload dialog
    $("#file-upload-dialog").dialog({
       autoOpen: false,
       width: 600,
       height: 'auto',
       buttons: [ { text: "Close", click: function() { $( this ).dialog( "close" ); } } ]
    });

    // bind to media image tag
    $('.'+app.imgTagId).on('click', function(e) {
        e.stopPropagation();
        // open file upload dialog
        $("#file-upload-dialog").dialog('open');
        return false;
    })

    // get dropzone to attach itself to the form
    $('#file-upload-form').addClass('dropzone');

});
