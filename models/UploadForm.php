<?php

/**
 * UploadForm class.
 *
 */
class UploadForm extends CFormModel
{
    public $name;
    public $type;
    public $size;
    public $tmp_name;
    public $error;
    public $upload;
    public $media_id;

    public function rules()
    {
        return array(
            array('file', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}
