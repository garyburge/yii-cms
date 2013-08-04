<?php

class CmsImageEdit extends CWidget
{
    /**
     * @var CActiveRecord the model to edit
     */
    public $model;
    /**
     * @var string url to EaselJS assets
     */
    public $easelJsAssetsUrl;

    /**
     * Initialize widget
     */
    public function init()
    {
        // this method is called by CController::beginWidget()
        parent::init();

        // need jquery and jquery.ui
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerCoreScript('jquery.ui');

        // if not published
  		$assetsPath = Yii::getPathOfAlias('easeljs.lib');
		$this->easelJsAssetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, false);

        // need easeljs script files
        Yii::app()->clientScript->registerScriptFile($this->easelJsAssetsUrl.'/easeljs-0.6.1.min.js');
    }

    public function run()
    {
        $this->render('image-edit', array(
            'model'=>$this->model
        ));
    }

}
