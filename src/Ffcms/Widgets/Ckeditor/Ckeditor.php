<?php

namespace Ffcms\Widgets\Ckeditor;

use Ffcms\Core\App;
use Ffcms\Core\Arch\Widget as AbstractWidget;
use Ffcms\Core\Helper\Type\Any;
use Ffcms\Core\Helper\Type\Arr;
use Ffcms\Core\Helper\Type\Obj;

class Ckeditor extends AbstractWidget
{
    const VERSION = '4.5.1';

	public $targetClass;
    public $language;

    public $config;
    public $jsConfig;

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
        $jsInitializeCode = "$('.{$this->targetClass}').ckeditor({";
        $jsInitializeCode .= "language: '{$this->language}', customConfig: '{$this->config}.js', ";
        if ($this->jsConfig !== null && Any::isArray($this->jsConfig)) {
            foreach ($this->jsConfig as $obj => $value) {
                $jsInitializeCode .= $obj . ": '" . $value . "', ";
            }
        }
	    $jsInitializeCode .= "});";

        App::$Alias->addPlainCode('js', $jsInitializeCode);
		return null;
	}

}