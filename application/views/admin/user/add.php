<?php if (isset($message)) { if($message = $this->service_message->render()) :?>
		<?php echo $message;?>
<?php endif; }?>
<div id="content-wrapper">
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb"><li><a href="#">Home</a></li><li class="active"><span>Form Elements</span></li></ol>
                <h1 style="font-weight: bold; font-size:16px; color:#000; margin:20px 0 20px 0"><?php echo (isset($form_data['id']) && ($form_data['id'] !=''))?'Edit':'Add';?> User</h1>
            </div>
        </div>
<div class="row">
 <div class="col-lg-12">
   <div class="main-box">
    <header class="main-box-header clearfix"><h2></h2></header>
    <span style="font-weight:bold; color:red; font-size: 12;">
    <?php if(validation_errors()):
          echo validation_errors();  
        endif;?>
    </span>
    <div class="main-box-body clearfix">
        <form role="form" name="user" id="user" action="<?php echo site_url("admin/user/add"); ?>" method="POST">
              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id = (isset($form_data['id']) && $form_data['id']!='')?$form_data['id']:"";?>" />
            <div class="form-group">
                <label for="Firstname">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter Firstname" value="<?php echo set_value('first_name', $form_data['first_name']);?>" />
            </div>
            <div class="form-group">
                <label for="Lastname">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Lastname" value="<?php echo set_value('last_name', $form_data['last_name']);?>" />
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" name="about" id="about" rows="3"><?php echo set_value('about', $form_data['about']);?></textarea>
            </div>
            <div class="form-group">
                <label for="Profilename">Profile Name</label>
                <input type="text" class="form-control" name="profile_name" id="profile_name" placeholder="Enter Profilename" value="<?php echo set_value('profile_name', $form_data['profile_name']);?>" />
            </div>
            <div class="form-group">
                <label for="Username">User Name</label>
                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter Username" value="<?php echo set_value('user_name', $form_data['user_name']);?>" />
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="<?php echo set_value('password', $form_data['password']);?>" />
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="" <?php echo set_select('role', '', TRUE); ?>>Select Role</option>
                <?php if(isset($roles)) {foreach($roles as $rkey => $rvalue){
                       $selectecd = (isset($form_data['role']) && ($form_data['role'] == $rvalue['id']))?'selected="selected"':"";
                    ?>
                    <option value="<?php echo $rvalue['id']; ?>" <?php echo set_select('role', $form_data['role']); ?> <?php echo $selectecd; ?>><?php echo $rvalue['name']; ?></option>
                    <?php }} ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Dob">Date Of Birth:</label>
                <input type="text" class="form-control" name="dob" id="dob" placeholder="Enter Date Of Birth" value="<?php echo set_value('dob', $form_data['dob']);?>" />
            </div>
            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" value="<?php echo set_value('location', $form_data['location']);?>" />
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo set_value('email', $form_data['email']);?>" />
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="<?php echo set_value('phone', $form_data['phone']);?>" />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="" <?php echo set_select('gender', '', TRUE); ?>>Select Gender</option>
                    <option value="Male" <?php echo set_select('gender', 'Male'); ?>>Male</option>
                    <option value="Female" <?php echo set_select('gender', 'Female'); ?>>Female</option>
                </select>
            </div>
            <div class="col-md-1">
                <input type="submit" class="form-control btn btn-primary" style="font-weight: bold; font-size:17px;" name="submit" id="submit" value="SAVE" />
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
