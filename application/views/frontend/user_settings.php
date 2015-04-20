<div class="col-sm-9 col-md-10 affix-content home-product-wrap">
		<?php if($message = $this->service_message->render()):
       echo $message;
      endif;
 ?>
 
 
 <?php
         if(validation_errors()):
          echo validation_errors();
         endif; 
        ?>				
						<!--/ Page Title -->
							<div class="page-title">
								<h3 class="title">Settings</h3>
							</div>
						<!-- Page Title /-->
						
						<!--/ Form -->							
						<div class="">
							<?php foreach($this->user_data['user'] as $user) { ?>
							<form class="form-horizontal" role="form"  name="admin_login" id="admin_login" action="" method="POST" enctype="multipart/form-data">
							
							  <div class="form-group frm-grpp">
								  
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="first_name" id="" placeholder="First Name" class="form-control" value= "<?php echo $user['first_name'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="last_name" id="" placeholder="Last Name" class="form-control" value= "<?php echo $user['last_name'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="user_name" id="" placeholder="User Name" class="form-control" value= "<?php echo $user['user_name'];?>">
								</div>
							  
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="profile_name" id="" placeholder="Profile Name" class="form-control" value= "<?php echo $user['profile_name'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="location" id="" placeholder="Location" class="form-control" value= "<?php echo $user['location'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="email" id="" placeholder="Email" class="form-control" value= "<?php echo $user['email'];?>">
								</div>
							 
								<div class="col-sm-6 col-md-4">
								  <input type="text" name="phone" id="" placeholder="Phone" class="form-control" value= "<?php echo $user['phone'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
								  <input type="password" name="password" id="" placeholder="Change Password" class="form-control" value= "<?php echo $user['ori_password'];?>">
								</div>
								<div class="col-sm-6 col-md-4">
									<label>
										 <small class="italic"><i >Receive notification emails:</i></small>  <input name="email_notification" type="checkbox" value="1" <?=set_value('email_notification',$user['email_notification'])==1 ?'checked':'';?>
									</label>									  
								</div>
							  </div>
							  
							  <div class="cf">
								<div class="col-sm-4 b-gap">
								  <!--<input type="number" name="" id="" placeholder="Phone" class="form-control">-->
								  <div class="row custom-uploader">
								  <img src="<?php echo include_img_path();?>/users/user-5-big.jpg" class="image-replace" width="280" height="250" alt="" />
								  
									  <div class="fileUpload">
										<span><i class="fa fa-camera"></i><u class="hidden-xs hidden-sm ">Update profile picture</u></span>
										<input type="file" class="upload" name="user_image"/>
									  </div>
								  </div>
								</div>
								<div class="col-sm-8">
									<div class="form-group frm-grpp">
									  <textarea class="custom-txtarea form-control" placeholder="About Me" name="about"><?php echo $user['about']?></textarea>
									</div>
								</div>
							  </div>
							  
							  <div class="col-xs-4 col-md-4">
                            <select name="jewelry" class = "form-control input-lg">
								<?php foreach($this->user_data['jewelry'] as $jewel) { ?>
									 <option value="<?php echo $jewel['id']; ?>" <?php if($jewel['id']== $user['user_jewelry_type']) { ?> selected="selected" <?php } ?>><?php echo $jewel['jewelry_type'] ?></option>
								<?php } ?>
							</select>  
							
							                     
						 </div>

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
					
				
