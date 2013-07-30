<?php
$this->breadcrumbs=array(
	'Authors'=>array('index'),
	'Manage',
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
            'htmlOptions'=>array('style'=>'width:8%; white-space:nowrap;'),
		),
	),
)); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbButton', array('label'=>'Advanced Search', 'url'=>'#', 'type'=>null, 'size'=>'small', 'htmlOptions'=>array('class'=>'search-button')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('label'=>'Create Author', 'url'=>array('create'), 'type'=>'primary', 'size'=>'small')); ?>
