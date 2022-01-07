<?php
/**
 * Users options processor
 *
 * @package superboxselect
 * @subpackage processors
 */

use TreehillStudio\SuperBoxSelect\Processors\OptionsProcessor;

class SuperboxselectUsersOptionsProcessor extends OptionsProcessor
{
    public $inputOptionType = 'users';

    /**
     * {@inheritDoc}
     * @return bool
     */
    public function initialize()
    {
        $this->modx->lexicon('superboxselect.users');
        return parent::initialize();
    }
}

return 'SuperboxselectUsersOptionsProcessor';
