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
											<p>
												<a href="" class="label lab-d heart"><i class="fa fa-heart"></i>Like</a>
												<a href="" class="label lab-d star"><i class="fa fa-star"></i>Favorite</a>
											</p>											
											<p class="more-sec">
												<a href="#" class="label label-price">$<?php echo $product['price']; ?></a>
												<a href="#" class="label label-buy">Buy</a>
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
	
