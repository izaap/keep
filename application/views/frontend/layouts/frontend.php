<!DOCTYPE HTML>
<html>
	<head>
	    
		<?php include_title(); ?>
        <? include_metas(); ?>
        <? include_links(); ?>
        <? include_stylesheets(); ?>
        <? include_raws() ?>
        
        <script>
			//declare global JS variables here
			var base_url = '<?php echo base_url();?>';
			var current_controller = '<?php echo $this->uri->segment(1, 'index');?>';
			var current_method = '<?php echo $this->uri->segment(2, 'index');?>';			
		</script>
        
        
	</head>


	<body >

		<?php echo $this->load->view('frontend/_partials/header', $this->data); ?>

		<div class="container">
			<div class="row">
				
				<?php if(!$this->uri->segment(1) == 'login' &&  !$this->uri->segment(2) == 'user_login' || $this->uri->segment(2) == 'user_profile' || $this->uri->segment(2) == 'user_settings' || $this->uri->segment(2) == 'product_detail') { ?>
				<?php echo $this->load->view('frontend/_partials/left_menu', $this->data); ?>
				<?php } ?>
				<?php echo $content; ?>
			</div>
		</div>

		<?php echo $this->load->view('frontend/_partials/footer'); ?>

		
		<!-- javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

		<? include_javascripts(); ?>
		
		<?php 
		
			if(is_array($this->init_scripts))
			{
				foreach ($this->init_scripts as $file)
					$this->load->view($file, $this->data);
			}
		?>
	</body>
</html>
