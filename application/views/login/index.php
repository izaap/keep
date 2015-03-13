<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Bureau</title>

<?php if(isset($css)): foreach($css as $ckey => $cvalue):?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/css/<?php echo $cvalue; ?>"/>
<?php endforeach; endif; ?>
  
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
 
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<!--[if lt IE 9]>
		<script src="<?php echo base_url();?>/assets/admin/js/html5shiv.js"></script>
		<script src="<?php echo base_url();?>/assets/admin/js/respond.min.js"></script>
	<![endif]-->

</head>
<body id="login-page">
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
            <div id="login-logo">LOGIN</div>
        </header>
        <div id="login-box-inner">
        <?php
         if(validation_errors()):
          echo validation_errors();
         endif; 
        ?>
            <form role="form" name="admin_login" id="admin_login" action="<?php site_url('admin/login')?>" method="POST">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" type="text" name="email" placeholder="Email or Username">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div id="remember-me-wrapper">
                <div class="row">
                     <div class="col-xs-6">
                        <div class="checkbox-nice">
                            <a href="<?php echo base_url();?>login/add" id="login-forget-link" class="col-xs-6"> Register </a>
                        </div>
                    </div>
                <div class="col-xs-6"></div>
                <a href="#" id="login-forget-link" class="col-xs-6"> Forgot password? </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" name="submit" class="btn btn-success col-xs-12" value="Login">
                </div>
            </div>
             <!-- <div class="row">
                <div class="col-xs-12">
                    <p class="social-text">Or login with</p>
                </div>
            </div>
           <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <button type="submit" class="btn btn-primary col-xs-12 btn-facebook"><i class="fa fa-facebook"></i> facebook</button>
                </div>
                <div class="col-xs-12 col-sm-6">
                        <button type="submit" class="btn btn-primary col-xs-12 btn-twitter"><i class="fa fa-twitter"></i> Twitter</button>
                </div>
            </div>-->
            </form>
        </div>
    </div>
    </div>
    </div>
    <div id="login-box-footer">
     <div class="row">
        <div class="col-xs-12">Do not have an account?<a href="#">Register now</a></div>
     </div>
    </div>
    </div>
</div>
</div>
</div>
<div id="config-tool" class="closed">
    <a id="config-tool-cog"><i class="fa fa-cog"></i></a>
    <div id="config-tool-options">
    <h4>Layout Options</h4>
    <ul>
        <li>
            <div class="checkbox-nice"><input type="checkbox" id="config-fixed-header"/>
                <label for="config-fixed-header">Fixed Header</label>
            </div>
        </li>
        <li>
            <div class="checkbox-nice"><input type="checkbox" id="config-fixed-sidebar"/>
                <label for="config-fixed-sidebar">Fixed Left Menu</label>
            </div>
        </li>
        <li>
            <div class="checkbox-nice"><input type="checkbox" id="config-fixed-footer"/>
                <label for="config-fixed-footer">Fixed Footer</label>
            </div>
        </li>
        <li>
            <div class="checkbox-nice"><input type="checkbox" id="config-boxed-layout"/>
                <label for="config-boxed-layout">Boxed Layout</label>
            </div>
        </li>
        <li>
            <div class="checkbox-nice"><input type="checkbox" id="config-rtl-layout"/>
                <label for="config-rtl-layout">Right-to-Left</label>
            </div>
        </li>
    </ul>
    <br/>
    <h4>Skin Color</h4>
    <ul id="skin-colors" class="clearfix">
        <li>
            <a class="skin-changer" data-skin="theme-navyBlue" data-toggle="tooltip" title="Navy Blue" style="background-color: #34495e;"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;"></a>
        </li>
        <li>
            <a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-greenSea" data-toggle="tooltip" title="Green Sea" style="background-color: #6ff3ad;"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #7FC8BA;"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;"></a>
        </li>
        <li>
            <a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #1ABC9C;"></a>
        </li>
    </ul>
</div>
</div> 
<?php if(isset($js)): foreach($js as $jkey => $jvalue):?>
<script src="<?php echo base_url();?>/assets/admin/js/<?php echo $jvalue; ?>"></script>  
<?php endforeach; endif; ?>
</body>
</html>