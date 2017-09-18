{if $subtotal >= 100 or $band eq 1}
<div class="page-header">
	<h1>Thank you for ordering Gorilla Glass!</h1>
</div>

<div id="info">
	<div class="row">
		<div class="col-xs-2 text-right">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle-thin fa-stack-2x"></i>
				<i class="fa fa-stack-1x">1</i>
			</span>
		</div>
		<div class="col-xs-10">
			<b>Add an estimate of your shipping cost to your order</b> <br/>
			<a href="repositorio/Shippinginfo.pdf" target="_blank">Learn about our shipping options and costs here.</a> <br />
			<br />
			<select class="form-control" id="selPaqueteria" name="selPaqueteria">
				{foreach from=$listaPaqueteria item=paqueteria}
					<option value="{$paqueteria.idPaqueteria}">{$paqueteria.nombre} {if $paqueteria.costo neq 0}- ${$paqueteria.costo}{/if}</option>
				{/foreach}
			</select>
		</div>
	</div>
	<br />
	<br />
	<div class="row">
		<div class="col-xs-2 text-right">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle-thin fa-stack-2x"></i>
				<i class="fa fa-stack-1x">2</i>
			</span>
		</div>
		<div class="col-xs-10">
			<b>Do you wish to confirm your final invoice before we charge your card and ship your order?</b>
			<select class="form-control" id="selCargo" name="selCargo">
				<option value="1">Yes, please wait until I approve the final invoice before charging and shipping my order</option>
				<option value="2">No. Please charge the card you have on file and ship my order as soon as possible. The last four digits of the card I am authorizing you to charge are</option>
			</select>
			<br />
			<div class="row">
				<div class="col-sm-4 col-xs-6">
					<input class="form-control" id="txtCode" name="txtCode" value="" maxlength="4" placeholder="Last 4 digits of the card"/>
				</div>
			</div>
			<small>Please note that custom pieces and special requests are not included in your Order Sheet.</small>
		</div>
	</div>
	<br /><br />
	<div class="row">
		<div class="col-xs-2 text-right">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle-thin fa-stack-2x"></i>
				<i class="fa fa-stack-1x">3</i>
			</span>
		</div>
		<div class="col-xs-10">
			<p><b>Write us any questions and comments. You can also save your comment for later if you are not ready to send the order yet. Click on the button to the right of the text box to save your comment.</b></p>
			<div class="col-xs-12 col-md-10">
				<textarea id="txtComentarios" name="txtComentarios" class="form-control" placeholder="If you have any questions, special instructions, requests for custom jewelry, or any other comments, add them here. We will get back to you as soon as possible to the email provided." rows="5">{$comentarios}</textarea>
			</div>
			<div class="col-xs-12 col-md-2 text-right">
				<br />
				<button type="button" class="btn btn-info btn-xs" id="btnGuardarComentarios">Save comment <br />for later</button>
			</div>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-2 text-right">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle-thin fa-stack-2x"></i>
				<i class="fa fa-stack-1x">4</i>
			</span>
		</div>
		<div class="col-xs-10">
			<p>
				<b>Send us the order, You will recieve the order as a pdf to your email address.</b>
			</p>
			<p class="text-center">
				<button class="btn btn-info" id="btnSubmit">Send the order</button>
			</p>
			<input type="hidden" id="pedido" name="pedido" value="{$idPedido}" />
		</div>
	</div>
</div>

<div id="result">
	<br /><br />
	<p>A pdf containing your order will be sent to your email address shortly. Our sales team will contact you when we are ready to process your payment. </p>
	<br /><br /><br />
	<p><a href="welcome">Go back to the homepage</a></p>
</div>

<!--<input type="hidden" id="comentarios" value="{$comentarios}" />-->
{else}
<div class="page-header">
	<h1>Wholesale orders have a $100.00 minimum.</h1>
</div>
<br />
<br /><br />

<p>Your order has not reached the $100.00 minimum value for wholesale orders.  You can continue shopping until you meet the minimum required value or we can process the small order by charging an extra $15.00 fee.</p>
<center>
	<form method="post">
		<a href="home/18039-Plugs/" class="btn btn-primary">Continue shopping</a>
		<button class="btn btn-info" id="btnAddExtra" pedido="{$idPedido}">Add a $15.00 fee</button>
		<input type="hidden" id="pedido" name="pedido" value="{$idPedido}" />
		<input type="hidden" id="band" name="band" value="1" />
	</form>
</center>

<br /><br />
{/if}