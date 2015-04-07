<div class="col-xs-12 col-sm-3 col-md-2">
						<div class="row">
							<div class="sidebar-nav">
							
							
								<div class="navbar navbar-default" role="navigation">								
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
										<span class="visible-xs navbar-brand"><b>menu</b></span>
									</div>
																		
									<div class="navbar-collapse collapse sidebar-navbar-collapse">
									<?php if($this->session->userdata('user_id')) { 
										
										
										
										?>
										<!--// User Details -->
											 <div class="user_details totpad">
												<div class="profile-pic">
													<a href="#" data-toggle="tooltip" data-placement="bottom" title="">
														<img src="<?php echo include_img_path();?>/users/user-5-big.jpg" class="img-responsive" alt="" />
														<div class="profile-nic ellipsis"><?php echo $this->session->userdata('user_name') ?></div>
												</a>
												</div>
												<!-- Follower & Following  -->
												<div class="follow cf">
													<div class="col-xs-6">
														<span>22</span>
														<p>Follower</p>
													</div>
													<div class="col-xs-6">
														<span>48</span>
														<p>Follower</p>
													</div>
													<a href="#" class="btn btn-follow"> <i class="fa fa-plus"></i>Folow </a>
												</div>
												
												<!-- About Profiler -->
												<div class="cf about-profiler">
													<ul>
														<li> <i class="fa fa-send"></i><a href="mailto:??"><?php echo $this->session->userdata('email') ?></a></li>
														<li> <i class="fa fa-mobile-phone"></i> <?php echo $this->session->userdata('phone') ?></li>
														<li> <i class="fa fa-map-marker"></i> <?php echo $this->session->userdata('location') ?></li>
														<li> <i class="fa fa-link"></i> <a href="#">http://tjb.com/shagrey</a></li>
														<li> <b>ABOUT ME: </b> <?php echo $this->session->userdata('about') ?>
														</li>
													</ul>
												</div>
												
											</div> 
										<?php } ?>
										<!-- User Details //-->
										
										<div class="left-nav">
											<ul>
												<li><a href="#">What's New</a></li>
												<li><a href="#" class="active">Top 10 This Week</a></li>
												<li><a href="#">Top 10 Last Week</a></li>
												<li><a href="#">Upcoming Auctions</a></li>
												<li><a href="#">Museum Collections</a></li>
												<li><a href="#">About</a></li>
												<li><a href="#">Feedback</a></li>
											</ul>
										</div>
									</div><!--/.nav-collapse -->
								</div>
							</div>
						</div>
					</div>
					
