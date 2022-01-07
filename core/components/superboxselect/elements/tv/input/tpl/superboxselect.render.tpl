<div id="superboxselect-tv-{$tv->id}"></div>

<script type="text/javascript">
    // <![CDATA[{literal}
    Ext.onReady(function () { {/literal}
        var tv{$tv->id}store = {literal}new Ext.data.JsonStore({
            id: 'id',
            root: 'results',
            fields: ['id', 'title'],{/literal}
            url: '{$connector}',{literal}
            baseParams: {{/literal}{$baseParams|default|regex_replace:"/^\{(.*)\n\}$/sm":"$1"|indent:12}{literal}
            }
        });{/literal}
        {if $multiple|default} {literal}
        new SuperBoxSelect.combo.SuperBoxSelectTV({
            options: {{/literal}{$params|default|regex_replace:"/^\{(.*)\n\}$/sm":"$1"|indent:12},
                "store": tv{$tv->id}store,
                "tvid": "{$tv->id}",
                "value": "{$value}"{literal}
            }
        });{/literal}
        {else} {literal}
        new SuperBoxSelect.combo.SuperBoxSelectTVSingle({
            options: {{/literal}{$params|default|regex_replace:"/^\{(.*)\n\}$/sm":"$1"|indent:12},
                "store": tv{$tv->id}store,
                "tvid": "{$tv->id}",
                "value": "{$value}"{literal}
            }
        });{/literal}
        {/if} {literal}
    });{/literal}
    // ]]>
</script>
