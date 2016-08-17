<div id="tv-input-properties-form"></div>
<script type="text/javascript">
    // <![CDATA[
    {literal}
    var params = {
        {/literal}{foreach from=$params key=k item=v name='p'}
        '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last}, {/if}
        {/foreach}{literal}
    };
    MODx.load({
        xtype: 'superboxselect-panel-inputoptions',
        params: params,
        renderTo: 'tv-input-properties-form'
    });
    // ]]>
</script>
{/literal}
