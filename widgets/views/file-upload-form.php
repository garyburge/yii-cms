<form id="file-upload-form" action="<?php echo $this->controller->createUrl('/cms/media/imageupload'); ?>" method="post" enctype="multipart/form-data"></form>

<script>
    var g_imgTagId = '<?php echo $imgTagId; ?>';
    var g_mediaOriginalFileId = '<?php echo $mediaOriginalFileId; ?>';
    var g_mediaFileId = '<?php echo $mediaFileId; ?>';
    var g_mediaHeightId = '<?php echo $mediaHeightId; ?>';
    var g_mediaWidthId = '<?php echo $mediaWidthId; ?>';
    var g_mediaSizeId = '<?php echo $mediaSizeId; ?>';
</script>
