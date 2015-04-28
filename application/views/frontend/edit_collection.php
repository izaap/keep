
<div class="col-sm-9 col-md-10 affix-content home-product-wrap">
					
						<!--/ Page Title -->
							<div class="page-title">
								<h3 class="title">Settings</h3>
							</div>
						<!-- Page Title /-->
						
						<!--/ Form -->							
		<div class="">
			<?php foreach($this->collection_data as $coll) { ?>
			<form class="form-horizontal" role="form"  name="admin_login" id="admin_login" action="" method="POST" enctype="multipart/form-data">
			
			  <div class="form-group frm-grpp">
				  
				<div class="col-sm-6 col-md-4">
				  <input type="text" name="collection" id="" placeholder="Collection name" class="form-control" value= "<?php echo $coll['name'];?>">
				</div>
				
			  </div>
			  
			  <div class="cf">
				
				<div class="col-sm-8">
					<div class="form-group frm-grpp">
					  <textarea class="custom-txtarea form-control" placeholder="Description" name="desc"><?php echo $coll['desc']?></textarea>
					</div>
				</div>
			  </div>
			  s
			 

			  <div class="form-group frm-grpp">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="pull-right">
					<button type="submit" class="btn btn-update">Update</button>
					<button type="submit" class="btn btn-cancel">Cancel</button>
				  </div>
				</div>
				
			  </div>
			 
			</form>
			<?php } ?>
		</div>
		<!-- Form /-->
	</div>
	
				
