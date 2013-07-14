<?php
$this->breadcrumbs=array(
	'Content Types'=>array('admin'),
	'Create',
);
?>

<h1>Create Content Type</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model
)); ?>