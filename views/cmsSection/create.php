<?php
$this->breadcrumbs=array(
	'Manage Sections'=>array('admin'),
	'Create',
);

?>

<h1>Create Section</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model
)); ?>