<?php

class CmsImageEdit extends CWidget
{
    /**
     * @var CActiveRecord the model to edit
     */
    public $model;

    /**
     * Initialize widget
     */
    public function init()
    {
        // this method is called by CController::beginWidget()
        parent::init();
    }

    public function run()
    {
        $this->render('image-edit', array(
            'model'=>$this->model
        ));
    }

}
