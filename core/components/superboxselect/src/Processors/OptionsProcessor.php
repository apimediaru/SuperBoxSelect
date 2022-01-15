<?php
/**
 * Options processor
 *
 * @package superboxselect
 * @subpackage processors
 */

namespace TreehillStudio\SuperBoxSelect\Processors;

class OptionsProcessor extends Processor
{
    public $fieldTpl = '{title} ({id})';
    public $inputOptionType = '';
    public $renderOptions = [];

    /**
     * Run the processor and return the result.
     *
     * @return mixed
     */
    public function process()
    {
        $option = $this->getProperty('option');

        $result = '';
        if (method_exists($this, 'get' . ucfirst($option))) {
            $method = 'get' . ucfirst($option);
            $result = $this->$method();
        }
        return $result;
    }

    /**
     * Get the render options.
     *
     * @return array
     */
    public function getRenderOptions()
    {
        $params = $this->getProperty('params');
        $renderOptions = [
            'connector' => $this->superboxselect->getOption('connectorUrl')
        ];
        $renderOptions = array_merge_recursive($renderOptions, $this->useRenderOptions($params));
        return $renderOptions;
    }

    /**
     * @param $params
     * @return array
     */
    public function useRenderOptions($params)
    {
        return [];
    }

    /**
     * Get the input option xtype and register the panel javascript
     *
     * @return array|null
     */
    public function getInputOptionType()
    {
        if ($this->inputOptionType) {
            $inputOptionType = [
                'type' => "{xtype: 'superboxselect-panel-inputoptions-$this->inputOptionType', params: config.params}",
                'success' => true
            ];
            return $inputOptionType;
        } else {
            return null;
        }
    }
}
