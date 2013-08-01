<?php

/**
 * UploadForm class.
 *
 */
class UploadForm extends CFormModel
{
    public $file;
//    public $name;
//    public $type;
//    public $tmp_name;
//    public $error;
//    public $size;
//    public $upload;
//    public $media_id;

    public function rules()
    {
        return array(
            array('file', 'file', 'types'=>'jpg, png, gif'),
            array('file', 'safe', 'on'=>'upload')
        );
    }
}
