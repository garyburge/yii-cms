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
            array('file', 'file', 'allowEmpty'=>true),
//            array('name, type, tmp_name, error, size', 'safe'=>true, 'on'=>'upload')
        );
    }
}
