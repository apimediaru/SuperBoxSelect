<?php
/**
 * SuperBoxSelect connector
 *
 * @package superboxselect
 * @subpackage connector
 *
 * @var modX $modx
 */
require_once dirname(__FILE__, 4) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('superboxselect.core_path', null, $modx->getOption('core_path') . 'components/superboxselect/');
/** @var SuperBoxSelect $superboxselect */
$superboxselect = $modx->getService('superboxselect', 'SuperBoxSelect', $corePath . 'model/superboxselect/', [
    'core_path' => $corePath
]);

// Handle request
$modx->request->handleRequest([
    'processors_path' => $superboxselect->getOption('processorsPath'),
    'location' => ''
]);
