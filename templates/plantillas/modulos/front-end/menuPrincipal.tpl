{if $PAGE.sesion.perfil eq "cliente"}
	<ul class="list-group" id="menuPrincipal">
		<li class="list-group-item"><a href="profile">Profile</a></li>
		<li class="list-group-item"><a href="currentOrder">Current Order</a></li>
		<li class="list-group-item"><a href="orderHistory">Order History</a></li>
		<!--<li class="list-group-item"><a href="customPriceList">Custom Price List</a></li>-->
		<li class="list-group-item"><a href="priceList">Price List</a></li>
		<li class="list-group-item"><a href="logout">Logout</a></li>
	</ul>		
{else}
	<ul class="list-group" id="menuPrincipal">
		<li class="list-group-item">Are you a vendor?<br /><a href="signup">Sign up for a wholesale account!</a></li>
		<li class="list-group-item"><a href="inicio">Log in</a></li>
	</ul>
{/if}