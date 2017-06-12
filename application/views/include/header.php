<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A website to find doctors and medical services based on location">
    <meta name="author" content="Yasasvin Chamara">

    <title>Find Me A Doctor</title>
	
    <!-- css -->
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/cubeportfolio/css/cubeportfolio.min.css');?>">
	<link href="<?php echo base_url('css/nivo-lightbox.css');?>" rel="stylesheet" />
	<link href="<?php echo base_url('css/nivo-lightbox-theme/default/default.css');?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('css/owl.carousel.css');?>" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url('css/owl.theme.css');?>" rel="stylesheet" media="screen" />
	<link href="<?php echo base_url('css/animate.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="<?php echo base_url('css/bodybg/bg1.css');?>" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="<?php echo base_url('css/color/default.css');?>" rel="stylesheet"/>
	<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
    
    <!-- =======================================================
        Theme Name: Medicio
        Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<div id="wrapper">
	
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left"><?php echo date('l jS F Y');?></p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">Call us now +64 008 65 001</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo site_url();?>">
                    <img src="<?php echo base_url('img/logo.png');?>" alt="" height="40" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo site_url();?>">Home</a></li>
				<li><a href="<?php echo site_url('symptom_checker');?>">Symptom Checker</a></li>
				<li><a href="<?php echo site_url('find_doctors');?>">Doctors</a></li>
				<li><a href="<?php echo site_url('find_services');?>">Facilities</a></li>
				<?php if($this->session->userdata('status') != 'true'):?>
					<li><a href="<?php echo site_url('login');?>">Login</a></li>
				<?php endif;?>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($this->session->userdata('status') == 'true' ?  'Welcome ' . $this->session->userdata('first_name') : 'Logged in as Guest');?><b class="caret"></b></a>
					  <ul class="dropdown-menu">
					  	<?php if($this->session->userdata('status') == 'true'):?>
					  		<?php if($this->session->userdata('user_level') == 'admin'):?>
					  			<li><a href="<?php echo site_url('admin');?>">Admin Panel</a></li>
					  		<?php endif;?>
						    <li><a href="<?php echo site_url('appointments/my_appointments');?>">My Appointments</a></li>
							<li><a href="<?php echo site_url('login/logout');?>">Log Out</a></li>
						<?php else:?>
							<li><a href="<?php echo site_url('register')?>">Register</a></li>
						<?php endif;?>
					  </ul>
				</li>
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

