<?php
$this->breadcrumbs=array(
	'Content Sections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContentSection','url'=>array('index')),
	array('label'=>'Manage ContentSection','url'=>array('admin')),
);
?>

<h1>Create ContentSection</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>