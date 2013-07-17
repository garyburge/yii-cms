<?php
$this->breadcrumbs=array(
	'Content Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentItem','url'=>array('index')),
	array('label'=>'Create ContentItem','url'=>array('create')),
	array('label'=>'View ContentItem','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ContentItem','url'=>array('admin')),
);
?>

<h1>Update ContentItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>