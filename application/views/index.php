
<div  id="top" class="callbacks_container">
	<?php $this->view('templates/login_signup_form') ?>
</div>			
</div>
</div>
<!---->
<div class="welcome">
	<div class="container">
		<div class="welcome_sec">
			<div class="col-md-6 welcome_info">
				<h3>Welcome</h3>
				<span></span>
				<h4>Ut eget neque ac ipsum venenatis lobortis at et diam.</h4>
				<p>Curabitur porta nisl non dui lobortis, vel aliquet ex pretium. Vivamus ullamcorper odio at commodo egestas.
					Mauris lacinia nibh a enim dictum, sit amet scelerisque enim molestie. Morbi ac laoreet ante, quis fermentum urna. 
				Etiam sit amet massa non nunc tincidunt mattis. Nunc non ex ultricies, tristique leo sed, vehicula mauris. Sed mollis tristique ligula, nec euismod dolor pharetra non.</p>
				<p>Etiam ante diam, congue sit amet elit placerat, faucibus faucibus ipsum. Vivamus vel laoreet nulla. Aenean id bibendum diam. Donec rutrum mi diam, sed tempus metus luctus a.
				Nullam vitae quam sed felis mattis facilisis. Nunc magna. Donec eleifend odio non neque semper eleifend. Mauris pharetra venenatis augue.</p>
				<a href="about.html" class="hvr-bounce-to-bottom">Read More</a>
			</div>
			<div class="col-md-6 welcome_pic">
				<h2>Suspendisse massa pellentesque</h2>
				<img src="images/wc.jpg" class="img-responsive" alt=""/>
				<h3>Vestibulum efficitur lacus nulla porttitor lorem luctus.</h3>
				<p>Duis vitae auctor purus. Aenean feugiat nunc mauris, id porttitor turpis 
					rhoncus sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus felis ac 
				risus lacinia, non venenatis erat vestibulum.</p>
				<p></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!---->
<div class="auto_sec">
	<div class="container">
		<h3>Complete auto service</h3>
		<span></span>
		<div class="auto_sec_grids">
			<div class="col-md-8 auto_sec_left">						 
				<img src="images/pic2.jpg" class="img-responsive" alt=""/>
				<h5><a href="#">Mauris a eros quis purus suscipit iaculis</a></h5>
				<p>Etiam ante diam, congue sit amet elit placerat, faucibus faucibus ipsum. Vivamus vel laoreet nulla. Aenean id bibendum diam. Donec rutrum mi diam, sed tempus metus luctus a.
					Nullam vitae quam sed felis mattis facilisis. Nunc magna ex, consequat et dapibus nec, volutpat sit amet enim. Ut a sagittis nulla. Duis pulvinar et dolor vitae vulputate.
				Donec eleifend odio non neque semper eleifend. Mauris pharetra venenatis augue.</p>
			</div>
			<div class="col-md-4 auto_sec_right">
				<p><a href="gallery.html">Donec maximus enim</a></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!---->
<script>
	$(function () {
		$("#slider2").responsiveSlides({
			auto: true,
			speed: 500,
			namespace: "callbacks2",
			pager: true,
		});
	});
</script>

<div class="slider btm_sld">
	<div class="container">
		<div class="callbacks2_container">
			<ul class="rslides" id="slider2">
				<li>						 
					<p>Curabitur pharetra sed magna at tincidunt. Maecenas auctor tincidunt ex.
					Aliquam a vestibulum Donec diam ipsum euismod.</p>	   					  
				</li>	
				<li>						 
					<p>Fusce erat nibh, ornare et suscipit non, varius a sapien. Donec vel lectus
					vitae nibh sodales semper. Donec diam ipsum.</p>	  					  
				</li>
				<li>						 
					<p>Proin tincidunt sit amet velit quis dignissim. Donec et odio sed purus tristique
					vitae nibh imperdiet diam sed eget metus.</p>	   					  
				</li>				
			</ul>
		</div>
	</div>
</div>
<!---->

<!---->
<div class="feature_sec">
	<div class="container">
		<div class="feature_head">
			<h3>Featured News</h3>
			<span></span>
		</div>
		<ul id="flexiselDemo3">
			<li>
				<div class="biseller-column">
					<a href="#"><img src="images/pic6.jpg" alt=""/></a>
					<h4>Donec lacinia</h4>
					<p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
					<a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
				</div>
			</li>
			<li>
				<div class="biseller-column">
					<a href="#"><img src="images/pic5.jpg" alt=""/></a>
					<h4>Donec lacinia</h4>
					<p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra.</p>
					<a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
				</div>
			</li>
			<li>
				<div class="biseller-column">
					<a href="#"><img src="images/pic8.jpg" alt=""/></a>
					<h4>Donec lacinia</h4>
					<p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra.</p>
					<a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
				</div>
			</li>
			<li>
				<div class="biseller-column">
					<a href="#"><img src="images/pic4.jpg" alt=""/></a>
					<h4>Donec lacinia</h4>
					<p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit	egestas nec felis. Nunc pharetra.</p>
					<a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
				</div>
			</li>
		</ul>
		<div class="clearfix"></div>
		<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo3").flexisel({
					visibleItems:4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: {
						portrait: {
							changePoint:480,
							visibleItems:2
						}, 
						landscape: { 
							changePoint:640,
							visibleItems:2
						},
						tablet: { 
							changePoint:768,
							visibleItems:3
						}
					}
				});

			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
</div>