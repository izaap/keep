<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><a href="#">Home</a>
						</li>
						<li class="active"><span>Users</span>
						</li>
					</ol>
					<div class="clearfix">
						<h1 class="pull-left">Users</h1>
						<div class="pull-right top-page-ui">
							<a href="<?php echo site_url('admin/user/add');?>"> <i
								class="fa fa-plus-circle fa-lg"></i> Add user
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<?php echo $grid;?>
			<?php //echo '<pre>';print_r($this->session->all_userdata());die;?>
		</div>
	</div>

