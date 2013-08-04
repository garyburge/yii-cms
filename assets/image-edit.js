/* image-edit.js */
$(document).ready(function() {
    // application data
    app = {
        imageOriginalDir: g_imageOriginalDir,
        imageThumbsDir: g_imageThumbsDir,
        baseMediaPath: g_baseMediaPath,
        baseMediaUrl: g_baseMediaUrl,
        media_id: g_media_id,
        media_original_file: g_media_original_file,
        media_file: g_media_file,
        media_height: g_media_height,
        media_width: g_media_width,
        canvas: null,
        canvas_width: 0,
        canvas_height: 0,
        stage: null,
        image: null,
        bitmap: null
    }

    document.getElementById("loader").className = "loader";

    //find canvas and load images, wait for last image to load
    app.canvas = document.getElementById('canvas-image-edit');

    // create imate
    app.image = new Image();
    app.image.src = app.baseMediaUrl+'/'+app.imageOriginalDir+'/'+app.media_file;
    app.image.onload = handleImageLoad;

    // bind to select tool
    $('#btn-select-tool').on('click', function(e) {
        e.stopPropagation();
        // attach Jcrop
        $('#canvas-image-edit').Jcrop();
        return false;
    })

    // handle image loading
    function handleImageLoad(event) {
        document.getElementById("loader").className = "";

        // create stage
        app.stage = new createjs.Stage(app.canvas);

        app.bitmap = new createjs.Bitmap(app.image);
        app.bitmap.scaleX = app.bitmap.scaleY = 2;
        app.bitmap.cache(0, 0, app.image.width, app.image.height);
        app.stage.addChild(app.bitmap);

        updateImage();



    }

    function updateImage() {
        app.bitmap.updateCache();
        app.stage.update();
    }

})

//        var img;
//        var stage;
//        var bmp;
//        var DELTA_INDEX;
//        var blurXSlider;
//        var blurFilter, hueFilter, constrastFilter, saturationFilter, brightnessFilter;
//        var redChannelFilter, greenChannelFilter, blueChannelFilter;
//        var colorFilter;
//        var slideInterval = -1;
//        var cm;
//
//        function init() {
//        	if (window.top != window) {
//        		document.getElementById("header").style.display = "none";
//        	}
//	        document.getElementById("loader").className = "loader";
//
//            img = new Image();
//            img.onload = handleImageLoad;
//            img.src = "assets/flowers_small.jpg";
//        }
//
//        function handleImageLoad() {
//	        document.getElementById("loader").className = "";
//
//            var canvas = document.getElementById("testCanvas");
//
//            stage = new createjs.Stage(canvas);
//
//            bmp = new createjs.Bitmap(img);
//	        bmp.scaleX = bmp.scaleY = 2;
//            bmp.cache(0,0,img.width,img.height);
//            stage.addChild(bmp);
//
//            $(".brightnessSlider").slider({
//                value: 0,
//                min: -100,
//                max: 100,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".saturationSlider").slider({
//                value: 0,
//                min: -100,
//                max: 100,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".contrastSlider").slider({
//                value: 0,
//                min: -100,
//                max: 100,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".hueSlider").slider({
//                value: 0,
//                min: -100,
//                max: 100,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".blurYSlider").slider({
//                value: 0,
//                min: 0,
//                max: 30,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".blurXSlider").slider({
//                value: 0,
//                min: 0,
//                max: 30,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".redChannelSlider").slider({
//                value: 255,
//                min: 0,
//                max: 255,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".greenChannelSlider").slider({
//                value: 255,
//                min: 0,
//                max: 255,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $(".blueChannelSlider").slider({
//                value: 255,
//                min: 0,
//                max: 255,
//                disabled:false,
//	            change:handleChange,
//	            slide: handleSlide
//            });
//
//            $("#resetBtn").click(handleReset);
//
//            applyEffect();
//        }
//
//        function handleSlide() {
//	        if (slideInterval == -1) {
//		        slideInterval = setInterval(applyEffect, 250);
//	        }
//        }
//
//        function handleChange() {
//	        clearInterval(slideInterval);
//	        slideInterval = -1;
//	        applyEffect();
//        }
//
//        function applyEffect() {
//            var brightnessValue = $(".brightnessSlider").slider("option", "value");
//            var contrastValue =  $(".contrastSlider").slider("option", "value");
//            var saturationValue =  $(".saturationSlider").slider("option", "value");
//            var hueValue = $(".hueSlider").slider("option", "value");
//
//            var blurXValue = $(".blurXSlider").slider("option", "value");
//            var blurYValue = $(".blurYSlider").slider("option", "value");
//
//            var redChannelvalue = $(".redChannelSlider").slider("option", "value");
//            var greenChannelValue = $(".greenChannelSlider").slider("option", "value");
//            var blueChannelValue = $(".blueChannelSlider").slider("option", "value");
//
//            cm = new createjs.ColorMatrix();
//            cm.adjustColor(brightnessValue, contrastValue, saturationValue, hueValue);
//
//            colorFilter = new createjs.ColorMatrixFilter(cm);
//            blurFilter = new createjs.BoxBlurFilter(blurXValue,  blurYValue, 2);
//            redChannelFilter = new createjs.ColorFilter(redChannelvalue/255,1,1,1);
//            greenChannelFilter = new createjs.ColorFilter(1,greenChannelValue/255,1,1);
//            blueChannelFilter = new createjs.ColorFilter(1,1,blueChannelValue/255,1);
//
//            updateImage();
//        }
//
//        function handleReset() {
//            $(".brightnessSlider").slider("option", "value", 0);
//            $(".saturationSlider").slider("option", "value", 0);
//            $(".hueSlider").slider("option", "value", 0);
//            $(".blurYSlider").slider("option", "value", 0);
//            $(".blurXSlider").slider("option", "value", 0);
//            $(".contrastSlider").slider("option", "value", 0);
//            $(".redChannelSlider").slider("option", "value", 255);
//            $(".greenChannelSlider").slider("option", "value", 255);
//            $(".blueChannelSlider").slider("option", "value", 255);
//
//            applyEffect();
//        }
//
//        function updateImage() {
//            bmp.filters = [colorFilter, blurFilter, redChannelFilter, greenChannelFilter, blueChannelFilter];
//            bmp.updateCache();
//            stage.update();
//        }
//
