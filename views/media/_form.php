<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'media_type_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'original_file',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'file',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'caption',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'attribution',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'copyright',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'width',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updated',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>