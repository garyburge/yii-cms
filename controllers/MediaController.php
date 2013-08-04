<?php

class MediaController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';

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
                'actions'=>array('index', 'view', 'create', 'update', 'delete', 'imageUpload', 'imageEdit'),
                'roles'=>$this->module->authRolesMedia
            ),
            array('deny', // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->layout = '//layouts/column1';

        // create data provider
        $dataProvider = new CActiveDataProvider('Media');

        // render index
        $this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     */
    public function actionCreate()
    {
        $model = new Media;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Media'])) {
            $model->attributes = $_POST['Media'];
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('create', array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Media'])) {
            $model->attributes = $_POST['Media'];
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Handle uploaded image
     */
    public function actionImageUpload()
    {
        $aJson = array(
            'bError'=>false,
            'sMessage'=>'',
            'aErrors'=>false,
            'original_file'=>'',
            'file'=>'',
            'thumb_url'=>'',
            'cropped_width'=>'',
            'cropped_height'=>'',
            'cropped_size'=>'',
            'media_type_id'=>0,
        );

        if (isset($_FILES['image'])) {

            // save original file name
            $original_file = $_FILES['image']['name'];
            $aJson['original_file'] = $original_file;

            // get extension
            $aParts = pathinfo($original_file);

            // create file name and save it
            $file = md5($original_file.time()).'.'.$aParts['extension'];
            $aJson['file'] = $file;

            // create original file path
            $original_file_path = $this->module->baseMediaPath.'/'.
                                  $this->module->imageOriginalDir.'/'.
                                  $file;

            // create cropped path
            $cropped_path = $this->module->baseMediaPath.'/'.
                            $file;

            // thumbnail path
            $thumb_path = $this->module->baseMediaPath.'/'.
                          $this->module->imageThumbsDir.'/'.
                          $file;

            // return thumbnail url
            $aJson['thumb_url'] = $this->module->baseMediaUrl.'/'.
                                  $this->module->imageThumbsDir.'/'.
                                  $file;

            // copy tmp file to original file location
            move_uploaded_file($_FILES['image']['tmp_name'], $original_file_path);


            // create cropped image
            $image = Yii::app()->wideimage->load($original_file_path);

            // get original width, height
            $width = $image->width;
            $height = $image->height;

            // set max width or height
            if ($width > $this->module->imageMaxWidth) {
                // shrink width to maximum width
                $width = $this->module->imageMaxWidth;
                $image->resize($width, null)->save($cropped_path);
            } else if ($height > $this->module->imageMaxHeight) {
                // shrink to maximum height
                $height = $this->module->imageMaxHeight;
                $image->resize(null, $height)->save($cropped_path);
            } else {
                // save as is
                $image->save($cropped_path);
            }


            // get size of the cropped image file
            $aJson['cropped_size'] = filesize($cropped_path);

            // get dimensions of the cropped file
            $aDim = getimagesize($cropped_path);
            $aJson['aDim'] = print_r($aDim, true);

            // save width, height
            $width = $aDim[0];
            $height = $aDim[1];

            // return them
            $aJson['cropped_width'] = $width;
            $aJson['cropped_height'] = $height;
            $aJson['media_type_id'] = $aDim[2];


            // are cropped file dimensions larger than thumbnail dimensions?
            if ($width > $this->module->imageThumbWidth || $height > $this->module->imageThumbHeight) {
                // calculate center of crop
                $image->crop($this->module->imageThumbWidth, $this->module->imageThumbHeight, 'center')
                      ->save($thumb_path);
            } else {
                // save without cropping
                $image->save($thumb_path);
            }

        }

        // return data
        echo CJSON::encode($aJson);
        Yii::app()->end();
    }

    /**
     * Edit an image
     * @param integer $id the ID of the model to be edited
     */
    public function actionImageEdit($id)
    {
        $this->render('image-edit', array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Media::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'media-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

//    /**
//     * Manages all models.
//     */
//    public function actionAdmin()
//    {
//        $model = new Media('search');
//        $model->unsetAttributes();  // clear any default values
//        if (isset($_GET['Media']))
//            $model->attributes = $_GET['Media'];
//
//        $this->render('admin', array(
//            'model'=>$model,
//        ));
//    }

}
