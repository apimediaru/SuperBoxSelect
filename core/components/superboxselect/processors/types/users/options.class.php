<?php

/**
 * Options processor for SuperBoxSelect TV.
 *
 * @package superboxselect
 * @subpackage processors
 */
if (!class_exists('SuperboxselectOptionsProcessor')) {
    include(dirname(dirname(__FILE__)) . '/options.class.php');
}

class SuperboxselectUsersOptionsProcessor extends SuperboxselectOptionsProcessor
{
    /**
     * @var string
     */
    public $inputOptionType = 'users';
}

return 'SuperboxselectUsersOptionsProcessor';
