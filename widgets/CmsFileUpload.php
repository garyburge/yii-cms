<?php

class CmsFileUpload extends CWidget
{
    public $imgTagId = 'media-id-image';
    public $mediaOriginalFileId = 'Media_original_file';
    public $mediaFileId = 'Media_file';
    public $mediaHeightId = 'Media_height';
    public $mediaWidthId = 'Media_width';

    public function init()
    {
        // this method is called by CController::beginWidget()
        parent::init();

        // need jquery-ui
        Yii::app()->clientScript->registerCoreScript('jquery.ui');

        // register assets
        Yii::app()->clientScript->registerCssFile($this->owner->module->assetsUrl.'/dropzone/css/dropzone.css');
        Yii::app()->clientScript->registerScriptFile($this->owner->module->assetsUrl.'/dropzone/dropzone.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile($this->owner->module->assetsUrl.'/file-upload.js', CClientScript::POS_END);

        //Yii::trace(__METHOD__." (".__LINE__.": CmsFileUploadWidget initialized", 'application');
    }

    public function run()
    {
        // output form
        $this->render('file-upload-form', array(
            'imgTagId'=>$this->imgTagId,
            'mediaOriginalFileId'=>$this->mediaOriginalFileId,
            'mediaFileId'=>$this->mediaFileId,
            'mediaHeightId'=>$this->mediaHeightId,
            'mediaWidthId'=>$this->mediaWidthId
        ));
    }

}