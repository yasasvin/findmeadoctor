    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Manage Medical Services</h3>
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
                           
					                <form id="admin_form" action="<?php echo site_url('medical_services/submit');?>" method="post" role="form" class="contactForm lead">
					                	<input type="hidden" name="update_id" id="update_id" value="<?php echo set_value('update_id', $form_data['medical_service_id']); ?>"/>
					                	<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input name="description" id="description" class="form-control input-md" type="text" value="<?php echo set_value('description', $form_data['description']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Service Type</label>
													<select name="medical_service_type_id" id="medical_service_type_id" class="form-control" required>
														<?php echo $form_data['medical_services'];?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Address Line 1</label>
													<input name="address_line1" id="address_line1" class="form-control input-md" type="text" value="<?php echo set_value('address_line1', $form_data['address_line1']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Address Line 2</label>
													<input name="address_line2" id="address_line2" class="form-control input-md" type="text" value="<?php echo set_value('address_line2', $form_data['address_line2']); ?>" >
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input name="city" id="city" class="form-control input-md" type="text" value="<?php echo set_value('city', $form_data['city']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>State/Province</label>
													<input name="state" id="state" class="form-control input-md" type="text" value="<?php echo set_value('state', $form_data['state']); ?>" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Postal Code</label>
													<input name="postal_code" id="postal_code" class="form-control input-md" type="text" value="<?php echo set_value('postal_code', $form_data['postal_code']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<select name="country" id="country" class="form-control" required>
														<?php echo $form_data['countries'];?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control" required>
														<option value="1" <?php echo ($form_data['status'] == '1' ? 'selected' : '');?>>Active</option>
														<option value="0" <?php echo ($form_data['status'] == '0' ? 'selected' : '');?>>Inactive</option>
													</select>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Location</label>
													<input id="location" name="location" class="form-control input-md" value="<?php echo set_value('location', $form_data['location']); ?>"  placeholder="Enter Address" onFocus="geolocate()" type="text"/>
												</div>
											</div>
										</div>
										<button class="btn btn-skin btn-block btn-lg" type="submit">Submit</button>
										<button class="btn btn-warning btn-block btn-lg" type="button" onclick="$('#admin_form').find('input,select').val('');">Reset</button>
										<a href="<?php echo site_url('admin');?>" class="btn btn-success btn-block btn-lg" type="reset">Go Back</a>
									</form>

									</br></br>

									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th colspan="4" class="text-center">Existing Records</th>
											</tr>
											<tr>
												<th>ID</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php if(empty($form_data['table_data'])):?>
											<td colspan="4" class="text-center">No Records to Display.</td>
										</tbody>
										<?php else: 
											foreach($form_data['table_data'] as $e):
										?>
										<tr>
											<td><?php echo $e['id'];?></td>
											<td><?php echo $e['display'];?></td>
											<td><?php echo ($e['status'] == '1' ? 'Active' : 'Inactive');?></td>
											<td class="text-center"><strong><a class="text-info" href="<?php echo site_url('medical_services/index/') . $e['id']; ?>">Edit</a></strong></td>
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
		var input = document.getElementById('location');
		var options = {
		  types: ['address']
		};

		autocomplete = new google.maps.places.Autocomplete(input, options);
    </script>