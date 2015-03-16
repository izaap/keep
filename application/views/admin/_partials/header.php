<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>KEEP - Admin Home</title>
<?php if(isset($css)): foreach($css as $ckey => $cvalue):?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/admin/css/<?php echo $cvalue; ?>"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<?php endforeach; endif; ?>

<?php if(isset($js)): foreach($js as $jkey => $jvalue):?>
<script src="<?php echo base_url();?>assets/admin/js/<?php echo $jvalue; ?>"></script>  
<?php endforeach; endif; ?>

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->	
	
	<?php if(isset($js)): foreach($js as $jkey => $jvalue):?>
<script src="<?php echo base_url();?>assets/admin/js/<?php echo $jvalue; ?>"></script>  
<?php endforeach; endif; ?>
<script type="text/javascript" src="src/jquery.tokeninput.js"></script>
</head>
<body>
<div id="theme-wrapper">
<header class="navbar" id="header-navbar">
<div class="container">
    <a href="<?php echo site_url('admin/dashboard'); ?>" id="logo" class="navbar-brand">KEEP - ADMIN
        <img src="img/logo-black.png" alt="" class="normal-logo logo-black"/>
        <img src="img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
    </a>
    <div class="clearfix">
        <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li style="margin-left: -50px;">
<a class="btn" id="make-small-nav" title="Hide Menus">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
</div>
<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right">
<li class="mobile-search">
<a class="btn">
<i class="fa fa-search"></i>
</a>
<div class="drowdown-search">
<form role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search...">
<i class="fa fa-search nav-search-icon"></i>
</div>
</form>
</div>
</li>



<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-tasks"></i>
<span class="count">5</span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>

<li class="item-header">You have 5 pending tasks</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Dashboard v1.3 <span class="pull-right">40%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
				<span class="sr-only">40% Complete (success)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Database Update <span class="pull-right">60%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				<span class="sr-only">60% Complete (warning)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Iphone Development <span class="pull-right">87%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
				<span class="sr-only">87% Complete</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
	<a href="#">
		<div class="task-info">
			<div class="desc">Mobile App <span class="pull-right">33%</span></div>
		</div>
		<div class="progress progress-striped">
			<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
				<span class="sr-only">33% Complete (danger)</span>
			</div>
		</div>
	</a>
</li>
<li class="item">
   <a href="#">
		<div class="task-info">
			<div class="desc">Dashboard v1.3 <span class="pull-right">45%</span></div>
		</div>
		<div class="progress progress-striped active">
			<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
				<span class="sr-only">45% Complete</span>
			</div>
		</div>
	</a>
</li>
<li class="item-footer">
<a href="#">
View all tasks
</a>
</li>
</ul>
</li>





<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell"></i>
<span class="count">8</span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item-header">You have 6 new notifications</li>
<li class="item">
<a href="#">
<i class="fa fa-comment"></i>
<span class="content">New comment on ‘Awesome P...</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-plus"></i>
<span class="content">New user registration</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-envelope"></i>
<span class="content">New Message from George</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-shopping-cart"></i>
<span class="content">New purchase</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-eye"></i>
<span class="content">New order</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all notifications
</a>
</li>
</ul>
</li>

<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope-o"></i>
<span class="count">16</span>
</a>
<ul class="dropdown-menu notifications-list messages-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item first-item">
<a href="#">
<img src="img/samples/messages-photo-1.png" alt=""/>
<span class="content">
<span class="content-headline">
George Clooney
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="img/samples/messages-photo-2.png" alt=""/>
<span class="content">
<span class="content-headline">
Emma Watson
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="img/samples/messages-photo-3.png" alt=""/>
<span class="content">
<span class="content-headline">
Robert Downey Jr.
</span>
<span class="content-text">
Look, just because I don't be givin' no man a foot massage don't make it
right for Marsellus to throw...
</span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all messages
</a>
</li>
</ul>
</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="img/samples/scarlet-159.png" alt=""/>
<?php $user_data = $this->session->userdata('admin_user_data'); ?>
<span class="hidden-xs"><b><?php echo ucfirst($user_data['first_name']." ".$user_data['last_name']);  ?></b></span> <b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
<li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
<li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
</li>
<li class="dropdown language hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
English
<i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu">
<li class="item">
<a href="#">
Spanish
</a>
</li>
<li class="item">
<a href="#">
German
</a>
</li>
<li class="item">
<a href="#">
Italian
</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
</div>
</header>
