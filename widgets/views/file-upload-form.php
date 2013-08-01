<form id="file-upload-form" class="dropzone" action="<?php echo $this->controller->createUrl('/cms/media/upload'); ?>" method="post">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>

