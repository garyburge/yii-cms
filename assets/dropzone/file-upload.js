// handle file uploads

$(document).ready(function() {

    // initialize file upload dialog
    $("#file-upload-dialog").dialog({
       autoOpen: false,
       width: 600,
       height: 'auto',
       buttons: [ { text: "Close", click: function() { $( this ).dialog( "close" ); } } ]
    });

    // bind to media image tag
    $("#media-id-image").on('click', function(e) {
        e.stopPropagation();
        // open file upload dialog
        $("#file-upload-dialog").dialog('open');
        return false;
    })
});
