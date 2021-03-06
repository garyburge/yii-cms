<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'author-form',
    'focus'=>array($model, 'first_name'),
	'enableAjaxValidation'=>false,
));
?>
    <?php echo CHtml::activeHiddenField($model,'media_id'); ?>

	<p class="help-block muted">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'middle_name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span4','maxlength'=>24)); ?>
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>
	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textAreaRow($model,'short_bio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<?php echo $form->textAreaRow($model,'bio',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <ul class="thumbnails">
        <li class="span4">
            <div class="thumbnail">
            <?php if ($model->id && $model->media): ?>
                <img class="media-id-image" id="media-id-image" src="<?php echo $model->media->file; ?>" alt="image of author" title="<?php echo $model->media->file.' ('.$model->media->width.'x'.$model->media->height.')'; ?>">
                <div><strong><?php echo $model->media->title; ?></strong> - <?php echo $model->media->caption; ?></div>
            <?php else: ?>
                <div class="media-id-image" style="width:150px; height:150px; border:1px solid #eee;" title="Click to upload an image file"></div>
            <?php endif; ?>
            </div>
        </li>
    </ul>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<div id="file-upload-dialog" title="Upload File">
    <?php $this->widget('cms.widgets.CmsFileUpload', array()); ?>
</div>

<script></script>
