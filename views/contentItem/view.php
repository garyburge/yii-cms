<?php
$this->breadcrumbs=array(
	'Content Items'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ContentItem','url'=>array('index')),
	array('label'=>'Create ContentItem','url'=>array('create')),
	array('label'=>'Update ContentItem','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ContentItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContentItem','url'=>array('admin')),
);
?>

<h1>View ContentItem #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'sub_title',
		'abstract',
		'content',
	),
)); ?>
