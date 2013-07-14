<?php
$this->breadcrumbs=array(
	'Content Sections'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContentSection','url'=>array('index')),
	array('label'=>'Create ContentSection','url'=>array('create')),
	array('label'=>'View ContentSection','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ContentSection','url'=>array('admin')),
);
?>

<h1>Update ContentSection <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>