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

    // upload directories
    public $imageOriginalDir = 'original';
    public $imageThumbsDir = 'thumb';
    public $baseMediaPath = '/../../../assets/media';
    public $baseMediaUrl = '/assets/media';

    // image sizes
    public $imageThumbWidth = 150;
    public $imageThumbHeight = 150;
    public $imageMaxWidth = 600;
    public $imageMaxHeight = 600;

    /**
     * Url to published CMS assets
     * @var string the url to the published assets
     */
    public $assetsUrl = false;

    /**
     * Initialize module
     *
     * @return void
     */
	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'cms.models.*',
			'cms.components.*',
            'cms.widgets.*',
		));

        // set paths
        $this->baseMediaPath = realpath(dirname(__FILE__).$this->baseMediaPath);

        // publish cms assets
        $this->publishAssets();
	}

    public function publishAssets()
    {
        // if not published
        if (!$this->assetsUrl) {
			$assetsPath = Yii::getPathOfAlias('cms.assets');
			$this->assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, $this->forceCopyAssets);
        }
    }
}
