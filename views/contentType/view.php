<?php
$this->breadcrumbs=array(
	'Content Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ContentType','url'=>array('index')),
	array('label'=>'Create ContentType','url'=>array('create')),
	array('label'=>'Update ContentType','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ContentType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentType','url'=>array('admin')),
);
?>

<h1>View ContentType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
