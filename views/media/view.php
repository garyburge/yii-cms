<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Media','url'=>array('index')),
	array('label'=>'Create Media','url'=>array('create')),
	array('label'=>'Update Media','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Media','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>View Media</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'media_type_id',
		'original_file',
		'file',
		'title',
		'caption',
		'attribution',
		'copyright',
		'height',
		'width',
		'size',
		'created',
		'updated',
	),
)); ?>
