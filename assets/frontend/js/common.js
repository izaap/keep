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
                  
                }
            }); 
		
		
	}
