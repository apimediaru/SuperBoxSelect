<script type="text/javascript">
    // <![CDATA[
    SuperBoxSelect.panel.InputOptionsTypes = function (config) {literal}{
        config = config || {};
        Ext.applyIf(config, {{/literal}
            xtype: 'panel',
            items: [{$types}]{literal},
            listeners: {
                afterrender: function (cmp) {
                    this.body.on('click', function (el, target) {
                        if (target.classList.contains('example-input')) {
                            const label = target.closest('label');
                            if (label && label.htmlFor) {
                                Ext.getCmp(label.htmlFor).setValue(target.textContent)
                            }
                        }
                    }, this);
                }
            }
        });
        SuperBoxSelect.panel.InputOptionsTypes.superclass.constructor.call(this, config);
    };{/literal}
    Ext.extend(SuperBoxSelect.panel.InputOptionsTypes, MODx.Panel);
    Ext.reg('superboxselect-panel-inputoptions-types', SuperBoxSelect.panel.InputOptionsTypes);
    // ]]>
</script>
