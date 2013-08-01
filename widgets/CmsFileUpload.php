<?php

class CmsFileUpload extends CWidget
{
    /**
     * If true, assets are copied each time widget is run; default is false.
     * @var boolean
     */
    public $forceCopyAssets = false;

    protected $_assetsUrl = null;

    public function init()
    {
        // this method is called by CController::beginWidget()
        parent::init();

        // publish assets
		if ($this->_assetsUrl === null) {
			$assetsPath = Yii::getPathOfAlias('cms.assets');
			$this->_assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, $this->forceCopyAssets);
        }

        // register assets
        Yii::app()->clientScript->registerCssFile($assetsUrl.'/css/dropzone.css');
        Yii::app()->clientScript->registerScriptFile($assetsUrl.'/dropzone.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile($assetsUrl.'/file-upload.js', CClientScript::POS_END);

        Yii::trace(__METHOD__." (".__LINE__.": CmsFileUploadWidget initialized", 'application');
    }

    public function run()
    {
        // output form
        $this->render('file-upload-form');
    }

}