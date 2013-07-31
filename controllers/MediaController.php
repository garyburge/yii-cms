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
            '_FILES'=>'',
            'attributes'=>'',
            'upload'=>'',
            'url'=>'',
        );
        $aResult['_FILES'] = print_r($_FILES, true);

        // create upload form
        $upload = new UploadForm;

        // get uploaded file, if available
        if (isset($_FILES['UploadForm'])) {
            // copy to model
            $upload->name = $_FILES['UploadForm']['name']['file'];
            $upload->tmp_name = $_FILES['UploadForm']['tmp_name']['file'];
            $upload->type = $_FILES['UploadForm']['type']['file'];
            $upload->size = $_FILES['UploadForm']['size']['file'];
            $upload->error = $_FILES['UploadForm']['error']['file'];
            $aResult['attributes'] = print_r($upload->attributes, true);
            $upload->upload = new CUploadedFile($_FILES['UploadForm']['name']['file'],
                                                $_FILES['UploadForm']['tmp_name']['file'],
                                                $_FILES['UploadForm']['type']['file'],
                                                $_FILES['UploadForm']['size']['file'],
                                                $_FILES['UploadForm']['error']['file']);
            $aResult['upload'] = print_r($upload->upload, true);
//            if (!$upload->validate()) {
//                foreach ($upload->errors as $error) {
//                    $aResult['sMessage'] .= '\n'.$error;
//                }
//                $aResult['bError'] = true;
//            } else{
                $aParts = pathinfo($upload->upload->name);
                $saveAsFileName = md5($aParts['filename']).'.'.$aParts['extension'];
                $upload->upload->saveAs($this->module->baseMediaPath.'/'.$saveAsFileName);
                $aResult['url'] = $this->module->baseMediaUrl.'/'.$saveAsFileName;
            }
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
