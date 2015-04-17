			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-2">
						<div class="row">
						</div>
					</div>
					
					<div class="col-sm-9 col-md-10 affix-content home-product-wrap">
						<div class="ro-w">
							<?php foreach($this->product_list as $product) { ?>
							<!--// Single Product -->
								<div class="col-xs-12 col-sm-6 col-md-3 home-product">
									<div class="ro-w">
										<div class="caption">
											<p><a href="#"><img src="<?php echo include_img_path();?>/users/user-1.jpg" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
											<p class="text-center"><a href="#" class="user-name">User Name</a></p>
											<p id="like">
												<?php 
												if($this->session->userdata('user_id')) {
												$this->load->model('home_model');
												$status = $this->home_model->check_like_unlike($product['id'],$this->session->userdata('user_id'));
												
												?>
												<?php if($status == 0)  { ?>
												<a class="label lab-d heart" onclick="like('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Like</a>
												<?php } else { ?>
												
												<a class="label lab-d heart" onclick="unlike('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Unlike</a>
												<?php } } else { ?>
													
													<a class="label lab-d heart" onclick="like('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Like</a>
													
												<?php } ?>
												
												<a data-toggle="modal" data-target="#favorite_<?php echo $product['id'];?>" class="label lab-d star"><i class="fa fa-star"></i>Favorite</a>
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
							
							
							
							<p class="col-md-3 center-block fn light-img"><a href="#"><img src="<?php echo include_img_path();?>/users/user-1.jpg" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
                            <p class="light-bluetxt">Seller Name Joi</p>
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
		
	
	
	
	
<script>
	
	/* LIKE */
	
	function like(product_id,user_id)
	{
		//alert(user_id);
		
		if(user_id == ''){
			
			alert("Pls login to like");
		}
		
		 var url = "<?php echo site_url(); ?>home/like";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  //alert(a1_text);
                  
                  
                  
                }
            });    
            
	}
	
	
	/* UNLIKE */
	
	function unlike(product_id,user_id)
	{
		//alert('in');
		
		if(user_id == ''){
			
			alert("Pls login to Unlike");
		}
		
		 var url = "<?php echo site_url(); ?>home/unlike";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  
                  
                  
                }
            });    
            
	}
	
	/* BUY */
	
	
	function buy(product_id,user_id)
	{
		//alert('in');
		
		if(user_id == ''){
			
			alert("Pls login to access");
		}
		
		 var url = "<?php echo site_url(); ?>home/buy";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  if(check == 0){
					  
					  alert("User can't access more than one time");
				  }
                  
                  
                }
            });    
            
	}
	
	
	
		
	
	
  
	
	
</script>	




