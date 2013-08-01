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
    public $upload;
    public $media_id;

    public function rules()
    {
        return array(
            array('name', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}
