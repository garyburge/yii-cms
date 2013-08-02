<?php

/**
 * UploadForm class.
 *
 */
class UploadForm extends CFormModel
{
    public $name;
    public $type;
    public $tmp_name;
    public $error;
    public $size;
    public $media_id;

    public function rules()
    {
        return array(
            array('name, type, tmp_name, error, size', 'safe', 'on'=>'upload')
        );
    }
}
