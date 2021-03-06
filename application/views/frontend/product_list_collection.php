
 <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript">stLight.options({publisher: "10d8f0ec-ae8a-4157-bb45-e1ad1185e6c1", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>

			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-2">
						<div class="row">
						</div>
					</div>
					
					<div class="col-sm-9 col-md-10 affix-content home-product-wrap">
						
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
							
					<?php foreach($this->product_list['collection_detail'] as $collection_data) { ?>
						<div class="row col-name">
						
					    <div class="col-md-4">
						
							<p class="colection-name">	<?php echo ucfirst($collection_data['name']);  ?> </p>
						</div>
							
							<div class="col-md-8 col-ed-right text-right col-e-d">
								<div class="btn-group show-on-hover share-menu">
							<?php if($collection_data['user_id'] == $this->session->userdata('user_id') ) { ?>
							<a class="edit" href="<?php echo site_url('home/edit_collection/'.$collection_data['user_id'].'/'.$collection_data['id'].'') ?>"><img height="30" width="35" alt="Edit" title="Edit" class="img-circle img-border" src="<?php echo include_img_path();?>/edit.png"></a>
							
							<a class="delete" href="<?php echo site_url('home/delete_collection/'.$collection_data['user_id'].'/'.$collection_data['id'].'') ?> " onclick="return confirm('<?php echo "Are you sure ,want to delete this Collection ?"; ?>')"> <img height="30" width="35" alt="Delete" title="Delete" class="img-circle img-border" src="<?php echo include_img_path();?>/delete.png"> </a>
							
							<?php } ?>
							</div>
							
							 <div class="btn-group show-on-hover share-menu">
								  <a type="button" class="dropdown-toggle share-btn share-icon" data-toggle="dropdown">
									<img height="30" width="35" alt="Share" title="Share" class="img-circle img-border" src="<?php echo include_img_path();?>/share.png"> 
								  </a>
								  <ul class="dropdown-menu share-drop" role="menu">
									<li><a href="#"><span class='st_email' displayText='Email'></span></a></li>
									 <li><a href="#"><span class='st_pinterest' displayText='Pinterest'></span></a></li>
									<li><a href="#"><span class='st_twitter' displayText='Tweet'></span></a></li>
									<li><a href="#"><span class='st_facebook' displayText='Facebook'></span></a></li>
									
								  
								  </ul>
							</div>
						</div>
						</div>
						
					<?php } ?>
						
						<div class="ro-w">
							<?php foreach($this->product_list['list'] as $product) { 
								
								$this->load->model('home_model');
								$status = $this->home_model->check_user_fav_image($product['id']);
								//print_r($status);exit;
								
								
								?>
							<!--// Single Product -->
								<div class="col-xs-12 col-sm-6 col-md-3 home-product">
									<div class="ro-w">
										<div class="caption">
											<div id ="test_<?php echo $product['id']?>">
										<?php if(count($status)>0) { ?>
												<?php foreach($status as $user_fav) {
													
													if($user_fav['user_image'] == ''){
														$img = "no_image.png";
													}else {
														$img = $user_fav['user_image'];
													} ?>
													<p><a href="<?php echo site_url('login/user_profile/'.$user_fav['id'].'') ?>">
												<img height="60" width="60" alt="" class="img-circle img-border" src="<?php echo include_img_path();?>/users/<?php echo $img?>"></a></p>
													<p class="text-center"><a href="#" class="user-name"><?php echo $user_fav["user_name"]?></a></p>
													<?php } ?>
											<?php } else { $img= "no_image.png"; ?>
												
													<p><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
													
													<?php } ?>
												
											</div>
											<p id="like">
												<div id ="update_like_<?php echo $product['id']?>" class="update">
													<?php 
													if($this->session->userdata('user_id')) {
													$this->load->model('home_model');
													$status = $this->home_model->check_like_unlike($product['id'],$this->session->userdata('user_id'));
													$fav_status = $this->home_model->check_fav($product['id'],$this->session->userdata('user_id'));
													//print_r($fav_status);exit;
													
													?>
													<?php if($status == 0)  { ?>
													<a class="label lab-d heart" onclick="like('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Like</a>
													<?php } else { ?>
													
													<a class="label lab-d heart" onclick="unlike('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Unlike</a>
													<?php } } else { ?>
														
														<a class="label lab-d heart" onclick="like('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Like</a>
														
													<?php } ?>
												</div>
												 
												<?php 
												
												if(!$this->session->userdata('user_id') == '') { 
												
												if($fav_status < 1) { ?>
												<a data-toggle="modal" data-target="#favorite_<?php echo $product['id'];?>" class="label lab-d star"><i class="fa fa-star"></i>Favorite</a>
												<?php } else {?>
												
												<a data-toggle="modal" class="label lab-d star  star-sel"  data-target="#favorite_<?php echo $product['id'];?>"  ><i class="fa fa-star "></i>Favorite</a>
												
												<?php } ?>
												<?php } else { ?>
													<a data-toggle="modal" data-target="#favorite_<?php echo $product['id'];?>" class="label lab-d star"><i class="fa fa-star"></i>Favorite</a>
													<?php } ?>
												
											</p>											
											<p class="more-sec" id ="test_buy">
												<a class="label label-price">$<?php echo $product['price']; ?></a>
												<a class="label label-buy" onclick="buy('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')">Buy</a>
											</p>
											<p class="short-description"><a href="<?php echo site_url(); ?>/home/product_detail/<?php echo $product['id'];?>"><?php echo $product['description']; ?> </a></p> 
											
											
											
										</div>
										<?php if($product['product_image'] == "") {  
											$img= "no_image.png"; }
											 else {  
												 $img= $product['product_image']; 
												 } ?>
										<img src="<?php  echo base_url('assets/uploads/products/'.$img) ?>" class="" alt="" height="316" width="221">
									</div>
								</div>
								
							<!-- Single Product //-->
							
							
							
							<div class="modal fade home-fav-modal" id="favorite_<?php echo $product['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content radius-0">
			  <div class="modal-body pad-0 cf">
					<div class="col-xs-12 col-sm-4 text-center" style="background:red">
						<div class="row">
							<img src="<?php echo include_img_path();?>/products/small/product-6.jpg" alt="" />
						</div>
					</div>
					
					
					<div class="col-xs-12 col-sm-8 lightbox-fav">
						<div class="row">
							<h3>Favorite into</h3>
						<form role="form" name="admin_login" id="admin_login" action="" method="POST"> 
						<?php 
						
						$this->load->model('home_model');
						$collection = $this->home_model->get_user_collection($this->session->userdata('user_id'));
						//print_r($collection);exit;
						?>
							<div role="toolbar" class="btn-toolbar ligtbx-btn">
							  <div class="btn-group col-md-offset-3 mb_15"> 
								<select name="collections" class="selectpicker btn-sm lightbx-btn" id="coll" >
									
                                <?php foreach($collection as $coll) { ?>
                                <option value="<?php echo $coll['id'];?>"><?php echo $coll['name']; ?></option>
                               <?php } ?>
                               <option value="0">Create a New Collection </option>
                              </select>
                              <input type="text" name="collection_text" placeholder="Enter collection name" id="collect" style='display:none; ' value=""/>
                              <p class="text-center"><a id="cancel_link" class="user-name" style='display:none;' >Cancel</a></p>
							  </div><!-- /btn-group -->
							</div>
							
							<?php $this->load->model('home_model');
								$status = $this->home_model->check_user_fav_image($product['id']);
								?>
						<div id ="app_<?php echo $product['id'];?>" >	
							<?php if(count($status)>0) { ?>
												<?php foreach($status as $user_fav1) {
													
													if($user_fav1['user_image'] == ''){
														$img = "no_image.png";
													}else {
														$img = $user_fav1['user_image'];
													} ?>
													<p class="col-md-3 center-block fn light-img"><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
													<p class="light-bluetxt"><?php echo $user_fav1['user_name'];?></p>
													<?php } ?>
											<?php } else { $img= "no_image.png"; ?>
												
													<p class="col-md-3 center-block fn light-img"><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
													
													<?php } ?>
							</div>
							
                            
							<p class="col-md-3 center-block fn a-link">
                            	<button type="button" class="btn btn-gncircle glyphicon glyphicon-ok" data-dismiss="modal" type="submit"onclick="collection('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"></button>
                      
                                <a type="button" id="coll_user" class="btn btn-redcircle glyphicon glyphicon-remove" data-dismiss="modal"></a>
                            </p>
							
						</div>
						</form>
					</div>
			  </div>
			  
			  
			</div>
		  </div>
		</div>
	<!-- -->
			<?php } ?>				
							
							
						</div>
					</div>
				</div>
			</div>
	<!-- page test -->
	
	
	<!-- Modal -->
		





