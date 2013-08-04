<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="loader"></div>

<div class="div-image-edit">
	<canvas id="canvas-image-edit" width="800" height="800"></canvas>
</div>

<script>
    var g_imageOriginalDir = '<?php echo $this->controller->module->imageOriginalDir; ?>';
    var g_imageThumbsDir = '<?php echo $this->controller->module->imageThumbsDir; ?>';
    var g_baseMediaPath = '<?php echo $this->controller->module->baseMediaPath; ?>';
    var g_baseMediaUrl = '<?php echo $this->controller->module->baseMediaUrl; ?>';
    var g_media_id = <?php echo $model->id; ?>;
    var g_media_original_file = '<?php echo $model->original_file; ?>';
    var g_media_file = '<?php echo $model->file; ?>';
    var g_media_height = <?php echo $model->height; ?>;
    var g_media_width = <?php echo $model->width; ?>;
</script>
