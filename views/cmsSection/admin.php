<?php
$this->breadcrumbs=array(
	'Manage Sections',
);
?>

<h1>Manage Content Sections</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'content-section-grid',
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
            'template'=>'{delete}{update}',
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
