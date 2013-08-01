<?php

class MediaController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow',
                  'actions'=>array('upload'),
                  'roles'=>$this->module->authRolesMedia,
            ),
			array('deny',  // deny all users
				  'users'=>array('*'),
			),
		);
	}

	/**
	 * upload a file
	 */
	public function actionUpload()
	{
        $aResult = array(
            'bError'=>false,
            'sMessage'=>'',
            'aErrors'=>false,
            '_FILES'=>'',
            'attributes'=>'',
            'upload'=>'',
            'url'=>'',
            'media_id'=>0
        );
        $aResult['_FILES'] = print_r($_FILES, true);

        // create upload form
        $upload = new UploadForm('upload');;

        // get uploaded file, if available
        if (isset($_FILES['file'])) {
            // copy to model attributes
//            $upload->attributes = $_FILES['file'];
            $upload->attributes = $_FILES;
            $aResult['attributes'] = print_r($upload->attributes, true);
//            $upload->file = CUploadedFile::getInstance($upload, 'file');
//            $upload->save();

//            // copy to model
//            $upload->name = $_FILES['file']['name'];
//            $upload->tmp_name = $_FILES['file']['tmp_name'];
//            $upload->type = $_FILES['file']['type'];
//            $upload->size = $_FILES['file']['size'];
//            $upload->error = $_FILES['file']['error'];
//            $aResult['attributes'] = print_r($upload->attributes, true);
//            // validate
//            if (!$upload->validate()) {
//                $aResult['aErrors'] = $upload->errors;
//                $aResult['bError'] = true;
//            } else{
//                // create upload file object
//                $upload->upload = new CUploadedFile($_FILES['file']['name'],
//                                                    $_FILES['file']['tmp_name'],
//                                                    $_FILES['file']['type'],
//                                                    $_FILES['file']['size'],
//                                                    $_FILES['file']['error']);
//                $aResult['upload'] = print_r($upload->upload, true);
//                // copy original file
//                $aParts = pathinfo($_FILES['file']['name']);
//                $saveAsFileName = md5($aParts['filename']).'.'.$aParts['extension'];
//                $upload->upload->saveAs($this->module->baseMediaPath.'/'.$saveAsFileName);
//                $aResult['url'] = $this->module->baseMediaUrl.'/'.$saveAsFileName;
//            }
        }

        echo CJSON::encode($aResult);
        Yii::app()->end();
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = Media::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
