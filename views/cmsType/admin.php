<?php
$this->breadcrumbs=array(
	'Content Types'=>array('admin'),
	'Manage',
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
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width:10%; white-space:nowrap; text-align:right;')
            'template'=>(Yii::app()->getModule('role')->hasRole(array('publisher', 'administrator')) ? '{delete}{update}' : '{update}'),
		),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Create',
    'url'=>array('create'),
    'type'=>'primary',
    'size'=>'small',
)); ?>
