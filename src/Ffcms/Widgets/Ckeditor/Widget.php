<?php 

namespace Ffcms\Widgets\Ckeditor;

use Ffcms\Core\App;
use Ffcms\Core\Arch\Widget as AbstractWidget;

class Widget extends AbstractWidget
{
    const VERSION = '4.5.1';

	public $targetClass;
    public $language;

    private $baseUrl;

    /**
     * Pass init params
     */
	public function init()
	{
		if ($this->language === null) {
			$this->language = App::$Request->getLanguage();
		}

        if ($this->targetClass === null) {
            $this->targetClass = 'wysiwyg';
        }

        $this->baseUrl = App::$Alias->scriptUrl . '/vendor/phpffcms/ffcms-ckeditor/assets';
	}

    /**
     * Add ckeditor library's to lazyload
     * @return null
     */
	public function display()
	{
        App::$Alias->setCustomLibrary('js', $this->baseUrl . '/ckeditor.js');
        App::$Alias->setCustomLibrary('js', $this->baseUrl . '/adapters/jquery.js');
        $init = "$('.{$this->targetClass}').ckeditor({language: '{$this->language}'});";

        App::$Alias->addPlainCode('js', $init);
		return null;
	}
	
}