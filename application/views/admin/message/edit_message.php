<?php if (isset($message)) { if($message = $this->service_message->render()) :?>
		<?php echo $message;?>
<?php endif; }?>
<div id="content-wrapper">
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb"><li><a href="#">Home</a></li><li class="active"><span>Form Elements</span></li></ol>
               <?php /* <h1 style="font-weight: bold; font-size:16px; color:#000; margin:20px 0 20px 0"><?php echo (isset($form_data['id']) && ($form_data['id'] !=''))?'Edit':'Add';?> User</h1> */ ?>
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
        <form role="form" name="edit_message" id="edit_message" action="<?php echo site_url("admin/message/edit_message"); ?>" method="POST">
              <?php foreach ($this->result as $r){ ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo $r["name"]; ?>" />
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $r["id"]; ?>" />

            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5"><?php echo $r["message"]; ?></textarea>
            </div>
            
            <?php /*<div class="form-group">
                <label>Type</label>
                <select class="form-control" name="role" id="role">
                    <option value="" <?php echo set_select('role', '', TRUE); ?>>Select Role</option>
                <?php if(isset($roles)) {foreach($roles as $rkey => $rvalue){
                       $selectecd = (isset($form_data['role']) && ($form_data['role'] == $rvalue['id']))?'selected="selected"':"";
                    ?>
                    <option value="<?php echo $rvalue['id']; ?>" <?php echo set_select('role', $form_data['role']); ?> <?php echo $selectecd; ?>><?php echo $rvalue['name']; ?></option>
                    <?php }} ?>
                </select>
            </div> */ ?>
            
            <div class="form-group">
                <label for="type">Type</label>
                <input type="radio" class="form-control" name="type" id="type" value="1" <?php if($r['type'] == 'site') {?> checked=checked <?php } ?> />Site
                <input type="radio" class="form-control" name="type" id="type" value="2" <?php if($r['type'] == 'users') {?> checked=checked <?php } ?> />User
            </div>
            
           
            <div class="col-md-1">
                <input type="submit" class="form-control btn btn-primary" style="font-weight: bold; font-size:17px;" name="submit" id="submit" value="Submit" />
            </div>
            <?php } ?>
            </form>
        </div>
    </div>
</div>
</div>
</div>
