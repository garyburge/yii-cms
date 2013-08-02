<form id="file-upload-form" action="<?php echo $this->controller->createUrl('/cms/media/imageupload'); ?>" method="post" enctype="multipart/form-data">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>

<script>
    var g_imgTagId = '<?php echo $imgTagId; ?>';
    var g_mediaOriginalFileId = '<?php echo $mediaOriginalFileId; ?>';
    var g_mediaFileId = '<?php echo $mediaFileId; ?>';
</script>
