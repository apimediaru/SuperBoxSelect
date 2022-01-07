<?php
/**
 * Resources options processor
 *
 * @package superboxselect
 * @subpackage processors
 */

use TreehillStudio\SuperBoxSelect\Processors\OptionsProcessor;

class SuperboxselectResourcesOptionsProcessor extends OptionsProcessor
{
    public $inputOptionType = 'resources';

    /**
     * {@inheritDoc}
     * @return bool
     */
    public function initialize()
    {
        $this->modx->lexicon('superboxselect.resources');
        return parent::initialize();
    }
}

return 'SuperboxselectResourcesOptionsProcessor';
