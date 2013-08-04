<?php
$this->breadcrumbs=array(
	'Medias',
);

$this->menu=array(
	array('label'=>'Create Media','url'=>array('create')),
);
?>

<h2>Media Library</h2>

<a href="<?php $this->createUrl('/cms/media/imageupload'); ?>" title="Click to upload a new image" class="pull-right">Create</a>
<ul class="thumbnails">
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</ul>
