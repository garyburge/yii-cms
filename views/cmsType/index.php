<?php
$this->breadcrumbs=array(
	'Content Types',
);

$this->menu=array(
	array('label'=>'Create ContentType','url'=>array('create')),
	array('label'=>'Manage ContentType','url'=>array('admin')),
);
?>

<h1>Content Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
