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
												<a class="label lab-d heart" onclick="like('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Like</a>
												
												<a class="label lab-d heart" onclick="unlike('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')"><i class="fa fa-heart"></i>Unlike</a>
												
												<a href="" class="label lab-d star"><i class="fa fa-star"></i>Favorite</a>
											</p>											
											<p class="more-sec" id ="test_buy">
												<a href="#"  class="label label-price">$<?php echo $product['price']; ?></a>
												<a class="label label-buy" onclick="buy('<?php echo $product['id']?>','<?php echo $this->session->userdata('user_id') ?>')">Buy</a>
											</p>
											<p class="short-description"><a href="#"><?php echo $product['description']; ?> </a></p>
										</div>
										<img src="<?php  echo site_url('assets/uploads/products/'.$product['product_image']) ?>" class="" alt="" height="316" width="221">
									</div>
								</div>
								<?php } ?>
							<!-- Single Product //-->
							
							
						</div>
					</div>
				</div>
			</div>
	<!-- page test -->
	
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
				  }else {
					  
					  $('#test_buy').addClass('highlight');
				  }
                  
                  
                }
            });    
            
	}
	
</script>	



<style>
  .highlight { 
  	display:none;
  }
 </style>
