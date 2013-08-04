<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Edit Image';
$this->breadcrumbs=array(
    'Media Library'=>array('index'),
	'Edit',
);
?>

<?php $this->widget('cms.widgets.CmsImageEdit', array(
    'model'=>$model,
));
