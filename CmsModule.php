<?php

class CmsModule extends CWebModule
{
    /**
     *
     * @var boolean true if assets are to be copied on each invocation
     */
    public $forceCopyAssets = false;
    
    /**
     * @var array role names authorized to admin, create, update and delete Authors
     */
    public $authRolesAuthors = array('administrator');

    /**
     * @var array role names authorized to upload, admin, create, update and delete Media
     */
    public $authRolesMedia = array('administrator');

    public $imageThumbsDir = 'thumbs';
    public $baseMediaPath = '/../../../assets/media';
    public $baseMediaUrl = 'assets/media';

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
            'cms.widgets.*',
		));

        // set paths
        $this->baseMediaPath = dirname(__FILE__).$this->baseMediaPath;
	}

}
