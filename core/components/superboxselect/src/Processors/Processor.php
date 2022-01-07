<?php
/**
 * Abstract processor
 *
 * @package superboxselect
 * @subpackage processors
 */

namespace TreehillStudio\SuperBoxSelect\Processors;

use TreehillStudio\SuperBoxSelect\SuperBoxSelect;
use modProcessor;
use modX;

/**
 * Class Processor
 */
abstract class Processor extends modProcessor
{
    public $languageTopics = ['superboxselect:default'];

    /** @var SuperBoxSelect */
    public $superboxselect;

    /**
     * {@inheritDoc}
     * @param modX $modx A reference to the modX instance
     * @param array $properties An array of properties
     */
    function __construct(modX &$modx, array $properties = [])
    {
        parent::__construct($modx, $properties);

        $corePath = $this->modx->getOption('superboxselect.core_path', null, $this->modx->getOption('core_path') . 'components/superboxselect/');
        $this->superboxselect = $this->modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/');
    }

    abstract public function process();

    /**
     * Get a boolean property.
     * @param string $k
     * @param mixed $default
     * @return bool
     */
    public function getBooleanProperty($k, $default = null)
    {
        return ($this->getProperty($k, $default) === 'true' || $this->getProperty($k, $default) === true || $this->getProperty($k, $default) === '1' || $this->getProperty($k, $default) === 1);
    }
}
