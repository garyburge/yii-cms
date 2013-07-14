<?php
$this->breadcrumbs=array(
	'Content Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentType','url'=>array('index')),
	array('label'=>'Create ContentType','url'=>array('create')),
	array('label'=>'View ContentType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ContentType','url'=>array('admin')),
);
?>

<h1>Update ContentType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>