<div class="container">
			
				<div class="row">

					<div class="col-sm-9 col-md-10 affix-content home-product-wrap">
                        
						<!--/ Page Title -->
							<div class="page-ti-tle filter-nav text-center">
								<!--<ul class="pagination cf text-center">
									<li><a href="#" class="active">Collection </a></li>
									<li><a href="#">Favorite </a></li>
									<li><a href="#">Likes </a></li>
								</ul>-->
                                <div class="panel with-nav-tabs panel-default">
                                     <div class="panel-heading tab-menu">
                                          <ul class="nav nav-tabs pagination cf text-center">
                                                <li class="active"><a href="#tab1default" data-toggle="tab"> All viewed Products</a></li>
                                                <li><a href="#tab2default" data-toggle="tab"> Favorite Products </a></li>
                                             <?php /*   <li><a href="#tab3default" data-toggle="tab">Followed Products</a></li> */?>
                                                <li><a href="#tab4default" data-toggle="tab">Liked Products</a></li>
                                          </ul>
                                     </div>
                                </div>
								<div class="clear"></div>
							</div>
						<!-- Page Title /-->
						<a name=""></a>
					<!-- Start tab section  /-->	
                    <div class="panel-body">
                    <div class="tab-content">
                        <!-- start All View page-->
                        <div class="tab-pane active" id="tab1default">					
						     <div class="col-sm-9 col-md-12 affix-content home-product-wrap mT_15">
						<div class="ro-w">
							<?php foreach($this->product_list['all_recent'] as $product) { 
								
								$this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
													<p><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
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
													$this->load->model('recent_model');
													$status = $this->recent_model->check_like_unlike($product['id'],$this->session->userdata('user_id'));
													$fav_status = $this->recent_model->check_fav($product['id'],$this->session->userdata('user_id'));
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
											<p class="short-description"><a href="<?php echo site_url(); ?>home/product_detail/<?php echo $product['id'];?>"><?php echo $product['description']; ?> </a></p> 
											
											
											
										</div>
										<img src="<?php  echo site_url('assets/uploads/products/'.$product['product_image']) ?>" class="" alt="" height="316" width="221">
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
						
						$this->load->model('recent_model');
						$collection = $this->recent_model->get_user_collection($this->session->userdata('user_id'));
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
							
							<?php $this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
                        <!-- start Favorites page-->
                        <div class="tab-pane" id="tab2default">		
						     <div class="col-sm-9 col-md-12 affix-content home-product-wrap mT_15">
												<div class="ro-w">
							<?php foreach($this->product_list['fav'] as $product) { 
								
								$this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
													<p><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
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
													$this->load->model('recent_model');
													$status = $this->recent_model->check_like_unlike($product['id'],$this->session->userdata('user_id'));
													$fav_status = $this->recent_model->check_fav($product['id'],$this->session->userdata('user_id'));
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
											<p class="short-description"><a href="<?php echo site_url(); ?>home/product_detail/<?php echo $product['id'];?>"><?php echo $product['description']; ?> </a></p> 
											
											
											
										</div>
										<img src="<?php  echo site_url('assets/uploads/products/'.$product['product_image']) ?>" class="" alt="" height="316" width="221">
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
						
						$this->load->model('recent_model');
						$collection = $this->recent_model->get_user_collection($this->session->userdata('user_id'));
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
							
							<?php $this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
                   
                        <!-- start follower page-->
                    <?php /*    <div class="tab-pane" id="tab3default">	3
                             <div class="col-sm-9 col-md-12 affix-content home-product-wrap mT_15">
						   <div class="ro-w">
							<!--// Single Product -->
								<div class="col-xs-12 col-sm-6 col-md-3 home-product">
									<div class="ro-w">
										<div class="caption">
											<p><a href="#"><img height="60" width="60" alt="" class="img-circle img-border" src="<?php echo include_img_path();?>/users/user-1.jpg"></a></p>
											<p class="text-center"><a class="user-name" href="#">User Name</a></p>
											<p>
												<a class="label lab-d heart" href=""><i class="fa fa-heart"></i>Like</a>
												<a class="label lab-d star" href=""><i class="fa fa-star"></i>Favorite</a>
											</p>											
											<p class="more-sec">
												<a class="label label-price" href="#">$99</a>
												<a class="label label-buy" href="#">Buy</a>
											</p>
											<p class="short-description"><a href="#">short thumbnail description </a></p>
										</div>
										<img height="316" width="221" alt="" class="" src="<?php echo include_img_path();?>/products/small/product-1.jpg">
									</div>
								</div>
							<!-- Single Product //-->
							
							
						</div>
					</div>
                        </div>
                       */?>
                         <!-- Start Likes page-->
                    <div class="tab-pane" id="tab4default">
                             <div class="col-sm-9 col-md-12 affix-content home-product-wrap mT_15">
												<div class="ro-w">
							<?php foreach($this->product_list['like'] as $product) { 
								
								$this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
													<p><a href="#"><img src="<?php echo include_img_path();?>/users/<?php echo $img;?>" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
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
													$this->load->model('recent_model');
													$status = $this->recent_model->check_like_unlike($product['id'],$this->session->userdata('user_id'));
													$fav_status = $this->recent_model->check_fav($product['id'],$this->session->userdata('user_id'));
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
											<p class="short-description"><a href="<?php echo site_url(); ?>home/product_detail/<?php echo $product['id'];?>"><?php echo $product['description']; ?> </a></p> 
											
											
											
										</div>
										<img src="<?php  echo site_url('assets/uploads/products/'.$product['product_image']) ?>" class="" alt="" height="316" width="221">
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
						
						$this->load->model('recent_model');
						$collection = $this->recent_model->get_user_collection($this->session->userdata('user_id'));
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
							
							<?php $this->load->model('recent_model');
								$status = $this->recent_model->check_user_fav_image($product['id']);
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
                    </div>
					<!-- end tab section /-->
                   
					</div>
				</div>
			</div>
	<!-- page test -->
	
