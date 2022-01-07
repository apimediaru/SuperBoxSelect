<?php
/**
 * @package superboxselect
 * @subpackage plugin
 */

namespace TreehillStudio\SuperBoxSelect\Plugins\Events;

use TreehillStudio\SuperBoxSelect\Plugins\Plugin;

class OnTVInputPropertiesList extends Plugin
{
    public function process()
    {
        $this->modx->event->output($this->superboxselect->getOption('corePath') . 'elements/tv/input/options/');
    }
}
