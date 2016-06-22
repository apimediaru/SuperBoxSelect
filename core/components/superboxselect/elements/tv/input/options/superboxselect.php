<?php
/**
 * SuperBoxSelect Input Options Render
 *
 * @package superboxselect
 * @subpackage inputoptions_render
 */

/** @var \modX $modx */
$corePath = $modx->getOption('superboxselect.core_path', null, $modx->getOption('core_path') . 'components/superboxselect/');
$superboxselect = $modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', array(
    'core_path' => $corePath
));

$lang = $modx->lexicon->fetch('superboxselect.', true);
$modx->controller->setPlaceholder('superboxselect', $lang);

return $modx->smarty->fetch($corePath . 'elements/tv/input/tpl/superboxselect.options.tpl');