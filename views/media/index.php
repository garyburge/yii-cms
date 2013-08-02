<?php
$this->breadcrumbs=array(
	'Medias',
);

$this->menu=array(
	array('label'=>'Create Media','url'=>array('create')),
	array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>Media Library</h1>

<div class="row">
    <div class="span9">
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    </div><!-- .span9 -->
    <div class="span3">
    </div><!-- .span3 -->
</div>
