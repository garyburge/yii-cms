<?php

class CmsFileUploadWidget extends CWidget
{
    protected $form = <<<EOT
<form id="upload-form" class="dropzone" action="<?php echo $this->createUrl('/media/upload'); ?>" method="post">
    <input type="file" name="file">
</form>
    EOT;

    public function init()
    {
        // this method is called by CController::beginWidget()
    }

    public function run()
    {
        // this method is called by CController::endWidget()
    }
}