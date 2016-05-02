<?php

namespace Ffcms\Widgets\Ckeditor;

use Ffcms\Core\App;
use Ffcms\Core\Arch\Widget as AbstractWidget;
use Ffcms\Core\Helper\Type\Arr;

class Ckeditor extends AbstractWidget
{
    const VERSION = '4.5.1';

	public $targetClass;
    public $language;

    public $config;

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

        if ($this->config === null || !Arr::in($this->config, ['config-small', 'config-full', 'config-medium'])) {
            $this->config = 'config-default';
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
        $init = "$('.{$this->targetClass}').ckeditor({language: '{$this->language}', customConfig: '{$this->config}.js'});";

        App::$Alias->addPlainCode('js', $init);
		return null;
	}

}