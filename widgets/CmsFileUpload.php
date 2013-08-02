<?php

class CmsFileUpload extends CWidget
{
    public $imgTagId = 'media-id-image';
    public $mediaFileId = 'Media_original_file';

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
        $this->render('file-upload-form', array('imgTagId'=>$this->imgTagId, 'mediaFileId'=>$this->mediaFileId));
    }

}