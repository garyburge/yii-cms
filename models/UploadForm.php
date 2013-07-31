<?php

/**
 * UploadForm class.
 *
 */
class UploadForm extends CFormModel
{
    public $image;
    public $media_id;
    public $media_file;

    public function rules()
    {
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}
