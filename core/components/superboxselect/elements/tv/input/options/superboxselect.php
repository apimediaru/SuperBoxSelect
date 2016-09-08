<?php
/**
 * SuperBoxSelect Input Options Render
 *
 * @package superboxselect
 * @subpackage inputoptions_render
 */

/** @var \modX $modx */
$corePath = $modx->getOption('superboxselect.core_path', null, $modx->getOption('core_path') . 'components/superboxselect/');
/** @var SuperBoxSelect $superboxselect */
$superboxselect = $modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', array(
    'core_path' => $corePath
));

$params = $modx->controller->getPlaceholder('params');
$modx->smarty->assign('inputOptionTypes', $superboxselect->getInputOptionTypes($params['selectPackage']));

return $modx->smarty->fetch($corePath . 'elements/tv/input/tpl/superboxselect.options.tpl');