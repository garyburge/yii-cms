<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="loader"></div>

<div class="row">
    <div class="span9">
        <div class="div-image-edit">
            <canvas id="canvas-image-edit" width="800" height="800"></canvas>
        </div>
    </div><!-- .span9 -->
    <div class="span3">
        <div id="controls-tools">
            <button id="btn-crop" class="btn btn-mini" style="width:24px; height:24px;"><i class="icon-crop" style="font-size:16px;"></i></button>
            <a href="#" class="btn"><i class="icon-crop"></i></a>
            <a id="btn-crop-off" href="#">(off)</a>
        </div>
        <div id="controls-accordion">
            <h3>Resize</h3>
            <div>
            </div>
            <h3>Crop</h3>
            <div>
                <a id="btn-select-tool" class="btn btn-small" href="#">Select Tool</a>
            </div>
            <h3>Color</h3>
            <div>
            </div>
        </div>
    </div><!-- .span3 -->
</div><!-- .row -->


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
