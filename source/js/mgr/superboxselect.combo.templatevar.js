/**
 * SuperBoxSelect Template Variable
 *
 * @package superboxselect
 * @subpackage superboxselecttv
 */

SuperBoxSelect.combo.SuperBoxSelectTV = function (config) {
    config = config || {};

    this.options = config.options;
    this.params = config.params;

    Ext.applyIf(config, {
        addNewDataOnBlur: false,
        allowBlank: this.options.allowBlank,
        anchor: '100%',
        classField: 'cls',
        ctCls: 'superboxselect-tv',
        displayField: 'title',
        displayFieldTpl: this.options.fieldTpl,
        fieldLabel: this.options.fieldLabel,
        minChars: 2,
        mode: 'remote',
        msgTarget: 'title',
        name: 'tv' + this.options.tvid + '[]',
        pageSize: this.options.pageSize,
        queryDelay: 0,
        store: this.options.store,
        styleField: 'style',
        tpl: '<tpl for="."><div class="x-combo-list-item">' + this.options.fieldTpl + '</div></tpl>',
        transform: 'superboxselect-tv-' + this.options.tvid,
        triggerAction: 'all',
        value: this.options.value,
        valueField: 'id',
        width: 400,
        listeners: {
            afterrender: {
                fn: this.afterrender,
                scope: this
            },
            beforeadditem: {
                fn: this.beforeadditem,
                scope: this
            },
            additem: {
                fn: this.additem,
                scope: this
            },
            removeitem: {
                fn: this.removeitem,
                scope: this
            }
        }
    });
    SuperBoxSelect.combo.SuperBoxSelectTV.superclass.constructor.call(this, config);
};
SuperBoxSelect.combo.SuperBoxSelectTV = Ext.extend(SuperBoxSelect.combo.SuperBoxSelectTV, Ext.ux.form.SuperBoxSelect, {
    afterrender: function () {
        if (this.options.maxResources) {
            var caption = Ext.get('tv' + this.options.tvid + '-caption');
            var newlabel = _('superboxselect.maxResources_label').replace(/{maxResources}/, this.options.maxResources);
            caption.dom.innerHTML = caption.dom.innerHTML +
                ' <span class="modx-tv-label-description">(' + newlabel +
                ')</span>';
        }
    },
    beforeadditem: function (bs) {
        if (this.options.maxResources) {
            if (bs.getCount() > this.options.maxResources - 1
            ) {
                MODx.msg.alert(_('error'), _('superboxselect.maxResources_msg'));
                return false;
            }
            return true;
        }
    },
    additem: function () {
        MODx.fireResourceFormChange();
    },
    removeitem: function () {
        MODx.fireResourceFormChange();
    }
});
Ext.reg('superboxselect-combo-superboxselectv', SuperBoxSelect.combo.SuperBoxSelectTV);