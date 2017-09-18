<select class="selectpicker" style="widht: 80%;" {if $index eq $etiquetas}multiple{/if} nivels="{$index}" total="{$etiquetas|@count}">
	{if $index neq $etiquetas}
	<option value="" datos="">Select</option>
	{/if}
{foreach from=$lista item="row"}
	<option value='{$row.idProducto}' datos='{$row.json}'>{$row.nombre}</option>
{/foreach}
</select>
