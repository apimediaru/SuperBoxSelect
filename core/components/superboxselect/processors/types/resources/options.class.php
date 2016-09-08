<?php

/**
 * Options processor for SuperBoxSelect TV.
 *
 * @package superboxselect
 * @subpackage processor
 */
include_once(dirname(dirname(__FILE__)) . '/options.class.php');

class SuperboxselectResourcesOptionsProcessor extends SuperboxselectOptionsProcessor
{
    /**
     * @var string
     */
    public $inputOptionType = 'resources';
}

return 'SuperboxselectResourcesOptionsProcessor';
