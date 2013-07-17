<?php
$this->breadcrumbs=array(
	'Manage Sections'=>array('admin'),
	'Update',
);
?>

<h1>Update '<?php echo $model->name; ?>'</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model
)); ?>
