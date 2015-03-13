<?php if($message = $this->service_message->render()) :?>
		<?php echo $message;?>
<?php endif; ?>
<div id="page-wrapper" class="container">
<div class="row">
<!-- Start  Left Menu Section -->
<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
    <li class="nav-header nav-header-first hidden-sm hidden-xs">Navigation</li>
    <li class="active">
        <a href="">
            <i class="fa fa-dashboard"></i><span>Dashboard</span><span class="label label-primary label-circle pull-right"></span>
        </a>
        <ul class="submenu">
            <li><a href="#">Product Chart</a></li>
            <li><a href="#">User Chart</a></li>
            <li><a href="#">Recent Activities</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php echo site_url('admin/role'); ?>"><span>Roles</span></a>
    </li>
    <li>
        <a href="<?php echo site_url('admin/user');?>">
            <i class="fa fa-table"></i><span>Users</span>
        </a>
        <!--<ul class="submenu">
            <li>
                <a href="#">Add</a>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>-->
    </li>
    <li>
        <a href="<?php echo site_url("admin/products"); ?>" >
            <i class="fa fa-envelope"></i><span>Products</span>
        </a>
        <!--<ul class="submenu">
            <li>
                <a href="#">Add</a>
            </li>
            <li>
                <a href="#">List</a>
            </li>
        </ul>-->
    </li>
    <li>
        <a href="<?php echo site_url("admin/message/add_message"); ?>" >
            <i class="fa fa-envelope"></i><span>Messages</span>
        </a>
        
        <a href="<?php echo site_url("admin/message/add_message"); ?>" >
            <i class=""></i><span>Add Mesaage</span>
        </a>
        
        <a href="<?php echo site_url("admin/message/message_management"); ?>" >
            <i class=""></i><span>Message Management</span>
        </a>
        
        
        
        
      <?php /* <ul class="submenu">
            <li>
                <a href="<?php echo site_url('admin/message/add_message');?>">Add</a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/message');?>">Manage</a>
            </li>
        </ul>  */ ?>
    </li>
    </ul>
 </div>
 </div>
 </section>
</div>
<!-- End  Left Menu Section -->
