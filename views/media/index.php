<?php
$this->breadcrumbs=array(
	'Medias',
);

$this->menu=array(
	array('label'=>'Create Media','url'=>array('create')),
);
?>

<h1>Media Library</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
