<?php
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Author','url'=>array('index')),
	array('label'=>'Create Author','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('author-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Authors</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'author-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'htmlOptions'=>array('style'=>'width:5%;'),
        ),
        array(
            'name'=>'name',
            'htmlOptions'=>array('style'=>'width:20%;'),
        ),
//        'first_name',
//        'middle_name',
//        'last_name',
        array(
            'name'=>'phone',
            'htmlOptions'=>array('style'=>'width:10%;'),
        ),
        array(
            'name'=>'email',
            'htmlOptions'=>array('style'=>'width:20%;'),
        ),
        array(
            'name'=>'url',
            'type'=>'url',
            'htmlOptions'=>array('style'=>'width:20%;'),
        ),
//        'short_bio',
//        'bio',
//        'media_id',
//        'created',
//        'updated',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width:5%;'),
		),
	),
)); ?>
