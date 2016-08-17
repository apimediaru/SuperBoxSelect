<?php

/**
 * Selecttypes list processor for SuperBoxSelect TV.
 *
 * @package superboxselect
 * @subpackage processor
 */
class SuperboxselectSelecttypesGetListProcessor extends modProcessor
{
    public $languageTopics = array('superboxselect:default');

    public function process()
    {
        /** @var SuperBoxSelect $superboxselect */
        $corePath = $this->modx->getOption('superboxselect.core_path', null, $this->modx->getOption('core_path') . 'components/superboxselect/');
        $superboxselect = $this->modx->getService('superboxselect', 'SuperBoxSelect', $corePath . '/model/superboxselect/', array(
            'core_path' => $corePath
        ));

        $id = preg_replace('/[^a-zA-Z0-9]+/', '', $this->getProperty('id'));
        $package = preg_replace('/[^a-zA-Z0-9_]+/', '', $this->getProperty('package'));

        if ($package) {
            $packageCorePath = $this->modx->getOption($package . '.core_path', null, $this->modx->getOption('core_path') . 'components/' . $package . '/');
            $packageProcessorsPath = $packageCorePath . 'processors/';
        } else {
            $packageProcessorsPath = $superboxselect->getOption('processorsPath');
            $package = 'superboxselect';
        }

        $results = array();
        if ($id) {
            $results[] = array(
                'id' => $id,
                'name' => $this->modx->lexicon($package . '.' . $id)
            );
        } else {
            $files = glob($packageProcessorsPath . 'types/*', GLOB_ONLYDIR);
            foreach ($files as $file) {
                $results[] = array(
                    'id' => basename($file),
                    'name' => $this->modx->lexicon($package . '.' . basename($file))
                );
            }
        }
        return $this->outputArray($results);
    }
}

return 'SuperboxselectSelecttypesGetListProcessor';
