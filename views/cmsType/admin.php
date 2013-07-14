<?php
$this->breadcrumbs=array(
	'Manage Types',
);
?>

<h1>Manage Content Types</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'content-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'htmlOptions'=>array('style'=>'width:10%;')
        ),
		array(
            'name'=>'name',
            'htmlOptions'=>array('style'=>'width:30%;')
        ),
		array(
            'name'=>'description',
            'htmlOptions'=>array('style'=>'width:50%;')
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width:10%; white-space:nowrap; text-align:right;'),
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create',
    'url'=>array('create'),
    'type'=>'primary',
    'size'=>'small',
)); ?>
