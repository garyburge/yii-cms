<?php
$this->breadcrumbs=array(
	'Authors'=>array('admin'),
	'Create',
);
?>

<h1>Create Author</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'upload'=>$upload)); ?>