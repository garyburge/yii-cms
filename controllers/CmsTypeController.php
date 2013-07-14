<?php

class CmsTypeController extends Controller
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
                'actions'=>array('admin', 'view', 'create', 'update'),
                'roles'=>array('editor', 'publisher', 'administrator'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('publisher', 'administrator'),
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
        $dataProvider = new CActiveDataProvider('CmsType');

        // render list of types
        $this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        // create model
        $model = new CmsType('search');

        // clear any defaults
        $model->unsetAttributes();

        // if paging information available
        if (isset($_GET['CmsType'])) {
            // copy it to model
            $model->attributes = $_GET['CmsType'];
        }

        // render table of types
        $this->render('admin', array(
            'model'=>$model,
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
        // create model
        $model = new CmsType;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        // if form data available
        if (isset($_POST['CmsType'])) {
            // copy form data to model
            $model->attributes = $_POST['CmsType'];
            // validate and save
            if ($model->save()) {
                // return to admin grid
                $this->redirect(array('admin'));
            }
        }

        // display form
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
        // create model for specified row
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        // if form data available
        if (isset($_POST['CmsType'])) {
            // copy it to model
            $model->attributes = $_POST['CmsType'];
            // validate and save
            if ($model->save()) {
                // return to admin grid
                $this->redirect(array('admin'));
            }
        }

        // display form
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
        // we only allow deletion via POST request
        if (Yii::app()->request->isPostRequest) {
            // create item to type model
            $item = new ItemType;

            // any item assigned to this type?
            if ($item->exists('type_id = :type_id', array(':type_id'=>$id))) {
                throw new CHttpException(400, 'Unable to delete the requested type. That type has been assigned to one or more content items.');
            }

            // delete the row
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }

        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request.');
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = CmsType::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
