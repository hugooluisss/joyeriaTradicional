<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:51:20
         compiled from "templates/plantillas/modulos/front-end/userAdmin/currentOrder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13527563945908973507d0b8-43332696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '549ebf34062d6a0522cd61a626ac9e56be3fd4cc' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/userAdmin/currentOrder.tpl',
      1 => 1490910036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13527563945908973507d0b8-43332696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59089735100f02_63930493',
  'variables' => 
  array (
    'clienteObj' => 0,
    'idPedido' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59089735100f02_63930493')) {function content_59089735100f02_63930493($_smarty_tpl) {?><div class="page-header">
	<h1><?php echo $_smarty_tpl->tpl_vars['clienteObj']->value->getRazonSocial();?>
 - <?php echo $_smarty_tpl->tpl_vars['clienteObj']->value->getNombre();?>
</h1>
	<h3>Current Order</h3>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-4 col-sm-offset-8 text-center">
		<span class="text-center"><small><b>Review your order here if you <br />are on a mobile device.</b></small></span><br />
		<button class="btn btn-yellow text-right viewOrder">Mobile version</button><br />
		<span class="text-center"><small><b>You can also view, download and print this pdf file on your computer</b></small></span>
	</div>
</div>
<br /><br />
<div class="table-responsive">
</div>

<input id="idPedido" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['idPedido']->value;?>
" />
<div class="row">
	<div class="col-sm-6 col-sm-offset-6">
		<textarea id="txtComentarios" name="txtComentarios" class="form-control" placeholder="If you have any questions, special instructions, requests for custom jewelry, or any other comments, add them here. We will get back to you as soon as possible to the email provided." rows="5"></textarea>
	</div>
</div>
<br />
<div class="row">
	<div class="col-sm-3 col-sm-offset-6 text-center">
		<a href="repositorio/Shippinginfo.pdf" target="_blank">Learn about our shipping options and costs here.</a>
	</div>
	<div class="col-sm-3">
		<p><small><b>After you are finished reviewing the items in your Shopping Cart, choose a shipping method and place the order.</b></small></p>
		<!--<a href="placeOrder" class="btn btn-blue" onclick="javascript: return false;">Place Order</a>-->
	</div>
</div>
<br />
<div class="row">
	<div class="col-sm-4">
		<small>
		<p>This is an estimate. The final invoice will be sent to your registered email address after the order is processed. Custom pieces and special requests are not included in this estimate.</p>
		</small>
	</div>
	<div class="col-sm-5">
		<small>
		<p>Wholesale orders have a $100.00 minimum.</p>
		<p>The standard bulk discounts are as follows:</p>
		5%   discount for sales of $500.00 and above.<br />
10% discount for sales of $1,000.00 and above.<br />
15% discount for sales of $2,000.00 and above.<br />
		</small>
	</div>
	<div class="col-sm-3 text-center">
		<a href="placeOrder" onclick="javascript: return false;" class="btn btn-primary text-right btn-block">Choose a shipping method<br/> and place the order</a>
		<br />
		<p>
			<b>Any questions?</b><br />
			sales@getgorilla.com<br />
			or call us at 831-469-3665
		</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<a href="welcome">Back to catalog</a>
	</div>
</div><?php }} ?>