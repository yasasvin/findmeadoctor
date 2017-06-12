    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-stethoscope"></span> Symptom Checker</h3>
							</div>
								<div class="panel-body">
								    <!-- Use of flash data to check if any messages to be showed to user -->
									<?php if($this->session->flashdata('success')):?>
								    	<div class="alert alert-success alert-dismissible" role="alert">
								    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								    		<?php echo $this->session->flashdata('success');?>
								    	</div>
							    	<?php endif;?>

							    	<?php if($this->session->flashdata('error')):?>
								    	<div class="alert alert-danger alert-dismissible" role="alert">
								    		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								    		<?php echo $this->session->flashdata('error');?>
								    	</div>
							    	<?php endif;?>
                           
					                <form id="admin_form" action="<?php echo site_url('symptom_checker/index');?>" method="post" role="form" class="contactForm lead">
					                	<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input readonly name="name" id="name" class="form-control input-md" type="text" value="<?php echo set_value('name', $form_data['name']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Age</label>
													<input readonly name="age" id="age" class="form-control input-md" type="text" value="<?php echo set_value('age', $form_data['age']); ?>" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<input readonly name="gender" id="gender" class="form-control input-md" type="text" value="<?php echo set_value('gender', $form_data['gender']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Location</label>
													<input readonly name="location" id="location" class="form-control input-md" type="text" value="<?php echo set_value('location', $form_data['location']); ?>" >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Select symptoms (Multiple)</label>
													<select name="symptoms[]" id="symptoms" class="form-control" required multiple>
														<?php echo $form_data['symptoms'];?>
													</select>
												</div>
											</div>
										</div>
										<button class="btn btn-skin btn-block btn-lg" type="submit">Submit</button>
									</form>

									</br></br>

									<table class="table table-bordered table-hover table-striped" id="medical_conditions_table">
										<thead>
											<tr>
												<th colspan="8" class="text-center">Possible Medical Condition & Doctors for Appointment</th>
											</tr>
											<tr>
												<th>No.</th>
												<th>Possible Medical Condition</th>
												<th>Doctor</th>
												<th>Specialization</th>
												<th>Location</th>
												<th>Distance</th>
												<th>Duration</th>
												<th>Make Appointment</th>
											</tr>
										</thead>
										<tbody>
										<?php if(empty($form_data['table_data'])):?>
											<td colspan="8" class="text-center">Sorry. We could not find any possible conditions or doctors.</td>
										</tbody>
										<?php else: 
											foreach($form_data['table_data'] as $e):
										?>
										<tr>
											<td><?php echo $e['count'];?></td>
											<td><?php echo $e['medical_condition_name'];?></td>
											<td><?php echo $e['doctor_name'];?></td>
											<td><?php echo $e['specialization_name'];?></td>
											<td class="doctor_locations"><?php echo $e['location'];?></td>
											<td class="location_distance">0.00</td>
											<td class="location_duration">00:00</td>
											<td class="text-center"><strong><a class="text-info" href="<?php echo site_url('appointments/make_appointment/') . $e['doctor_id']; ?>">Make Appointment</a></strong></td>
										</tr>
										<?php endforeach;
										endif;?>
									</table>

								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>
    </section>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjip7rKC7sGMKzcpwnFMEo1qlYnIQiEbY&libraries=places"></script>
    <script type="text/javascript">

    // If table data is filled, fetch distances using Google Distance API and set them back on the table
    $(document).ready(function() {
    	origin        = [];
		origin[0]     = $('#location').val();
		destinations = [];
		count         = 0;
    	$.each($('.doctor_locations'), function(i,o) {
    		if($(o).html() != '') {
    			destinations[count] = $(o).html();
    			count++;
    		}
    	});

    	var service = new google.maps.DistanceMatrixService();

    	service.getDistanceMatrix(
		{
		    origins: origin,
		    destinations: destinations,
	        travelMode: 'DRIVING'
		}, callback);

    });

    // Callback function to set distance and duration once table data is fetched
    function callback(response, status) {
    	console.log(response);
    	if(!$.isEmptyObject(response)) {
    		iterator = 0;
    		$.each($('.doctor_locations'), function(i,o) {
	    		if($(o).html() != '') {
	    			$(o).parent().find('.location_distance').html(response.rows[0].elements[iterator].distance.text);
	    			$(o).parent().find('.location_duration').html(response.rows[0].elements[iterator].duration.text);
	    			iterator++;
	    		}
	    	});
    	}
    }

    </script>