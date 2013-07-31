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
    public $size;
    public $error;
    public $upload;

    public function rules()
    {
        return array(
            array('image', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}
