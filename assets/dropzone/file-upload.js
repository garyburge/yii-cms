// handle file uploads

$(document).ready(function() {

//    // set some dropzone options
//    Dropzone.options.myAwesomeDropzone = {
//        paramName: "file",
//        maxFilesize: 2,
//        acceptedFiles: '.jpg, .png, .gif',
//        init: function() {
//            this.on('success', function(file, data) {
//                if (data.bError) {
//                    alert("An error occurred during the file upload:\n\n"+data.sMessage);
//                } else {
//                    if (data.url) {
//                        // set image tag src attribute
//                        $('#media-id-image').attr('src', data.url);
//                        // set media id hidden tag
//                        $('#media_id').val(datal.media_id);
//                    }
//                }
//            })
//        }
//    };

    // initialize file upload dialog
    $("#file-upload-dialog").dialog({
       autoOpen: false,
       width: 600,
       height: 'auto',
       buttons: [ { text: "Close", click: function() { $( this ).dialog( "close" ); } } ]
    });

    // bind to media image tag
    $(".media-id-image").on('click', function(e) {
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
});
