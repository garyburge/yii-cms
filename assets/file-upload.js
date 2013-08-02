// handle file uploads

$(document).ready(function() {

    app = {
        imgTagId: g_imgTagId,
        mediaFileId: g_mediaFileId
    };

    // set some dropzone options
    Dropzone.options.fileUploadForm = {
        paramName: "file",
        maxFilesize: 2,
        acceptedFiles: '.jpg, .png, .gif',
        init: function() {
            this.on('success', function(file, data) {
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
                    if (data.thumbUrl) {
                        // set image tag src attribute
                        $('#'+mediaFileId).attr('src', data.thumbUrl);
                    }
                }
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
    $('#'+app.imgTagId).on('click', function(e) {
        e.stopPropagation();
        // open file upload dialog
        $("#file-upload-dialog").dialog('open');
        return false;
    })

    // bind to file upload form submission
    $('#file-upload-form').on('submit', function(e) {
        e.stopPropagation();
        return false;
    })

    // get dropzone to attach itself to the form
    $('#file-upload-form').addClass('dropzone');
});
