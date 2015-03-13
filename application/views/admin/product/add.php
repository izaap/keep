<?php if (isset($message)) { if($message = $this->service_message->render()) :?>
		<?php echo $message;?>
<?php endif; }?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb"><li><a href="#">Products</a></li><li class="active"><span>add</span></li></ol>
                    <h1 style="font-weight: bold; font-size:16px; color:#000; margin:20px 0 20px 0"><?php echo (!empty($form_data['id']))?'Edit':'Add';?> Product</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="main-box">
                        <header class="main-box-header clearfix"><h2></h2></header>
                        <div class="main-box-body clearfix">
                        <?php $id=(!empty($form_data['id']))?$form_data['id']:'';?>
                            <form role="form" name="user" id="user" action="<?=site_url('admin/products/add/'.$id);?>" method="POST">
                                                                  
                                <div class="form-group">
                                    <label for="product_name">Product Name <span class="vstar">*</span></label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="<?=set_value('product_name', $form_data['product_name']);?>" />
                                    <?php echo form_error('product_name', '<div class="field_error">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description <span class="vstar">*</span></label>
                                    <textarea class="form-control" name="description" id="description" rows="10"><?=set_value('description', $form_data['description']);?></textarea>
                                    <?php echo form_error('description', '<div class="field_error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="product_image">Product Image <span class="vstar">*</span></label>
                                    <input type="file"  name="product_image" id="product_image" />
                                </div>
                                <div class="form-group">
                                    <label for="upcoming_product">Upcoming Product </label>
                                    <input type="checkbox" class="form-control" name="upcoming_product" id="upcoming_product" value="1" <?=($form_data['upcoming_product']==1)?'checked':'';?> />
                                    <?php echo form_error('upcoming_product', '<div class="field_error">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="buylink">Buylink: <span class="vstar">*</span></label>
                                    <input type="text" class="form-control" name="buylink" id="buylink" placeholder="Enter Bulink" value="<?php echo set_value('buylink', $form_data['buylink']);?>" />
                                    <?php echo form_error('buylink', '<div class="field_error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price <span class="vstar">*</span></label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" value="<?php echo set_value('price', $form_data['price']);?>" />
                                    <?php echo form_error('price', '<div class="field_error">', '</div>'); ?>
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
