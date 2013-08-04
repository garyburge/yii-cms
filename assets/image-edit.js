/* image-edit.js */
$(document).ready(function() {
    // application data
    app = {
        imageOriginalDir: g_imageOriginalDir,
        imageThumbsDir: g_imageThumbsDir,
        baseMediaPath: g_baseMediaPath,
        baseMediaUrl: g_baseMediaUrl,
        media_id: g_media_id,
        media_original_file: g_original_file,
        media_file: g_file,
        media_height: g_height,
        media_width: g_width,
        canvas: null,
        canvas_width: 0,
        canvas_height: 0,
        stage: null,
        image: null,
        bitmap: null
    }

    document.getElementById("loader").className = "loader";

    //find canvas and load images, wait for last image to load
    app.canvas = document.getElementById("testCanvas");

    // create imate
    app.image = new Image();
    app.image.src = imageOriginalDir+'/'+media_original_file;
    app.image.onload = handleImageLoad;

    // handle image loading
    function handleImageLoad(event) {
        document.getElementById("loader").className = "";
        
        // create stage
        app.stage = new createjs.Stage(app.canvas);

        app.bitmap = new createjs.Bitmap(app.image);
        app.bitmap.scaleX = bitmap.scaleY = 2;
        app.bitmap.cache(0, 0, app.image.width, app.image.height);
        app.stage.addChild(app.bitmap);

    }
})
