
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
<div class="pull-right hidden-xs">
<div class="xs-graph pull-left">
<div class="graph-label">
<b><i class="fa fa-shopping-cart"></i> 838</b> Orders
</div>
<div class="graph-content spark-orders"></div>
</div>
<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
<div class="graph-label">
<b>&dollar;12.338</b> Revenues
</div>
<div class="graph-content spark-revenues"></div>
</div>
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
<span class="subinfo">
<i class="fa fa-caret-down"></i> 22% less than last week
</span>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="main-box small-graph-box blue-bg">
<div class="box-button">
	<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
</div>
<span class="value">923</span>
<span class="headline">Orders</span>
<div class="progress">
<div style="width: 42%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="42" role="progressbar" class="progress-bar">
<span class="sr-only">42% Complete</span>
</div>
</div>
<span class="subinfo">
<i class="fa fa-caret-up"></i> 15% higher than last week
</span>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="main-box small-graph-box red-bg">
<div class="box-button">
	<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
</div>
<span class="value">2,562</span>
<span class="headline">Users</span>
<div class="progress">
<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
<span class="sr-only">60% Complete</span>
</div>
</div>
<span class="subinfo">
<i class="fa fa-caret-up"></i> 10% higher than last week
</span>
</div>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="main-box small-graph-box purple-bg">
<div class="box-button">
	<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
</div>
<span class="value">$61,600</span>
<span class="headline">Revenue</span>
<div class="progress">
<div style="width: 77%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar">
<span class="sr-only">77% Complete</span>
</div>
</div>
<span class="subinfo">
<i class="fa fa-caret-down"></i> 22% More than last week
</span>
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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">


google.load('visualization', '1', {packages: ['corechart','controls']});
google.setOnLoadCallback(productChart);
google.setOnLoadCallback(userChart);

function productChart(){

	$.ajax({
		url:"<?php echo site_url('admin/dashboard/product_chart') ?>",
		type : "POST",
		data:{},
		dataType:"json",
		success : function(data) {
			
			if(data.status == 'success')
			{
                $.each(data.records, function( index, value ){

					var rep_data = new google.visualization.arrayToDataTable(value);

					var options = {
					  title: index.toUpperCase(),
					  fontSize:12,
					  width:490,
					  height:200,
					  legend: 'PRODUCTS',
					  vAxis: {title: 'PRODUCTS'}
					};

					var chart = new google.visualization.ColumnChart(document.getElementById(index+'_chart'));
					chart.draw(rep_data, options);

				});

			}
			else
			{
				$('#buycount_chart,#likes_chart,#followed_chart,#favorites_chart').html("<div class='no_records'>"+data.message+"</div>");
			}
			
		},
		error : function(data) {
			$('#buycount_chart,#likes_chart,#followed_chart,#favorites_chart').html("<div class='no_records'>Failed to load graphs</div>");
		}
	});
}

function userChart(){

	$.ajax({
		url:"<?php echo site_url('admin/dashboard/user_chart') ?>",
		type : "POST",
		data:{},
		dataType:"json",
		success : function(data) {
			
			if(data.status == 'success')
			{
               
					var rep_data = new google.visualization.arrayToDataTable(data.records);

					var options = {
					  title: 'Range',
					  fontSize:12,
					  height:200,
					  legend: 'Added Users',
					  vAxis: {title: 'Total'}
					};

					var chart = new google.visualization.BarChart(document.getElementById('user_chart'));
					chart.draw(rep_data, options);


			}
			else
			{
				$('#user_chart').html("<div class='no_records'>"+data.message+"</div>");
			}
			
		},
		error : function(data) {
			$('#user_chart').html("<div class='no_records'>Failed to load graphs</div>");
		}
	});
}		
</script>
