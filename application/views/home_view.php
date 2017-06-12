    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">

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

				<div class="row">
					<div class="col-lg-6">
					<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
					<h2 class="h-ultra">Find Me A Doctor</h2>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					<h7 class="h-light">Providing you the fastest and most reliable way to make an appointment and other medical services based on your location</h7></br></br>
					</div>
						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

						<ul class="lead-list">
							<li><a><span class="fa fa-stethoscope fa-3x icon-info"></span> <span class="list"><strong>Symptom Checker</strong><br /> Find a specialist based on your symptoms.</span></a></li>
							<li><a><span class="fa fa-user-md fa-3x icon-info"></span> <span class="list"><strong>Find a Doctor</strong><br />Make an appointment with a doctor.</span></a></li>
							<li><a><span class="fa fa-hospital-o fa-3x icon-info"></span> <span class="list"><strong>Find other Medical Services</strong><br />Find other medical services based on your location.</span></a></li>
							<li><a href="<?php echo site_url('register');?>"><span class="fa fa-pencil-square-o fa-3x icon-info"></span> <span class="list"><strong>Register Now</strong><br />Register yourself to access above services at no cost.</span></a></li>
						</ul>
						</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<img src="img/dummy/img-1.png" class="img-responsive" alt="" />
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>