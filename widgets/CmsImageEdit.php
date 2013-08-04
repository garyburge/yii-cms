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

        // publish easelJs
  		$assetsPath = Yii::getPathOfAlias('easeljs.lib');
		$this->easelJsAssetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, false);

        // register easeljs script files
        Yii::app()->clientScript->registerScriptFile($this->easelJsAssetsUrl.'/easeljs-0.6.1.min.js');

        // publish jcrop
  		$assetsPath = Yii::getPathOfAlias('jcrop');
		$this->jcropAssetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, false);

        // register Jcrop script, css files
        Yii::app()->clientScript->registerScriptFile($this->jcropAssetsUrl.'/js/jquery.Jcrop.min.js');
        Yii::app()->clientScript->registerCssFile($this->jcropAssetsUrl.'/css/jquery.Jcrop.min.css');

        // and then our own javascript
        Yii::app()->clientScript->registerScriptFile($this->controller->module->assetsUrl.'/image-edit.js');

    }

    public function run()
    {
        $this->render('image-edit', array(
            'model'=>$this->model
        ));
    }

}
