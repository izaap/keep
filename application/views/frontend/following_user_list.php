<div class="col-sm-9 col-md-10 affix-content home-product-wrap ">
						
						<div class="page-ti-tle filter-nav text-center">
								<ul class="pagination cf text-center">
									<?php foreach($this->data['user_data'] as $data) { ?>
									<li><a href="<?php echo site_url('login/user_profile/'.$data['id'].'') ?>" class="active">Collection </a></li>
									<li><a href="<?php echo site_url('home/list_fav_product/'.$data['id'].'')?>">Favorite </a></li>
									<li><a href="<?php echo site_url('home/list_like_product/'.$data['id'].'')?>">Likes </a></li>
									<?php } ?>
								</ul>
								<div class="clear"></div>
							</div>
                        
						<!-- user list -->
						<!--/ My Profile -->							
						<div class="col-sm-9 col-md-12 affix-content home-product-wrap mT_15">
						<div class="ro-w">
						<?php foreach($this->following_list as $user_list){  
							
							$this->load->model('home_model');
							$user_detail = $this->home_model->get_user_details($user_list['follow_user_id']);
							//print_r($user_detail);exit;
							foreach($user_detail as $user){ 
							//print_r($user_detail);
							
							?>
							<!--// Single Product -->
								<div class="col-xs-12 col-sm-6 col-md-3 home-product1">
									<div class="ro-w">
										<div class="caption-follwer">
											<?php  if(!$user['user_image'] == "") { $img = $user['user_image'];} else { $img="no_image.png";}?>
											<p><a href="<?php echo site_url('login/user_profile/'.$user['id'].'') ?>">
												<img height="60" width="60" alt="" class="img-circle img-border" src="<?php echo include_img_path();?>/users/<?php echo $img?>"></a></p>
											<p class="text-center"><a class="user-name" href="#"><?php echo $user['user_name']?></a></p>
											<p class="follws">
												<span class="follow-rate"> <a href="<?php echo site_url(); ?>home/followers_user_list/<?php echo $user['id']?>" ><?php echo $user['following_count'] ?></a></span> Following
												
												<span class="follow-rate"><a href="<?php echo site_url(); ?>home/following_user_list/<?php echo $user['id']?>" ><?php echo $user['followed_count'] ?></a></span>  Followers
											</p>											
											<p class="more-sec">
												<button class="btn btn-primary">Follow</button>
											</p>
											
										</div>
										<img height="316" width="221" alt="" class="" src="<?php echo include_img_path();?>/products/small/product-1.jpg">
									</div>
								</div>
							<!-- Single Product //-->

							<?php } }?>
							
							
						</div>
					</div>
						<!-- My Profile /-->
					</div>
				
