<?php
$this->breadcrumbs=array(
	'Content Sections',
);

$this->menu=array(
	array('label'=>'Create ContentSection','url'=>array('create')),
	array('label'=>'Manage ContentSection','url'=>array('admin')),
);
?>

<h1>Content Sections</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
