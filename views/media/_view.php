<li class="span3">
    <div>
        <a href="<?php echo $this->createUrl('/cms/media/imageedit', array('id'=>$data->id)); ?>" title="Click to edit this image">Edit</a>
    </div>
    <a href="<?php echo $this->createUrl('/cms/media/view', array('id'=>$data->id)); ?>" class="thumbnail">
        <img src="<?php echo $this->module->baseMediaUrl.'/'.$this->module->imageThumbsDir.'/'.$data->file; ?>" alt="image">
    </a>
    <h3><?php $data->title; ?></h3>
    <?php echo (!empty($data->caption) ? '<p>'.$data->caption.'</p>' : ''); ?>
    <dl>
        <dt>Attribution:</dt><dd><?php echo (!empty($data->attribution) ? $data->attribution : ''); ?></dd>
        <dt>Copyright:</dt><dd><?php echo (!empty($data->copyright) ? $data->copyright : ''); ?></dd>
        <dt>Type:</dt><dd><?php echo (!empty($data->media_type->description) ? $data->media_type->description : ''); ?></dd>
        <dt>File:</dt><dd><?php echo (!empty($data->original_file) ? $data->original_file : ''); ?></dd>
        <dt>Saved As:</dt><dd><?php echo (!empty($data->file) ? $data->file : ''); ?></dd>
        <dt>Width X Height:</dt><dd><?php echo $data->width.' x '.$data->height; ?></dd>
        <dt>Size:</dt><dd><?php echo Yii::app()->numberFormatter->formatDecimal($data->size / 1024).' Kb'; ?></dd>
        <dt>Created:</dt><dd><?php echo Yii::app()->dateFormatter->formatDateTime($data->created); ?></dd>
        <dt>Updated:</dt><dd><?php echo Yii::app()->dateFormatter->formatDateTime($data->updated); ?></dd>
    </dl>
</li>
