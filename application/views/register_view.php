    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-wrapper">
						<div class="wow fadeInRight animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInRight;">
						
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Register <small> - It's free!</small></h3>
							</div>
									<?php if($this->session->userdata('status') == 'true'):?>
										</br>
										<div class="text-center">
										    <h5>You have already registered and logged in. You can proceed to use our services!</h5>
								    	</div>
									<?php else:?>
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
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Username</label>
	    													<input name="username" id="username" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Email</label>
	    													<input type="email" name="email" id="email" class="form-control input-md" required>
	    												</div>
	    											</div>
	    										</div>
	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Password</label>
	    													<input name="password" id="password" class="form-control input-md" type="password" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Password</label>
	    													<input type="password" name="confirm_password" id="confirm_password" class="form-control input-md" required>
	    												</div>
	    											</div>
	    										</div>
	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>First Name</label>
	    													<input name="first_name" id="first_name" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Last Name</label>
	    													<input name="last_name" id="last_name" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    										</div>

	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Address Line 1</label>
	    													<input name="address_line1" id="address_line1" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Address Line 2</label>
	    													<input name="address_line2" id="address_line2" class="form-control input-md" type="text">
	    												</div>
	    											</div>
	    										</div>

	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>City</label>
	    													<input name="city" id="city" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>State/Province</label>
	    													<input name="state" id="state" class="form-control input-md" type="text">
	    												</div>
	    											</div>
	    										</div>

	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Postal Code</label>
	    													<input name="postal_code" id="postal_code" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Country</label>
	    													<select name="country" id="country" class="form-control input-md" required>
	    														<option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cabo Verde">Cabo Verde</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Costa Rica">Costa Rica</option><option value="Côte d'Ivoire">Côte d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Democratic People's Republic of Korea (North Korea)">Democratic People's Republic of Korea (North Korea)</option><option value="Democratic Republic of the Cong">Democratic Republic of the Cong</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People's Democratic Republic (Laos)">Lao People's Democratic Republic (Laos)</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia (Federated States of)">Micronesia (Federated States of)</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand" selected>New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Republic of Korea (South Korea)">Republic of Korea (South Korea)</option><option value="Republic of Moldova">Republic of Moldova</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Sudan">South Sudan</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Tajikistan">Tajikistan</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom of Great Britain and Northern Ireland">United Kingdom of Great Britain and Northern Ireland</option><option value="United Republic of Tanzania">United Republic of Tanzania</option><option value="United States of America">United States of America</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
	    													</select>
	    												</div>
	    											</div>
	    										</div>

	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>DOB</label>
	    													<input placeholder="YYYY-MM-DD" name="dob" id="dob" class="form-control input-md" type="date" required>
	    												</div>
	    											</div>
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Gender</label>
	    													<select name="gender" id="gender" class="form-control input-md" required>
	    														<option value="male">Male</option>
	    														<option value="female">Female</option>
	    													</select>
	    												</div>
	    											</div>
	    										</div>

	    										<div class="row">
	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Phone number</label>
	    													<input name="phone" id="phone" class="form-control input-md" type="text" required>
	    												</div>
	    											</div>

	    											<div class="col-xs-6 col-sm-6 col-md-6">
	    												<div class="form-group">
	    													<label>Location</label>
	    													<input id="location" name="location" class="form-control input-md" placeholder="Enter Your Address" onFocus="geolocate()" type="text"/>
	    												</div>
	    											</div>
	    										</div>
	    										
	    										<input value="Submit" class="btn btn-skin btn-block btn-lg" type="submit">
	    										
	    										<p class="lead-footer">If you have already registered <a href="<?php echo site_url('login');?>">click here</a> to login</p>
	    									</form>
    									</div>
    								<?php endif;?>
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