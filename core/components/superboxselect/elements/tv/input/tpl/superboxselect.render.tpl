<div id="superboxselect-tv-{$tv->id}"></div>
<script type="text/javascript">
    // <![CDATA[ {literal}
    Ext.onReady(function () { {/literal}
        var tv{$tv->id}store = {literal}new Ext.data.JsonStore({
            id: 'id',
            root: 'results',
            fields: ['id', 'title'],{/literal}
            url: '{$connector}',{literal}
            baseParams: {{/literal}
                action: 'types/{$params.selectType|default}/getlist',
                allowedUsergroups: '{$params.allowedUsergroups|default}',
                contextKey: '{$params.contextKey|default}',
                deniedUsergroups: '{$params.deniedUsergroups|default}',
                depth: '{$params.depth|default}',
                limitRelatedContext: {if ($params.limitRelatedContext|default == 1) || ($params.limitRelatedContext|default == 'true') }true{else}false{/if},
                package: '{$params.selectPackage|default}',
                parents: '{$params.parents|default}',
                resourceId: '{$params.resourceId|default}',
                valueField: '{$params.valueField|default}' || 'id',
                where: '{$params.where|default}'{literal}
            }
        });{/literal}
        {if $params.maxElements|default != 1} {literal}
        new SuperBoxSelect.combo.SuperBoxSelectTV({
            options: { {/literal}
                allowBlank: {if $params.allowBlank|default == 1 || $params.allowBlank|default == 'true'}true{else}false{/if},
                fieldLabel: _('superboxselect.{$params.selectType|default}'),
                fieldTpl: {if $params.fieldTpl|default}'{$params.fieldTpl|default}'{else}{literal}'{title} ({id})'{/literal}{/if},
                maxElements: {($params.maxElements|default) ? $params.maxElements|default * 1 : 0},
                stackItems: {if ($params.stackItems|default == 1) || ($params.stackItems|default == 'true') }true{else}false{/if},
                {if $params.pageSize|default}pageSize: {$params.pageSize|default * 1},
                {/if}store: tv{$tv->id}store,
                tvid: '{$tv->id}',
                value: '{$value}'{literal}
            }
        }); {/literal}
        {else} {literal}
        new SuperBoxSelect.combo.SuperBoxSelectTVSingle({
            options: { {/literal}
                allowBlank: {if $params.allowBlank|default == 1 || $params.allowBlank|default == 'true'}true{else}false{/if},
                fieldTpl: {if $params.fieldTpl|default}'{$params.fieldTpl|default}'{else}{literal}'{title} ({id})'{/literal}{/if},
                fieldLabel: _('superboxselect.{$params.selectType|default}'),
                maxElements: {($params.maxElements|default) ? $params.maxElements|default * 1 : 0},
                {if $params.pageSize|default}pageSize: {$params.pageSize|default * 1},
                {/if}store: tv{$tv->id}store,
                tvid: '{$tv->id}',
                value: '{$value}'{literal}
            }
        }); {/literal}
        {/if} {literal}
    });{/literal}
    // ]]>
</script>
