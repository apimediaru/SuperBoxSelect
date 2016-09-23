<?php

/**
 * Get list processor for SuperBoxSelect TV.
 *
 * @package superboxselect
 * @subpackage processor
 */
class SuperboxselectResourcesGetListProcessor extends modObjectGetListProcessor
{
    /**
     * @var string $classKey
     */
    public $classKey = 'modResource';
    /**
     * @var array $languageTopics
     */
    public $languageTopics = array('superboxselect:default');
    /**
     * @var string $defaultSortField
     */
    public $defaultSortField = 'pagetitle';
    /**
     * @var string $defaultSortDirection
     */
    public $defaultSortDirection = 'ASC';
    /**
     * @var string $objectType
     */
    public $objectType = 'superboxselect.resources';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        // Get Properties
        $parents = explode(',', $this->getProperty('parents', '0'));
        $resource_id = intval($this->getProperty('resource_id'));
        $context_key = $this->getProperty('context_key', false);
        $depth = $this->getProperty('depth', 10);
        $limitRelatedContext = $this->getProperty('limitRelatedContext', false);
        $where = $this->getProperty('where', array());

        if($where) {
            $where = $this->modx->fromJSON($where);
            $c->where($where);
        }

        // Get the context of the current edited resource
        if (!$context_key) {
            $resource = $this->modx->getObject('modResource', $resource_id);
            $context_key = $resource->get('context_key');
        }

        // Restrict to related context
        if (!empty($limitRelatedContext) && ($limitRelatedContext == 1 || $limitRelatedContext == 'true')) {
            $c->where(array('context_key' => $context_key));
        }

        // Get parents
        if (!empty($parents)) {
            $children = array();
            foreach ($parents as &$parent) {
                // if $parent is not numeric, assume it is set by a context/system setting
                if (!is_numeric($parent)) {
                    // get the key of this context that is referenced by
                    $object = $this->modx->getObject('modContextSetting', array(
                        'context_key' => $context_key,
                        'key' => $parent
                    ));
                    if ($object) {
                        // if the context and the context key are valid get the context setting
                        $parent = $object->get('value');
                        $parent = ($parent) ? intval($parent) : 0;
                    } else {
                        // else get the system setting
                        $parent = intval($this->modx->getOption($parent, NULL, 0));
                    }
                }
                $pchildren = $this->modx->getChildIds($parent, $depth, array('context' => $context_key));
                if (!empty($pchildren)) {
                    $children = array_merge($children, $pchildren);
                }
            }
            if (!empty($children)) {
                $parents = array_merge($parents, $children);
            }

            $c->where(array(
                'parent:IN' => $parents,
            ));
        }

        // Get query
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $valuesqry = $this->getProperty('valuesqry');
            if (!empty($valuesqry)) {
                $c->where(array(
                    'id:in' => explode('|', $query)
                ));
            } else {
                $c->where(array(
                    'pagetitle:LIKE' => '%' . $query . '%'
                ));
            }
        }

        $c->select(array('id', 'pagetitle'));

        $c->where(array(
            'deleted' => false,
            'published' => true
        ));
        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c->sortby('pagetitle', 'ASC');
        return $c;
    }

    /**
     * @param xPDOObject $object
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        return array(
            'id' => $object->get('id'),
            'title' => $object->get('pagetitle')
        );
    }
}

return 'SuperboxselectResourcesGetListProcessor';
