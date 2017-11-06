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

				// echo form_open( base_url('transaction/rent_car/'.$car['id']), array('id' => 'car_'.$car['id'].'_form', 'method' => 'get', 'role' => 'form'));
			?>
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
							<li class="list-group-item">Rate(per day): PHP <?=$car["rate"]; ?></li>
						</ul>
						<div class="card-block">
							<a href="#" class="card-link btn btn-default">Info</a>
							<a href="#" onclick="setChosenCarID(<?=$car['id'];?>)" class="card-link btn btn-primary">Rent Now</a>
						</div>
					</div>
				</div>

				<?php
				//form_close();

				if(($item_ctr % 3) == 0){
					echo "<div>"; //close row
				}

			endforeach; 
			?>

		</div>  	   
	</div>

	<!-- ===============================PAYMENT MODAL================================== -->

	<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Select type of payment </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!===== Step 1 ====-->
					<div class="choose-payment-type hidden">
						<div class="row">
							<div class="paymentCont">
								<div class="headingWrap">
									<h3 class="headingTop text-center">Select Your Payment Method</h3>
								</div>
								<div class="paymentWrap">
									<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
										<label class="btn paymentMethod active">
											<div class="method visa"></div>
											<input type="radio" value="visa" name="options" checked> 
										</label>
										<label class="btn paymentMethod">
											<div class="method master-card"></div>
											<input type="radio" value="master-card" name="options"> 
										</label>
										<label class="btn paymentMethod">
											<div class="method bank-transfer"></div>
											<input type="radio" value="bank-transfer" name="options"> 
										</label>
									</div>        
								</div>
							</div>
						</div>
					</div>
					<!===== Step 2 ====-->
					<div class="payment-details-form bank-details">
						<div class="form-group">
							<input type="text" name="full-name" class="form-control" placeholder="Full Name">
						</div>
						<div class="form-group">
							<select name="bank" id="bank" class="form-control">
								<option value="BPI">BPI</option>
								<option value="BDO">BDO</option>
							</select>
						</div>
					</div>
					<!===== Step 2.1 ====-->
					<!===== Step 3 ====-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal"></span> Close</button>
					<button type="button" id="step2" class="btn btn-success confirm-payment-btn">Next</span></button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		id = null;

		function setChosenCarID(carID){
			id = carID;
			$('#paymentModal').modal('show');
		}

		$(function(){
			$(".banner").addClass("banner2");

			$('.confirm-payment-btn').click(function(){

				switch($(this).attr('id')){
					case 'step1':
						paymentType = $('input[name="options"]').val();

						$.ajax({
							url: '<?=base_url();?>' + 'transaction/rent_car/',
							type: 'GET',
							dataType: 'JSON',
							data: {paymentType: paymentType},
						});

						$(this).attr('id', 'step2');

						break;
					case 'step2':
						break;
					case 'step2p1':
						break;
				}

				
			});

		});
	</script>