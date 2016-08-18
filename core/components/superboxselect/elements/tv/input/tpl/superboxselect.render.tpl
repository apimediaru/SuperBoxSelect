<div id="superboxselect-tv-{$tv->id}"></div>
<script type="text/javascript">
    // <![CDATA[ {literal}
    Ext.onReady(function () { {/literal}
        var tv{$tv->id}store = {literal}new Ext.data.JsonStore({
            id: 'id',
            root: 'results',
            fields: [{
                name: 'id',
                type: 'int'
            }, {
                name: 'title',
                type: 'string'
            }],{/literal}
            url: '{$connector}',{literal}
            baseParams: {{/literal}
                action: 'types/{$params.selectType}/getlist',
                parents: '{$params.parents}',
                depth: '{$params.depth}',
                limitRelatedContext: {if ($params.limitRelatedContext == 1) || ($params.limitRelatedContext == 'true') }true{else}false{/if},
                where: '{$params.where}',
                {if ({!$params.pageSize})}limit: 0,
                {/if}resource_id: '{$params.resourceId}',
                context_key: '{$params.contextKey}',
                allowedUsergroups: '{$params.allowedUsergroups}',
                deniedUsergroups: '{$params.deniedUsergroups}'{literal}
            }
        });
        new SuperBoxSelect.combo.SuperBoxSelectTV({
            options: { {/literal}
                tvid: '{$tv->id}',
                value: '{$value}',
                allowBlank: {if $params.allowBlank === 1 || $params.allowBlank === 'true'}true{else}false{/if},
                store: tv{$tv->id}store,
                pageSize: ({$params.pageSize * 1}) || 10,
                maxResources: ({$params.maxResources * 1}) || 0,
                fieldLabel: _('superboxselect.{$params.selectType}'),
                fieldTpl: {if $params.fieldTpl}'{$params.fieldTpl}'{else}{literal}'{title} ({id})'{/literal}{/if}{literal}
            }
        });
    });{/literal}
    // ]]>
</script>