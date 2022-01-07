<?php
/**
 * SuperBoxSelect Input Render
 *
 * @package superboxselect
 * @subpackage input_render
 */

class SuperboxselectInputRender extends modTemplateVarInputRender
{
    /**
     * Return the template path to load
     *
     * @return string
     */
    public function getTemplate()
    {
        $corePath = $this->modx->getOption('superboxselect.core_path', null, $this->modx->getOption('core_path') . 'components/superboxselect/');
        return $corePath . 'elements/tv/input/tpl/superboxselect.render.tpl';
    }

    /**
     * Get lexicon topics
     *
     * @return array
     */
    public function getLexiconTopics()
    {
        return ['superboxselect:default'];
    }

    /**
     * Process Input Render
     *
     * @param string $value
     * @param array $params
     * @return void
     */
    public function process($value, array $params = [])
    {
        $corePath = $this->modx->getOption('superboxselect.core_path', null, $this->modx->getOption('core_path') . 'components/superboxselect/');
        /** @var SuperBoxSelect $superboxselect */
        $superboxselect = $this->modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', [
            'core_path' => $corePath
        ]);

        $params = array_merge($params, [
            'resourceId' => ($this->modx->resource) ? $this->modx->resource->get('id') : 0,
            'contextKey' => ($this->modx->resource) ? $this->modx->resource->get('context_key') : 'web',
            'selectType' => (isset($params['selectType']) && $params['selectType'] != '') ? $params['selectType'] : 'resources'
        ]);

        // @todo Add custom package selectType
        $internalTypes = $superboxselect->getTypes();
        $renderOptions = [];
        foreach ($internalTypes as $internalType) {
            $response = $this->modx->runProcessor('types/' . $internalType . '/options', [
                'option' => 'fieldTpl',
            ], [
                'processors_path' => $superboxselect->getOption('processorsPath')
            ]);
            if (empty($response->errors)) {
                $renderOptions[$internalType] = [
                    'fieldTpl' => (!empty($params['fieldTpl'])) ? $params['fieldTpl'] : $response->response,
                    'connector' => $superboxselect->getOption('connectorUrl')
                ];
            }
        }

        // Add external types to the list
        $customTypes = $this->modx->invokeEvent('OnSuperboxselectTypeOptions', [
            'option' => 'renderOptions',
            'params' => $params
        ]);
        foreach ($customTypes as $customType) {
            $customType = unserialize($customType);
            if ($customType) {
                $renderOptions = array_merge($renderOptions, $customType);
            }
        }

        $baseParams = [
            'action' => 'types/' . $params['selectType'] . '/getlist',
            'tvid' => $this->tv->get('id'),
            'resourceId' => $params['resourceId'],
            'contextKey' => $params['contextKey'],
        ];

        if (isset($renderOptions[$params['selectType']])) {
            $params['fieldTpl'] = $renderOptions[$params['selectType']]['fieldTpl'];
            $this->setPlaceholder('connector', $renderOptions[$params['selectType']]['connector']);
        }

        $params = [
            'allowBlank' => ($params['allowBlank'] == 1 || $params['allowBlank'] == 'true'),
            'fieldLabel' => $this->modx->lexicon('superboxselect.' . $params['selectType']),
            'fieldTpl' => $params['fieldTpl'],
            'maxElements' => ($params['maxElements']) ? $params['maxElements'] * 1 : 1,
            'pageSize' => ($params['pageSize']) ? $params['pageSize'] * 1 : 0,
            'stackItems' => $params['stackItems'] == 1 || $params['stackItems'] == 'true'
        ];
        if ($params['maxElements'] <= 1) {
            unset($params['stackItems']);
        }
        if (!$params['pageSize']) {
            unset($params['pageSize']);
        }

        $this->setPlaceholder('baseParams', json_encode($baseParams, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $this->setPlaceholder('params', json_encode($params, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $this->setPlaceholder('multiple', $params['maxElements'] > 1);
        $this->setPlaceholder('value', $value);
    }
}

return 'SuperboxselectInputRender';
