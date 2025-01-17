/**
 * SuperBoxSelect Input Options Resources
 *
 * @package superboxselect
 * @subpackage inputoptions resources
 */

SuperBoxSelect.panel.InputOptionsResources = function (config) {
    config = config || {};

    this.ident = 'input-options-resources-' + Ext.id();
    this.options = config.options;
    this.params = config.params;

    Ext.applyIf(config, {
        layout: 'fit',
        id: 'type_resources',
        cls: 'alltypes',
        style: {
            height: '0',
            overflow: 'hidden'
        },
        items: [{
            xtype: 'panel',
            layout: 'form',
            labelAlign: 'top',
            items: [{
                layout: 'column',
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: _('resourcelist_parents'),
                        description: MODx.expandHelp ? '' : _('resourcelist_parents_desc'),
                        name: 'inopt_parents',
                        id: this.ident + 'inopt_parents',
                        value: this.params.parents || '',
                        anchor: '100%',
                        listeners: {
                            change: {
                                fn: this.markDirty,
                                scope: this
                            }
                        }
                    }, {
                        xtype: MODx.expandHelp ? 'label' : 'hidden',
                        forId: 'inopt_parents',
                        html: _('resourcelist_parents_desc'),
                        cls: 'desc-under'
                    }]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: _('resourcelist_depth'),
                        description: MODx.expandHelp ? '' : _('resourcelist_depth_desc'),
                        name: 'inopt_depth',
                        id: this.ident + 'inopt_depth',
                        value: this.params.depth || 10,
                        anchor: '100%',
                        listeners: {
                            change: {
                                fn: this.markDirty,
                                scope: this
                            }
                        }
                    }, {
                        xtype: MODx.expandHelp ? 'label' : 'hidden',
                        forId: 'inopt_depth',
                        html: _('resourcelist_depth_desc'),
                        cls: 'desc-under'
                    }]
                }]
            }, {
                layout: 'column',
                items: [{
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    items: [{
                        xtype: 'combo-boolean',
                        fieldLabel: _('superboxselect.showUnpublished'),
                        description: MODx.expandHelp ? '' : _('superboxselect.showUnpublished_desc'),
                        name: 'inopt_showUnpublished',
                        hiddenName: 'inopt_showUnpublished',
                        id: 'inopt_showUnpublished',
                        value: this.params.showUnpublished === 1 || this.params.showUnpublished === 'true' ? 1 : 0,
                        anchor: '100%',
                        listeners: {
                            change: {
                                fn: this.markDirty,
                                scope: this
                            }
                        }
                    }, {
                        xtype: MODx.expandHelp ? 'label' : 'hidden',
                        forId: 'inopt_showUnpublished',
                        html: _('superboxselect.showUnpublished_desc'),
                        cls: 'desc-under'
                    }]
                }]
            }, {
                layout: 'column',
                items: [{
                    columnWidth: (SuperBoxSelect.config.advanced) ? .5 : 1,
                    layout: 'form',
                    labelAlign: 'top',
                    items: [{
                        xtype: 'combo-boolean',
                        fieldLabel: _('resourcelist_limitrelatedcontext'),
                        description: MODx.expandHelp ? '' : _('resourcelist_limitrelatedcontext_desc'),
                        name: 'inopt_limitRelatedContext',
                        hiddenName: 'inopt_limitRelatedContext',
                        id: this.ident + 'inopt_limitRelatedContext',
                        value: this.params.limitRelatedContext === 1 || this.params.limitRelatedContext === 'true' ? 1 : 0,
                        anchor: '100%',
                        listeners: {
                            change: {
                                fn: this.markDirty,
                                scope: this
                            }
                        }
                    }, {
                        xtype: MODx.expandHelp ? 'label' : 'hidden',
                        forId: 'inopt_limitRelatedContext',
                        html: _('resourcelist_limitrelatedcontext_desc'),
                        cls: 'desc-under'
                    }]
                }, {
                    columnWidth: .5,
                    layout: 'form',
                    labelAlign: 'top',
                    hidden: !SuperBoxSelect.config.advanced,
                    items: [{
                        xtype: 'textfield',
                        fieldLabel: _('superboxselect.resourceTitleTpl'),
                        description: MODx.expandHelp ? '' : _('superboxselect.resourceTitleTpl_desc'),
                        name: 'inopt_resourceTitleTpl',
                        id: 'inopt_resourceTitleTpl',
                        value: this.params.resourceTitleTpl || '',
                        anchor: '100%',
                        listeners: {
                            change: {
                                fn: this.markDirty,
                                scope: this
                            }
                        }
                    }, {
                        xtype: MODx.expandHelp ? 'label' : 'hidden',
                        forId: 'inopt_resourceTitleTpl',
                        html: _('superboxselect.resourceTitleTpl_desc'),
                        cls: 'desc-under'
                    }]
                }]
            }, {
                xtype: 'textarea',
                fieldLabel: _('resourcelist_where'),
                description: MODx.expandHelp ? '' : _('resourcelist_where_desc', {
                    'example_1': '[{"template:=":"4"}]',
                    'example_2': '[{"pagetitle:!=":"Home"}]',
                    'example_3': '[{"class_key:IN":["MODX\\\Revolution\\\modWebLink","MODX\\\Revolution\\\modSymLink"]}]',
                    'example_4': '[{"published":1},{"isfolder":0}]'
                }),
                name: 'inopt_where',
                id: this.ident + 'inopt_where',
                value: this.params.where || '',
                anchor: '100%',
                listeners: {
                    change: {
                        fn: this.markDirty,
                        scope: this
                    }
                }
            }, {
                xtype: MODx.expandHelp ? 'label' : 'hidden',
                forId: 'inopt_where',
                html: _('resourcelist_where_desc', {
                    'example_1': '[{"template:=":"4"}]',
                    'example_2': '[{"pagetitle:!=":"Home"}]',
                    'example_3': '[{"class_key:IN":["MODX\\\Revolution\\\modWebLink","MODX\\\Revolution\\\modSymLink"]}]',
                    'example_4': '[{"published":1},{"isfolder":0}]'
                }),
                cls: 'desc-under'
            }]
        }]
    });
    SuperBoxSelect.panel.InputOptionsResources.superclass.constructor.call(this, config);
};
Ext.extend(SuperBoxSelect.panel.InputOptionsResources, MODx.Panel, {
    markDirty: function () {
        Ext.getCmp('modx-panel-tv').markDirty();
    }
});
Ext.reg('superboxselect-panel-inputoptions-resources', SuperBoxSelect.panel.InputOptionsResources);
