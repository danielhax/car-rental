<!DOCTYPE HTML>
<html>
<head>
	<link href="<?=base_url()?>libs/bootstrap/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary JavaScript plugins) -->
	<script src="<?=base_url()?>libs/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>libs/bootstrap/bootstrap.js"></script>
	<!-- Custom Theme files -->
	<link href="<?=base_url()?>css/template.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url()?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?=base_url()?>css/component.css" rel="stylesheet" type="text/css" />
	<!-- Custom Theme files -->
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Auto cars Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

</head>
<body>
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="header">
				<div class="logo">
					<h1><a href="index.html"><img src="images/car.png" alt=""/>AUTO <span>CARS</span></a></h1>
				</div>
				<div class="top_details">
					<p><span></span> (880)123 2500</p>
					<div class="search">
						<form>
							<input type="text" value="" placeholder="Search...">
							<input type="submit" value="">
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"> </span>
						<span class="icon-bar"> </span>
						<span class="icon-bar"> </span>
					</button>
				</div>
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?=base_url()?>"">Home <span class="sr-only">(current)</span></a></li>
						<li><a href="<?=base_url();?>about">About</a></li>
						<li><a href="<?=base_url();?>cars">Cars</a></li>
						<li><a href="<?=base_url();?>gallery">Gallery</a></li>
						<li><a href="<?=base_url();?>contact">Contact Us</a></li>
						<?php 
							if($this->session->has_userdata("email")){
								echo "<li><a href='<?=base_url();?>user/index'>Account</a></li>";
								echo "<li><a href='<?=base_url();?>user/logout'>Logout</a></li>";
							}
						 ?>
					</ul>
				</div>
			</nav>