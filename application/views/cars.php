</div>
</div>
<!============================HEADER END===========================->
<script type="text/javascript">
	function checkAvailability(carID, isRented){
		if(isRented == 1){
			$('button#' + carID).attr('disabled', 'disabled');
			$('button#' + carID).text('Unavailable');
		}
	}
</script>
<div class="services">
	<div class="container">
		<h2>Services</h2>
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Cars For Rent</li>						  
		</ol>
		<?php 
		$item_ctr = 0;
		foreach ($cars as $car) :
			if($item_ctr = 0 || ($item_ctr % 4) == 0){
				echo "<div class=\"row car-list-row\">";
			}

		?>
			<div class="col-md-3 car-card">
				<div class="card">
					<img class="card-img-top" src=<?=base_url()."images/".$car["image_name"]; ?> alt="Card image cap">
					<div class="card-block">
						<h3 class="card-title"><?=$car["company"]." ".$car["model"] ?></h3>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Year: <?=$car["year"]; ?></li>
						<li class="list-group-item">Type: <?=$car["type"]; ?></li>
						<li class="list-group-item">No. of seats: <?=$car["number_of_seats"]; ?></li>
						<li class="list-group-item">Plate No.: <?=$car["plate_no"] ?></li>
						<li class="list-group-item">Rate(per day): PHP <?=$car["rate"]; ?></li>
					</ul>
					<div class="card-block">
						<button type="button" class="card-link btn btn-default">Info</button>
						<button type="button" href="#" id="<?=$car['id'];?>" onclick="setChosenCarID(<?=$car['id'];?>)" class="card-link btn btn-primary">Rent Now</button>
					</div>
				</div>
			</div>

		<?php
			$item_ctr++;

			if(($item_ctr % 3) == 0){
				echo "</div>"; //close row
			}

			echo "<script>checkAvailability(".$car['id'].", ".$car['is_rented'].")</script>";

		endforeach; 
		?>

		</div>  	   
	</div>

	<!-- ===============================PAYMENT MODAL================================== -->

	<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Set Start and End dates of rent </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!===== Step 1 ====-->
					<div class="set-duration">
						<label for="start-date">Start Date: </label>
						<div class="input-group date duration-picker" id="start-date" data-provide="datepicker">
						    <input type="text" name='start_date' class="form-control">
						    <div class="input-group-addon">
						        <span class="glyphicon glyphicon-th"></span>
						    </div>
						</div>
						<label for="end-date">End Date: </label>
						<div class="input-group date duration-picker" id="end-date" data-provide="datepicker">
						    <input type="text" name='end_date' class="form-control">
						    <div class="input-group-addon">
						        <span class="glyphicon glyphicon-th"></span>
						    </div>
						</div>
					</div>
					<!===== Step 2 ====-->
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
					<!===== Step 3 ====->
					<div class="payment-details-form credit-card-details hidden">
						<?=form_open('', array('class' => 'credit-card-form')); ?>
							<div class="form-group">
								<input type="text" name="card_number" placeholder="Credit Card No." required>
							</div>
							<div class="form-group">
								<label for="datepicker">Card Expiry: </label>
								<div class="input-group date" id="datepicker" data-provide="datepicker">
								    <input type="text" id="expiration-dp" class="form-control" name="card_expiry">
								    <div class="input-group-addon">
								        <i class="glyphicon glyphicon-th"></i>
								    </div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="cvv" placeholder="CVV" required>
							</div>
						<?=form_close(); ?>
					</div>
					<div class="payment-details-form bank-details hidden">
						<?=form_open('', array('class' => 'bank-form')); ?>
							<div class="form-group">
								<select name="bank" id="bank" class="form-control">
									<option value="BPI">BPI</option>
									<option value="BDO">BDO</option>
								</select>
							</div>
						<?=form_close(); ?>
					</div>
					<!===== Step 4 ====-->
					<div class="transaction-message hidden">
						<i class="success-icon glyphicon-glyphicon-ok"></i><span>Order successful!</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal"></span> Close</button>
					<button type="button" id="step1" class="btn btn-success confirm-payment-btn">Next</span></button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		var car_id = null;

		function setChosenCarID(carID){
			if("<?=$this->session->has_userdata('email');?>" == ""){
				window.location.href = "<?=base_url(); ?>";
			} else {
				car_id = carID;
				$('#paymentModal').modal('show');
			}
		}

		function resetModal(){
			$('#paymentModal').modal('hide');
			//$('#paymentModal').find('input:text').val('');
			//$('.duration-picker').datepicker('clearDates');
			$('#paymentModal .modal-body div').addClass('hidden');
			$('#paymentModal .set-duration').removeClass('hidden');
		}

		function showPaymentFillupForm(paymentType){
			if(paymentType == "visa" || paymentType == "master-card"){
				$('.credit-card-details').removeClass('hidden');
			}
			else if(paymentType == "bank-transfer"){
				$('.bank-details').removeClass('hidden');
			}
		}

		function buildTransactionData(user_id, car_id, start_date, end_date, payment_id){
			var transaction_data = []
			// alert(user_id + " " + car_id + " " + start_date + " " + end_date + " " + payment_id);
			transaction_data['user_fk'] = user_id;
			transaction_data['car_fk'] = car_id;
			transaction_data['start_date'] = start_date;
			transaction_data['end_date'] = end_date;
			transaction_data['payment_details_fk'] = payment_id;
			return transaction_data;
		}

		// function showPaymentDetailsConfirmation(){

		// }

		$(function(){
			$(".banner").addClass("banner2");

			$('#datepicker').datepicker({
				format: "mm/yyyy",
			    viewMode: "months",
			    startDate: '1d'
			});

			$('.duration-picker').datepicker({
				format: "mm/dd/yyyy",
				startDate: '1d'
			})

			var paymentType = '';
			var start_date = '';
			var end_date = '';

			$('.confirm-payment-btn').click(function(){
				<?php if($this->session->has_userdata('email')){ ?>
				switch($(this).attr('id')){
					case 'step1':
						start_date = $('input[name="start_date"]').val();
						end_date = $('input[name="end_date"]').val();

						$('.set-duration').addClass('hidden');
						$('.choose-payment-type').removeClass('hidden');
						$('#paymentModal .modal-title').text('Choose payment method');
						$(this).attr('id', 'step2');

						break;
					case 'step2':
						paymentType = $('.paymentMethod.active input[name="options"]').val();

						$('.choose-payment-type').addClass('hidden');

						showPaymentFillupForm(paymentType);

						$('#paymentModal .modal-title').text('Enter payment details');
						$(this).attr('id', 'step3');

						break;
					case 'step3':
						var paymentDetails = [];

						if(paymentType == "visa" || paymentType == "master-card"){
							paymentDetails = $('.credit-card-form').serializeArray();
							paymentDetails.push({name: 'type', value: paymentType});
							paymentDetails = serializedArrayRefine(paymentDetails);
						}
						else if(paymentType == "bank-transfer"){
							paymentDetails = $('.bank-form').serialize();
						}

						$.ajax({
							url: '<?=base_url();?>user/save_credit_card_details',
							type: 'POST',
							dataType: 'JSON',
							data: {paymentDetails: JSON.stringify(paymentDetails)},
							success: function(data){
								if(data.success == true){

									// var transaction_data = buildTransactionData(, car_id, start_date, end_date, data.payment_id);

									var transaction_data = [];
									transaction_data.push({name: 'user_fk', value: <?=$this->session->userdata('id');?>}) ;
									transaction_data.push({name: 'car_fk', value: car_id});
									transaction_data.push({name: 'start_date', value: start_date});
									transaction_data.push({name: 'end_date', value: end_date});
									transaction_data.push({name: 'payment_details_fk', value: data.payment_id});

									transaction_data = serializedArrayRefine(transaction_data);

									$.ajax({
										url: '<?=base_url();?>transaction/rent_car',
										type: 'POST',
										dataType: 'JSON',
										data: {transaction_data: JSON.stringify(transaction_data)},
										success: function(data){
											if(data.success == true){
												$.ajax({
													url: '<?=base_url();?>cars/set_car_rented',
													type: 'POST',
													dataType: 'JSON',
													data: {id: car_id},
													success: function(data){
														if(data.success == true){
															checkAvailability(car_id, 1);
														} else {
															alert(data.message);
														}
													},
													error: function(xhr){
														alert("error in renting car " + xhr.responseText);
													}
												});
												
											} else {
												resetModal();
											}
										},
										error: function(xhr){
											alert(xhr.responseText);
											resetModal();
										}
									});
								}
							},
							error: function(xhr){
								alert(xhr.responseText);
							}
						});
						$('.payment-details-form').addClass('hidden');
						$('#paymentModal .modal-title').text('Order successful');
						$(this).attr('id', 'step4');
						$('transaction-message').removeClass('hidden');

						break;
					case 'step4':
						resetModal();
						break;
				}
				<?php } ?>
			});

		});
	</script>
	<script type="text/javascript" src="<?=base_url()?>libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>