<?php
$this->breadcrumbs=array(
	'Content Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentItem','url'=>array('index')),
	array('label'=>'Manage ContentItem','url'=>array('admin')),
);
?>

<h1>Create ContentItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>