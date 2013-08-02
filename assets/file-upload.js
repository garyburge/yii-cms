// handle file uploads

$(document).ready(function() {

    app = {
        imgTagId: g_imgTagId,
        mediaOriginalFileId: g_mediaOriginalFileId,
        mediaFileId: g_mediaFileId
    };

    // set some dropzone options
    Dropzone.options.fileUploadForm = {
        paramName: "image",
        maxFilesize: 2,
        acceptedFiles: '.jpg, .png, .gif',
        init: function() {
            this.on('success', function(file, data) {
                // submit the form
                $('#file-upload-form').submit();
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

    // bind to file upload form submission
    $('#file-upload-form').on('submit', function(e) {
        e.stopPropagation();
        $.ajax({
            url: '/cms/media/imageupload',
            type: 'post',
            dataType: 'json',
        }).fail(function(jqXHR, status, errorThrown) {
            alert("Error: "+jqXHR.responseText);
        }).done(function(data, status, jqXHR) {
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
                if (data.thumbUrl) {
                    // set image tag src attribute
                    $('#'+app.imgTagId).attr('src', data.thumbUrl);
                    // set media.original_file tag
                    $('#'+app.mediaOriginalFileId).val(data.original_file);
                    // set media.file tag
                    $('#'+app.mediaFileId).val(data.file);
                }
            }
        });
        return false;
    })

    // get dropzone to attach itself to the form
    $('#file-upload-form').addClass('dropzone');

});
