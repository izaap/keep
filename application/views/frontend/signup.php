<div class="container">
<div class="row">
<div class="col-xs-12">
<?php if($message = $this->service_message->render()):
       echo $message;
      endif;
 ?>
    <div id="login-box">
    <div id="login-box-holder">
    <div class="row">
    <div class="col-xs-12">
        <header id="login-header">
            <div id="login-logo">Sign up</div>
        </header>
        <div id="login-box-inner">
        <?php
         if(validation_errors()):
          echo validation_errors();
         endif; 
        ?>
            <form role="form" name="admin_login" id="admin_login" action="<?php site_url('login/signup')?>" method="POST" enctype="multipart/form-data">
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" type="text" name="first_name" placeholder="First name">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" type="text" name="last_name" placeholder="Last name">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" type="text" name="user_name" placeholder="User name">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            
             <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Phone number">
            </div>
            
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="radio" class="form-control" name="gender" value="1" />Male
                <input type="radio" class="form-control" name="gender"  value="2" />Female
            </div>
            
            
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" name="submit" class="btn btn-success col-xs-12" value="Submit">
                </div>
            </div>
             
            </form>
        </div>
    </div>
    </div>
    </div>
    
    </div>
</div>
</div>
</div>
