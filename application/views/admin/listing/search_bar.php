
  	<div class="row">
  		<div class="search_table m_bot_15">
  			<ul>
  				<!--  bulk action section goes here--> 
          <?php if(isset($bulk_actions)) { ?>
  				<li class="span2">
  					<div class="btn-group input-append">
						<div class="input-prepend">
							<div class="add-on pad_4">
								<input id="check_all" name="check_all" type="checkbox" value="1" data-placement="top" data-toggle="tooltip" ></div><?php echo form_dropdown('action', $bulk_actions, '', 'id="action" class="span2" data-width="110px"');?><button class="btn pad_4" onclick="bulk_action();">Go</button></div>
					</div>						
				</li>
        <?php } ?>
  				<!--  search section goes here--> 
  				<li class="span5 m_left_10">
  					<form method="post" id="simple_search_form">
  					<div class="search_small">
  						<?php echo form_dropdown('search_type', $simple_search_fields, $search_conditions['search_type'], 'class="m_left_10 span2" data-width="155px"');?>
  						<div class="input-append puul-left">
  							<input class="span2"  placeholder="type to filter..." id="appendedInputButton" type="text" name="search_text" value="<?php echo $search_conditions['search_text'];?>" ><button class="btn" type="button" id="simple_search_button" data-placement="top" data-toggle="tooltip" data-original-title="search"><i class="icon-search"></i></button>
  						</div>
  						<button type="button" class="btn btn-link pull-right" onclick="$.fn.clear_simple_search();" data-placement="top" data-toggle="tooltip" data-original-title="clear simple search">Clear Filter</button>
  					</div>
  					</form>
				</li>
				<!--  Advanced search section goes here--> 
				<li class="span3 advancesearch"></li>
				<!--  Show per page section goes here--> 
  				<li class="span2 m_left_0">
  					<div class="span2 pull-right text-right m_left_0">
  						Show entries: 
  						<?php echo form_dropdown('per_page_options', $per_page_options, $per_page, 'data-width="60px" class="m_left_10"');?>
  					</div>
  				</li>  
  			</ul>
  		</div>
  	</div>
  	<div id="div_select_all" style="display:none;"> 
  		<div class="menu_action pull-right nowrap m_bot_10">
  		
	      		<a class="btn" href="javascript:;"  title="" onclick="do_select(1, 1)"><i class="icon-ok"></i> Select All</a>
	      	
	      		<a class="btn" href="javascript:;"  title="" onclick="do_select(1, 2)"><i class="icon-ok"></i> Select only in this view</a> 
	      
	      	
		</div>	      	
  	</div>