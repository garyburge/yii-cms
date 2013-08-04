<li class="span4">
    <a href="<?php echo $this->module->baseMediaUrl.'/'.$data->file; ?>" class="thumbnail">
        <img src="<?php echo $this->module->baseMediaUrl.'/'.$this->module->imageThumbsDir.'/'.$data->file; ?>" alt="">
    </a>
    <h3><?php $data.title</h3>
    <?php if (!empty($data->caption) { echo "<p>".$data->caption."</p>"; } ?>
</li>

<!--
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->media_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('original_file')); ?>:</b>
	<?php echo CHtml::encode($data->original_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caption')); ?>:</b>
	<?php echo CHtml::encode($data->caption); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribution')); ?>:</b>
	<?php echo CHtml::encode($data->attribution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copyright')); ?>:</b>
	<?php echo CHtml::encode($data->copyright); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

</div>
-->