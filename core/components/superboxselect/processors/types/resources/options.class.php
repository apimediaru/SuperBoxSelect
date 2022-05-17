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

    public function useRenderOptions($defaults)
    {
        $renderOptions = [
            'params' => [
                'fieldTpl' => ($defaults['fieldTpl']) ?: $this->fieldTpl,
                'valueField' => ($defaults['valueField']) ?: 'id',
            ],
            'baseParams' => []
        ];
        if ($this->getProperty('useRequest')) {
            $baseParams = [
                'useRequest' => true,
                'where' => ($defaults['where']) ?: null,
                'limitRelatedContext' => ($defaults['limitRelatedContext']) ?: null,
                'parents' => ($defaults['parents']) ?: null,
                'depth' => ($defaults['depth']) ?: null,
                'sortBy' => ($defaults['sortBy']) ?: null,
                'sortDir' => ($defaults['sortDir']) ?: null,
                'resourceTitleTpl' => ($defaults['resourceTitleTpl']) ?: null
            ];
            foreach ($baseParams as $key => $value) {
                if (is_null($value)) {
                    unset($baseParams[$key]);
                }
            }
            $renderOptions['baseParams'] = $baseParams;

            $params = [];
            foreach ($params as $key => $value) {
                if (is_null($value)) {
                    unset($params[$key]);
                }
            }
            $renderOptions['params'] = array_merge($renderOptions['params'], $params);
        }
        return $renderOptions;
    }
}

return 'SuperboxselectResourcesOptionsProcessor';
