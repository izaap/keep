<div id="content-wrapper"><div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li class="active"><span>Users</span></li>
</ol>
<div class="clearfix">
<h1 class="pull-left">Users</h1>
<div class="pull-right top-page-ui">
<a href="<?php echo site_url('admin/role/add');?>">
<i class="fa fa-plus-circle fa-lg"></i> Add Role
</a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="main-box no-header clearfix">
<div class="main-box-body clearfix">
<div class="table-responsive">
<table class="table user-list table-hover">
<thead>
<tr>
<th><span>User</span></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<img src="<?php echo base_url();?>assets/admin/img/samples/scarlet-159.png" alt=""/>
<a href="#" class="user-link">Jennifer Lawrence</a>
<span class="user-subhead">Admin</span>
</td>
<td>
2013/08/08
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="md-modal md-effect-1" id="modal-1">
<div class="md-content">
<div class="modal-header">
    <button class="md-close close">&times;</button>
    <h4 class="modal-title">ADD User</h4>
</div>
<div class="modal-body">
    <form role="form">
    <div class="form-group">
        <label for="firtname">First Name</label>
        <input type="text" name="first_name" class="form-control"  placeholder="First Name" />
     </div>
     <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="lastname" placeholder="Last Name" />
     </div>
     <div class="form-group">
        <label for="about">About</label>
        <textarea name="about"></textarea>
     </div>
     <div class="form-group">
        <label for="profilename">Profile Name</label>
        <input type="text" name="profile_name" class="form-control" id="profilename" placeholder="Profile Name" />
     </div>
     <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" name="user_name" class="form-control" id="username" placeholder="User Name" />
     </div>
     <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
     </div>
     <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" />
     </div>
     <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" id="location" placeholder="Location" />
     </div>
     <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" />
     </div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleTextarea">Textarea</label>
<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
</div>
<div class="form-inline form-inline-box">
<div class="form-group">
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
</div>
<div class="form-group">
<select class="form-control">
<option>Active</option>
<option>Inactive</option>
</select>
</div>
<button type="submit" class="btn btn-link"><i class="fa fa-eye"></i> Preview</button>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
