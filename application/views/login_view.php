    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-user"></span> Login <small> - Registered Users Only!</small></h3>
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

									<form action="<?php echo site_url('register/submit');?>" method="post" role="form" class="contactForm lead">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Username</label>
													<input name="username" id="username" class="form-control input-md" type="text" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12">
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" id="password" class="form-control input-md" required>
												</div>
											</div>
										</div>
										<input value="Submit" class="btn btn-skin btn-block btn-lg" type="submit">
									</form>
								</div>
							</div>
							</div>

						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>