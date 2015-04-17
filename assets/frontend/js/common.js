$(document).ready(function() {  
		$('#coll').change(function(){  
			
		if($('#coll').val() === '0')  
		   {  
		   $('#collect').show();   
		   $('#coll').hide();   
		   $('#cancel_link').show();   
		   }  
		else 
		   {  
		   $('#collect').hide();    
		   $('#cancel_link').hide();  
		   }  
		});  
		
	
	$('#cancel_link').click(function(){ 
		 
		$('#collect').hide();   
		   $('#coll').show(); 
		   $('#cancel_link').hide();  
		
	});
		
	});


	/* COLLECTION */

	function collection(product_id,user_id)
	{
		var collection_id = $('#coll option:selected').val();
		
		var collection_name = $('#collect').val();
		
		if(user_id == ''){
			
			alert("Pls login to access");
		}
		
		if(collection_name == ''){ 
		
		 var url = base_url+"home/fav_collection";
		 
		}else { 
			
			var url = base_url+"home/create_collection";
		 
		}
           
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id,collection_id:collection_id,user_id:user_id,collection_name:collection_name},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  //alert(check);
                  if(!check == 0){
					  
					$("#app_"+product_id).html(check);  
					$("#test_"+product_id).html(check);  
				}
                  
                }
            }); 
		
		
	}
	
	
	
	/* LIKE */
	
	function like(product_id,user_id)
	{
		//alert(user_id);
		
		if(user_id == ''){
			
			alert("Pls login to like");
		}
		
		 var url = base_url+"home/like";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  //alert(a1_text);
                  
                  $("#update_like_"+product_id).html(check); 
                  
                }
            });    
            
	}
	
	
	/* UNLIKE */
	
	function unlike(product_id,user_id)
	{
		//alert('in');
		
		if(user_id == ''){
			
			alert("Pls login to Unlike");
		}
		
		var url = base_url+"home/unlike";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  
                   $("#update_like_"+product_id).html(check); 
                  
                }
            });    
            
	}
	
	/* BUY */
	
	
	function buy(product_id,user_id)
	{
		//alert('in');
		
		if(user_id == ''){
			
			alert("Pls login to access");
		}
		
		var url = base_url+"home/buy";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { 
                  if(check == 0){
					  
					  alert("User can't access more than one time");
				  }
                  
                  
                }
            });    
            
	}
	
	
	
	function product_comments(product_id,user_id)
	{
		
		if(user_id == ''){
			
			alert("Pls login to access");
		}
		
		var comments = $('#message').val();
		//alert(comments);
		
		var url = base_url+"home/product_comments";
            
            $.ajax(
            {
                type:'POST',
                url:url,
                data: {product_id:product_id,user_id:user_id,comments:comments},
                cache:false,
                async:true,
                global:false,
                dataType:"html",
                success:function(check)
                { //alert(check);
                  $("#app_comm").html(check);  
                  $('#message').val('');
                  
                }
            });    
            
            
	}
	
