<?php if (isset($message)) { if($message = $this->service_message->render()) :?>
		<?php echo $message;?>
<?php endif; }?>
<div id="content-wrapper">
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb"><li><a href="#">Home</a></li><li class="active"><span>Form Elements</span></li></ol>
                <h1 style="font-weight: bold; font-size:16px; color:#000; margin:20px 0 20px 0"><?php echo (isset($form_data['id']) && ($form_data['id'] !=''))?'Edit':'Add';?> User</h1>
            </div>
        </div>
<div class="row">
 <div class="col-lg-12">
   <div class="main-box">
    <header class="main-box-header clearfix"><h2></h2></header>
    <span style="font-weight:bold; color:red; font-size: 12;">
    <?php if(validation_errors()):
          echo validation_errors();  
        endif;?>
    </span>
    <div class="main-box-body clearfix">
        <form role="form" name="user" id="user" action="<?php echo site_url("admin/role/add"); ?>" method="POST">
              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id = (isset($form_data['id']) && $form_data['id']!='')?$form_data['id']:"";?>" />
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo set_value('name', $form_data['name']);?>" />
            </div>
           <div class="col-md-1">
                <input type="submit" class="form-control btn btn-primary" style="font-weight: bold; font-size:17px;" name="submit" id="submit" value="SAVE" />
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
