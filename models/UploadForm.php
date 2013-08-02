<?php

/**
 * UploadForm class.
 *
 */
class UploadForm extends CActiveRecord
{
    public $image = 'file';

    public function rules()
    {
        return array(
            array('image', 'file', 'types'=>'jpg, png, gif'),
        );
    }
}
