    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-calendar"></span> Create Appointment</h3>
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
                           
					                <form id="admin_form" action="<?php echo site_url('appointments/submit');?>" method="post" role="form" class="contactForm lead">
										<input name="update_id" id="update_id" type="hidden" value="<?php echo set_value('update_id', $form_data['update_id']); ?>">
					                	<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Doctor</label>
													<input name="doctor_id" id="doctor_id" type="hidden" value="<?php echo set_value('doctor_id', $form_data['doctor_id']); ?>">
													<input readonly name="doctor" id="doctor" class="form-control input-md" type="text" value="<?php echo set_value('doctor', $form_data['doctor']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Location</label>
													<input readonly name="location" id="location" class="form-control input-md" type="text" value="<?php echo set_value('location', $form_data['location']); ?>" required>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Date</label>
													<input name="date" id="date"  placeholder='YYYY-MM-DD' class="form-control input-md" type="text" value="<?php echo set_value('date', $form_data['date']); ?>" required>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Time</label>
													<input name="time" id="time" placeholder="00:00" class="form-control input-md" type="text" value="<?php echo set_value('time', $form_data['time']); ?>" >
												</div>
											</div>
										</div>
										<?php if($form_data['processed'] == 'true'):?>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Feedback</label>
													<textarea name="feedback" id="feedback"  placeholder='YYYY-MM-DD' class="form-control input-md" type="text" value="<?php echo set_value('feedback', $form_data['feedback']); ?>" required>
													<?php echo set_value('feedback', $form_data['feedback']); ?>
													</textarea>
												</div>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<div class="form-group">
													<label>Rating</label>
														<select name="ratings" id="ratings" class="form-control" required>
															<option value="1" <?php echo ($form_data['ratings'] == '1' ? 'selected' : '');?>>1 Stars</option>
															<option value="2" <?php echo ($form_data['ratings'] == '2' ? 'selected' : '');?>>2 Stars</option>
															<option value="3" <?php echo ($form_data['ratings'] == '3' ? 'selected' : '');?>>3 Stars</option>
															<option value="4" <?php echo ($form_data['ratings'] == '4' ? 'selected' : '');?>>4 Stars</option>
															<option value="5" <?php echo ($form_data['ratings'] == '5' ? 'selected' : '');?>>5 Stars</option>
														</select>												
												</div>
											</div>
										</div>
										<?php endif;?>
										<button class="btn btn-skin btn-block btn-lg" type="submit">Submit</button>
									</form>

									</br></br>

								</div>
							</div>				
						
						</div>
						</div>
					</div>					
				</div>		
			</div>
		</div>
    </section>