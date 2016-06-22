/**
 * SuperBoxSelect Init Script
 *
 * @package superboxselect
 * @subpackage init script
 */

var superBoxSelect = function (config) {
    config = config || {};
    superBoxSelect.superclass.constructor.call(this, config);
};

Ext.extend(superBoxSelect, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, jquery: {}, form: {}
});
Ext.reg('superboxselecttv', superBoxSelect);

SuperBoxSelect = new superBoxSelect();
