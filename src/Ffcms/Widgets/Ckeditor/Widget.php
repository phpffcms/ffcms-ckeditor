<?php 

namespace Ffcms\Widgets\Ckeditor;

use Ffcms\Core\Arch\Widget as AbstractWidget;

class Widget extends AbstractWidget
{
	public $test;
	
	public function init()
	{
		if ($this->test === null) {
			$this->test = 'Hello, world!';
		}
	}
	
	public function display()
	{
		return $this->test;
	}
	
}