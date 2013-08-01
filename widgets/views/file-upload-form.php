<form id="file-upload-form" action="<?php echo $this->controller->createUrl('/cms/media/upload'); ?>" method="post" enctype="multipart/form-data">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>

