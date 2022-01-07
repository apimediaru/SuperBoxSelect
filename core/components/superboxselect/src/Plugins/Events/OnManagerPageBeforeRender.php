<?php
/**
 * @package superboxselect
 * @subpackage plugin
 */

namespace TreehillStudio\SuperBoxSelect\Plugins\Events;

use modTemplateVar;
use TreehillStudio\SuperBoxSelect\Plugins\Plugin;

class OnManagerPageBeforeRender extends Plugin
{
    public function process()
    {
        $this->modx->controller->addLexiconTopic('superboxselect:default');
        $this->superboxselect->includeScriptAssets();
    }
}
