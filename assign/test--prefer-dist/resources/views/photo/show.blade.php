@extends('master')

@section('content')
<h1 align="center">Product List</h1>
<button class="btn btn-primary show" style="margin-left: 50%;">show</button>
<div class="container output">
	
</div>

<script type="text/javascript">
				$(".show").click(function(){
				jQuery.ajax({
						url : "productlist",
						type : "GET",
						dataType: "html",	
						success: function(data){  
						$('.output').html(data); 
							$('.editphoto').click(function(){
								$val=$(this).val();
								jQuery.ajax({
									url : "edit/"+$val,
									type : "GET",
									dataType: "html",	
									success: function(data){  
									$('.output').html(data); 
							        }	   
								});			
							});			
				        }	   
				});			
				});

</script>
@endsection