</div>
</div>
<!============================HEADER END===========================->
<script type="text/javascript">
</script>
<div class="services">
	<div class="container">
		<h2>Services</h2>
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Services</li>						  
		</ol>
		<?php 
			$item_ctr = 0;
			foreach ($cars as $car) :
				if($item_ctr = 0 || ($item_ctr % 3) == 0){
					echo "<div class=\"row car-list-row\">";
				}

				echo form_open('cars/rent_car', array('id' => $car['id'], 'role' => 'form'));
		?>
			<input type="hidden" name="id" value=<?=$car['id']; ?>>
			<div class="col-md-4 car-card">
				<div class="card" style="width: 20rem;">
					<img class="card-img-top" src=<?="images/".$car["image_name"]; ?> alt="Card image cap">
					<div class="card-block">
						<h3 class="card-title"><?=$car["company"]." ".$car["model"] ?></h4>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Year: <?=$car["year"]; ?></li>
						<li class="list-group-item">Type: <?=$car["type"]; ?></li>
						<li class="list-group-item">No. of seats: <?=$car["number_of_seats"]; ?></li>
						<li class="list-group-item">No. of seats: <?=$car["number_of_seats"]; ?></li>
					</ul>
					<div class="card-block">
						<a href="#" class="card-link btn btn-default">Info</a>
						<button type="submit" class="card-link btn btn-primary">Rent Now</button>
					</div>
				</div>
			</div>

		<?php
				form_close();

				if(($item_ctr % 3) == 0){
					echo "<div>"; //close row
				}

			endforeach; 
		?>

	</div>  	   
</div> 
<script type="text/javascript">
	$(function(){
		$(".banner").addClass("banner2");
	});
</script>