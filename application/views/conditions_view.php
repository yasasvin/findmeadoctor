    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Manage Conditions</h3>
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
                           
					                <form id="admin_form" action="<?php echo site_url('conditions/submit');?>" method="post" role="form" class="contactForm lead">
					                	<input type="hidden" name="update_id" id="update_id" value="<?php echo set_value('update_id', $form_data['medical_cond_id']); ?>"/>
					                	<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Medical Condition</label>
													<input name="medical_condition_name" id="medical_condition_name" class="form-control input-md" type="text" value="<?php echo set_value('medical_condition_name', $form_data['medical_condition_name']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Status</label>
													<select name="status" id="status" class="form-control" required>
														<option value="1" <?php echo ($form_data['status'] == '1' ? 'selected' : '');?>>Active</option>
														<option value="0" <?php echo ($form_data['status'] == '0' ? 'selected' : '');?>>Inactive</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Related Symptoms</label>
													<select name="related_symptoms[]" id="related_symptoms" class="form-control" required multiple>
														<?php echo $form_data['related_symptoms'];?>
													</select>
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
											<td class="text-center"><strong><a class="text-info" href="<?php echo site_url('conditions/index/') . $e['id']; ?>">Edit</a></strong></td>
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