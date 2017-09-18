<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:43:45
         compiled from "templates/plantillas/modulos/front-end/userAdmin/placeorder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56475675559089749c4c092-64639396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f82336a30dc2c5774a1730cbebf091596710c73' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/userAdmin/placeorder.tpl',
      1 => 1493736223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56475675559089749c4c092-64639396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59089749c9e119_57742283',
  'variables' => 
  array (
    'subtotal' => 0,
    'listaPaqueteria' => 0,
    'paqueteria' => 0,
    'comentarios' => 0,
    'idPedido' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59089749c9e119_57742283')) {function content_59089749c9e119_57742283($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['subtotal']->value>=100){?>
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
				<?php  $_smarty_tpl->tpl_vars['paqueteria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paqueteria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPaqueteria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paqueteria']->key => $_smarty_tpl->tpl_vars['paqueteria']->value){
$_smarty_tpl->tpl_vars['paqueteria']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['idPaqueteria'];?>
"><?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['nombre'];?>
 <?php if ($_smarty_tpl->tpl_vars['paqueteria']->value['costo']!=0){?>- $<?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['costo'];?>
<?php }?></option>
				<?php } ?>
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
			<p><b>Send us the order. You will receive the order as a pdf to your email address.</b></p>
			<div class="col-xs-12 col-md-10">
				<textarea id="txtComentarios" name="txtComentarios" class="form-control" placeholder="If you have any questions, special instructions, requests for custom jewelry, or any other comments, add them here. We will get back to you as soon as possible to the email provided." rows="5"><?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>
</textarea>
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
				<button class="btn btn-info" id="btnSubmit">Send</button>
			</p>
			<input type="hidden" id="pedido" name="pedido" value="<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
" />
		</div>
	</div>
</div>

<div id="result">
	<br /><br />
	<p>A pdf containing your order will be sent to your email address shortly. Our sales team will contact you when we are ready to process your payment. </p>
	<br /><br /><br />
	<p><a href="welcome">Go back to the homepage</a></p>
</div>

<!--<input type="hidden" id="comentarios" value="<?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>
" />-->
<?php }else{ ?>
<div class="page-header">
	<h1>Wholesale orders have a $100.00 minimum.</h1>
</div>
<br />
<br /><br />
<center><a href="home/18039-Plugs/" class="btn btn-primary">Continue shopping</a></center>
<br /><br />
<?php }?><?php }} ?>