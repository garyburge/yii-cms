<?php
$this->breadcrumbs=array(
	'Authors'=>array('admin'),
	'Update',
);
?>

<h1>Update Author <?php echo $model->getName(); ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'upload'=>$upload)); ?>