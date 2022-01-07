<?php
/**
 * Selecttypes list processor for SuperBoxSelect TV.
 *
 * @package superboxselect
 * @subpackage processors
 */

use TreehillStudio\SuperBoxSelect\Processors\Processor;

class SuperboxselectSelecttypesGetListProcessor extends Processor
{
    public $languageTopics = ['superboxselect:default'];

    public function process()
    {
        $internalTypes = $this->superboxselect->getTypes();
        $types = [];
        foreach ($internalTypes as $internalType) {
            $types[] = [
                'id' => $internalType,
                'name' => $this->modx->lexicon('superboxselect.' . $internalType)
            ];
        }

        // Add external types to the list
        $customTypes = $this->modx->invokeEvent('OnSuperboxselectTypeOptions', [
            'option' => 'list'
        ]);
        foreach ($customTypes as $customType) {
            $customType = unserialize($customType);
            if ($customType) {
                $types = array_merge($types, $customType);
            }
        }

        $id = preg_replace('/[^a-z0-9_]+/i', '', $this->getProperty('id', ''));
        if ($id) {
            foreach ($types as $type) {
                if ($type['id'] == $id) {
                    return $this->outputArray([$type]);
                }
            }
            return $this->outputArray([
                ['id' => $id, 'name' => $id]
            ]);
        } else {
            usort($types, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });

            return $this->outputArray($types);
        }
    }
}

return 'SuperboxselectSelecttypesGetListProcessor';
