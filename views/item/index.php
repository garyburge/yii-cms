<?php
$this->breadcrumbs=array(
	'Content Items',
);

$this->menu=array(
	array('label'=>'Create ContentItem','url'=>array('create')),
	array('label'=>'Manage ContentItem','url'=>array('admin')),
);
?>

<h1>Content Items</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
