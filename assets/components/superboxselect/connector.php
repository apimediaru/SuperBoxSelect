<?php
/**
 * SuperBoxSelect Connector
 *
 * @package superboxselect
 * @subpackage connector
 *
 * @var modX $modx
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('superboxselect.core_path', null, $modx->getOption('core_path') . 'components/superboxselect/');
/** @var SuperBoxSelect $superboxselect */
$superboxselect = $modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', array(
    'core_path' => $corePath
));

$processorsPath = $superboxselect->getProcessorsPath($_REQUEST);

// Handle request
$modx->request->handleRequest(array(
    'processors_path' => $processorsPath,
    'location' => ''
));