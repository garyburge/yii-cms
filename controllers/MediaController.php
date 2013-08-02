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
            '_POST'=>'',
            '_FILES'=>'',
            'attributes'=>'',
            'cUploadedFile'=>'',
            'originalUrl'=>'',
            'thumbUrl'=>'',
            'resizedUrl'=>'',
            'media_id'=>0
        );
        $aResult['_POST'] = print_r($_POST, true);
        $aResult['_FILES'] = print_r($_FILES, true);

        // create upload form
        $upload = new Media;

        try {
            // get uploaded file, if available
            if (isset($_FILES['file'])) {
                // copy to model attributes
                $media->attributes = $_FILES['file'];
//                $model->media = CUploadedFile::getInstance($media, 'file');

                // debug returns
                $aResult['attributes'] .= print_r($upload->attributes, true);
//                $aResult['cUploadedFile'] .= print_r($cUploadedFile, true);
//
//                // validate
                if (!$media->validate()) {
                    $aResult['aErrors'] = $upload->errors;
                    throw new CException("An error occured during the attempted file transfer: ");
                } else {
//                    // create save as file name
//                    $aParts = pathinfo($_FILES['file']['name']);
//                    $saveAsFileName = md5($aParts['filename'].time()).'.'.$aParts['extension'];
//
//                    // copy uploaded file to original file directory
//                    if (!$cUploadedFile->saveAs($this->module->baseMediaPath.'/'.$this->module->imageOriginalDir.'/'.$saveAsFileName)) {
//                        throw new CException("Error: Unable to copy the uploaded file to the correct destination.");
//                    }
//                    $aResult['originalUrl'] = $this->module->baseMediaUrl.'/'.$this->module->imageOriginalDir.'/'.$saveAsFileName;
//
//                    // save and create thumbnail
//                    $aResult['thumbUrl'] = $this->createThumb($saveAsFileName);
//
//                    // save and create cropped file (cropped to max width or height)
//                    $aResult['resizedUrl'] = $this->createResized($saveAsFileName);
//
//                    // get media type id
//                    $sql = "SELECT id FROM media_type ".
//                           "WHERE extension = :extension ";
//                    if (false === ($media_type_id = Yii::app()->db->createCommand($sql)->queryScalar(array(':extension'=>$aParts['extension'])))) {
//                        throw new CException("Error: ".$aParts['extension']." is an unknown type of image file.");
//                    }
//
//                    // create model
//                    //$model = new Media;
//
//                    // initialize its attributes
//                    $media->media_type_id = $media_type_id;
//                    $media->file = $saveAsFileName;
//                    $media->title = 'Uploaded File';
//                    if (!$media->save()) {
//                        throw new CException("Error: Unable to save the uploaded file information to the database.");
//                    }
//
//                    // return media id
//                    $aResult['media_id'] = $media->id;
                }
            }
        } catch (CException $e) {
            $aResult['bError'] = true;
            $aResult['sMessage'] = $e->getMessage();
        }

        echo CJSON::encode($aResult);
        Yii::app()->end();
	}

    /**
     * Create a thumbnail file
     *
     * @param string $file the file name to use for the converted thumbnail image
     * @return string $thumbUrl the url to the thumbnamil file
     */
    public function createThumb($fileName)
    {
        $originalPath = $this->module->baseMediaPath.'/'.$this->module->imageOriginalDir.'/'.$fileName;
        $thumbPath = $this->module->baseMediaPath.'/'.$this->module->imageThumbsDir.'/'.$fileName;

        // crop for thumbnail size
        Yii::app()->wideimage->load($originalPath)
                  ->adaptive($this->module->$imageThumbWidth, $this->module->$imageThumbHeight)
                  ->quality(90)
                  ->save($thumbPath, 0644, true);

        return $this->module->baseMediaUrl.'/'.$this->module->imageThumbsDir.'/'.$fileName;

    }

    /**
     * Resize uploaded image to max width/max height
     * @param string $fileName
     * @return string the url of the resized file
     * @throws CException
     */
    public function createResized($fileName)
    {
        $originalPath = $this->module->baseMediaPath.'/'.$this->module->imageOriginalDir.'/'.$fileName;
        $croppedPath = $this->module->baseMediaPath.'/'.$fileName;

        // crop for thumbnail size
        Yii::app()->wideimage->load($originalPath)
                  ->adaptive($this->module->$imageMaxWidth, $this->module->$imageMaxHeight, true)
                  ->quality(90)
                  ->save($croppedPath, 0644, true);

        return $this->module->baseMediaUrl.'/'.$fileName;

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
