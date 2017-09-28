<div class="footer2">	
	<div class="container">
		<div class="ftr2-grids">
			<div class="col-md-4 ftr2-grid1">			 
				<h3>About Us</h3>
				<ul>
					<li><a href="about.html">About</a></li>
					<li><a href="services.html">Services</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-4 ftr2-grid2">
				<h3>Latest Tweets</h3>
				<div class="ftr2-grid">
					<p>It is a long established fact that a 
					reader will be distracted by the of a reader page when at its layout.</p>
					<a href="#">1 Hour ago</a>
				</div>
				<div class="ftr2-grid">
					<p>It is a long established fact that a 
					reader will be distracted by the of a reader page when at its layout.</p>
					<a href="#">3 Hour ago</a>
				</div>
			</div>
			<div class="col-md-4 ftr6-grid3">
				<h3>Get in Touch</h3>				 
				<p>It is a long established fact that a reader will be distracted by the r-
				eadable content of a page when looking at its layout.</p>
				<form>					 
					<input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
					<input type="submit" value="Subscribe"/>
				</form>
				<div class="social">
					<ul>
						<li><a href="#"><i class="facebook"></i></a></li>
						<li><a href="#"><i class="twitter"></i></a></li>
						<li><a href="#"><i class="dribble"></i></a></li>	
						<li><a href="#"><i class="google"></i></a></li>										
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-md-8 ftr2-bottom">		
		<p>Copyright &copy; 2017 <span>Auto cars</span> All rights reserved</a></p>
	</div>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<script src="libs/bootstrap/bootstrap.js"></script>

	<script src="js/responsiveslides.min.js"></script>

	<script>
		$(function () {
		// Slideshow 4
		$("#slider3,#slider2").responsiveSlides({
			auto: true,
			pager: true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			before: function () {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function () {
				$('.events').append("<li>after event fired.</li>");
			}
		});

	});
</script>
<script src="js/custom.js"></script>
<script type="js/requests.js"></script>
</div>
</body>
</html>