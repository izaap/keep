
<!-- Start  Left Menu Section -->
<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
    <li >
        <a href="<?php echo site_url('admin/dashboard'); ?>">
            <i class="fa fa-dashboard"></i><span>Dashboard</span><span class="label label-primary label-circle pull-right"></span>
        </a>
    </li>
    
    <li>
		<a href="<?php echo site_url('admin/role'); ?>">
			<i class="fa fa-dashboard"></i><span>Role</span><span class="label label-primary label-circle pull-right"></span>
		</a>
		<ul class="submenu">
			<li>
				<a href="<?php echo site_url('admin/role/add_role');?>">
					<i class=""></i><span>Add Role</span>
				</a>
			</li>
			<li>
				<a href="<?php echo site_url('admin/role/manage_role');?>">
					<i class=""></i><span>Manage Role</span>
				</a>
			</li>
		</ul>
    </li>

    <li >
		<a href="<?php echo site_url('admin/user'); ?>">
			<i class="fa fa-dashboard"></i><span>Users</span><span class="label label-primary label-circle pull-right"></span>
		</a>
		<ul class="submenu">
			<li>
				<a href="<?php echo site_url('admin/user/add'); ?>">
					<i class=""></i><span>Add User</span>
				</a>
			</li>
			<li>
				<a href="<?php echo site_url('admin/user'); ?>">
					<i class=""></i><span>Manage Users</span>
				</a>
			</li>
		</ul>
    </li>
    
    
    <li>
        <a href="<?php echo site_url("admin/products"); ?>" >
            <i class="fa fa-envelope"></i><span>Products</span>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo site_url("admin/products/add"); ?>">Add Products</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin/products"); ?>">Manage Products</a>
            </li>
        </ul>
    </li>
    
    <li>
		<a href="<?php echo site_url("admin/message/add_message"); ?>" >
			<i class="fa fa-envelope"></i><span>Messages</span>
		</a>
		<ul class="submenu"> 
			<li> 
				<a href="<?php echo site_url("admin/message/add_message"); ?>" >
					<i class=""></i><span>Add Mesaage</span>
				</a>
			</li>
			<li>
				<a href="<?php echo site_url("admin/message/message_management"); ?>" >
					<i class=""></i><span>Message Management</span>
				</a>
			</li>
		</ul>
    </li>
        
</ul>
 </div>
 </div>
 </section>
</div>
<!-- End  Left Menu Section -->
