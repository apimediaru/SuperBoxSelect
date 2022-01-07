<?php
/**
 * SuperBoxSelect Input Options Render
 *
 * @package superboxselect
 * @subpackage inputoptions_render
 */

/** @var modX $modx */
$corePath = $modx->getOption('superboxselect.core_path', null, $modx->getOption('core_path') . 'components/superboxselect/');
/** @var SuperBoxSelect $superboxselect */
$superboxselect = $modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', [
    'core_path' => $corePath
]);

$modx->smarty->assign('inputOptionTypes', $superboxselect->getInputOptionTypes());

return $modx->smarty->fetch($corePath . 'elements/tv/input/tpl/superboxselect.options.tpl');