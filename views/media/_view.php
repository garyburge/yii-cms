<li class="span3">
    <a href="<?php echo $this->module->baseMediaUrl.'/'.$data->file; ?>" class="thumbnail">
        <img src="<?php echo $this->module->baseMediaUrl.'/'.$this->module->imageThumbsDir.'/'.$data->file; ?>" alt="">
    </a>
    <h3><?php $data.title</h3>
    <?php if (!empty($data->caption) { echo "<p>".$data->caption."</p>"; } ?>
    <dl class="dl-horizontal">
        <dt>Attribution:</dt><dd><?php echo (!empty($data->attribution) ? $data->attribution : ''); ?></dd>
        <dt>Copyright:</dt><dd><?php echo (!empty($data->copyright) ? $data->copyright : ''); ?></dd>
        <dt>Type:</dt><dd><?php echo (!empty($data->media_type->description) ? $data->media_type->description : ''); ?></dd>
        <dt>File:</dt><dd><?php echo (!empty($data->original_file) ? $data->original_file : ''); ?></dd>
        <dt>Width X Height:</dt><dd><?php echo $data->width.' x '.$data->height; ?></dd>
        <dt>Size:</dt><dd><?php echo Yii::app()->formatDecimal($data->size / 1024).' Kb'; ?></dd>
        <dt>Created:</dt><dd><?php echo Yii::app()->formatDateTime($data->created); ?></dd>
        <dt>Updated:</dt><dd><?php echo Yii::app()->formatDateTime($data->updated); ?></dd>
    </dl>
</li>
