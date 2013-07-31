<?php

class CmsModule extends CWebModule
{
    /**
     * @var array role names authorized to admin, create, update and delete Authors
     */
    public $authRolesAuthors = array('administrator');

    /**
     * @var array role names authorized to upload, admin, create, update and delete Media
     */
    public $authRolesMedia = array('administrator');

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
		));
	}

}
