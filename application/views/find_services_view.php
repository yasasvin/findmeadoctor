    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-hospital-o"></span> Find Services</h3>
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
                           
					                <form id="admin_form" action="<?php echo site_url('find_services/submit');?>" method="post" role="form" class="contactForm lead">
					                	<input type="hidden" id="location" value="<?php echo $this->session->userdata('location');?>"/>
					                	<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Medical Service Type</label>
													<select name="service_type" id="service_type" class="form-control">
														<?php echo $form_data['medical_services'];?>
													</select>
												</div>
											</div>
										</div>
										<button class="btn btn-skin btn-block btn-lg" type="submit">Submit</button>
									</form>

									</br></br>

									<table class="table table-bordered table-hover table-striped" id="medical_services_table">
										<thead>
											<tr>
												<th colspan="5" class="text-center">Medical Services</th>
											</tr>
											<tr>
												<th>No.</th>
												<th>Description</th>
												<th>Location</th>
												<th>Distance</th>
												<th>Duration</th>
											</tr>
										</thead>
										<tbody>
										<?php if(empty($form_data['table_data'])):?>
											<td colspan="5" class="text-center">Sorry. We could not find any medical services.</td>
										</tbody>
										<?php else: 
											foreach($form_data['table_data'] as $e):
										?>
										<tr>
											<td><?php echo $e['count'];?></td>
											<td><?php echo $e['description'];?></td>
											<td class="service_locations"><?php echo $e['location'];?></td>
											<td class="location_distance">0.00</td>
											<td class="location_duration">00:00</td>
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
    	$.each($('.service_locations'), function(i,o) {
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
    		$.each($('.service_locations'), function(i,o) {
	    		if($(o).html() != '') {
	    			$(o).parent().find('.location_distance').html(response.rows[0].elements[iterator].distance.text);
	    			$(o).parent().find('.location_duration').html(response.rows[0].elements[iterator].duration.text);
	    			iterator++;
	    		}
	    	});
    	}
    }

    </script>