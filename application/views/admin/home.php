
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
    <div class="col-lg-12">
	    <div id="content-header" class="clearfix">
		    <div class="pull-left">
			    <ol class="breadcrumb">
			        <li><a href="#">Home</a></li>
			        <li class="active"><span>Dashboard</span></li>
			    </ol>
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="main-box small-graph-box emerald-bg">
			<div class="box-button">
				<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
			</div>
			<span class="value">69,600</span>
			<span class="headline">Visits</span>
			<div class="progress">
				<div style="width: 84%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="84" role="progressbar" class="progress-bar">
					<span class="sr-only">84% Complete</span>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="main-box small-graph-box blue-bg">
			<div class="box-button">
				<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
			</div>
			<span class="value"><?=$home_data['buy_count']?></span>
			<span class="headline">Buying Count</span>
			<div class="progress">
				<div style="width: 42%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="42" role="progressbar" class="progress-bar">
					<span class="sr-only">42% Complete</span>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="main-box small-graph-box red-bg">
			<div class="box-button">
				<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
			</div>
			<span class="value"><?=$home_data['users_count']?></span>
			<span class="headline">Users</span>
			<div class="progress">
				<div style="width: 35%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar">
				<span class="sr-only">35% Complete</span>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="main-box small-graph-box purple-bg">
			<div class="box-button">
				<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
			</div>
			<span class="value"><?=$home_data['products_count']?></span>
			<span class="headline">Products</span>
			<div class="progress">
				<div style="width: 33%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar">
					<span class="sr-only">33% Complete</span>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
<div class="col-lg-6">
	<div class="main-box">
		<header class="main-box-header clearfix">
			<h2>Products Buycount</h2>
		</header>
		<div class="main-box-body clearfix">
			<div id="buycount_chart"> </div>
		</div>
	</div>
</div>

<div class="col-lg-6">
	<div class="main-box">
		<header class="main-box-header clearfix">
			<h2>Products Followed</h2>
		</header>
		<div class="main-box-body clearfix">
			<div id="followed_chart"> </div>
		</div>
	</div>
</div>
</div>

<div class="row">
<div class="col-lg-6">
	<div class="main-box">
		<header class="main-box-header clearfix">
			<h2>Product Likes</h2>
		</header>
		<div class="main-box-body clearfix">
			<div id="likes_chart"> </div>
		</div>
	</div>
</div>

<div class="col-lg-6">
	<div class="main-box">
		<header class="main-box-header clearfix">
			<h2>Product Favorites</h2>
		</header>
		<div class="main-box-body clearfix">
			<div id="favorites_chart"> </div>
		</div>
	</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
	<div class="main-box">
		<header class="main-box-header clearfix">
			<h2>User Charts</h2>
		</header>
		<div class="main-box-body clearfix">
			<div id="user_chart"> </div>
		</div>
	</div>
</div>
</div>

</div>
</div>
