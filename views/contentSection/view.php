<?php
$this->breadcrumbs=array(
	'Content Sections'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ContentSection','url'=>array('index')),
	array('label'=>'Create ContentSection','url'=>array('create')),
	array('label'=>'Update ContentSection','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ContentSection','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentSection','url'=>array('admin')),
);
?>

<h1>View ContentSection #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
