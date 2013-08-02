<?php
    $sql = "SELECT id, CONCAT(extension, ' (', name, ')') AS value FROM media_type ORDER BY extension";
    $aTypes = Yii::app()->db->createCommand($sql)->queryAll(true);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block muted"><small>Fields with <span class="required">*</span> are required.</small></p>
    <?php echo $form->errorSummary($model); ?>

    <ul class="thumbnails">
        <li class="span4">
            <div class="thumbnail">
                <div id="div-no-image"<?php echo ($model->isNewRecord ? '' : ' class="invisible"'); ?>>
                    <div class="media-id-image" style="width:150px; height:150px; border:1px solid #eee;" title="Click to upload an image file"></div>
                </div>
                <div id="div-with-image"<?php echo ($model->isNewRecord ? ' class="invisible"' : ''); ?>>
                    <img class="media-id-image" id="media-id-image" src="<?php echo $model->media->file; ?>" alt="image of author" title="<?php echo $model->media->file.' ('.$model->media->width.'x'.$model->media->height.')'; ?>">
                    <div><strong><?php echo $model->media->title; ?></strong> - <?php echo $model->media->caption; ?></div>
                </div>
            </div>
        </li>
    </ul>
    <?php echo $form->dropDownListRow($model, 'media_type_id', CHtml::listData($aTypes, 'id', 'value'), array('class'=>'span5')); ?>
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
