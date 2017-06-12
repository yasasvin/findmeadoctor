    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-calendar"></span> My Appointments</h3>
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
									<table class="table table-bordered table-hover table-striped" id="medical_services_table">
										<thead>
											<tr>
												<th colspan="5" class="text-center">My Appointments</th>
											</tr>
											<tr>
												<th>No.</th>
												<th>Doctor</th>
												<th>Date</th>
												<th>Time</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php if(empty($form_data['table_data'])):?>
											<td colspan="5" class="text-center">No appointments found.</td>
										</tbody>
										<?php else: 
											foreach($form_data['table_data'] as $e):
										?>
										<tr>
											<td><?php echo $e['count'];?></td>
											<td><?php echo $e['first_name'] . ' ' . $e['last_name'];?></td>
											<td><?php echo $e['date'];?></td>
											<td><?php echo $e['time'];?></td>
											<td class="text-center"><strong><a class="text-info" href="<?php echo site_url('appointments/index/') . $e['appointment_id']; ?>">View Appointment</a></strong></td>
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