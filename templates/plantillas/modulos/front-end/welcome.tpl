<div class="container">
<div class="row">
      	<!-- BEGIN COLUMN -->
        <div class="col-sm-12">
            <div id="product_image">
                <!-- BEGIN SLIDER -->
                <div class="stage">
                    <div id="SLDR-ONE" class="sldr">
                        <ul class="wrp animate">
                            <li class="elmnt-one"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_1.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-two"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_2.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-three"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_3.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-four"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_4.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-five"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_5.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-six"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_6.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-seven"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_7.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-eight"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_8.jpg" width="623" height="400"></div></div></li>
                            <!--<li class="elmnt-nine"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_9.jpg" width="623" height="400"></div></div></li>-->
                            <li class="elmnt-ten"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_10.jpg" width="623" height="400"></div></div></li>
                            <li class="elmnt-ten"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_11.jpg" width="623" height="400"></div></div></li>
                            <!--<li class="elmnt-ten"><div><div class="wrap"><img src="repositorio/img/anterior/homeslide/slide_12.jpg" width="623" height="400"></div></div></li>-->
                        </ul>
                    </div>
                </div>
                <!-- END SLIDER -->
         </div><!-- /product_image --> 
            
        </div>
        <!-- END COLUMN -->
  </div><!-- /row -->

      <div class="row">
      	<!-- BEGIN LEFT COLUMN -->
        <div class="col-sm-7">
        	<div class="row">
        	{foreach from=$nodosPrimerNivel item="row"}
        		<div class="col-xs-6 col-sm-2 text-center">
        			 <span class="product_link">
        			 	<a href="{$row.url}">{$row.nombre}</a>
        			 </span>
        		</div>
			{/foreach}
        	</div>
            <div class="featured_product">
            	<h2>Featured Design</h2>
                <h3>Crescent Ibex Hoops</h3>
                <a href="home/50239-Crescent+Ibex+Hoops/"><img src="repositorio/img/anterior/primary/weights_ibex.jpg" alt="hive ovoid weights" class="img-responsive" /></a>
            </div><!-- /featured_product -->
        </div>
        <!-- END LEFT COLUMN -->
        
        <!-- BEGIN RIGHT COLUMN -->
        <div class="col-sm-5">
        	<div class="intro_text">
            	<p>Gorilla Glass is the premier brand in glass piercing jewelry. For over a decade we have been designing and handcrafting unique pieces to match your individuality and style.<br>
                  <br>
                  Our complete line of of jewelry styles and colorways has something for everyone, with constant new releases for both the passionate collector and the everyday user.</p>
            	<p>Years of technical innovation, constant experimentation and a love for design give us the ability to consistently produce our signature styles to the highest standard, as well as to make custom jewelry to fit your individual needs.</p>
            	<p>Each piece of Gorilla Glass jewelry is designed and handcrafted in-house by skilled glass artisans at our extensive design and production studio in Oaxaca, Mexico.</p>
            	<p>
            	  <!-- <p>Read More</p> -->
          	  </p>
          	</div>
            
            <div class="locator">
            	<h2>Where to Purchase</h2>
                <div class="col-xs-4">
                	<a href="inicio"><img src="repositorio/img/anterior/home_gorilla_left.png" alt="Gorilla" class="gorilla img-responsive" /></a>
                	<a href="signup">Wholesale</a>
                </div>
                <div class="col-xs-4">
                	<img src="repositorio/img/anterior/logo_entre_gorillas.png" alt="Gorilla Glass" class="img-responsive" />
                </div>
                <div class="col-xs-4">
                	<a href="retailLocator"><img src="repositorio/img/anterior/home_gorilla_right.png" alt="Gorilla" class="gorilla img-responsive" /></a>
                	<a href="retailLocator">Retail Locator</a>
                </div>
            </div>
                
        
        </div>
        <!-- END RIGHT COLUMN -->
      </div><!-- /row -->
</div>