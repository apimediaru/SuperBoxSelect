<script type="text/javascript">
    // <![CDATA[
    SuperBoxSelect.panel.InputOptionsTypes = function (config) {literal}{
        config = config || {};

        Ext.applyIf(config, {{/literal}
            xtype: 'panel',
            items: [{$types}]{literal}
        });
        SuperBoxSelect.panel.InputOptionsTypes.superclass.constructor.call(this, config);
    };{/literal}
    Ext.extend(SuperBoxSelect.panel.InputOptionsTypes, MODx.Panel);
    Ext.reg('superboxselect-panel-inputoptions-types', SuperBoxSelect.panel.InputOptionsTypes);
    // ]]>
</script>
