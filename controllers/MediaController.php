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
                'actions'=>array('index', 'view', 'create', 'update', 'delete', 'imageUpload'),
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
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Media;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Media'])) {
            $model->attributes = $_POST['Media'];
            if ($model->save())
                $this->redirect(array('view', 'id'=>$model->id));
        }

        $this->render('create', array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
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
                $this->redirect(array('view', 'id'=>$model->id));
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
        $aResult = array(
            'bError'=>false,
            'sMessage'=>'',
            'aErrors'=>false,
            '_FILES'=>false,
            '_POST'=>false,
            'attributes'=>false,
            'cUploadedFile'=>false,
            'thumbUrl'=>'',
            'original_file'=>'',
            'file'=>''
        );

        if (isset($_FILES)) {
            $aResult['_FILES'] = print_r($_FILES, true);
        }

        if (isset($_POST['image'])) {
            $aResult['_POST'] = print_r($_POST, true);

            // create model
            $model = new UploadForm;

            // copy to form data to model
            $model->attributes = $_POST['image'];
            $aResult['attributes'] = print_r($model->attributes, true);

            // create uploaded file object
            $model->image = CUploadedFile::getInstance($model, 'image');
            $aResult['cUploadedFile'] = print_r($model->image, true);

//            //validate
//            if (!$model->validate()) {
//                // return error information
//                $aResult['bError'] = true;
//                $aResult['sMessage'] = "Invalid or Missing Input: ";
//                $aResult['aErrors'] = $model->errors;
//            } else {
//                // save the uploaded file
//                $model->image->saveAs('/srv/www/yii-test/images/'.$model->image);
//            }
        }

        // return data
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
