<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name . ' - Edit Image';
$this->breadcrumbs=array(
    'Media Library'=>array('index'),
	'Edit',
);
?>

<img src="<?php echo $this->module->baseMediaUrl.'/'.$model->file; ?>" alt="<?php echo $model->title; ?>">
<h5><?php echo $model->title; ?></h4>
<p><?php echo $model->caption; ?></p>

