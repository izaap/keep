<!--/ Start Header Section -->
			<!--div class="hidden-header"></div-->
			<header class="clearfix">
				<div class="">
					<div class="container">
						<div class="row">
							<!-- section left -->
							<div class="col-xs-12 col-sm-5">
								<div class="row">&nbsp;</div>
							</div>
							
							<!-- section mid -->
							<div class="col-xs-12 col-sm-2">
								<div class="row text-center logo">
									<a class="" href="index.html">
										<img alt="" src="<?php echo include_img_path();?>/logo-small.png" class="logo" width="100" height="114" alt="logo [100x114]">
									</a>
								</div>
							</div>
							
							<!-- section right -->
							
							<div class="col-xs-12 col-sm-5 top-section text-right">
								<div class="r-ow">
									<div class="col-xs-12 col-md-8 col-md-offset-4">
										<div class="row">
											<!--div class="col-xs-6 divice-align-right">
												<div class="row">
													<div class="dropdown small-width">
													  <button class="btn btn-default btn-green  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
														<img src="images/signup-icon.png" class="custom-icon" alt="" width="60" height="60" /> Signup
													  </button>
													  
													</div>
												</div>
											</div-->
											<?php if(!$this->session->userdata('user_id')) { ?>
											<div class="col-xs-6 col-sm-7 col-md-6 col-xs-push-3 col-sm-push-6 divice-center">
												<div class="row">
													<div class="dropdown  small-width">
													  <button class="btn btn-default btn-green dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
														<img src="<?php echo include_img_path();?>/login-icon.png" class="custom-icon" alt="" width="60" height="60" />Login
													  </button>
													  <a href ="<?php echo site_url('login/user_login')?>" >Login</a>
													</div>
												</div>
											</div>
										</div>
										<?php } else { ?>
											
											<a href ="<?php echo site_url('login/user_settings')?>" >Settings</a>&nbsp;&nbsp;
										
										 <a href ="<?php echo site_url('login/logout')?>" >Log out</a>
										
										<?php } ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Section /-->
			
			<!--/ Search -->
			<?php if(!$this->session->userdata('user_id')) { ?>
				<div class="container custom-search">
					<div class="col-sm-6 col-sm-push-3">
						<div class="input-group brd">
						  <input type="text" id="" class="form-control" name="" placeholder="Search..." value="">
						  <span class="input-group-btn">
							<button class="button btn btn-default"><i class="fa fa-search"></i></button>
						  </span>
						</div>
					</div>
				</div>
				<?php } ?>
			<!-- Search /-->
